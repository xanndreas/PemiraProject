<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:api']], function () {
    // Permissions
    Route::apiResource('permissions', 'PermissionsApiController');

    // Roles
    Route::apiResource('roles', 'RolesApiController');

    // Users
    Route::apiResource('users', 'UsersApiController');

    // Prodis
    Route::apiResource('prodis', 'ProdiApiController');

    // Prodi Jurusans
    Route::apiResource('prodi-jurusans', 'ProdiJurusanApiController');

    // Categories
    Route::apiResource('categories', 'CategoryApiController');

    // Candidates
    Route::post('candidates/media', 'CandidateApiController@storeMedia')->name('candidates.storeMedia');
    Route::apiResource('candidates', 'CandidateApiController');

    // Data Pemilihans
    Route::apiResource('data-pemilihans', 'DataPemilihanApiController');
});