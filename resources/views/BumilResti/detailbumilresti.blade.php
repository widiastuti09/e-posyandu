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
                <h1>Detail Data Bumil Resti</h1>
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
            <div class="card-title text-center">Form Detail Data</div>

            <div class="card-tools">
              
             
            </div>
          </div>
          <!-- /.card-header -->
          <form action="#" method="get">
          {{ csrf_field() }}
          
          <table class="table table-bordered">
          <thead>
    <tr class="bg-secondary">
      <th  class="text-center">Data</th>
      <th  class="text-center">Keterangan</th>
 
    </tr>
  </thead>
  
  <tbody>
    <tr>
        <th class="font-weight-bold">Nama Ibu Hamil</th>
        <td scope="row"  class="font-weight-normal">{{$bumilresti->ibuhamil->nama}}</td>
    </tr>
    <tr>
    <th class="font-weight-bold">Umur Hamil</th>
      <td scope="row" class="font-weight-normal">{{$bumilresti->umur_hamil}}</td>
    </tr>
    <tr>
    <th class="font-weight-bold">G/P/A</th>
      <td scope="row" class="font-weight-normal">{{$bumilresti->gpa}}</td>
    </tr>
    <th class="font-weight-bold">Asuransi</th>
      <td scope="row" class="font-weight-normal">{{$bumilresti->asuransi}}</td>
    </tr>
    <th class="font-weight-bold">Resiko Tinggi</th>
      <td scope="row" class="font-weight-normal">{{$bumilresti->resiko_tinggi}}</td>
    </tr>
    <th class="font-weight-bold">HPL</th>
      <td scope="row" class="font-weight-normal">{{$bumilresti->hpl}}</td>
    </tr> 
    <th class="font-weight-bold">Wali Bumil</th>
      <td scope="row" class="font-weight-normal">{{$bumilresti->wali_bumil}}</td>
    </tr>     
  </tbody>
</table>

           
            <div class="row">
          
              <!-- /.col -->
              <div class="col-12 col-sm-6 mb-3 ml-2">
              @if (auth()->user()->level === 'admin') 
              <a href="{{route('editbumilresti', $bumilresti->id)}}" class="btn btn-warning"><i class="fas fa-pen-alt"> Edit Data</i></a>
              @endif
              <a href="{{route('bumilresti')}}" class="btn btn-info"><i class="fas fa-arrow-circle-left"> Kembali</i></a>
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