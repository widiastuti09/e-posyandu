<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Register Balita</title>
    @include('Template.style')
</head>
<body>

@include('Template.navbar')

@include('Template.sidebar')
<div class="content-wrapper">
  <div class="container-fluid">
    <div class="text-center">
      <h3>Data Registrasi Balita</h3>
    </div>

    <div class="container">
      <div class="mb-2">
        <a href="{{route('addregisterbalita')}}" class="btn btn-primary">Tambah Data <i class="fas fa-plus-square"></i></a>
      </div>
      <table id="table-registrasi-balita" class="table table-bordered table-striped">
        <thead class="bg-dark">
          <tr>
            <th>No</th>
            <th>Nama Anak</th>
            <th>Tempat Lahir</th>
            <th>Tanggal Lahir</th>
            <th>Jenis Kelamin</th>
            <th>Nama Ayah</th>
            <th>Nama Ibu</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
        @foreach ($registrasibalitas as $index => $register)
          <tr>
          <input type="hidden" class="serdelete_val" value="{{$register->id}}">
            <th scope="row">{{ $index + 1 }}</th>
            <th> {{ $register-> namabalita}} </th>
            <td> {{ $register-> tempatlahir}} </td>
            <td>{{date('d F Y', strtotime($register->tanggallahir))}}</td>
            <td> {{ $register-> jeniskelamin}} </td>
            <td> {{ $register-> namaayah}} </td>
            <td> {{ $register-> namaibu}} </td>
            <td>
              <a href="{{route('detailregister', $register->id)}}" class="btn btn-success"> <i class="fas fa-info-circle"></i></a>
              <a href="{{ route ('editregister', $register->id)}}"class="btn btn-warning"> <i class="fas fa-pen-alt"></i></a>
              <button type="button" class="btn btn-danger hapus"> <i class="fas fa-trash-alt"></i></button>
              

            </td>
          </tr>
        @endforeach
        </tbody>


      </table>

    </div>
  </div>
  <br><br><br><br>
</div>

  

        
@include('Template.footer')
@include('Template.script')
<script>
   $(document).ready(function(){
    $('#table-registrasi-balita').DataTable({});
       $('#table-registrasi-balita').on('click', '.hapus', function (e) {

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
                            url: '/deleteregister/' + delete_id,
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
@include('sweetalert::alert')

    
</body>
</html>