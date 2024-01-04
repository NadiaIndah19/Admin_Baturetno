<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\KIP;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KIPController extends Controller
{
    public function index()
    {
        $kip = KIP::get();
        return view('content.pelayanan.kip.kip-card',compact('kip'));
    }

    public function create()
    {
        return view('content.pelayanan.kip.create-kip');
    }

    public function store (Request $request)
    {
        $file_pengantar_rt = $request->file('file_pengantar_rt') ? $this->saveFile($request->file('file_pengantar_rt'),'file_pengantar_rt') : '';
        $file_ktp = $request->file('file_ktp') ? $this->saveFile($request->file('file_ktp'),'file_ktp_kip') : '';
        $file_kk = $request->file('file_kk') ? $this->saveFile($request->file('file_kk'),'file_kk_kip') : '';
        $file_akta = $request->file('file_akta') ? $this->saveFile($request->file('file_akta'),'file_akta_kip') : '';
        $file_kks = $request->file('file_kks') ? $this->saveFile($request->file('file_kks'),'file_kks_kip') : '';
        $file_rapor = $request->file('file_rapor') ? $this->saveFile($request->file('file_rapor'),'file_rapor_kip') : '';
        $file_bsm = $request->file('file_penerima_bsm') ? $this->saveFile($request->file('file_penerima_bsm'),'file_bsm_kip') : '';


        KIP::create([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'nisn' => $request->nisn,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'file_pengantar_rt' => $file_pengantar_rt,
            'file_ktp' => $file_ktp,
            'file_kk' => $file_kk,
            'file_akta' => $file_akta,
            'asal_sekolah' => $request->asal_sekolah,
            'file_kks' => $file_kks,
            'file_rapor' => $file_rapor,
            'file_penerima_bsm' => $file_bsm 
        ]);

        return redirect()->route('kip.index')->with('success-create','Data Berhasil Ditambahkan');

    }

    public function edit($id)
    {
        $kip = KIP::where('id',$id)->first();
        

        return view('content.pelayanan.kip.update-kip',compact('kip'));
    }

    public function  update(Request $request , $id)
    {
        $kip = KIP::where('id',$id)->first();
        $file_pengantar_rt = $request->file('file_pengantar_rt') ? $this->saveFile($request->file('file_pengantar_rt'),'file_pengantar_rt') : $kip->file_pengantar_rt;
        $file_ktp = $request->file('file_ktp') ? $this->saveFile($request->file('file_ktp'),'file_ktp_kip') : $kip->file_ktp;
        $file_kk = $request->file('file_kk') ? $this->saveFile($request->file('file_kk'),'file_kk_kip') : $kip->file_kk;
        $file_akta = $request->file('file_akta') ? $this->saveFile($request->file('file_akta'),'file_akta_kip') : $kip->file_akta;
        $file_kks = $request->file('file_kks') ? $this->saveFile($request->file('file_kks'),'file_kks_kip') : $kip->file_kks;
        $file_rapor = $request->file('file_rapor') ? $this->saveFile($request->file('file_rapor'),'file_rapor_kip') : $kip->file_rapor;
        $file_bsm = $request->file('file_penerima_bsm') ? $this->saveFile($request->file('file_penerima_bsm'),'file_bsm_kip') : $kip->file_penerima_bsm;

        $kip->update([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'nisn' => $request->nisn,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'file_pengantar_rt' => $file_pengantar_rt,
            'file_ktp' => $file_ktp,
            'file_kk' => $file_kk,
            'file_akta' => $file_akta,
            'asal_sekolah' => $request->asal_sekolah,
            'file_kks' => $file_kks,
            'file_rapor' => $file_rapor,
            'file_penerima_bsm' => $file_bsm 
        ]);

        return redirect()->route('kip.index')->with('success-update','Data Berhasil Diubah ');
    }

    public function view($id)
    {
        $kip = KIP::where('id',$id)->first();
        return view('content.pelayanan.kip.view-kip',compact('kip'));
    }

    public function saveFile ($file,$location)
    {
        $filename = $file->getClientOriginalName();            
        $time = time();
        $newName = $time.$filename;            
        $path = Storage::putFileAs($location,$file,$newName);
        return $path;
    }
  
    public function updateFile ($file,$location,$data)
    {
        Storage::disk('public')->delete($data);
        $filename = $file->getClientOriginalName();            
        $time = time();
        $newName = $time.$filename;            
        $path = Storage::putFileAs($location,$file,$newName);
        return $path;
    }

    public function destroy (Request $request)
    {
        $kip = KIP::where('id',$request->id)->first();
        Storage::disk('public')->delete($kip->file_pengantar_rt);
        Storage::disk('public')->delete($kip->file_ktp);
        Storage::disk('public')->delete($kip->file_kk);
        Storage::disk('public')->delete($kip->file_akta);

        $kip->delete();
        return response()->json('Data Berhasil Dihapus');
            
    }

  
}
