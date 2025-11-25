<?php

namespace App\Http\Controllers;

use App\Models\kelas_detail;
use Illuminate\Http\Request;

class KelasDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('kelas_detail.index');
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
    public function show(kelas_detail $kelas_detail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(kelas_detail $kelas_detail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, kelas_detail $kelas_detail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(kelas_detail $kelas_detail)
    {
        //
    }
}
