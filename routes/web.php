<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

// --- مسارات صفحة About ---

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

// عند إرسال فورم صفحة About (POST)
Route::post('/about', function (Request $request) {
    $name = 'Ahmad';
    $departments = [
        '1' => 'Technical',
        '2' => 'Financial',
        '3' => 'Sales',
    ];

    return view('about', compact('name', 'departments'));
});


// --- مسارات صفحة Tasks و Create ---

Route::get('tasks', function(){
    return view('tasks');
});



// 2. مسار لاستقبال البيانات الفعلي من الفورم (POST) عند الضغط على زر الإرسال
Route::post('create', function() {
    $task_name = $_POST['name'];
    DB::table('tasks')->insert(['name' => $task_name]);

    return redirect()->back();
});

Route::get('tasks', function() {
    $tasks = DB::table('tasks')->get();

    return view('tasks', compact('tasks'));
});

Route::post('delete/{id}', function($id) {
    DB::table('tasks')->where('id', $id)->delete();

    return redirect()->back();
});

Route::post('edit/{id}', function($id) {
    $task = DB::table('tasks')->where('id', $id)->first();
    $tasks = DB::table('tasks')->get();

    return view('tasks', compact('task', 'tasks'));
});

Route::post(uri: 'update', action: function() {
    $id = $_POST['id'];

    DB::table(table: 'tasks')->where('id', '=', $id)->update(['name' => $_POST['name'] ]);
    return redirect('tasks');

});
