<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Models\matakuliah;
 
class MtkController extends Controller
{
    public function index()
    {
        $matakuliahs = matakuliah::latest()->paginate(5);
 
        return view('matakuliahs.index',compact('matakuliahs'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
 
    public function create()
    {
        return view('matakuliahs.create');
    }
 
    public function store(Request $request)
    {
        $request->validate([
            'nama_matakuliah' => 'required',
            'sks' => 'required|numeric',

        ]);
 
        matakuliah::create($request->all());
 
        return redirect()->route('matakuliahs.index')
                        ->with('success','Matakuliah created successfully.');
    }
 
    public function show(int $id)
    {
        
        $matakuliah = Matakuliah::findOrFail($id); 
        return view('matakuliahs.show',['matakuliah' => $matakuliah]);
    }
 
    public function edit(int $id)
    {
        $matakuliah = matakuliah::findOrFail($id); 
        return view('matakuliahs.edit',['matakuliah' => $matakuliah]);
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

        return redirect('matakuliahs')
                        ->with('success','Matakuliah updated successfully');
    }
 
    public function destroy($id)
    {
        $matakuliah = matakuliah :: where ('id',$id)->first();
     
         $matakuliah -> delete(); return redirect()->route('matakuliahs.index');

                with('success','Matakuliah deleted successfully');
        
    }
}