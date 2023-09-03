@extends('layouts.admin')
@section('content')


    <div class="row">
        <div class="col-md-12">

        @if(session('message'))
            <div class="alert alert-success"> {{ session('message')  }} </div>
        @endif
            <div class="card">
                <div class="card-header">
                    <h4> Tambah Kriteria
                        <a href="{{ url('admin/kriteria') }}" class="btn btn-danger btn-sm float-end">Kembali</a>
                    </h4>
                </div>
                <div class="card-body">

                @if ($errors->any())
                <div class="alert alert-warning">
                    @foreach ($errors->all() as $error)
                    <div>{{$error}}</div>
                    @endforeach
                </div>
                @endif

                <form action="{{ url('admin/kriteria/create') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">
                                    Tambah
                                </button>
                            </li>
                        </ul>

                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade border p-3 show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                                <div class="col-md-6 mb-3">
                                    <label>Nama Kriteria</label>
                                    <input type="text" name="kriteria" value="" class="form-control">
                                    @error('kriteria') <small class="text-danger">{{$message}}</small> @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Pilih Bobot Kepentingan</label>
                                    <select name="kepentingan_id" class="form-control">
                                        <option value=""></option>
                                        @foreach($kepentingans as $kepentingan)
                                            <option value="{{ $kepentingan->id }}">{{ $kepentingan->keterangan }}</option>
                                        @endforeach
                                    </select>
                                    @error('kepentingan_id') <small class="text-danger">{{$message}}</small> @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Pilih Atribut</label>
                                    <select name="cost_benefit" class="form-control">
                                        <option value=""></option>
                                        <option value="Cost">Cost</option>
                                        <option value="Benefit">Benefit</option>
                                    </select>
                                    @error('cost_benefit') <small class="text-danger">{{$message}}</small> @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 py-2 float-start">
                            <button type="submit" class="btn btn-primary">Tambah</button>
                        </div>

                </form>

                
            </div>
        </div>
    </div>

@endsection