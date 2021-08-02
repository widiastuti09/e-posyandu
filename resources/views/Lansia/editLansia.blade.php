<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Register Lansia</title>
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
            <h1>Data Registrasi Lansia</h1>
          </div>
          
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <section class="content">
      <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
          <div class="card-header bg-primary">
            <h3 class="card-title">Form Edit Data Lansia</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
             
            </div>
          </div>
          <!-- /.card-header -->
          <form action="{{route('update-lansia', $lansias->id)}}" method="post">
            {{ csrf_field() }}
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
              <div class="form-group">
                    <label for="">Tanggal Registrasi</label>
                    <input type="date" class="form-control select2 @error('tanggal_register') is-invalid @enderror" name="tanggal_register" id="tanggal_register" value="{{$lansias->tanggal_register}}"> 
                    @error('tanggal_register')
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Nama Lansia</label>
                    <input type="text" class="form-control select2 @error('nama') is-invalid @enderror" placeholder="Masukkan Nama" name="nama" id="nama" value="{{$lansias->nama}}">
                    @error('nama')
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Tanggal Lahir</label>
                    <input type="date" class="form-control select2 @error('tanggal_lahir') is-invalid @enderror" name="tanggal_lahir" id="tanggal_lahir" value="{{$lansias->tanggal_lahir}}">
                    @error('tanggal_lahir')
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Jenis Kelamin</label>
                    <select class="form-control select2 @error('jenis_kelamin') is-invalid @enderror" name="jenis_kelamin" id="jenis_kelamin" >
                        <option value="{{$lansias->jenis_kelamin}}">{{$lansias->jenis_kelamin}}</option>
                        <option disabled>Pilih Jenis Kelamin</option>
                        <option>Laki-laki</option>
                        <option>Perempuan</option>
                    </select>
                </div>
               
                
               
               
                
              </div>
              <!-- /.col -->
              <div class="col-md-6 ">
            
                <div class="form-group">
                    <label for="">RT</label>
                    <input type="text" class="form-control select2 @error('rt') is-invalid @enderror" placeholder="Masukkan RT" name="rt" id="rt" value="{{$lansias->rt}}">
                    @error('rt')
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">RW</label>
                    <input type="text" class="form-control select2 @error('rw') is-invalid @enderror" placeholder="Masukkan RW" name="rw" id="rw" value="{{$lansias->rw}}">
                    @error('rw')
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Alamat</label>
                    <input type="text" class="form-control select2 @error('alamat') is-invalid @enderror" placeholder="Masukkan Nama Jalan" name="alamat" id="alamat" value="{{$lansias->alamat}}">
                    @error('alamat')
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>

              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->

           
            <div class="row">
          
              <!-- /.col -->
              <div class="col-12 col-sm-6">
              <button type="submit" class="btn btn-success"><i class="fas fa-plus-square"> Simpan Data</i></button>
              <a href="{{ route ('registerlansia')}}" class="btn btn-info"><i class="fas fa-arrow-circle-left"> Kembali</i></a>
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

@include('Template.script')

    
</body>
</html>