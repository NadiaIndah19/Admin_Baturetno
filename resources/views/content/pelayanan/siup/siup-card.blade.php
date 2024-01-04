@extends('layouts/contentNavbarLayout')

@section('title')

@section('content')
<h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light">Pelayanan /</span> SIUP 
</h4>

<!-- Basic Bootstrap Table -->
<div class="card">
  <div class="card-header d-flex align-items-center justify-content-between">
    <h5>Surat Izin Usaha Perdagangan</h5>
    <a href="{{ route('siup.create') }}" type="button" class="btn btn-outline-primary">+&nbsp; Tambah Data</a>
  </div>
  <div class="table-responsive text-nowrap">
    <table class="table">
      <thead>
        <tr>
          <th>ID</th>
          <th>Nama Lengkap</th>
          <th>Alamat Lengkap</th>
          <th>No HP</th>
          <th>Jenis Usaha</th>
          <th>Alamat Usaha</th>
          <th>Tgl Status</th>
          <th>Status</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
        @php
            $no=1;
        @endphp
        @foreach ($siup as $item)
        <tr>
          <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{$no++}}</strong></td>
          <td>{{$item->nama}}</td>
          <td>{{$item->alamat}}</td>
          <td>{{$item->no_hp}}</td>
          <td>{{$item->jenis_usaha}}</td>
          <td>{{$item->alamat_usaha}}</td>
          <td>{{$item->status}}</td>
          <td>{{$item->tgl_status}}</td>
          <td>
            <a href="{{ route('siup.view', ['id' => $item->id]) }}" class="btn btn-outline-success btn-sm btn-rounded"><i class='bx bx-show'></i></a>
            <a href="{{ route('siup.edit', ['id' => $item->id]) }}" class="btn btn-outline-info btn-sm btn-rounded"><i class='bx bx-message-square-edit'></i></a>
            <button onclick="destroy({{$item->id}})"  class="btn btn-outline-danger btn-sm"><i class='bx bx-trash-alt'></i></button>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
<!--/ Basic Bootstrap Table -->

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
              url: "{{ route('siup.destroy') }}",
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