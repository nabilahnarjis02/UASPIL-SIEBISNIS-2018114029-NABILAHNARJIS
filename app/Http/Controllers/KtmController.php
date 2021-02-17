<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Models\kontrakmk;
 
class KtmController extends Controller
{
    public function index()
    {
        $kontrakmks = kontrakmk::latest()->paginate(5);
 
        return view('kontrakmks.index',compact('kontrakmks'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
 
    public function create()
    {
        return view('kontrakmks.create');
    }
 
    public function store(Request $request)
    {
        $request->validate([
            'mahasiswa_id' => 'required',
            'semester_id' => 'required|numeric',
        ]);
 
        kontrakmk::create($request->all());
 
        return redirect()->route('kontrakmks.index')
                        ->with('success','kontrak Mata Kuliah created successfully.');
    }
 
    public function show(int $id)
    {
        
        $kontrakmk = Kontrakmk::findOrFail($id); 
        return view('kontrakmks.show',['kontrakmk' => $kontrakmk]);
    }
 
    public function edit(int $id)
    {
        $kontrakmk = kontrakmk::findOrFail($id); 
        return view('kontrakmks.edit',['kontrakmk' => $kontrakmk]);
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

        return redirect('kontrakmks')
                        ->with('success','Kontrakmk updated successfully');
    }
 
    public function destroy($id)
    {
        $kontrakmk = kontrakmk :: where ('id',$id)->first();
     
         $kontrakmk -> delete(); return redirect()->route('kontrakmks.index');

                with('success','Absensi deleted successfully');
          }
}