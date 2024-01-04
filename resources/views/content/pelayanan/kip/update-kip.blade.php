@extends('layouts/contentNavbarLayout')

@section('title')

@section('content')
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Pelayanan / </span> Kartu Indonesia Pintar
    </h4>

    <div class="row">
            <div class="card mb-4">
                <h5 class="card-header">Update KIP</h5>
                <hr class="my-0">
                <div class="card-body">
                    <form action="{{ route('kip.update', ['id'=>$kip->id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="name" class="form-label">Nama Lengkap</label>
                                <input class="form-control" type="text" id="name" name="nama"
                                    value="{{ $kip->nama }}" />
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="NISN" class="form-label">NISN</label>
                                <input class="form-control" type="number" id="NISN" name="nisn"
                                    value="{{ $kip->nisn }}" />
                            </div>
                            <div class="mb-3 col-md-6">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="ttl" class="form-label">Tempat Lahir</label>
                                        <input type="text" class="form-control" id="ttl" name="tempat_lahir"
                                            value="{{ $kip->tempat_lahir }}" />
                                    </div>
                                    <div class="col-md-6">
                                        <label for="ttl" class="form-label">Tanggal Lahir</label>
                                        <input type="date" class="form-control" id="ttl" name="tanggal_lahir"
                                            value="{{ $kip->tanggal_lahir }}" />
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="address" class="form-label">Alamat</label>
                                <input type="text" class="form-control" id="address" name="alamat"
                                    value="{{ $kip->alamat }}" />
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="school" class="form-label">Asal Sekolah</label>
                                <input type="text" class="form-control" id="school" name="asal_sekolah"
                                    value="{{ $kip->asal_sekolah }}" />
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="pengantar" class="form-label">File Surat Pengantar RT/RW</label> <br>
                                <a class="btn btn-outline-primary btn-sm mb-2" data-bs-toggle="modal"
                                    data-bs-target="#rt{{ $kip->id }}"> <i
                                        class='bx bx-image-alt text-primary'></i>Cek File</a> <br>
                                <input class="form-control" type="file" name="file_pengantar_rt" id="pengantar">
                            </div>
                            <div class="col-md-6 mb-3">

                                <label for="fileKTP" class="form-label">File KTP</label><br>
                                <a class="btn btn-outline-primary btn-sm mb-2" data-bs-toggle="modal"
                                    data-bs-target="#ktp{{ $kip->id }}"> <i
                                        class='bx bx-image-alt text-primary'></i>Cek File</a> <br>
                                <input class="form-control" type="file" name="file_ktp" id="fileKTP">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="fileKTP" class="form-label">File KKS</label> <br>
                                <a class="btn btn-outline-primary btn-sm mb-2"  data-bs-toggle="modal"
                                    data-bs-target="#kks{{ $kip->id }}"> <i
                                        class='bx bx-image-alt text-primary'></i>Cek File</a> <br>
                                <input class="form-control" type="file" name="file_kks" id="fileKTP">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="fileKTP" class="form-label">File Rapor</label><br>
                                <a class="btn btn-outline-primary btn-sm mb-2" data-bs-toggle="modal"
                                    data-bs-target="#rapor{{ $kip->id }}"> <i
                                        class='bx bx-image-alt text-primary'></i>Cek File</a> <br>
                                <input class="form-control" type="file" name="file_rapor" id="fileKTP">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="fileKTP" class="form-label">File Penerima BSM</label><br>
                                <a class="btn btn-outline-primary btn-sm mb-2" data-bs-toggle="modal"
                                    data-bs-target="#bsm{{ $kip->id }}">  <i
                                        class='bx bx-image-alt text-primary'></i>Cek File</a> <br>
                                <input class="form-control" type="file" name="file_penerima_bsm" id="fileKTP">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="fileKK" class="form-label">File KK</label><br>
                                <a class="btn btn-outline-primary btn-sm mb-2" data-bs-toggle="modal"
                                    data-bs-target="#kk{{ $kip->id }}"> <i
                                        class='bx bx-image-alt text-primary'></i>Cek File</a> <br>
                                <input class="form-control" type="file" name="file_kk" id="fileKK">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="fileAKTA" class="form-label">File AKTA</label><br>
                                <a class="btn btn-outline-primary btn-sm mb-2" data-bs-toggle="modal"
                                    data-bs-target="#akta{{ $kip->id }}"> <i
                                        class='bx bx-image-alt text-primary'></i>Cek File</a> <br>
                                <input class="form-control" type="file" name="file_akta" id="fileAKTA">
                            </div>
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


    {{-- ================== MODAL KK ======================================= --}}
    <div class="modal fade" id="kk{{ $kip->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">File KK</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <iframe src="{{ asset('storage/' . $kip->file_kk) }}" width="100%" height="400px"></iframe>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    {{-- ================== MODAL Akta ======================================= --}}
    <div class="modal fade" id="akta{{ $kip->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">File Akta</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <iframe src="{{ asset('storage/' . $kip->file_akta) }}" width="100%" height="400px"></iframe>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    {{-- ================== MODAL KK ======================================= --}}
    <div class="modal fade" id="ktp{{ $kip->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">File KTP</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <iframe src="{{ asset('storage/' . $kip->file_ktp) }}" width="100%" height="400px"></iframe>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    {{-- ================== MODAL KK ======================================= --}}
    <div class="modal fade" id="rt{{ $kip->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">File Pengatar RT</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <iframe src="{{ asset('storage/' . $kip->file_pengantar_rt) }}" width="100%"
                        height="400px"></iframe>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    {{-- ================== MODAL KKs ======================================= --}}
    <div class="modal fade" id="kks{{ $kip->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">File Pengatar RT</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <iframe src="{{ asset('storage/' . $kip->file_kks) }}" width="100%" height="400px"></iframe>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="rapor{{ $kip->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">File Pengatar RT</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <iframe src="{{ asset('storage/' . $kip->file_rapor) }}" width="100%" height="400px"></iframe>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="bsm{{ $kip->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
      aria-hidden="true">
      <div class="modal-dialog modal-lg">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">File Pengatar RT</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                  <iframe src="{{ asset('storage/' . $kip->file_penerima_bsm) }}" width="100%"
                      height="400px"></iframe>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
              </div>
          </div>
      </div>
  </div>
@endsection
