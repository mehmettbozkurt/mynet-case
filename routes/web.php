<?php

use App\Http\Controllers\PersonController;
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

Route::resource('person', 'App\Http\Controllers\PersonController', [
    'names' => [
        'list' => 'person.index',
        'store' => 'person.store',
        'create' => 'person.create',
        'edit' => 'person.edit',
        'update' => 'person.update',
        'destroy' => 'person.destroy'
    ]
]);
