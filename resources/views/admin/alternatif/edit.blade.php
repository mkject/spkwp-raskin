@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4> Edit Data Alternatif
                    <a href="{{ url('admin/alternatif') }}" class="btn btn-primary btn-sm text-white float-end">Back</a>
                </h4>
            </div>
            <div class="card-body">
                <form action="{{ url('admin/alternatif/'.$alternatives->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                        <div class="col-md-6 mb-3">
                            <label>Name Alternatif</name>
                            <input type="text" name="alternatif" value="{{ $alternatives->alternatif }}" class="form-control"/>
                            @error('alternatif') <small class="text-danger">{{$message}}</small> @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>C1 Kondisi Rumah</label>
                            <select name="c1_alternatif" class="form-control">
                            <option value="{{ $alternatives->c1 }}">{{ $alternatives->c1 }}</option>
                                @foreach($kepentingans as $kepentingan)
                                    <option value="{{ $kepentingan->nilai }}">{{ $kepentingan->keterangan }}</option>
                                    @error('c1_alternatif') <small class="text-danger">{{$message}}</small> @enderror
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>C2 Pekerjaan</label>
                            <select name="c2_alternatif" class="form-control">
                                @foreach($kepentingans as $kepentingan)
                                    <option value="{{ $kepentingan->id }}">{{ $kepentingan->keterangan }}</option>
                                    @error('c2_alternatif') <small class="text-danger">{{$message}}</small> @enderror
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>C3 Penghasilan</label>
                            <select name="c3_alternatif" class="form-control">
                                @foreach($kepentingans as $kepentingan)
                                    <option value="{{ $kepentingan->id }}">{{ $kepentingan->keterangan }}</option>
                                    @error('c3_alternatif') <small class="text-danger">{{$message}}</small> @enderror
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>C4 Umur</label>
                            <select name="c4_alternatif" class="form-control">
                                @foreach($kepentingans as $kepentingan)
                                    <option value="{{ $kepentingan->id }}">{{ $kepentingan->keterangan }}</option>
                                    @error('c4_alternatif') <small class="text-danger">{{$message}}</small> @enderror
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>C5 Jumlah Tanggungan</label>
                            <select name="c5_alternatif" class="form-control">
                                @foreach($kepentingans as $kepentingan)
                                    <option value="{{ $kepentingan->id }}">{{ $kepentingan->keterangan }}</option>
                                    @error('c5_alternatif') <small class="text-danger">{{$message}}</small> @enderror
                                @endforeach
                            </select>
                        </div>
                        
                        <div class="col-md-6 mb-3">
                            <button type="submit" class="btn btn-primary float-end"> Simpan </button>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection