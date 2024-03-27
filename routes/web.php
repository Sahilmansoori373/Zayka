<?php

use App\Http\Controllers\dataController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/master', function () {
    return view('masterlayout');
});



Route::controller(dataController::class)->group(function(){
    
    Route::post('/book',  'book')->name('bank');
    
    Route::post('/', 'conta')->name('con');
    
});

route::view('book','/');



// route::view('/Zayka','home')->name('home');    
// route::view('/aboutsection','about')->name('about');
// route::view('/menu','menu')->name('menu');    
// route::view('/events','events')->name('event');    
// route::view('/chef','chef')->name('chef');
// route::view('/gallery','gallery')->name('gallery');    
// route::view('/contact','contact')->name('contact');
// route::view('/booking','booking')->name('booking');




Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
