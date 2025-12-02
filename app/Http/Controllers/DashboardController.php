<?php

namespace App\Http\Controllers;

use App\Models\jurusan;
use App\Models\kelas;
use App\Models\siswa;
use App\Models\tahun_ajar;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tahun_ajar = tahun_ajar::orderBy('kode_tahun_ajar', 'asc')->paginate(10);
        $kelas = kelas::orderBy('nama_kelas', 'asc')->paginate(10);
        $jurusan = jurusan::orderBy('nama_jurusan', 'asc')->paginate(10);
        $siswa = siswa::orderBy('nama_lengkap', 'asc')->paginate(10);
        return view('dashboard', compact('tahun_ajar', 'kelas', 'jurusan', 'siswa'));
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
