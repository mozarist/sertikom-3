<?php

namespace App\Http\Controllers;

use App\Models\jurusan;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class JurusanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jurusan = jurusan::orderBy('kode_jurusan', 'asc')->paginate(10);
        return view('jurusan.index', compact('jurusan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('jurusan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'kode_jurusan' => 'required|string|unique:jurusans,kode_jurusan',
            'nama_jurusan' => 'required|string|unique:jurusans,nama_jurusan',
        ]);

        jurusan::create($validatedData);

        return redirect()->route('jurusan.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(jurusan $jurusan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $jurusan = jurusan::findOrFail($id);
        return view('jurusan.edit', compact('jurusan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, jurusan $jurusan)
    {
        $validatedData = $request->validate([
            'kode_jurusan' => ['required', 'string', Rule::unique('jurusans', 'kode_jurusan')->ignore($jurusan->id),],
            'nama_jurusan' => 'required|string',
        ]);

        $jurusan->update($validatedData);

        return redirect()->route('jurusan.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(jurusan $jurusan)
    {
        $jurusan->delete();

        return redirect()->route('jurusan.index');
    }
}
