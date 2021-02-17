<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Models\semester;
 
class SmtController extends Controller
{
    public function index()
    {
        $semesters = semester::latest()->paginate(5);
 
        return view('semesters.index',compact('semesters'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
 
    public function create()
    {
        return view('semesters.create');
    }
 
    public function store(Request $request)
    {
        $request->validate([
            'semester' => 'required',
        ]);
 
        semester::create($request->all());
 
        return redirect()->route('semesters.index')
                        ->with('success','semester created successfully.');
    }
 
    public function show(int $id)
    {
        
        $semester = semester::findOrFail($id); 
        return view('semesters.show',['semester' => $semester]);
    }
 
    public function edit(int $id)
    {
        $semester = semester::findOrFail($id); 
        return view('semesters.edit',['semester' => $semester]);
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

        return redirect('semesters')
                        ->with('success','Semester updated successfully');
    }
 
    public function destroy($id)
    {
        $semester = semester :: where ('id',$id)->first();
     
         $semester -> delete(); return redirect()->route('semesters.index');

                with('success','Semester deleted successfully');
        
    }
}