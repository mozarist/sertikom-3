<?php

namespace App\Http\Controllers;

use App\Models\jurusan;
use App\Models\kelas;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kelas = kelas::orderBy('nama_kelas', 'desc')->paginate(10);
        return view('kelas.index', compact('kelas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Jurusan $jurusan)
    {
        $jurusan = jurusan::all();
        return view('kelas.create', compact('jurusan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_kelas' => 'required|string|unique:kelas,nama_kelas',
            'level_kelas' => 'required|integer|min:1|max:12',
            'jurusan_id' => 'required|exists:jurusans,id',
        ]);

        kelas::create($validatedData);

        return redirect()->route('kelas.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(kelas $kelas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $kelas = kelas::findOrFail($id);
        $jurusan = jurusan::all();
        return view('kelas.edit', compact('kelas', 'jurusan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, kelas $kelas)
    {
        $validatedData = $request->validate([
            'nama_kelas' => ['required', 'string', Rule::unique('kelas', 'nama_kelas')->ignore($kelas->id),],
            'level_kelas' => 'required|integer|min:1|max:12',
            'jurusan_id' => 'required|exists:jurusans,id',
        ]);

        $kelas->update($validatedData);

        return redirect()->route('kelas.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(kelas $kelas)
    {
        $kelas->delete();

        return redirect()->route('kelas.index');
    }
}
