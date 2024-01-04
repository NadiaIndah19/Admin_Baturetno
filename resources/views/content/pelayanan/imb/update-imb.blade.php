@extends('layouts/contentNavbarLayout')

@section('title')

@section('content')
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Pelayanan /</span> IMB </h4>

<!-- Basic Layout -->
<div class="row">
  <div class="col-xl">
    <div class="card mb-4">
      <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Update Izin Mendirikan Bangunan</h5>
      </div>
      <hr class="my-0">
      <div class="card-body">
        <form action="{{ route('imb.update', ['id'=>$imb->id]) }}" method="POST">
          @csrf
          @method('PUT')
          <div class="row">
            <div class="mb-3 col-md-6">
              <label for="nama" class="form-label">Nama Lengkap</label>
              <input class="form-control" type="text" id="nama" name="nama" value="{{ $imb->nama }}" required/>
            </div>
            <div class="mb-3 col-md-6">
              <label for="nik" class="form-label">NIK</label>
              <input class="form-control" type="number" id="nik" name="nik" max="9999999999999999" value="{{ $imb->nik }}" required/>
            </div>
            <div class="mb-3 col-md-6">
              <label for="alamat" class="form-label">Alamat</label>
              <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $imb->alamat }}" required/>
            </div>
            <div class="mb-3 col-md-6">
              <label for="no_hp" class="form-label">No Hp</label>
              <input type="number" class="form-control" id="no_hp" name="no_hp" value="{{ $imb->no_hp }}" required/>
            </div>
            <div class="mb-3 col-md-4">
              <label for="lokasi_bangunan" class="form-label">Lokasi Bangunan</label>
              <input type="text" class="form-control" id="lokasi_bangunan" name="lokasi_bangunan" value="{{ $imb->lokasi_bangunan }}" required/>
            </div>
            <div class="mb-3 col-md-4">
              <label for="tipe_bangunan" class="form-label">Tipe Bangunan</label>
              <input type="text" class="form-control" id="tipe_bangunan" name="tipe_bangunan" value="{{ $imb->tipe_bangunan}}" required/>
            </div>
            <div class="mb-3 col-md-4">
              <label for="luas_bangunan" class="form-label">Luas Bangunan</label>
              <input type="text" class="form-control" id="luas_bangunan" name="luas_bangunan" value="{{ $imb->luas_bangunan }}" required/>
            </div>
            <div class="mb-3 col-md-6">
              <label for="status" class="form-label">Status <span class="ml-1 text-danger">*</span></label>
              <select name="status" class="form-control" id="status" >
                <option value="{{ $imb->status }}" selected>
                  {{ ucfirst($imb->status) }}</option>
                <option value="pengajuan">Pengajuan</option>
                <option value="Penerimaan">Penerimaan</option>
                <option value="Penolakan">Penolakan</option>              
              </select>
            </div>
            <div class="mb-3 col-md-6">
              <label for="tgl_status" class="form-label">Tgl Status</label>
              <div class="input-group input-group-merge">
                <input class="form-control" type="date" name="tgl_status" id="tgl_status" value="{{ $imb->tgl_status }}" required/>
              </div>
            </div>
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
