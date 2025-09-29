<?php

namespace App\Http\Controllers;

use App\Models\MataKuliah;
use App\Models\Dosen;
use Illuminate\Http\Request;

class MataKuliahController extends Controller
{
    public function index()
    {
        $q = request()->query('q');
        $dosen_id = request()->query('dosen_id');
        
        $mataKuliahs = MataKuliah::with('dosen')
            ->when($q, function($query) use ($q) {
                return $query->where('nama', 'like', '%' . $q . '%');
            })
            ->when($dosen_id, function($query) use ($dosen_id) {
                return $query->where('dosen_id', $dosen_id);
            })
            ->latest()
            ->paginate(10)
            ->withQueryString();

        $dosens = Dosen::orderBy('nama')->get(['id', 'nama']);
        return view('mata_kuliah.index', compact('mataKuliahs', 'dosens', 'q', 'dosen_id'));
    }

    public function create()
    {
        $dosens = Dosen::orderBy('nama')->get(['id', 'nama']);
        return view('mata_kuliah.create', compact('dosens'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required|string|max:100',
            'sks' => 'required|integer|min:1|max:6',
            'dosen_id' => 'required|exists:dosens,id',
        ]);
        MataKuliah::create($data);
        return redirect()->route('mata_kuliah.index')->with('success', 'Mata Kuliah berhasil ditambahkan.');
    }

    public function edit(MataKuliah $mata_kuliah)
    {
        $dosens = Dosen::orderBy('nama')->get(['id', 'nama']);
        return view('mata_kuliah.edit', compact('mata_kuliah', 'dosens'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Matakuliah $mata_kuliah)
    {
        $data = $request->validate([
            'nama' => 'required|string|max:100',
            'sks' => 'required|integer|min:1|max:6',
            'dosen_id' => 'required|exists:dosens,id',
        ]);
        $mata_kuliah->update($data);
        return redirect()->route('mata_kuliah.index')->with('success', 'Mata Kuliah berhasil diperbarui.');
    }

    public function destroy(MataKuliah $mata_kuliah)
    {
        $mata_kuliah->delete();
        return back()->with('ok', 'Mata Kuliah berhasil dihapus.');
    }
}
