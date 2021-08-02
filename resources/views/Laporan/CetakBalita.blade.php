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
<h1 align="center">Data Laporan Balita</h1>
<table id="cetak">
    <thead>
      <tr>
        <th>No</th>
        <th>Nama Balita</th>
        <th>Tanggall</th>
        <th>Jenis Imunisasi</th>
        <th>BB(Kg)</th>
        <th>IMD</th>
        <th>KIA</th>
        <th>Vitamin</th>
      </tr>
    </thead>
    @php
    $nomor=1;
    @endphp

    @foreach ($penimbangan as $balita)
      <tr>
        <td scope="row">{{ $nomor++ }}</td>
        <td>{{ $balita->registrasibalitas->namabalita }}</td> 
        <td>{{date('d F Y', strtotime($balita->tanggal)) }}</td>
        <td>{{ $balita->jenis_imunisasi}}</td>
        <td>{{ $balita->beratbadan}}</td>
        <td>{{ $balita->imp }}</td>
        <td>{{ $balita->kia }}</td>
        <td>{{ $balita->vitamin }}</td>
      </tr>
    

      
    @endforeach
</table>

</body>
</html>
