<?php 

namespace App\Tenant\Database;

use App\Tenant\Models\Tenant;
use Illuminate\Support\Facades\DB;
/**
 * 
 */

class DatabaseCreator
{
	/**
	* herwee ene classiin create method 
	  param deer tenant hiij ajiluulah yum bol Database deer tenant iin shine db uusgene
	*
	*
	*
	*/
	public function create(Tenant $tenant)
	{
		return DB::statement("
               CREATE DATABASE fresh_{$tenant->id}
			");
	}
	
}

 ?>