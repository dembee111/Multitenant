<?php 

namespace App\Tenant\Traits;

use App\TenantConnection;
use App\Tenant\Models\Tenant;
use Webpatser\Uuid\Uuid;

trait IsTenant 
{
	public static function boot()
	{

		parent::boot();

		static::creating(function($tenant){
            $tenant->uuid = Uuid::generate(4);
		});
        /*tenant.php -g company model deer implements hiisen uchir tenant object --g awch bna*/
		static::created(function ($tenant){
			/*company model luu data insert hiih ued TenantConnection 
			luu bas newDatabaseConnection method --in utgiig hiine*/
			$tenant->tenantConnection()->save(static::newDatabaseConnection($tenant));
		});
	}

	protected static function newDatabaseConnection(Tenant $tenant)
	{
		/* TenantConnection model db ruu doorh utgiig hiij bna*/
       return new TenantConnection([
           'database' => 'fresh_'.$tenant->id
       ]);
	}
    /* Company model -n tenantConnection toi relationship holbolt one to one*/
    public function tenantConnection()
    {
    	return $this->hasOne(TenantConnection::class, 'company_id', 'id');
    }

 }
