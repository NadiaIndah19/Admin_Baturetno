<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\IMB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class IMBController extends Controller
{
    public function index()
    {
        $imb = IMB::get();
        return view('content.pelayanan.imb.imb-card',compact('imb'));
    }

    public function create()
    {
        return view('content.pelayanan.imb.create-imb');
    }

    public function store(Request $request)
    {
        // $file = $request->file('file_imb');
        // $filename = '';
        // if ($file) {
        //     $filename = $file->getClientOriginalName();
        //     $time = time();
        //     $newName = $time . $filename;
        //     $path = Storage::putFileAs('file_lampiran_imb', $file, $newName);
        //     $filename = $path;
        // }

        imb::create([
            'nama' => $request->nama,
            'nik' => $request->nik,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
            'lokasi_bangunan' => $request->lokasi_bangunan,
            'tipe_bangunan' => $request->tipe_bangunan,
            'luas_bangunan' => $request->luas_bangunan,
            'tipe_bangunan' => $request->tipe_bangunan,
            'status' => $request->status,
            'tgl_status' => $request->tgl_status
        ]);

        return redirect()->route('imb.index')->with('success-create','Data Berhasil Ditambahkan');
    }

    public function edit($id)
    {
        $imb = imb::where('id',$id)->first();
        return view('content.pelayanan.imb.update-imb',compact('imb'));
    }

    public function update(Request $request,$id)
    {
        $imb = imb::where('id',$id)->first();
        $file = $request->file('file_imb');
        $filename = $imb->lampiran;
        if ($file) {
            Storage::disk('public')->delete($imb->lampiran);
            $filename = $file->getClientOriginalName();
            $time = time();
            $newName = $time . $filename;
            $path = Storage::putFileAs('file_lampiran_imb', $file, $newName);
            $filename = $path;
        }

        $imb->update([
            'nama' => $request->nama,
            'nik' => $request->nik,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
            'lokasi_bangunan' => $request->lokasi_bangunan,
            'tipe_bangunan' => $request->tipe_bangunan,
            'luas_bangunan' => $request->luas_bangunan,
            'tipe_bangunan' => $request->tipe_bangunan,
            'status' => $request->status,
            'tgl_status' => $request->tgl_status
        ]);

        return redirect()->route('imb.index')->with('success-update','Data Berhasil Diubah');
    }

    public function destroy (Request $request)
    {
        $imb = imb::where('id',$request->id)->first();

        // Storage::disk('public')->delete($imb->lampiran);
        
        $imb->delete();

        return response()->json('Data Berhasil Dihapus');
    }
    
    public function view ($id)
    {
      $imb = IMB::where('id',$id)->first();
      return view('content.pelayanan.imb.view-imb',compact('imb'));
    }
}
