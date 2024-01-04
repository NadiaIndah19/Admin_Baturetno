@extends('layouts/contentNavbarLayout')

@section('title')

@section('content')
<h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light">Kependudukan /</span> Kartu Tanda Penduduk
</h4>

<!-- ktp form -->
<div class="card">
  <div class="card-header d-flex align-items-center justify-content-between">
    <h5>Pendaftaran KTP</h5>
    <a href="{{ url('kependudukan/id-card/create-id-card') }}" type="button" class="btn btn-outline-primary">+&nbsp; Tambah Data</a>
  </div>
  <div class="table-responsive text-nowrap">
    <table class="table">
      <thead>
        <tr>
          <th>ID</th>
          <th>NIK</th>
          <th>Nama</th>
          <th>TTL</th>
          <th>Jenis Kelamin</th>
          <th>Gol. Darah</th>
          <th>Alamat</th>
          <th>Agama</th>
          <th>Status Perkawinan</th>
          <th>Pekerjaan</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
        @php
            $no=1;
        @endphp
        @foreach ($ktp as $item)
        <tr>
          <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{$no++}}</strong></td>
          <td>{{$item->nik}}</td>
          <td>{{$item->nama}}</td>
          <td>{{ucfirst($item->kota_kelahiran)}}, {{\Carbon\Carbon::parse($item->tanggal_lahir)->format('m F Y')}}</td>
          <td>{{$item->jenis_kelamin}}</td>
          <td>{{$item->gol_darah}}</td>
          <td>{{$item->alamat}}</td>
          <td>{{$item->agama}}</td>
          <td>{{$item->status_perkawinan}}</td>
          <td>{{$item->pekerjaan}}</td>
          <td>
            <a href="{{ route('ktp.view', ['id'=>$item->id]) }}" class="btn btn-outline-info btn-sm"><i
              class='bx bx-show'></i></a>
            <a href="{{ route('ktp.edit', ['id'=>$item->id]) }}" class="btn btn-outline-info btn-sm btn-rounded"><i class='bx bx-message-square-edit'></i></a>
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
              url: "{{ route('ktp.destroy') }}",
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