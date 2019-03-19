<?php 

namespace App\Tenant\Database;

use Illuminate\Database\DatabaseManager as BaseDatabaseManager;
use App\Tenant\Models\Tenant;

class DatabaseManager 
{
	protected $db;
    
    /* Illumminate DatabaseManager ees purge reconnect
     function uudiig ashiglahiin tuld duudaj oruulj ir bna 
     ene classiin nertei dawhtsah tul uurchilj bna neriig ni*/
	public function __construct(BaseDatabaseManager $db)
	{
        $this->db = $db;
	}
	public function createConnection(Tenant $tenant)
	{
		

		/* ene door bgaa getTenantConnection oos utga awch set iin zaasan utgad onoon ugch bn*/
		config()->set('database.connections.tenant', $this->getTenantConnection($tenant));

		
	}
    /* ugugdsun database tai dahin holbogdono*/
	public function connectToTenant()
	{
        $this->db->reconnect('tenant');
	}
    // ugugdsun db tai holbolt tasalj cache ustgana

	public function purge()
	{
		$this->db->purge('tenant');
	}

	protected function getTenantConnection(Tenant $tenant)
	{

		/* herwee param deer tenant object tawibal 
		tenant aas tenantConnection oos zuwhun database iin hesgiig awch pgsql iin database hesegt ni tawina*/
		return array_merge(

			config()->get($this->getConfigConnectionPath()), $tenant->tenantConnection->only('database')

		);
	}
    /* config db zamiig zaana getDefaultConnectionName ees default
     neriig awch sprintf method ashiglag niiluulen tawina*/
	public function getConfigConnectionPath()
	{
		return sprintf('database.connections.%s', $this->getDefaultConnectionName());
	}
    /*database iin default connection ner*/
	protected function getDefaultConnectionName()
	{
		return config('database.default');
	}
}


 ?>