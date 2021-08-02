<!DOCTYPE html>
<html>
<head>
<style>
*{
    font-size: 15px
}
@page{
    size : Letter landscape
}
#cetak {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#cetak td, #cetak th {
  border: 1px solid #ddd;
  padding: 8px;
}

#cetak tr:nth-child(even){background-color: #f2f2f2;}

#cetak tr:hover {background-color: #ddd;}

#cetak th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #303030;
  color: white;
}
</style>
</head>
<body>
<h1 align="center">Data Laporan Lansia</h1>
<table id="cetak">
    <thead>
      <tr>
            <th>No</th>
            <th>Nama Lansia</th>
            <th>Tanggal Periksa</th>
            <th>BB</th>
            <th>TB</th>
            <th>Tekanan Darah</th>
            <th>Lingkar Pinggang</th>
            <th>Glukosa Darah</th>
            <th>Lemak Tubuh</th>
            <th>Lemak Perut</th>
            <th>IMT</th>
            <th>Kolestrol</th>
            <th>Asam Urat</th>
            
      </tr>
    </thead>
    @php
    $nomor=1;
    @endphp

    @foreach ($pemeriksaanlansias as $lansia)
      <tr>
        <td scope="row">{{ $nomor++ }}</td>
        <td>{{$lansia->lansias['nama']}}</td>
        <td>{{date('d F Y', strtotime($lansia->tanggal_periksa))}}</td>
        <td>{{$lansia->berat_badan}} Kg</td>
        <td>{{$lansia->tinggi_badan}} Cm</td>
        <td>{{$lansia->tekanan_darah}}</td>
        <td>{{$lansia->lingkar_pinggang}}</td>
        <td>{{$lansia->glukosa_darah}}</td>
        <td>{{$lansia->lemak_tubuh}}</td>
        <td>{{$lansia->lemak_perut}}</td>
        <td>{{$lansia->imt}}</td>
        <td>{{$lansia->kolestrol}}</td>
        <td>{{$lansia->asam_urat}}</td>
        
      </tr>
    

      
    @endforeach
</table>

</body>
</html>
