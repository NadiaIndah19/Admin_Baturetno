@extends('layouts/contentNavbarLayout')

@section('title')

@section('content')
<h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light">Pelayanan / </span> Kartu Indonesia Pintar
</h4>

<div class="row">
  <div class="col-md-12">
    {{-- <ul class="nav nav-pills flex-column flex-md-row mb-3">
      <li class="nav-item"><a class="nav-link active" href="javascript:void(0);"><i class="bx bx-user me-1"></i>Tambah Data</a></li>
      <li class="nav-item"><a class="nav-link" href="{{url('pelayanan/kip/view-kip')}}"><i class="bx bx-bell me-1"></i>View Data</a></li>
      <li class="nav-item"><a class="nav-link" href="{{url('pelayanan/kip/update-kip')}}"><i class="bx bx-link-alt me-1"></i>Update Data</a></li>
    </ul> --}}
    <div class="card mb-4">
      <h5 class="card-header">Create KIP</h5>
      <hr class="my-0">
      <div class="card-body">
        <form action="{{ route('kip.store') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="row">
            <div class="mb-3 col-md-6">
              <label for="name" class="form-label">Nama Lengkap <span class="ml-1 text-danger">*</span></label>
              <input class="form-control" type="text" id="name" name="nama" required/>
            </div>
            <div class="mb-3 col-md-6">
              <label for="NISN" class="form-label">NISN <span class="ml-1 text-danger">*</span> </label>
              <input class="form-control" type="number" id="NISN" name="nisn" required/>
            </div>
            <div class="mb-3 col-md-6">
              <div class="row">
                <div class="col-md-6">
                  <label for="ttl" class="form-label">Tempat Lahir <span class="ml-1 text-danger">*</span> </label>
                  <input type="text" class="form-control" id="ttl" name="tempat_lahir" required/>
                </div>
                <div class="col-md-6">
                  <label for="ttl" class="form-label">Tanggal Lahir <span class="ml-1 text-danger">*</span> </label>
                  <input type="date" class="form-control" id="ttl" name="tanggal_lahir" required/>
                </div>
              </div>
            </div>
            <div class="mb-3 col-md-6">
              <label for="address" class="form-label">Alamat <span class="ml-1 text-danger">*</span> </label>
              <input type="text" class="form-control" id="address" name="alamat" required/>
            </div>
            <div class="mb-3 col-md-6">
              <label for="school" class="form-label">Asal Sekolah <span class="ml-1 text-danger">*</span></label>
              <input type="text" class="form-control" id="school" name="asal_sekolah" required/>
            </div>
            <div class="col-md-6 mb-3">
              <label for="pengantar" class="form-label">File Surat Pengantar RT/RW <span class="ml-1 text-danger">*</span></label>
              <input class="form-control" type="file" name="file_pengantar_rt" id="pengantar" required>
            </div>
            <div class="col-md-6 mb-3">
              <label for="fileKTP" class="form-label">File KKS <span class="ml-1 text-danger">*</span></label>
              <input class="form-control" type="file" name="file_kks" id="fileKTP" required>
            </div>
            <div class="col-md-6 mb-3">
              <label for="fileKTP" class="form-label">File Rapor <span class="ml-1 text-danger">*</span></label>
              <input class="form-control" type="file" name="file_rapor" id="fileKTP" required>
            </div>
            <div class="col-md-6 mb-3">
              <label for="fileKTP" class="form-label">File Penerima BSM <span class="ml-1 text-danger">*</span></label>
              <input class="form-control" type="file" name="file_penerima_bsm" id="fileKTP" required>
            </div>
            <div class="col-md-6 mb-3">
              <label for="fileKTP" class="form-label">File KTP <span class="ml-1 text-danger">*</span></label>
              <input class="form-control" type="file" name="file_ktp" id="fileKTP" required>
            </div>
            <div class="col-md-6 mb-3">
              <label for="fileKK" class="form-label">File KK <span class="ml-1 text-danger">*</span></label>
              <input class="form-control" type="file" name="file_kk" id="fileKK" required>
            </div>
            <div class="col-md-6 mb-3">
              <label for="fileAKTA" class="form-label">File AKTA <span class="ml-1 text-danger">*</span></label>
              <input class="form-control" type="file" name="file_akta" id="fileAKTA" required>
            </div>
            <small class="mb-3 col-md-6">note : untuk (*) wajib diisi</small>
            <div class="mt-2">
              <button type="submit" class="btn btn-primary me-2">Save changes</button>
              <button type="reset" class="btn btn-outline-secondary">Cancel</button>
            </div>
          </div>
        </form>
      </div>
      <!-- /Account -->
    </div> 
  </div>
</div>
@endsection
