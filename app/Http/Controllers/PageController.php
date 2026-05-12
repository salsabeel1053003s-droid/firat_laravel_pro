<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function showAbout()
    {
        // الاسم الذي سيظهر في العنوان
        $name = "Badran";
        return view('about', compact('name'));
    }

    public function handleForm(Request $request)
    {
        // هنا يمكنك معالجة البيانات المرسلة
        $input = $request->input('message');
        $type = $request->input('type');

        return back()->with('success', 'تم إرسال البيانات: ' . $input);
    }
}
