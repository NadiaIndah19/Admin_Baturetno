<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Informasi;
use App\Models\KTP;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class InformasiController extends Controller
{
    public function index ()
    {
        $teknologi = Informasi::where('jenis_berita','teknologi')->get();
        $kesehatan = Informasi::where('jenis_berita','kesehatan')->get();
        $pendidikan = Informasi::where('jenis_berita','pendidikan')->get();
        $sosial = Informasi::where('jenis_berita','sosial')->get();
        $lainya = Informasi::where('jenis_berita','lainya')->get();
        $newsLast = Informasi::take(2)->latest()->get();
                
        return view('content.info.news',compact('teknologi','kesehatan','pendidikan','sosial','lainya','newsLast'));
    }

    public function store (Request $request)
    {
        // $dd($request->all());   
        $file = $request->file('image');        
        $newName = '';
 
        if ($file) {                   
           $filename = $file->getClientOriginalName();            
           $time = time();
           $newName = $time.$filename;            
           $path = Storage::putFileAs('image',$file,$newName);
           $newName = $path;          
        }

        Informasi::create([
            'nama' => $request->nama,
            'judul_berita' => $request->judul_berita,
            'jenis_berita' => $request->jenis_berita,
            'tanggal_berita' => $request->tanggal_berita,
            'tempat_kejadian' => $request->tempat_kejadian,
            'kronologi' => $request->kronologi,
            'image' => $newName
        ]);

        return back()->with('success','Data Berhasil Di Simpan');
    }   

    public function  update(Request $request,$id)
    {
     
    }

    public function delete (Request $request)
    {
        $informasi = Informasi::where('id',$request->id)->first();
        Storage::disk('public')->delete($informasi->image);

        $informasi->delete();

        return response()->json('Berhasil Menghapus Data');
    }
}
