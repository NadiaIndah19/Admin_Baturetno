@extends('layouts/contentNavbarLayout')

@section('title')

@section('content')
<h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light">Pelayanan /</span> IMB </h4>

<div class="row">
  <div class="col-md-12">
    <div class="card">
      <h5 class="card-header">View Detail Data</h5>
      <div class="card-body">
        <form action="{{ route('imb.view', ['id' => $imb->id]) }}" method="POST" onsubmit="return false">
          <div class="row">
            <div class="mb-3 col-md-6">
              <label for="nik" class="form-label">NIK</label>
              <input class="form-control" type="text" id="nik" name="nik" value="{{ $imb->nik }}" disabled/>
            </div>
            <div class="mb-3 col-md-6">
              <label for="nama" class="form-label">Nama Lengkap</label>
              <input class="form-control" type="text" id="nama" name="nama" value="{{ $imb->nama }}" disabled/>
            </div>
            <div class="mb-3 col-md-6">
              <label for="address" class="form-label">Alamat</label>
              <input type="text" class="form-control" id="address" name="address" value="{{ $imb->alamat }}" disabled/>
            </div>
            <div class="mb-3 col-md-6">
              <label for="nohp" class="form-label">No Hp</label>
              <input type="text" class="form-control" id="nohp" name="nohp" value="{{ $imb->no_hp }}" disabled/>
            </div>
            <div class="mb-3 col-md-4">
              <label for="locs" class="form-label">Lokasi Bangunan</label>
              <input type="text" class="form-control" id="locs" name="locs" value="{{ $imb->lokasi_bangunan }}" disabled/>
            </div>
            <div class="mb-3 col-md-4">
              <label for="tipelocs" class="form-label">Tipe Bangunan</label>
              <input type="text" class="form-control" id="tipelocs" name="tipelocs" value="{{ $imb->tipe_bangunan }}" disabled/>
            </div>
            <div class="mb-3 col-md-4">
              <label for="luaslocs" class="form-label">Luas Bangunan</label>
              <input type="text" class="form-control" id="luaslocs" name="luaslocs" value="{{ $imb->luas_bangunan }}" disabled/>
            </div>
            <div class="mb-3 col-md-6">
              <label for="status" class="form-label">Status</label>
              <input type="text" class="form-control" id="status" name="status" value="{{ $imb->status }}" disabled/>
            </div>
            <div class="mb-3 col-md-6">
              <label for="basic-icon-default-tglstatus" class="form-label">Tgl Status</label>
              <div class="input-group input-group-merge">
                <input class="form-control" type="date" value="{{ $imb->tgl_status }}" id="tgl_status" disabled/>
              </div>
            </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
