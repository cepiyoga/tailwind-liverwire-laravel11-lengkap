<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Http\Request;
use PhpParser\Node\Scalar\String_;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('karyawan.home',['karyawans'=>Karyawan::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
      return view('karyawan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'nik' => 'required',
        ]);

        Karyawan::create($validatedData);

        return redirect('/karyawan')->with('success', 'Data Karyawan "'.$validatedData['nama'].'" Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Karyawan $karyawan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(String $id)
    {
        $data = Karyawan::find($id);
        return view('karyawan.edit',['editKaryawan'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, String $id)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'nik' => 'required',
        ]);

        Karyawan::where('id',$id)->update($validatedData);

        return redirect('karyawan')->with('success', 'Data Karyawan "'.$validatedData['nama'].'" Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $id)
    {

        Karyawan::find($id)->delete();
        return redirect('/karyawan');
    }
}
