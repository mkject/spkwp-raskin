<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Criteria;
use App\Models\Alternative;
use App\Models\Kepentingan;
use App\Http\Requests\CriteriaFormRequest;

class KriteriaController extends Controller
{
    public function index() 
    {
        $kepentingans = Kepentingan::all();
        $criterias = Criteria::all();
        return view('admin.kriteria.index', compact('criterias', 'kepentingans'));
    }

    public function create()
    {
        $criterias = Criteria::all();
        $kepentingans = Kepentingan::all();
        return view('admin.kriteria.create', compact('criterias', 'kepentingans'));
    }

    public function store(CriteriaFormRequest $request)
    {
        $validatedData = $request->validated();
        Criteria::create([
            'kriteria'       => $validatedData['kriteria'],
            'kepentingan' => $validatedData['kepentingan_id'],
            'cost_benefit'   => $validatedData['cost_benefit'],
        ]);
       
        return redirect('/admin/kriteria')->with('message', 'Data kriteria berhasil ditambah!');
    }

    public function edit(int $criteria_id)
    {
        $kepentingans = Kepentingan::all();
        $criteria = Criteria::findOrFail($criteria_id);
        return view('admin.kriteria.edit', compact('criteria', 'kepentingans'));
    }

    public function update(CriteriaFormRequest $request, int $kriteria_id)
    {
        $validatedData = $request->validated();
        $kriteria = Criteria::findOrFail($kriteria_id);
        if($kriteria) {
            $kriteria->update([
                'kriteria' => $validatedData['kriteria'],
                'kepentingan' => $validatedData['kepentingan_id'],
                'cost_benefit' => $validatedData['cost_benefit']
            ]);
            return redirect('/admin/kriteria')->with('message', 'Data kriteria berhasil diperbarui');
        } else {
            return redirect('/admin/kriteria')->with('message', 'Kriteria ID tidak ditemukan!');
        }
    }

    public function destroy($kriteria_id)
    {
        $criteria = Criteria::FindOrFail($kriteria_id);
        $criteria->delete();
        return redirect('admin/kriteria')->with('message','Kriteria berhasil dihapus!');
    }

}
