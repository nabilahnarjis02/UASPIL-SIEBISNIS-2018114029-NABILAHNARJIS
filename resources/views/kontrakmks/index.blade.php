@extends('template')
 
@section('content')
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Kontrak Mata Kuliah</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-success" href="{{ route('kontrakmks.create') }}"> Create Kontrak Matakuliah</a>
            </div>
        </div>
    </div>
 
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif
 
    <table class="table table-bordered">
        <tr>
        
            <th width="20px" class="text-center">Id</th>
            <th>Mahasiswa Id</th>
            <th>Semester Id</th>
            <th width="280px"class="text-center">Action</th>
        </tr>
        @foreach ($kontrakmks as $post)
        <tr>
            <td class="text-center">{{ ++$i }}</td>
            <td>{{ $post->mahasiswa_id }}</td>
            <td>{{ $post->semester_id }}</td>
            <td class="text-center">
                <form action="{{ route('kontrakmks.destroy',$post->id) }}" method="POST">
 
                    <a class="btn btn-info btn-sm" href="{{ route('kontrakmks.show',$post->id) }}">show Kontrak</a>
 
                    <a class="btn btn-primary btn-sm" href="{{ route('kontrakmks.edit',$post->id) }}">Edit Kontrak</a>
 
                    @csrf
                    @method('DELETE')
 
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
 
    {!! $kontrakmks->links() !!}
 
@endsection