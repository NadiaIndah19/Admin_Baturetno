@extends('layouts/contentNavbarLayout')

@section('title')

@section('content')
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Pengelola Pengguna /</span> New Account User</h4>

    <!-- Basic Layout -->
    <div class="row">
        <div class="col-xl">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Create User</h5>
                    <small class="text-muted float-end">Masukkan data dengan benar</small>
                </div>
                <div class="card-body">
                    <form action="{{ route('user-management.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="mb-3">
                                <label class="form-label" for="basic-icon-default-fullname">Full Name</label>
                                <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                            class="bx bx-user"></i></span>
                                    <input type="text" name="name" class="form-control" id="basic-icon-default-fullname"
                                        aria-describedby="basic-icon-default-fullname2" required />
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-icon-default-nik">NIK</label>
                                <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-nik2" class="input-group-text"><i
                                            class="bx bxs-user-detail"></i></span>
                                    <input type="number" name="nik" id="basic-icon-default-nik" class="form-control"
                                        aria-describedby="basic-icon-default-nik2" max="9999999999999999" required />
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-icon-default-email">Email</label>
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text"><i class="bx bx-envelope"></i></span>
                                    <input type="text" name="email" id="basic-icon-default-email" class="form-control"
                                        aria-describedby="basic-icon-default-email2" required />
                                </div>
                                {{-- <div class="form-text"> You can use letters, numbers & periods </div> --}}
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
                            <small class="mb-3 col-md-6">note : untuk (*) wajib diisi</small>
                        </div>
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
