<html>
<head>
     <title> Laporan Data Pengajuan </title>
     <style>
          #user {
          font-family: Arial, Helvetica, sans-serif;
          border-collapse: collapse;
          width: 100%;
          }

          #user td, #user th {
          border: 1px solid #ddd;
          padding: 8px;
          font-size: 12px;
          }

          #user tr:nth-child(even){background-color: #f2f2f2;}

          #user tr:hover {background-color: #ddd;}

          #user th {
          padding-top: 12px;
          padding-bottom: 12px;
          text-align: left;
          background-color: #000661;
          color: white;
          }
     </style>
</head>
<body>
     <h1>Laporan Data Pengajuan Penarikan Tabungan</h1>

     <table id="user">
          <thead>
               <tr class="text-center">
                    <th>No</th>
                    <th>Kode</th>
                    <th>Nama</th>
                    <th>Kelas</th>
                    <th>Saldo</th>
                    <th>Penarikan</th>
                    <th>Alasan</th>
                    <th>Status</th>
                    <th>Diajukan</th>
               </tr>
          </thead>
          <tbody>
               @foreach($pengajuan as $pengajuans)
                    <tr>
                         <td>{{$loop->iteration}}</td>
                         <td>{{$pengajuans->id_tabungan}}</td>
                         <td>{{$pengajuans->nama}}</td>
                         <td>{{$pengajuans->kelas}}</td>
                         <td>{{$pengajuans->jumlah_tabungan}}</td>
                         <td>{{$pengajuans->jumlah_penarikan}}</td>
                         <td>{{$pengajuans->alasan}}</td>
                         <td>{{$pengajuans->status}}</td>
                         <td>{{ \Carbon\Carbon::parse($pengajuans->created_at)->format('H:i, F d y') }}</td>
                    </tr>
               @endforeach
          </tbody>
     </table>
</body>
</html>