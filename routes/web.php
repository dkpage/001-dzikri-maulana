<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PortalController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\ReportsController;
use App\Http\Controllers\OutletsController;
use App\Http\Controllers\UserDataController;
use Illuminate\Support\Facades\Route;

Route::get("/session", function () {
    return session()->all();
});

Route::get('/', function () {
    return view('pages.main.welcome');
})->name('homepage');

// AUTH ROUTES
Route::prefix('auth')->name('auth.')->group(function () {
    Route::controller(AuthController::class)->group(function () {
        Route::get('/login', 'index')->name('login');
        Route::post('/authenticate', 'authenticate')->name('authenticate');
        Route::get('/logout', 'logout')->name('logout');
    });
    Route::get('/', function () {
        return redirect()->route('auth.login');
    });
});

// ADMIN ROUTES
Route::prefix('admin')->name('admin.')->middleware(['auth:admin'])->group(function () {
    Route::controller(AdminController::class)->group(function () {
        Route::get('/',  "index")->name("dashboard");
        Route::get('/users_data',  "users_data")->name("users_data");
        Route::get('/outlets_data',  "outlets_data")->name("outlets_data");
        Route::get('/reports_data',  "reports_data")->name("reports_data");
        Route::get('/report_detail/{id}',  "report_detail")->name("report_detail");

        // user management
        Route::get('/add_user',  "add_user")->name("add_user");
        Route::get('/edit_user/{username}',  "edit_user")->name("edit_user");
    });
});


// USER PORTAL ROUTES
Route::prefix("user")->name("user.")->middleware(['auth:user'])->group(function () {
    Route::controller(PortalController::class)->group(function () {
        Route::get('/',  "index")->name("home");
        Route::get('/profile',  "profile")->name("profile");
        Route::get('/report_form',  "report_form")->name("report_form");
        Route::get('/report_data',  "report_data")->name("report_data");
        Route::get('/report_detail/{id}',  "report_detail")->name("report_detail");
        Route::get('/edit_report/{id}',  "edit_report")->name("edit_report");
    });
});


// POST ROUTES USER DATA
Route::prefix("user_data")->name("user_data.")->group(function () {
    Route::controller(UserDataController::class)->group(function () {
        Route::post('/',  "index")->name("index");
        // showing table data
        Route::post('/show_users_table',  "show_users_table")->name("show_users_table");
        // add user
        Route::post('/add_user',  "add_user")->name("add_user");
        // show user
        Route::post('/show_user',  "show_user")->name("show_user");
        // Route::get('/show_user/{id}',  "show_user")->name("show_user");
        // edit user
        Route::post('/edit_user',  "edit_user")->name("edit_user");
        // delete user
        Route::post('/delete_user',  "delete_user")->name("delete_user");
    });
});

// POST ROUTE ROLES DATA 
Route::prefix("role_data")->name("role_data.")->group(function () {
    Route::controller(RolesController::class)->group(function () {
        //show all roles data
        Route::post('/', "index")->name("index");
        //show role
        Route::post('/show', "show")->name("show");
        //form create role
        Route::post('/create', "create")->name("create");
        //store role
        Route::post('/store', "store")->name("store");
        //form edit role
        Route::post('/edit', "edit")->name("edit");
        //update role
        Route::post('/update', "update")->name("update");
        //delete role
        Route::post('/delete', "destroy")->name("delete");
    });
});


// POST ROUTE REPORTS DATA 
Route::prefix("reports")->name("reports.")->group(function () {
    Route::controller(ReportsController::class)->group(function () {
        //show all reports data
        Route::post('/', "index")->name("index");
        //show report
        Route::post('/show', "show")->name("show");
        //form create report
        Route::post('/create', "create")->name("create");
        //store report
        Route::post('/store', "store")->name("store");
        //form edit report
        Route::post('/edit', "edit")->name("edit");
        //update report
        Route::post('/update', "update")->name("update");
        //delete report
        Route::post('/delete', "destroy")->name("delete");
    });
});

// POST ROUTE JOB DATA DATA 
Route::prefix("jod_data")->name("job_data.")->group(function () {
    Route::controller(ReportsController::class)->group(function () {
        //show all roles data
        Route::post('/', "index")->name("index");
        //show role
        Route::post('/show', "show")->name("show");
        //form create role
        Route::post('/create', "create")->name("create");
        //store role
        Route::post('/store', "store")->name("store");
        //form edit role
        Route::post('/edit', "edit")->name("edit");
        //update role
        Route::post('/update', "update")->name("update");
        //delete role
        Route::post('/delete', "destroy")->name("delete");
    });
});


// POST ROUTE OUTLETS DATA 
Route::prefix("outlets")->name("outlets.")->group(function () {
    Route::controller(OutletsController::class)->group(function () {
        //show all roles data
        Route::post('/', "index")->name("index");
        //show role
        Route::post('/show', "show")->name("show");
        //form create role
        Route::post('/create', "create")->name("create");
        //store role
        Route::post('/store', "store")->name("store");
        //form edit role
        Route::post('/edit', "edit")->name("edit");
        //update role
        Route::post('/update', "update")->name("update");
        //delete role
        Route::post('/delete', "destroy")->name("delete");
    });
});

// POST ROUTE JOB POSITION DATA 
Route::prefix("job_position")->name("job_position.")->group(function () {
    Route::controller(OutletsController::class)->group(function () {
        //show all roles data
        Route::post('/', "index")->name("index");
        //show role
        Route::post('/show', "show")->name("show");
        //form create role
        Route::post('/create', "create")->name("create");
        //store role
        Route::post('/store', "store")->name("store");
        //form edit role
        Route::post('/edit', "edit")->name("edit");
        //update role
        Route::post('/update', "update")->name("update");
        //delete role
        Route::post('/delete', "destroy")->name("delete");
    });
});
