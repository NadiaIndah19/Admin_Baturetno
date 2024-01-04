@extends('layouts/contentNavbarLayout')

@section('title')

@section('content')
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Kependudukan /</span> AKTA Kelahiran</h4>

    <!-- Basic Layout -->
    <div class="row">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Update AKTA Kelahiran</h5>
                    <small class="text-muted float-end">Masukkan data anak dengan benar</small>
                </div>
                <hr class="my-0">
                <div class="card-body">
                    <form action="{{ route('aktakelahiran.update', ['id' => $aktakelahiran->id]) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="noKK" class="form-label">Nomor KK</label>
                                <input class="form-control" type="number" id="noKK" name="nomor_kk"
                                    value="{{ $aktakelahiran->nomor_kk }}" maxlength="16"/>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="namakepalakel" class="form-label">Nama Kepala Keluarga</label>
                                <input class="form-control" type="text" id="noKK" name="nama_kepala_keluarga"
                                    value="{{ $aktakelahiran->nama_kepala_keluarga }}" />
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="namaAnak" class="form-label">Nama Lengkap Anak</label>
                                <input class="form-control" type="text" id="namaAnak" name="nama_lengkap_anak"
                                    value="{{ $aktakelahiran->nama_lengkap_anak }}" autofocus />
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label" for="tempatdilahirkan">Tempat Dilahirkan</label>
                                <select id="tempatdilahirkan" class="select2 form-select" name="tempat_lahir">
                                    <option value="{{ $aktakelahiran->tempat_lahir }}" selected>
                                        {{ ucfirst($aktakelahiran->tempat_lahir) }}</option>
                                    <option value="rs">RS/RB</option>
                                    <option value="puskesmas">Puskesmas</option>
                                    <option value="polindes">Polindes</option>
                                    <option value="rumah">Rumah</option>
                                    <option value="lainnya">Lainnya</option>
                                </select>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="tptbirth" class="form-label">Tempat Kelahiran</label>
                                <input type="text" class="form-control" id="tptbirth" name="tempat_lahir_anak"
                                    value="{{ $aktakelahiran->tempat_lahir_anak }}" maxlength="6" />
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="basic-icon-default-tglbirth" class="form-label">Tanggal Kelahiran</label>
                                <div class="input-group input-group-merge">
                                    <input class="form-control" type="date" name="tanggal_lahir_anak" id="html5-tglbirth"
                                        value="{{ $aktakelahiran->tanggal_lahir_anak }}" />
                                </div>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label" for="gender">Jenis Kelamin</label>
                                <select id="gender" class="select2 form-select" name="jenis_kelamin">
                                    <option value="{{ $aktakelahiran->jenis_kelamin }}" selected>
                                        {{ ucfirst($aktakelahiran->jenis_kelamin) }}</option>
                                    <option value="laki-laki">Laki-laki</option>
                                    <option value="perempuan">Perempuan</option>
                                </select>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="basic-icon-default-time" class="form-label">Pukul Kelahiran</label>
                                <div class="input-group input-group-merge">
                                    <input class="form-control" type="time" id="html5-time" name="pukul_kelahiran"
                                        value="{{ $aktakelahiran->pukul_kelahiran }}" />
                                </div>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label" for="jenisdilahirkan">Jenis Dilahirkan</label>
                                <select id="jenisdilahirkan" class="select2 form-select" name="jenis_dilahirkan">
                                    <option value="{{ $aktakelahiran->jenis_dilahirkan }}" selected>
                                        {{ ucfirst($aktakelahiran->jenis_dilahirkan) }}</option>
                                    <option value="tungga">Tunggal</option>
                                    <option value="kembar 2">Kembar 2</option>
                                    <option value="kembar 3">Kembar 3</option>
                                    <option value="kembar 5">Kembar 5</option>
                                    <option value="lainnya">Lainnya</option>
                                </select>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label" for="kelahiranke">Kelahiran Ke</label>
                                <select id="kelahiranke" class="select2 form-select" name="nomor_kelahiran">
                                    <option value="{{ $aktakelahiran->nomor_kelahiran }}" selected>
                                        {{ ucfirst($aktakelahiran->nomor_kelahiran) }}</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="lainnya">Lainnya</option>
                                </select>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label" for="anakke">Anak Ke</label>
                                <select id="anakke" class="select2 form-select" name="nomor_anak">
                                    <option value="{{ $aktakelahiran->nomor_anak }}" selected>
                                        {{ ucfirst($aktakelahiran->nomor_anak) }}</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="lainnya">Lainnya</option>
                                </select>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label" for="penolongkelahiran">Penolong Kelahiran</label>
                                <select id="penolongkelahiran" class="select2 form-select" name="penolong_kelahiran">
                                    <option value="{{ $aktakelahiran->penolong_kelahiran }}" selected>
                                        {{ ucfirst($aktakelahiran->penolong_kelahiran) }}</option>
                                    <option value="Dokter">Dokter</option>
                                    <option value="Bidan / Perawat">Bidan / Perawat</option>
                                    <option value="Dukun">Dukun</option>
                                    <option value="lainnya">Lainnya</option>
                                </select>
                            </div>
                        </div>

                        <hr class="my-4">
                        <div class="row">
                            <h4 class="mb-3 col-md-6">Data Ayah</h4>
                            <h4 class="mb-3 col-md-6">Data Ibu</h4>
                            <div class="mb-3 col-md-6">
                                <label for="nikayah" class="form-label">NIK Ayah</label>
                                <input class="form-control" type="number" id="nikayah" name="nik_ayah"
                                    value="{{ $aktakelahiran->nik_ayah }}" maxlength="16"/>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="nikibu" class="form-label">NIK Ibu</label>
                                <input class="form-control" type="number" id="nikibu" name="nik_ibu"
                                    value="{{ $aktakelahiran->nik_ibu }}" maxlength="16" />
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="namaAyah" class="form-label">Nama Lengkap Ayah</label>
                                <input class="form-control" type="text" id="namaAyah" name="nama_ayah"
                                    value="{{ $aktakelahiran->nama_ayah }}" />
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="namaibu" class="form-label">Nama Lengkap ibu</label>
                                <input class="form-control" type="text" id="namaibu" name="nama_ibu"
                                    value="{{ $aktakelahiran->nama_ibu }}" />
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="basic-icon-default-tglbirthAyah" class="form-label">Tanggal Kelahiran
                                    Ayah</label>
                                <div class="input-group input-group-merge">
                                    <input class="form-control" type="date" id="html5-tglbirthAyah"
                                        name="tanggal_kelahiran_ayah"
                                        value="{{ $aktakelahiran->tanggal_kelahiran_ayah }}" />
                                </div>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="basic-icon-default-tglbirthIbu" class="form-label">Tanggal Kelahiran</label>
                                <div class="input-group input-group-merge">
                                    <input class="form-control" type="date" id="html5-tglbirthIbu"
                                        name="tanggal_kelahiran_ibu"
                                        value="{{ $aktakelahiran->tanggal_kelahiran_ibu }}" />
                                </div>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="jobsAyah" class="form-label">Pekerjaan Ayah</label>
                                <input type="text" class="form-control" id="jobsAyah"
                                    name="pekerjaan_ayah"maxlength="6" value="{{ $aktakelahiran->pekerjaan_ayah }}" />
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="jobsIbu" class="form-label">Pekerjaan Ibu</label>
                                <input type="text" class="form-control" id="jobsIbu"
                                    name="pekerjaan_ibu"maxlength="6" value="{{ $aktakelahiran->pekerjaan_ibu }}" />
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label" for="kewarganegaraanAyah">Kewarganegaraan Ayah</label>
                                <select id="kewarganegaraanAyah" class="select2 form-select" name="kewarganegaraan_ayah">
                                    <option value="{{ $aktakelahiran->kewarganegaraan_ayah }}" selected>
                                        {{ ucfirst($aktakelahiran->kewarganegaraan_ayah) }}</option>
                                    <option value="wni">WNI</option>
                                    <option value="wna">WNA</option>
                                </select>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label" for="kewarganegaraanIbu">Kewarganegaraan Ibu</label>
                                <select id="kewarganegaraanIbu" class="select2 form-select" name="kewarganegaraan_ibu">
                                    <option value="{{ $aktakelahiran->kewarganegaraan_ibu }}" selected>
                                        {{ ucfirst($aktakelahiran->kewarganegaraan_ibu) }}</option>
                                    <option value="wni">WNI</option>
                                    <option value="wna">WNA</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="address" class="form-label">Alamat</label>
                                <input type="text" class="form-control" id="address" name="alamat"
                                    value="{{ $aktakelahiran->alamat }}" />
                            </div>
                            <div class="mb-3">
                                <label for="basic-icon-default-tglperkawinan" class="form-label">Tanggal Pencatatan
                                    Perkawinan</label>
                                <div class="input-group input-group-merge">
                                    <input class="form-control" type="date" name="tanggal_perkawinan"
                                        id="html5-tglperkawinan" value="{{ $aktakelahiran->tanggal_perkawinan }}" />
                                </div>
                            </div>

                            <hr class="my-4">
                            <div class="col-md-6 mb-3">
                                <label for="fileKet" class="form-label">File Keterangan Lahir dari RS / Bidan</label>
                                <br>
                                <a class="btn btn-outline-primary btn-sm mb-2" data-bs-toggle="modal"
                                    data-bs-target="#rs{{ $aktakelahiran->id }}"> <i
                                        class='bx bx-image-alt text-primary'></i>Cek File</a> <br>
                                <input class="form-control" name="file_rs" type="file" id="fileKet">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="fileKK" class="form-label">File KK</label> <br>
                                <a class="btn btn-outline-primary btn-sm mb-2" data-bs-toggle="modal"
                                    data-bs-target="#kk{{ $aktakelahiran->id }}"> <i
                                        class='bx bx-image-alt text-primary'></i>Cek File</a> <br>
                                <input class="form-control" type="file" name="file_kk" id="fileKK">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="fileKTP" class="form-label">File KTP</label> <br>
                                <a class="btn btn-outline-primary btn-sm mb-2" data-bs-toggle="modal"
                                    data-bs-target="#ktp{{ $aktakelahiran->id }}"> <i
                                        class='bx bx-image-alt text-primary'></i>Cek File</a> <br>
                                <input class="form-control" type="file" name="file_ktp" id="fileKTP">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="filebukunikah" class="form-label">File Buku Nikah</label> <br>
                                <a class="btn btn-outline-primary btn-sm mb-2" data-bs-toggle="modal"
                                    data-bs-target="#buku{{ $aktakelahiran->id }}"> <i
                                        class='bx bx-image-alt text-primary'></i>Cek File</a> <br>
                                <input class="form-control" type="file" name="file_buku_nikah" id="filebukunikah">
                            </div>
                            <div class="mt-2">
                                <button type="submit" class="btn btn-primary me-2">Save changes</button>
                            </div>
                    </form>
                </div>
            </div>
    </div>

    <div class="modal fade" id="rs{{ $aktakelahiran->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">File Surat Rumah Sakit</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <iframe src="{{ asset('storage/' . $aktakelahiran->file_rs) }}" width="100%"
                        height="400px"></iframe>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="kk{{ $aktakelahiran->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
      aria-hidden="true">
      <div class="modal-dialog modal-lg">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">File KK</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                  <iframe src="{{ asset('storage/' . $aktakelahiran->file_kk) }}" width="100%"
                      height="400px"></iframe>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
              </div>
          </div>
      </div>
  </div>

  <div class="modal fade" id="ktp{{ $aktakelahiran->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">File KTP</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <iframe src="{{ asset('storage/' . $aktakelahiran->file_ktp) }}" width="100%"
                    height="400px"></iframe>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="buku{{ $aktakelahiran->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-lg">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">File Buku Nikah</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
              <iframe src="{{ asset('storage/' . $aktakelahiran->file_buku_nikah) }}" width="100%"
                  height="400px"></iframe>
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
          </div>
      </div>
  </div>
</div>

@endsection
