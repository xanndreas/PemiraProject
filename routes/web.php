<?php

Route::redirect('/', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Auth::routes(['register' => false]);
// Admin

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('user-alerts/read', 'UserAlertsController@read');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::post('users/parse-csv-import', 'UsersController@parseCsvImport')->name('users.parseCsvImport');
    Route::post('users/process-csv-import', 'UsersController@processCsvImport')->name('users.processCsvImport');
    Route::resource('users', 'UsersController');

    // Audit Logs
    Route::resource('audit-logs', 'AuditLogsController', ['except' => ['create', 'store', 'edit', 'update', 'destroy']]);

    // User Alerts
    Route::delete('user-alerts/destroy', 'UserAlertsController@massDestroy')->name('user-alerts.massDestroy');
    Route::resource('user-alerts', 'UserAlertsController', ['except' => ['edit', 'update']]);

    // Prodis
    Route::delete('prodis/destroy', 'ProdiController@massDestroy')->name('prodis.massDestroy');
    Route::resource('prodis', 'ProdiController');

    // Prodi Jurusans
    Route::delete('prodi-jurusans/destroy', 'ProdiJurusanController@massDestroy')->name('prodi-jurusans.massDestroy');
    Route::resource('prodi-jurusans', 'ProdiJurusanController');

    // Categories
    Route::delete('categories/destroy', 'CategoryController@massDestroy')->name('categories.massDestroy');
    Route::resource('categories', 'CategoryController');

    // Candidates
    Route::delete('candidates/destroy', 'CandidateController@massDestroy')->name('candidates.massDestroy');
    Route::post('candidates/media', 'CandidateController@storeMedia')->name('candidates.storeMedia');
    Route::post('candidates/ckmedia', 'CandidateController@storeCKEditorImages')->name('candidates.storeCKEditorImages');
    Route::resource('candidates', 'CandidateController');

    // Data Pemilihans
    Route::delete('data-pemilihans/destroy', 'DataPemilihanController@massDestroy')->name('data-pemilihans.massDestroy');
    Route::resource('data-pemilihans', 'DataPemilihanController');

    // Tahapans
    Route::delete('tahapans/destroy', 'TahapanController@massDestroy')->name('tahapans.massDestroy');
    Route::resource('tahapans', 'TahapanController');
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
    }
});
