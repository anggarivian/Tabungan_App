<html>
<head>
     <title> Laporan Data Petugas </title>
     <style>
          #customers {
          font-family: Arial, Helvetica, sans-serif;
          border-collapse: collapse;
          width: 100%;
          }

          #customers td, #customers th {
          border: 1px solid #ddd;
          padding: 8px;
          font-size: 12px;
          }

          #customers tr:nth-child(even){background-color: #f2f2f2;}

          #customers tr:hover {background-color: #ddd;}

          #customers th {
          padding-top: 12px;
          padding-bottom: 12px;
          text-align: left;
          background-color: #04AA6D;
          color: white;
          }
     </style>
</head>
<body>
     <h1>Data Akun Petugas</h1>

     <table id="customers">
          <thead>
               <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Username</th>
                    <th>Jenis Kelamin</th>
                    <th>Email</th>
                    <th>Kontak</th>
                    <th>Tanggal Dibuat</th>
               </tr>
          </thead>
          <tbody>
               @foreach($user as $users)
                    <tr>
                         <td class="text-center">{{$loop->iteration}}</td>
                         <td>{{$users->nama}}</td>
                         <td>{{$users->id_tabungan}}</td>
                         <td>{{$users->jenis_kelamin}}</td>
                         <td>{{$users->email}}</td>
                         <td>{{$users->kontak}}</td>
                         <td>{{$users->created_at}}</td>
                    </tr>
               @endforeach
          </tbody>
     </table>
</body>
</html>