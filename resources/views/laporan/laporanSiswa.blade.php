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
                                                  <div>
                                                       <button type="button" class="btn btn-sm btn-primary btn-rounded m-1" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                            Import Excel
                                                       </button>
                                                       <a href="/exportsiswaexcel" class="btn btn-sm btn-success btn-rounded m-1">
                                                            Export Excel
                                                       </a>
                                                       <a href="/exportsiswapdf" class="btn btn-sm btn-danger btn-rounded m-1">
                                                            Export PDF
                                                       </a>
                                                  </div>
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
                                                            <th>Kode</th>
                                                            <th>Nama</th>
                                                            <th>Jenis Kelamin</th>
                                                            <th>Kelas</th>
                                                            <th>Kontak</th>
                                                            <th>Orang Tua</th>
                                                            <th>Alamat</th>
                                                            <th>Tanggal Dibuat</th>
                                                       </tr>
                                                  </thead>
                                                  <tbody>
                                                       @foreach($userSiswa as $users)
                                                            <tr>
                                                                 <td class="text-center">{{$loop->iteration}}</td>
                                                                 <td class="text-center">{{$users->id_tabungan}}</td>
                                                                 <td>{{$users->nama}}</td>
                                                                 <td>{{$users->jenis_kelamin}}</td>
                                                                 <td>{{$users->kelas}}</td>
                                                                 <td>{{$users->kontak}}</td>
                                                                 <td>{{$users->orang_tua}}</td>
                                                                 <td>{{$users->alamat}}</td>
                                                                 <td>{{ \Carbon\Carbon::parse($users->created_at)->format('H:i, F d y') }}</td>
                                                            </tr>
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

<!-- Import Excel -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog">
          <div class="modal-content">
               <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Import Data Siswa</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <form action="/importsiswaexcel" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body" style="margin-bottom: -30px">
                         <label for="file" class="m-1">Pilih File Excel</label>
                         <div class="form-group">
                              <input type="file" class="form-control rounded" style="padding-bottom: 28px" name="file" required>
                         </div>
                    </div>
                    <div class="modal-footer">
                         <button type="button" class="btn btn-secondary btn-rounded" data-bs-dismiss="modal">Batal</button>
                         <button type="submit" class="btn btn-primary btn-rounded">Import</button>
                    </div>
               </form>
          </div>
     </div>
</div>

<!-- Script -->
@include('layouts.script')

</body>
</html>