<?php

use Illuminate\Support\Facades\Route;

Route::get('/welcome', function () {
    return view('vueJs');
});
Route::get('/', function () {
    return view('vueJs');
});
// Route::get('/register', function () {
//     return view('vueJs');
// });
// Route::get('/login', function () {
//     return view('vueJs');
// });




// Route::any('/{any}', function () {
//     return view('vueJs');
// })->where('any','.*');
