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

@section('title', 'Fakultas')

@section('content')
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Program Studi</h4>
            <p class="card-description">
            List data program studi
            </p>
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
@endsection