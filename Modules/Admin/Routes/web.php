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

Route::prefix('dashboard')->name('dashboard.')->group(function() {

    Route::namespace('Auth')->group(function () {

        //Login Routes
        Route::get('/login', 'AdminLoginController@showLoginForm')->name('login');
        Route::post('/login', 'AdminLoginController@login');
        Route::get('/logout', 'AdminLoginController@logout')->name('logout');

        //Forgot Password Routes
        Route::get('/password/reset', 'AdminForgotPasswordController@showLinkRequestForm')->name('password.request');
        Route::post('/password/email', 'AdminForgotPasswordController@sendResetLinkEmail')->name('password.email');

        //Reset Password Routes
        Route::get('/password/reset/{token}', 'AdminResetPasswordController@showResetForm')->name('password.reset');
        Route::post('/password/reset', 'AdminResetPasswordController@reset')->name('password.update');
    });
});

Route::middleware(["auth.admin:admin", "admin.permissions:admin"])->group(function(){

    Route::prefix('admin')->group(function() {

        Route::get('/dashboard','AdminController@index')->name('admin.dashboard');

        Route::get('/admin','AdminController@index')->name('admin.index');
        Route::post('/admin','AdminController@index')->name('admin.fetch');
        Route::get('/admin/trash', 'AdminController@trash')->name('admin.list.trash');
        Route::post('/admin/trash', 'AdminController@trash')->name('admin.list.trash');
        Route::get('/admin/create','AdminController@create')->name('admin.create');
        Route::post('/admin/create','AdminController@store')->name('admin.store');
        Route::get('/admin/view/{id}','AdminController@show')->name('admin.view');
        Route::get('/admin/edit/{id}','AdminController@edit')->name('admin.edit');
        Route::post('/admin/edit/{id}','AdminController@update')->name('admin.update');
        Route::post('/admin/delete/{id}','AdminController@delete')->name('admin.delete');
        Route::post('/admin/restore/{id}','AdminController@restore')->name('admin.restore');
        Route::post('/admin/search_data','AdminController@searchData')->name('admin.search.data');

        Route::get('/admin_role','AdminRoleController@index')->name('admin_role.index');
        Route::post('/admin_role','AdminRoleController@index')->name('admin_role.fetch');
        Route::get('/admin_role/trash', 'AdminRoleController@trash')->name('admin_role.list.trash');
        Route::post('/admin_role/trash', 'AdminRoleController@trash')->name('admin_role.list.trash');
        Route::get('/admin_role/create','AdminRoleController@create')->name('admin_role.create');
        Route::post('/admin_role/create','AdminRoleController@store')->name('admin_role.store');
        Route::get('/admin_role/view/{id}','AdminRoleController@show')->name('admin_role.view');
        Route::get('/admin_role/edit/{id}','AdminRoleController@edit')->name('admin_role.edit');
        Route::post('/admin_role/edit/{id}','AdminRoleController@update')->name('admin_role.update');
        Route::post('/admin_role/delete/{id}','AdminRoleController@delete')->name('admin_role.delete');
        Route::post('/admin_role/restore/{id}','AdminRoleController@restore')->name('admin_role.restore');
        Route::post('/admin_role/search_data','AdminRoleController@searchData')->name('admin_role.search.data');

        Route::get('/admin_permission_system','AdminPermissionSystemController@index')->name('admin_permission_system.index');
        Route::post('/admin_permission_system','AdminPermissionSystemController@index')->name('admin_permission_system.fetch');
        Route::get('/admin_permission_system/trash', 'AdminPermissionSystemController@trash')->name('admin_permission_system.list.trash');
        Route::post('/admin_permission_system/trash', 'AdminPermissionSystemController@trash')->name('admin_permission_system.list.trash');
        Route::get('/admin_permission_system/create','AdminPermissionSystemController@create')->name('admin_permission_system.create');
        Route::post('/admin_permission_system/create','AdminPermissionSystemController@store')->name('admin_permission_system.store');
        Route::get('/admin_permission_system/view/{id}','AdminPermissionSystemController@show')->name('admin_permission_system.view');
        Route::get('/admin_permission_system/edit/{id}','AdminPermissionSystemController@edit')->name('admin_permission_system.edit');
        Route::post('/admin_permission_system/edit/{id}','AdminPermissionSystemController@update')->name('admin_permission_system.update');
        Route::post('/admin_permission_system/delete/{id}','AdminPermissionSystemController@delete')->name('admin_permission_system.delete');
        Route::post('/admin_permission_system/restore/{id}','AdminPermissionSystemController@restore')->name('admin_permission_system.restore');
        Route::post('/admin_permission_system/search_data','AdminPermissionSystemController@searchData')->name('admin_permission_system.search.data');

        Route::get('/admin_permission_module/{admin_perm_system_id}','AdminPermissionModuleController@index')->name('admin_permission_module.index');
        Route::post('/admin_permission_module/{admin_perm_system_id}','AdminPermissionModuleController@index')->name('admin_permission_module.fetch');
        Route::get('/admin_permission_module/trash/{admin_perm_system_id}', 'AdminPermissionModuleController@trash')->name('admin_permission_module.list.trash');
        Route::post('/admin_permission_module/trash/{admin_perm_system_id}', 'AdminPermissionModuleController@trash')->name('admin_permission_module.list.trash');
        Route::get('/admin_permission_module/create/{admin_perm_system_id}','AdminPermissionModuleController@create')->name('admin_permission_module.create');
        Route::post('/admin_permission_module/create/{admin_perm_system_id}','AdminPermissionModuleController@store')->name('admin_permission_module.store');
        Route::get('/admin_permission_module/view/{id}','AdminPermissionModuleController@show')->name('admin_permission_module.view');
        Route::get('/admin_permission_module/edit/{id}','AdminPermissionModuleController@edit')->name('admin_permission_module.edit');
        Route::post('/admin_permission_module/edit/{id}','AdminPermissionModuleController@update')->name('admin_permission_module.update');
        Route::post('/admin_permission_module/delete/{id}','AdminPermissionModuleController@delete')->name('admin_permission_module.delete');
        Route::post('/admin_permission_module/restore/{id}','AdminPermissionModuleController@restore')->name('admin_permission_module.restore');
        Route::post('/admin_permission_module/search_data','AdminPermissionModuleController@searchData')->name('admin_permission_module.search.data');

        Route::get('/admin_permission_group/{admin_perm_module_id}','AdminPermissionGroupController@index')->name('admin_permission_group.index');
        Route::post('/admin_permission_group/{admin_perm_module_id}','AdminPermissionGroupController@index')->name('admin_permission_group.fetch');
        Route::get('/admin_permission_group/trash/{admin_perm_module_id}', 'AdminPermissionGroupController@trash')->name('admin_permission_group.list.trash');
        Route::post('/admin_permission_group/trash/{admin_perm_module_id}', 'AdminPermissionGroupController@trash')->name('admin_permission_group.list.trash');
        Route::get('/admin_permission_group/create/{admin_perm_module_id}','AdminPermissionGroupController@create')->name('admin_permission_group.create');
        Route::post('/admin_permission_group/create/{admin_perm_module_id}','AdminPermissionGroupController@store')->name('admin_permission_group.store');
        Route::get('/admin_permission_group/view/{id}','AdminPermissionGroupController@show')->name('admin_permission_group.view');
        Route::get('/admin_permission_group/edit/{id}','AdminPermissionGroupController@edit')->name('admin_permission_group.edit');
        Route::post('/admin_permission_group/edit/{id}','AdminPermissionGroupController@update')->name('admin_permission_group.update');
        Route::post('/admin_permission_group/delete/{id}','AdminPermissionGroupController@delete')->name('admin_permission_group.delete');
        Route::post('/admin_permission_group/restore/{id}','AdminPermissionGroupController@restore')->name('admin_permission_group.restore');
        Route::post('/admin_permission_group/search_data','AdminPermissionGroupController@searchData')->name('admin_permission_group.search.data');

        Route::get('/admin_system_permission/{admin_perm_group_id}','AdminSystemPermissionController@index')->name('admin_system_permission.index');
        Route::post('/admin_system_permission/{admin_perm_group_id}','AdminSystemPermissionController@index')->name('admin_system_permission.fetch');
        Route::get('/admin_system_permission/trash/{admin_perm_group_id}', 'AdminSystemPermissionController@trash')->name('admin_system_permission.list.trash');
        Route::post('/admin_system_permission/trash/{admin_perm_group_id}', 'AdminSystemPermissionController@trash')->name('admin_system_permission.list.trash');
        Route::get('/admin_system_permission/create/{admin_perm_group_id}','AdminSystemPermissionController@create')->name('admin_system_permission.create');
        Route::post('/admin_system_permission/create/{admin_perm_group_id}','AdminSystemPermissionController@store')->name('admin_system_permission.store');
        Route::get('/admin_system_permission/view/{id}','AdminSystemPermissionController@show')->name('admin_system_permission.view');
        Route::get('/admin_system_permission/edit/{id}','AdminSystemPermissionController@edit')->name('admin_system_permission.edit');
        Route::post('/admin_system_permission/edit/{id}','AdminSystemPermissionController@update')->name('admin_system_permission.update');
        Route::post('/admin_system_permission/delete/{id}','AdminSystemPermissionController@delete')->name('admin_system_permission.delete');
        Route::post('/admin_system_permission/restore/{id}','AdminSystemPermissionController@restore')->name('admin_system_permission.restore');
        Route::post('/admin_system_permission/search_data','AdminSystemPermissionController@searchData')->name('admin_system_permission.search.data');
    });
});
