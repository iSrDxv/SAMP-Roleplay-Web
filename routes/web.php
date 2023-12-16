<?php

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

//Auth System
Route::get('/profile', function () {
    return view('profile');
})->middleware('auth.basic');

Route::get('/home', function (Request $request) {
    return $request->user();
})->middleware('auth');

Route::get('/confirm-password', function () {
    return view('auth.passwords.confirm');
})->middleware('auth')->name('password.confirm-password');

Route::post('/confirm-password', function (Request $request) {
    if (!Hash::check($request->password, $request->user()->password)) {
        return back()->withErrors([
            'password' => ['The provided password does not match our records.']
        ]);
    }

    $request->session()->passwordConfirmed();

    return redirect()->intended();
})->middleware(['auth', 'throttle:6,1']);
/////////////////////////////////////

Route::get('/cambios', function () {
    return view('changes');
})->name("cambios");

Route::get('/tienda', function () {
    return view('shop');
})->name("tienda");

Route::get('/forum', function () {
    return view('forum');
})->name("foro");

Route::get('/estado', function () {
    return view('status');
})->name("estado");

Auth::routes();

Route::resource('notice', 'NoticeController');

Route::get('/notice', function () {
    $notice = DB::table('notice')
    ->join('category', 'notice.category_id', '=', 'category.id')
    ->where('notice.status',1)
    ->select('notice.*', 'category.description as categorydescription')
    ->get();return view('welcome',['noticie' =>$notice]);
});
Route::get('notice/show/{id}', function ($id) {
    $notice = DB::table('notice')
    ->join('category', 'notice.category_id', '=', 'category.id')
    ->where('notice.id',$id)
    ->select('notice.*', 'category.description as categorydescription')
    ->first();
    return view('show',['notice' =>$notice]);
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
