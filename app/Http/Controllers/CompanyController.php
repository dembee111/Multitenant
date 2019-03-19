<?php

namespace App\Http\Controllers;

use App\Company;
use App\Events\Tenant\TenantWasCreated;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function create()
    {
        return view('companies.create');
    }

    /* company uusgeh heseg*/
    public function store(Request $request){
        $company = Company::make([
           'name' => $request->name
        ]);
         
        /*huselt gargasan hereglegchiin companies luu save hiine*/
        $request->user()->companies()->save($company);
        
        /* ene ued event iig ajluulj tenantWasCreated company utgiig bas dawhar ugnu*/
        event(new TenantWasCreated($company));

        /* url route  tenant.switch gesneer tenantController switch methodiig ajiluulna*/
        return redirect()->route('tenant.switch', $company);
    }
}
