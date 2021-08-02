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
            <h3 class="card-title">Form Edit Ibu Hamil Resiko Tinggi</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
             
            </div>
          </div>
          <!-- /.card-header -->
          
          <form action="{{route('updatebumilresti', $bumilresti->id)}}" method="post">
            {{ csrf_field() }}
            <div class="card-body"> 
                <div class="col-md-12">
                    <div class="row">
                       <div class="col-md-12">
                            <div class="form-group">
                                <label>Nama Ibu</label>
                                    <select class="form-control select-ibu-hamil @error('nama') is-invalid @enderror" name="id_ibu" style="width:100%;">
                                        <option value="">Pilih nama</option>
                                            @foreach ($ibuHamil as $hamil)
                                                <option value="{{ $hamil->id }}" @if($bumilresti->id_ibu == $hamil->id) selected="selected" @endif>{{ $hamil->nama }}</option>
                                            @endforeach
                                    </select>
                                    @error('nama')
                                        <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                            </div>
                        </div>
                    </div>
                <div class="form-group">
                    <label for="">Umur Hamil</label>
                    <input type="number" class="form-control select2 @error('umur_hamil') is-invalid @enderror" name="umur_hamil" id="umur_hamil" value="{{$bumilresti->umur_hamil}}"> 
                    @error('umur_hamil')
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">gpa</label>
                    <input type="text" class="form-control select2 @error('gpa') is-invalid @enderror" placeholder="Masukkan Keterangan" name="gpa" id="gpa" value="{{$bumilresti->gpa}}"></input>
                    @error('gpa')
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <!-- <div class="form-group">
                    <label for="">Asuransi</label>
                    <input type="text" class="form-control select2 @error('asuransi') is-invalid @enderror" placeholder="Masukkan Asurani" name="asuransi" id="asuransi" value="{{$bumilresti->asuransi}}"></input>
                    @error('asuransi')
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div> -->
                <div class="form-group">
             
                <label for="">Jenis Imunisasi</label>
                <select class="form-control select2" id="asuransi" name="asuransi" style="width: 100%;">
                    @if($bumilresti->asuransi)
                      <option value="{{$bumilresti->asuransi}}" >{{$bumilresti->asuransi}}</option>
                      <option value="" disabled="disabled">==Pilih Asuransi==</option>
                    <option >Umum</option>
                    <option >BPJS</option>     
                    @endif
                  </select>
                
                </div>
                <div class="form-group">
                    <label for="">Resiko Tinggi</label>
                    <input type="text" class="form-control select2 @error('resiko_tinggi') is-invalid @enderror" placeholder="Masukkan Resiko Tinggi" name="resiko_tinggi" id="resiko_tinggi" value="{{$bumilresti->resiko_tinggi}}"></input>
                    @error('resiko_tinggi')
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">HPL</label>
                    <input type="date" class="form-control select2 @error('hpl') is-invalid @enderror" placeholder="Masukkan HPL" name="hpl" id="hpl" value="{{$bumilresti->hpl}}"></input>
                    @error('hpl')
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Wali Bumil</label>
                    <input type="text" class="form-control select2 @error('wali_bumil') is-invalid @enderror" placeholder="Masukkan Resiko Tinggi" name="wali_bumil" id="wali_bumil" value="{{$bumilresti->wali_bumil}}"></input>
                    @error('wali_bumil')
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                
                
               
                
              </div>
              <div class="row">
          
          <!-- /.col -->
          <div class="col-12 col-sm-6">
          
          <button type="submit" class="btn btn-success"><i class="fas fa-plus-square"> Simpan Data</i></button>
          <a href="{{ route ('bumilresti')}}" class="btn btn-info"><i class="fas fa-arrow-circle-left"> Kembali</i></a>
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