<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Models\semester;
 
class SmtController extends Controller
{
    public function index()
    {
        $semesters = semester::latest()->paginate(5);
 
        return response()->json([
            'success' => true,
            'message' => 'Daftar data Semester',
            'data' => $semesters
        ], 200);
    }
 
    public function store(Request $request)
    {
        $request->validate([
            'semester' => 'required',
        ]);
 
        $semesters = Matakuliahs::create([
            'semester' => $request ->semester,
            

        ]);
         if($semesters)
    {
        return response()->json([
            'success' => true,
            'message' => 'Semester berhasil ditambahkan',
            'data' => $semesters
        ], 200);
    }else{
        return response()->json([
            'success' => false,
            'message' => 'Semester gagal ditambahkan',
            'data' => $semesters
        ], 409);
    }
}
    public function show(int $id)
    {
        
        $semester = Semester::findOrFail($id); 
        return response()->json([
            'success' => true,
            'message' => 'Detail Data Semester',
            'data'    => $semesters
        ], 200);
    }
 
    public function update(Request $request,$id)
    {
        $request->validate([
            'semester' => 'required',
        ]);
 
        $semester = semester::find($id);

        $dataRequest  = $request->all();
        $dataResult  = array_filter($dataRequest);
        $semester->update($dataResult);

        return response()->json([
            'success'=>true,
            'message'=>'Post Updated',
            'data'=> $s
        ],200);
    }
 
    public function destroy($id)
    {
        $semester = semester :: where ('id',$id)->first();
     
         $semester -> delete(); return redirect()->route('semesters.index');

                with('success','Semester deleted successfully');
        
    }
}