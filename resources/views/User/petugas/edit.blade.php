<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @include('Template.style')
</head>

<body>
    @include('Template.navbar')

    @include('Template.sidebar')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="">
                        <h1>Data Petugas</h1>
                    </div>

                </div>
            </div><!-- /.container-fluid -->
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="card card-default">
                    <div class="card-header bg-primary">
                        <h3 class="card-title">Form Edit Data Petugas</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>

                        </div>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('pengguna.update-petugas', $petugas->id) }}" method="POST">
                            @csrf
                            <input type="hidden" name="_method" value="PUT">
                            <div class="form-group">
                                <label for="name">Nama Petugas</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                    placeholder="Masukan nama Petugas" value="{{ $petugas->name }}">
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="email">Email Petugas</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" placeholder="Masukan email Petugas" value="{{ $petugas->email }}">
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="level">Jabatan Kader</label>
                                <select class="form-control select2 @error('level') is-invalid @enderror" name="level"
                                    id="level">
                                    <option value="">Pilih jabatan kader</option>
                                    <option value="kader1" @if($petugas->level === 'kader1') selected @endif>Kader Umum</option>
                                    <option value="kader2" @if($petugas->level === 'kader2') selected @endif>Kader Lansia</option>
                                </select>
                                @error('level')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <div class="input-group mb-3">
                                            <input type="password"
                                                class="form-control @error('password') is-invalid @enderror"
                                                name="password" placeholder="Masukan password Petugas" id="password">
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-secondary" type="button"
                                                    id="button-show-password">
                                                    <i class="fas fa-eye"></i>
                                                </button>
                                            </div>
                                        </div>
                                        @error('password')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="password">Konfirmasi Password</label>
                                        <div class="input-group mb-3">
                                            <input type="password"
                                                class="form-control @error('confirm_password') is-invalid @enderror"
                                                name="confirm_password" placeholder="Masukan password Petugas"
                                                id="confirm-password">
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-secondary" type="button"
                                                    id="button-show-confirm-password">
                                                    <i class="fas fa-eye"></i>
                                                </button>
                                            </div>
                                        </div>
                                        @error('confirm_password')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="form-control btn btn-primary" value="Simpan">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>




    </div>
    <br><br><br><br><br>

    @include('Template.footer')

    @include('Template.script')
    <script>
        $(document).ready(function() {
            var showPassword = true;
            var showConfirmPassword = true;
            $('#button-show-password').on('click', function() {
                if (showPassword) {
                    $('#password').prop('type', 'text');
                    $(this).children().removeClass('fa-eye');
                    $(this).children().addClass('fa-eye-slash');
                } else {
                    $('#password').prop('type', 'password');
                    $(this).children().removeClass('fa-eye-slash');
                    $(this).children().addClass('fa-eye');
                }
                showPassword = !showPassword
            });

            $('#button-show-confirm-password').on('click', function() {
                if (showConfirmPassword) {
                    $('#confirm-password').prop('type', 'text');
                    $(this).children().removeClass('fa-eye');
                    $(this).children().addClass('fa-eye-slash');
                } else {
                    $('#confirm-password').prop('type', 'password');
                    $(this).children().removeClass('fa-eye-slash');
                    $(this).children().addClass('fa-eye');
                }
                showConfirmPassword = !showConfirmPassword
            });
        })
    </script>



</body>

</html>
