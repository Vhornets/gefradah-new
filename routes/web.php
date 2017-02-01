<?php
Route::get('/', function () {
    return view('index');
});

Route::any('/r{js_route?}', function(){
    return view('index');
})->where('js_route', '[\/\w\.-]*');

Route::group(['prefix' => 'api'], function () {
    Route::get('releases', 'ReleaseController@index');
    Route::get('releases/{release}', 'ReleaseController@show');
    Route::get('menus', 'MenuController@index');
    Route::get('sociallinks', 'SocialLinkController@index');
    Route::get('pages', 'PageController@index');
    Route::get('pages/{slug}', 'PageController@show');
    Route::post('contact', 'ContactController@sendFeedback');
});

Route::group(['prefix' => 'admin'], function () {
    // Login Routes
    Route::get('login', ['as' => 'login', 'uses' => 'Auth\LoginController@showLoginForm']);
    Route::post('login', ['as' => 'login.post', 'uses' => 'Auth\LoginController@login']);
    Route::post('logout', ['as' => 'logout', 'uses' => 'Auth\LoginController@logout']);

    // Registration Routes
    Route::get('register', ['as' => 'register', 'uses' => 'Auth\RegisterController@showRegistrationForm']);
    Route::post('register', ['as' => 'register.post', 'uses' => 'Auth\RegisterController@register']);

    // Password Reset Routes
    Route::get('password/reset', ['as' => 'password.reset', 'uses' => 'Auth\ForgotPasswordController@showLinkRequestForm']);
    Route::post('password/email', ['as' => 'password.email', 'uses' => 'Auth\ForgotPasswordController@sendResetLinkEmail']);
    Route::get('password/reset/{token}', ['as' => 'password.reset.token', 'uses' => 'Auth\ResetPasswordController@showResetForm']);
    Route::post('password/reset', ['as' => 'password.reset.post', 'uses' => 'Auth\ResetPasswordController@reset']);    
});

Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {
    Route::resource('releases', 'Admin\ReleaseController');
    Route::resource('releases.downloads', 'Admin\DownloadController');
    Route::resource('releases.images', 'Admin\ImageController');
    Route::resource('menus', 'Admin\MenuController');
    Route::resource('sociallinks', 'Admin\SocialLinkController');
    Route::resource('pages', 'Admin\PageController');
});