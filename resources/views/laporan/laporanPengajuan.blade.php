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
                                                            <a href="/exportpengajuanexcel" class="btn btn-sm btn-success btn-rounded m-1">
                                                                 Export Excel
                                                            </a>
                                                            <a href="/exportpengajuanpdf" class="btn btn-sm btn-danger btn-rounded m-1">
                                                                 Export PDF
                                                            </a>
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
                                                            <th>Kode</th>
                                                            <th>Nama</th>
                                                            <th>Kelas</th>
                                                            <th>Jumlah Saldo</th>
                                                            <th>Jumlah Penarikan</th>
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