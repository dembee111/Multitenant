<?php

namespace App\Http\Controllers\Tenant;

use App\Http\Controllers\Controller;
use App\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;


class ProjectController extends Controller
{
    public function index()
    {
        
        $start = microtime(true);
        $projects = cache()->remember('projects', 3600, function(){
            return Project::get();
        });
       
        
        $duration = (microtime(true) - $start) * 1000;
        \Log::info('With cache: '.$duration.'ms');

    	return view('tenant.projects.index', compact('projects'));
    }

    public function store(Request $request)
    {
    	$this->validate($request, [
            'name' => 'required'
    	]);

    	Project::create([
            'name' => $request->name
    	]);

    	return back();
    }
}
