@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4> Tambah Data Alternatif
                    <a href="{{ url('admin/alternatif') }}" class="btn btn-primary btn-sm text-white float-end">Kembali</a>
                </h4>
            </div>
            <div class="card-body">
                <div class="row">
              
                    <div class="col-md-6">
                        <div class="card-header col-md-9">
                            <h4> </h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ url('admin/alternatif/create') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                    <div class="col-md-6 mb-3">
                                        <label>Nama Alternatif</label>
                                        <select name="alternatif" id="nama_alt" class="form-control">
                                            <option value="">---Pilih Warga---</option>
                                            @foreach($wargaNotInAlternative as $w)
                                                <option value="{{ $w->nik }}">{{ $w->nama }}</option>
                                            @endforeach
                                            </select>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label>C1 Kondisi Rumah</label>
                                        <select name="c1_alternatif" class="form-control">
                                            @foreach($kepentingans as $kepentingan)
                                                <option value="{{ $kepentingan->nilai }}">{{ $kepentingan->keterangan }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label>C2 Pekerjaan</label>
                                        <select name="c2_alternatif" class="form-control">
                                            @foreach($kepentingans as $kepentingan)
                                                <option value="{{ $kepentingan->id }}">{{ $kepentingan->keterangan }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label>C3 Penghasilan</label>
                                        <select name="c3_alternatif" class="form-control">
                                            @foreach($kepentingans as $kepentingan)
                                                <option value="{{ $kepentingan->id }}">{{ $kepentingan->keterangan }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label>C4 Umur</label>
                                        <select name="c4_alternatif" class="form-control">
                                            @foreach($kepentingans as $kepentingan)
                                                <option value="{{ $kepentingan->id }}">{{ $kepentingan->keterangan }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label>C5 Jumlah Tanggungan</label>
                                        <select name="c5_alternatif" class="form-control">
                                            @foreach($kepentingans as $kepentingan)
                                                <option value="{{ $kepentingan->id }}">{{ $kepentingan->keterangan }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <button type="submit" class="btn btn-primary float-end"> Simpan </button>
                                    </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card-header col-md-9">
                            <h5> Informasi Warga</h4>
                        </div>
                        <div class="card-body">
                            <div class="col-md-6 mb-3">
                                <label>Nama Warga</label>
                                <input type="text" name="name" id="showAlternatif" class="form-control"/>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Pekerjaan</label>
                                <input type="text" name="name" id="showPekerjaan" class="form-control"/>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Penghasilan</label>
                                <input type="text" name="name" id="showPenghasilan" class="form-control"/>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Umur</label>
                                <input type="text" name="name" id="showUmur" class="form-control"/>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Jumlah Tanggungan</label>
                                <input type="text" name="name" id="showTanggungan" class="form-control"/>
                            </div>
                        </div>  
                    </div>

                </div>
            </div>

            </div>
        </div>
    </div>  
</div>
@endsection

@section('scripts')
<script>

    $(document).ready(function() {    
        // $('#nama_alt').click(function(e) {
        $('#nama_alt').change(function (e) {
            e.preventDefault();
            let alternatif = $('#nama_alt').val();
            var csrfToken = $('meta[name="csrf-token"]').attr('content');
            let dataToSend = {
                nik: alternatif,
            };

            $.ajax({
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': csrfToken,
                },
                url: '{{ url("admin/alternatif/show") }}',
                // data: {
                //     selectedWarga: $('#nama_alt').val()
                // },
                data: JSON.stringify(dataToSend), // Convert data to JSON string
                // dataType: 'json',
                success: function(response) {
                    console.log(response);

                    let responseResults = JSON.stringify(response, null, 2);
                    let responseObject = JSON.parse(responseResults);

                    // console.log(responseResults[0]);
                    // console.log(response[0].nik);

                    let alternatifResponse = response[0].nama;
                    let umurResponse = response[0].umur;
                    let pekerjaanResponse = response[0].pekerjaan;
                    let penghasilanResponse = response[0].penghasilan;
                    let tanggunganResponse = response[0].tanggungan;

                    $('#showAlternatif').val(alternatifResponse);
                    $('#showUmur').val(umurResponse);
                    $('#showPekerjaan').val(pekerjaanResponse);
                    // let penghasilan = $('#showPenghasilan').val(penghasilanResponse);
                    if(penghasilanResponse === 5) {
                        $('#showPenghasilan').val('<= 500')
                    } else if (penghasilanResponse === 4 ) {
                        $('#showPenghasilan').val('500-1jt')
                    } else if (penghasilanResponse === 3 ) {
                        $('#showPenghasilan').val('1jt-2jt')
                    } else if (penghasilanResponse === 3 ) {
                        $('#showPenghasilan').val('2jt-3jt')
                    } else if (penghasilanResponse === 1 ) {
                        $('#showPenghasilan').val('> 3jt')
                    } else {
                        $('#showPenghasilan').val('0')
                    }
                    $('#showTanggungan').val(tanggunganResponse);
                },
                error: function (error) {
                    console.error(error);
                }
            });
        });
    });
    
    function showDataSelectedWarga(wargaSelected) {
           
    }
    
</script>
@endsection
