@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4> Tambah Data Warga
                    <a href="{{ url('admin/warga') }}" class="btn btn-primary btn-sm text-white float-end">Kembali</a>
                </h4>
            </div>
            <div class="card-body">
                <form action="{{ url('admin/warga/create') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="col-md-12 mb-3">
                                <label>NIK</label>
                                <input type="text" pattern="\d*" maxlength="16" name="nik" value="" class="form-control"/>
                                @error('nik') <small class="text-danger">{{$message}}</small> @enderror
                            </div>
                            <div class="col-md-12 mb-3">
                                <label>Nama</label>
                                <input type="text" name="nama" value="" class="form-control"/>
                                @error('nama') <small class="text-danger">{{$message}}</small> @enderror
                            </div>
                            <div class="col-md-12 mb-3">
                                <label>Kota Tempat Tinggal</label>
                                <input type="text" name="tempat_tinggal" value="" class="form-control"/>
                                @error('tempat_tinggal') <small class="text-danger">{{$message}}</small> @enderror
                            </div>
                            <div class="col-md-12 mb-3">
                                <label>Alamat Lengkap</label>
                                <input type="text" name="alamat_lengkap" value="" class="form-control"/>
                                @error('alamat_lengkap') <small class="text-danger">{{$message}}</small> @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="col-md-12 mb-3">
                                <label>Umur</label>
                                <input type="text" pattern="\d*" maxlength="3" name="umur" value="" class="form-control"/>
                                @error('umur') <small class="text-danger">{{$message}}</small> @enderror
                            </div>
                            <div class="col-md-12 mb-3">
                                <label>Pekerjaan</label>
                                <select name="pekerjaan" class="form-control">
                                        <option value=""></option>
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
                                        <option value=""></option>
                                        <option value="5"><= 500.000</option>
                                        <option value="4">500.000-1.000.000</option>
                                        <option value="3">1.000.000-2.000.000 </option>
                                        <option value="2">2.000.000-3.000.000 </option>
                                        <option value="1">>= 3.000.000 </option>
                                </select>
                                @error('penghasilan') <small class="text-danger">{{$message}}</small> @enderror
                            </div>
                            <div class="col-md-12 mb-3">
                                <label>Status</label>
                                <select name="status" class="form-control">
                                        <option value=""></option>
                                        <option value="Belum Menikah">Belum Menikah</option>
                                        <option value="Menikah">Menikah</option>
                                </select>
                                @error('status') <small class="text-danger">{{$message}}</small> @enderror
                            </div>
                            <div class="col-md-12 mb-3">
                                <label>Jumlah Tanggungan</label>
                                <select name="jumlah_tanggungan" class="form-control">
                                        <option value=""></option>
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