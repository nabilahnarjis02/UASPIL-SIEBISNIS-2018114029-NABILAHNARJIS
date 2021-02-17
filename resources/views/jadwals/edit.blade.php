@extends('template')
    
@section('content')
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Edit Jadwal</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-secondary" href="{{ route('jadwals.index') }}"> Back</a>
            </div>
        </div>
    </div>
 
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Oops</strong> Anda salah menginputkan jadwal.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
 
    <form action="/jadwals/{{ $jadwal['id'] }}" method="POST">
        @csrf
        @method('PUT')
 
        <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Jadwal:</strong>
                <input type="text" class="form-control" name="jadwal"id="exampleInputPassword1" 
        value="{{ old('jadwal') ? old('jadwal') : $jadwal['jadwal']}}">
        @error('jadwal')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
</div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Matakuliah Id:</strong>
                <input type="string" class="form-control" name="matakuliah_id"id="exampleInputPassword1" 
        value="{{ old('matakuliah_id') ? old('matakuliah_id') : $jadwal['matakuliah_id']}}">
        @error('matakuliah_id')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
</div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </div>
 
    </form>
@endsection