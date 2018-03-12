<?php



Route::group(['roles' => ['vip', '1', '2', '3'],'middleware' => 'web', 'prefix' => 'member', 'namespace' => 'Modules\Member\Http\Controllers'], function()
{
    Route::any('login', 'LoginController@login');
//    Route::any('generate_password', 'LoginController@generate_password');
    Route::any('quit', 'LoginController@quit')->middleware('login.judgment');

    Route::resource('/', 'MemberController@')->middleware('login.judgment');
});

Route::group(['roles' => ['member', 'manager', 'admin'],'middleware' => ['web','admin.login.judgment'], 'namespace' => 'Modules\Member\Http\Controllers'], function()
{
    Route::resource('member', 'MemberController');
    //連動表單城市
    Route::any('city', 'MemberController@city');
    //連動表單地區
    Route::any('area', 'MemberController@area');
});
