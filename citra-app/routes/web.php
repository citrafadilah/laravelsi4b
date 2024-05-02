<?php

use App\Http\Controllers\FakultasController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('about', function () {
    return "Halaman About";
});

Route::get('profil', function () {
    return view('profil');
});

// Route dengan parameter
Route::get('welcome/{salam}', function ($salam) {
    // return 'Selamat '.$salam;
    return view('salam')->with('viewsalam', $salam);
});

// Route tanpa parameter
// terdapat array list
Route::get('listdata', function () {
    $list = ["Sistem Informasi", "Informatika", "Manajemen"];
    $listmhs = [
        ["npm" => "001", "nama" => "ahmad"],
        ["npm" => "002", "nama" => "budi"]
    ];
    return view('listprodi')
        ->with('viewlist', $list)
        ->with('viewmhs', $listmhs);
});

Route::resource('fakultas', FakultasController::class);