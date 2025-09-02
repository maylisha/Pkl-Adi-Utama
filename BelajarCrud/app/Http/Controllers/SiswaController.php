<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index(){
        $cari = Request()->cari;
            if($cari == null){
                $data = Siswa::get();
    
            }else{
    
                $data = Siswa::where("nama",'like','%'. $cari.'%')->get();
            }
        return view('siswa', compact('data'));
    }

    public function create(){
        return view('create');
    }

    public function store(Request $request){
        $data = $request->validate([
            'nama' => 'required',
            'nisn' => 'required|integer',
            'jurusan' => 'required'
        ]);

        $newdata = Siswa::create($data);

        return redirect(route('siswa'));
    }

    public function destroy($id){
        Siswa::find($id)->delete();
        return redirect(route('siswa'));
    }

    public function edit($id){
        $siswa = Siswa::findOrFail($id);
        return view('edit', ['siswa' => $siswa]);
    }

    public function update($id, Request $request){
        Siswa::findOrFail($id)->update([
            'nama' => $request->nama,
            'nisn' => $request->nisn,
            'jurusan' => $request->jurusan
        ]);

        return redirect(route('siswa'));

    }
}
