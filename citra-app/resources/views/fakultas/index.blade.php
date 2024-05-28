@extends('layout.main')

@section('title', 'Fakultas')

@section('content')
    {{-- <h1>UMDP</h1>
    <h2>Fakultas</h2>
    <ul>
    @foreach ($fakultas as $item)
        <li>{{ $item["nama"] }} {{ $item["singkatan"] }}</li> 
    @endforeach
    </ul> --}}
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Fakultas</h4>
            <p class="card-description">
            List data fakultas
            </p>
            {{-- tombol tambah --}}
            <a href="{{ route('fakultas.create')}}" class="btn btn-rounded btn-primary">Tambah</a>
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th>Nama Fakultas</th>
                    <th>Singkatan</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($fakultas as $item)
                        <tr>
                            <td>{{ $item["nama"] }}</td>
                            <td>{{ $item["singkatan"] }}</td>
                        </tr> 
                    @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
</div>
@endsection