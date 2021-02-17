@extends('template')
    
@section('content')
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Edit Matakuliah</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-secondary" href="{{ route('matakuliahs.index') }}"> Back</a>
            </div>
        </div>
    </div>
 
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Oops</strong> Anda salah menginputkan data matakuliah.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
 
    <form action="/matakuliahs/{{ $matakuliah['id'] }}" method="POST">
        @csrf
        @method('PUT')
 
        <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
        <strong>Nama Matakuliah:</strong>
        <input type="string" class="form-control" name="nama_matakuliah"id="exampleInputPassword1" 
        value="{{ old('nama_matakuliah') ? old('nama_matakuliah') : $matakuliah['nama_matakuliah']}}">
        @error('nama_matakuliah')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
  </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
        <strong>SKS:</strong>
        <input type="string" class="form-control" name="sks"id="exampleInputPassword1" 
        value="{{ old('sks') ? old('sks') : $matakuliah['sks']}}">
        @error('sks')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </div>
 
    </form>
@endsection