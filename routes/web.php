<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmailController;

use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\Auth\EmailVerifyController;

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

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::get('/admin', 'AdminController@index')->name('admin');

Route::put("/admin/{id}", [AdminController::class, 'premium'])->name('admin.premium');

Route::delete("/admin/{id}", [AdminController::class, 'destroy'])->name('admin.destroy');

Route::put("/website/{id}", [WebsiteController::class, 'publish'])->name('website.publish');

Route::resources([
    'website' => 'WebsiteController',
]);

Route::get('/page/{slug}', [WebsiteController::class, 'view'])->name('website.view');

// Route::get('/send-email', [EmailController::class, 'index']);
Route::get('register-success', function () {
    return view('auth.register-success');
});
Route::get('/verify/{code}', [EmailVerifyController::class, 'verify'])->name('email.verify');
