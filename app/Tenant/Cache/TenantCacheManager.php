<?php 

namespace App\Tenant\Cache;


use Illuminate\Cache\CacheManager;

/**
 * 
 */
class TenantCacheManager extends CacheManager
{

	 public function __call($method, $parameters)
    {
        return $this->store()->tags($this->getTenantCacheTag())->$method(...$parameters);
    }

    protected function getTenantCacheTag()
    {
    	return ['tenant_' . $this->app(Manager::class)->getTenant()->uuid];
    }
}

 ?>