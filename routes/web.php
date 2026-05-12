<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

// عند فتح الصفحة لأول مرة (GET)
Route::get('/about', function () {
    $name = 'Ahmad';
    $departments = [
        '1' => 'Technical',
        '2' => 'Financial',
        '3' => 'Sales',
    ];

    return view('about', compact('name', 'departments'));
});

// عند إرسال الفورم (POST)
Route::post('/about', function (Request $request) {
    // إذا كنت تريد أن يظل الاسم "أحمد" حتى بعد الضغط على Send:
    $name = 'Ahmad';

    // أما إذا كنت تريد استلام الاسم من الذي يكتبه المستخدم في الحقل:
    // $name = $request->input('name');

    $departments = [
        '1' => 'Technical',
        '2' => 'Financial',
        '3' => 'Sales',
    ];

    return view('about', compact('name', 'departments'));
});
