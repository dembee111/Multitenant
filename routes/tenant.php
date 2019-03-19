<?php 

use App\Tenant\Manager;

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('projects', 'tenant\ProjectController');

Route::resource('projects/{project}/files', 'Tenant\ProjectFileController', [
      'names' => [
         'store' => 'projects.files.store'
      ]
]);

 ?>