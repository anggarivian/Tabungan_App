<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <title>Laporan Petugas</title>

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
                                                  <h4 class="card-title" >Laporan Petugas</h4>
                                                  <div>
                                                       <button type="button" class="btn btn-primary btn-rounded">
                                                            <i class="fa-solid fa-download"></i>
                                                            Export
                                                       </button>
                                                       <button type="button" class="btn btn-primary btn-rounded">
                                                            <i class="fa-solid fa-download"></i>
                                                            Import
                                                       </button>
                                                  </div>
                                             </div>
                                        </div>
                                   </div>
                              </div>
                              <div class="card">
                                   <div class="card-body">
                                        <table id="table-data" class="table table-striped text-center">
                                             <thead>
                                                  <tr class="text-center">
                                                       <th>No</th>
                                                       <th>ID Petugas</th>
                                                       <th>Nama</th>
                                                       <th>Jenis Kelamin</th>
                                                       <th>Email</th>
                                                       <th>Role</th>
                                                       <th>Kontak</th>
                                                       <th>Tanggal Dibuat</th>
                                                  </tr>
                                             </thead>
                                             <tbody>
                                                  @foreach($user as $users)
                                                       <tr>
                                                            <td>{{$loop->iteration}}</td>
                                                            <td>{{$users->id}}</td>
                                                            <td>{{$users->nama}}</td>
                                                            <td>{{$users->jenis_kelamin}}</td>
                                                            <td>{{$users->email}}</td>
                                                            <td>{{$users->roles_id}}</td>
                                                            <td>{{$users->kontak}}</td>
                                                            <td>{{$users->created_at}}</td>
                                                       </tr>
                                                  @endforeach
                                             </tbody>
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