<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <title>Beranda - SITASU</title>

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
                                                  <h4 class="card-title" >Kelola Petugas</h4>
                                                  <button type="submit" class="btn btn-primary">Tambah Data Petugas</button>
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
                                                       <th>Nama</th>
                                                       <th>JK</th>
                                                       <th>Password</th>
                                                       <th>Kontak</th>
                                                       <th>Tanggal</th>
                                                       <th>Opsi</th>
                                                  </tr>
                                             </thead>
                                             <tbody>
                                                  <tr>
                                                       <td>1</td>
                                                       <td>Angga Saepul Rivian</td>
                                                       <td>Laki-Laki</td>
                                                       <td>terserah</td>
                                                       <td>gtalowpc@gmail.com</td>
                                                       <td>11-23-2032</td>
                                                       <td>
                                                            <button type="button" class="btn btn-sm btn-warning btn-rounded" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                                 Edit
                                                            </button>
                                                            <button class="btn btn-sm btn-danger btn-rounded">Delete</button>
                                                       </td>
                                                  </tr>
                                                  <tr>
                                                       <td>2</td>
                                                       <td>Saepul Rivian</td>
                                                       <td>Perempuan</td>
                                                       <td>terserah</td>
                                                       <td>awdasdwfgg@gmail.com</td>
                                                       <td>13-23-2322</td>
                                                       <td>
                                                            <button class="btn btn-sm btn-warning btn-rounded">Edit</button>
                                                            <button class="btn btn-sm btn-danger btn-rounded">Delete</button>
                                                       </td>
                                                  </tr>
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
</div>

<!-- Edit Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog">
          <div class="modal-content">
               <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data Petugas</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <div class="modal-body">
                    <form class="forms-sample">
                         <div class="form-group">
                              <label for="exampleInputUsername1">Username</label>
                              <input type="text" class="form-control rounded" id="exampleInputUsername1" placeholder="Username">
                         </div>
                         <div class="form-group">
                              <label for="exampleInputEmail1">Email address</label>
                              <input type="email" class="form-control rounded" id="exampleInputEmail1" placeholder="Email">
                         </div>
                         <div class="form-group">
                              <label for="exampleInputPassword1">Password</label>
                              <input type="password" class="form-control rounded" id="exampleInputPassword1" placeholder="Password">
                         </div>
                         <div class="form-group">
                              <label for="exampleInputConfirmPassword1">Confirm Password</label>
                              <input type="password" class="form-control rounded" id="exampleInputConfirmPassword1" placeholder="Password">
                         </div>
                         <div class="modal-footer justify-content-center">
                              <button type="button" class="btn btn-secondary btn-rounded" data-bs-dismiss="modal">Batal</button>
                              <button type="button" class="btn btn-primary btn-rounded">Simpan Perubahan</button>
                         </div>
                    </form>
          </div>
     </div>
</div>
<!-- End Modal -->

<!-- Script -->
@include('layouts.script')

</body>
</html>