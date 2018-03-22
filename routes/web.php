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

Route::get('/home1', function () {
    return view('welcome');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/testPost',function(){
    $csrf_token = csrf_token();
    $form = <<<FORM
        <form action="/hello" method="POST">
        	First name:<br>
			<input type="text" name="firstname">
            <input type="hidden" name="_token" value="{$csrf_token}">
            <input type="submit" value="Test"/>
        </form>
FORM;
    return $form;
});

Route::post('/hello',function(){
    echo $_POST['firstname'];
});