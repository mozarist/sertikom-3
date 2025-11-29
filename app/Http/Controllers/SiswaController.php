<?php

namespace App\Http\Controllers;

use App\Models\siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $siswa = siswa::orderBy('nisn')
        return view('siswa.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
        'nisn' => ['required', 'string', 'max:20', 'unique:siswas,nisn'],
        'nama_lengkap' => ['required', 'string', 'max:255'],
        'jenis_kelamin' => ['required', 'in:laki-laki,perempuan'],
        'tanggal_lahir' => ['required', 'date'],
        'alamat' => ['required', 'string'],
        'jurusan_id' => ['required', 'exists:jurusans,id'],
        'kelas_id' => ['required', 'exists:kelas,id'],
        'tahun_ajar_id' => ['required', 'exists:tahun_ajars,id'],
    ]);

    Siswa::create($validated);

    return redirect()->route('siswa.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(siswa $siswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(siswa $siswa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, siswa $siswa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(siswa $siswa)
    {
        //
    }
}
