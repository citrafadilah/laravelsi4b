{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Program Studi</title>
</head>
<body>
    <h1>UMDP</h1>
    <h2>Program Studi</h2>
    <ul>
    @foreach ($prodi as $item)
        <li>{{ $item["nama"] }} {{ $item["singkatan"] }}
            {{ $item["fakultas"]["nama"]}}</li> 
    @endforeach
    </ul>
</body>
</html> --}}

@extends('layout.main')

@section('title', 'Prodi')

@section('content')
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Program Studi</h4>
            <p class="card-description">
            List data program studi
            </p>
            {{-- tombol tambah --}}
            @can('create', App\Prodi::class)
              <a href="{{ route('prodi.create')}}" class="btn btn-rounded btn-primary">Tambah</a>
            @endcan
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th>Nama Prodi</th>
                    <th>Singkatan</th>
                    <th>Nama Fakultas</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($prodi as $item)
                        <tr>
                            <td>{{ $item["nama"] }}</td>
                            <td>{{ $item["singkatan"] }}</td>
                            <td>{{ $item["fakultas"]["nama"]}}</td>
                        </tr> 
                    @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
</div>
@if (session('success'))
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script>
    Swal.fire({
      title: "Good job!",
      text: "{{ session('success')}}",
      icon: "success"
    });
  </script>
@endif

@endsection