<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('ContactForm');
});

Route::post('/contact', function (Request $request) {
    $validated = $request->validate([
        'nama'     => 'required|string|max:255',
        'nrp'      => 'required|string|max:50',
        'fakultas' => 'required|string|max:100',
        'pesan'    => 'required|string|min:10',
    ]);

    return back()->with('success', 'Terima kasih! Kritik dan saran Anda telah berhasil terkirim.');
});