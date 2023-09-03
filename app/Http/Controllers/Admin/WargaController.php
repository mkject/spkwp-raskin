<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Warga;
use App\Models\Alternative;
use App\Models\Kepentingan;
use App\Http\Requests\WargaFormRequest;

class WargaController extends Controller
{
     
    public function index() 
    {
        $warga = Warga::all();
        return view('admin.warga.index', compact('warga'));
    }

    public function create()
    {
        $alternatives = Alternative::all();
        $kepentingans = Kepentingan::all();
        return view('admin.warga.create', compact('alternatives', 'kepentingans'));
    }

    public function store(WargaFormRequest $request)
    {
        $validatedData = $request->validated();
        Warga::create([
            'nik' => $validatedData['nik'],
            'nama' => $validatedData['nama'],
            'tempat_tinggal' => $validatedData['tempat_tinggal'],
            'alamat_lengkap' => $validatedData['alamat_lengkap'],
            'umur' => $validatedData['umur'],
            'pekerjaan' => $validatedData['pekerjaan'],
            'penghasilan' => $validatedData['penghasilan'],
            'status' => $validatedData['status'],
            'tanggungan' => $validatedData['jumlah_tanggungan'],
        ]);
       
        return redirect('/admin/warga')->with('message', 'Data warga berhasil ditambahkan');
    }

    public function edit(int $warga_id)
    {
        $kepentingans = Kepentingan::all();
        $warga = Warga::findOrFail($warga_id);
        return view('admin.warga.edit', compact('warga', 'kepentingans'));
    }
    
    public function update(WargaFormRequest $request, int $warga_id)
    {
        $validatedData = $request->validated();
        $warga = Warga::findOrFail($warga_id);

        if($warga) {
            $warga->update([
                'nik' => $validatedData['nik'],
                'nama' => $validatedData['nama'],
                'tempat_tinggal' => $validatedData['tempat_tinggal'],
                'alamat_lengkap' => $validatedData['alamat_lengkap'],
                'umur' => $validatedData['umur'],
                'pekerjaan' => $validatedData['pekerjaan'],
                'penghasilan' => $validatedData['penghasilan'],
                'status' => $validatedData['status'],
                'tanggungan' => $validatedData['jumlah_tanggungan'],
            ]);

            return redirect('/admin/warga')->with('message', 'Data warga berhasil diperbarui');
        } else {
            return redirect('/admin/warga')->with('message', 'ID Warga tidak ditemukan!');
        }
    }

    public function destroy($warga_id)
    {
        $warga = Warga::FindOrFail($warga_id);
        $warga->delete();
        return redirect('admin/warga')->with('message','Warga berhasil dihapus!');
    }

}
