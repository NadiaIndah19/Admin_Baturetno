@extends('layouts/contentNavbarLayout')

@section('title')

@section('content')
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Kependudukan /</span> Kartu Keluarga
    </h4>

    <!-- card Table -->
    <div class="card">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h5>Daftar Anggota Keluarga Terlampir</h5>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCenter">
                Tambah Anggota
            </button>
        </div>
        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>NIK</th>
                        <th>Nama Lengkap</th>
                        <th>TTL</th>
                        <th>Agama</th>
                        <th>Golongan Darah</th>
                        <th>Pendidikan</th>
                        <th>Hubungan Kel</th>
                        <th>Jenis Kelamin</th>
                        <th>Pekerjaan</th>
                        <th>Status Perkawinan</th>
                        <th>Tgl Perkawinan</th>
                        <th>Kewarganegaraan</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($child as $item)
                        <tr>
                            <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{ $no++ }}</strong>
                            </td>
                            <td>{{ $item->nik }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->tempat_lahir . ',' . \Carbon\Carbon::parse($item->tanggal_lahir)->format('d-F-Y') }}
                            </td>
                            <td>{{ $item->agama }}</td>
                            <td>{{ $item->gol_darah }}</td>
                            <td>{{ $item->pendidikan }}</td>
                            <td>{{ $item->status_hub_keluarga }}</td>
                            <td>{{ $item->jenis_kelamin }}</td>
                            <td>{{ $item->pekerjaan }}</td>
                            <td>{{ $item->status_perkawinan }}</td>
                            <td>{{ $item->tgl_perkawinan }}</td>
                            <td>{{ $item->kewarganegaraan }}</td>
                            <td>
                                <button type="button" class="btn btn-outline-info btn-sm btn-rounded "
                                    data-bs-toggle="modal" data-bs-target="#edit{{ $item->id }}">
                                    <i class='bx bx-message-square-edit'></i> </button>
                                    <button onclick="destroy({{ $item->id }})" class="btn btn-outline-danger btn-sm "><i
                                            class='bx bx-trash-alt'></i></button>
                            </td>
                        </tr>
                        <div class="modal fade" id="edit{{ $item->id }}" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalCenterTitle">Update Anggota Keluarga</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('kk.anak.update', ['id' => $item->id]) }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <div class="row">
                                                <div class="mb-3 col-md-6">
                                                    <label class="form-label" for="basic-icon-default-nik">NIK</label>
                                                    <div class="input-group input-group-merge">
                                                        <span id="basic-icon-default-nik2" class="input-group-text"></span>
                                                        <input type="text" name="nik" value="{{ $item->nik }}"
                                                            class="form-control" id="basic-icon-default-nik"
                                                            aria-describedby="basic-icon-default-nik2" required />
                                                    </div>
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label class="form-label" for="basic-icon-default-name">Nama
                                                        Lengkap</label>
                                                    <div class="input-group input-group-merge">
                                                        <span id="basic-icon-default-name2" class="input-group-text"></span>
                                                        <input type="text" name="nama" value="{{ $item->nama }}"
                                                            id="basic-icon-default-name" class="form-control"
                                                            aria-describedby="basic-icon-default-name2" required />
                                                    </div>
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label for="ttl" class="form-label">Tempat Lahir</label>
                                                            <input type="text" class="form-control" id="ttl" name="tempat_lahir"
                                                                value="{{ $item->tempat_lahir }}" />
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="ttl" class="form-label">Tanggal Lahir</label>
                                                            <input type="date" class="form-control" id="ttl" name="tanggal_lahir"
                                                                value="{{ $item->tanggal_lahir }}" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label class="form-label"
                                                        for="basic-icon-default-religion">Agama</label>
                                                    <div class="input-group input-group-merge">
                                                        <span class="input-group-text"></span>
                                                        <select name="agama" class="form-control" id="" required>
                                                            <option value="{{ $item->agama }}" selected>
                                                                {{ $item->agama }}
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
                                                    <label class="form-label" for="basic-icon-default-status">Jenis
                                                        Kelamin</label>
                                                    <select name="jenis_kelamin" class="form-select"
                                                        id="exampleFormControlSelect1" aria-label="Default select example"
                                                        required>
                                                        <option value="{{ $item->jenis_kelamin }}" selected>
                                                            {{ $item->jenis_kelamin }}
                                                        </option>
                                                        <option value="Laki-Laki">Laki-laki</option>
                                                        <option value="Perempuan">Perempuan</option>
                                                    </select>
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="html5-input" class="col-md-5 col-form-label">Golongan
                                                        Darah</label>
                                                    <select name="gol_darah" class="form-select"
                                                        id="exampleFormControlSelect1" aria-label="Default select example"
                                                        required>
                                                        <option value="{{ $item->gol_darah }}" selected>
                                                            {{ $item->gol_darah }}
                                                        </option>
                                                        <option value="A">A</option>
                                                        <option value="B">B</option>
                                                        <option value="O">O</option>
                                                        <option value="AB">AB</option>
                                                    </select>
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="html5-input"
                                                        class="col-md-5 col-form-label">Pendidikan</label>
                                                    <div class="input-group input-group-merge">
                                                        <span id="basic-icon-default-study"
                                                            class="input-group-text"></span>
                                                        <input type="text" name="pendidikan"
                                                            value="{{ $item->pendidikan }}" id="basic-icon-default-study"
                                                            class="form-control"
                                                            aria-describedby="basic-icon-default-study" required />
                                                    </div>
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="html5-input"
                                                        class="col-md-5 col-form-label">Pekerjaan</label>
                                                    <div class="input-group input-group-merge">
                                                        <span id="basic-icon-default-jobs"
                                                            class="input-group-text"></span>
                                                        <input type="text" name="pekerjaan"
                                                            value="{{ $item->pekerjaan }}" id="basic-icon-default-jobs"
                                                            class="form-control"
                                                            aria-describedby="basic-icon-default-jobs" required />
                                                    </div>
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="html5-input" class="col-md-5 col-form-label">Status
                                                        Hubungan Keluarga</label>
                                                    <select class="form-select" name="status_hub_keluarga"
                                                        id="exampleFormControlSelect1" aria-label="Default select example"
                                                        required>
                                                        <option value="{{ $item->status_hub_keluarga }}" selected>
                                                            {{ $item->status_hub_keluarga }}
                                                        </option>tg
                                                        <option value="istri">Istri</option>
                                                        <option value="anak">Anak</option>
                                                    </select>
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="html5-input" class="col-md-5 col-form-label">Status
                                                        Perkawinan</label>
                                                    <select name="status_perkawinan" class="form-select"
                                                        id="exampleFormControlSelect1" aria-label="Default select example"
                                                        required>
                                                        <option value="{{ $item->status_perkawinan }}" selected>
                                                            {{ $item->status_perkawinan }}
                                                        </option>
                                                        <option value="kawin">Kawin Tercatat</option>
                                                        <option value="belumKawin">Belum Kawin</option>
                                                    </select>
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="html5-input" class="col-md-5 col-form-label">Tgl
                                                        Perkawinan (Optional)</label>
                                                    <div class="col-md-12">
                                                        <input class="form-control" name="tgl_perkawinan"
                                                            value="{{ $item->tgl_perkawinan }}" type="date"
                                                            id="html5-tgl-input" />
                                                    </div>
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="html5-input"
                                                        class="col-md-5 col-form-label">Kewarganegaraan</label>
                                                    <div class="input-group input-group-merge">
                                                        <span id="basic-icon-default-kewarganegaraan"
                                                            class="input-group-text"></span>
                                                        <input type="text" name="kewarganegaraan"
                                                            id="basic-icon-default-kewarganegaraan" class="form-control"
                                                            value="{{ $item->kewarganegaraan }}"
                                                            aria-describedby="basic-icon-default-kewarganegaraan"
                                                            required />
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Send</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
    <!--/ Basic Bootstrap Table -->


    {{-- MODAL ADD  --}}
    <div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalCenterTitle">Tambah Anak</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('kk.anak.store', ['id' => $id]) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label" for="basic-icon-default-nik">NIK <span class="ml-1 text-danger">*</span></label>
                                <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-nik2" class="input-group-text"></span>
                                    <input type="number" name="nik" class="form-control"
                                        id="basic-icon-default-nik" aria-describedby="basic-icon-default-nik2" max="9999999999999999" required />
                                </div>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label" for="basic-icon-default-name">Nama Lengkap <span class="ml-1 text-danger">*</span></label>
                                <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-name2" class="input-group-text"></span>
                                    <input type="text" name="nama" id="basic-icon-default-name"
                                        class="form-control" aria-describedby="basic-icon-default-name2" required />
                                </div>
                            </div>
                            <div class="mb-3 col-md-6">
                              <div class="row">
                                <div class="col-md-6">
                                  <label for="ttl" class="form-label">Tempat Lahir <span class="ml-1 text-danger">*</span></label>
                                  <input type="text" class="form-control" id="ttl" name="tempat_lahir"/>
                                </div>
                                <div class="col-md-6">
                                  <label for="ttl" class="form-label">Tanggal Lahir <span class="ml-1 text-danger">*</span></label>
                                  <input type="date" class="form-control" id="ttl" name="tanggal_lahir"/>
                                </div>
                              </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label" for="basic-icon-default-religion">Agama <span class="ml-1 text-danger">*</span></label>
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text"></span>
                                    <select name="agama" class="form-control" id="" required>
                                        <option value="Islam">Islam</option>
                                        <option value="Kristen">Kristen</option>
                                        <option value="Budha">Budha</option>
                                        <option value="Hindu">Hindu</option>
                                        <option value="Konghucu">Konghucu</option>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label" for="basic-icon-default-status">Jenis Kelamin <span class="ml-1 text-danger">*</span> </label>
                                <select name="jenis_kelamin" class="form-select" id="exampleFormControlSelect1"
                                    aria-label="Default select example" required>
                                    <option value="Laki-Laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="html5-input" class="col-md-5 col-form-label">Golongan Darah <span class="ml-1 text-danger">*</span></label>
                                <select name="gol_darah" class="form-select" id="exampleFormControlSelect1"
                                    aria-label="Default select example" required>
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="O">O</option>
                                    <option value="AB">AB</option>
                                </select>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="html5-input" class="col-md-5 col-form-label">Pendidikan <span class="ml-1 text-danger">*</span></label>
                                <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-study" class="input-group-text"></span>
                                    <input type="text" name="pendidikan" id="basic-icon-default-study"
                                        class="form-control" aria-describedby="basic-icon-default-study" required />
                                </div>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="html5-input" class="col-md-5 col-form-label">Pekerjaan <span class="ml-1 text-danger">*</span></label>
                                <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-jobs" class="input-group-text"></span>
                                    <input type="text" name="pekerjaan" id="basic-icon-default-jobs"
                                        class="form-control" aria-describedby="basic-icon-default-jobs" required />
                                </div>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="html5-input" class="col-md-5 col-form-label">Hubungan Keluarga <span class="ml-1 text-danger">*</span></label>
                                <select class="form-select" name="status_hub_keluarga" id="exampleFormControlSelect1"
                                    aria-label="Default select example" required>
                                    <option value="istri">Istri</option>
                                    <option value="anak">Anak</option>
                                </select>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="html5-input" class="col-md-5 col-form-label">Status Perkawinan <span class="ml-1 text-danger">*</span></label>
                                <select name="status_perkawinan" class="form-select" id="exampleFormControlSelect1"
                                    aria-label="Default select example" required>
                                    <option value="kawin">Kawin Tercatat</option>
                                    <option value="belumKawin">Belum Kawin</option>
                                </select>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="html5-input" class="col-md-6 col-form-label">Tgl Perkawinan (Optional)</label>
                                <div class="col-md-12">
                                    <input class="form-control" type="date" name="tgl_perkawinan"
                                        id="html5-date-input" />
                                </div>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="html5-input" class="col-md-5 col-form-label">Kewarganegaraan <span class="ml-1 text-danger">*</span></label>
                                <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-kewarganegaraan" class="input-group-text"></span>
                                    <input type="text" name="kewarganegaraan" id="basic-icon-default-kewarganegaraan"
                                        class="form-control" aria-describedby="basic-icon-default-kewarganegaraan"
                                        required />
                                </div>
                            </div>
                            <small class="mb-3 col-md-6">note : untuk (*) wajib diisi</small>
                        </div>
                        <button type="submit" class="btn btn-primary">Send</button>
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                    
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('js')
    <script>
        function destroy(id) {
            swal({
                    title: "Are you sure?",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                            type: 'POST',
                            url: "{{ route('kk.anak.destroy') }}",
                            dataType: 'html',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            data: {
                                "id": id,
                                "_token": "{{ csrf_token() }}"
                            },

              success: function(data) {                 
                  swal("Good job!", "Data Berhasil di hapus!!", "success");
                  location.reload();    
              },
              error: function(data) {
                  console.log(data);
              }
           });
            } 
          });
        }
    </script>
@endsection
