<?php

namespace App\Http\Middleware\Tenant;

use App\Company;
use App\Events\Tenant\TenantIdentified;
use Closure;

class SetTenant
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        /*resolveTenant iig duudaj param deer ni session deer uussen baigaa
         company iin uuid hiiwel ajilna*/
        $tenant = $this->resolveTenant(session('tenant'));
        
        /*session hooson baiwal endees daraagiin alham hiigdene*/
        if (!$tenant) {
            return $next($request);
        }
        /*herwee auth user iin companies ni tenant id ni 
        company id tai taarahgui baiwal huseltiig butsaaj home ruu shidne*/
        if (!auth()->user()->companies->contains('id', $tenant->id)) {
           return redirect('/home');
        }
        /* haij olson tenant iig event deer tawisnaar TenantIdentified ajillaj ehelne*/
        event(new TenantIdentified($tenant));
        
        return $next($request);
    }

    protected function resolveTenant($uuid)
    {
        return Company::where('uuid', $uuid)->first();
    }
}
