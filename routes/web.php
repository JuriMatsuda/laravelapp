<?php

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

Route::get('hello', 'HelloController@index');

// Route::get('hello/{msg?}/{pass?}', function ($msg='no message', $pass='no pass') {
//
//   $html = <<<EOF
//   <html>
//   <head>
//   <title>Hello</title>
//   <style>
//   body {font-size:16pt; color:#999;}
//   h1 {font-size:100pt; text-align:right; color:#eee; margin:-40px 0 -50px 0}
//   </style>
//   </head>
//   <body>
//     <h1>Hello</h1>
//     <p>This is sample page. </p>
//     <p>{$msg}</p>
//     <p>{$pass}</p>
//   </body>
//   </html>
// EOF;
//
//   return $html;
// });
