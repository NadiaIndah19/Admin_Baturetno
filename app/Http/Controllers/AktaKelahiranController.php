<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\AktaKelahiran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AktaKelahiranController extends Controller
{
    public function index()
    {
        $aktakelahiran = AktaKelahiran::get();
        return view('content.kependudukan.birth-list.birth-card',compact('aktakelahiran'));
    }

    public function create()
    {        
        return view('content.kependudukan.birth-list.create-birth-card');
    }

    public function store (Request $request)
    {                
        $filers = $request->file('file_rs') ? $this->saveFile($request->file('file_rs'),'file_rs_aktakelahiran') : '';
        $filekk = $request->file('file_kk') ? $this->saveFile($request->file('file_kk'),'file_kk_aktakelahiran') : '';
        $filektp = $request->file('file_ktp') ? $this->saveFile($request->file('file_ktp'),'file_ktp_aktakelahiran') : '';
        $filebukunikah = $request->file('file_buku_nikah') ? $this->saveFile($request->file('file_buku_nikah'),'file_buku_nikah_aktakelahiran') : '';
        $filektp = $request->file('file_ktp') ? $this->saveFile($request->file('file_ktp'),'file_ktp_aktakelahiran') : '';


        AktaKelahiran::create([
            'nomor_kk' => $request->nomor_kk,
            'nama_kepala_keluarga' => $request->nama_kepala_keluarga,
            'tempat_lahir' => $request->tempat_lahir,
            'nama_lengkap_anak' => $request->nama_lengkap_anak,
            'tempat_lahir_anak' => $request->tempat_lahir_anak,
            'tanggal_lahir_anak' => $request->tanggal_lahir_anak,
            'jenis_dilahirkan' => $request->jenis_dilahirkan,
            'nomor_kelahiran' => $request->nomor_kelahiran,
            'nomor_anak' => $request->nomor_anak,
            'penolong_kelahiran' => $request->penolong_kelahiran, 
            'nik_ayah' => $request->nik_ayah,
            'nik_ibu' => $request->nik_ibu,
            'nama_ayah' => $request->nama_ayah,
            'nama_ibu' => $request->nama_ibu,
            'tanggal_kelahiran_ayah' => $request->tanggal_kelahiran_ayah,
            'tanggal_kelahiran_ibu' => $request->tanggal_kelahiran_ibu,
            'pekerjaan_ayah' => $request->pekerjaan_ayah,
            'pekerjaan_ibu'=> $request->pekerjaan_ibu,
            'kewarganegaraan_ayah' => $request->kewarganegaraan_ayah,
            'kewarganegaraan_ibu' => $request->kewarganegaraan_ibu,
            'alamat' => $request->alamat,
            'tanggal_perkawinan' => $request->tanggal_perkawinan, 
            'file_rs' => $filers,
            'file_kk'=> $filekk,
            'file_ktp' => $filektp,
            'file_buku_nikah' => $filebukunikah,
            'jenis_kelamin' => $request->jenis_kelamin,
            'pukul_kelahiran' => $request->pukul_kelahiran
        ]);

        return redirect()->route('aktakelahiran.index')->with('success-create','Data Berhasil Ditambahkan');
        

    }

    public function edit($id)
    {
        $aktakelahiran = AktaKelahiran::where('id',$id)->first();
        return view('content.kependudukan.birth-list.update-birth-card',compact('aktakelahiran'));
    }

    public function update (Request $request,$id)
    {
        $aktakelahiran = AktaKelahiran::where('id',$id)->first();
        $filers = $request->file('file_rs') ? $this->updateFile($request->file('file_rs'),'file_rs_aktakematian', $aktakelahiran->file_rs  ) : $aktakelahiran->file_rs  ;
        $filekk = $request->file('file_kk') ? $this->updateFile($request->file('file_kk'),'file_kk_aktakematian', $aktakelahiran->file_kk  ) : $aktakelahiran->file_kk  ;
        $filektp = $request->file('file_ktp') ? $this->updateFile($request->file('file_ktp'),'file_ktp_aktakematian', $aktakelahiran->file_ktp  ) : $aktakelahiran->file_ktp  ;
        $filebukunikah = $request->file('file_buku_nikah') ? $this->updateFile($request->file('file_buku_nikah'),'file_buku_nikah_aktakematian', $aktakelahiran->file_buku_nikah  ) : $aktakelahiran->file_buku_nikah  ;

        $aktakelahiran->update([
            'nomor_kk' => $request->nomor_kk,
            'nama_kepala_keluarga' => $request->nama_kepala_keluarga,
            'tempat_lahir' => $request->tempat_lahir,
            'nama_lengkap_anak' => $request->nama_lengkap_anak,
            'tempat_lahir_anak' => $request->tempat_lahir_anak,
            'tanggal_lahir_anak' => $request->tanggal_lahir_anak,
            'jenis_dilahirkan' => $request->jenis_dilahirkan,
            'nomor_kelahiran' => $request->nomor_kelahiran,
            'nomor_anak' => $request->nomor_anak,
            'penolong_kelahiran' => $request->penolong_kelahiran, 
            'nik_ayah' => $request->nik_ayah,
            'nik_ibu' => $request->nik_ibu,
            'nama_ayah' => $request->nama_ayah,
            'nama_ibu' => $request->nama_ibu,
            'tanggal_kelahiran_ayah' => $request->tanggal_kelahiran_ayah,
            'tanggal_kelahiran_ibu' => $request->tanggal_kelahiran_ibu,
            'pekerjaan_ayah' => $request->pekerjaan_ayah,
            'pekerjaan_ibu'=> $request->pekerjaan_ibu,
            'kewarganegaraan_ayah' => $request->kewarganegaraan_ayah,
            'kewarganegaraan_ibu' => $request->kewarganegaraan_ibu,
            'alamat' => $request->alamat,
            'tanggal_perkawinan' => $request->tanggal_perkawinan, 
            'file_rs' => $filers,
            'file_kk'=> $filekk,
            'file_ktp' => $filektp,
            'file_buku_nikah' => $filebukunikah,
            'jenis_kelamin' => $request->jenis_kelamin,
            'pukul_kelahiran' => $request->pukul_kelahiran
        ]);

        return redirect()->route('aktakelahiran.index')->with('success-update','Data Berhasil di ubah');
    }

    public function view($id)
    {
        $aktakelahiran = AktaKelahiran::where('id',$id)->first();
        return view('content.kependudukan.birth-list.view-birth-card',compact('aktakelahiran'));
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
        $aktakelahiran = AktaKelahiran::where('id',$request->id)->first();
        Storage::disk('public')->delete($aktakelahiran->file_kk);
        Storage::disk('public')->delete($aktakelahiran->file_ktp);
        Storage::disk('public')->delete($aktakelahiran->file_rs);
        Storage::disk('public')->delete($aktakelahiran->file_buku_nikah);

        $aktakelahiran->delete();

        return response()->json('Data Berhasil di hapus');

    }
}
