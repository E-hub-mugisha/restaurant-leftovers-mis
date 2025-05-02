<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\LeftoverController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('front-page.about');
Route::get('/contact', [HomeController::class, 'contact'])->name('front-page.contact');

Route::get('/leftovers', [LeftoverController::class, 'frontendLeftovers'])->name('front-page.leftovers');
Route::post('/leftovers/reserve/{id}', [LeftoverController::class, 'frontendReserveLeftovers'])->name('front-page.leftovers.reserve')->middleware('auth');

Route::post('/leftovers/subscribe', [App\Http\Controllers\Frontend\HomeController::class, 'store'])->name('leftovers.subscribe')->middleware('auth');

Route::get('/menu', [App\Http\Controllers\Frontend\MenuController::class, 'index'])->name('front-page.menu.index');
Route::get('/menu/{id}', [App\Http\Controllers\Frontend\MenuController::class, 'show'])->name('front-page.menu.show');
Route::post('/feedback/{menu}', [App\Http\Controllers\Frontend\MenuController::class, 'store'])->name('feedback.store');
Route::get('/menu/reservations/{id}', [App\Http\Controllers\Frontend\MenuController::class, 'reservations'])->name('menu.reservation');
Route::post('/menu/reservations/store/{id}', [App\Http\Controllers\Frontend\MenuController::class, 'storeReservation'])->name('menu.reservation.store')->middleware('auth');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth',])->group(function () {
    Route::get('/admin/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin.dashboard.index');
    Route::get('/admin/menus', [App\Http\Controllers\Admin\MenuController::class, 'index'])->name('admin.menus.index');
    Route::post('/admin/menus/store', [App\Http\Controllers\Admin\MenuController::class, 'store'])->name('admin.menus.store');
    Route::delete('/admin/menus/destroy/{menu}', [App\Http\Controllers\Admin\MenuController::class, 'destroy'])->name('admin.menus.destroy');
    Route::put('/admin/menus/update/{menu}', [App\Http\Controllers\Admin\MenuController::class, 'update'])->name('admin.menus.update');

    Route::get('/admin/menu-feedback', [App\Http\Controllers\Admin\MenuController::class, 'indexFeedback'])->name('admin.menu_feedback.index');
    Route::get('/admin/menu-feedback/{id}', [App\Http\Controllers\Admin\MenuController::class, 'showFeedback'])->name('admin.menu_feedback.show');
    Route::put('/admin/menu-feedback/{id}', [App\Http\Controllers\Admin\MenuController::class, 'updateFeedback'])->name('admin.menu_feedback.update');
    Route::delete('/admin/menu-feedback/{id}', [App\Http\Controllers\Admin\MenuController::class, 'destroyFeedback'])->name('admin.menu_feedback.destroy');
    Route::get('/admin/menu/reservations', [App\Http\Controllers\Admin\MenuController::class, 'indexReservations'])->name('admin.menu_reservations.index');
    Route::put('/admin/menu-reservations/{id}/update-status', [App\Http\Controllers\Admin\MenuController::class, 'updateStatus'])->name('admin.menu_reservations.updateStatus');
    Route::delete('/admin/menu-reservations/{id}/destroy', [App\Http\Controllers\Admin\MenuController::class, 'destroyReservation'])->name('admin.menu_reservations.destroy');

    Route::get('/admin/leftovers', [App\Http\Controllers\Admin\LeftoverController::class, 'index'])->name('admin.leftovers.index');
    Route::post('/admin/leftovers/store', [App\Http\Controllers\Admin\LeftoverController::class, 'store'])->name('admin.leftovers.store');
    Route::delete('/admin/leftovers/destroy/{leftover}', [App\Http\Controllers\Admin\LeftoverController::class, 'destroy'])->name('admin.leftovers.destroy');
    Route::get('/admin/leftovers/update/{leftover}', [App\Http\Controllers\Admin\LeftoverController::class, 'update'])->name('admin.leftovers.update');
    Route::get('/admin/leftovers/{id}/reservations', [App\Http\Controllers\Admin\LeftoverController::class, 'showReservations'])->name('admin.leftovers.reservations');
    Route::get('/admin/leftovers/generate-report', [App\Http\Controllers\Admin\LeftoverController::class, 'generateReport'])->name('leftovers.report.generate');
    Route::post('/admin/leftovers/export-report', [App\Http\Controllers\Admin\LeftoverController::class, 'exportReport'])->name('leftovers.report.export');


    Route::get('/admin/users', [App\Http\Controllers\Admin\UsersController::class, 'index'])->name('admin.users.index');
    Route::get('/users/{id}/reservations', [App\Http\Controllers\Admin\UsersController::class, 'userReservations'])->name('admin.users.reservations');
    Route::get('/admin/reservations', [App\Http\Controllers\Admin\UsersController::class, 'reservations'])->name('admin.reservations.index');
    Route::get('/admin/subscribers', [App\Http\Controllers\Admin\UsersController::class, 'usersSubscription'])->name('admin.subscribers.index');
    Route::put('/reservations/{id}/status', [App\Http\Controllers\Admin\UsersController::class, 'updateStatus'])->name('admin.reservations.updateStatus');
    Route::delete('/reservations/{id}/destroy', [App\Http\Controllers\Admin\UsersController::class, 'destroy'])->name('admin.reservations.destroy');
    Route::put('/admin/reservations/{id}', [App\Http\Controllers\Admin\UsersController::class, 'updateReservation'])->name('admin.reservations.update');

    Route::get('/admin/buffets', [App\Http\Controllers\Admin\BuffetController::class, 'index'])->name('admin.buffets.index');
    Route::get('/admin/buffets/create', [App\Http\Controllers\Admin\BuffetController::class, 'create'])->name('admin.buffets.create');
    Route::post('/admin/buffets/store', [App\Http\Controllers\Admin\BuffetController::class, 'store'])->name('admin.buffets.store');
    Route::get('/admin/buffets/edit/{id}', [App\Http\Controllers\Admin\BuffetController::class, 'edit'])->name('admin.buffets.edit');
    Route::put('/admin/buffets/update/{id}', [App\Http\Controllers\Admin\BuffetController::class, 'update'])->name('admin.buffets.update');
    Route::delete('/admin/buffets/destroy/{id}', [App\Http\Controllers\Admin\BuffetController::class, 'destroy'])->name('admin.buffets.destroy');

    Route::get('/admin/settings', [App\Http\Controllers\Admin\RestaurantSettingController::class, 'edit'])->name('admin.settings.edit');
    Route::post('/admin/settings', [App\Http\Controllers\Admin\RestaurantSettingController::class, 'update'])->name('admin.settings.update');

});


require __DIR__ . '/auth.php';
