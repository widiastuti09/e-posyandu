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
                        <h1>Data Resti Ibu Hamil</h1>
                    </div>

                </div>
            </div><!-- /.container-fluid -->
        </section>
        <section class="content">
            <div class="container-fluid">
                <!-- SELECT2 EXAMPLE -->
                <div class="card card-default">
                    <div class="card-header bg-primary">
                        <h3 class="card-title">Form Tambah Data Resti Ibu Hamil</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>

                        </div>
                    </div>
                    <!-- /.card-header -->
                    <form action="{{route('simpanbumilresti')}}" method="post">
                        {{ csrf_field() }}
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Nama Ibu</label>
                                        <select
                                            class="form-control select-ibu-hamil @error('id_ibu') is-invalid @enderror"
                                            name="id_ibu" style="width: 100%;">
                                            <option value="">Pilih nama</option>
                                            @foreach ($ibuHamil as $hamil)
                                                <option  @if(old('id_ibu') == $hamil->id) selected @endif value="{{ $hamil->id }}">{{ $hamil->nama }}</option>
                                            @endforeach
                                        </select>
                                            @error('id_ibu')
                                                <div class="invalid-feedback">{{$message}}</div>
                                            @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">

                                    <div class="form-group">
                                        <label>Umur Hamil (MG)</label>
                                        <input type="text"
                                            class="form-control @error('umur_hamil') is-invalid @enderror" autofocus
                                            id="umur_hamil" placeholder="Masukkan Umur Kehamilan" name="umur_hamil"
                                            value="{{ old('umur_hamil') }}">
                                        @error('umur_hamil')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>G/P/A</label>
                                        <input type="text"
                                            class="form-control @error('gpa') is-invalid @enderror" autofocus
                                            id="gpa" name="gpa" placeholder="G/P/A"
                                            value="{{ old('gpa') }}">
                                        @error('gpa')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Asuransi</label>                   
                                        <select class="form-control select2 @error('asuransi') is-invalid @enderror"
                                            autofocus name="asuransi" style="width: 100%;">
                                            <option value="">Pilih Asuransi</option>
                                            <option @if (old('asuransi') === 'Umum') selected @endif>Umum</option>
                                            <option @if (old('asuransi') === 'BPJS') selected @endif>BPJS</option>

                                        </select>   
                                        @error('asuransi')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Resiko Tinggi</label>
                                        <input type="text" class="form-control @error('resiko_tinggi') is-invalid @enderror"
                                            autofocus id="resiko_tinggi" name="resiko_tinggi" placeholder="Masukkan Resiko"
                                            value="{{ old('resiko_tinggi') }}">
                                        @error('resiko_tinggi')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>HPL</label>
                                        <input type="date" class="form-control @error('hpl') is-invalid @enderror"
                                            autofocus id="hpl" name="hpl" placeholder="Masukkan HPL"
                                            value="{{ old('hpl') }}">
                                        @error('hpl')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Wali Bumil</label>
                                        <input type="text" class="form-control @error('wali_bumil') is-invalid @enderror"
                                            autofocus id="wali_bumil" name="wali_bumil" placeholder="Masukkan Wali Bumil"
                                            value="{{ old('wali_bumil') }}">
                                        @error('wali_bumil')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                               
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->

                            <div class="row">

                                <!-- /.col -->
                                <div class="col-12 col-sm-6">
                                    <button type="submit" class="btn btn-success"><i class="fas fa-plus-square"> Tambah
                                            Data</i></button>
                                    <a href="{{ route ('pemeriksaanibuhamil.index')}}" class="btn btn-info"><i
                                            class="fas fa-arrow-circle-left"> Kembali</i></a>
                                    <!-- /.form-group -->
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->
                        </div>
                    </form>



                </div>
                <br><br><br><br><br>

                @include('Template.footer')
            </div>
        </section>
    </div>

    @include('Template.script')

    <script>
        $(document).ready(function(){
            $('.select-ibu-hamil').select2({
                theme: 'bootstrap4'
            });
        })
    </script>

</body>

</html>
