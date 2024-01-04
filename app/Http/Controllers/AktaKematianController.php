<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\AktaKematian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AktaKematianController extends Controller
{
    public function index()
    {
        $aktakematian = AktaKematian::get();
        return view('content.kependudukan.death-list.death-card',compact('aktakematian'));
    }

    public function create()
    {
        return view('content.kependudukan.death-list.create-death-card');
    }

    public function store (Request $request)
    {        
        $filepernyataan = $request->file('file_pernyataan') ? $this->saveFile($request->file('file_pernyataan'),'file_pernyataan_aktakematian') : '';
        $filektp = $request->file('file_ktp') ? $this->saveFile($request->file('file_ktp'),'file_ktp_aktakematian') : '';
        $filekk = $request->file('file_kk') ? $this->saveFile($request->file('file_kk'),'file_kk_aktakematian') : '';
        $fileaktakelahiran = $request->file('file_akta_kelahiran') ? $this->saveFile($request->file('file_akta_kelahiran'),'file_akta_kelahiran_aktakematian') : '';
        $filebukunikah = $request->file('file_buku_nikah') ? $this->saveFile($request->file('file_buku_nikah'),'file_buku_nikah_aktakematian') : '';
        $filettd = $request->file('file_ttd') ? $this->saveFile($request->file('file_ttd'),'file_ttd_aktakematian') : '';

        AktaKematian::create([
            'nama_pendaftar' => $request->nama_pendaftar,
            'hubungan' => $request->hubungan,
            'nik_alm' => $request->nik_alm,
            'nama' => $request->nama,
            'tanggal_lahir' => $request->tanggal_lahir,
            'tempat_lahir' => $request->tempat_lahir,
            'agama' => $request->agama,
            'status_perkawinan' => $request->status_perkawinan,
            'jenis_kelamin' => $request->jenis_kelamin,
            'pekerjaan' => $request->pekerjaan,
            'kewarganegaraan' => $request->kewarganegaraan,
            'tanggal_meninggal' => $request->tanggal_meninggal,
            'penyebab_kematian' => $request->penyebab_kematian,
            'tempat_meninggal' =>$request->tempat_meninggal,
            'alamat' => $request->alamat,
            'catatan' => $request->catatan,
            'file_pernyataan' => $filepernyataan,
            'file_ktp' => $filektp,
            'file_kk' => $filekk,
            'file_ttd' => $filettd,
            'file_akta_kelahiran' => $fileaktakelahiran,
            'file_buku_nikah' => $filebukunikah
        ]);

        return redirect()->route('aktakematian.index')->with('success-create','Data Berhasil Ditambahkan');

    }

    public function edit($id)
    {

        $aktakematian = AktaKematian::where('id',$id)->first();
        return view('content.kependudukan.death-list.update-death-card',compact('aktakematian'));
    }

    public function update (Request $request,$id)
    {
        $aktakematian = AktaKematian::where('id',$id)->first();
        $filepernyataan = $request->file('file_pernyataan') ? $this->updateFile($request->file('file_pernyataan'),'file_pernyataan_aktakematian', $aktakematian->file_pernyataan  ) : $aktakematian->file_pernyataan  ;
        $filektp = $request->file('file_ktp') ? $this->updateFile($request->file('file_ktp'),'file_ktp_aktakematian',$aktakematian->file_ktp) : $aktakematian->file_ktp;
        $filekk = $request->file('file_kk') ? $this->updateFile($request->file('file_kk'),'file_kk_aktakematian',$aktakematian->file_kk) : $aktakematian->file_kk;
        $fileaktakelahiran = $request->file('file_akta_kelahiran') ? $this->updateFile($request->file('file_akta_kelahiran'),'file_akta_kelahiran_aktakematian',$aktakematian->file_akta_kelahiran) : $aktakematian->file_akta_kelahiran;
        $filebukunikah = $request->file('file_buku_nikah') ? $this->updateFile($request->file('file_buku_nikah'),'file_buku_nikah_aktakematian',$aktakematian->file_buku_nikah) : $aktakematian->file_buku_nikah;
        $filettd = $request->file('file_ttd') ? $this->updateFile($request->file('file_ttd'),'file_ttd_aktakematian',$aktakematian->file_ttd) : $aktakematian->file_ttd ;

        $aktakematian->update([
            'nama_pendaftar' => $request->nama_pendaftar,
            'hubungan' => $request->hubungan,
            'nik_alm' => $request->nik_alm,
            'nama' => $request->nama,
            'tanggal_lahir' => $request->tanggal_lahir,
            'tempat_lahir' => $request->tempat_lahir,
            'agama' => $request->agama,
            'status_perkawinan' => $request->status_perkawinan,
            'jenis_kelamin' => $request->jenis_kelamin,
            'pekerjaan' => $request->pekerjaan,
            'kewarganegaraan' => $request->kewarganegaraan,
            'tanggal_meninggal' => $request->tanggal_meninggal,
            'penyebab_kematian' => $request->penyebab_kematian,
            'alamat' => $request->alamat,
            'catatan' => $request->catatan,
            'file_pernyataan' => $filepernyataan,
            'file_ktp' => $filektp,
            'file_kk' => $filekk,
            'file_ttd' => $filettd,
            'file_akta_kelahiran' => $fileaktakelahiran,
            'file_buku_nikah' => $filebukunikah
        ]);

        return redirect()->route('aktakematian.index')->with('success-update','Data Berhasil di ubah');
    }

    public function view($id)
    {
        $aktakematian = AktaKematian::where('id',$id)->first();
        return view('content.kependudukan.death-list.view-death-card',compact('aktakematian'));
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
      $aktakematian = AktaKematian::where('id',$request->id)->first();
      Storage::disk('public')->delete($aktakematian->file_pernyataan);
      Storage::disk('public')->delete($aktakematian->file_ktp);
      Storage::disk('public')->delete($aktakematian->file_kk);
      Storage::disk('public')->delete($aktakematian->file_ttd);
      Storage::disk('public')->delete($aktakematian->file_akta_kelahiran);
      Storage::disk('public')->delete($aktakematian->file_buku_nikah);

      $aktakematian->delete();

      return response()->json('Data Berhasil di hapus');
      
    }

   
}
