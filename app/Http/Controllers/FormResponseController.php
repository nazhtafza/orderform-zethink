<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FormResponse;
use App\Http\Controllers\Controller;

class FormResponseController extends Controller
{
    public function store(Request $request, $formId)
{
    // Debug apakah data terkirim
    dd($request->all()); 

    $request->validate([
        'answers' => 'required|array',
        'answers.file' => 'nullable|file|max:10240' // Maks 10MB
    ]);

    // proses upload
    if ($request->hasFile('answers.file')) {
        $filePath = $request->file('answers.file')->store('uploads', 'public');
        $request->merge(['answers.file' => $filePath]);
    }

    // Simpan ke database dalam format JSON
    FormResponse::create([
        'form_id' => $formId,
        'answers' => json_encode($request->answers),
    ]);

    return redirect()->back()->with('success', 'Form berhasil dikirim!');
}

}
