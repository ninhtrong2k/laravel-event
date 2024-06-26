<?php

use App\Events\OrderPayment;
use App\Models\Order;
use App\Models\User;
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
Route::get('/order/cerate', function () {
    $order = new Order;
    $order->amount = 12000;
    $order->note= 'Call phone';
    $order->save();
    /// dispatch event
    OrderPayment::dispatch($order);
    // event(new  OrderPayment($order));
});

Route::get('/users/create', function () {
   $user = new User();
   $user->name = 'Hoang An';
   $user->email = 'trongyb6@gmail.com';
   $user->password = Hash::make('123456');
   $user->save();
});
