<?php

namespace App\Http\Controllers;

use App\Models\tahun_ajar;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class TahunAjarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tahun_ajar = tahun_ajar::withCount('siswa')->orderBy('kode_tahun_ajar', 'desc')->paginate(10);

        return view('tahun_ajar.index', compact('tahun_ajar'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tahun_ajar.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'kode_tahun_ajar' => 'required|string|unique:tahun_ajars,kode_tahun_ajar',
            'nama_tahun_ajar' => 'required|string',
        ]);

        tahun_ajar::create($validatedData);

        return redirect()->route('tahun_ajar.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(tahun_ajar $tahun_ajar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $tahun_ajar = tahun_ajar::findOrFail($id);
        return view('tahun_ajar.edit', compact('tahun_ajar'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, tahun_ajar $tahun_ajar)
    {
        $validatedData = $request->validate([
            'kode_tahun_ajar' => ['required', 'string', Rule::unique('tahun_ajars', 'kode_tahun_ajar')->ignore($tahun_ajar->id),],
            'nama_tahun_ajar' => 'required|string',
        ]);

        $tahun_ajar->update($validatedData);

        return redirect()->route('tahun_ajar.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(tahun_ajar $tahun_ajar)
    {
        $tahun_ajar->delete();

        return redirect()->route('tahun_ajar.index');
    }
}
