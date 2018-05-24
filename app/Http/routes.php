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
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');
//Route::get('/test', 'WelcomeController@index');
Route::get('nihao', function () {
    return QrCode::size(100)->generate('Hello,LaravelAcademy!');
});

/*
Route::get('user/{id}', function ($id) {
    return 'User '.$id;
});
*/
Route::resource('test', 'WelcomeController');
Route::controller('welcome', 'WelcomeController');
//Route::get('/test/index', 'WelcomeController@index')->name('test.index');
/*
Route::get('user/profile', [
    'as' => 'profile', 'uses' => 'WelcomeController@index'
]);

Route::get('user/{id}/profile', ['as' => 'profile', function ($id) {
    //
}]);
$url = route('profile', ['id' => 1]);
echo $url;
*/