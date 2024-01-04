@extends('layouts/contentNavbarLayout')

@section('title')

@section('page-script')
    <script src="{{ asset('assets/js/pages-account-settings-account.js') }}"></script>
@endsection

@section('content')
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Kependudukan /</span> AKTA Kematian
    </h4>
    <div class="row">
            <div class="card mb-4">
                <h5 class="card-header">View AKTA Kematian</h5>
                <hr class="my-0">
                <div class="card-body">
                    <form action="{{ route('aktakematian.update', ['id' => $aktakematian->id]) }}" id="formAccountSettings"
                        method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="namepen" class="form-label">Nama Pendaftar</label>
                                <input class="form-control" type="text" id="namepen" name="nama_pendaftar"
                                    value="{{ $aktakematian->nama_pendaftar }}" disabled />
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label" for="relation">Hubungan</label>
                                <select id="relation" name="hubungan" class="select2 form-select" disabled>
                                    <option value="{{ $aktakematian->hubungan }}">{{ $aktakematian->hubungan }}</option>
                                    <option value="ayah">Ayah</option>
                                    <option value="ibu">Ibu</option>
                                    <option value="anak">Anak</option>
                                    <option value="suami">Suami</option>
                                    <option value="istri">Istri</option>
                                    <option value="keluargalainnya">Keluarga</option>
                                    <option value="lainnya">Lainnya</option>
                                </select>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="NIKAlm" class="form-label">NIK Alm</label>
                                <input class="form-control" type="number" id="NIKAlm" name="nik_alm"
                                    value="{{ $aktakematian->nik_alm }}" disabled/>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="name" class="form-label">Nama Lengkap Alm</label>
                                <input class="form-control" type="text" id="name" name="nama"
                                    value="{{ $aktakematian->nama }}" autofocus disabled />
                            </div>
                            <div class="mb-3 col-md-6">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="ttlAlm" class="form-label">Tempat Lahir</label>
                                        <input type="text" class="form-control" id="ttlAlm" name="tempat_lahir"
                                            value="{{ $aktakematian->tempat_lahir }}" disabled/>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="ttlAlm" class="form-label">Tanggal Lahir</label>
                                        <input type="date" class="form-control" id="ttlAlm" name="tanggal_lahir"
                                            value="{{ $aktakematian->tanggal_lahir }}" disabled/>
                                    </div>
                                </div>

                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="religion" class="form-label">Agama</label>
                                <input type="text" class="form-control" id="religion" name="agama"
                                    value="{{ $aktakematian->agama }}" disabled/>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="statusAlm" class="form-label">Status Perkawinan</label>
                                <select id="statusAlm" name="status_perkawinan" class="select2 form-select" disabled>
                                    <option value="{{ $aktakematian->status_perkawinan }}">
                                        {{ $aktakematian->status_perkawinan }}</option>
                                    <option value="Belum Kawin">Belum kawin</option>
                                    <option value="Kawin">Kawin</option>
                                    <option value="Cerai Hidup">Cerai hidup</option>
                                    <option value="Cerai Mati">Cerai mati</option>
                                </select>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label" for="gender">Jenis Kelamin</label>
                                <select id="gender" name="jenis_kelamin" class="select2 form-select" disabled>
                                    <option value="{{ $aktakematian->jenis_kelamin }}">{{ $aktakematian->jenis_kelamin }}
                                    </option>
                                    <option value="Laki-Laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="jobs" class="form-label">Pekerjaan</label>
                                <input type="text" class="form-control" id="jobs" name="pekerjaan"
                                    value="{{ $aktakematian->pekerjaan }}" maxlength="6" disabled />
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="state" class="form-label">Kewarganegaraan</label>
                                <input type="text" class="form-control" id="state" name="kewarganegaraan"
                                    value="{{ $aktakematian->kewarganegaraan }}" disabled />
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="tptdeath" class="form-label">Tempat Meninggal</label>
                                <input type="text" class="form-control" id="tptdeath" name="tempat_meninggal"
                                    value="{{ $aktakematian->tempat_meninggal }}" disabled maxlength="6" disabled/>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="basic-icon-default-tgldeath" class="form-label">Tanggal Meninggal</label>
                                <div class="input-group input-group-merge">
                                    <input class="form-control" type="date" name="tanggal_meninggal"
                                        id="html5-tgldeath" value="{{ $aktakematian->tanggal_meninggal }}" disabled/>
                                </div>
                            </div>
                            <div class="mb-3 col-md-4">
                                <label for="penyebabkematian" class="form-label">Penyebab Kematian</label>
                                <input type="text" class="form-control" id="penyebabkematian"
                                    value="{{ $aktakematian->penyebab_kematian }}" name="penyebab_kematian" disabled/>
                            </div>
                            <div class="mb-3 col-md-4">
                                <label for="address" class="form-label">Alamat</label>
                                <input type="text" class="form-control" id="address" name="alamat"
                                    value="{{ $aktakematian->alamat }}" disabled />
                            </div>
                            <div class="mb-3 col-md-4">
                                <label for="notes" class="form-label">Catatan</label>
                                <input type="text" class="form-control" id="notes" name="catatan"maxlength="6"
                                    value="{{ $aktakematian->catatan }}"  disabled/>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="filePernyataan" class="form-label">File Pernyataan Kematian</label> <br>
                                <a class="btn btn-outline-primary btn-sm mb-2" data-bs-toggle="modal"
                                    data-bs-target="#pernyataan{{ $aktakematian->id }}"> <i
                                        class='bx bx-image-alt text-primary'></i>Cek File</a> <br>
                                
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="fileKTP" class="form-label">File KTP</label> <br>
                                <a class="btn btn-outline-primary btn-sm mb-2" data-bs-toggle="modal"
                                    data-bs-target="#ktp{{ $aktakematian->id }}"> <i
                                        class='bx bx-image-alt text-primary'></i>Cek File</a> <br>
                                
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="fileKK" class="form-label">File KK</label> <br>
                                <a class="btn btn-outline-primary btn-sm mb-2" data-bs-toggle="modal"
                                    data-bs-target="#kk{{ $aktakematian->id }}"> <i
                                        class='bx bx-image-alt text-primary'></i>Cek File</a> <br>
                                
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="fileTTD" class="form-label">File TTD</label> <br>
                                <a class="btn btn-outline-primary btn-sm mb-2" data-bs-toggle="modal"
                                    data-bs-target="#ttd{{ $aktakematian->id }}"> <i
                                        class='bx bx-image-alt text-primary'></i>Cek File</a> <br>
                                
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="fileaktakel" class="form-label">File Akta Kelahiran</label> <br>
                                <a class="btn btn-outline-primary btn-sm mb-2" data-bs-toggle="modal"
                                    data-bs-target="#akta{{ $aktakematian->id }}"> <i
                                        class='bx bx-image-alt text-primary'></i>Cek File</a> <br>
                                
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="filebukunikah" class="form-label">File Buku Nikah</label> <br>
                                <a class="btn btn-outline-primary btn-sm mb-2" data-bs-toggle="modal"
                                    data-bs-target="#buku{{ $aktakematian->id }}"> <i
                                        class='bx bx-image-alt text-primary'></i>Cek File</a> <br>
                               
                            </div>                          
                        </div>
                    </form>
                </div>
                <!-- /Account -->
            </div>
    </div>

    <div class="modal fade" id="pernyataan{{ $aktakematian->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">File Pernyataan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <iframe src="{{ asset('storage/' . $aktakematian->file_pernyataan) }}" width="100%"
                        height="400px"></iframe>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="ktp{{ $aktakematian->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">File KTP</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <iframe src="{{ asset('storage/' . $aktakematian->file_ktp) }}" width="100%"
                        height="400px"></iframe>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="kk{{ $aktakematian->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">File KK</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <iframe src="{{ asset('storage/' . $aktakematian->file_kk) }}" width="100%"
                        height="400px"></iframe>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="ttd{{ $aktakematian->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">File TTD</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <iframe src="{{ asset('storage/' . $aktakematian->file_ttd) }}" width="100%"
                        height="400px"></iframe>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="akta{{ $aktakematian->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">File Akta Kelahiran</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <iframe src="{{ asset('storage/' . $aktakematian->file_akta_kelahiran) }}" width="100%"
                        height="400px"></iframe>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="buku{{ $aktakematian->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">File Buku Nikah</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <iframe src="{{ asset('storage/' . $aktakematian->file_buku_nikah) }}" width="100%"
                        height="400px"></iframe>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>






@endsection
