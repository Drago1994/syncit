<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactsController;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

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

Route::get('/test/{id}',[ContactsController::class,'showContactNumbers']);


Route::get('/', function () {
    $username = 'admin';
    $password = 'adminasd';
    $users = Admin::where('username',$username)->limit(1)->get();
    if (count($users)>0){
        $admin = $users[0];
        if (Hash::check($password, $admin['password'])) {
            dd('cool');
         }
    }

    return view('welcome');
});

Route::get('/static_item',function(){
    return env('APP_NAME');
});
