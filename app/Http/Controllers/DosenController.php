<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use Illuminate\Http\Request;

class DosenController extends Controller
{

    public function index(Request $request)
    {
        $search = $request->query('search');
        $dosens = Dosen::query()
            ->when($search, function ($query) use ($search) {
                return $query->where('nama', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%")
                    ->orWhere('nip', 'like', "%{$search}%");
            })
            ->latest()
            ->paginate(10)
            ->withQueryString();
        return view('dosen.index', compact('dosens', 'search'));
    }

    public function create()
    {
        return view('dosen.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nip' => 'required|string|max:18|unique:dosens,nip',
            'nama' => 'required|string|max:100',
            'email' => 'required|email|unique:dosens,email',
            'no_telepon' => 'required|string|max:15',
        ]);

        Dosen::create($data);
        return redirect()->route('dosen.index')->with('success', 'Dosen berhasil ditambahkan.');
    }

  
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $dosen = Dosen::findOrFail($id);
        return view('dosen.edit', compact('dosen'));
    }

    public function update(Request $request, string $id)
    {
        $dosen = Dosen::findOrFail($id);
        $data = $request->validate([
            'nip' => 'required|string|max:18|unique:dosens,nip,'.$dosen->id,
            'nama' => 'required|string|max:100',
            'email' => 'required|email|unique:dosens,email,'.$dosen->id,
            'no_telepon' => 'required|string|max:15',
        ]);
        $dosen->update($data);
        return redirect()->route('dosen.index')->with('success', 'Dosen berhasil diperbarui.');
    }

    public function destroy(Dosen $dosen)
    {
        $dosen->delete();
        return back()->with('ok', 'Dosen berhasil dihapus.'); 
    }
}
