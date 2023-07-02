<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <title>Pengajuan Penarikan - SITASU</title>

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
                              <div class="card">
                                   <div class="card-body">
                                        <h4 class="card-title" >Data Pengajuan Penarikan Tabungan</h4>
                                        <table id="table-data" class="table table-striped">
                                             <thead>
                                                  <tr class="text-center">
                                                       <th>No</th>
                                                       <th>ID</th>
                                                       <th>Nama</th>
                                                       <th>Jenis Kelamin</th>
                                                       <th>Email</th>
                                                       <th>Kontak</th>
                                                       <th>Tanggal Dibuat</th>
                                                       <th>Opsi</th>
                                                  </tr>
                                             </thead>
                                             <tbody>

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