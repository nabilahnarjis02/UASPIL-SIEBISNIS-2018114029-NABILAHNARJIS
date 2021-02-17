@extends('template')
    
@section('content')
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Edit Absensi</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-secondary" href="{{ route('absensis.index') }}"> Back</a>
            </div>
        </div>
    </div>
 
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Oops</strong> Anda salah menginputkan data absensi.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
 
    <form action="/absensis/{{ $absensi['id'] }}" method="POST">
        @csrf
        @method('PUT')
 
        <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
        <strong>Waktu Absen:</strong>
        <input type="date" class="form-control" name="waktu_absen"id="exampleInputPassword1" 
        value="{{ old('waktu_absen') ? old('waktu_absen') : $absensi['waktu_absen']}}">
        @error('waktu_absen')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
</div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
        <strong>Mahasiswa Id:</strong>
        <input type="string" class="form-control" name="mahasiswa_id"id="exampleInputPassword1" 
        value="{{ old('mahasiswa_id') ? old('mahasiswa_id') : $absensi['mahasiswa_id']}}">
        @error('mahasiswa_id')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
</div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Matakuliah Id:</strong>
                <input type="string" class="form-control" name="matakuliah_id"id="exampleInputPassword1" 
        value="{{ old('matakuliah_id') ? old('matakuliah_id') : $absensi['matakuliah_id']}}">
        @error('matakuliah_id')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
 </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Keterangan</strong>
                <input type="string" class="form-control" name="keterangan"id="exampleInputPassword1" 
        value="{{ old('keterangan') ? old('keterangan') : $absensi['keterangan']}}">
        @error('keterangan')
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