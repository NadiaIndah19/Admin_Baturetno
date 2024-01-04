@extends('layouts/contentNavbarLayout')

@section('title')

@section('content')
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Kependudukan/</span> AKTA Kelahiran
    </h4>

    <div class="row">
        <div class="col-md-12">
            <ul class="nav nav-pills flex-column flex-md-row mb-3">
                <li class="nav-item"><a class="nav-link" href="{{ url('kependudukan/death-list/death-card') }}"><i
                            class="bx bx-user me-1"></i> Kematian</a></li>
                <li class="nav-item"><a class="nav-link active" href="javascript:void(0);"><i class="bx bx-bell me-1"></i>
                        Kelahiran</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('kependudukan/marriage-list/marriage-card') }}"><i
                            class="bx bx-link-alt me-1"></i> Pernikahan</a></li>
            </ul>
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5>Daftar AKTA Kelahiran</h5>
                    <a href="{{ url('kependudukan/birth-list/create-birth-card') }}" type="button"
                        class="btn btn-outline-primary">+&nbsp; Tambah Data</a>
                </div>
                <div class="table-responsive text-nowrap">
                    <table class="table table-borderless">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama Kepala Keluarga</th>
                                <th>Nomor KK</th>
                                <th>Nama Lengkap Anak</th>
                                <th>Tempat Kelahiran</th>
                                <th>Hari & Tanggal Lahir</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            ?>
                            @foreach ($aktakelahiran as $item)
                                <tr>
                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                                        <strong>{{ $no++ }}</strong>
                                    </td>
                                    <td>{{ ucfirst($item->nama_kepala_keluarga) }}</td>
                                    <td>{{ $item->nomor_kk }}</td>
                                    <td>{{ $item->nama_lengkap_anak }}</td>
                                    <td>{{ $item->tempat_lahir_anak }}</td>
                                    <td>{{ \Carbon\Carbon::parse($item->tanggal_lahir_anak)->format('d F Y') }}</td>
                                    <td>
                                        <a href="{{ route('aktakelahiran.view', ['id' => $item->id]) }}"
                                            class="btn btn-outline-info btn-sm"><i class='bx bx-show'></i></a>
                                        <a class="btn btn-outline-primary btn-sm"
                                            href="{{ route('aktakelahiran.edit', ['id' => $item->id]) }}"><i
                                                class="bx bx-edit-alt me-1"></i></a>
                                        <a href="#" class="btn btn-outline-danger btn-sm"
                                            onclick="destroy({{ $item->id }})"><i class="bx bx-trash me-1"></i>
                                        </a>
                                    </td>
                                </tr>
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
                            url: "{{ route('aktakelahiran.destroy') }}",
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
