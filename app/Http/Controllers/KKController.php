<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\KK;
use App\Models\KKAnak;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KKController extends Controller
{
  public function index()
  {
    $kk = KK::get();
    return view('content.kependudukan.fams-list.family-card', compact('kk'));
  }

  public function create()
  {
    return view('content.kependudukan.fams-list.create-kk');
  }

  public function store(Request $request)
  {

    $pengantar_rt = $request->file('file_pengantar_rt');
    $file_pengantar_rt = '';
    if ($pengantar_rt) {
      $file_pengantar_rt = $pengantar_rt->getClientOriginalName();
      $time = time();
      $newName = $time . $file_pengantar_rt;
      $path = Storage::putFileAs('pengantar_rt_kk', $pengantar_rt, $newName);
      $file_pengantar_rt = $path;
    }

    $kk_lama = $request->file('file_kk_lama');
    $file_kk_lama = '';
    if ($kk_lama) {
      $file_kk_lama = $kk_lama->getClientOriginalName();
      $time = time();
      $newName = $time . $file_kk_lama;
      $path = Storage::putFileAs('kk_lama', $kk_lama, $newName);
      $file_kk_lama = $path;
    }

    $buku_nikah = $request->file('file_buku_nikah');
    $file_buku_nikah = '';
    if ($buku_nikah) {
      $file_buku_nikah = $buku_nikah->getClientOriginalName();
      $time = time();
      $newName = $time . $file_buku_nikah;
      $path = Storage::putFileAs('buku_nikah_kk', $buku_nikah, $newName);
      $file_buku_nikah = $path;
    }
    $ktp = $request->file('file_ktp');
    $file_ktp = '';
    if ($ktp) {
      $file_ktp = $ktp->getClientOriginalName();
      $time = time();
      $newName = $time . $file_ktp;
      $path = Storage::putFileAs('ktp_kk', $ktp, $newName);
      $file_ktp = $path;
    }
    // dd($filename);

    KK::create([
      'nik' => $request->nik,
      'nama' => $request->nama,
      'tempat_lahir' => $request->tempat_lahir,
      'tanggal_lahir' => $request->tanggal_lahir,
      'agama' => $request->agama,
      'jenis_kelamin' => $request->jenis_kelamin,
      'gol_darah' => $request->gol_darah,
      'pendidikan' => $request->pendidikan,
      'pekerjaan' => $request->pekerjaan,
      'status_hub_keluarga' => $request->status_hub_keluarga,
      'status_perkawinan' => $request->status_perkawinan,
      'tgl_perkawinan' => Carbon::parse($request->tgl_perkawinan)->format('Y-m-d'),
      'kewarganegaraan' => $request->kewarganegaraan,
      'nama_ayah' => $request->nama_ayah,
      'nama_ibu' => $request->nama_ibu,
      'file_pengantar_rt' => $file_pengantar_rt,
      'file_kk_lama' => $file_kk_lama,
      'file_buku_nikah' => $file_buku_nikah,
      'file_ktp' => $file_ktp
    ]);

    return redirect()->route('kependudukan-kk.index')->with('success-create', 'Berhasil Menambahkan Data');
  }

  public function edit($id)
  {
    $kk = KK::where('id', $id)->first();
    
    return view('content.kependudukan.fams-list.update-kk', compact('kk'));
  }

  public function update(Request $request, $id)
  {  
    $kk = KK::where('id', $id)->first();

    $kk->update([
      'nik' => $request->nik,
      'nama' => $request->nama,
      'tempat_lahir' => $request->tempat_lahir,
      'tanggal_lahir' => $request->tanggal_lahir,
      'agama' => $request->agama,
      'jenis_kelamin' => $request->jenis_kelamin,
      'gol_darah' => $request->gol_darah,
      'pendidikan' => $request->pendidikan,
      'pekerjaan' => $request->pekerjaan,
      'status_hub_keluarga' => $request->status_hub_keluarga,
      'status_perkawinan' => $request->status_perkawinan,
      'tgl_perkawinan' => Carbon::parse($request->tgl_perkawinan)->format('Y-m-d'),
      'kewarganegaraan' => $request->kewarganegaraan,
      'nama_ayah' => $request->nama_ayah,
      'nama_ibu' => $request->nama_ibu,   
    ]);

    return redirect()->route('kependudukan-kk.index')->with('success-update', 'Berhasil Mengubah Data');
  }

  public function destroy(Request $request)
  {
    $kk = KK::where('id', $request->id)->first();
    Storage::disk('public')->delete($kk->file_pengantar_rt);
    Storage::disk('public')->delete($kk->file_kk_lama);
    Storage::disk('public')->delete($kk->file_buku_nikah);
    Storage::disk('public')->delete($kk->file_ktp);

    $kk->delete();

    return response()->json('Berhasil Menghapus Data');
  }

  public function view($id)
  {
    $kk = KK::where('id', $id)->with('anak')->first();    
    return view('content.kependudukan.fams-list.view-kk', compact('kk'));
  }


  public function child($id)
  {
    $child = KKAnak::where('kk_id', $id)->get();
    return view('content.kependudukan.fams-list.child.index', compact('id', 'child'));
  }

  public function createChild($id)
  {
    return view('content.kependudukan.fams-list.child.create', compact('id'));
  }

  public function storeChild(Request $request, $id)
  {
    KKAnak::create([
      'kk_id' => $id,
      'nik' => $request->nik,
      'nama' => $request->nama,
      'tempat_lahir' => $request->tempat_lahir,
      'tanggal_lahir' => $request->tanggal_lahir,
      'agama' => $request->agama,
      'jenis_kelamin' => $request->jenis_kelamin,
      'gol_darah' => $request->gol_darah,
      'pendidikan' => $request->pendidikan,
      'pekerjaan' => $request->pekerjaan,
      'status_hub_keluarga' => $request->status_hub_keluarga,
      'status_perkawinan' => $request->status_perkawinan,
      'tgl_perkawinan' => Carbon::parse($request->tgl_perkawinan)->format('Y-m-d'),
      'kewarganegaraan' => $request->kewarganegaraan,     
    ]);

    return redirect()->back()->with('success-create', 'Berhasil Menambahkan Data');
  }

  public function editChild($id)
  {
    $kk = KKAnak::where('id', $id)->first();
    return view('content.kependudukan.fams-list.child.update', compact('kk', 'id'));
  }

  public function updateChild(Request $request, $id)
  {
    $kk = KKAnak::where('id', $id)->first();   

    $kk->update([
      'nik' => $request->nik,
      'nama' => $request->nama,
      'tempat_lahir' => $request->tempat_lahir,
      'tanggal_lahir' => $request->tanggal_lahir,
      'agama' => $request->agama,
      'jenis_kelamin' => $request->jenis_kelamin,
      'gol_darah' => $request->gol_darah,
      'pendidikan' => $request->pendidikan,
      'pekerjaan' => $request->pekerjaan,
      'status_hub_keluarga' => $request->status_hub_keluarga,
      'status_perkawinan' => $request->status_perkawinan,
      'tgl_perkawinan' => Carbon::parse($request->tgl_perkawinan)->format('Y-m-d'),
      'kewarganegaraan' => $request->kewarganegaraan,     
    ]);

    return redirect()->route('kependudukan-kk.index')->with('success-update', 'Berhasil Mengubah Data');
    // return redirect()->back()->with('success-create', 'Berhasil Mangubah Data');
  }

  public function destroyChild(Request $request)
  {
    $kk = KKAnak::where('id', $request->id)->first();
    $kk->delete();

    return response()->json('Berhasil Menghapus Data');
  }
}
