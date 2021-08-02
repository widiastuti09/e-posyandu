<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
@include('Template.style')

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        @include('Template.navbar')

        @include('Template.sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">User Posyandu</h1>
                        </div><!-- /.col -->

                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->
            <div class="container">
                <div class="card">
                    <div class="card-header">
                        Petugas Posyandu
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <a href="{{ route('pengguna.tambah-petugas') }}" class="btn btn-primary">Tambah
                                Petugas</a>
                        </div>
                        <div class="table-responsive">
                            <table id="table-user-posyandu" class="table table-bordered table-striped">
                                <thead class="bg-dark">
                                    <tr>
                                        <td style="text-align : center; width: 5%">No.</td>
                                        <td width="40%">Email</td>
                                        <td width="30%">Nama</td>
                                        <td>Opsi</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($posyandu as $key => $petugas)
                                        <tr>
                                        <input type="hidden" class="serdelete_val" value="{{$petugas->id}}">

                                            <td style="text-align : center">{{ $key + 1 }}</td>
                                            <td>
                                                <strong>{{ $petugas->email }}</strong> <br>
                                                <span>Added :</span> {{ date('d M Y', strtotime($petugas->created_at)) }}
                                            </td>
                                            <td>
                                                {{ $petugas->name }}<br>
                                                <span>Kader :</span>
                                                @if ($petugas->level == 'kader1')
                                                    Kader Umum
                                                @else
                                                    Kader Lansia
                                                @endif
                                            </td>
                                            <td>
                                                <form action="{{ route('pengguna.hapus-petugas', $petugas->id) }}"
                                                    method="post">
                                                    @csrf
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <a href="{{route ('pengguna.detail-petugas', $petugas->id)}}" class="btn btn-success"> <i
                                                            class="fas fa-info-circle"></i></a>
                                                    <a href="{{ route('pengguna.edit-petugas', $petugas->id) }}"
                                                        class="btn btn-warning"> <i class="fas fa-pen-alt"></i></a>
                                                    <button type="button" class="btn btn-danger hapus"> <i
                                                            class="fas fa-trash-alt"></i></button>
                                                </form>
    
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        User Umum
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <a href="{{ route('pengguna.tambah-umum') }}" class="btn btn-primary">Tambah user umum</a>
                        </div>
                        <div class="table-responsive">
                            <table id="table-user-umum" class="table table-bordered table-striped">
                                <thead class="bg-dark">
                                    <tr>
                                        <td style="text-align : center; width: 5%">No.</td>
                                        <td width="40%">Email</td>
                                        <td width="30%">Nama</td>
                                        <td>Opsi</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($umum as $key => $masyarakat)
                                        <tr>
                                            <input type="hidden" class="serdelete_val" value="{{$masyarakat->id}}">

                                            <td style="text-align : center">{{ $key + 1 }}</td>
                                            <td>
                                                <strong>{{ $masyarakat->email }}</strong> <br>
                                                <span>Added :</span>
                                                {{ date('d M Y', strtotime($masyarakat->created_at)) }}
                                            </td>
                                            <td>
                                                {{ $masyarakat->name }}<br>
                                                <span>Kader :</span>
                                                {{ $masyarakat->level }}
                                            </td>
                                            <td>
                                                <form action="{{ route('pengguna.hapus-umum', $masyarakat->id) }}"
                                                    method="post">
                                                    @csrf
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <a href="{{route ('pengguna.detail-umum', $masyarakat->id)}}" class="btn btn-success"> <i
                                                            class="fas fa-info-circle"></i></a>
                                                    <a href="{{ route('pengguna.edit-umum', $masyarakat->id) }}"
                                                        class="btn btn-warning"> <i class="fas fa-pen-alt"></i></a>
                                                    <button type="button" class="btn btn-danger hapus"> <i
                                                            class="fas fa-trash-alt"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>


            <br><br><br><br><br>
            @include('Template.footer')
        </div>
        <!-- ./wrapper -->

        <!-- REQUIRED SCRIPTS -->

        @include('Template.script')
        <script>
            $(document).ready(function() {
                $('#table-user-posyandu').DataTable({});
                     $('#table-user-posyandu').on('click', '.hapus', function (e) {

                var delete_id = $(this).closest("tr").find('.serdelete_val').val();
                // alert(delete_id);

                Swal.fire({
                    title: 'Yakin Hapus Data ?',
                    showCancelButton: true,
                }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {
                        var data = {
                            "_token": '{{ csrf_token() }}',
                            "id": delete_id,
                        };
                        $.ajax({
                            type: "DELETE",
                            url: '/pengguna/hapus-petugas/' + delete_id,
                            data: data,
                            success: function (response) {
                                Swal.fire('Berhasil!', 'Data berhasil dihapus',
                                        'success')
                                    .then(() => {
                                        location.reload();
                                    })
                            }
                        })
                    }
                })

            });
                $('#table-user-umum').DataTable({});
                     $('#table-user-umum').on('click', '.hapus', function (e) {

                var delete_id = $(this).closest("tr").find('.serdelete_val').val();
                // alert(delete_id);

                Swal.fire({
                    title: 'Yakin Hapus Data ?',
                    showCancelButton: true,
                }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {
                        var data = {
                            "_token": '{{ csrf_token() }}',
                            "id": delete_id,
                        };
                        $.ajax({
                            type: "DELETE",
                            url: '/pengguna/hapus-umum/' + delete_id,
                            data: data,
                            success: function (response) {
                                Swal.fire('Berhasil!', 'Data berhasil dihapus',
                                        'success')
                                    .then(() => {
                                        location.reload();
                                    })
                            }
                        })
                    }
                })

            });
            });
        </script>
</body>

</html>
