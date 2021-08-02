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
                        <h1>Detail Data Ibu Hamil</h1>
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
                        <div class="card-title text-center">Form Detail Pemeriksaan Ibu Hamil</div>

                        <div class="card-tools">


                        </div>
                    </div>
                    <!-- /.card-header -->
                    <form action="#" method="get">
                        <!-- {{ csrf_field() }} -->

                        <table class="table table-bordered">
                            <thead>
                                <tr class="bg-secondary">
                                    <th class="text-center">Data</th>
                                    <th class="text-center">Keterangan</th>

                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <th class="font-weight-bold">Nama Ibu Hamil</th>
                                    <td scope="row" class="font-weight-normal">{{ $pemeriksaan_ibu_hamil->ibuhamil->nama }}</td>
                                </tr>
                                <tr>
                                    <th class="font-weight-bold">Tinggi Badan</th>
                                    <td scope="row" class="font-weight-normal">{{ $pemeriksaan_ibu_hamil->tinggibadan }}</td>
                                </tr>
                                <tr>
                                    <th class="font-weight-bold">Hemoglobin</th>
                                    <td scope="row" class="font-weight-normal">{{ $pemeriksaan_ibu_hamil->hemoglobin_atas }} / {{ $pemeriksaan_ibu_hamil->hemoglobin_bawah }}</td>
                                </tr>
                                <tr>
                                    <th class="font-weight-bold">Hari Taksiran Persalinan (HTP)</th>
                                    <td scope="row" class="font-weight-normal">{{ $pemeriksaan_ibu_hamil->htp }}</td>
                                </tr>
                                <tr>
                                    <th class="font-weight-bold">Hari Pertama Haid Terkahir (HPHT)</th>
                                    <td scope="row" class="font-weight-normal">{{ $pemeriksaan_ibu_hamil->hpht }}</td>
                                </tr>
                                <tr>
                                    <th class="font-weight-bold">Berat Badan (Kg)</th>
                                    <td scope="row" class="font-weight-normal">{{ $pemeriksaan_ibu_hamil->beratbadan }}</td>
                                </tr>
                                <tr>
                                    <th class="font-weight-bold">Hamil Ke (G)</th>
                                    <td scope="row" class="font-weight-normal">{{ $pemeriksaan_ibu_hamil->hamilke }}</td>
                                </tr>
                                <tr>
                                    <th class="font-weight-bold">Persalinan Ke (P)</th>
                                    <td scope="row" class="font-weight-normal">{{ $pemeriksaan_ibu_hamil->persalinanke }}</td>
                                </tr>
                                <tr>
                                    <th class="font-weight-bold">Jumlah Keguguran (P)</th>
                                    <td scope="row" class="font-weight-normal">{{ $pemeriksaan_ibu_hamil->keguguranke }}</td>
                                </tr>
                            </tbody>
                        </table>


                        <div class="row">

                            <!-- /.col -->
                            <div class="col-12 col-sm-6 mb-3 ml-2">
                            @if (auth()->user()->level === 'admin') 
                                <a href="{{ route('pemeriksaanibuhamil.edit', $pemeriksaan_ibu_hamil->id) }}" class="btn btn-warning"><i class="fas fa-pen-alt"> Edit Data</i></a>
                            @endif
                                <a href="{{ route('pemeriksaanibuhamil.index') }}" class="btn btn-info"><i
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
        </section>
    </div>
    @include('Template.script')

</body>

</html>
