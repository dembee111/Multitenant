<?php

namespace App\Http\Controllers\Tenant;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProjectFileController extends Controller
{
    public function index()
    {
    	return view('tenant.projects.fileupload');
    }

    public function store(Request $request)
    {

        $url = $request->url();
        $uploadedFiles = $request->pics;
        $projectid = $request->id;


        foreach ($uploadedFiles as $uploadedFile) {
        	
        	$uploadedFile->store('dummy');
        }        

        return response(['status' => $url], 200);
    }
}
