<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kepentingan;
use App\Models\Alternative;
use App\Models\Warga;
use App\Http\Requests\AlternativeRequest;
use Illuminate\Support\Facades\DB;

class AlternativeController extends Controller
{
    
    public function index() 
    {
        $alternatives = Alternative::all();
        $warga = Warga::get();
        $alternatif = Alternative::get()->toArray();


        foreach($warga as $keyW => $w) {
            $alternatifSelected[] = Alternative::whereIn('alternatif', [$w->nik])->get()->toArray();
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
        // dd($alternatifSelectedFilter);
        // dd($alternatifSelected[5][0]['alternatif']);    
        // dd($alternativeInWarga);

        $alt = [];
        $c = 0;
        for($i=0; $i < count($alternativeInWarga); $i++) {
            $wargaInAlternative[] = Warga::whereIn('nik', [$alternativeInWarga[$i]['alternatif']])->get()->toArray();
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
        }

        // dd($alternatifSelected);
        // dd($alternatifSelectedFilter);
        // dd($wargaInAlternative);
        // dd($alt);

        return view('admin.alternatif.index', compact('alternatives', 'alt'));
    }

    public function create()
    {
        $alternatives = Alternative::all();
        $kepentingans = Kepentingan::all();
        $warga = Warga::all();
        $alts = DB::table('alternatives')->pluck('alternatif');
        $wargaNotInAlternative = [];
        $wargaNotInAlternative = Warga::whereNotIn('nik', $alts)->get();

        return view('admin.alternatif.create', compact('alternatives', 'kepentingans', 'warga', 'wargaNotInAlternative'));
    }

    public function showSelectedWarga(Request $request) 
    {
        $data = json_decode($request->getContent(), true);

        $alternatifSelected = Warga::where('nik', $data['nik'])->get();

        return response()->json($alternatifSelected); // Return the data as JSON response
    }

    public function store(AlternativeRequest $request)
    {
        $validatedData = $request->validated();
        Alternative::create([
            'alternatif' => $validatedData['alternatif'],
            'c1'         => $validatedData['c1_alternatif'],
            'c2'         => $validatedData['c2_alternatif'],
            'c3'         => $validatedData['c3_alternatif'],
            'c4'         => $validatedData['c4_alternatif'],
            'c5'         => $validatedData['c5_alternatif'],
        ]);
       
        return redirect('/admin/alternatif')->with('message', 'Data alternatif berhasil ditambah!');
    }

    public function edit(int $alternatif_id)
    {
        $kepentingans = Kepentingan::all();
        $alternatives = Alternative::findOrFail($alternatif_id);
        return view('admin.alternatif.edit', compact('alternatives', 'kepentingans'));
    }

    public function update(AlternativeRequest $request, int $alternatif_id)
    {
        $validatedData = $request->validated();
        $alternatif = Alternative::findOrFail($alternatif_id);

        if($alternatif) {
            $alternatif->update([
                'alternatif' => $validatedData['alternatif'],
                'c1' => $validatedData['c1_alternatif'],
                'c2' => $validatedData['c2_alternatif'],
                'c3' => $validatedData['c3_alternatif'],
                'c4' => $validatedData['c4_alternatif'],
                'c5' => $validatedData['c5_alternatif'],
            ]);

            return redirect('/admin/alternatif')->with('message', 'Data alternatif berhasil diperbarui');
        } else {
            return redirect('/admin/alternatif')->with('message', 'Alternatif ID tidak ditemukan!');
        }
    }

}
