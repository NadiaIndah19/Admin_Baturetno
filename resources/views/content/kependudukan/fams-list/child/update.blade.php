@extends('layouts/contentNavbarLayout')

@section('title')

@section('content')
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">User / </span>Edit Anak</h4>

    <!-- edit kk -->
    <div class="row">
        <div class="col-xl">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Edit Anak</h5> <small class="text-muted float-end"></small>
                </div>
                <div class="card-body">
                    <form action="{{ route('kk.anak.update', ['id' => $id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label" for="basic-icon-default-nik">NIK</label>
                                <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-nik2" class="input-group-text"></span>
                                    <input type="number" name="nik" value="{{ $kk->nik }}" class="form-control" max="9999999999999999"
                                    min="9999999999999999" id="basic-icon-default-nik" aria-describedby="basic-icon-default-nik2" required />
                                </div>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label" for="basic-icon-default-name">Nama Lengkap</label>
                                <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-name2" class="input-group-text"></span>
                                    <input type="text" name="nama" value="{{ $kk->nama }}"
                                        id="basic-icon-default-name" class="form-control"
                                        aria-describedby="basic-icon-default-name2" required />
                                </div>
                            </div>
                            <div class="mb-3 col-md-6">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="ttl" class="form-label">Tempat Lahir</label>
                                        <input type="text" class="form-control" id="ttl" name="tempat_lahir"
                                            value="{{ $kk->tempat_lahir }}" />
                                    </div>
                                    <div class="col-md-6">
                                        <label for="ttl" class="form-label">Tanggal Lahir</label>
                                        <input type="date" class="form-control" id="ttl" name="tanggal_lahir"
                                            value="{{ $kk->tanggal_lahir }}" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label" for="basic-icon-default-religion">Agama</label>
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text"></span>
                                    <select name="agama" class="form-control" id="" required>
                                        <option value="{{ $kk->agama }}" selected>{{ $kk->agama }}
                                        </option>
                                        <option value="Islam">Islam</option>
                                        <option value="Kristen">Kristen</option>
                                        <option value="Budha">Budha</option>
                                        <option value="Hindu">Hindu</option>
                                        <option value="Konghucu">Konghucu</option>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label" for="basic-icon-default-status">Jenis Kelamin</label>
                                <select name="jenis_kelamin" class="form-select" id="exampleFormControlSelect1"
                                    aria-label="Default select example" required>
                                    <option value="{{ $kk->jenis_kelamin }}" selected>{{ $kk->jenis_kelamin }}
                                    </option>
                                    <option value="Laki-Laki">Laki-laki</option>
                                    <option value="Prempuan">Perempuan</option>
                                </select>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="html5-input" class="col-md-5 col-form-label">Golongan Darah</label>
                                <select name="gol_darah" class="form-select" id="exampleFormControlSelect1"
                                    aria-label="Default select example" required>
                                    <option value="{{ $kk->gol_darah }}" selected>{{ $kk->gol_darah }}
                                    </option>
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="O">O</option>
                                    <option value="AB">AB</option>
                                </select>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="html5-input" class="col-md-5 col-form-label">Pendidikan</label>
                                <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-study" class="input-group-text"></span>
                                    <input type="text" name="pendidikan" value="{{ $kk->pendidikan }}"
                                        id="basic-icon-default-study" class="form-control"
                                        aria-describedby="basic-icon-default-study" required />
                                </div>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="html5-input" class="col-md-5 col-form-label">Pekerjaan</label>
                                <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-jobs" class="input-group-text"></span>
                                    <input type="text" name="pekerjaan" value="{{ $kk->pekerjaan }}"
                                        id="basic-icon-default-jobs" class="form-control"
                                        aria-describedby="basic-icon-default-jobs" required />
                                </div>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="html5-input" class="col-md-5 col-form-label">Status Hubungan Keluarga</label>
                                <select class="form-select" name="status_hub_keluarga" id="exampleFormControlSelect1"
                                    aria-label="Default select example" required>
                                    <option value="{{ $kk->status_hub_keluarga }}" selected>
                                        {{ $kk->status_hub_keluarga }}
                                    </option>
                                    <option value="kepalakeluarga">Kepala Keluarga</option>
                                    <option value="istri">Istri</option>
                                    <option value="anak">Anak</option>
                                </select>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="html5-input" class="col-md-5 col-form-label">Status Perkawinan</label>
                                <select name="status_perkawinan" class="form-select" id="exampleFormControlSelect1"
                                    aria-label="Default select example" required>
                                    <option value="{{ $kk->status_perkawinan }}" selected>{{ $kk->status_perkawinan }}
                                    </option>
                                    <option value="kawin">Kawin Tercatat</option>
                                    <option value="belumKawin">Belum Kawin</option>
                                </select>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="html5-input" class="col-md-5 col-form-label">Tgl Perkawinan (Optional)</label>
                                <div class="col-md-12">
                                    <input class="form-control" name="tgl_perkawinan" value="{{ $kk->tgl_perkawinan }}"
                                        type="date" id="html5-tgl-input" required />
                                </div>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="html5-input" class="col-md-5 col-form-label">Kewarganegaraan</label>
                                <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-kewarganegaraan" class="input-group-text"></span>
                                    <input type="text" name="kewarganegaraan" id="basic-icon-default-kewarganegaraan"
                                        class="form-control" value="{{ $kk->kewarganegaraan }}"
                                        aria-describedby="basic-icon-default-kewarganegaraan" required />
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="file_pengantar_rt" class="form-label">File Pengantar RT</label> <br>
                                <a class="btn btn-outline-primary btn-sm mb-2" data-bs-toggle="modal"
                                    data-bs-target="#rt{{ $kk->id }}"> <i class='bx bx-image-alt text-primary'>
                                    </i>Cek File</a> <br>
                                <input name="file_pengantar_rt" class="form-control" type="file"
                                    id="file_pengantar_rt">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="file_buku_nikah" class="form-label">File Buku Nikah</label> <br>
                                <a class="btn btn-outline-primary btn-sm mb-2" data-bs-toggle="modal"
                                    data-bs-target="#buku{{ $kk->id }}"> <i class='bx bx-image-alt text-primary'>
                                    </i>Cek File</a> <br>
                                <input name="file_buku_nikah" class="form-control" type="file" id="file_buku_nikah">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="file_kk_lama" class="form-label">File KK Lama</label> <br>
                                <a class="btn btn-outline-primary btn-sm mb-2" data-bs-toggle="modal"
                                    data-bs-target="#kklama{{ $kk->id }}"> <i class='bx bx-image-alt text-primary'>
                                    </i>Cek File</a> <br>
                                <input name="file_kk_lama" class="form-control" type="file" id="file_kk_lama">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="file_ktp" class="form-label">File KTP</label> <br>
                                <a class="btn btn-outline-primary btn-sm mb-2" data-bs-toggle="modal"
                                    data-bs-target="#kkt{{ $kk->id }}"> <i class='bx bx-image-alt text-primary'>
                                    </i>Cek File</a> <br>
                                <input name="file_ktp" class="form-control" type="file" id="file_ktp">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Send</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="rt{{ $kk->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">File KK</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <iframe src="{{ asset('storage/' . $kk->file_pengantar_rt) }}" width="100%"
                        height="400px"></iframe>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="buku{{ $kk->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">File Buku Nikah</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <iframe src="{{ asset('storage/' . $kk->file_buku_nikah) }}" width="100%" height="400px"></iframe>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="kklama{{ $kk->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">File KK</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <iframe src="{{ asset('storage/' . $kk->file_kk_lama) }}" width="100%" height="400px"></iframe>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="kkt{{ $kk->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">File KK</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <iframe src="{{ asset('storage/' . $kk->file_ktp) }}" width="100%" height="400px"></iframe>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

@endsection
