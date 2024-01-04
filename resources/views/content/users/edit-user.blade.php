@extends('layouts/contentNavbarLayout')

@section('title')

@section('content')
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">User / </span>Edit Account User</h4>

<!-- Basic Layout -->
<div class="row">
  <div class="col-xl">
    <div class="card mb-4">
      <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Edit User</h5> <small class="text-muted float-end"></small>
      </div>
      <div class="card-body">
        <form action="{{ route('user-management.update', ['id'=>$user->id]) }}" method="POST">
          @csrf
          @method('PUT')
          <div class="mb-3">
            <label class="form-label" for="basic-default-fullname">Full Name</label>
            <input type="text"  name="name" class="form-control" id="basic-default-fullname" value="{{$user->name}}" />
          </div>
          <div class="mb-3">
            <label class="form-label" for="basic-default-nik">NIK</label>
            <input type="number" name="nik" class="form-control" id="basic-default-nik" value="{{$user->nik}}" max="9999999999999999"/>
          </div>
          <div class="mb-3">
            <label class="form-label" for="basic-default-email">Email</label>
            <div class="input-group input-group-merge">
              <input type="text" name="email" id="basic-default-email" class="form-control" value="{{$user->email}}" aria-describedby="basic-default-email2" />
            </div>
          </div>
          <div class="mb-3">
            <label class="form-label" for="basic-icon-default-password">Password</label>
            <div class="input-group input-group-merge">
                <span id="basic-icon-default-password2" class="input-group-text"><i
                        class="bx bx-key"></i></span>
                
                <input type="text" id="password" name="password" class="form-control password-mask" readonly/>
                <a type="button" class="btn btn-primary btn-sm" href="#" onclick="generate()">Generate</a>
            </div>
        </div>
          {{-- <div class="mb-3">
            <label class="form-label" for="basic-default-role">Role</label>
            <select name="roles" class="form-control" id="">
              @foreach ($roles as $item)
                    @if ($item->id == $user->roles[0]->id)
                        <option value="{{$item->id}}" selected>{{$item->name}}</option>
                    @else
                        <option value="{{$item->id}}">{{$item->name}}</option>
                    @endif
              @endforeach
            </select>
          </div> --}}
          <button type="submit" class="btn btn-primary">Send</button>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection


@section('js')
    <script>
        var pwd = $("#pwd")
        var button = $("button")
        var len = $('#Length')
        var A_Z = $('#A-Z')
        var a_z = $('#a-z')
        var num = $('#0-1')
        var sc = $('#SpecialChars')

        function generate() {
            console.log('1');
            var passwordList = ["password1", "password2", "password3"];
            $("#password").val(CreateRandomPassword( len.val() ,A_Z.is(":checked"),a_z.is(":checked"),num.is(":checked"),sc.val()))
        }

        function CreateRandomPassword(Length, isUpperAlpha, isLowerAlpha, isNumaric, SpecialChars) {
            var _allowedChars = "";
            if (isUpperAlpha != false)
                _allowedChars += "ABCDEFGHJKLMNOPQRSTUVWXYZ";
            if (isLowerAlpha != false)
                _allowedChars += "abcdefghijkmnopqrstuvwxyz";
            if (isNumaric != false)
                _allowedChars += "0123456789";
            _allowedChars += SpecialChars;
            if (!Length)
                Length = 8
            var chars = "";
            allowedCharCount = _allowedChars.length;
            if (allowedCharCount == 0)
                return " ";
            for (var i = 0; i < Length; i++) {
                chars += _allowedChars[Math.floor(Math.random() * Math.floor(allowedCharCount))];
            }
            return chars;
        }
    </script>
@endsection
