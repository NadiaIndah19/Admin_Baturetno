@extends('layouts/contentNavbarLayout')

@section('title')

@section('content')
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Pengaduan /</span> Data Pengaduan
    </h4>

    <div class="card">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h5>Daftar Pengaduan Kelurahan</h5>
            <a href="{{ route('pengaduan.create') }}" type="button" class="btn btn-outline-primary">+&nbsp; Tambah Data</a>
        </div>
        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>NIK</th>
                        <th>Nama</th>
                        <th>Judul Pengaduan</th>
                        <th>Jenis Pengaduan</th>
                        <th>File Lampiran</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    <?php
                    $no = 1;
                    ?>
                    @foreach ($pengaduan as $item)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $item->nik }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->judul_pengaduan }}</td>
                            <td>{{ ucfirst($item->jenis_pengaduan) }}</td>
                            <td>
                                <button class="btn btn-outline-primary btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#lampiran{{ $item->id }}"> <i
                                        class='bx bx-image-alt text-primary'></i>Cek File</button>
                            </td>
                            <td>
                                <a href="{{ route('pengaduan.view', ['id' => $item->id]) }}"
                                    class="btn btn-outline-success btn-sm btn-rounded"><i class='bx bx-show'></i></a>
                                <a href="{{ route('pengaduan.edit', ['id' => $item->id]) }}"
                                    class="btn btn-outline-info btn-sm btn-rounded"><i
                                        class='bx bx-message-square-edit'></i></a>
                                <button onclick="destroy({{ $item->id }})" class="btn btn-outline-danger btn-sm"><i
                                        class='bx bx-trash-alt'></i></button>
                            </td>
                        </tr>


                        {{-- ================== MODAL LAMPIRAN ======================================= --}}
                        <div class="modal fade" id="lampiran{{ $item->id }}" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">File Pengaduan</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <iframe src="{{ asset('storage/' . $item->lampiran) }}" width="100%"
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
                            url: "{{ route('pengaduan.destroy') }}",
                            dataType: 'html',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            data: {
                                "id": id,
                                "_token": "{{ csrf_token() }}"
                            },

                            success: function(data) {
                                swal("Good job!", "Data Berhasil Dihapus!!", "success");
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
