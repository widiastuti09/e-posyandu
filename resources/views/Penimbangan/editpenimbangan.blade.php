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
            <h1>Data Penimbangan</h1>
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
          <form action="{{ route('updatepenimbangan', $pen->id) }}" method="post">
          {{ csrf_field() }}
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">

              <!-- <div class="form-group">
                    <label>Nama Anak</label>
                    <input type="text" class="form-control" id="namabalita_id" name="namabalita" placeholder="Masukkan Nama" value="{{$pen->namabalita}}">
                </div> -->

                <div class="form-group">
                  <label>Nama Balita</label>
                  <select name="namabalita_id"  id="namabalita_id" class="form-control select2bs4  @error('namabalita_id') is-invalid @enderror" style="width: 100%;">
                    <option value="" disabled="disabled">--Pilih Opsi--</option>
                    @foreach($regbal as $penimbangan)
                    
                    <option value="{{$penimbangan->id}}" @if($penimbangan->id === $pen->namabalita_id) selected @endif>{{$penimbangan->namabalita}}</option>
                    @endforeach
                  </select>
                  @error('namabalita_id')
                    <span class="invalid-feedback">{{$message}}</span>
                  @enderror
                </div>
                
                <div class="form-group">
                    <label>Tanggal</label>
                    <input type="date" class="form-control @error('tanggal') is-invalid @enderror" id="tanggal" name="tanggal" placeholder="Masukkan Nama" value="{{$pen->tanggal}}">
                    @error('tanggal')
                      <div class="invalid-feedback">{{$message}}</div>
                      @enderror    
                </div>
                <div class="form-group">
             
                <label for="">Jenis Imunisasi</label>
                <select class="form-control select2 @error('jenis_imunisasi') is-invalid @enderror" name="jenis_imunisasi" style="width: 100%;">
                    @if($pen->jenis_imunisasi)
                      <option value="{{$pen->jenis_imunisasi}}" >{{$pen->jenis_imunisasi}}</option>
                      <option value="" disabled="disabled">Pilih Imunisasi (Berdasarkan Umur)</option>
                    <option >BCG, Polion 1 (0-7 hari)</option>
                    <option >BCG, Polio 1 (1 bulan)</option>
                    <option >DPI/HB 1, Polio 2 (2 bulan)</option>
                    <option >DPI/HB 2, Polio 3 (3 bulan)</option>
                    <option >DPI/HB 3, Polio 4 (4 bulan)</option>
                    <option >Campak (9 bulan)</option>
                    @endif
                  </select>
                  @error('jenis_imunisasi')
                    <div class="invalid-feedback">{{$message}}</div>
                  @enderror
                
                </div>
                <div class="form-group">
                    <label>Berat Badan</label>
                    <input type="text" class="form-control @error('beratbadan') is-invalid @enderror" id="beratbadan" name="beratbadan" placeholder="Masukkan BB (Kg)" value="{{$pen->beratbadan}}">
                    @error('beratbadan')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
              <div class="col-md-6 ">
                <!-- /.form-group -->
                <div class="form-group">
                  <label>IMD</label>
                  <select class="form-control select2 @error('imp') is-invalid @enderror" name="imp" style="width: 100%;">
                    @if($pen->imp)
                      <option value="{{$pen->imp}}" >{{$pen->imp}}</option>
                      <option value="" disabled="disabled">--Pilih Opsi--</option>
                      <option >Tidak</option>
                      <option >Ya</option>
                    @endif
                  </select>
                  @error('imp')
                    <div class="invalid-feedback">{{$message}}</div>
                  @enderror
                  <label class="mt-3">KIA</label>
                  <select class="form-control select2 @error('kia') is-invalid @enderror" name="kia" style="width: 100%;" >
                    @if($pen->kia)
                      <option value="{{$pen->kia}}" >{{$pen->kia}}</option>  
                      <option value="" disabled="disabled">--Pilih Opsi--</option>
                      <option>Tidak</option>
                      <option>Ya</option>
                    @endif
                  </select>
                  @error('kia')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                  <label class="mt-3">Vitamin</label>
                  <select class="form-control select2 @error('vitamin') is-invalid @enderror" name="vitamin" style="width: 100%;" value="{{$pen->vitamin}}">
                  @if($pen->vitamin)
                    <option value="{{$pen->vitamin}}" >{{$pen->vitamin}}</option>
                    <option value="" disabled="disabled">--Pilih Opsi--</option>
                    <option >Vit A Biru (6 - 11 Bulan)</option>
                    <option >Vit A Merah (1 - 5 Tahun)</option>
                  @endif
                  </select>
                  @error('vitamin')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                  <label class="mt-3">Penyakit (optional)</label>
                  <select class="form-control select2bs4"  name="penyakit" style="width: 100%;" value="{{$pen->penyakit}}">
                  @if($pen->penyakit)
                  <option value="{{$pen->penyakit}}" >{{$pen->penyakit}}</option>
                    <option selected="selected" disabled="disabled">Pilih penyakit</option>
                    <option value="Demam">Demam</option>
                    <option value="Luka dan Sakit Kulit">Luka dan Sakit Kulit</option>
                    <option value="Batuk">Batuk</option>
                    <option value="Diare">Diare</option>
                    @endif
                  </select>
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
              <a href="{{ route ('penimbangan')}}" class="btn btn-info"><i class="fas fa-arrow-circle-left"> Kembali</i></a>
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
          </form>
         
        </div>
        <!-- /.card -->




@include('Template.footer')
@include('Template.script')
    
</body>
</html>