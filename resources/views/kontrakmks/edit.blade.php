@extends('template')
    
@section('content')
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Edit Kontrakmk</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-secondary" href="{{ route('kontrakmks.index') }}"> Back</a>
            </div>
        </div>
    </div>
 
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Oops</strong> Anda salah menginputkan data Kontrakmk.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
 
    <form action="/kontrakmks/{{ $kontrakmk['id'] }}" method="POST">
        @csrf
        @method('PUT')
 
        <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Mahasiswa Id:</strong>
                <input type="string" class="form-control" name="mahasiswa_id"id="exampleInputPassword1" 
        value="{{ old('mahasiswa_id') ? old('mahasiswa_id') : $kontrakmk['mahasiswa_id']}}">
        @error('mahasiswa_id')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
</div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Semester Id:</strong>
                <input type="string" class="form-control" name="semester_id"id="exampleInputPassword1" 
        value="{{ old('semester_id') ? old('semester_id') : $kontrakmk['semester_id']}}">
        @error('semester_id')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
</div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </div>
 
    </form>
@endsection