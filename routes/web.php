<?php

use App\Models\Destination;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\Home\HomeController;
use App\Http\Controllers\Admin\Auth\AuthController;
use App\Http\Controllers\Admin\Faqs\FaqsController;
use App\Http\Controllers\Admin\Query\QueryController;
use App\Http\Controllers\Admin\Banner\BannerController;
use App\Http\Controllers\Admin\Package\PackageController;
use App\Http\Controllers\Admin\Dashboard\DashboardController;
use App\Http\Controllers\Admin\Destination\DestinationController;

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

Route::redirect('/', 'web/home');
Route::name('web.')->group(function () {
    // Common page routes
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('about', [HomeController::class, 'about'])->name('about');
    Route::get('contact', [HomeController::class, 'contact'])->name('contact');
    // package route
    Route::get('destination/{uuid}/packages',[HomeController::class,'package'])->name('package');
    Route::get('captcha',[HomeController::class,'captcha'])->name('captcha');

    Route::post('query',[HomeController::class,'queryStore'])->name('query');

    // Footer links
    Route::get('privacy-policy',[HomeController::class,'privacyPolicy'])->name('privacy-policy');
    Route::get('shipping',[HomeController::class,'shipping'])->name('shipping');
    Route::get('terms-and-conditions',[HomeController::class,'termsAndConditions'])->name('terms-and-conditions');
});

Route::prefix('admin')->name('admin.')->group(function () {

    Route::middleware('guest')->group(function () {
        Route::get('login', [AuthController::class, 'loginPage'])->name('auth.login');
        Route::post('login', [AuthController::class, 'login'])->name('auth.login');
    });

    Route::middleware('auth', 'revalidateSession')->group(function () {

        Route::get('logout', [AuthController::class, 'logout'])->name('auth.logout');
        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

        Route::post('banner/toggle', [BannerController::class, 'displayBannerToggle'])->name('banner.toggle');
        Route::resource('banner', BannerController::class);

        Route::post('destination/toggle', [DestinationController::class, 'displayDestinationToggle'])->name('destination.toggle');
        Route::post('destination/toggle-featured', [DestinationController::class, 'toggleFeatured'])->name('destination.toggle_featured');
        Route::resource('destination', DestinationController::class);

        Route::post('package/toggle', [PackageController::class, 'displayPackageToggle'])->name('package.toggle');
        Route::post('package/toggle-featured', [PackageController::class, 'toggleFeatured'])->name('package.toggle_featured');
        Route::resource('package', PackageController::class);

        Route::resource('query', QueryController::class);


        // Route::patch('faqs/toggle-status/{uuid}', [FaqsController::class, 'toggleStatus'])->name('faqs.toggleStatus');
        Route::post('faqs/toggle', [FaqsController::class, 'displayFaqsToggle'])->name('faqs.toggle');
        Route::resource('faqs', FaqsController::class);
    });
});

