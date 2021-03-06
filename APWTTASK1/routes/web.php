<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControllerPages;
use App\Http\Controllers\StudentController;
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



/*Route::get('/', function () {
    return view('welcome');
});*/

 Route::get('/home',[ControllerPages::class,'home'])->name('home');
 Route::get('/service',[ControllerPages::class,'service'])->name('service');
 Route::get('/ourTeam',[ControllerPages::class,'teams'])->name('our team');
 Route::get('/aboutUs',[ControllerPages::class,'aboutUs'])->name('about us');
 Route::get('/contactUs',[ControllerPages::class,'contactUs'])->name('contactUs');

 //2nd class

 Route::get('/studentlist',[StudentController::class,'studentlist'])->name('studentlist');
 Route::get('/studentCreate',[StudentController::class,'studentCreate'])->name('studentCreate');
 Route::post('/studentCreate',[StudentController::class,'studentCreatesubmitted'])->name('studentCreate');