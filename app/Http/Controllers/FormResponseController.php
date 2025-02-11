<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FormResponse;
use App\Http\Controllers\Controller;

class FormResponseController extends Controller
{
    public function store(Request $request, $formId)
    {
        dd($request->all());
        $request->validate([
            'answers' => 'required|array', // Pastikan data dikirim sebagai array
        ]);

        FormResponse::create([
            'form_id' => $formId,
            'answers' => json_encode($request->answers),
        ]);

        return redirect()->back()->with('success', 'Jawaban berhasil disimpan!');
    }   
}
