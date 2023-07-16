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
                    <th>Saldo Awal</th>
                    <th>Saldo Akhir</th>
                    <th>Stor</th>
                    <th>Tarik</th>
                    <th>Biaya</th>
                    <th>Sisa</th>
                    <th>Dibuat</th>
               </tr>
          </thead>
          <tbody>
               @foreach($tabungan as $tabungans)
                    <tr>
                         <td>{{$loop->iteration}}</td>
                         <td>{{$tabungans->id_tabungan}}</td>
                         <td>{{$tabungans->nama}}</td>
                         <td>{{$tabungans->kelas}}</td>
                         <td>{{$tabungans->saldo_awal}}</td>
                         <td>{{$tabungans->saldo_akhir}}</td>
                         @if ($tabungans->tipe_transaksi == null)
                              <td>-</td>
                              <td>-</td>
                         @endif
                         @if ($tabungans->tipe_transaksi == 'Stor')
                              <td>{{$tabungans->jumlah}}</td>
                              <td>-</td>
                         @endif
                         @if ($tabungans->tipe_transaksi == 'Tarik')
                              <td>-</td>
                              <td>{{$tabungans->jumlah}}</td>
                         @endif
                         <td>{{$tabungans->premi}}</td>
                         <td>{{$tabungans->sisa}}</td>
                         <td>{{ \Carbon\Carbon::parse($tabungans->created_at)->format('H:i, F d y') }}</td>
                    </tr>
               @endforeach
          </tbody>
     </table>
</body>
</html>