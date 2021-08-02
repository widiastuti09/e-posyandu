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
        <div class="container-fluid ">
            <!-- Content Header (Page header) -->
            <div class="text-xl-center">
            <h3 >Data Penimbangan Balita</h3>
               
            </div>
            

            
            <div class="container">
                <div class="mb-2">
                @if (auth()->user()->level === 'admin') 
                <a href="{{route('addpenimbangan')}}" class="btn btn-success "> Tambah Data <i
                            class="fas fa-plus-square"></i></a>
                @endif
                <a href="{{route('cetakpenimbangan')}}" class="btn btn-secondary">Cetak Data <i class="fas fa-print"></i></a>
                </div>
                <table id="table-penimbangan" class="table table-bordered table-striped">
                    <thead class="bg-dark">
                        <tr>
                            <th>No</th>
                            <th>Nama Balita</th>
                            <th>Tanggal</th>
                            <th>Jenis Imunisasi</th>
                            <th>BB(Kg)</th>
                            <th>IMD</th>
                            <th>KIA</th>
                            <th>Action</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $nomor=1;
                        @endphp
                        @foreach ($penimbangans as $index =>$penimbangan )
                        <tr>
                        <input type="hidden" class="serdelete_val" value="{{$penimbangan->id}}">

                            <th scope="row">{{ $index + 1 }}</th>
                            <td>{{ $penimbangan->registrasibalitas->namabalita }}</td> 
                            <td>{{date('d F Y', strtotime($penimbangan->tanggal)) }}</td>
                            <td>{{ $penimbangan->jenis_imunisasi}}</td>
                            <td>{{ $penimbangan->beratbadan}}</td>
                            <td>{{ $penimbangan->imp }}</td>
                            <td>{{ $penimbangan->kia }}</td>
                            
                            <td>
                                <a href="{{route('detail-penimbangan', $penimbangan->id) }}" class="btn btn-success"><i
                                        class="fas fa-info-circle"></i></a>
                            @if (auth()->user()->level === 'admin') 
                                <a href="{{route('editpenimbangan',$penimbangan->id) }}" class="btn btn-warning"><i
                                        class="fas fa-pen-alt"></i></a>

                                <button type="button" class="btn btn-danger hapus"><i
                                        class="fas fa-trash-alt"></i></button>
                            @endif
                            </td>
                            
                        </tr>
                        @endforeach

                    </tbody>
                </table>
                <br><br><br><br><br>

            </div>


        </div>
    </div>



    @include('Template.footer')
    @include('Template.script')
    <script>
      $(document).ready(function(){
        $('#table-penimbangan').DataTable({});
            $('#table-penimbangan').on('click', '.hapus', function (e) {

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
                            url: '/deletepenimbangan/' + delete_id,
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
      })
    </script>
    @include('sweetalert::alert')



</body>

</html>
