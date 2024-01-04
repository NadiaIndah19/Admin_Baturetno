@extends('layouts/contentNavbarLayout')

@section('title')

@section('content')
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Pelayanan /</span> SIUP </h4>

<!-- Basic Layout -->
<div class="row">
  <div class="col-xl">
    <div class="card mb-4">
      <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Update Surat Izin Usaha Perdagangan</h5>
      </div>
      <hr class="my-0">
      <div class="card-body">
        <form action="{{ route('siup.update', ['id'=>$siup->id]) }}" method="POST">
          @csrf
          @method('PUT')
          <div class="row">
            <div class="mb-3 col-md-6">
              <label for="nama" class="form-label">Nama Lengkap</label>
              <input class="form-control" type="text" id="nama" name="nama" value="{{ $siup->nama }}" required />
            </div>
            <div class="mb-3 col-md-6">
              <label for="nik" class="form-label">NIK</label>
              <input class="form-control" type="number" id="nik" name="nik" max="9999999999999999" value="{{ $siup->nik }}" required/>
            </div>
            <div class="mb-3 col-md-6">
              <label for="alamat" class="form-label">Alamat</label>
              <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $siup->alamat }}" required />
            </div>
            <div class="mb-3 col-md-6">
              <label for="no_hp" class="form-label">No Hp</label>
              <input type="number" class="form-control" id="no_hp" name="no_hp" value="{{ $siup->no_hp }}" required />
            </div>
            <div class="mb-3 col-md-6">
              <label for="jenis_usaha" class="form-label">Jenis Usaha</label>
              <input type="text" class="form-control" id="jenis_usaha" name="jenis_usaha" value="{{ $siup->jenis_usaha }}" required />
            </div>
            <div class="mb-3 col-md-6">
              <label for="alamat_usaha" class="form-label">Alamat Usaha</label>
              <input type="text" class="form-control" id="alamat_usaha" name="alamat_usaha" value="{{ $siup->alamat_usaha }}" required />
            </div>
            <div class="mb-3 col-md-6">
              <label for="status" class="form-label">Status <span class="ml-1 text-danger">*</span></label>
              <select name="status" class="form-control" id="status" >
                <option value="{{ $siup->status }}" selected>
                  {{ ucfirst($siup->status) }}</option>
                <option value="pengajuan">Pengajuan</option>
                <option value="Penerimaan">Penerimaan</option>
                <option value="Penolakan">Penolakan</option>              
              </select>
            </div>
            <div class="mb-3 col-md-6">
              <label for="tgl_status" class="form-label">Tgl Status</label>
              <input class="form-control" type="date" id="tgl_status" name="tgl_status" value="{{ $siup->tgl_status }}" required />
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
