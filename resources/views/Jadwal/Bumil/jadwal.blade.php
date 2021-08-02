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
  <div class="container-fluid">
    <div class="text-center">
      <h3>Jadwal Pemeriksaan Ibu Hamil</h3>
    </div>

    <div class="container">
      <div class="mb-2">
        <a href="{{route('addjadwalpemeriksaan')}}" class="btn btn-primary">Tambah Data <i class="fas fa-plus-square"></i></a>
      </div>
      <table id="table-registrasi-jadwal" class="table table-bordered table-striped">
        <thead class="bg-dark">
          <tr>
            <th>No</th>
            <th>Tanggal </th>
            <th>waktu</th>
            <th>Keterangan</th>
            <th>Status</th>
            <th>Aksi</th>
            

          </tr>
        </thead>
        <tbody>
        @foreach ($jadmil as $index => $jadwal)
        <tr>
        <input type="hidden" class="serdelete_val" value="{{$jadwal->id}}">

            <td scope="row">{{$index + 1}}</td>
            <td>{{date('d F Y', strtotime($jadwal->tanggal))}}</td>
            <td>{{$jadwal ->waktu}} WIB</td>
            <td>{{$jadwal->keterangan}}</td>
            <td>{{$jadwal->status}}</td>
            <td>
                 <a href="{{route('detailjadwalpemeriksaan', $jadwal->id)}}" class="btn btn-success"> <i class="fas fa-info-circle"></i></a>
                <a href="{{route('editjadwalpemeriksaan',$jadwal->id)}}"class="btn btn-warning"> <i class="fas fa-pen-alt"></i></a>
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
@include('sweetalert::alert')
@include('Template.script')
<script>
   $(document).ready(function(){
    $('#table-registrasi-jadwal').DataTable({});
    $('#table-registrasi-jadwal').on('click', '.hapus', function (e) {

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
            url: '/Hapus-jadwal-bumil/' + delete_id,
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