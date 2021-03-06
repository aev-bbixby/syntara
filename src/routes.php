<?php

Route::group(array('before' => 'basicAuth', 'prefix' => 'dashboard'), function()
{
    Route::get('', array('as' => 'indexDashboard', 'uses' => 'MrJuliuss\Syntara\Controllers\DashboardController@getIndex'));
    Route::get('logout', array('as' => 'logout', 'uses' => 'MrJuliuss\Syntara\Controllers\DashboardController@getLogout'));
    Route::get('access-denied', array('as' => 'accessDenied', 'uses' => 'MrJuliuss\Syntara\Controllers\DashboardController@getAccessDenied'));
});

Route::group(array('before' => 'basicAuth|hasPermissions', 'prefix' => 'dashboard'), function()
{
     // Users
    Route::get('users', array('as' => 'listUsers', 'uses' => 'MrJuliuss\Syntara\Controllers\UserController@getIndex'));
    Route::delete('user/{userId}', array('as' => 'deleteUsers', 'uses' => 'MrJuliuss\Syntara\Controllers\UserController@delete'));
    Route::post('user/new', array('as' => 'newUserPost', 'uses' => 'MrJuliuss\Syntara\Controllers\UserController@postCreate'));
    Route::get('user/new', array('as' => 'newUser', 'uses' => 'MrJuliuss\Syntara\Controllers\UserController@getCreate'));
    Route::get('user/{userId}', array('as' => 'showUser', 'uses' => 'MrJuliuss\Syntara\Controllers\UserController@getShow'));
    Route::put('user/{userId}', array('as' => 'putUser', 'uses' => 'MrJuliuss\Syntara\Controllers\UserController@putShow'));
    // Groups
    Route::get('groups', array('as' => 'listGroups', 'uses' => 'MrJuliuss\Syntara\Controllers\GroupController@getIndex'));
    Route::post('group/new', array('as' => 'newGroupPost', 'uses' => 'MrJuliuss\Syntara\Controllers\GroupController@postCreate'));
    Route::get('group/new', array('as' => 'newGroup', 'uses' => 'MrJuliuss\Syntara\Controllers\GroupController@getCreate'));
    Route::delete('group/{groupId}', array('as' => 'deleteGroup', 'uses' => 'MrJuliuss\Syntara\Controllers\GroupController@delete'));
    Route::get('group/{groupId}', array('as' => 'showGroup', 'uses' => 'MrJuliuss\Syntara\Controllers\GroupController@getShow'));
    Route::put('group/{groupId}', array('as' => 'putGroup', 'uses' => 'MrJuliuss\Syntara\Controllers\GroupController@putShow'));
    Route::delete('group/{groupId}/user/{userId}', array('as' => 'deleteUserGroup', 'uses' => 'MrJuliuss\Syntara\Controllers\GroupController@deleteUserFromGroup'));
    Route::post('group/{groupId}/user/{userId}', array('as' => 'addUserGroup', 'uses' => 'MrJuliuss\Syntara\Controllers\GroupController@addUserInGroup'));
    // Permissions
    Route::get('permissions', array('as' => 'listPermissions', 'uses' => 'MrJuliuss\Syntara\Controllers\PermissionController@getIndex'));
    Route::delete('permission/{permissionId}', array('as' => 'deletePermission', 'uses' => 'MrJuliuss\Syntara\Controllers\PermissionController@delete'));
    Route::get('permission/new', array('as' => 'newPermission', 'uses' => 'MrJuliuss\Syntara\Controllers\PermissionController@getCreate'));
    Route::post('permission/new', array('as' => 'newPermissionPost', 'uses' => 'MrJuliuss\Syntara\Controllers\PermissionController@postCreate'));
    Route::get('permission/{permissionId}', array('as' => 'showPermission', 'uses' => 'MrJuliuss\Syntara\Controllers\PermissionController@getShow'));
    Route::put('permission/{permissionId}', array('as' => 'putPermission', 'uses' => 'MrJuliuss\Syntara\Controllers\PermissionController@putShow'));
});

Route::group(array('before' => 'notAuth', 'prefix' => 'dashboard'), function()
{
    Route::get('login', array('as' => 'getLogin', 'uses' => 'MrJuliuss\Syntara\Controllers\DashboardController@getLogin'));
    Route::post('login', array('as' => 'postLogin', 'uses' => 'MrJuliuss\Syntara\Controllers\DashboardController@postLogin'));
});