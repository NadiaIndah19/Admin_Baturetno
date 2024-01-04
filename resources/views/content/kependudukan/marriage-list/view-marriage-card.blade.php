@extends('layouts/contentNavbarLayout')

@section('title')

@section('content')
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Kependudukan / </span>AKTA Pernikahan
    </h4>
    <div class="col-xl-12">
        <div class="nav-align-top mb-4">
            <ul class="nav nav-tabs nav-fill" role="tablist">
                <li class="nav-item">
                    <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab"
                        data-bs-target="#navs-justified-home" aria-controls="navs-justified-home"
                        aria-selected="true"><i class="tf-icons bx bx-male"></i> Pihak Mempelai Pria</button>
                </li>
                <li class="nav-item">
                    <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                        data-bs-target="#navs-justified-profile" aria-controls="navs-justified-profile"
                        aria-selected="false"><i class="tf-icons bx bx-female"></i> Pihak Mempelai Wanita</button>
                </li>
            </ul>
            <form action="{{ route('pernikahan.update', ['id' => $pernikahan->id]) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="tab-content">

                    <div class="tab-pane fade show active" id="navs-justified-home" role="tabpanel">
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="namelk" class="form-label">Nama Lengkap</label>
                                <input class="form-control" type="text" id="namelk" name="nama_laki"
                                    value="{{ $pernikahan->nama_laki }}" disabled />
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="nik" class="form-label">NIK</label>
                                <input class="form-control" type="text" id="nik" name="nik_laki"
                                    value="{{ $pernikahan->nik_laki }}" disabled />
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="tptbirth" class="form-label">Tempat Lahir</label>
                                <input type="text" class="form-control" id="tptbirth" name="tempat_lahir_laki"
                                    value="{{ $pernikahan->tempat_lahir_laki }}" maxlength="6" disabled/>
                            </div> 
                            <div class="mb-3 col-md-6">
                                <label for="basic-icon-default-tglbirth" class="form-label">Tanggal Lahir</label>
                                <div class="input-group input-group-merge">
                                    <input class="form-control" type="date" name="tanggal_lahir_laki"
                                        value="{{ $pernikahan->tanggal_lahir_laki }}" id="html5-tglbirth" disabled />
                                </div>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="nameAyah" class="form-label">Nama Ayah</label>
                                <input type="text" class="form-control" id="nameAyah" name="nama_ayah_laki"
                                    value="{{ $pernikahan->nama_ayah_laki }}" maxlength="6" disabled />
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="nameIbu" class="form-label">Nama Ibu</label>
                                <input type="text" class="form-control" id="nameIbu" name="nama_ibu_laki"
                                    value="{{ $pernikahan->nama_ibu_laki }}" maxlength="6" disabled />
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="address" class="form-label">Alamat</label>
                                <input type="text" class="form-control" id="address" name="alamat_laki"
                                    value="{{ $pernikahan->alamat_laki }}" disabled />
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="filepengantar" class="form-label">Surat Pengantar Desa</label> <br>
                                <button type="button" class="btn btn-outline-primary btn-sm mb-2"
                                    data-bs-toggle="modal" data-bs-target="#suratpengantardesa">
                                    <i class='bx bx-image-alt text-primary'></i> Cek File
                                </button>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="fileKTP" class="form-label">File KTP</label><br>
                                <button type="button" class="btn btn-outline-primary btn-sm mb-2"
                                    data-bs-toggle="modal" data-bs-target="#filektplk">
                                    <i class='bx bx-image-alt text-primary'></i> Cek File
                                </button>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="fileAKTAKelahiran" class="form-label">File AKTA Kelahiran</label> <br>

                                <button type="button" class="btn btn-outline-primary btn-sm mb-2"
                                    data-bs-toggle="modal" data-bs-target="#aktakelahiranlk">
                                    <i class='bx bx-image-alt text-primary'></i> Cek File
                                </button>                                    
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="fileKK" class="form-label">File KK</label> <br>
                                <button type="button" class="btn btn-outline-primary btn-sm mb-2"
                                    data-bs-toggle="modal" data-bs-target="#kk_laki">
                                    <i class='bx bx-image-alt text-primary'></i> Cek File
                                </button>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="fileKTPortu" class="form-label">File KTP Orang Tua</label><br>
                                <button type="button" class="btn btn-outline-primary btn-sm mb-2"
                                    data-bs-toggle="modal" data-bs-target="#ktp_ortu_lk">
                                    <i class='bx bx-image-alt text-primary'></i> Cek File
                                </button>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="filesuratNikah" class="form-label">File Surat Nikah Ortu</label><br>
                                <button type="button" class="btn btn-outline-primary btn-sm mb-2"
                                    data-bs-toggle="modal" data-bs-target="#surat_nikah_ortu_lk">
                                    <i class='bx bx-image-alt text-primary'></i> Cek File
                                </button>                                        
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="filefoto" class="form-label">File Foto</label><br>
                                <button type="button" class="btn btn-outline-primary btn-sm mb-2"
                                    data-bs-toggle="modal" data-bs-target="#foto_lk">
                                    <i class='bx bx-image-alt text-primary'></i> Cek File
                                </button>
                            </div>
                            <div class="mt-2">
                                <button type="submit" class="btn btn-primary me-2">Next</button>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="navs-justified-profile" role="tabpanel">
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="namepr" class="form-label">Nama Lengkap</label>
                                <input class="form-control" type="text" id="namepr" name="nama_pr"
                                    value="{{ $pernikahan->nama_pr }}" disabled />
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="nik" class="form-label">NIK</label>
                                <input class="form-control" type="text" id="nik" name="nik_pr"
                                    value="{{ $pernikahan->nik_pr }}" disabled />
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="tptbirth" class="form-label">Tempat Lahir</label>
                                <input type="text" class="form-control" id="tptbirth" name="tempat_lahir_pr"
                                    value="{{ $pernikahan->tempat_lahir_pr }}" maxlength="6"  disabled/>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="basic-icon-default-tglbirth" class="form-label">Tanggal Lahir</label>
                                <div class="input-group input-group-merge">
                                    <input class="form-control" type="date" name="tanggal_lahir_pr"
                                        value="{{ $pernikahan->tanggal_lahir_pr }}" id="html5-tglbirth"  disabled/>
                                </div>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="nameAyah" class="form-label">Nama Ayah</label>
                                <input type="text" class="form-control" id="nameAyah" name="nama_ayah_pr"
                                    value="{{ $pernikahan->nama_ayah_pr }}" maxlength="6" disabled />
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="nameIbu" class="form-label">Nama Ibu</label>
                                <input type="text" class="form-control" id="nameIbu" name="nama_ibu_pr"
                                    value="{{ $pernikahan->nama_ibu_pr }}" maxlength="6" disabled />
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="nameSaksi" class="form-label">Nama Saksi</label>
                                <input type="text" class="form-control" id="nameSaksi" name="nama_saksi"
                                    value="{{ $pernikahan->nama_saksi }}" maxlength="6" disabled />
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="address" class="form-label">Alamat</label>
                                <input type="text" class="form-control" id="address" name="alamat_pr"
                                    value="{{ $pernikahan->alamat_pr }}" disabled/>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="filepengantar" class="form-label">Surat Pengantar Desa</label> <br>
                                <button type="button" class="btn btn-outline-primary btn-sm mb-2"
                                    data-bs-toggle="modal" data-bs-target="#surat_pengantar_desa_pr">
                                    <i class='bx bx-image-alt text-primary'></i> Cek File
                                </button>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="fileKTP" class="form-label">File KTP</label> <br>
                                <button type="button" class="btn btn-outline-primary btn-sm mb-2"
                                    data-bs-toggle="modal" data-bs-target="#ktp_pr">
                                    <i class='bx bx-image-alt text-primary'></i> Cek File
                                </button>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="fileAKTAKelahiran" class="form-label">File AKTA Kelahiran</label> <br>
                                <button type="button" class="btn btn-outline-primary btn-sm mb-2"
                                    data-bs-toggle="modal" data-bs-target="#akta_kelahiran_pr">
                                    <i class='bx bx-image-alt text-primary'></i> Cek File
                                </button>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="fileKK" class="form-label">File KK</label> <br>
                                <button type="button" class="btn btn-outline-primary btn-sm mb-2"
                                    data-bs-toggle="modal" data-bs-target="#kk_pr">
                                    <i class='bx bx-image-alt text-primary'></i> Cek File
                                </button>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="fileKTPortu" class="form-label">File KTP Orang Tua</label> <br>
                                <button type="button" class="btn btn-outline-primary btn-sm mb-2"
                                    data-bs-toggle="modal" data-bs-target="#ktp_ortu_pr">
                                    <i class='bx bx-image-alt text-primary'></i> Cek File
                                </button>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="filesuratNikah" class="form-label">File Surat Nikah Ortu</label> <br>
                                <button type="button" class="btn btn-outline-primary btn-sm mb-2"
                                    data-bs-toggle="modal" data-bs-target="#surat_nikah_ortu_pr">
                                    <i class='bx bx-image-alt text-primary'></i> Cek File
                                </button>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="fileKTPSaksi" class="form-label">File KTP Saksi</label> <br>
                                <button type="button" class="btn btn-outline-primary btn-sm mb-2"
                                    data-bs-toggle="modal" data-bs-target="#foto_saksi">
                                    <i class='bx bx-image-alt text-primary'></i> Cek File
                                </button>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="filefoto" class="form-label">File Foto</label> <br>
                                <button type="button" class="btn btn-outline-primary btn-sm mb-2"
                                    data-bs-toggle="modal" data-bs-target="#foto_pr">
                                    <i class='bx bx-image-alt text-primary'></i> Cek File
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    {{-- MODAL --}}
    <!-- Modal -->
    <div class="modal fade" id="suratpengantardesa" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Surat Pengantar Desa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <iframe src="{{ asset('storage/' . $pernikahan->surat_desa_laki) }}" width="100%"
                        height="400px"></iframe>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    {{-- file ktp lk --}}
    <div class="modal fade" id="filektplk" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">File KTP</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <iframe src="{{ asset('storage/' . $pernikahan->ktp_laki) }}" width="100%"
                        height="400px"></iframe>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    {{-- surat nikah ortu --}}
    <div class="modal fade" id="surat_nikah_ortu_lk" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Surat Nikah Orang Tua</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <iframe src="{{ asset('storage/' . $pernikahan->surat_nikah_ortu_lk) }}" width="100%"
                        height="400px"></iframe>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>



    {{-- surat nikah ortu --}}
    <div class="modal fade" id="aktakelahiranlk" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Akta Kelahiran</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <iframe src="{{ asset('storage/' . $pernikahan->akta_kelahiran_laki) }}" width="100%"
                        height="400px"></iframe>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    {{-- KK LAKI --}}
    <div class="modal fade" id="kk_laki" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Kartu Keluarga</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <iframe src="{{ asset('storage/' . $pernikahan->kk_laki) }}" width="100%" height="400px"></iframe>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    {{-- KTP ORTU --}}
    <div class="modal fade" id="ktp_ortu_lk" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">KTP Orang Tua</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <iframe src="{{ asset('storage/' . $pernikahan->ktp_ortu_laki) }}" width="100%"
                        height="400px"></iframe>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    {{-- FOTO LAKI --}}
    <div class="modal fade" id="foto_lk" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Surat Nikah Orang Tua</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <iframe src="{{ asset('storage/' . $pernikahan->foto_laki) }}" width="100%"
                        height="400px"></iframe>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>



    {{-- ==================================================================  PEREMPUAN ============================================================== --}}
    {{-- modal untuk PEREMPUAN --}}
    <!-- Modal -->
    <div class="modal fade" id="surat_pengantar_desa_pr" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Surat Pengantar Desa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <iframe src="{{ asset('storage/' . $pernikahan->surat_desa_pr) }}" width="100%"
                        height="400px"></iframe>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    {{-- file ktp lk --}}
    <div class="modal fade" id="ktp_pr" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">File KTP</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <iframe src="{{ asset('storage/' . $pernikahan->ktp_pr) }}" width="100%" height="400px"></iframe>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    {{-- surat nikah ortu --}}
    <div class="modal fade" id="surat_nikah_ortu_lk" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Surat Nikah Orang Tua</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <iframe src="{{ asset('storage/' . $pernikahan->surat_nikah_ortu_lk) }}" width="100%"
                        height="400px"></iframe>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>



    {{-- surat nikah ortu --}}
    <div class="modal fade" id="akta_kelahiran_pr" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Akta Kelahiran</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <iframe src="{{ asset('storage/' . $pernikahan->akta_kelahiran_pr) }}" width="100%"
                        height="400px"></iframe>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    {{-- KK LAKI --}}
    <div class="modal fade" id="kk_pr" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Kartu Keluarga</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <iframe src="{{ asset('storage/' . $pernikahan->kk_pr) }}" width="100%" height="400px"></iframe>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    {{-- KTP ORTU --}}
    <div class="modal fade" id="ktp_ortu_pr" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">KTP Orang Tua</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <iframe src="{{ asset('storage/' . $pernikahan->ktp_ortu_pr) }}" width="100%"
                        height="400px"></iframe>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    {{-- FOTO LAKI --}}
    <div class="modal fade" id="foto_pr" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Foto</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <iframe src="{{ asset('storage/' . $pernikahan->foto_pr) }}" width="100%" height="400px"></iframe>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    {{-- end --}}
    <div class="modal fade" id="surat_nikah_ortu_pr" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Foto</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <iframe src="{{ asset('storage/' . $pernikahan->surat_nikah_ortu_pr) }}" width="100%"
                        height="400px"></iframe>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    {{--  --}}

    {{-- end --}}
    <div class="modal fade" id="foto_saksi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Foto</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <iframe src="{{ asset('storage/' . $pernikahan->ktp_saksi) }}" width="100%"
                        height="400px"></iframe>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    {{--  --}}


@endsection
