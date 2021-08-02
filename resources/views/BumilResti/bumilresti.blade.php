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
      <h3>Data Ibu Hamil Resiko Tinggi</h3>
    </div>

    <div class="container">
      <div class="mb-2">
      @if (auth()->user()->level === 'admin') 
        <a href="{{route('addbumilresti')}}" class="btn btn-primary">Tambah Data <i class="fas fa-plus-square"></i></a>
        @endif
        <a href="{{route('cetakbumilresti')}}" class="btn btn-secondary">Cetak Data <i class="fas fa-print"></i></a>
      </div>

      <table id="table-bumil-resti" class="table table-bordered table-striped">
        <thead class="bg-dark">
          <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Umur Hamil (MG)</th>
            <th>G/P/A</th>
            <th>Asuransi</th>
            <th>Resiko Tinggi</th>
            <th>Aksi</th>
            

          </tr>
        </thead>
        <tbody>
        @php
        $nomor=1;
        @endphp
        @foreach($bumilresti as $index => $resti)
        <tr>
            <input type="hidden" class="serdelete_val" value="{{$resti->id}}">
            <td scope="row">{{$index + 1}}</td>
            <td>{{$resti->ibuhamil->nama}}</td>
            <td>{{$resti->umur_hamil}}</td>
            <td>{{$resti->gpa}}</td>
            <td>{{$resti->asuransi}}</td>
            <td>{{$resti->resiko_tinggi}}</td>
            <td>
                <a href="{{route('detailbumilresti',$resti->id)}}" class="btn btn-success"> <i class="fas fa-info-circle"></i></a>
                @if (auth()->user()->level === 'admin') 
                <a href="{{route('editbumilresti', $resti->id)}}" class="btn btn-warning"> <i class="fas fa-pen-alt"></i></a>
                <button type="button" class="btn btn-danger hapus" > <i class="fas fa-trash-alt"></i></button>
                @endif
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
    $('#table-bumil-resti').DataTable({});
    $('#table-bumil-resti').on('click', '.hapus', function (e) {

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
            url: '/Hapus-Bumil-resti/' + delete_id,
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