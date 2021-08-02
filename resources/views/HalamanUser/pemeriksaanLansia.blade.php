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
            <h3 >Data Pemeriksaan Lansia</h3>
               
            </div>
            

            
            <div class="container">
                <div class="mb-2">
                @if (auth()->user()->level === 'admin') 
                <a href="{{route('addpemeriksaanlansia')}}" class="btn btn-success "> Tambah Data <i
                            class="fas fa-plus-square"></i></a>

                @endif
                <a href="{{route('cetaklansia')}}"class="btn btn-secondary"> Cetak Data <i
                            class="fas fa-print"></i></a>
                </div>
                <table id="table-pemeriksaan" class="table table-bordered table-striped">
                    <thead class="bg-dark">
                        <tr>
                            <th>No</th>
                            <th>Nama Lansia</th>
                            <th>Tanggal Periksa</th>
                            <th>Berat Badan(Kg)</th>
                            <th>Tinggi Badan</th>
                            <th>Tekanan Darah</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    @php 
                    $nomor=1;
                    @endphp
                    @foreach ($pemeriksaanlansias as $index =>$pemeriksaanlansia)

                      
                        <tr>
                        <input type="hidden" class="serdelete_val" value="{{$pemeriksaanlansia->id}}">

                            <th scope="row">{{ $index + 1}}</th>
                            <td>{{$pemeriksaanlansia->lansias['nama']}}</td>
                            <td>{{date('d F Y', strtotime($pemeriksaanlansia->tanggal_periksa))}}</td>
                            <td>{{$pemeriksaanlansia->berat_badan}}</td>
                            <td>{{$pemeriksaanlansia->tinggi_badan}}</td>
                            <td>{{$pemeriksaanlansia->tekanan_darah}}</td>
                            
                            <td>

                           
                                <a href="{{route ('detailpemeriksaanlansia', $pemeriksaanlansia->id)}}" class="btn btn-success"><i
                                        class="fas fa-info-circle"></i></a>
                                        @if (auth()->user()->level === 'admin') 
                                <a href="{{route('editpemeriksaanlansia', $pemeriksaanlansia->id)}}" class="btn btn-warning"><i
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
    @include('sweetalert::alert')
    @include('Template.script')
    <script>
      $(document).ready(function(){
        $('#table-pemeriksaan').DataTable({});
              $('#table-pemeriksaan').on('click', '.hapus', function (e) {

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
                            url: '/deletepemeriksaanlansia/' + delete_id,
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
