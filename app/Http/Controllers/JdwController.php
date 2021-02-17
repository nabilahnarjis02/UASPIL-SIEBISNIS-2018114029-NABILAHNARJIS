<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Models\jadwal;
 
class JdwController extends Controller
{
    public function index()
    {
        $jadwals = jadwal::latest()->paginate(5);
 
        return view('jadwals.index',compact('jadwals'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
 
    public function create()
    {
        return view('jadwals.create');
    }
 
    public function store(Request $request)
    {
        $request->validate([
            'jadwal' => 'required',
            'matakuliah_id' => 'required',
        ]);
 
        jadwal::create($request->all());
 
        return redirect()->route('jadwals.index')
                        ->with('success','jadwal created successfully.');
    }
 
    public function show(int $id)
    {
        
        $jadwal = jadwal::findOrFail($id); 
        return view('jadwals.show',['jadwal' => $jadwal]);
    }
 
    public function edit(int $id)
    {
        $jadwal = jadwal::findOrFail($id); 
        return view('jadwals.edit',['jadwal' => $jadwal]);
    }
 
    public function update(Request $request,$id)
    {
        $request->validate([

            'jadwal' => 'required',
            'matakuliah_id' => 'required',
        ]);
 
        $jadwal = jadwal::find($id);

        $dataRequest  = $request->all();
        $dataResult  = array_filter($dataRequest);
        $jadwal->update($dataResult);

        return redirect('jadwals')
                        ->with('success','Jadwal updated successfully');
    }
 
    public function destroy($id)
    {
        $jadwal = jadwal :: where ('id',$id)->first();
     
         $jadwal -> delete(); return redirect()->route('jadwals.index');

                with('success','jadwal deleted successfully');
        
    }
}