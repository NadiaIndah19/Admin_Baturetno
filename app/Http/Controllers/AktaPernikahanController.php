<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\AktaPernikahan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AktaPernikahanController extends Controller
{
    public function index ()
    {
        $pernikahan = AktaPernikahan::get();
        
        return view('content.kependudukan.marriage-list.marriage-card',compact('pernikahan'));
    }

    public function create ()
    {
        return view('content.kependudukan.marriage-list.create-marriage-card');
    }

    public function show ()
    {
        return view('content.kependudukan.marriage-list.view-marriage-card');
    }

    public function store (Request $request)
    {
        
        // dd($request->all());
          $suratdesalk = $request->file('surat_desa_laki') ? $this->saveFile($request->file('surat_desa_laki'),'surat_desa_laki') : '';
          $ktplk = $request->file('ktp_laki') ? $this->saveFile($request->file('ktp_laki') , 'ktp_laki')  : '';
          $aktakelahiranlaki = $request->file('akta_kelahiran_laki') ? $this->saveFile($request->file('akta_kelahiran_laki'),'akta_kelahiran_laki')  : '';
          $kklk = $request->file('kk_laki') ? $this->saveFile($request->file('kk_laki'),'kk_laki')  : '';
          $ktportulk = $request->file('ktp_ortu_laki') ? $this->saveFile($request->file('ktp_ortu_laki') , 'ktp_ortu_laki')  : '' ;
          $suratnikahortulk = $request->file('surat_nikah_ortu_lk') ? $this->saveFile($request->file('surat_nikah_ortu_lk'),'surat_nikah_ortu')  : ''; 
          $fotolk = $request->file('foto_laki') ? $this->saveFile($request->file('foto_laki'),'foto_laki')  : '';
          $suratdesapr = $request->file('surat_desa_pr') ? $this->saveFile($request->file('surat_desa_pr') ,'surat_desa_pr') : '';
          $ktppr = $request->file('ktp_pr') ? $this->saveFile($request->file('ktp_pr') , 'ktp_pr' ) : '' ;
          $aktapr = $request->file('akta_kelahiran_pr') ? $this->saveFile($request->file('akta_kelahiran_pr'),'akta_kelahiran_pr') : '' ;
          $kkpr = $request->file('kk_pr') ? $this->saveFile($request->file('kk_pr') , 'kk_pr') : '';
          $ktportupr = $request->file('ktp_ortu_pr') ? $this->saveFile($request->file('ktp_ortu_pr'),'ktp_ortu_pr') : '';
          $ktpsaksi = $request->file('ktp_saksi') ? $this->saveFile($request->file('ktp_saksi'),'ktp_saksi') : '';
          $fotopr = $request->file('foto_pr') ? $this->saveFile($request->file('foto_pr'),'foto_pr') : '';       
          $suratnikahortupr = $request->file('surat_nikah_ortu_pr') ? $this->saveFile($request->file('surat_nikah_ortu_pr'),'surat_nikah_ortu_pr')  : ''; 
          
          AktaPernikahan::create([
            'nama_laki' => $request->nama_laki,
            'nik_laki' => $request->nik_laki,
            'tempat_lahir_laki' => $request->tempat_lahir_laki,
            'tanggal_lahir_laki' => $request->tanggal_lahir_laki,
            'nama_ayah_laki' => $request->nama_ayah_laki,
            'nama_ibu_laki' => $request->nama_ibu_laki,
            'alamat_laki' => $request->alamat_laki,
            'surat_desa_laki' => $suratdesalk,
            'ktp_laki' =>$ktplk,
            'akta_kelahiran_laki' =>$aktakelahiranlaki,
            'ktp_ortu_laki' => $ktportulk,
            'kk_laki' => $kklk,
            'foto_laki' => $fotolk,
            'nama_pr' => $request->nama_pr,
            'nik_pr' => $request->nik_pr,
            'tempat_lahir_pr' => $request->tempat_lahir_pr,
            'tanggal_lahir_pr' => $request->tanggal_lahir_pr,
            'nama_ayah_pr' => $request->nama_ayah_pr,
            'nama_ibu_pr' => $request->nama_ibu_pr,
            'alamat_pr' => $request->alamat_pr,
            'surat_desa_pr' => $suratdesapr,
            'ktp_pr' => $ktppr,
            'akta_kelahiran_pr' => $aktapr,
            'ktp_ortu_pr' =>$ktportupr,
            'foto_pr' => $fotopr,
            'nama_saksi' => $request->nama_saksi,
            'ktp_saksi' => $ktpsaksi,
            'kk_pr' => $kkpr,
            'surat_nikah_ortu_lk' => $suratnikahortulk,
            'surat_nikah_ortu_pr' => $suratnikahortupr
          ]);


          return redirect()->route('pernikahan.index')->with('success-create','Data Berhasil Ditambahkan');                
    }

    public function edit ($id)
    {

        $pernikahan = AktaPernikahan::where('id',$id)->first();
        return view('content.kependudukan.marriage-list.update-marriage-card',compact('pernikahan'));
    }

    public function update (Request $request , $id)
    {
         $pernikahan = AktaPernikahan::where('id',$id)->first();

          $suratdesalk = $request->file('surat_desa_laki') ? $this->updateFile($request->file('surat_desa_laki'),'surat_desa_laki', $request->surat_desa_laki) : $pernikahan->surat_desa_laki ;
          $ktplk = $request->file('ktp_laki') ? $this->updateFile($request->file('ktp_laki') , 'ktp_laki' , $request->ktp_laki)  : $pernikahan->ktp_laki;
          $aktakelahiranlaki = $request->file('akta_kelahiran_laki') ? $this->updateFile($request->file('akta_kelahiran_laki'),'akta_kelahiran_laki', $request->akta_kelahiran_laki)  : $pernikahan->akta_kelahiran_laki;
          $kklk = $request->file('kk_laki') ? $this->updateFile($request->file('kk_laki'),'kk_laki', $request->kk_laki)  : $pernikahan->kk_laki;
          $ktportulk = $request->file('ktp_ortu_laki') ? $this->updateFile($request->file('ktp_ortu_laki') , 'ktp_ortu_laki' , $request->ktp_ortu_laki)  : $pernikahan->ktp_ortu_laki ;
          $suratnikahortulk = $request->file('surat_nikah_ortu_lk') ? $this->updateFile($request->file('surat_nikah_ortu_lk'),'surat_nikah_ortu' , $request->surat_nikah_ortu_lk)  : $pernikahan->surat_nikah_ortu_lk; 
          $fotolk = $request->file('foto_laki') ? $this->updateFile($request->file('foto_laki'),'foto_laki',$request->foto_laki)  : $pernikahan->foto_laki;
          $suratdesapr = $request->file('surat_desa_pr') ? $this->updateFile($request->file('surat_desa_pr') ,'surat_desa_pr' , $request->surat_desa_pr) : $pernikahan->surat_desa_pr;
          $ktppr = $request->file('ktp_pr') ? $this->updateFile($request->file('ktp_pr') , 'ktp_pr'  , $request->ktp_pr) : $pernikahan->ktp_pr  ;
          $aktapr = $request->file('akta_kelahiran_pr') ? $this->updateFile($request->file('akta_kelahiran_pr'),'akta_kelahiran_pr' , $request->akta_kelahiran_pr) : $pernikahan->akta_kelahiran_pr ;
          $kkpr = $request->file('kk_pr') ? $this->updateFile($request->file('kk_pr') , 'kk_pr' , $request->kk_pr) : $pernikahan->kk_pr;
          $ktportupr = $request->file('ktp_ortu_pr') ? $this->updateFile($request->file('ktp_ortu_pr'),'ktp_ortu_pr' , $request->ktp_ortu_pr) : $pernikahan->ktp_ortu_pr;
          $ktpsaksi = $request->file('ktp_saksi') ? $this->updateFile($request->file('ktp_saksi'),'ktp_saksi' , $request->ktp_saksi) : $pernikahan->ktp_saksi;
          $fotopr = $request->file('foto_pr') ? $this->updateFile($request->file('foto_pr'),'foto_pr' , $request->foto_pr) : $pernikahan->foto_pr;       
          $suratnikahortupr = $request->file('surat_nikah_ortu_pr') ? $this->updateFile($request->file('surat_nikah_ortu_pr'),'surat_nikah_ortu_pr' , $request->surat_nikah_ortu_pr)  : $pernikahan->surat_nikah_ortu_pr; 
          
          AktaPernikahan::where('id',$id)->update([
            'nama_laki' => $request->nama_laki,
            'nik_laki' => $request->nik_laki,
            'tempat_lahir_laki' => $request->tempat_lahir_laki,
            'tanggal_lahir_laki' => $request->tanggal_lahir_laki,
            'nama_ayah_laki' => $request->nama_ayah_laki,
            'nama_ibu_laki' => $request->nama_ibu_laki,
            'alamat_laki' => $request->alamat_laki,
            'surat_desa_laki' => $suratdesalk,
            'ktp_laki' =>$ktplk,
            'akta_kelahiran_laki' =>$aktakelahiranlaki,
            'ktp_ortu_laki' => $ktportulk,
            'kk_laki' => $kklk,
            'foto_laki' => $fotolk,
            'nama_pr' => $request->nama_pr,
            'nik_pr' => $request->nik_pr,
            'tempat_lahir_pr' => $request->tempat_lahir_pr,
            'tanggal_lahir_pr' => $request->tanggal_lahir_pr,
            'nama_ayah_pr' => $request->nama_ayah_pr,
            'nama_ibu_pr' => $request->nama_ibu_pr,
            'alamat_pr' => $request->alamat_pr,
            'surat_desa_pr' => $suratdesapr,
            'ktp_pr' => $ktppr,
            'akta_kelahiran_pr' => $aktapr,
            'ktp_ortu_pr' =>$ktportupr,
            'foto_pr' => $fotopr,
            'nama_saksi' => $request->nama_saksi,
            'ktp_saksi' => $ktpsaksi,
            'kk_pr' => $kkpr,
            'surat_nikah_ortu_lk' => $suratnikahortulk,
            'surat_nikah_ortu_pr' => $suratnikahortupr
          ]);


         return redirect()->route('pernikahan.index')->with('success-update','Data Berhasil Ditambahkan'); 
    }

    public function destroy (Request $request)
    {
      $pernikahan = AktaPernikahan::where('id',$request->id)->first();  

      Storage::disk('public')->delete($pernikahan->surat_desa_laki);
      Storage::disk('public')->delete($pernikahan->ktp_laki);
      Storage::disk('public')->delete($pernikahan->akta_kelahiran_laki);
      Storage::disk('public')->delete($pernikahan->kk_laki);
      Storage::disk('public')->delete($pernikahan->ktp_ortu_laki);
      Storage::disk('public')->delete($pernikahan->foto_laki);
      Storage::disk('public')->delete($pernikahan->surat_desa_pr);
      Storage::disk('public')->delete($pernikahan->ktp_pr);
      Storage::disk('public')->delete($pernikahan->akta_kelahiran_pr);
      Storage::disk('public')->delete($pernikahan->kk_pr);
      Storage::disk('public')->delete($pernikahan->ktp_ortu_pr);
      Storage::disk('public')->delete($pernikahan->ktp_saksi);
      Storage::disk('public')->delete($pernikahan->foto_pr);
      Storage::disk('public')->delete($pernikahan->surat_nikah_ortu_lk);
      Storage::disk('public')->delete($pernikahan->surat_nikah_ortu_pr);

      $pernikahan->delete();
      
      return response()->json('Berhasil Menghapus Data');
      
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


    public function view ($id)
    {
     
        $pernikahan = AktaPernikahan::where('id',$id)->first();
        return view('content.kependudukan.marriage-list.view-marriage-card',compact('pernikahan'));
    }

}
