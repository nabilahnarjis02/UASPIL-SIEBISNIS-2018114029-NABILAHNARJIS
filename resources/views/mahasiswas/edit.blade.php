@extends('template')
    
@section('content')
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Edit Mahasiswa</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-secondary" href="{{ route('mahasiswas.index') }}"> Back</a>
            </div>
        </div>
    </div>
 
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Oops</strong> Anda salah menginputkan data mahasiswa.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
 
    <form action="/mahasiswas/{{ $mahasiswa['id'] }}" method="POST">
        @csrf
        @method('PUT')
 
        <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
        <strong>Nama Mahasiswa:</strong>
        <input type="string" class="form-control" name="nama_mahasiswa"id="exampleInputPassword1" 
        value="{{ old('nama_mahasiswa') ? old('nama_mahasiswa') : $mahasiswa['nama_mahasiswa']}}">
        @error('nama_mahasiswa')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
  </div>
  
        <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
        <strong>Alamat:</strong>
        <input type="string" class="form-control" name="alamat"id="exampleInputPassword1" 
        value="{{ old('alamat') ? old('alamat') : $mahasiswa['alamat']}}">
        @error('alamat')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
  </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            <strong>No Telepon:</strong>
            <input type="string" class="form-control" name="no_tlp"id="exampleInputPassword1" 
            value="{{ old('no_tlp') ? old('no_tlp') : $mahasiswa['no_tlp']}}">
            @error('no_tlp')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            <strong>Email</strong>
            <input type="string" class="form-control" name="email"id="exampleInputPassword1" 
            value="{{ old('email') ? old('email') : $mahasiswa['email']}}">
            @error('email')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </div>
 
    </form>
@endsection