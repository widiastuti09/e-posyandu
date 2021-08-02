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
            <h3 class="card-title">Form Edit Data</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
             
            </div>
          </div>
          <!-- /.card-header -->
          <form action="{{route ('updateregister', $regbal->id)}}" method="post">
          {{ csrf_field() }}
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                    <label>Nama Balita</label>
                    <input type="text" class="form-control" id="namabalita" name="namabalita" placeholder="Masukkan Nama" value="{{$regbal->namabalita}}">
                </div>
                <div class="form-group">
                    <label>Tempat Lahir</label>
                    <input type="text" class="form-control" id="tempatlahir" name="tempatlahir" placeholder="Masukkan Nama" value="{{$regbal->tempatlahir}}">
                </div>
                <div class="form-group">
                    <label>Tanggal Lahir</label>
                    <input type="date" class="form-control" id="tanggallahir" name="tanggallahir" value="{{$regbal->tanggallahir}}">
                </div>
                <div class="form-group">
                    <label>Jenis Kelamin</label>
                    <select class="form-control select2" name="jeniskelamin" style="width: 100%;"  >
                        <option value="{{$regbal->jeniskelamin}}">{{ $regbal->jeniskelamin }}</option>
                        <option disabled="disabled">Pilih Jenis Kelamin</option>
                        <option>Laki-laki</option>
                        <option>Perempuan</option>
                  </select>
                </div>
                <div class="form-group">
                    <label>Nama Ayah</label>
                    <input type="text" class="form-control" id="namaayah" name="namaayah" value="{{$regbal->namaayah}}" placeholder="Masukkan Nama ayah">
                </div>
                <div class="form-group">
                    <label>Nama Ibu</label>
                    <input type="text" class="form-control" id="namaibu" name="namaibu" value="{{$regbal->namaibu}}" placeholder="Masukkan Nama Ibu">
                </div>
                <div class="form-group">
                    <label>RT</label>
                    <input type="number" class="form-control" id="rt" name="rt" value="{{$regbal->rt}}" placeholder="Masukkan RT">
                </div>

                <!-- /.form-group -->
              </div>
              <!-- /.col -->
              <div class="col-md-6 ">
                <!-- /.form-group -->
                <div class="form-group">
                    <label>RW</label>
                    <input type="number" class="form-control" id="rw" name="rw" value="{{$regbal->rw}}" placeholder="Masukkan RW">
                </div>
                <div class="form-group">
                    <label>Usia (Tahun)</label>
                    <input type="text" class="form-control" id="usia" name="usia" value="{{$regbal->usia}}" placeholder="Masukkan Usia Anak">
                </div>
                <div class="form-group">
                    <label>Berat Badan Lahir (Kg)</label>
                    <input type="text" class="form-control" id="bblahir" name="bblahir" value="{{$regbal->bblahir}}" placeholder="Masukkan Berat Badan Anak">
                </div>
                <div class="form-group">
                    <label>Panjang Badan Lahir (Cm)</label>
                    <input type="text" class="form-control" id="pblahir" name="pblahir" value="{{$regbal->pblahir}}" placeholder="Masukkan Panjamg Badan Anak">
                </div>
                <div class="form-group">
                    <label>No KK Balita</label>
                    <input type="number" class="form-control" id="nokk" name="nokk" value="{{$regbal->nokk}}" placeholder="Masukkan Nomor KK">
                </div>
                <div class="form-group">
                    <label>No NIK Balita</label>
                    <input type="number" class="form-control" id="nikbalita" name="nikbalita" value="{{$regbal->nikbalita}}" placeholder="Masukkan Nomor NIK">
                </div>
                <div class="form-group">
                    <label>No Telp</label>
                    <input type="number" class="form-control" id="telp" name="telp" value="{{$regbal->telp}}" placeholder="Masukkan Nomor Telp">
                </div>
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->

           
            <div class="row">
          
              <!-- /.col -->
              <div class="col-12 col-sm-6">
              <button type="submit" class="btn btn-success"><i class="fas fa-plus-square"> Simpan Data</i></button>
              <a href="{{ route ('register')}}" class="btn btn-info"><i class="fas fa-arrow-circle-left"> Kembali</i></a>
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
@include('Template.script')
    
</body>
</html>