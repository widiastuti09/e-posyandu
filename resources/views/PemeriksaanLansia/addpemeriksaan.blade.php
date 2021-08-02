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
            <h1>Data Pemeriksaan Lansia</h1>
          </div>
          
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <section class="content">
      <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
          <div class="card-header bg-primary">
            <h3 class="card-title">Form Tambah Data Pemeriksaan Lansia</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
             
            </div>
          </div>
          <!-- /.card-header -->
          <form action="{{route('simpanpemeriksaanlansia')}}" method="post">
            {{ csrf_field() }}
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                
                <div class="form-group">
                    <label for="">Nama Lansia</label>
                  <select name="namalansia_id"  id="namalansia_id" class="form-control select2bs4 @error('namalansia_id') is-invalid @enderror" style="width: 100%;">
                  <option value="" >Pilih Nama</option>
                    @foreach($plansia as $pemeriksaanlansia)
                      <option @if(old("namalansia_id") == $pemeriksaanlansia->id) selected @endif value="{{$pemeriksaanlansia->id}}">{{$pemeriksaanlansia->nama}}</option>
                    @endforeach
                  </select>
                  @error('namalansia_id')
                    <span class="invalid-feedback">{{$message}}</span>
                  @enderror
                 
                </div>
                <div class="form-group">
                    <label for="">Tanggal Pemeriksaan</label>
                    <input type="date" class="form-control  @error('tanggal_periksa') is-invalid @enderror" name="tanggal_periksa" id="tanggal_periksa"> 
                    @error('tanggal_periksa')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Berat Badan</label>
                    <input type="text" class="form-control  @error('berat_badan') is-invalid @enderror" placeholder="Masukkan Berat Badan" name="berat_badan" id="berat_badan">
                    @error('berat_badan')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Tinggi Badan</label>
                    <input type="text" class="form-control  @error('tinggi_badan') is-invalid @enderror" placeholder="Masukkan Tinggi Badan" name="tinggi_badan" id="tinggi_badan">
                    @error('tinggi_badan')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
               
                <div class="form-group">
                    <label for="">Lingkar Pinggang (Cm)</label>
                    <input type="text" class="form-control  @error('lingkar_pinggang') is-invalid @enderror" placeholder="Masukkan Ukuran Lingkar Pinggang" name="lingkar_pinggang" id="lingkar_pinggang">
                    @error('lingkar_pinggang')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Tekanan Darah</label>
                    <input type="text" class="form-control  @error('tekanan_darah') is-invalid @enderror" placeholder="Masukkan Tekanan Darah" name="tekanan_darah" id="tekanan_darah">
                    @error('tekanan_darah')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Glukosa Darah</label>
                    <input type="text" class="form-control  @error('glukosa_darah') is-invalid @enderror" placeholder="Masukkan Glukosa Darah" name="glukosa_darah" id="glukosa_darah">
                    @error('glukosa_darah')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Lemak Tubuh</label>
                    <input type="text" class="form-control  @error('lemak_tubuh') is-invalid @enderror" placeholder="Masukkan Lemak Darah" name="lemak_tubuh" id="lemak_tubuh">
                    @error('lemak_tubuh')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">IMT</label>
                    <input type="text" class="form-control  @error('imt') is-invalid @enderror" placeholder="Masukkan Indeks Massa Tubuh" name="imt" id="imt">
                    @error('imt')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
              <div class="form-group">
                    <label for="">Lemak Perut</label>
                    <input type="text" class="form-control  @error('lemak_perut') is-invalid @enderror" placeholder="Masukkan Lemak Perut" name="lemak_perut" id="lemak_perut">
                    @error('lemak_perut')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
               
               
                
              </div>
              <!-- /.col -->
              <div class="col-md-6 ">
              
                <div class="form-group">
                    <label for="">Kolestrol</label>
                    <input type="text" class="form-control  @error('kolestrol') is-invalid @enderror" placeholder="Masukkan Kolestrol" name="kolestrol" id="kolestrol">
                    @error('kolestrol')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Asam Urat</label>
                    <input type="text" class="form-control  @error('asam_urat') is-invalid @enderror" placeholder="Masukkan Tekanan Darah" name="asam_urat" id="asam_urat">
                    @error('asam_urat')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Makan Berlemak</label>
                    <input type="text" class="form-control  @error('makan_berlemak') is-invalid @enderror" placeholder="Dalam 1 Minggu" name="makan_berlemak" id="makan_berlemak">
                    @error('makan_berlemak')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="">Makan Manis</label>
                    <input type="text" class="form-control  @error('makan_manis') is-invalid @enderror" placeholder="Dalam 1 Minggu" name="makan_manis" id="makan_manis">
                    @error('makan_manis')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="">Makan/Minum Zat Adiktif</label>
                    <input type="text" class="form-control @error('zat_adiktif') is-invalid @enderror" placeholder="Dalam 1 Minggu" name="zat_adiktif" id="zat_adiktif">
                    @error('zat_adiktif')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="">Penggunaan Jelantah</label>
                    <input type="text" class="form-control @error('jelantah') is-invalid @enderror" placeholder="Dalam 1 Minggu" name="jelantah" id="jelantah">
                    @error('jelantah')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="">Merokok</label>
                    <select class="form-control @error('merokok') is-invalid @enderror" value="" name="merokok" id="merokok">
                        <option value="">Pilih Data</option>
                        <option >Ya</option>
                        <option >Tidak</option>
                    </select>
                    @error('merokok')
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                   
                </div>

                <div class="form-group">
                    <label for="">Olahraga</label>
                    <input type="text" class="form-control @error('olahraga') is-invalid @enderror" placeholder="Dalam 1 Minggu" name="olahraga" id="olahraga">
                    @error('olahraga')
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="">Keterangan</label>
                    <input type="text" class="form-control @error('keterangan') is-invalid @enderror" placeholder="Konseling" name="keterangan" id="keterangan">
                    @error('keterangan')
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                  <label>Penyakit (optional)</label>
                  <select class="form-control select2bs4 penyakit" name="penyakit" style="width: 100%;" value="{{old('penyakit')}}">
                    <option selected="selected" disabled="disabled">Pilih penyakit</option>
                    <option value="Kolesterol">Kolesterol</option>
                    <option value="Hipertensi">Hipertensi</option>
                    <option value="Diabetes">Diabetes</option>
                    <option value="Asam urat">Asam urat</option>
                    <option value="Osteoporosis">Osteoporosis</option>
                  </select>
                </div>

              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->

           
            <div class="row">
          
              <!-- /.col -->
              <div class="col-12 col-sm-6">
              <button type="submit" class="btn btn-success"><i class="fas fa-plus-square"> Tambah Data</i></button>
              <a href="{{ route ('pemeriksaanlansia')}}" class="btn btn-info"><i class="fas fa-arrow-circle-left"> Kembali</i></a>
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
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
  })


</script>

    
</body>
</html>