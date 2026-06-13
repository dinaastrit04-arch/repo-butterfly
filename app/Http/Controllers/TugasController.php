<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tugas;

class TugasController extends Controller
{
    public function index()
    {
        $tugas = Tugas::all();

        return view('tugas', compact('tugas'));
    }

    public function upload(Request $request)
    {
        $file = $request->file('file_tugas');

        $namaFile = time().'_'.$file->getClientOriginalName();

        $file->move(public_path('uploads'), $namaFile);

        Tugas::create([
            'nama_mahasiswa' => $request->nama_mahasiswa,
            'nama_file' => $namaFile
        ]);

        return redirect('/');
    }
}