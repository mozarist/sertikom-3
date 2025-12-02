<?php

namespace App\Http\Controllers;

use App\Models\jurusan;
use App\Models\kelas;
use App\Models\kelas_detail;
use App\Models\siswa;
use App\Models\tahun_ajar;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = siswa::query();

        // Search by nama lengkap / NISN
        if ($request->search) {
            $query->where(function ($q) use ($request) {
                $q->where('nama_lengkap', 'like', '%' . $request->search . '%')
                    ->orWhere('nisn', 'like', '%' . $request->search . '%');
            });
        }

        // Filter jurusan
        if ($request->jurusan) {
            $query->where('jurusan_id', $request->jurusan);
        }

        // Filter kelas
        if ($request->kelas) {
            $query->where('kelas_id', $request->kelas);
        }

        // Filter tahun ajar
        if ($request->tahun_ajar) {
            $query->where('tahun_ajar_id', $request->tahun_ajar);
        }

        $jurusan = jurusan::all();
        $kelas = kelas::all();
        $tahun_ajar = tahun_ajar::all();
        
        $siswa = $query->orderBy('nisn', 'asc')->paginate(10);
        return view('siswa.index', compact('siswa', 'jurusan', 'kelas', 'tahun_ajar'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tahun_ajar = tahun_ajar::all();
        $jurusan = jurusan::all();
        $kelas = kelas::all();
        return view('siswa.create', compact('jurusan', 'kelas', 'tahun_ajar'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nisn' => 'required|string|min:10|max:10|unique:siswas,nisn',
            'nama_lengkap' => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:laki-laki,perempuan',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required|string',
            'jurusan_id' => 'required|exists:jurusans,id',
            'kelas_id' => 'required|exists:kelas,id',
            'tahun_ajar_id' => 'required|exists:tahun_ajars,id',
        ]);

        $siswa = siswa::create($validatedData);

        kelas_detail::create([
            'siswa_id' => $siswa->id,
            'kelas_id' => $validatedData['kelas_id'],
            'tahun_ajar_id' => $validatedData['tahun_ajar_id'],
            'status' => 'aktif',
        ]);

        return redirect()->route('siswa.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $siswa = siswa::findOrFail($id);
        $kelas = kelas::all();
        $tahun_ajar = tahun_ajar::all();
        $kelas_detail = kelas_detail::where('siswa_id', $siswa->id)->with('kelas', 'tahun_ajar')->orderBy('tahun_ajar_id', 'desc')->get();
        return view('siswa.show', compact('siswa', 'kelas', 'tahun_ajar', 'kelas_detail'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $siswa = siswa::findOrFail($id);
        $tahun_ajar = tahun_ajar::all();
        $jurusan = jurusan::all();
        $kelas = kelas::all();
        return view('siswa.edit', compact('siswa', 'jurusan', 'kelas', 'tahun_ajar'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, siswa $siswa)
    {
        $validatedData = $request->validate([
            'nisn' => ['required', 'string', 'min:10', 'max:10', Rule::unique('siswas', 'nisn')->ignore($siswa->id),],
            'nama_lengkap' => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:laki-laki,perempuan',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required|string',
            'jurusan_id' => 'required|exists:jurusans,id',
            'kelas_id' => 'required|exists:kelas,id',
            'tahun_ajar_id' => 'required|exists:tahun_ajars,id',
        ]);

        $siswa->update($validatedData);

        return redirect()->route('siswa.index');
    }

    /**
     * Menangani kenaikan kelas siswa.
     */
    public function naikKelas(Request $request, siswa $siswa)
    {
        $validatedData = $request->validate([
            'kelas_id' => 'required|exists:kelas,id',
            'tahun_ajar_id' => 'required|exists:tahun_ajars,id',
        ]);

        $siswa->kelas_details()->where('status', 'aktif')->update(['status' => 'nonaktif']);

        kelas_detail::create([
            'siswa_id' => $siswa->id,
            'kelas_id' => $validatedData['kelas_id'],
            'tahun_ajar_id' => $validatedData['tahun_ajar_id'],
            'status' => 'aktif',
        ]);

        $siswa->update([
            'kelas_id' => $validatedData['kelas_id'],
            'tahun_ajar_id' => $validatedData['tahun_ajar_id'],
        ]);

        return redirect()->route('siswa.show', $siswa->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(siswa $siswa)
    {
        $siswa->delete();

        return redirect()->route('siswa.index');
    }
}
