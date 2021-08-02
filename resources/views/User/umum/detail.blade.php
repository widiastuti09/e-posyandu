<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User</title>
    @include('Template.style')
</head>
<body>
    @include('Template.navbar')

    @include('Template.sidebar')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="">
                        <h1>Data Register Umum</h1>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="container-fluid">
                <!-- SELECT2 EXAMPLE -->
                <div class="card card-default">
                    <div class="card-header bg-primary ">
                        <div class="card-title text-center">Form Detail Data Petugas</div>

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
                                    <th class="font-weight-bold">Nama Petugas</th>
                                    <td scope="row" class="font-weight-normal">{{ $umum->name}}</td>
                                </tr>
                                <tr>
                                    <th class="font-weight-bold">Email</th>
                                    <td scope="row" class="font-weight-normal">{{$umum->email}}</td>
                                </tr>
                              

                            </tbody>
                        </table>


                        <div class="row">

                            <!-- /.col -->
                            <div class="col-12 col-sm-6 mb-3 ml-2">
                                <a href="#" class="btn btn-warning"><i
                                        class="fas fa-pen-alt"> Edit Data</i></a>
                                <a href="{{route('pengguna.index')}}" class="btn btn-info"><i
                                        class="fas fa-arrow-circle-left"> Kembali</i></a>
                                <!-- /.form-group -->
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                </div>
                </form>



    </div>


    @include('Template.footer')
    @include('Template.script')
    
</body>
</html>