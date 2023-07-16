<html>
<head>
     <title> Laporan Data Petugas </title>
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
     <h1>Data Akun Petugas</h1>

     <table id="user">
          <thead>
               <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Username</th>
                    <th>Jenis Kelamin</th>
                    <th>Email</th>
                    <th>Kontak</th>
                    <th>Dibuat</th>
               </tr>
          </thead>
          <tbody>
               @foreach($userPetugas as $users)
                    <tr>
                         <td class="text-center">{{$loop->iteration}}</td>
                         <td>{{$users->nama}}</td>
                         <td>{{$users->id_tabungan}}</td>
                         <td>{{$users->jenis_kelamin}}</td>
                         <td>{{$users->email}}</td>
                         <td>{{$users->kontak}}</td>
                         <td>{{ \Carbon\Carbon::parse($users->created_at)->format('H:i, F d y') }}</td>
                    </tr>
               @endforeach
          </tbody>
     </table>
</body>
</html>