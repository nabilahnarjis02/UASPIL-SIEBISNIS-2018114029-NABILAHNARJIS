<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Models\kontrakmk;
 
class KtmController extends Controller
{
    public function index()
    {
        $kontrakmks = kontrakmk::latest()->paginate(5);
 
        return response()->json([
            'success' => true,
            'message' => 'Daftar Jadwal',
            'data' => $kontrakmks
        ], 200);
    }
 
    public function store(Request $request)
    {
        $request->validate([
            'mahasiswa_id' => 'required',
            'semester_id' => 'required|numeric',
        ]);
 
        if($kontrakmks)
        {
            return response()->json([
                'success' => true,
                'message' => 'Kontrak berhasil ditambahkan',
                'data' => $kontrakmks
            ], 200);
        }else{
            return response()->json([
                'success' => false,
                'message' => 'Kontrak gagal ditambahkan',
                'data' => $kontrakmks
            ], 409);
        }
    }
 
    public function show(int $id)
    {
        
        $kontrakmk = Kontrakmk::findOrFail($id); 
        return response()->json([
            'success' => true,
            'message' => 'Detail Data Kontrak',
            'data'    => $kontrakmks
        ], 200);
    }
 
    public function update(Request $request,$id)
    {
        $request->validate([
            'mahasiswa_id' => 'required',
            'semester_id' => 'required|numeric',
        ]);
 
        $kontrakmk = kontrakmk::find($id);

        $dataRequest  = $request->all();
        $dataResult  = array_filter($dataRequest);
        $kontrakmk->update($dataResult);

        return response()->json([
            'success'=>true,
            'message'=>'Post Updated',
            'data'=> $k
        ],200);
    }
 
    public function destroy($id)
    {
        $cek = Kontrakmk::find($id)->delete();
        return response()->json([
            'success' => true,
            'message' => 'Post Updated',
            'data'    => $cek
        ], 200);
          }
}