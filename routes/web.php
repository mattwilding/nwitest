<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ContactController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [ContactController::class, 'index']);

Route::get('/submission/{id}', [ContactController::class, 'show']);

Route::get('/contact', [ContactController::class, 'create']);

Route::post('/contact-submit',[ContactController::class, 'store'])->name('contact-submit');


Route::get('mailable', function () {
    $submission = App\Models\Submission::first();

    return new App\Mail\ContactSubmitted($submission);
});
