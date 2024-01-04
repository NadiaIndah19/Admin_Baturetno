@extends('layouts/contentNavbarLayout')

@section('title')

@section('content')
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Pelayanan / </span> Kartu Indonesia Pintar
    </h4>

    <div class="row">
        <div class="col-md-12">
            {{-- <ul class="nav nav-pills flex-column flex-md-row mb-3">
                <li class="nav-item"><a class="nav-link" href="{{ url('pelayanan/kks/kks-card') }}"><i class="bx bx-user me-1"></i> KKS</a></li>
                <li class="nav-item"><a class="nav-link" href="{{url('pelayanan/kis/kis-card')}}"><i class="bx bx-bell me-1"></i> KIS</a></li>
                <li class="nav-item"><a class="nav-link active" href="javascript:void(0);"><i class="bx bx-link-alt me-1"></i> KIP</a></li>
            </ul> --}}
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5>Daftar Kartu Indonesia Pintar</h5>
                    <a href="{{ route('kip.create') }}" type="button" class="btn btn-outline-primary">+&nbsp; Tambah
                        Data</a>
                </div>
                <div class="table-responsive text-nowrap">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>Nama Lengkap</th>
                                <th>Tempat Tanggal Lahir</th>
                                <th>Alamat</th>
                                <th>Asal Sekolah</th>
                                <th>File KK</th>
                                <th>File AKTA</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            <?php
                            $no = 1;
                            ?>
                            @foreach ($kip as $item)
                                <tr>
                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                                        <strong>{{ $no++ }}</strong>
                                    </td>
                                    <td>{{ $item->nama }}</td>
                                    <td>{{ $item->tempat_lahir . ',' . \Carbon\Carbon::parse($item->tanggal_lahir)->format('d-F-Y') }}
                                    </td>
                                    <td>{{ $item->alamat }}</td>
                                    <td>{{ $item->asal_sekolah }}</td>
                                    <td>
                                        <button class="btn btn-outline-primary btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#kk{{ $item->id }}"> <i
                                                class='bx bx-image-alt text-primary'></i>Cek File</button>
                                    </td>
                                    <td>
                                        <button class="btn btn-outline-primary btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#akta{{ $item->id }}"> <i
                                                class='bx bx-image-alt text-primary'></i>Cek File</button>
                                    </td>
                                    <td>
                                        <a href="{{ route('kip.view', ['id' => $item->id]) }}"
                                            class="btn btn-outline-info btn-sm"><i class='bx bx-show'></i></a>
                                        <a href="{{ route('kip.edit', ['id' => $item->id]) }}"
                                            class="btn btn-outline-info btn-sm btn-rounded"><i
                                                class='bx bx-message-square-edit'></i></a>
                                        <button onclick="destroy({{ $item->id }})"
                                            class="btn btn-outline-danger btn-sm"><i class='bx bx-trash-alt'></i></button>
                                    </td>
                                </tr>



                                {{-- ================== MODAL KK ======================================= --}}
                                <div class="modal fade" id="kk{{ $item->id }}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">File KK</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <iframe src="{{ asset('storage/' . $item->file_kk) }}" width="100%"
                                                    height="400px"></iframe>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-primary"
                                                    data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- ================== MODAL Akta ======================================= --}}
                                <div class="modal fade" id="akta{{ $item->id }}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">File Akta</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <iframe src="{{ asset('storage/' . $item->file_akta) }}" width="100%"
                                                    height="400px"></iframe>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-primary"
                                                    data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </tbody>
                    </table>
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
                            url: "{{ route('kip.destroy') }}",
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
