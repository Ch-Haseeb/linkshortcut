<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShortLinkController;
use App\Models\ShortLink;

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
//     Route::get('/',[ShortLinkController::class,'index']);
// });


Route::get('/',[ShortLinkController::class,'index']);
Route::post('link',[ShortLinkController::class,'store']);
Route::get('{code}',[ShortLinkController::class,'shortenLink'])->name('shorten.link');
// Route::post('createlink',[ShortLinkController::class,'createlink']);
// Route::get('search', function(){
        
//     $id=ShortLink::max('id');
//     $shortLinks = ShortLink::latest()->find($id);
//         return view('shortenLinked', compact('shortLinks'));
// });

