
<?php
 use App\Http\Controllers\PhotoController;
 use App\Http\Controllers\HomeController;
 use App\Http\Controllers\WelcomeController;
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
// Route::get('/home', function () {
//     return view('home',['voucher'=> '1000']);
// }); 

Route::get('/', [WelcomeController::class, 'show']); 

Route::post('/home', [HomeController::class, 'store']); 
Route::get('/home', [HomeController::class,'index']);
Route::get('/upload', [PhotoController::class,'create']);
Route::post('/upload', [PhotoController::class,'store']); 
Route::get('/upload', [PhotoController::class,'index']);
 