@extends('layouts/contentNavbarLayout')

@section('title')

@section('content')
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Pelayanan /</span> SIUP </h4>

<!-- Basic Layout -->
<div class="row">
  <div class="col-xl">
    <div class="card mb-4">
      <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Pendaftaran Surat Izin Usaha Perdagangan</h5>
        <small class="text-muted float-end">Masukkan data dengan benar</small>
      </div>
      <hr class="my-0">
      <div class="card-body">
        <form action="{{ route('siup.store') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="row">
            <div class="mb-3 col-md-6">
              <label for="nama" class="form-label">Nama Lengkap <span class="ml-1 text-danger">*</span></label>
              <input class="form-control" type="text" id="nama" name="nama" required/>
            </div>
            <div class="mb-3 col-md-6">
              <label for="nik" class="form-label">NIK <span class="ml-1 text-danger">*</span></label>
              <input class="form-control" type="number" id="nik" name="nik" required/>
            </div>
            <div class="mb-3 col-md-6">
              <label for="alamat" class="form-label">Alamat <span class="ml-1 text-danger">*</span></label>
              <input type="text" class="form-control" id="alamat" name="alamat" required/>
            </div>
            <div class="mb-3 col-md-6">
              <label for="no_hp" class="form-label">No Hp <span class="ml-1 text-danger">*</span></label>
              <input type="number" class="form-control" id="no_hp" name="no_hp" required/>
            </div>
            <div class="mb-3 col-md-6">
              <label for="jenis_usaha" class="form-label">Jenis Usaha <span class="ml-1 text-danger">*</span></label>
              <input type="text" class="form-control" id="jenis_usaha" name="jenis_usaha" required/>
            </div>
            <div class="mb-3 col-md-6">
              <label for="alamat_usaha" class="form-label">Alamat Usaha <span class="ml-1 text-danger">*</span></label>
              <input type="text" class="form-control" id="alamat_usaha" name="alamat_usaha" required/>
            </div>
            <div class="mb-3 col-md-6">
              <label for="status" class="form-label">Status <span class="ml-1 text-danger">*</span></label>
              <select name="status" class="form-control" id="status" required>
                <option value="pengajuan">Pengajuan</option>
                <option value="Penerimaan">Penerimaan</option>
                <option value="Penolakan">Penolakan</option>              
            </select>
            </div>
            <div class="mb-3 col-md-6">
              <label for="tgl_status" class="form-label">Tgl Status <span class="ml-1 text-danger">*</span></label>
              <div class="input-group input-group-merge">
                <input class="form-control" type="date" name="tgl_status" id="tgl_status" />
              </div>
            </div>
            <small class="mb-3 col-md-6">note : untuk (*) wajib diisi</small>
            <div class="mt-2">
              <button type="submit" class="btn btn-primary me-2">Save changes</button>
            </div>  
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection
