<?php


use Faker\Guesser\Name;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController ;
use App\Http\Controllers\UserController ;
use App\Http\Controllers\CategoriesController ;
use App\Http\Controllers\CarsController ;
use App\Http\Controllers\MainController ;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\TestimonialsController ;

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
    return view('auth.login');
});

Route::group(['prefix' => 'admin','middleware' => ['verified']], function () {

    //route of user

    Route::group(
    ['prefix' => 'userlist'], function () {
Route::get('userlist',[UserController::class,'index'])->name('UsersList');
Route::get('adduser',[UserController::class,'create'])->name('AddUsers');
Route::post('storeuser',[UserController::class,'store'])->name('adduser');
Route::get('edituser/{id}',[UserController::class, 'edit']);
Route::put('updateuser/{id}',[UserController::class, 'update'])->name('updateuser');
});

//route of category

Route::group(
    ['prefix' => 'categories'], function () {

Route::get('categories',[CategoriesController::class,'index'])->name('CategoriesList');
Route::get('addcategory',[CategoriesController::class,'create'])->name('Addcategories');
Route::post('storecategory',[CategoriesController::class,'store'])->name('Addcategory');
Route::get('editCategory/{id}',[CategoriesController::class, 'edit']);
Route::put('updatecategory/{id}',[CategoriesController::class, 'update'])->name('updatecategory');
Route::get('deleteCategory/{id}',[CategoriesController::class, 'destroy']);
});

//route of cars

Route::group(
    ['prefix' => 'cars'], function () {

Route::get('cars',[CarsController::class,'index'])->name('CarsList');
Route::get('AddtheCars',[CarsController::class,'create'])->name('addcars');
Route::post('storecars',[CarsController::class,'store'])->name('storecars');
Route::get('editCar/{id}',[CarsController::class, 'edit']);
Route::put('updatecar/{id}',[CarsController::class, 'update'])->name('updatecar');
Route::get('deletecar/{id}',[CarsController::class, 'destroy']);
});

//route of testimonials

Route::group(
    ['prefix' => 'cars'], function () {
Route::get('testimonials',[TestimonialsController::class,'index'])->name('admintestimonials');
Route::get('addtestimonials',[TestimonialsController::class,'create'])->name('AddTestimonialsadmin');
Route::post('storetestimonials',[TestimonialsController::class,'store'])->name('addtestimonials');
Route::get('editTestimonials/{id}',[TestimonialsController::class, 'edit']);
Route::put('updatetestimonials/{id}',[TestimonialsController::class, 'update'])->name('updatetestimonials');
Route::get('deletetestimonials/{id}',[TestimonialsController::class, 'destroy']);
});
// route of contact
Route::group(
    ['prefix' => 'contact'], function () {
Route::get('contact',[ContactController::class,'index'])->name('Messages');
Route::get('showMessage/{id}',[ContactController::class, 'show']);
Route::get('deletemessage/{id}',[ContactController::class, 'destroy']);
});

});

//route of main website
Route::group(
    ['prefix'=>'users'],function(){
Route::get('index',[MainController::class,'index'])->name('index');
Route::get('single/{id}',[MainController::class,'single'])->name('single');
Route::get('carlisting',[MainController::class,'carlisting'])->name('listing');
Route::get('testimonials',[MainController::class,'testimonialsuser'])->name('testimonialsuser');
Route::get('blog',[MainController::class,'blog'])->name('blog');
Route::get('about',[MainController::class,'about'])->name('about');
//route of CONTACT
Route::get('contact',[MainController::class,'contact'])->name('contact');
Route::get('addcontact',[ContactController::class,'create']);
Route::post('recivecontact',[ContactController::class,'store'])->name('contactus');
});

Auth::routes(['verify'=>true]);
Route::get('/home', [HomeController::class, 'index'])->middleware('verified')->name('home');




