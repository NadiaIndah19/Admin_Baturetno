@extends('layouts/contentNavbarLayout')

@section('title')

@section('content')
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Pengaduan / </span>Update Complaint</h4>

<!-- Basic Layout -->
<div class="row">
  <div class="col-xl">
    <div class="card mb-4">
      <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Update Pengaduan</h5>
        <small class="text-muted float-end">Masukkan data dengan benar</small>
      </div>
      <div class="card-body">
        <form action="{{ route('pengaduan.update', ['id'=>$pengaduan->id]) }}" method="POST" enctype="multipart/form-data"> 
          @csrf
          <div class="row">
            <div class="col-md-6 mb-3">
              <label class="form-label" for="basic-icon-default-name">Nama Lengkap</label>
              <div class="input-group input-group-merge">
                <span id="basic-icon-default-name2" class="input-group-text"></span>
                <input type="text" id="basic-icon-default-name" name="nama" class="form-control" value="{{$pengaduan->nama}}" aria-describedby="basic-icon-default-name2" disabled/>
              </div>
            </div>
            <div class="col-md-6 mb-3">
              <label class="form-label" for="basic-icon-default-nik">NIK</label>
              <div class="input-group input-group-merge">
                <span id="basic-icon-default-nik2" class="input-group-text"></span>
                <input type="text" class="form-control" name="nik" id="basic-icon-default-nik"  value="{{$pengaduan->nik}}" aria-describedby="basic-icon-default-nik2" disabled/>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 mb-3">
              <label class="form-label" for="basic-icon-default-tittle">Judul Pengaduan</label>
              <div class="input-group input-group-merge">
                <span id="basic-icon-default-tittle2" class="input-group-text"></span>
                <input type="text" id="basic-icon-default-tittle" name="judul_pengaduan"  value="{{$pengaduan->judul_pengaduan}}" class="form-control tittle-mask" aria-describedby="basic-icon-default-tittle2" disabled/>
              </div>
            </div>
            <div class="col-md-6 mb-3">
              <label class="form-label" for="basic-icon-default-goldar">Jenis Pengaduan</label>
              <select id="category" class="select2 form-select" name="jenis_pengaduan" disabled>
                <option value="">Pilih category</option>
                <option value="{{$pengaduan->jenis_pengaduan}}" selected>{{$pengaduan->jenis_pengaduan}}</option>
                <option value="publik">Publik</option>
                <option value="kesehatan">Kesehatan</option>
                <option value="lingkungan">Lingkungan</option>
                <option value="keamanan">Keamanan</option>
                <option value="sosial">Sosial</option>
                <option value="pendidikan">Pendidikan</option>
                <option value="lainya">Lainnya</option>
              </select>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 mb-3">
              <label class="form-label" for="basic-icon-default-lokasi">Lokasi Pengaduan</label>
              <div class="input-group input-group-merge">
                <span class="input-group-text"></span>
                <input type="text" id="basic-icon-default-lokasi" name="lokasi_pengaduan"  value="{{$pengaduan->lokasi_pengaduan}}" class="form-control" aria-describedby="basic-icon-default-lokasi2" disabled/>
              </div>
            </div>
            <div class="col-md-6 mb-3">
             
              <label for="formFile" class="form-label">File Lampiran (optional)</label> <br>
              <button type="button" class="btn btn-outline-primary btn-sm mb-2" data-bs-toggle="modal" data-bs-target="#pengaduan">
                <i class='bx bx-image-alt text-primary'></i> Cek File
              </button>
          
            </div>
            <div class="mb-3">
              <label class="form-label" for="basic-default-desc">Deskripsi Pengaduan</label>
              <textarea id="basic-default-desc" class="form-control" name="deskripsi" placeholder="Ada yang bisa kami bantu ?" disabled>{{$pengaduan->deskripsi}}</textarea>
            </div>
          </div>
          
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="pengaduan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Lampiran</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">        
          <iframe src="{{ asset('storage/' . $pengaduan->lampiran) }}" width="100%" height="400px"></iframe>        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>        
      </div>
    </div>
  </div>
</div>

@endsection
