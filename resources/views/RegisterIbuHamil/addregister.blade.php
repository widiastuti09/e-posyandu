<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('Template.style');
    <title>Document</title>
</head>

<body>
    @include('Template.navbar');
    @include('Template.sidebar');
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="">
                        <h1>Data Registrasi Ibu Hamil</h1>
                    </div>

                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- SELECT2 EXAMPLE -->
                <div class="card card-default">
                    <div class="card-header bg-primary">
                        <h3 class="card-title">Form Tambah Data</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>

                        </div>
                    </div>
                    <!-- /.card-header -->
                    <form action="{{ route('simpan-registeribuhamil') }}" method="post">
                        {{ csrf_field() }}
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Punya Akun</label>
                                        <div class="d-flex gap-5 align-items-center mb-2">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="punya_akun"
                                                    id="terdaftar" value="punya">
                                                <label class="form-check-label" for="terdaftar">
                                                    Ya
                                                </label>
                                            </div>
                                            <div class="form-check ml-3">
                                                <input class="form-check-input" type="radio" name="punya_akun"
                                                    id="tidak-terdaftar" value="tidak_punya">
                                                <label class="form-check-label" for="tidak-terdaftar">
                                                    Tidak
                                                </label>
                                            </div>
                                        </div>

                                        <div id="akun-container"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Tanggal Register</label>
                                        <input type="date" class="form-control @error('tglregister') is-invalid @enderror" autofocus id="tglregister"
                                            name="tglregister" value="{{ old('tglregister') }}">
                                        @error('tglregister')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Nama Ibu Hamil</label>
                                        <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                            autofocus id="nama" name="nama" placeholder="Masukkan Nama"
                                            value="{{ old('nama') }}">
                                        @error('nama')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Tanggal Lahir </label>
                                        <input type="date" class="form-control @error('tgllahir') is-invalid @enderror"
                                            autofocus id="tglllahir" name="tgllahir" value="{{ old('tgllahir') }}">
                                        @error('tgllahir')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Nama Suami</label>
                                        <input type="text" class="form-control @error('namasuami') is-invalid @enderror"
                                            autofocus id="namasuami" name="namasuami" placeholder="Masukkan Nama"
                                            value="{{ old('namasuami') }}">
                                        @error('namasuami')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror

                                    </div>
                                    <div class="form-group">
                                        <label>Usia (Tahun)</label>
                                        <input type="number" class="form-control @error('usia') is-invalid @enderror"
                                            autofocus id="usia" name="usia" placeholder="Masukkan Usia"
                                            value="{{ old('usia') }}">
                                        @error('usia')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <!-- /.col -->
                                <div class="col-md-6 ">
                                    
                                    <div class="form-group">
                                        <label>Gol Darah</label>
                                        <select class="form-control select2 @error('goldarah') is-invalid @enderror"
                                            autofocus name="goldarah" style="width: 100%;">
                                            <option value="">Pilih Golongan Darah</option>
                                            <option @if (old('goldarah') === 'A') selected @endif>A</option>
                                            <option @if (old('goldarah') === 'B') selected @endif>B</option>
                                            <option @if (old('goldarah') === 'AB') selected @endif>AB</option>
                                            <option @if (old('goldarah') === 'O') selected @endif>O</option>
                                        </select>
                                        @error('goldarah')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    
                                    <div class="form-group">
                                        <label>RT</label>
                                        <input type="number" class="form-control @error('rt') is-invalid @enderror"
                                            autofocus id="rt" name="rt" placeholder="Masukkan RT"
                                            value="{{ old('rt') }}">
                                        @error('rt')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>RW</label>
                                        <input type="number" class="form-control @error('rw') is-invalid @enderror"
                                            autofocus id="rw" name="rw" placeholder="Masukkan RW"
                                            value="{{ old('rw') }}">
                                        @error('rw')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    
                                    <div class="form-group">
                                        <label>No Telp</label>
                                        <input type="number" class="form-control @error('telp') is-invalid @enderror"
                                            autofocus id="telp" name="telp" placeholder="Masukkan Nomor Telp"
                                            value="{{ old('telp') }}">
                                        @error('telp')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <!-- /.form-group -->
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->


                            <div class="row">

                                <!-- /.col -->
                                <div class="col-12 col-sm-6">
                                    <button type="submit" class="btn btn-success"><i class="fas fa-plus-square"> Tambah
                                            Data</i></button>
                                    <a href="{{ route('register') }}" class="btn btn-info"><i
                                            class="fas fa-arrow-circle-left"> Kembali</i></a>
                                    <!-- /.form-group -->
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->
                        </div>
                    </form>

                </div>
                <!-- /.card -->
                <br><br><br><br><br><br><br><br>



                @include('Template.footer');
            </div>
        </section>
    </div>
    @include('Template.script');
    <script>
      $(document).ready(function() {
          $("input[name*='punya_akun']").click(function() {
              let html = ''
              if ($(this).val() === 'punya') {
                  $('#akun-container').html(`
                    <input type="hidden" value="punya" name="punya"/>
                    <select class="form-control select2"
                      autofocus name="user_id" style="width: 100%;">
                      <option value="">Pilih Akun</option>
                      @forelse($users as $user)
                        <option @if (old('user_id') === $user->name) selected @endif value="{!! $user->id !!}">{!! $user->name !!}</option>
                      @empty
                        <option disabled>Tidak ada data</option>
                      @endforelse
                    </select>
                  `)
              }else{
                $('#akun-container').html(``)
              }
          })
      })
  </script>


</body>

</html>
