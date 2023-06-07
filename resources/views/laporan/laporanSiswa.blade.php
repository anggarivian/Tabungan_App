<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <title>Kelola Siswa - SITASU</title>

     @include('layouts.head')

</head>

<body>
     <div class="container-scroller">
          <!-- Navigation Bar -->
          @include('layouts.navbar')

          <!-- Content Main -->
          <div class="container-fluid page-body-wrapper">
               @include('layouts.color')

               <!-- Side Bar -->
               @include('layouts.sidebar')

               <!-- Content -->
               <div class="main-panel">
                    <div class="content-wrapper">
                    <div class="row">
                         <div class="col-lg-12 grid-margin">
                              <div class="card mb-3">
                                   <div class="card-body" >
                                        <div class="col-sm-12">
                                             <div class="statistics-details d-flex align-items-center justify-content-between">
                                                  <h4 class="card-title" >Laporan Siswa</h4>
                                                  <button type="button" class="btn btn-primary btn-rounded" data-bs-toggle="modal" data-bs-target="#tambahModal">
                                                       Export
                                                  </button>
                                             </div>
                                        </div>
                                   </div>
                              </div>
                              <div class="card">
                                   <div class="card-body">
                                        <div class="table-responsive">
                                             <table id="table-data " class="table table-striped text-center">
                                                  <thead>
                                                       <tr class="text-center">
                                                            <th>No</th>
                                                            <th>ID</th>
                                                            <th>Username</th>
                                                            <th>Nama</th>
                                                            <th>Jenis Kelamin</th>
                                                            <th>Email</th>
                                                            <th>Kelas</th>
                                                            <th>Kontak</th>
                                                            <th>Orang Tua</th>
                                                            <th>Alamat</th>
                                                            <th>Tanggal Dibuat</th>
                                                       </tr>
                                                  </thead>
                                                  <tbody>
                                                       @php $no=1; @endphp
                                                       @foreach($user as $users)
                                                       @if ($users->relationToRole->id == '3')
                                                            <tr>
                                                                 <td class="text-center">{{$no++}}</td>
                                                                 <td class="text-center">{{$users->id}}</td>
                                                                 <td>{{$users->username}}</td>
                                                                 <td>{{$users->nama}}</td>
                                                                 <td>{{$users->jenis_kelamin}}</td>
                                                                 <td>{{$users->email}}</td>
                                                                 <td>{{$users->kelas}}</td>
                                                                 <td>{{$users->kontak}}</td>
                                                                 <td>{{$users->orang_tua}}</td>
                                                                 <td>{{$users->alamat}}</td>
                                                                 <td>{{$users->created_at}}</td>
                                                            </tr>
                                                       @endif
                                                       @endforeach
                                                  </tbody>
                                             </div>
                                        </table>
                                   </div>
                              </div>
                              </div>
                         </div>
                    </div>
                    </div>
               </div>
          </div>
     </div>
<!-- End Content Main -->

<!-- Script -->
@include('layouts.script')

</body>
</html>