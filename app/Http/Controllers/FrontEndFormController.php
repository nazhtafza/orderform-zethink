<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Form;

class FrontEndFormController extends Controller
{
    // public function create(){
    //     return view('form.create');
    // }
    public function store(request $request){
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'type' => 'required|in:text,email,textarea,select',
        ]);

        Form::create($validatedData);
        return redirect()->back()->with('success', 'Form berhasil dikirim!');
    }
    public function show()
    {
        // Ambil form terbaru (atau bisa diubah sesuai kebutuhan)
        $form = Form::latest()->first();

        // Jika tidak ada form, tampilkan pesan error
        if (!$form) {
            return view('form.show', ['form' => null]);
        }

        return view('form.show', compact('form'));
    }
}
