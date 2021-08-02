<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Penimbangan</title>
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
                        <h1>Data Registrasi Balita</h1>
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
                    <form action="{{ route('simpan-registerbalita') }}" method="post">
                        {{ csrf_field() }}
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Punya Akun</label>
                                        <div class="d-flex gap-5 align-items-center mb-2">
                                            <div class="form-check">
                                                <input class="form-check-input  @error('punya_akun') is-invalid @enderror" type="radio" name="punya_akun"
                                                    id="terdaftar" value="punya">
                                                <label class="form-check-label" for="terdaftar">
                                                    Ya
                                                </label>
                                            </div>
                                            <div class="form-check ml-3">
                                                <input class="form-check-input  @error('punya_akun') is-invalid @enderror" type="radio" name="punya_akun"
                                                    id="tidak-terdaftar" value="tidak_punya">
                                                <label class="form-check-label" for="tidak-terdaftar">
                                                    Tidak
                                                </label>
                                            </div>
                                            @error('punya_akun')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div id="akun-container"></div>
                                    </div>
                                    <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nama Balita</label>
                                        <input type="text"
                                            class="form-control @error('namabalita') is-invalid @enderror" autofocus
                                            id="namabalita" name="namabalita" placeholder="Masukkan Nama"
                                            value="{{ old('namabalita') }}">
                                        @error('namabalita')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Tempat Lahir</label>
                                        <input type="text"
                                            class="form-control @error('tempatlahir') is-invalid @enderror" autofocus
                                            id="tempatlahir" name="tempatlahir" placeholder="Masukkan Nama"
                                            value="{{ old('tempatlahir') }}">
                                        @error('tempatlahir')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror

                                    </div>
                                    <div class="form-group">
                                        <label>Tanggal Lahir</label>
                                        <input type="date"
                                            class="form-control @error('tanggallahir') is-invalid @enderror" autofocus
                                            id="tanggallahir" name="tanggallahir" placeholder="Masukkan Nama"
                                            value="{{ old('tanggallahir') }}">
                                        @error('tanggallahir')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Jenis Kelamin</label>
                                        <select class="form-control select2 @error('jeniskelamin') is-invalid @enderror"
                                            autofocus name="jeniskelamin" style="width: 100%;">
                                            <option value="">Pilih Jenis Kelamin</option>
                                            <option @if (old('jeniskelamin') === 'Laki-laki') selected @endif>Laki-laki</option>
                                            <option @if (old('jeniskelamin') === 'Perempuan') selected @endif>Perempuan</option>
                                        </select>
                                        @error('jeniskelamin')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Nama Ayah</label>
                                        <input type="text" class="form-control @error('namaayah') is-invalid @enderror"
                                            autofocus id="namaayah" name="namaayah" placeholder="Masukkan Nama ayah"
                                            value="{{ old('namaayah') }}">
                                        @error('namaayah')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Nama Ibu</label>
                                        <div class="d-flex gap-5 align-items-center mb-2">
                                            <div class="form-check">
                                                <input class="form-check-input @error('namaibu') is-invalid @enderror" type="radio" name="pilih_ibu"
                                                    id="terdaftar" value="terdaftar">
                                                <label class="form-check-label" for="terdaftar">
                                                    Terdaftar
                                                </label>
                                            </div>
                                            <div class="form-check ml-3">
                                                <input class="form-check-input @error('namaibu') is-invalid @enderror" type="radio" name="pilih_ibu"
                                                    id="tidak-terdaftar" value="tidak_terdaftar">
                                                <label class="form-check-label" for="tidak-terdaftar">
                                                    Tidak Terdaftar
                                                </label>
                                            </div>
                                            @error('namaibu')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div id="ibu-container"></div>
                                       
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

                                    <!-- /.form-group -->
                                </div>
                                <!-- /.col -->
                                <div class="col-md-6 ">
                                    <!-- /.form-group -->
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
                                        <label>Usia (Tahun)</label>
                                        <input type="number" class="form-control @error('usia') is-invalid @enderror"
                                            autofocus id="usia" name="usia" placeholder="Masukkan Usia Anak"
                                            value="{{ old('usia') }}">
                                        @error('usia')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Berat Badan Lahir (Kg)</label>
                                        <input type="text" class="form-control @error('bblahir') is-invalid @enderror"
                                            autofocus id="bblahir" name="bblahir"
                                            placeholder="Masukkan Berat Badan Anak" value="{{ old('bblahir') }}">
                                        @error('bblahir')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Panjang Badan Lahir (Cm)</label>
                                        <input type="text" class="form-control @error('pblahir') is-invalid @enderror"
                                            autofocus id="pblahir" name="pblahir"
                                            placeholder="Masukkan Panjamg Badan Anak" value="{{ old('pblahir') }}">
                                        @error('pblahir')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>No KK Balita</label>
                                        <input type="number" class="form-control @error('nokk') is-invalid @enderror"
                                            autofocus id="nokk" name="nokk" placeholder="Masukkan Nomor KK"
                                            value="{{ old('nokk') }}">
                                        @error('nokk')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>No NIK Balita</label>
                                        <input type="number"
                                            class="form-control @error('nikbalita') is-invalid @enderror" autofocus
                                            id="nikbalita" name="nikbalita" placeholder="Masukkan Nomor NIK"
                                            value="{{ old('nikbalita') }}">
                                        @error('nikbalita')
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




                @include('Template.footer')
            </div>
        </section>
        @include('Template.script')
        <script>
            $(document).ready(function() {
                $("input[name*='pilih_ibu']").click(function() {
                    let html = ''
                    if ($(this).val() === 'terdaftar') {
                        $('#ibu-container').html(`
                          <input type="hidden" value="terdaftar" name="terdaftar"/>
                          <select class="form-control select2 @error('id_ibu') is-invalid @enderror"
                            autofocus name="id_ibu" style="width: 100%;">
                            <option value="">Pilih Ibu</option>
                            @forelse($ibuHamil as $bumil)
                              <option @if (old('id_ibu') === $bumil->nama) selected @endif value="{!! $bumil->id !!}">{!! $bumil->nama !!}</option>
                            @empty
                              <option disabled>Tidak ada data</option>
                            @endforelse
                          </select>
                        `)
                    }else{
                        $('#ibu-container').html(`
                          <input type="text" class="form-control @error('namaibu') is-invalid @enderror"
                            autofocus id="namaibu" name="namaibu" placeholder="Masukkan Nama Ibu"
                            value="{{ old('namaibu') }}">
                        `)
                    }
                })

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
                        $('#akun-container').html('')
                    }
                })
            })
        </script>
</body>

</html>
