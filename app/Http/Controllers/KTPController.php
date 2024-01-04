<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\KTP;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KTPController extends Controller
{
    public function index()
    {
      $ktp = KTP::get();
      return view('content.kependudukan.id-card.id-card-person',compact('ktp'));
    }
  
    public function create()
    {     
      return view('content.kependudukan.id-card.create-id-card');
    }

    public function store (Request $request)
    {      
        $file = $request->file('file');
        $filename = '';
        if ($file) {
            $filename = $file->getClientOriginalName();            
            $time = time();
            $newName = $time.$filename;            
            $path = Storage::putFileAs('ktp',$file,$newName);
            $filename = $path;
        }
        // dd($filename);
    
       KTP::create([
            'nik' => $request->nik, 
            'nama' => $request->nama,
            'kota_kelahiran' => $request->kota_kelahiran,
            'tanggal_lahir' => Carbon::parse($request->tanggal_lahir)->format('Y-m-d'),
            'jenis_kelamin' => $request->jenis_kelamin,
            'gol_darah' => $request->gol_darah,
            'alamat' => $request->alamat,
            'agama' => $request->agama ,
            'status_perkawinan' => $request->status_perkawinan,
            'pekerjaan' => $request->pekerjaan,
            'file_kk' => $filename
       ]);

       return redirect()->route('kependudukan-ktp.index')->with('success-create','Berhasil Menambahkan Data');
    }
  
    public function edit($id)
    {
      $ktp = KTP::where('id',$id)->first();
      return view('content.kependudukan.id-card.update-id-card',compact('ktp'));
    }

    public function update(Request $request , $id)
    {
       $file = $request->file('file');
       
       $ktp = KTP::where('id',$id)->first();
       $newName = $ktp->file_kk;

       if ($file) {
        
          Storage::disk('public')->delete($ktp->file_kk);
          $filename = $file->getClientOriginalName();            
          $time = time();
          $newName = $time.$filename;            
          $path = Storage::putFileAs('ktp',$file,$newName);
          $newName = $path;          
       }

       $ktp->update([
          'nik' => $request->nik, 
          'nama' => $request->nama,
          'kota_kelahiran' => $request->kota_kelahiran,
          'tanggal_lahir' => Carbon::parse($request->tanggal_lahir)->format('Y-m-d'),
          'jenis_kelamin' => $request->jenis_kelamin,
          'gol_darah' => $request->gol_darah,
          'alamat' => $request->alamat,
          'agama' => $request->agama ,
          'status_perkawinan' => $request->status_perkawinan,
          'pekerjaan' => $request->pekerjaan,
          'file_kk' => $newName
       ]);

       return redirect()->route('kependudukan-ktp.index')->with('success-update','Berhasil Mengubah Data');

    }

    public function destroy (Request $request)
    {
      $ktp = KTP::where('id',$request->id)->first();
      Storage::disk('public')->delete($ktp->file_kk);

      $ktp->delete();

      return response()->json('Berhasil Menghapus Data');
    }

    public function view ($id)
    {
      $ktp = KTP::where('id',$id)->first();
      return view('content.kependudukan.id-card.view-id-card',compact('ktp'));
    }
}
