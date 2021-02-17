<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Models\matakuliah;
 
class MtkController extends Controller
{
    public function index()
    {
        $matakuliahs = matakuliah::latest()->paginate(5);
 
        return response()->json([
            'success' => true,
            'message' => 'Daftar data Matakuliah',
            'data' => $matakuliahs
        ], 200);
    }
 
    public function store(Request $request)
    {
        $request->validate([
            'nama_matakuliah' => 'required',
            'sks' => 'required|numeric',

        ]);
 
        $matakuliahs = Matakuliahs::create([
            'nama_matakuliah' => $request ->nama_matakuliah,
            'sks' => $request ->sks,

        ]);
         if($matakuliahs)
    {
        return response()->json([
            'success' => true,
            'message' => 'Matakuliah berhasil ditambahkan',
            'data' => $matakuliahs
        ], 200);
    }else{
        return response()->json([
            'success' => false,
            'message' => 'Matakuliah gagal ditambahkan',
            'data' => $matakuliahs
        ], 409);
    }
    }
 
    public function show(int $id)
    {
        
        $matakuliah = Matakuliah::findOrFail($id); 
        return response()->json([
            'success' => true,
            'message' => 'Detail Data Matakuliah',
            'data'    => $matakuliahs
        ], 200);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_matakuliah' => 'required',
            'sks' => 'required|numeric',
        ]);
 
        $matakuliah = matakuliah::find($id);

        $dataRequest  = $request->all();
        $dataResult  = array_filter($dataRequest);
        $matakuliah->update($dataResult);

        return response()->json([
            'success'=>true,
            'message'=>'Post Updated',
            'data'=> $T
        ],200);
    }
 
    public function destroy($id)
    {
        $cek = Matakuliahs::find($id)->delete();
        return response()->json([
            'success' => true,
            'message' => 'Post Updated',
            'data'    => $cek
        ], 200);
        
    }
}