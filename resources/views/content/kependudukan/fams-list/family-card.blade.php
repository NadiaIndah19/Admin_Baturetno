@extends('layouts/contentNavbarLayout')

@section('title')

@section('content')
<h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light">Kependudukan /</span> Kartu Keluarga
</h4>

<!-- card Table -->
<div class="card">
  <div class="card-header d-flex align-items-center justify-content-between">
    <h5>Daftar KK Terlampir</h5>
    <a href="{{ url('kependudukan/fams-list/create-kk') }}" type="button" class="btn btn-outline-primary">+&nbsp; Tambah Data</a>
  </div>
  <div class="table-responsive text-nowrap">
    <table class="table">
      <thead>
        <tr>
          <th>ID</th>
          <th>NIK</th>
          <th>Nama Kepala Keluarga</th>
          {{-- <th>TTL</th> --}}
          <th>Jenis Kelamin</th>
          <th>Agama</th>
          <th>Nama Ayah</th>
          <th>Nama Ibu</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
        @php
        $no=1;
        @endphp
        @foreach ($kk as $item)
        <tr>
          <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{$no++}}</strong></td>
          <td>{{$item->nik}}</td>
          <td>{{$item->nama}}</td>
          {{-- <td>{{$item->ttl}}</td> --}}
          <td>{{$item->jenis_kelamin}}</td>
          <td>{{$item->agama}}</td>
          <td>{{$item->nama_ayah}}</td>
          <td>{{$item->nama_ibu}}</td>
          <td>
            <a href="{{ route('kk.anak', ['id'=>$item->id]) }}" class="btn btn-primary btn-sm">+&nbsp;Tambah Anggota Kel</a>
            <a href="{{ route('kk.view', ['id'=>$item->id]) }}" class="btn btn-outline-info btn-sm"><i
              class='bx bx-show'></i></a>
            <a href="{{ route('kk.edit', ['id'=>$item->id]) }}" class="btn btn-outline-info btn-sm btn-rounded"><i class='bx bx-message-square-edit'></i></a>
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
              url: "{{ route('kk.destroy') }}",
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