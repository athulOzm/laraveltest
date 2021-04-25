<?php

use App\Http\Controllers\MemberController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';


//member manage

Route::get('/member/create', [MemberController::class, 'create'])->name('member.create');
Route::post('/member', [MemberController::class, 'store'])->name('member.store');

Route::middleware(['auth'])->group(function () {

    Route::get('/members', [MemberController::class, 'index'])->name('member.index');
});

