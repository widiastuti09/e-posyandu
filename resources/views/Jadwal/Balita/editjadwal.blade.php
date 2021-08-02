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
            <h1>Data Jadwal Penibangan</h1>
          </div>
          
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <section class="content">
      <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
          <div class="card-header bg-primary">
            <h3 class="card-title">Form Edit Jadwal Penimbangan Balita</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
             
            </div>
          </div>
          <!-- /.card-header -->
          <form action="{{route('updatejadwalpenimbangan', $jadbal->id)}}" method="post">
            {{ csrf_field() }}
            <div class="card-body">
              
              <div class="col-md-12">
              <div class="form-group">
                    <label for="">Tanggal</label>
                    <input type="date" class="form-control select2 @error('tanggal') is-invalid @enderror" name="tanggal" id="tanggal" value="{{$jadbal->tanggal}}"> 
                    @error('tanggal')
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Waktu</label>
                    <input type="time" class="form-control select2 @error('waktu') is-invalid @enderror" name="waktu" id="waktu" value="{{$jadbal->waktu}}"> 
                    @error('waktu')
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">keterangan</label>
                    <textarea type="text" class="form-control select2 @error('keterangan') is-invalid @enderror" placeholder="Masukkan Keterangan" name="keterangan" id="keterangan" value="{{$jadbal->keterangan}}">{{$jadbal->keterangan}}</textarea>
                    @error('keterangan')
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Status</label>
                    <select class="form-control select2 @error('jenis_kelamin') is-invalid @enderror" name="status" id="status">
                        <option value="{{$jadbal->status}}">{{$jadbal->status}}</option>
                        <option value="" disabled="disabled">Pilih Status</option>
                        <option >Akan Datang</option>
                        <option >Mulai</option>
                        <option >Selesai</option>
                        
                    </select>
                    @error('status')
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                
               
                
              </div>
              <div class="row">
          
          <!-- /.col -->
          <div class="col-12 col-sm-6">
          <button type="submit" class="btn btn-success"><i class="fas fa-plus-square"> Simpan Data</i></button>
          <a href="{{ route ('registerlansia')}}" class="btn btn-info"><i class="fas fa-arrow-circle-left"> Kembali</i></a>
            <!-- /.form-group -->
          </div>
          <!-- /.col -->
        </div>
            
            </div>
            <!-- /.row -->

           
           
            <!-- /.row -->
          </div>
          </form>
         


</div>   
<br><br><br><br><br><br>

@include('Template.footer')

@include('Template.script')




    
</body>
</html>