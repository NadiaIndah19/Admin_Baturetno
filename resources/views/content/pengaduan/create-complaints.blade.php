@extends('layouts/contentNavbarLayout')

@section('title')

@section('content')
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Pengaduan / </span>Create Complaint</h4>

<!-- Basic Layout -->
<div class="row">
  <div class="col-xl">
    <div class="card mb-4">
      <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Tambah Pengaduan</h5>
        <small class="text-muted float-end">Masukkan data dengan benar</small>
      </div>
      <div class="card-body">
        <form action="{{ route('pengaduan.store') }}" method="POST" enctype="multipart/form-data"> 
          @csrf
          <div class="row">
            <div class="col-md-6 mb-3">
              <label class="form-label" for="basic-icon-default-name">Nama Lengkap <span class="ml-1 text-danger">*</span></label>
              <div class="input-group input-group-merge">
                <span id="basic-icon-default-name2" class="input-group-text"></span>
                <input type="text" id="basic-icon-default-name" name="nama" class="form-control" aria-describedby="basic-icon-default-name2" required/>
              </div>
            </div>
            <div class="col-md-6 mb-3">
              <label class="form-label" for="basic-icon-default-nik">NIK <span class="ml-1 text-danger">*</span></label>
              <div class="input-group input-group-merge">
                <span id="basic-icon-default-nik2" class="input-group-text"></span>
                <input type="number" class="form-control" name="nik" id="basic-icon-default-nik" aria-describedby="basic-icon-default-nik2" required/>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 mb-3">
              <label class="form-label" for="basic-icon-default-tittle">Judul Pengaduan <span class="ml-1 text-danger">*</span></label>
              <div class="input-group input-group-merge">
                <span id="basic-icon-default-tittle2" class="input-group-text"></span>
                <input type="text" id="basic-icon-default-tittle" name="judul_pengaduan" class="form-control tittle-mask" aria-describedby="basic-icon-default-tittle2" required/>
              </div>
            </div>
            <div class="col-md-6 mb-3">
              <label class="form-label" for="basic-icon-default-goldar">Jenis Pengaduan <span class="ml-1 text-danger">*</span></label>
              <select id="category" class="select2 form-select" name="jenis_pengaduan" required>
                <option value="">Pilih category</option>
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
              <label class="form-label" for="basic-icon-default-lokasi">Lokasi Pengaduan <span class="ml-1 text-danger">*</span></label>
              <div class="input-group input-group-merge">
                <span class="input-group-text"></span>
                <input type="text" id="basic-icon-default-lokasi" name="lokasi_pengaduan" class="form-control" aria-describedby="basic-icon-default-lokasi2" required/>
              </div>
            </div>
            <div class="col-md-6 mb-3">
              <label for="formFile" class="form-label">File Lampiran (optional) <span class="ml-1 text-danger">*</span></label>
              <input class="form-control" type="file" id="formFile" name="file_pengaduan" required>
            </div>
            <div class="mb-3">
              <label class="form-label" for="basic-default-desc">Deskripsi Pengaduan <span class="ml-1 text-danger">*</span></label>
              <textarea id="basic-default-desc" class="form-control" name="deskripsi" required></textarea>
            </div>
            <small class="mb-3 col-md-6">note : untuk (*) wajib diisi</small>
          </div>
          <button type="submit" class="btn btn-primary">Send</button>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection
