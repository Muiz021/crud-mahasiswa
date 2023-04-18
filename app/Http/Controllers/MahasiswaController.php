<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mahasiswa = Mahasiswa::get();
        return view('mahasiswa.index',['mahasiswa' => $mahasiswa]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mahasiswa.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'gambar' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        $foto = $request->file('gambar');
        $destinationPath = 'images/';
        $profileImage = Str::slug($request->nama) . "." . $foto->getClientOriginalExtension();
        $foto->move($destinationPath, $profileImage);

        Mahasiswa::create([
            'nama' => $request->nama,
            'nim' => $request->nim,
            'kelas' => $request->kelas,
            'gambar' => $profileImage,
        ]);

        return redirect()->route('mahasiswa.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mahasiswa = Mahasiswa::where('id',$id)->first();
        return view('mahasiswa.show',['mahasiswa' => $mahasiswa]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mahasiswa = Mahasiswa::where('id',$id)->first();
        return view('mahasiswa.edit',['mahasiswa' => $mahasiswa]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'gambar' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        $mahasiswa = Mahasiswa::where('id',$id)->first();

        if($request->gambar){
            $file_path = public_path().'/images/'.$mahasiswa->gambar;
            unlink($file_path);

            $foto = $request->file('gambar');
            $destinationPath = 'images/';
            $profileImage = Str::slug($request->nama) . "." . $foto->getClientOriginalExtension();
            $foto->move($destinationPath, $profileImage);

            $mahasiswa->update([
                'nama' => $request->nama,
                'nim' => $request->nim,
                'kelas' => $request->kelas,
                'gambar' => $profileImage,
            ]);
        }else{
            $mahasiswa->update([
                'nama' => $request->nama,
                'nim' => $request->nim,
                'kelas' => $request->kelas,
            ]);
        }
        return redirect()->route('mahasiswa.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mahasiswa = Mahasiswa::where('id',$id)->first();
        $file_path = public_path().'/images/'.$mahasiswa->gambar;
        unlink($file_path);
        $mahasiswa->delete();
        return redirect()->route('mahasiswa.index');
    }
}
