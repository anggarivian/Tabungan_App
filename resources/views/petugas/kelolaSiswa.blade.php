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
                                                  <h4 class="card-title" >Kelola Siswa</h4>
                                                  <button type="button" class="btn btn-primary btn-rounded" data-bs-toggle="modal" data-bs-target="#tambahModal">
                                                       Tambah Data Siswa
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
                                                       @php $no=1; @endphp
                                                       @foreach($user as $users)
                                                       @if ($users->relationToRole->id == '3')
                                                            <tr>
                                                                 <td class="text-center">
                                                                      <button type="button" class="btn btn-warning btn-sm btn-rounded" data-id="{{ $users->id }}" id="btn-edit-user" data-bs-toggle="modal" data-bs-target="#editModal">
                                                                           Edit
                                                                      </button>
                                                                      <a type="button" href="/admin/siswa/delete/{{$users->id}}" class="btn btn-danger btn-rounded btn-sm">
                                                                           Hapus
                                                                      </a>
                                                                 </td>
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

<!-- Tambah Modal -->
<div class="modal fade" id="tambahModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog">
          <div class="modal-content">
               <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Siswa</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <div class="modal-body">
                    <form method="post" action="{{ route('siswa.store')}}" enctype="multipart/form-data">
                         @csrf
                         <div class="row">
                              <div class="form-group col-md-6">
                                   <label for="nama">Nama</label>
                                   <input type="text" class="form-control rounded" id="nama" name="nama" placeholder="Nama">
                              </div>
                              <div class="form-group col-md-6">
                                   <label for="username">Username</label>
                                   <input type="text" class="form-control rounded" id="username" name="username" placeholder="Username">
                              </div>
                              <div class="form-group col-md-6">
                                   <label for="email">Email Address</label>
                                   <input type="email" class="form-control rounded" id="email" name="email" placeholder="Email">
                              </div>
                              <div class="form-group col-md-6">
                                   <label for="kontak">Nomor Telepon</label>
                                   <input type="text" class="form-control rounded" id="kontak" name="kontak" placeholder="Kontak">
                              </div>
                              <div class="form-group col-md-6">
                                   <label for="password">Password</label>
                                   <input type="password" class="form-control rounded" id="password" name="password" placeholder="Password">
                              </div>
                              <div class="form-group col-md-6">
                                   <label for="jenis_kelamin">Jenis Kelamin</label>
                                   <select name="jenis_kelamin" class="form-select form-select-sm" id="jenis_kelamin">
                                   <option value="Laki - Laki">Laki - Laki</option>
                                   <option value="Perempuan">Perempuan</option>
                              </select>
                              </div>
                              <div class="form-group col-md-6">
                                   <label for="kelas">Kelas</label>
                                   <select name="kelas" class="form-select form-select-sm" id="kelas">
                                        <option value="1A">1 - A</option>
                                        <option value="1B">1 - B</option>
                                        <option value="2A">2 - A</option>
                                        <option value="2B">2 - B</option>
                                        <option value="3A">3 - A</option>
                                        <option value="3B">3 - B</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                   </select>
                              </div>
                              <div class="form-group col-md-6">
                                   <label for="orang_tua">Nama Orang Tua</label>
                                   <input type="text" class="form-control rounded" id="orang_tua" name="orang_tua" placeholder="Orang_tua">
                              </div>
                              <div class="form-group">
                                   <label for="alamat">Alamat</label>
                                   <input type="text" class="form-control rounded" id="alamat" name="alamat" placeholder="Alamat">
                              </div>
                         </div>
                         <div class="modal-footer justify-content-between">
                              <button type="button" class="btn btn-secondary btn-rounded" data-bs-dismiss="modal">Batal</button>
                              <button type="submit" class="btn btn-primary btn-rounded">Tambah Data Siswa</button>
                         </div>
                    </form>
               </div>
          </div>
     </div>
</div>
<!-- End Modal -->
<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog">
          <div class="modal-content">
               <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data Petugas</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <div class="modal-body">
                    <form method="post" action="{{ route('siswa.ubah')}}" enctype="multipart/form-data">
                         @method ('PATCH')
                         @csrf
                         <div class="row">
                              {{-- <div class="form-group col-md-6">
                                   <label for="id">Id</label> --}}
                                   <input type="text" class="form-control rounded" id="edit-id" name="id" placeholder="Id" readonly hidden>
                              {{-- </div> --}}
                              <div class="form-group col-md-6">
                                   <label for="nama">Nama</label>
                                   <input type="text" class="form-control rounded" id="edit-nama" name="nama" placeholder="Nama">
                              </div>
                              <div class="form-group col-md-6">
                                   <label for="username">Username</label>
                                   <input type="text" class="form-control rounded" id="edit-username" name="username" placeholder="Username" readonly>
                              </div>
                              <div class="form-group col-md-6">
                                   <label for="email">Email Address</label>
                                   <input type="email" class="form-control rounded" id="edit-email" name="email" placeholder="Email">
                              </div>
                              <div class="form-group col-md-6">
                                   <label for="kontak">Nomor Telepon</label>
                                   <input type="text" class="form-control rounded" id="edit-kontak" name="kontak" placeholder="Kontak">
                              </div>
                              <div class="form-group col-md-6">
                                   <label for="password">Password</label>
                                   <input type="password" class="form-control rounded" id="edit-password" name="password" placeholder="Password">
                              </div>
                              <div class="form-group col-md-6">
                                   <label for="jenis_kelamin">Jenis Kelamin</label>
                                   <select name="jenis_kelamin" class="form-select form-select-sm" id="edit-jenis_kelamin">
                                        <option value="Laki - Laki">Laki - Laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                   </select>
                              </div>
                              <div class="form-group col-md-6">
                                   <label for="kelas">Kelas</label>
                                   <select name="kelas" class="form-select form-select-sm" id="edit-kelas">
                                        <option value="1A">1 - A</option>
                                        <option value="1B">1 - B</option>
                                        <option value="2A">2 - A</option>
                                        <option value="2B">2 - B</option>
                                        <option value="3A">3 - A</option>
                                        <option value="3B">3 - B</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                   </select>
                              </div>
                              <div class="form-group col-md-6">
                                   <label for="orang_tua">Nama Orang Tua</label>
                                   <input type="text" class="form-control rounded" id="edit-orang_tua" name="orang_tua" placeholder="Orang_tua">
                              </div>
                              <div class="form-group">
                                   <label for="alamat">Alamat</label>
                                   <input type="text" class="form-control rounded" id="edit-alamat" name="alamat" placeholder="Alamat">
                              </div>
                         </div>
                         <div class="modal-footer justify-content-center">
                              <button type="button" class="btn btn-secondary btn-rounded" data-bs-dismiss="modal">Batal</button>
                              <button type="submit" class="btn btn-primary btn-rounded">Simpan</button>
                         </div>
                    </form>
               </div>
          </div>
     </div>
</div>
<!-- End Modal -->

<!-- Script -->
@include('layouts.script')

<script>
     $(function(){
          $(document).on('click','#btn-edit-user', function(){

               let id = $(this).data('id');

               $.ajax({
                    type: "get",
                    url: "{{url('/admin/ajaxadmin/dataUser')}}/"+id,
                    dataType: 'json',
                    success: function(res){
                         $('#edit-id').val(res.id);
                         $('#edit-nama').val(res.nama);
                         $('#edit-username').val(res.username);
                         $('#edit-email').val(res.email);
                         $('#edit-password').val(res.password);
                         $('#edit-jenis_kelamin').val(res.jenis_kelamin);
                         $('#edit-kontak').val(res.kontak);
                         $('#edit-kelas').val(res.kelas);
                         $('#edit-alamat').val(res.alamat);
                         $('#edit-orang_tua').val(res.orang_tua);
                    },
               });
          });
     });
</script>
</body>
</html>