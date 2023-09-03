@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-12">

        @if(session('message'))
            <div class="alert alert-success"> {{ session('message')  }} </div>
        @endif
            <div class="card">
                <div class="card-header">
                    <h4> Data Warga
                        <a href="{{ url('admin/warga/create') }}" class="btn btn-primary btn-sm float-end">Tambah Data Warga</a>
                    </h4>
                </div>
                <div class="card-body">
                <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NIK</th>
                                <th>Nama</th>
                                <th>Tempat Tinggal</th>
                                <th>Alamat Lengkap</th>
                                <th>Umur</th>
                                <th>Pekerjaan</th>
                                <th>Penghasilan</th>
                                <th>Status</th>
                                <th>Jumlah Tanggungan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        @php $n = 1 @endphp
                            @foreach ($warga as $w)
                            <tr>
                                <td>{{ $n++ }}</td>
                                <td>{{ $w->nik }}</td>
                                <td>{{ $w->nama }}</td>
                                <td>{{ $w->tempat_tinggal }}</td>
                                <td>{{ $w->alamat_lengkap }}</td>
                                <td>{{ $w->umur }}</td>
                                <td>{{ $w->pekerjaan }}</td>
                                <td>
                                @if($w->penghasilan == 5 )
                                    <= 500rb 
                                @elseif($w->penghasilan == 4 )
                                    500-1jt
                                @elseif($w->penghasilan == 3 )
                                    1jt-2jt
                                @elseif($w->penghasilan == 2 )
                                    2jt-3jt
                                @elseif($w->penghasilan == 1 )
                                    >= 3jt
                                @else 
                                    Tidak Ada
                                @endif
                                </td>
                                <td>{{ $w->status }}</td>
                                <td>{{ $w->tanggungan }}</td>
                                <td>
                                    <a href="{{ url('admin/warga/'.$w->id.'/edit') }}" class="btn btn-sm btn-success">Edit</a>
                                    <a href="{{ url('admin/warga/'.$w->id.'/delete') }}" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')" class="btn btn-sm btn-danger">Hapus</a>
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