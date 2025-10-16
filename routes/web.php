<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\VideoUploadController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WeatherController;
use App\Http\Controllers\InvoiceController;


Route::get('/', function () {
    return view('home');
})->name('home');

    Route::get('/about', [PagesController::class, 'about'])->name('about');

Route::get('/dashboard',[HomeController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/videos', [VideoUploadController::class ,'index'])->name('videos.index');
Route::post('/videos/upload-video', [VideoUploadController::class, 'upload'])->name('upload.videos');
         Route::delete('/videos/destroy/{id}', [VideoController::class ,'destroy'])->name('videos.destroy');

         
    Route::get('/students', [StudentController::class ,'index'])->name('students.index');

    Route::get('/contact', [ContactController::class, 'showForm'])->name('contact');
    Route::post('/contact', [ContactController::class,'submitForm'])->name('contact.submit');

    Route::get('/weather', [WeatherController::class, 'index'])->name('weather');
   Route::post('/weather/search/', [WeatherController::class, 'search'])->name('weather.search');

  Route::get('/invoices/index', [InvoiceController::class, 'index'])->name('invoices.index');
   Route::get('/invoices/create', [InvoiceController::class, 'create'])->name('invoices.create');
   Route::post('/invoices/store', [InvoiceController::class, 'store'])->name('invoices.store');
   Route::get('/invoices/pdf', [InvoiceController::class, 'downloadPDF']);


    Route::get('/students/fetchall', [StudentController::class, 'fetchAll'])->name('students.fetchAll');
    Route::post('/students/store', [StudentController::class, 'store'])->name('students.store');
    Route::delete('/students/delete', [StudentController::class, 'delete'])->name('students.delete');
    Route::get('/students/show/{id}', [StudentController::class ,'show'])->name('students.show');
    Route::get('/students/edit/', [ StudentController::class, 'edit'])->name('students.edit');
    Route::post('/students/update', [StudentController::class, 'update'])->name('students.update');

});

require __DIR__.'/auth.php';



