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
        <div class="col-md-12">
            <ul class="nav nav-pills flex-column flex-md-row mb-3">
                <li class="nav-item"><a class="nav-link active" href="javascript:void(0);"><i class="bx bx-user me-1"></i>
                        Kematian</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('kependudukan/birth-list/birth-card') }}"><i
                            class="bx bx-bell me-1"></i> Kelahiran</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('kependudukan/marriage-list/marriage-card') }}"><i
                            class="bx bx-link-alt me-1"></i> Pernikahan</a></li>
            </ul>
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5>Daftar AKTA Kematian</h5>
                    <a href="{{ route('aktakematian.create') }}" type="button" class="btn btn-outline-primary">+&nbsp;
                        Tambah Data</a>
                </div>
                <div class="table-responsive text-nowrap">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama Pendaftar</th>
                                <th>Hubungan</th>
                                <th>NIK Alm</th>
                                <th>Nama Alm</th>
                                <th>TTL Alm</th>
                                <th>Jenis Kelamin</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                          <?php
                          $no=1;
                          ?>
                            @foreach ($aktakematian as $item)
                                <tr>
                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{$no++}}</strong></td>
                                    <td>{{$item->nama_pendaftar}}</td>
                                    <td>{{$item->hubungan}}</td>
                                    <td>{{$item->nik_alm}}</td>
                                    <td>{{$item->nama}}</td>
                                    <td>{{$item->tempat_lahir}}, {{\Carbon\Carbon::parse($item->tanggal_lahir)->format('d F Y')}}</td>
                                    <td>{{$item->jenis_kelamin}}</td>
                                    <td>
                                        <a href="{{ route('aktakematian.view', ['id'=>$item->id]) }}" class="btn btn-outline-info btn-sm"><i
                                            class='bx bx-show'></i></a>
                                        <a href="{{ route('aktakematian.edit', ['id'=>$item->id]) }}" class="btn btn-outline-info btn-sm btn-rounded"><i
                                                class='bx bx-message-square-edit'></i></a>
                                        <button onclick="destroy({{$item->id}})" class="btn btn-outline-danger btn-sm"><i
                                                class='bx bx-trash-alt'></i></button>
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
              url: "{{ route('aktakematian.destroy') }}",
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