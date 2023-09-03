<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Criteria;
use App\Models\Alternative;
use App\Models\Kepentingan;
use App\Models\Warga;


class PerhitunganController extends Controller
{
    public function index() 
    {
        $alternatives = Alternative::all();
        $criterias = Criteria::all();
        $kepentingans = Kepentingan::all();
        $warga = Warga::get()->toArray();
        $hasilBobotKepentingan = [];
        $bobotPangkat = [];
        $vektorS = [];
        $alt = [];

        foreach($warga as $keyW => $w) {
            $alternatifSelected[] = Alternative::whereIn('alternatif', [$w['nik']])->get()->toArray();
            $alternatifSelectedFilter = array_filter($alternatifSelected);
        }

        $alternativeInWarga = [];
        foreach($alternatifSelectedFilter as $keyF => $altSelected) {
            $alternativeInWarga[] = [
                'id'         => $alternatifSelectedFilter[$keyF][0]['id'],
                'alternatif' => $alternatifSelectedFilter[$keyF][0]['alternatif'],
                'c1'         => $alternatifSelectedFilter[$keyF][0]['c1'],
                'c2'         => $alternatifSelectedFilter[$keyF][0]['c2'],
                'c3'         => $alternatifSelectedFilter[$keyF][0]['c3'],
                'c4'         => $alternatifSelectedFilter[$keyF][0]['c4'],
                'c5'         => $alternatifSelectedFilter[$keyF][0]['c5'],
            ];
        }

        for($i=0; $i < count($alternativeInWarga); $i++) {
            // $alternatifSelected[] = Alternative::where('alternatif', $warga[$i]['nik'])->get()->toArray();
            $wargaInAlternative[] = Warga::where('nik', $alternativeInWarga[$i]['alternatif'])->get()->toArray();
            // if(isset($alternatifSelected[$i][0]) && $wargaInAlternative[$i][0]) {
                $alt[] = [
                    'id'         => $alternativeInWarga[$i]['id'],
                    'alternatif' => $alternativeInWarga[$i]['alternatif'],
                    'nama'       => $wargaInAlternative[$i][0]['nama'],
                    'c1'         => $alternativeInWarga[$i]['c1'],
                    'c2'         => $alternativeInWarga[$i]['c2'],
                    'c3'         => $alternativeInWarga[$i]['c3'],
                    'c4'         => $alternativeInWarga[$i]['c4'],
                    'c5'         => $alternativeInWarga[$i]['c5'],
                ];
            // }
        }

        // dd($wargaInAlternative);
        // dd($alt);   

        $jumlahNilaiKriteria = 0;
        $hasilNilaiKriteria = 0;

        // mencari jumlah kriteria
        foreach($criterias as $criteria) {
            foreach($kepentingans as $kepentingan) {
                if ($criteria->kepentingan == $kepentingan->id) {
                    $jumlahNilaiKriteria += $kepentingan->nilai;
                }
            }
        }

        foreach($criterias as $criteria) {
            foreach($kepentingans as $kepentingan) {
                if ($criteria->kepentingan == $kepentingan->id) {
                    $hasilBobotKepentingan[] = $kepentingan->nilai/$jumlahNilaiKriteria;
                    if($criteria->cost_benefit == 'Cost') {
                        $bobotPangkat[] = $kepentingan->nilai/$jumlahNilaiKriteria*(-1);
                    } else {
                        $bobotPangkat[] = $kepentingan->nilai/$jumlahNilaiKriteria*1;
                    }
                }
            }
        }

        // mencari vektor S
        $vektorS = [];
        $jumlahVektorS = 0;
        $alternatives2 = Alternative::get()->toArray();
        for($i=0; $i < count($alternatives2); $i++) {
            for($j=0; $j < count($bobotPangkat); $j++) {
                $s1[$i][$j] = pow(($alternatives2[$i]['c1']), $bobotPangkat[$j]);
                $s2[$i][$j] = pow(($alternatives2[$i]['c2']), $bobotPangkat[$j]);
                $s3[$i][$j] = pow(($alternatives2[$i]['c3']), $bobotPangkat[$j]);
                $s4[$i][$j] = pow(($alternatives2[$i]['c4']), $bobotPangkat[$j]);
                $s5[$i][$j] = pow(($alternatives2[$i]['c5']), $bobotPangkat[$j]);
            }
            $SumVektorS[$i] = $s1[$i][0]*$s2[$i][1]*$s3[$i][2]*$s4[$i][3]*$s5[$i][4];           
            $vektorS[$i] = [$s1[$i][0]*$s2[$i][1]*$s3[$i][2]*$s4[$i][3]*$s5[$i][4], $alternatives[$i]['alternatif']]; 
            $jumlahVektorS += $SumVektorS[$i];
        }

        // dd($vektorS);
        
        $jumlahVektorV = 0;
        $hasilVektorV = [];
        foreach($vektorS as $ki => $vektors) {
            $hasilVektorV[] = [$vektors[1], round($vektors[0]/$jumlahVektorS, 6)];
        }
        
        arsort($hasilVektorV);

        return view('admin.perhitungan.index', compact('alt', 'criterias', 'hasilBobotKepentingan',
                                                        'kepentingans', 'bobotPangkat', 'vektorS', 
                                                        'jumlahVektorS', 'hasilVektorV'));
    }

}
