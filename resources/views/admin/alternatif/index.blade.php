@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-12">

        @if(session('message'))
            <div class="alert alert-success"> {{ session('message')  }} </div>
        @endif
            <div class="card">
                <div class="card-header">
                    <h4> Data Alternatif
                        <a href="{{ url('admin/alternatif/create') }}" class="btn btn-primary btn-sm float-end">Tambah Data Alternatif</a>
                    </h4>
                </div>
                <div class="card-body">
                <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NIK</th>
                                <th>Alternatif</th>
                                <th>C1 Konsidi Rumah</th>
                                <th>C2 Pekerjaan</th>
                                <th>C3 Penghasilan</th>
                                <th>C4 Umur</th>
                                <th>C5 Jumlah Tanggungan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        @php $n = 1 @endphp
                            @foreach ($alt as $key => $alternative)
                            <tr>
                                <td>{{ $n++ }}</td>
                                <td>{{ $alternative['alternatif'] }}</td>
                                <td>{{ $alternative['nama'] }}</td>
                                <td>{{ $alternative['c1'] }}</td>
                                <td>{{ $alternative['c2'] }}</td>
                                <td>{{ $alternative['c3'] }}</td>
                                <td>{{ $alternative['c4'] }}</td>
                                <td>{{ $alternative['c5'] }}</td>
                                <td>
                                    <a href="{{ url('admin/alternatif/'.$alternative['id'].'/edit') }}" class="btn btn-success">Edit</a>
                                    <a href="{{ url('admin/alternatif/'.$alternative['id'].'/delete') }}" onclick="return confirm('Apakah anda yakin?')" class="btn btn-danger">Hapus</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection