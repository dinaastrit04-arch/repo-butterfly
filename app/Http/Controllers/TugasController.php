<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tugas;
use Illuminate\Support\Facades\File;

class TugasController extends Controller
{
    public function index()
    {
    $search = request('search');

    $tugas = Tugas::when($search, function ($query, $search) {
        return $query->where('nama_mahasiswa', 'like', "%{$search}%");
    })->get();

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
    public function download($id)
    {
        $tugas = Tugas::findOrFail($id);

        $path = public_path('uploads/' . $tugas->nama_file);

        return response()->download($path);
    }

    public function hapus($id)
    {
        $tugas = Tugas::findOrFail($id);

        $path = public_path('uploads/' . $tugas->nama_file);

        if(File::exists($path)){
            File::delete($path);
        }

        $tugas->delete();

        return redirect('/');
    }
}