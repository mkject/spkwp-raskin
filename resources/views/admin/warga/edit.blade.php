@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4> Edit Data Warga
                    <a href="{{ url('admin/warga') }}" class="btn btn-primary btn-sm text-white float-end">Kembali</a>
                </h4>
            </div>
            <div class="card-body">
            <form action="{{ url('admin/warga/'.$warga->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6">
                            <div class="col-md-12 mb-3">
                                <label>NIK</label>
                                <input type="text" pattern="\d*" maxlength="16" name="nik" value="{{$warga->nik}}" class="form-control"/>
                                @error('nik') <small class="text-danger">{{$message}}</small> @enderror
                            </div>
                            <div class="col-md-12 mb-3">
                                <label>Nama</label>
                                <input type="text" name="nama" value="{{ $warga->nama }}" class="form-control"/>
                                @error('nama') <small class="text-danger">{{$message}}</small> @enderror
                            </div>
                            <div class="col-md-12 mb-3">
                                <label>Kota Tempat Tinggal</label>
                                <input type="text" name="tempat_tinggal" value="{{ $warga->tempat_tinggal}}" class="form-control"/>
                                @error('tempat_tinggal') <small class="text-danger">{{$message}}</small> @enderror
                            </div>
                            <div class="col-md-12 mb-3">
                                <label>Alamat Lengkap</label>
                                <input type="text" name="alamat_lengkap" value="{{ $warga->alamat_lengkap }}" class="form-control"/>
                                @error('alamat_lengkap') <small class="text-danger">{{$message}}</small> @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="col-md-12 mb-3">
                                <label>Umur</label>
                                <input type="text" pattern="\d*" maxlength="3" name="umur" value="{{ $warga->umur }}" class="form-control"/>
                                @error('umur') <small class="text-danger">{{$message}}</small> @enderror
                            </div>
                            <div class="col-md-12 mb-3">
                                <label>Pekerjaan</label>
                                <select name="pekerjaan" class="form-control">
                                        <option value="{{ $warga->pekerjaan }}">{{ $warga->pekerjaan }}</option>
                                        <option value="Pengangguran">Pengangguran</option>
                                        <option value="Buruh">Buruh</option>
                                        <option value="Wiraswasta">Wiraswasta</option>
                                        <option value="Pensiunan">Pensiunan</option>
                                        <option value="PNS">PNS</option>
                                </select>
                                @error('pekerjaan') <small class="text-danger">{{$message}}</small> @enderror
                            </div>
                            <div class="col-md-12 mb-3">
                                <label>Penghasilan</label>
                                <select name="penghasilan" class="form-control">
                                        <option value="{{ $warga->penghasilan }}">
                                        @if($warga->penghasilan == 5 )
                                            <= 500rb 
                                        @elseif($warga->penghasilan == 4 )
                                            500-1jt
                                        @elseif($warga->penghasilan == 3 )
                                            1jt-2jt
                                        @elseif($warga->penghasilan == 2 )
                                            2jt-3jt
                                        @elseif($warga->penghasilan == 1 )
                                            >= 3jt
                                        @else 
                                            Tidak Ada
                                         @endif
                                        </option>
                                        <option value="5"><= 500rb</option>
                                        <option value="4">500-1jt</option>
                                        <option value="3">1jt-2jt </option>
                                        <option value="2">2jt-3jt</option>
                                        <option value="1">>= 3jt </option>
                                </select>
                                @error('penghasilan') <small class="text-danger">{{$message}}</small> @enderror
                            </div>
                            <div class="col-md-12 mb-3">
                                <label>Status</label>
                                <select name="status" class="form-control">
                                        <option value="{{ $warga->status }}">{{ $warga->status }}</option>
                                        <option value="Belum Menikah">Belum Menikah</option>
                                        <option value="Menikah">Menikah</option>
                                </select>
                                @error('status') <small class="text-danger">{{$message}}</small> @enderror
                            </div>
                            <div class="col-md-12 mb-3">
                                <label>Jumlah Tanggungan</label>
                                <select name="jumlah_tanggungan" class="form-control">
                                    <option value="{{ $warga->tanggungan }}">{{ $warga->tanggungan }}</option>
                                    <option value="0">0</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">>= 5</option>
                                </select>
                                @error('jumlah_tanggungan') <small class="text-danger">{{$message}}</small> @enderror
                            </div>
                                <div class="col-md-12 mb-3">
                                    <button type="submit" class="btn btn-primary float-end"> Simpan </button>
                                </div>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection