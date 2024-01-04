@extends('layouts/contentNavbarLayout')

@section('title')

@section('content')
<h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light">Kependudukan / </span> AKTA Pernikahan
</h4>

<div class="row">
    <div class="col-xl-12">
      <div class="nav-align-top mb-4">
        <ul class="nav nav-tabs nav-fill" role="tablist">
          <li class="nav-item">
            <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab" 
            data-bs-target="#navs-justified-home" aria-controls="navs-justified-home" aria-selected="true">
            <i class="tf-icons bx bx-male"></i> Pihak Mempelai Pria</button>
          </li>
          <li class="nav-item">
            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" 
            data-bs-target="#navs-justified-profile" aria-controls="navs-justified-profile" 
            aria-selected="false"><i class="tf-icons bx bx-female"></i> Pihak Mempelai Wanita</button>
          </li>
        </ul>
        <form action="{{ route('pernikahan.store') }}" method="POST" enctype="multipart/form-data">
          @csrf  
        <div class="card ">
          <div class="tab-content">
            <div class="tab-pane fade show active" id="navs-justified-home" role="tabpanel">
              <div class="row">
                <div class="mb-3 col-md-6">
                  <label for="namelk" class="form-label">Nama Lengkap <span class="ml-1 text-danger">*</span></label>
                  <input class="form-control" type="text" id="namelk" name="nama_laki" autofocus/>
                </div>
                <div class="mb-3 col-md-6">
                  <label for="nik" class="form-label">NIK <span class="ml-1 text-danger">*</span></label>
                  <input class="form-control" type="number" id="nik" name="nik_laki" autofocus/>
                </div>
                <div class="mb-3 col-md-6">
                  <label for="tptbirth" class="form-label">Tempat Lahir <span class="ml-1 text-danger">*</span></label>
                  <input type="text" class="form-control" id="tptbirth" name="tempat_lahir_laki" />
                </div>
                <div class="mb-3 col-md-6">
                  <label for="basic-icon-default-tglbirth" class="form-label">Tanggal Lahir <span class="ml-1 text-danger">*</span></label>
                  <div class="input-group input-group-merge">
                    <input class="form-control" type="date" name="tanggal_lahir_laki" value="11-02-2023" id="html5-tglbirth" />
                  </div>
                </div>
                <div class="mb-3 col-md-6">
                  <label for="nameAyah" class="form-label">Nama Ayah <span class="ml-1 text-danger">*</span></label>
                  <input type="text" class="form-control" id="nameAyah" name="nama_ayah_laki" />
                </div>
                <div class="mb-3 col-md-6">
                  <label for="nameIbu" class="form-label">Nama Ibu <span class="ml-1 text-danger">*</span></label>
                  <input type="text" class="form-control" id="nameIbu" name="nama_ibu_laki"/>
                </div>
                <div class="mb-3 col-md-6">
                  <label for="address" class="form-label">Alamat <span class="ml-1 text-danger">*</span></label>
                  <input type="text" class="form-control" id="address" name="alamat_laki"/>
                </div>
                <div class="col-md-6 mb-3">
                  <label for="filepengantar" class="form-label">Surat Pengantar Desa <span class="ml-1 text-danger">*</span></label>
                  <input class="form-control" type="file" name="surat_desa_laki" id="filepengantar" accept="application/pdf,application/vnd.ms-excel" />
                </div>
                <div class="col-md-6 mb-3">
                  <label for="fileKTP" class="form-label">File KTP <span class="ml-1 text-danger">*</span></label>
                  <input class="form-control" type="file" name="ktp_laki" id="fileKTP" accept="application/pdf,application/vnd.ms-excel" />
                </div>
                <div class="col-md-6 mb-3">
                  <label for="fileAKTAKelahiran" class="form-label">File AKTA Kelahiran <span class="ml-1 text-danger">*</span></label>
                  <input class="form-control" type="file" name="akta_kelahiran_laki" id="fileAKTAKelahiran" accept="application/pdf,application/vnd.ms-excel" />
                </div>
                <div class="col-md-6 mb-3">
                  <label for="fileKK" class="form-label">File KK <span class="ml-1 text-danger">*</span></label>
                  <input class="form-control" type="file" id="fileKK" name="kk_laki" accept="application/pdf,application/vnd.ms-excel" />
                </div>
                <div class="col-md-6 mb-3">
                  <label for="fileKTPortu" class="form-label">File KTP Orang Tua <span class="ml-1 text-danger">*</span></label>
                  <input class="form-control" type="file" name="ktp_ortu_laki" id="fileKTPortu" accept="application/pdf,application/vnd.ms-excel" /> 
                </div>
                <div class="col-md-6 mb-3">
                  <label for="filesuratNikah" class="form-label">File Surat Nikah Ortu <span class="ml-1 text-danger">*</span></label>
                  <input class="form-control" type="file" id="filesuratNikah" name="surat_nikah_ortu_lk" accept="application/pdf,application/vnd.ms-excel" />
                </div>
                <div class="col-md-6 mb-3">
                  <label for="filefoto" class="form-label">File Foto <span class="ml-1 text-danger">*</span></label>
                  <input class="form-control" type="file" id="filefoto" name="foto_laki" accept="image/png, image/gif, image/jpeg">
                </div>
              </div>
            </div>
            <div class="tab-pane fade" id="navs-justified-profile" role="tabpanel">
              <div class="row">
                <div class="mb-3 col-md-6">
                  <label for="namepr" class="form-label">Nama Lengkap <span class="ml-1 text-danger">*</span></label>
                  <input class="form-control" type="text" id="namepr" name="nama_pr" autofocus/>
                </div>
                <div class="mb-3 col-md-6">
                  <label for="nik" class="form-label">NIK <span class="ml-1 text-danger">*</span></label>
                  <input class="form-control" type="number" id="nik" name="nik_pr" autofocus/>
                </div>
                <div class="mb-3 col-md-6">
                  <label for="tptbirth" class="form-label">Tempat Lahir <span class="ml-1 text-danger">*</span></label>
                  <input type="text" class="form-control" id="tptbirth" name="tempat_lahir_pr"/>
                </div>
                <div class="mb-3 col-md-6">
                  <label for="basic-icon-default-tglbirth" class="form-label">Tanggal Lahir <span class="ml-1 text-danger">*</span></label>
                  <div class="input-group input-group-merge">
                    <input class="form-control" type="date" value="11-02-2023" name="tanggal_lahir_pr" id="html5-tglbirth" />
                  </div>
                </div>
                <div class="mb-3 col-md-6">
                  <label for="nameAyah" class="form-label">Nama Ayah <span class="ml-1 text-danger">*</span></label>
                  <input type="text" class="form-control" id="nameAyah" name="nama_ayah_pr"/>
                </div>
                <div class="mb-3 col-md-6">
                  <label for="nameIbu" class="form-label">Nama Ibu <span class="ml-1 text-danger">*</span></label>
                  <input type="text" class="form-control" id="nameIbu" name="nama_ibu_pr"/>
                </div>
                <div class="mb-3 col-md-6">
                  <label for="nameSaksi" class="form-label">Nama Saksi <span class="ml-1 text-danger">*</span></label>
                  <input type="text" class="form-control" id="nameSaksi" name="nama_saksi"maxlength="6"/>
                </div>
                <div class="mb-3 col-md-6">
                  <label for="address" class="form-label">Alamat <span class="ml-1 text-danger">*</span></label>
                  <input type="text" class="form-control" id="address" name="alamat_pr"/>
                </div>
                <div class="col-md-6 mb-3">
                  <label for="filepengantar" class="form-label">Surat Pengantar Desa <span class="ml-1 text-danger">*</span></label>
                  <input class="form-control" type="file" id="filepengantar" name="surat_desa_pr" accept="application/pdf,application/vnd.ms-excel" />
                </div>
                <div class="col-md-6 mb-3">
                  <label for="fileKTP" class="form-label">File KTP</label>
                  <input class="form-control" type="file" id="fileKTP" name="ktp_pr" accept="application/pdf,application/vnd.ms-excel" />
                </div>
                <div class="col-md-6 mb-3">
                  <label for="fileAKTAKelahiran" class="form-label">File AKTA Kelahiran <span class="ml-1 text-danger">*</span></label>
                  <input class="form-control" type="file" id="fileAKTAKelahiran" name="akta_kelahiran_pr" accept="application/pdf,application/vnd.ms-excel" />
                </div>
                <div class="col-md-6 mb-3">
                  <label for="fileKK" class="form-label">File KK <span class="ml-1 text-danger">*</span></label>
                  <input class="form-control" type="file" id="fileKK" name="kk_pr" accept="application/pdf,application/vnd.ms-excel" />
                </div>
                <div class="col-md-6 mb-3">
                  <label for="fileKTPortu" class="form-label">File KTP Orang Tua <span class="ml-1 text-danger">*</span></label>
                  <input class="form-control" type="file" id="fileKTPortu" name="ktp_ortu_pr" accept="application/pdf,application/vnd.ms-excel" />
                </div>
                <div class="col-md-6 mb-3">
                  <label for="filesuratNikah" class="form-label">File Surat Nikah Ortu <span class="ml-1 text-danger">*</span></label>
                  <input class="form-control" type="file" id="filesuratNikah" name="surat_nikah_ortu_pr" accept="application/pdf,application/vnd.ms-excel" />
                </div>
                <div class="col-md-6 mb-3">
                  <label for="fileKTPSaksi" class="form-label">File KTP Saksi <span class="ml-1 text-danger">*</span></label>
                  <input class="form-control" type="file" id="fileKTPSaksi" name="ktp_saksi" accept="application/pdf,application/vnd.ms-excel" />
                </div>
                <div class="col-md-6 mb-3">
                  <label for="filefoto" class="form-label">File Foto <span class="ml-1 text-danger">*</span></label>
                  <input class="form-control" type="file" id="filefoto" name="foto_pr" accept="image/png, image/gif, image/jpeg">
                </div>
                <small class="mb-3 col-md-6">note : untuk (*) wajib diisi</small>
                <div class="mt-2">
                  <button type="reset" class="btn btn-outline-secondary">Back</button>
                  <button type="submit" class="btn btn-primary me-2">Save changes</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </form>
      </div>
    </div>  
</div>
@endsection
