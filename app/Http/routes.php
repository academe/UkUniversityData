<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    $unis = App\University::with('courses')->isInstitution()->first();
    dump($unis);

    // return view('index')->with('institutions', $institution);
});

Route::get('/search', 'SearchController@searchQuery');