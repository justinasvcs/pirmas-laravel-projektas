<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// autentifikacijai reikalingi route'ai
Auth::routes();

// apsaugotų route'ų grupė
Route::group(['middleware' => 'auth'], function() {
    Route::resource('/friends', 'FriendsController');
});

// mokėmės su testimonials ir paprastais get route'ais, nurodančiais į
// kontrolerio metodus
Route::get('/testimonials', 'TestimonialsController@getAll');

Route::get('/testimonials/{id}', 'TestimonialsController@getSingle')
     ->where(['id' => '[0-9]+']);

// universalus route'as į single action kontrolerį, kuris atvaizduoja puslapį,
// jei jį randa tokiu pavadinimu, kokį nurodėme adrese
Route::get('/{page}', 'ShowPage');

// named route'o pavzydys
// p.s. 5.5 versijoj yra naujas metodas ir analogiškai atrodytų taip:
// Route::view('/', 'welcome')->name('homepage');

Route::get('/', function () {
    return view('welcome');
})->name('homepage');