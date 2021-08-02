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
                        <h1>Data Registrasi Ibu Hamil</h1>
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
                                    <th class="text-center">Data</th>
                                    <th class="text-center">Keterangan</th>

                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <th class="font-weight-bold">Tanggal Register</th>
                                    <td scope="row" class="font-weight-normal">
                                        {{date('d F Y', strtotime($regmil->tglregister))}}</td>
                                </tr>
                                <tr>
                                    <th class="font-weight-bold">Nama Ibu Hamil</th>
                                    <td scope="row" class="font-weight-normal">{{ $regmil->nama}}</td>
                                </tr>
                                <tr>
                                    <th class="font-weight-bold">Tanggal Lahir</th>
                                    <td scope="row" class="font-weight-normal">
                                        {{date('d F Y', strtotime( $regmil->tgllahir))}}</td>
                                </tr>
                                <tr>
                                    <th class="font-weight-bold">Nama Suami</th>
                                    <td scope="row" class="font-weight-normal">{{$regmil->namasuami}}</td>
                                </tr>
                                <tr>
                                    <th class="font-weight-bold">Gol Darah</th>
                                    <td scope="row" class="font-weight-normal">{{$regmil->goldarah}}</td>
                                </tr>
                                <tr>
                                    <th class="font-weight-bold">Usia</th>
                                    </th>
                                    <td scope="row" class="font-weight-normal">{{$regmil->usia}}</td>
                                </tr>
                                <tr>
                                    <th class="font-weight-bold">RT</th>
                                    <td scope="row" class="font-weight-normal">{{$regmil->rt}}</td>
                                </tr>
                                <tr>
                                    <th class="font-weight-bold">RW</th>
                                    <td scope="row" class="font-weight-normal">{{$regmil->rw}}</td>
                                </tr>
                                <tr>
                                    <th class="font-weight-bold">No Telp</th>
                                    <td class="font-weight-normal">{{$regmil->telp}}</td>
                                </tr>

                            </tbody>
                        </table>


                        <div class="row">

                            <!-- /.col -->
                            <div class="col-12 col-sm-6 mb-3 ml-2">
                                <a href="{{route('editregisterbumil', $regmil->id)}}" class="btn btn-warning"><i
                                        class="fas fa-pen-alt"> Edit Data</i></a>
                                <a href="{{route('registerhamil')}}" class="btn btn-info"><i
                                        class="fas fa-arrow-circle-left"> Kembali</i></a>
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
