<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Pengaduan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PengaduanController extends Controller
{
    public function index()
    {
        $pengaduan = Pengaduan::get();
        return view('content.pengaduan.complaints',compact('pengaduan'));
    }

    public function create()
    {
        return view('content.pengaduan.create-complaints');
    }

    public function store(Request $request)
    {
        $file = $request->file('file_pengaduan');
        $filename = '';
        if ($file) {
            $filename = $file->getClientOriginalName();
            $time = time();
            $newName = $time . $filename;
            $path = Storage::putFileAs('file_lampiran_pengaduan', $file, $newName);
            $filename = $path;
        }


        Pengaduan::create([
            'nama' => $request->nama,
            'nik' => $request->nik,
            'judul_pengaduan' => $request->judul_pengaduan,
            'jenis_pengaduan' => $request->jenis_pengaduan,
            'lokasi_pengaduan' => $request->lokasi_pengaduan,
            'lampiran' => $filename,
            'deskripsi' => $request->deskripsi
        ]);

        return redirect()->route('pengaduan.index')->with('success-create','Data Berhasil Ditambahkan');
    }

    public function edit($id)
    {
        $pengaduan = Pengaduan::where('id',$id)->first();
        return view('content.pengaduan.update-complaints',compact('pengaduan'));
    }

    public function update(Request $request,$id)
    {
        $pengaduan = Pengaduan::where('id',$id)->first();
        $file = $request->file('file_pengaduan');
        $filename = $pengaduan->lampiran;
        if ($file) {
            Storage::disk('public')->delete($pengaduan->lampiran);
            $filename = $file->getClientOriginalName();
            $time = time();
            $newName = $time . $filename;
            $path = Storage::putFileAs('file_lampiran_pengaduan', $file, $newName);
            $filename = $path;
        }

        $pengaduan->update([
            'nama' => $request->nama,
            'nik' => $request->nik,
            'judul_pengaduan' => $request->judul_pengaduan,
            'jenis_pengaduan' => $request->jenis_pengaduan,
            'lokasi_pengaduan' => $request->lokasi_pengaduan,
            'lampiran' => $filename,
            'deskripsi' => $request->deskripsi
        ]);

        return redirect()->route('pengaduan.index')->with('success-update','Data Berhasil Diubah');
    }

    public function destroy (Request $request)
    {
        $pengaduan = Pengaduan::where('id',$request->id)->first();

        Storage::disk('public')->delete($pengaduan->lampiran);
        
        $pengaduan->delete();

        return response()->json('Data Berhasil Dihapus');
    }

    public function view($id)
    {
        $pengaduan = Pengaduan::where('id',$id)->first();
        return view('content.pengaduan.view-complaints',compact('pengaduan'));
    }
}
