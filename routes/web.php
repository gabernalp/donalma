<?php

Route::redirect('/', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Route::get('userVerification/{token}', 'UserVerificationController@approve')->name('userVerification');
Auth::routes();

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth', '2fa']], function () {
    Route::get('/', 'HomeController@index')->name('home');
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

    // Content Category
    Route::delete('content-categories/destroy', 'ContentCategoryController@massDestroy')->name('content-categories.massDestroy');
    Route::resource('content-categories', 'ContentCategoryController');

    // Content Tag
    Route::delete('content-tags/destroy', 'ContentTagController@massDestroy')->name('content-tags.massDestroy');
    Route::resource('content-tags', 'ContentTagController');

    // Content Page
    Route::delete('content-pages/destroy', 'ContentPageController@massDestroy')->name('content-pages.massDestroy');
    Route::post('content-pages/media', 'ContentPageController@storeMedia')->name('content-pages.storeMedia');
    Route::post('content-pages/ckmedia', 'ContentPageController@storeCKEditorImages')->name('content-pages.storeCKEditorImages');
    Route::post('content-pages/parse-csv-import', 'ContentPageController@parseCsvImport')->name('content-pages.parseCsvImport');
    Route::post('content-pages/process-csv-import', 'ContentPageController@processCsvImport')->name('content-pages.processCsvImport');
    Route::resource('content-pages', 'ContentPageController');

    // Departments
    Route::delete('departments/destroy', 'DepartmentsController@massDestroy')->name('departments.massDestroy');
    Route::post('departments/parse-csv-import', 'DepartmentsController@parseCsvImport')->name('departments.parseCsvImport');
    Route::post('departments/process-csv-import', 'DepartmentsController@processCsvImport')->name('departments.processCsvImport');
    Route::resource('departments', 'DepartmentsController');

    // Cities
    Route::delete('cities/destroy', 'CitiesController@massDestroy')->name('cities.massDestroy');
    Route::post('cities/parse-csv-import', 'CitiesController@parseCsvImport')->name('cities.parseCsvImport');
    Route::post('cities/process-csv-import', 'CitiesController@processCsvImport')->name('cities.processCsvImport');
    Route::resource('cities', 'CitiesController');

    // Document Types
    Route::delete('document-types/destroy', 'DocumentTypesController@massDestroy')->name('document-types.massDestroy');
    Route::resource('document-types', 'DocumentTypesController');

    // Types
    Route::delete('types/destroy', 'TypesController@massDestroy')->name('types.massDestroy');
    Route::post('types/media', 'TypesController@storeMedia')->name('types.storeMedia');
    Route::post('types/ckmedia', 'TypesController@storeCKEditorImages')->name('types.storeCKEditorImages');
    Route::resource('types', 'TypesController');

    // Organizations
    Route::delete('organizations/destroy', 'OrganizationsController@massDestroy')->name('organizations.massDestroy');
    Route::post('organizations/media', 'OrganizationsController@storeMedia')->name('organizations.storeMedia');
    Route::post('organizations/ckmedia', 'OrganizationsController@storeCKEditorImages')->name('organizations.storeCKEditorImages');
    Route::post('organizations/parse-csv-import', 'OrganizationsController@parseCsvImport')->name('organizations.parseCsvImport');
    Route::post('organizations/process-csv-import', 'OrganizationsController@processCsvImport')->name('organizations.processCsvImport');
    Route::resource('organizations', 'OrganizationsController');

    // Donations
    Route::delete('donations/destroy', 'DonationsController@massDestroy')->name('donations.massDestroy');
    Route::post('donations/media', 'DonationsController@storeMedia')->name('donations.storeMedia');
    Route::post('donations/ckmedia', 'DonationsController@storeCKEditorImages')->name('donations.storeCKEditorImages');
    Route::resource('donations', 'DonationsController');

    // Transactions
    Route::delete('transactions/destroy', 'TransactionsController@massDestroy')->name('transactions.massDestroy');
    Route::resource('transactions', 'TransactionsController');

    // Projects
    Route::delete('projects/destroy', 'ProjectsController@massDestroy')->name('projects.massDestroy');
    Route::post('projects/media', 'ProjectsController@storeMedia')->name('projects.storeMedia');
    Route::post('projects/ckmedia', 'ProjectsController@storeCKEditorImages')->name('projects.storeCKEditorImages');
    Route::resource('projects', 'ProjectsController');

    // Automatic Debts
    Route::delete('automatic-debts/destroy', 'AutomaticDebtsController@massDestroy')->name('automatic-debts.massDestroy');
    Route::resource('automatic-debts', 'AutomaticDebtsController');

    // User Alerts
    Route::delete('user-alerts/destroy', 'UserAlertsController@massDestroy')->name('user-alerts.massDestroy');
    Route::get('user-alerts/read', 'UserAlertsController@read');
    Route::resource('user-alerts', 'UserAlertsController', ['except' => ['edit', 'update']]);

    // Global Obj
    Route::delete('global-objs/destroy', 'GlobalObjController@massDestroy')->name('global-objs.massDestroy');
    Route::resource('global-objs', 'GlobalObjController');

    // Countries
    Route::delete('countries/destroy', 'CountriesController@massDestroy')->name('countries.massDestroy');
    Route::post('countries/parse-csv-import', 'CountriesController@parseCsvImport')->name('countries.parseCsvImport');
    Route::post('countries/process-csv-import', 'CountriesController@processCsvImport')->name('countries.processCsvImport');
    Route::resource('countries', 'CountriesController');

    // Events
    Route::delete('events/destroy', 'EventsController@massDestroy')->name('events.massDestroy');
    Route::post('events/media', 'EventsController@storeMedia')->name('events.storeMedia');
    Route::post('events/ckmedia', 'EventsController@storeCKEditorImages')->name('events.storeCKEditorImages');
    Route::post('events/parse-csv-import', 'EventsController@parseCsvImport')->name('events.parseCsvImport');
    Route::post('events/process-csv-import', 'EventsController@processCsvImport')->name('events.processCsvImport');
    Route::resource('events', 'EventsController');

    // Testimony
    Route::delete('testimonies/destroy', 'TestimonyController@massDestroy')->name('testimonies.massDestroy');
    Route::post('testimonies/media', 'TestimonyController@storeMedia')->name('testimonies.storeMedia');
    Route::post('testimonies/ckmedia', 'TestimonyController@storeCKEditorImages')->name('testimonies.storeCKEditorImages');
    Route::resource('testimonies', 'TestimonyController');

    // Action
    Route::delete('actions/destroy', 'ActionController@massDestroy')->name('actions.massDestroy');
    Route::post('actions/media', 'ActionController@storeMedia')->name('actions.storeMedia');
    Route::post('actions/ckmedia', 'ActionController@storeCKEditorImages')->name('actions.storeCKEditorImages');
    Route::post('actions/parse-csv-import', 'ActionController@parseCsvImport')->name('actions.parseCsvImport');
    Route::post('actions/process-csv-import', 'ActionController@processCsvImport')->name('actions.processCsvImport');
    Route::resource('actions', 'ActionController');

    // Action Address
    Route::delete('action-addresses/destroy', 'ActionAddressController@massDestroy')->name('action-addresses.massDestroy');
    Route::post('action-addresses/media', 'ActionAddressController@storeMedia')->name('action-addresses.storeMedia');
    Route::post('action-addresses/ckmedia', 'ActionAddressController@storeCKEditorImages')->name('action-addresses.storeCKEditorImages');
    Route::post('action-addresses/parse-csv-import', 'ActionAddressController@parseCsvImport')->name('action-addresses.parseCsvImport');
    Route::post('action-addresses/process-csv-import', 'ActionAddressController@processCsvImport')->name('action-addresses.processCsvImport');
    Route::resource('action-addresses', 'ActionAddressController');

    Route::get('system-calendar', 'SystemCalendarController@index')->name('systemCalendar');
    Route::get('global-search', 'GlobalSearchController@search')->name('globalSearch');
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth', '2fa']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
        Route::post('profile/two-factor', 'ChangePasswordController@toggleTwoFactor')->name('password.toggleTwoFactor');
    }
});
Route::group(['namespace' => 'Auth', 'middleware' => ['auth', '2fa']], function () {
    // Two Factor Authentication
    if (file_exists(app_path('Http/Controllers/Auth/TwoFactorController.php'))) {
        Route::get('two-factor', 'TwoFactorController@show')->name('twoFactor.show');
        Route::post('two-factor', 'TwoFactorController@check')->name('twoFactor.check');
        Route::get('two-factor/resend', 'TwoFactorController@resend')->name('twoFactor.resend');
    }
});
