 <?php

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
});

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('welcome');


Route::post('/blog', [App\Http\Controllers\ContactController::class, 'blog'])->name('blog.index');

//Single Page Show
Route::get('/courses', [App\Http\Controllers\CoursesController::class, 'courses']);
Route::get('/project', [App\Http\Controllers\ProjectsController::class, 'project']);
Route::get('/terms', [App\Http\Controllers\TermsController::class, 'terms']);
Route::get('/policy', [App\Http\Controllers\PolicyController::class, 'policy']);




//Admin Login System
Route::group(['prefix' => 'admin','middleware' => 'auth'],function(){

   Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin.dashboard');

  Route::resource('service', App\Http\Controllers\Admin\ServiceController::class);
  Route::resource('benner', App\Http\Controllers\Admin\BannerTextController::class);
  Route::resource('courses', App\Http\Controllers\Admin\CoursesController::class);
  Route::resource('project', App\Http\Controllers\Admin\ProjectController::class);
  Route::resource('contact', App\Http\Controllers\Admin\ContactController::class);
  Route::resource('review', App\Http\Controllers\Admin\ReviewController::class);



 });