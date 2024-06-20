@extends('layout.main')

@section('title', 'Tambah Fakultas')

@section('content')
<div class="row">
    {{-- formulir tambah fakultas --}}
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Default form</h4>
            <p class="card-description">
            Formulir tambah fakultas
            </p>
            <form method="POST" action="{{ route('fakultas.store')}}" class="forms-sample">
            @csrf
              <div class="form-group">
                <label for="nama">Nama Fakultas</label>
                <input type="text" class="form-control" name="nama" value="{{ old('nama')}}" placeholder="Nama Fakultas">
                @error('nama')
                    <span class="text-danger">{{ $message}}</span>
                @enderror
              </div>
              <div class="form-group">
                <label for="singkatan">Singkatan</label>
                <input type="text" class="form-control" name="singkatan" value="{{ old('singkatan')}}" placeholder="FIKR, FEB, ...">
                @error('singkatan')
                    <span class="text-danger">{{ $message}}</span>
                @enderror
              </div>
              <button type="submit" class="btn btn-primary mr-2" fdprocessedid="07bwml">Submit</button>
              <a href="{{ url('fakultas')}}" class="btn btn-light">Batal</a>
            </form>
          </div>
        </div>
      </div>
</div>
@endsection