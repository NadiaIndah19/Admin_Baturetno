@extends('layouts/contentNavbarLayout')

@section('title')

@section('content')
<h4 class="fw-bold py-3 mb-4">
  Pengelola Pengguna
</h4>

<!-- card Table -->
<div class="card">
  <div class="card-header d-flex align-items-center justify-content-between">
    <h5>User Account</h5>
    <a href="{{ url('users/add-user') }}" type="button" class="btn btn-outline-primary">+&nbsp; Tambah Data</a>
  </div>
  <div class="table-responsive text-nowrap">
    <table class="table">
      <thead>
        <tr>
          <th>ID</th>
          <th>Nama</th>
          <th>NIK</th>
          <th>Email</th>
          {{-- <th>Role</th> --}}
          <th>Actions</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
        @php
            $no=1;
        @endphp
        @foreach ($user as $item)
          <tr>
            <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{$no++}}</strong></td>
            <td>{{ucfirst($item->name)}}</td>
            <td>{{$item->nik}}</td>
            <td>{{$item->email}}</td>
            {{-- <td>{{$item->roles ? $item->roles[0]['name'] : '-'}}</td> --}}
            <td>
                <a href="{{ route('user-management.edit', ['id'=>$item->id]) }}" class="btn btn-outline-info btn-sm btn-rounded"><i class='bx bx-message-square-edit'></i></a>
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
              url: "{{ route('user-management.destroy') }}",
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
