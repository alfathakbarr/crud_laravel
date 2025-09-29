<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use Illuminate\Http\Request;

class DosenController extends Controller
{

    public function index(Request $request)
    {
        $q = $request->query('q');
        $items = Dosen::query()
            ->when($q, function ($query) use ($q) {
                $sub = $query->where(function ($sub) use ($q) {
                    $sub->where('nama', 'like', "%{$q}%")
                        ->orWhere('email', 'like', "%{$q}%");
                });
            })
            ->latest()
            ->paginate(10)
            ->withQueryString();
        return view('dosen.index', compact('items', 'q'));
    }

    public function create()
    {
        return view('dosen.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required|string|max:100',
            'email' => 'required|email|unique:dosens,email',
        ]);

        Dosen::create($data);
        return redirect()->route('dosen.index')->with('success', 'Dosen berhasil ditambahkan.');
    }

  
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('dosen.edit', compact('dosen'));
    }

    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'nama' => 'required|string|max:100',
            'email' => 'required|email|unique:dosens,email,'.$dosen->id,
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
