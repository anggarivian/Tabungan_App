<!DOCTYPE html>
<html lang="en">
     @include('sweetalert::alert')
<head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <title>Stor Tabungan - SITASU</title>

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
                    <h4 class="card-title">Stor Tabungan</h4>
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
                                                       <h3 class="rate-percentage">Rp. {{$hitungTotalSaldo}}</h3>
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
                                                       <p class="statistics-title">Jumlah Stor Keseluruhan</p>
                                                       <h3 class="rate-percentage">Rp. {{$hitungTotalStor}}</h3>
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
                                                       <p class="statistics-title">Jumlah Stor Bulan Ini</p>
                                                       <h3 class="rate-percentage">Rp. {{$bulanStor}}</h3>
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
                                                       <p class="statistics-title">Jumlah Stor Minggu Ini</p>
                                                       <h3 class="rate-percentage">Rp. {{$mingguStor}}</h3>
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
                                                       <p class="statistics-title">Jumlah Stor Hari Ini</p>
                                                       <h3 class="rate-percentage">Rp. {{$hariStor}}</h3>
                                                  </div>
                                             </div>
                                        </div>
                                   </div>
                              </div>
                         </div>
                    </div>

                    <div class="card mb-4">
                         <div class="card-body" style="margin-bottom: -25px ;">
                              <div class="row" >
                                   <form method="post" action="{{ route('tabungan.stor.tambah')}}" enctype="multipart/form-data">
                                        @method ('PATCH')
                                        @csrf
                                        <div class="row">
                                             <div class="form-group col-md-2 ">
                                                  <label for="id">ID Siswa</label>
                                                  <select name="selectuser" class="form-control" id="selectuser">
                                                       <option selected >Pilih Siswa</option>
                                                       @foreach($storTerbaru as $key => $value)
                                                            @if ($value->relationToRole->id == '3')
                                                            <option value="{{$value->id_tabungan}}" id="getname"
                                                                 data-id="{{ $value->id }}"
                                                                 data-nama="{{ $value->nama }}"
                                                                 data-kelas="{{ $value->kelas }}"
                                                                 data-tabungan="{{ $value->jumlah_tabungan }}"
                                                                 data-dibuku="{{ $value->jumlah_dibuku }}">
                                                                 {{$value->id_tabungan}}
                                                            </option>
                                                            @endif
                                                       @endforeach
                                                  </select>
                                             </div>
                                             <div class="form-group col-md-2 ">
                                                  <label for="nama">Nama Siswa</label>
                                                  <input type="text" class="form-control rounded" id="id" name="id" placeholder="id" hidden>
                                                  <input type="text" class="form-control rounded" id="nama" name="nama" placeholder="Nama" readonly>
                                             </div>
                                             <div class="form-group col-md-1 ">
                                                  <label for="kelas">Kelas</label>
                                                  <input type="text" class="form-control rounded" id="kelas" name="kelas" placeholder="Kelas" readonly>
                                             </div>
                                             <div class="form-group col-md-2 ">
                                                  <label for="jumlah_tabungan">Jumlah Tabungan</label>
                                                  <input type="text" class="form-control rounded" id="jumlah_tabungan" name="jumlah_tabungan" placeholder="Tabungan" readonly>
                                             </div>
                                             <div class="form-group col-md-2 ">
                                                  <label for="jumlah_dibuku">Jumlah Tabungan Dibuku</label>
                                                  <input type="text" class="form-control rounded" id="jumlah_dibuku" name="jumlah_dibuku" placeholder="Tabungan Dibuku">
                                             </div>
                                             <div class="form-group col-md-2 ">
                                                  <label for="jumlah_stor">Masukan Jumlah Stor</label>
                                                  <input type="text" class="form-control rounded" id="jumlah_stor" name="jumlah_stor" placeholder="Jumlah Stor">
                                             </div>
                                             <div class="form-group col-md-1 ">
                                                  <button type="submit" class="btn btn-sm btn-primary m-1 btn-rounded p-3 mt-3">
                                                       Tambah
                                                  </button>
                                             </div>
                                        </div>
                                   </form>
                              </div>
                         </div>
                    </div>

                    <div class="card">
                         <div class="card-body">
                              <div class="col-lg-12 d-flex  justify-content-between">
                                   <h4 class="card-title mt-2">Data Stor Tabungan</h4>
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
                                                       <h4 class="rate-percentage">Rp. {{$storKelas1A}}</h4>
                                                  </div>
                                             </div>
                                             <div class="statistics-details d-flex align-items-center justify-content-between">
                                                  <div>
                                                       <p class="statistics-title">Kelas 1 - B</p>
                                                       <h4 class="rate-percentage">Rp. {{$storKelas1B}}</h4>
                                                  </div>
                                             </div>
                                             <div class="statistics-details d-flex align-items-center justify-content-between">
                                                  <div>
                                                       <p class="statistics-title">Kelas 2 - A</p>
                                                       <h4 class="rate-percentage">Rp. {{$storKelas2A}}</h4>
                                                  </div>
                                             </div>
                                             <div class="statistics-details d-flex align-items-center justify-content-between">
                                                  <div>
                                                       <p class="statistics-title">Kelas 2 - B</p>
                                                       <h4 class="rate-percentage">Rp. {{$storKelas2B}}</h4>
                                                  </div>
                                             </div>
                                             <div class="statistics-details d-flex align-items-center justify-content-between">
                                                  <div>
                                                       <p class="statistics-title">Kelas 3 - A</p>
                                                       <h4 class="rate-percentage">Rp. {{$storKelas3A}}</h4>
                                                  </div>
                                             </div>
                                             <div class="statistics-details d-flex align-items-center justify-content-between">
                                                  <div>
                                                       <p class="statistics-title">Kelas 3 - B</p>
                                                       <h4 class="rate-percentage">Rp. {{$storKelas3B}}</h4>
                                                  </div>
                                             </div>
                                             <div class="statistics-details d-flex align-items-center justify-content-between">
                                                  <div>
                                                       <p class="statistics-title">Kelas 4</p>
                                                       <h4 class="rate-percentage">Rp. {{$storKelas4}}</h4>
                                                  </div>
                                             </div>
                                             <div class="statistics-details d-flex align-items-center justify-content-between">
                                                  <div>
                                                       <p class="statistics-title">Kelas 5</p>
                                                       <h4 class="rate-percentage">{{$storKelas5}}</h4>
                                                  </div>
                                             </div>
                                             <div class="statistics-details d-flex align-items-center justify-content-between">
                                                  <div>
                                                       <p class="statistics-title">Kelas 6</p>
                                                       <h4 class="rate-percentage">{{$storKelas6}}</h4>
                                                  </div>
                                             </div>

                                        </div>
                                   </div>
                              </div>
                              <div class="table-responsive">
                                   <table id="table-data " class="table table-striped text-center">
                                        <thead>
                                             <tr class="text-center">
                                                  <th>No</th>
                                                  <th>Kode</th>
                                                  <th>Nama</th>
                                                  <th>Kelas</th>
                                                  <th>Jumlah Tabungan</th>
                                                  <th>Jumlah Dibuku</th>
                                                  <th>Premi</th>
                                                  <th>Sisa</th>
                                                  <th>Tanggal Dibuat</th>
                                             </tr>
                                        </thead>
                                        <tbody>
                                             @php $no=1; @endphp
                                                  @foreach($stor as $stors)
                                                       <tr>
                                                            <td class="text-center">{{$no++}}</td>
                                                            <td class="text-center">{{$stors->id_tabungan}}</td>
                                                            <td>{{$stors->nama}}</td>
                                                            <td>{{$stors->kelas}}</td>
                                                            <td>{{$stors->jumlah_tabungan}}</td>
                                                            <td>{{$stors->jumlah_dibuku}}</td>
                                                            <td>{{$stors->premi}}</td>
                                                            <td>{{$stors->sisa}}</td>
                                                            <td>{{$stors->created_at}}</td>
                                                       </tr>
                                                  @endforeach
                                        </tbody>
                                   </div>
                              </table>
                         </div>
                    </div>
                    {{-- <div class="pagination justify-content-center">
                         {{ $storTabel->links() }}
                    </div> --}}
               </div>
          </div>
     </div>
</div>

     <!-- Script -->
     @include('layouts.script')

     <script>
          var selectElement   = document.getElementById('selectuser');
          var inputId         = document.getElementById('id');
          var inputNama       = document.getElementById('nama');
          var inputKelas      = document.getElementById('kelas');
          var inputTabungan   = document.getElementById('jumlah_tabungan');
          var inputDibuku     = document.getElementById('jumlah_dibuku');

          selectElement.addEventListener('change', function() {
               var selectedOption  = selectElement.options[selectElement.selectedIndex];
               var itemID          = selectedOption.getAttribute('data-id');
               var itemNama        = selectedOption.getAttribute('data-nama');
               var itemKelas       = selectedOption.getAttribute('data-kelas');
               var itemTabungan    = selectedOption.getAttribute('data-tabungan');
               var itemDibuku      = selectedOption.getAttribute('data-dibuku');
               inputId.value       = itemID;
               inputNama.value     = itemNama;
               inputKelas.value    = itemKelas;
               inputTabungan.value = itemTabungan;
               inputDibuku.value   = itemDibuku;
          });
     </script>

</body>
</html>
