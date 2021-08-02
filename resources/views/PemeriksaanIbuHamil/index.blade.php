<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pemeriksaan Ibu Hamil</title>
    @include('Template.style')
</head>

<body>

    @include('Template.navbar')

    @include('Template.sidebar')
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="text-center">
                <h3>Data Pemeriksaan Ibu Hamil</h3>
            </div>

            <div class="container">
                <div class="mb-2">
                    @if (auth()->user()->level === 'admin')
                    <a href="{{route('pemeriksaanibuhamil.create')}}" class="btn btn-primary">Tambah Data <i
                            class="fas fa-plus-square"></i></a>
                    @endif
                    <a href="{{route('cetakbumil')}}" class="btn btn-secondary">Cetak Data <i
                            class="fas fa-print"></i></a>

                </div>
                <table id="table-pemeriksaan-ibuhamil" class="table table-bordered table-striped">
                    <thead class="bg-dark">
                        <tr>
                            <th>No</th>
                            <th>Nama Ibu Hamil</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pemeriksaan_ibu_hamil as $index => $pih)
                        <tr>
                            <input type="hidden" class="serdelete_val" value="{{$pih->id}}">
                            <td scope="row">{{ $index + 1}}</td>
                            <td>{{ $pih->ibuhamil->nama}}</td>
                            <td>

                                <a href="{{ route('pemeriksaanibuhamil.show', $pih->id) }}" class="btn btn-success">
                                    <i class="fas fa-info-circle"></i></a>
                                @if (auth()->user()->level === 'admin')
                                <a href="{{ route('pemeriksaanibuhamil.edit', $pih->id) }}" class="btn btn-warning">
                                    <i class="fas fa-pen-alt"></i></a>
                                <button type="button" class="btn btn-danger hapus"> <i
                                        class="fas fa-trash-alt"></i></button>
                                @endif

                            </td>

                            @endforeach

                        </tr>

                    </tbody>


                </table>

            </div>
        </div>
        <br><br><br><br>
    </div>




    @include('Template.footer')
    @include('Template.script')
    @include('sweetalert::alert')
    <script>
        // function onDelete(id) {

        // }
        $(document).ready(function () {
            $('#table-pemeriksaan-ibuhamil').DataTable({});
            $('#table-pemeriksaan-ibuhamil').on('click', '.hapus', function (e) {

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
                            url: '/pemeriksaaan-ibu-hamil/delete/' + delete_id,
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
