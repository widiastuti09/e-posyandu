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
                <h1>Detail Data Penimbangan</h1>
            </div>
            
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
          <div class="card-header bg-primary ">
            <div class="card-title text-center">Form Detail Penimbangan Balita</div>

            <div class="card-tools">
              
             
            </div>
          </div>
          <!-- /.card-header -->
          <form action="#" method="get">
          <!-- {{ csrf_field() }} -->
          
          <table class="table table-bordered">
          <thead>
    <tr class="bg-secondary">
      <th  class="text-center">Data</th>
      <th  class="text-center">Keterangan</th>
 
    </tr>
  </thead>
  
  <tbody>
    <tr>
        <th class="font-weight-bold">Nama Balita</th>
        <td scope="row"  class="font-weight-normal">{{$pen->registrasibalitas->namabalita}}</td>
    </tr>
    <tr>
    <th class="font-weight-bold">Jenis Imunisasi</th>
      <td scope="row" class="font-weight-normal">{{date('d F Y', strtotime($pen->tanggal)) }}</td>
    </tr>
    <tr>
        <th class="font-weight-bold">Jenis Imunisasi</th>
        <td scope="row"  class="font-weight-normal">{{$pen->jenis_imunisasi}}</td>
    </tr>
    <tr>
        <th class="font-weight-bold">Berat Badan</th>
        <td scope="row"  class="font-weight-normal">{{$pen->beratbadan}}</td>
    </tr>
    <tr>
        <th class="font-weight-bold">IMP</th>
        <td scope="row"  class="font-weight-normal">{{$pen->imp}}</td>
    </tr>
    <tr>
        <th class="font-weight-bold">KIA</th>
        <td scope="row"  class="font-weight-normal">{{$pen->kia}}</td>
    </tr>
    <tr>
        <th class="font-weight-bold">Vitamin</th>
        <td scope="row"  class="font-weight-normal">{{$pen->vitamin}}</td>
    </tr>
    <tr>
        <th class="font-weight-bold">Penyakit</th>
        <td scope="row"  class="font-weight-normal">{{$pen->penyakit}}</td>
    </tr>
    
   
  </tbody>
</table>

           
            <div class="row">
          
              <!-- /.col -->
              <div class="col-12 col-sm-6 mb-3 ml-2">
              @if (auth()->user()->level === 'admin') 
              <a href="{{route('editpenimbangan', $pen->id)}}" class="btn btn-warning"><i class="fas fa-pen-alt"> Edit Data</i></a>
                @endif
              <a href="{{route ('penimbangan')}}" class="btn btn-info"><i class="fas fa-arrow-circle-left"> Kembali</i></a>
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