<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pengumuman;
use Illuminate\Http\Request;

class PengumumanController extends Controller
{
    public function index()
    {
        $pengumuman = Pengumuman::latest()->get();

        return view('pages.admin.pengumuman.pengumuman', compact('pengumuman'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'judul' => 'required',
            'konten' => 'required',
            'image' => 'required', 
        ]);

        Pengumuman::create($validatedData);

        return redirect()->back()->with('success', 'Pengumuman berhasil disimpan.');
    }
}