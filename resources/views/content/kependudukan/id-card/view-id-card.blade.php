@extends('layouts/contentNavbarLayout')

@section('title')

@section('content')

    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Kependudukan /</span > View KTP</h4>
    <!-- Basic Layout -->
    <div class="row">
        <div class="col-xl">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Kartu Tanda Penduduk</h5>
                    <small class="text-muted float-end">Masukkan data dengan benar</small>
                </div>
                <div class="card-body">
                    <form action="{{ route('ktp.update', ['id' => $ktp->id]) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label" for="basic-icon-default-name">Nama Lengkap</label>
                                <div class="input-group input-group-merge">
                                    <input type="text" name="nama" value="{{ $ktp->nama }}"
                                        id="basic-icon-default-name" class="form-control"
                                        aria-describedby="basic-icon-default-name2" disabled />
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label" for="basic-icon-default-nik">NIK</label>
                                <div class="input-group input-group-merge">
                                    <input type="text" name="nik" value="{{ $ktp->nik }}" class="form-control"
                                        id="basic-icon-default-nik" aria-describedby="basic-icon-default-nik2" disabled />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label" for="basic-icon-default-ttl">Tempat Lahir</label>
                                <div class="input-group input-group-merge">
                                    <input type="text" name="kota_kelahiran" value="{{ $ktp->kota_kelahiran }}"
                                        id="basic-icon-default-ttl" class="form-control ttl-mask"
                                        aria-describedby="basic-icon-default-ttl2" disabled />
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label" for="basic-icon-default-tgl">Tanggal Lahir</label>
                                <div class="input-group input-group-merge">
                                    <input class="form-control" name="tanggal_lahir" value="{{ $ktp->tanggal_lahir }}"
                                        type="date" value="2021-06-18" id="html5-tgl-input" disabled />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label" for="basic-icon-default-gender">Jenis Kelamin</label>
                                <div class="input-group input-group-merge">
                                    <select name="jenis_kelamin" class="form-control" id="" disabled>
                                        <option value="{{ $ktp->jenis_kelamin }}" selected>{{ $ktp->jenis_kelamin }}
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label" for="basic-icon-default-goldar">Golongan Darah</label>
                                <div class="input-group input-group-merge">
                                    <select name="gol_darah" class="form-control" id="" disabled>
                                        <option value="{{ $ktp->gol_darah }}" selected>{{ $ktp->gol_darah }}</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label" for="basic-icon-default-address">Alamat</label>
                                <div class="input-group input-group-merge">
                                    <input type="text" name="alamat" value="{{ $ktp->alamat }}"
                                        id="basic-icon-default-address" class="form-control"
                                        aria-describedby="basic-icon-default-address2" disabled />
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label" for="basic-icon-default-religion">Agama</label>
                                <div class="input-group input-group-merge">
                                    <select name="agama" class="form-control" id="" disabled>
                                        <option value="{{ $ktp->agama }}" selected>{{ $ktp->agama }}</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label" for="basic-icon-default-work">Pekerjaan</label>
                                <div class="input-group input-group-merge">
                                    <input name="pekerjaan" value="{{ $ktp->pekerjaan }}" type="text"
                                        id="basic-icon-default-work" class="form-control"
                                        aria-describedby="basic-icon-default-work2" disabled />
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label" for="basic-icon-default-work">Status Perkawinan</label>
                                <div class="input-group input-group-merge">
                                    <select name="status_perkawinan" class="form-control" id="" disabled>
                                        <option value="{{ $ktp->status_perkawinan }}" selected>
                                            {{ $ktp->status_perkawinan }}</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="formFile" class="form-label">File KK</label> <br>
                                <a class="btn btn-outline-primary btn-sm mb-2" data-bs-toggle="modal"
                                    data-bs-target="#ktp{{ $ktp->id }}"> <i
                                        class='bx bx-image-alt text-primary'></i>Cek File</a> <br>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="ktp{{ $ktp->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
      aria-hidden="true">
      <div class="modal-dialog modal-lg">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">File KK</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                  <iframe src="{{ asset('storage/' . $ktp->file_kk) }}" width="100%"
                      height="400px"></iframe>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
              </div>
          </div>
      </div>
    </div>
@endsection
