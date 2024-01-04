@extends('layouts/contentNavbarLayout')

@section('title')

@section('content')
<h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light">Pelayanan / </span> SIUP 
</h4>

<div class="row">
  <div class="col-md-12">
    <div class="card">
      <h5 class="card-header">View Detail Data</h5>
      <div class="card-body">
        <form id="formAccountSettings" method="POST" onsubmit="return false">
          <div class="row">
            <div class="mb-3 col-md-6">
              <label for="nama" class="form-label">Nama Lengkap</label>
              <input class="form-control" type="text" id="nama" name="nama" value="{{ $siup->nama }}" disabled/>
            </div>
            <div class="mb-3 col-md-6">
              <label for="nik" class="form-label">NIK</label>
              <input class="form-control" type="text" id="nik" name="nik" value="{{ $siup->nik }}" disabled/>
            </div>
            <div class="mb-3 col-md-6">
              <label for="alamat" class="form-label">Alamat</label>
              <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $siup->alamat }}" disabled/>
            </div>
            <div class="mb-3 col-md-6">
              <label for="no_hp" class="form-label">No Hp</label>
              <input type="number" class="form-control" id="no_hp" name="no_hp" value="{{ $siup->no_hp }}" disabled/>
            </div>
            <div class="mb-3 col-md-6">
              <label for="jenis_usaha" class="form-label">Jenis Usaha</label>
              <input type="text" class="form-control" id="jenis_usaha" name="jenis_usaha" value="{{ $siup->jenis_usaha }}" disabled/>
            </div>
            <div class="mb-3 col-md-6">
              <label for="alamat_usaha" class="form-label">Alamat Usaha</label>
              <input type="text" class="form-control" id="alamat_usaha" name="alamat_usaha" value="{{ $siup->alamat_usaha }}" disabled/>
            </div>
            <div class="mb-3 col-md-6">
              <label for="status" class="form-label">Status</label>
              <input type="text" class="form-control" id="status" name="status" value="{{ $siup->status }}" disabled/>
            </div>
            <div class="mb-3 col-md-6">
              <label for="tgl_status" class="form-label">Tgl Status</label>
              <input class="form-control" type="text" id="tgl_status" name="tgl_status" value="{{ $siup->tgl_status }}" disabled/>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
