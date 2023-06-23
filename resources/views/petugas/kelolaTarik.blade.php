<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <title>Tarik Tabungan - SITASU</title>

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
                    <h4 class="card-title">Tarik Tabungan</h4>
                    <hr>
                    {{-- Row 1 --}}
                    <div class="row">
                         <div class="col-lg-3 grid-margin">
                              <div class="card">
                                   <div class="card-body">
                                        <div class="col-sm-12">
                                             <div class="statistics-details d-flex align-items-center justify-content-between">
                                                  <div>
                                                       <p class="statistics-title">Jumlah Saldo Keseluruhan</p>
                                                       <h3 class="rate-percentage">Rp. 11.525.000</h3>
                                                  </div>
                                             </div>
                                        </div>
                                   </div>
                              </div>
                         </div>
                         <div class="col-lg-3 grid-margin">
                              <div class="card">
                                   <div class="card-body">
                                        <div class="col-sm-12">
                                             <div class="statistics-details d-flex align-items-center justify-content-between">
                                                  <div>
                                                       <p class="statistics-title">Jumlah Tarik Keseluruhan</p>
                                                       <h3 class="rate-percentage">Rp. 15.923.000</h3>
                                                  </div>
                                             </div>
                                        </div>
                                   </div>
                              </div>
                         </div>
                         <div class="col-lg-2 grid-margin">
                              <div class="card">
                                   <div class="card-body">
                                        <div class="col-sm-12">
                                             <div class="statistics-details d-flex align-items-center justify-content-between">
                                                  <div>
                                                       <p class="statistics-title">Jumlah Tarik Bulan Ini</p>
                                                       <h3 class="rate-percentage">Rp. 1.478.000</h3>
                                                  </div>
                                             </div>
                                        </div>
                                   </div>
                              </div>
                         </div>
                         <div class="col-lg-2 grid-margin">
                              <div class="card">
                                   <div class="card-body">
                                        <div class="col-sm-12">
                                             <div class="statistics-details d-flex align-items-center justify-content-between">
                                                  <div>
                                                       <p class="statistics-title">Jumlah Tarik Minggu Ini</p>
                                                       <h3 class="rate-percentage">Rp. 705.000</h3>
                                                  </div>
                                             </div>
                                        </div>
                                   </div>
                              </div>
                         </div>
                         <div class="col-lg-2 grid-margin">
                              <div class="card">
                                   <div class="card-body">
                                        <div class="col-sm-12">
                                             <div class="statistics-details d-flex align-items-center justify-content-between">
                                                  <div>
                                                       <p class="statistics-title">Jumlah Tarik Hari Ini</p>
                                                       <h3 class="rate-percentage">Rp. 211.000</h3>
                                                  </div>
                                             </div>
                                        </div>
                                   </div>
                              </div>
                         </div>
                    </div>

                    <div class="card mb-4">
                         <div class="card-body">
                              <div class="row" style="margin-bottom: -20px;">
                                   <div class="form-group col-md-3">
                                        <label for="id">ID Siswa</label>
                                        <div class="d-flex justify-content-between">
                                             <input type="text" class="form-control rounded" id="id" name="id" placeholder="ID Siswa">
                                             <button type="button" class="btn btn-sm btn-primary btn-rounded" style="margin-left: 10px;">
                                                  Cari
                                             </button>
                                        </div>
                                   </div>
                                   <div class="form-group col-md-2">
                                        <label for="nama">Nama Siswa</label>
                                        <input type="text" class="form-control rounded" id="nama" name="nama" placeholder="Nama" readonly>
                                   </div>
                                   <div class="form-group col-md-2">
                                        <label for="jumlah_tabungan">Jumlah Tabungan</label>
                                        <input type="text" class="form-control rounded" id="jumlah_tabungan" name="jumlah_tabungan" placeholder="Tabungan" readonly>
                                   </div>
                                   <div class="form-group col-md-2">
                                        <label for="jumlah_dibuku">Jumlah Tabungan Dibuku</label>
                                        <input type="text" class="form-control rounded" id="jumlah_dibuku" name="jumlah_dibuku" placeholder="Tabungan Dibuku" readonly>
                                   </div>
                                   <div class="form-group col-md-2">
                                        <label for="jumlah_tarik">Masukan Jumlah Tarik</label>
                                        <input type="text" class="form-control rounded" id="jumlah_tarik" name="jumlah_tarik" placeholder="Jumlah Tarik">
                                   </div>
                                   <div class="form-group col-md-1">
                                        <button type="button" class="btn btn-sm btn-primary m-1 btn-rounded p-3 mt-3">
                                             Tambah
                                        </button>
                                   </div>
                              </div>
                         </div>
                    </div>

                    <div class="card">
                         <div class="card-body">
                              <div class="col-lg-12 d-flex  justify-content-between">
                                   <h4 class="card-title mt-2">Data Tarik Tabungan</h4>
                                   <div class="d-flex justify-content-between">
                                        <input type="text" class="form-control btn-sm rounded h-auto m-1" id="nama" name="nama" placeholder="Cari Nama Siswa">
                                        <button type="button" class="btn btn-sm btn-primary m-1 btn-rounded">
                                             Search
                                        </button>
                                   </div>
                              </div>
                              {{-- Row 2 --}}
                              <div class="row m-2 mt-4">
                                   <div class="col-lg-12 grid-margin">
                                        <div class="col-sm-12 statistics-details d-flex align-items-center justify-content-between">
                                             <div class="statistics-details d-flex align-items-center justify-content-between">
                                                  <div>
                                                       <p class="statistics-title">Kelas 1 - A</p>
                                                       <h4 class="rate-percentage">Rp. 523.000</h4>
                                                  </div>
                                             </div>
                                             <div class="statistics-details d-flex align-items-center justify-content-between">
                                                  <div>
                                                       <p class="statistics-title">Kelas 1 - B</p>
                                                       <h4 class="rate-percentage">Rp. 234.000</h4>
                                                  </div>
                                             </div>
                                             <div class="statistics-details d-flex align-items-center justify-content-between">
                                                  <div>
                                                       <p class="statistics-title">Kelas 2 - A</p>
                                                       <h4 class="rate-percentage">Rp. 145.000</h4>
                                                  </div>
                                             </div>
                                             <div class="statistics-details d-flex align-items-center justify-content-between">
                                                  <div>
                                                       <p class="statistics-title">Kelas 2 - B</p>
                                                       <h4 class="rate-percentage">Rp. 632.000</h4>
                                                  </div>
                                             </div>
                                             <div class="statistics-details d-flex align-items-center justify-content-between">
                                                  <div>
                                                       <p class="statistics-title">Kelas 3 - A</p>
                                                       <h4 class="rate-percentage">Rp. 345.000</h4>
                                                  </div>
                                             </div>
                                             <div class="statistics-details d-flex align-items-center justify-content-between">
                                                  <div>
                                                       <p class="statistics-title">Kelas 3 - B</p>
                                                       <h4 class="rate-percentage">Rp. 734.000</h4>
                                                  </div>
                                             </div>
                                             <div class="statistics-details d-flex align-items-center justify-content-between">
                                                  <div>
                                                       <p class="statistics-title">Kelas 4</p>
                                                       <h4 class="rate-percentage">Rp. 124.000</h4>
                                                  </div>
                                             </div>
                                             <div class="statistics-details d-flex align-items-center justify-content-between">
                                                  <div>
                                                       <p class="statistics-title">Kelas 5</p>
                                                       <h4 class="rate-percentage">Rp. 912.000</h4>
                                                  </div>
                                             </div>
                                             <div class="statistics-details d-flex align-items-center justify-content-between">
                                                  <div>
                                                       <p class="statistics-title">Kelas 6</p>
                                                       <h4 class="rate-percentage">Rp. 233.000</h4>
                                                  </div>
                                             </div>

                                        </div>
                                   </div>
                              </div>
                              <div class="table-responsive">
                                   <table id="table-data " class="table table-striped text-center">
                                        <thead>
                                             <tr class="text-center">
                                                  <th>Opsi</th>
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

                                        </tbody>
                                   </div>
                              </table>
                         </div>
                    </div>
               </div>
          </div>
     </div>
</div>

     <!-- Script -->
     @include('layouts.script')


</body>
</html>
