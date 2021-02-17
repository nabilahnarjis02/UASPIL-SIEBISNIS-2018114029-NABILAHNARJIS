<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Models\Mahasiswa;
 
class MhsController extends Controller
{
    public function index()
    {
        $mahasiswas = Mahasiswa::latest()->paginate(5);
 
        return response()->json([
            'success' => true,
            'message' => 'Daftar data Mahasiswa',
            'data' => $mahasiswas
        ], 200);
            
    }
 
 
    public function store(Request $request)
    {
        $request->validate([
            'nama_mahasiswa' => 'required',
            'alamat' => 'required',
            'no_tlp' => 'required|numeric',
            'email' => 'required',

        ]);
        $mahasiswas = Mahasiswas::create([
            'nama_mahasiswa' => $request ->nama,
            'alamat' => $request ->alamat,
            'no_tlp' => $request ->no_tlp,
            'email' => $request ->email,
        ]);
         if($mahasiswas)
    {
        return response()->json([
            'success' => true,
            'message' => 'Teman berhasil ditambahkan',
            'data' => $mahasiswas
        ], 200);
    }else{
        return response()->json([
            'success' => false,
            'message' => 'Teman gagal ditambahkan',
            'data' => $mahasiswas
        ], 409);
    }
}
    public function show(int $id)
    {
        
        $mahasiswa = Mahasiswa::findOrFail($id); 
        return response()->json([
            'success' => true,
            'message' => 'Detail Data Mahasiswa',
            'data'    => $mahasiswas
        ], 200);
    }
 
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_mahasiswa' => 'required',
            'alamat' => 'required',
            'no_tlp' => 'required|numeric',
            'email' => 'required',
        ]);
 
        $mahasiswa = mahasiswa::find($id);

        $dataRequest  = $request->all();
        $dataResult  = array_filter($dataRequest);
        $mahasiswa->update($dataResult);

        return response()->json([
            'success'=>true,
            'message'=>'Post Updated',
            'data'=> $m
        ],200);
    }
 
    public function destroy($id)
    {
        $cek = Mahasiswas::find($id)->delete();
        return response()->json([
            'success' => true,
            'message' => 'Post Updated',
            'data'    => $cek
        ], 200);
        
    }
}