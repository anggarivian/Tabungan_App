<!DOCTYPE html>
<html lang="en">

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
                         <div class="card-body">
                              <div class="row " >
                                   <form method="post" class="d-flex" action="{{ route('tabungan.stor.tambah')}}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group col-md-2 m-1">
                                             <label for="id">ID Siswa</label>
                                             <select name="selectuser" class="form-control" id="selectuser">
                                                  <option selected >Pilih Siswa</option>
                                                  @foreach($stor as $key => $value)
                                                       <option value="{{$value->relationToUser->id_tabungan}}" id="getname"
                                                            data-name="{{ $value->relationToUser->nama }}"
                                                            data-kelas="{{ $value->relationToUser->kelas }}"
                                                            data-tabungan="{{ $value->jumlah_tabungan }}"
                                                            data-sisa="{{ $value->sisa}}"
                                                            data-it="{{$value->relationToUser->id}}"
                                                            data-dibuku="{{ $value->jumlah_dibuku }}" >
                                                            {{$value->relationToUser->id_tabungan}}
                                                       </option>
                                                  @endforeach
                                             </select>
                                        </div>
                                        <div class="form-group col-md-2 m-1">
                                             <label for="nama">Nama Siswa</label>
                                             <input type="text" class="form-control rounded" id="users_id" name="users_id" placeholder="Users_id" hidden>
                                             <input type="text" class="form-control rounded" id="nama" name="nama" placeholder="Nama" readonly>
                                        </div>
                                        <div class="form-group col-md-1 m-1">
                                             <label for="kelas">Kelas</label>
                                             <input type="text" class="form-control rounded" id="kelas" name="kelas" placeholder="Kelas" readonly>
                                        </div>
                                        <div class="form-group col-md-2 m-1">
                                             <label for="jumlah_tabungan">Jumlah Tabungan</label>
                                             <input type="text" class="form-control rounded" id="jumlah_tabungan" name="jumlah_tabungan" placeholder="Tabungan" readonly>
                                        </div>
                                        <div class="form-group col-md-2 m-1">
                                             <label for="jumlah_dibuku">Jumlah Tabungan Dibuku</label>
                                             <input type="text" class="form-control rounded" id="jumlah_dibuku" name="jumlah_dibuku" placeholder="Tabungan Dibuku">
                                        </div>
                                        <div class="form-group col-md-2 m-1">
                                             <label for="jumlah_stor">Masukan Jumlah Stor</label>
                                             <input type="text" class="form-control rounded" id="jumlah_stor" name="jumlah_stor" placeholder="Jumlah Stor">
                                        </div>
                                        <div class="form-group col-md-1 m-1">
                                             <button type="submit" class="btn btn-sm btn-primary m-1 btn-rounded p-3 mt-3">
                                                  Tambah
                                             </button>
                                             <input type="text" id="id_tabungan" name="id_tabungan" hidden>
                                             <input type="text" id="jenis_kelamin" name="jenis_kelamin" hidden>
                                             <input type="text" id="kontak" name="kontak" hidden>
                                             <input type="text" id="orang_tua" name="orang_tua" hidden>
                                             <input type="text" id="alamat" name="alamat" hidden>
                                             <input type="text" id="sisa" name="sisa" hidden>
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
                                                  <th>No</th>
                                                  <th>Kode</th>
                                                  <th>Nama</th>
                                                  <th>Kelas</th>
                                                  <th>Kontak</th>
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
                                                            <td class="text-center">{{$stors->relationToUser->id_tabungan}}</td>
                                                            <td>{{$stors->relationToUser->nama}}</td>
                                                            <td>{{$stors->relationToUser->kelas}}</td>
                                                            <td>{{$stors->relationToUser->kontak}}</td>
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
               </div>
          </div>
     </div>
</div>

     <!-- Script -->
     @include('layouts.script')

     <script>
          var selectElement   = document.getElementById('selectuser');
          var inputID         = document.getElementById('id_tabungan');
          var inputNama       = document.getElementById('nama');
          var inputKelas      = document.getElementById('kelas');
          var inputKontak     = document.getElementById('kontak');
          var inputOrtu       = document.getElementById('orang_tua');
          var inputAlamat     = document.getElementById('alamat');
          var inputTabungan   = document.getElementById('jumlah_tabungan');
          var inputDibuku     = document.getElementById('jumlah_dibuku');
          var inputJK         = document.getElementById('jenis_kelamin');
          var inputSisa       = document.getElementById('sisa');
          var inputIT         = document.getElementById('users_id');

          selectElement.addEventListener('change', function() {
               var selectedOption  = selectElement.options[selectElement.selectedIndex];
               var itemNama        = selectedOption.getAttribute('data-name');
               var itemID          = selectedOption.getAttribute('data-id');
               var itemKelas       = selectedOption.getAttribute('data-kelas');
               var itemTabungan    = selectedOption.getAttribute('data-tabungan');
               var itemDibuku      = selectedOption.getAttribute('data-dibuku');
               var itemJK          = selectedOption.getAttribute('data-jk');
               var itemKontak      = selectedOption.getAttribute('data-kontak');
               var itemOrtu        = selectedOption.getAttribute('data-ortu');
               var itemAlamat      = selectedOption.getAttribute('data-alamat');
               var itemSisa        = selectedOption.getAttribute('data-sisa');
               var itemIT          = selectedOption.getAttribute('data-it');
               inputNama.value     = itemNama;
               inputID.value       = itemID;
               inputKelas.value    = itemKelas;
               inputTabungan.value = itemTabungan;
               inputDibuku.value   = itemDibuku;
               inputJK.value       = itemJK;
               inputKontak.value   = itemKontak;
               inputOrtu.value     = itemOrtu;
               inputAlamat.value   = itemAlamat;
               inputSisa.value     = itemSisa;
               inputIT.value       = itemIT;
          });
     </script>

</body>
</html>
