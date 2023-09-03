@extends('layouts.admin')

@section('content')

    <div class="row">
        <div class="col-md-12">

        @if(session('message'))
            <div class="alert alert-success"> {{ session('message')  }} </div>
        @endif
            <div class="card">
                <div class="card-header">
                    <h4> 
                        <a href="{{ url('admin/alternatif') }}" class="btn btn-warning btn-sm float-end">Kembali</a>
                    </h4>
                </div>
                <div class="card-body">
                    <h5 class="text-center mb-3">Matriks Alternatif - Kriteria</h5>
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Alternatif</th>
                                <th>Nama</th>
                                <th>C1 Konsidi Rumah</th>
                                <th>C2 Pekerjaan</th>
                                <th>C3 Penghasilan</th>
                                <th>C4 Umur</th>
                                <th>C5 Jumlah Tanggungan</th>
                            </tr>
                        </thead>
                        <tbody>
                        @php $n = 1 @endphp
                            @foreach ($alt as $alternative)
                            <tr>
                                <td>{{ $n++ }}</td>
                                <td>{{ $alternative['alternatif'] }}</td>
                                <td>{{ $alternative['nama'] }}</td>
                                <td>{{ $alternative['c1'] }}</td>
                                <td>{{ $alternative['c2'] }}</td>
                                <td>{{ $alternative['c3'] }}</td>
                                <td>{{ $alternative['c4'] }}</td>
                                <td>{{ $alternative['c5'] }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="card-body">
                    <h5 class="text-center mb-3">Perhitungan Bobot Kepentingan</h5>
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th></th>
                                <th>K1</th>
                                <th>K2</th>
                                <th>K3</th>
                                <th>K4</th>
                                <th>K5</th>
                                <th>Jumlah</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Bobot Kepentingan</td>
                                @php $nil = 0 @endphp
                                @forelse ($criterias as $criteria)
                                    @foreach($kepentingans as $kepentingan)
                                        @if ($criteria->kepentingan == $kepentingan->id )
                                            <td>{{ $kepentingan->nilai }}</td>
                                            @php $nil = $nil + $kepentingan->nilai  @endphp
                                            @endif
                                    @endforeach
                                    @empty
                                    <td colspan="7">Tidak Ada Bobot</td>
                                @endforelse
                                <td>{{ $nil }}</td>
                            </tr>
                            <tr>
                                <td>Kepentingan</td>
                                @foreach($hasilBobotKepentingan as $bobotK)
                                    <td>{{ $bobotK }}</td>
                                @endforeach
                                <td>{{array_sum($hasilBobotKepentingan)}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="card-body">
                    <h5 class="text-center mb-3">Perhitungan Pangkat</h5>
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th></th>
                                <th>K1</th>
                                <th>K2</th>
                                <th>K3</th>
                                <th>K4</th>
                                <th>K5</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Cost / Benefit</td>
                                @forelse ($criterias as $criteria)
                                    <td>{{ $criteria->cost_benefit }}</td>
                                @empty
                                    <td colspan="7">Tidak Ada</td>
                                @endforelse
                            </tr>
                            <tr>
                                <td>Kepentingan</td>
                                <td>{{ $bobotPangkat[0] }}</td>
                                <td>{{ $bobotPangkat[1] }}</td>
                                <td>{{ $bobotPangkat[2] }}</td>
                                <td>{{ $bobotPangkat[3] }}</td>
                                <td>{{ $bobotPangkat[4] }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                
                <div class="card-body">
                    <h5 class="text-center mb-3">Perhitungan Nilai S</h5>
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Alternatif</th>
                                <th>S</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $n = 1 @endphp
                            @foreach ($vektorS as $vektors)
                            <tr>
                                <td>{{ $n++ }}</td>
                                <td>{{ $vektors[1] }}</td>
                                <td>{{ $vektors[0] }}</td>
                            </tr>
                            @endforeach
                            <tr>
                                <th colspan=2>Jumlah</th>
                                <td>{{ $jumlahVektorS }}</td>
                            </tr>
                           
                           
                        </tbody>
                        
                    </table>
                </div>

                <div class="card-body">
                    <h5 class="text-center mb-3">Hasil Akhir - Vektor V</h5>
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Alternatif</th>
                                <th>V</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $n = 1 @endphp
                            @foreach ($vektorS as $vektors)
                            <tr>
                                <td>{{ $n++ }}</td>
                                <td>{{ $vektors[1] }}</td>
                                <td>{{ $vektors[0]/$jumlahVektorS }}</td>
                            </tr>
                            @endforeach
                            
                        </tbody>
                    </table>
                </div>

                <!-- <div class="card-body">
                    <h5 class="text-center mb-3">Hasil Keputusan</h5> -->

                    <div class="col-md-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                            <h4 class="card-title">Hasil Keputusan</h4>
                            <p class="card-description">Hasil perangkingan calon penerima beras (raskin)
                                 berdasarkan hasil akhir perhitungan Vektor V
                            <p class="card-description">Rangking Tertinggi adalah
                                  <code> 
                                    @foreach ($hasilVektorV as $x => $vektorv)
                                    @endforeach
                                    {{ $hasilVektorV[1][1] }} - {{ $hasilVektorV[1][0] }}

                                    </code> 
                                <div class="row">
                                    <div class="col-md-6 grid-margin stretch-card">
                                        <ol>
                                        @foreach ($hasilVektorV as $x => $vektorv)
                                        <li>{{ $vektorv[0] }} . {{ $vektorv[1] }} </li>
                                        @endforeach
                                    </ol>
                                    </div>

                                  

                                </div>

                            </div>
                        </div>
                    </div>

                <!-- </div> -->

            </div>
        </div>
    </div>

@endsection