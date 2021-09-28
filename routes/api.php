<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:sanctum']], function () {
    // Permissions
    Route::apiResource('permissions', 'PermissionsApiController');

    // Roles
    Route::apiResource('roles', 'RolesApiController');

    // Users
    Route::apiResource('users', 'UsersApiController');

    // Content Category
    Route::apiResource('content-categories', 'ContentCategoryApiController');

    // Content Tag
    Route::apiResource('content-tags', 'ContentTagApiController');

    // Content Page
    Route::post('content-pages/media', 'ContentPageApiController@storeMedia')->name('content-pages.storeMedia');
    Route::apiResource('content-pages', 'ContentPageApiController');

    // Departments
    Route::apiResource('departments', 'DepartmentsApiController');

    // Cities
    Route::apiResource('cities', 'CitiesApiController');

    // Document Types
    Route::apiResource('document-types', 'DocumentTypesApiController');

    // Types
    Route::post('types/media', 'TypesApiController@storeMedia')->name('types.storeMedia');
    Route::apiResource('types', 'TypesApiController');

    // Organizations
    Route::post('organizations/media', 'OrganizationsApiController@storeMedia')->name('organizations.storeMedia');
    Route::apiResource('organizations', 'OrganizationsApiController');

    // Donations
    Route::post('donations/media', 'DonationsApiController@storeMedia')->name('donations.storeMedia');
    Route::apiResource('donations', 'DonationsApiController');

    // Transactions
    Route::apiResource('transactions', 'TransactionsApiController');

    // Projects
    Route::post('projects/media', 'ProjectsApiController@storeMedia')->name('projects.storeMedia');
    Route::apiResource('projects', 'ProjectsApiController');

    // Automatic Debts
    Route::apiResource('automatic-debts', 'AutomaticDebtsApiController');

    // Countries
    Route::apiResource('countries', 'CountriesApiController');

    // Events
    Route::post('events/media', 'EventsApiController@storeMedia')->name('events.storeMedia');
    Route::apiResource('events', 'EventsApiController');

    // Testimony
    Route::post('testimonies/media', 'TestimonyApiController@storeMedia')->name('testimonies.storeMedia');
    Route::apiResource('testimonies', 'TestimonyApiController');

    // Action
    Route::post('actions/media', 'ActionApiController@storeMedia')->name('actions.storeMedia');
    Route::apiResource('actions', 'ActionApiController');

    // Action Address
    Route::post('action-addresses/media', 'ActionAddressApiController@storeMedia')->name('action-addresses.storeMedia');
    Route::apiResource('action-addresses', 'ActionAddressApiController');
});
