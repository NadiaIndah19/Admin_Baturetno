@extends('layouts/contentNavbarLayout')

@section('title')

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/masonry/masonry.js')}}"></script>
@endsection

@section('content')
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Informasi /</span> Berita</h4>

<!-- Content types -->
<div class="row mb-5">
  <div class="col-md-6 col-lg-4">
    <h6 class="mt-2 text-muted">Anda ingin menuliskan berita baru?</h6>
    <div class="card mb-4">
      <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Tambah Info Berita</h5>
      </div>
      <div class="card-body">
        <form action="{{ route('informasi.store') }}" method="POST" enctype="multipart/form-data"> 
          @csrf
          <div class="mb-1">
            <label class="form-label" for="basic-icon-default-name">Nama</label>
            <div class="input-group input-group-merge">
              <span id="basic-icon-default-name2" class="input-group-text"></span>
              <input type="text" name="nama" id="basic-icon-default-name" class="form-control" aria-describedby="basic-icon-default-name2" required/>
            </div>
          </div>
          <div class="mb-1">
            <label class="form-label" for="basic-icon-default-judulberita">Judul Berita</label>
            <div class="input-group input-group-merge">
              <span id="basic-icon-default-judulberita2" class="input-group-text"></span>
              <input type="text" name="judul_berita" class="form-control" id="basic-icon-default-judulberita" aria-describedby="basic-icon-default-fullname2" required/>
            </div>
          </div>

          <div class="mb-1">
            <label class="form-label" for="basic-icon-default-jenis">Jenis Berita</label>
            <select class="form-select" name="jenis_berita" id="exampleFormControlSelect1" aria-label="Default select example" required>
              <option selected>Pilih Jenis</option>
              <option value="teknologi">Teknologi</option>
              <option value="pendidikan">Pendidikan</option>
              <option value="kesehatan">Kesehatan</option>
              <option value="sosial">Sosial</option>
              <option value="lainya">Lainnya</option>
            </select>
          </div>

          <div class="mb-1">
            <label for="html5-tgl-input" class="col-form-label">Tanggal Kejadian</label>
            <div class="col-md-12">
              <input class="form-control" name="tanggal_berita" type="date" value="2021-06-18" id="html5-date-input" required/>
            </div>
          </div>

          <div class="mb-1">
            <label class="form-label" for="basic-icon-default-places">Tempat Kejadian</label>
            <div class="input-group input-group-merge">
              <span class="input-group-text"></span>
              <input type="text" name="tempat_kejadian" id="basic-icon-default-places" class="form-control" aria-describedby="basic-icon-default-kronologi2" required />
            </div>
          </div>

          <div class="mb-3">
            <label class="form-label" for="basic-icon-default-description">Kronologi Kejadian</label>
            <div class="input-group input-group-merge">
              <span class="input-group-text"></span>
              <input type="text" name="kronologi" id="basic-icon-default-description" class="form-control" aria-describedby="basic-icon-default-kronologi2" required/>
            </div>
          </div>

          <div class="mb-3">
            <label class="form-label" for="basic-icon-default-description">Foto</label>
            <div class="input-group input-group-merge">
              <span class="input-group-text"></span>
              <input type="file" name="image" id="basic-icon-default-description" class="form-control" aria-describedby="basic-icon-default-kronologi2" required  />
            </div>
          </div>

          <button type="submit" class="btn btn-primary">Send</button>
        </form>
      </div>
    </div>
  </div>

  @foreach ($newsLast as $item)
    <div class="col-md-6 col-lg-4">
      <div class="card h-100">
        <img class="card-img-top" src="{{ asset('storage/' .  $item->image) }}" alt="Card image cap" />
        <div class="card-body">
          <h5 class="card-title">{{$item->judul_berita}}</h5>
          <p class="card-text">
            {{$item->kronologi}}
          </p>
          <button onclick="destroy({{$item->id}})" class="btn btn-outline-danger">Hapus Berita</button>
        </div>
      </div>
    </div>
  @endforeach
</div>

<div class="row mb-5">
  <div class="col-md-2 col-8 mb-3 mb-md-0">
    <div class="list-group">
      <a class="list-group-item list-group-item-action active" id="list-teknologi-list" data-bs-toggle="list" href="#list-teknologi">Teknologi</a>
      <a class="list-group-item list-group-item-action" id="list-pendidikan-list" data-bs-toggle="list" href="#list-pendidikan">Pendidikan</a>
      <a class="list-group-item list-group-item-action" id="list-kesehatan-list" data-bs-toggle="list" href="#list-kesehatan">Kesehatan</a>
      <a class="list-group-item list-group-item-action" id="list-sosial-list" data-bs-toggle="list" href="#list-sosial">Sosial</a>
      <a class="list-group-item list-group-item-action" id="list-lainya-list" data-bs-toggle="list" href="#list-lainya">Lainnya</a>
    </div>
  </div>
  <div class="col-md-10 col-12">
    <div class="tab-content p-0">
      <div class="tab-pane fade show active" id="list-teknologi">
        <div class="row">
        @foreach ($teknologi as $item)        
          <div class="col-md-4">
            <div class="card mb-3">
              <img class="card-img-top" src="{{asset('storage/' . $item->image)}}" alt="Card image cap" />
              <div class="card-body">
                <h5 class="card-title">
                  {{$item->judul_berita}}
              </h5>
                <p class="card-text">{{$item->kronologi}}</p>
                <button onclick="destroy({{$item->id}})" class="btn btn-outline-danger">Hapus Berita</button>
              </div>
            </div>
          </div>               
        @endforeach
      </div>
      </div>

      {{-- pendidikan --}}
      <div class="tab-pane fade show active" id="list-pendidikan">
        @foreach ($pendidikan as $item)
        <div class="row">
          <div class="col-md-4">
            <div class="card mb-3">
              <img class="card-img-top" src="{{asset('storage/' . $item->image)}}" alt="Card image cap" />
              <div class="card-body">
                <h5 class="card-title">
                  {{$item->judul_berita}}
              </h5>
                <p class="card-text">{{$item->kronologi}}</p>
                <button onclick="destroy({{$item->id}})" class="btn btn-outline-danger">Hapus Berita</button>
              </div>
            </div>
          </div>       
        </div>
        @endforeach
      </div>


      {{-- kesehatan --}}

      <div class="tab-pane fade show active" id="list-kesehatan">
        @foreach ($kesehatan as $item)
        <div class="row">
          <div class="col-md-4">
            <div class="card mb-3">
              <img class="card-img-top" src="{{asset('storage/' . $item->image)}}" alt="Card image cap" />
              <div class="card-body">
                <h5 class="card-title">
                  {{$item->judul_berita}}
                </h5>
                <p class="card-text">{{$item->kronologi}}</p>
                <button onclick="destroy({{$item->id}})" class="btn btn-outline-danger">Hapus Berita</button>
              </div>
            </div>
          </div>       
        </div>
        @endforeach
      </div>

      {{-- sosial --}}
      <div class="tab-pane fade show active" id="list-sosial">
        @foreach ($sosial as $item)
        <div class="row">
          <div class="col-md-4">
            <div class="card mb-3">
              <img class="card-img-top" src="{{asset('storage/' . $item->image)}}" alt="Card image cap" />
              <div class="card-body">
                <h5 class="card-title">
                  {{$item->judul_berita}}
              </h5>
                <p class="card-text">{{$item->kronologi}}</p>
                <button onclick="destroy({{$item->id}})" class="btn btn-outline-danger">Hapus Berita</button>
              </div>
            </div>
          </div>       
        </div>
        @endforeach
      </div>

      <div class="tab-pane fade show active" id="list-lainya">
        @foreach ($lainya as $item)
        <div class="row">
          <div class="col-md-4">
            <div class="card mb-3">
              <img class="card-img-top" src="{{asset('storage/' . $item->image)}}" alt="Card image cap" />
              <div class="card-body">
                <h5 class="card-title">
                  {{$item->judul_berita}}
              </h5>
                <p class="card-text">{{$item->kronologi}}</p>
                <button onclick="destroy({{$item->id}})" class="btn btn-outline-danger">Hapus Berita</button>
              </div>
            </div>
          </div>       
        </div>
        @endforeach
      </div>
      {{-- @endforeach --}}
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
              url: "{{ route('informasi.destroy') }}",
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