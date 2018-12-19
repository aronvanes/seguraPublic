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

Auth::routes();
Route::post('authenticate', 'AuthController@authenticate')->name('authenticate');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', 'HomeController@index')                                                          ->name('home');
    Route::get('/home/getPerformances', 'HomeController@getPerformances')                            ->name('home.getPerformances');
    Route::get('/home/getRehearsals', 'HomeController@getRehearsals')                                ->name('home.getRehearsals');

    // optredens
    Route::get('/optredens', 'PerformanceController@index')                                         ->name('performances.index');
    Route::get('/optredens/getPerformances', 'PerformanceController@getPerformances')               ->name('performances.getPerformances');
    Route::get('/optredens/getPastPerformances', 'PerformanceController@getPastPerformances')       ->name('performances.getPastPerformances');
    Route::get('/optredens/nieuw', 'PerformanceController@create')                                  ->name('performances.create');
    Route::post('/optredens/opslaan', 'PerformanceController@store')                                ->name('performances.store');
    Route::get('/optredens/{performance}', 'PerformanceController@show')                            ->name('performances.show');
    Route::post('/optredens/{performance}', 'PerformanceController@update')                         ->name('performances.update');

    // repetities
    Route::get('/repetities', 'RehearsalController@index')                                          ->name('rehearsals.index');
    Route::get('/repetities/getRehearsals', 'RehearsalController@getRehearsals')                    ->name('rehearsals.getRehearsals');
    Route::get('/repetities/nieuw', 'RehearsalController@create')                                   ->name('rehearsals.create');
    Route::post('/repetities/opslaan', 'RehearsalController@store')                                 ->name('rehearsals.store');
    Route::get('/repetities/{rehearsal}', 'RehearsalController@show')                               ->name('rehearsals.show');
    Route::post('/repetities/{rehearsal}', 'RehearsalController@update')                            ->name('rehearsals.update');

    // mails
    Route::post('/mails/opslaan/{performance}', 'MailController@store')                             ->name('mails.store');

    // users
    Route::post('/optredens/{performance}/leden', 'UsersPerformanceController@update')              ->name('usersPerformances.update');
    Route::get('/optredens/{performance}/updateStatus', 'UsersPerformanceController@updateStatus')  ->name('usersPerformances.updateStatus');
    Route::post('/repetities/{rehearsal}/leden', 'UsersRehearsalController@update')                 ->name('usersRehearsals.update');
    Route::post('/repetities/leden/updateStatus', 'UsersRehearsalController@updateStatus')          ->name('usersRehearsals.updateStatus');

    // members
    Route::get('/leden', 'UserController@index')                                                    ->name('members.index');
    Route::get('/leden/nieuw', 'UserController@create')                                             ->name('members.create');
    Route::get('/leden/printAllUsers', 'UserController@printAllUsers')                              ->name('members.printAllUsers');
    Route::post('/leden/opslaan', 'UserController@store')                                           ->name('members.store');
    Route::get('/leden/{members}', 'UserController@show')                                           ->name('members.show');
    Route::post('/leden/{members}', 'UserController@update')                                        ->name('members.update');


});
