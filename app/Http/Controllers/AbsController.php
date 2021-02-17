<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Models\absensi;
 
class AbsController extends Controller
{
    public function index()
    {
    
        $absensis = absensi::latest()->paginate(5);
        
        return view('absensis.index',compact('absensis'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
 
    public function create()
    {
        return view('absensis.create');
    }
 
    public function store(Request $request)
    {
        $request->validate([
            'waktu_absen' => 'required',
            'mahasiswa_id' => 'required|numeric',
            'matakuliah_id' => 'required',
            'keterangan' => 'required',

        ]);
 
        absensi::create($request->all());
 
        return redirect()->route('absensis.index')
                        ->with('success','Mahasiswa created successfully.');
    }
 
    public function show(int $id)
    {
        
        $absensi = Absensi::findOrFail($id); 
        return view('absensis.show',['absensi' => $absensi]);
    }

    public function edit(int $id)
    {
        $absensi = absensi::findOrFail($id); 
        return view('absensis.edit',['absensi' => $absensi]);
    }
 
    public function update(Request $request, $id)
    {
        $request->validate([
            'waktu_absen' => 'required',
            'mahasiswa_id' => 'required|numeric',
            'matakuliah_id' => 'required',
            'keterangan' => 'required',
        ]);
 
        $absensi = absensi::find($id);

        $dataRequest  = $request->all();
        $dataResult  = array_filter($dataRequest);
        $absensi->update($dataResult);

        return redirect('absensis')
                        ->with('success','Absensi updated successfully');
    }
 
    public function destroy($id)
    {
        $absensi = absensi :: where ('id',$id)->first();
     
         $absensi -> delete(); return redirect()->route('absensis.index');

                with('success','Absensi deleted successfully');
          }
}