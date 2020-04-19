      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Data Master Ikan</h1>
          </div>

          <div class="section-body">
            <h2 class="section-title">Data Jenis Ikan di Kab. Bengkalis</h2>
            <p class="section-lead">
              Harap perhatikan inputan anda sebelum mengubah informasi.
            </p>
            @if (session('sukses'))
                <div class="alert alert-info alert-with-icon" data-notify="container">
                    <button type="button" aria-hidden="true" class="close">×</button>
                    <span data-notify="icon" class="pe-7s-bell"></span>
                    <span data-notify="message">{{ session('sukses') }}</span>
                </div>
            @elseif (session('gagal'))
                <div class="alert alert-danger alert-with-icon" data-notify="container">
                    <button type="button" aria-hidden="true" class="close">×</button>
                    <span data-notify="icon" class="pe-7s-bell"></span>
                    <span data-notify="message">{{ session('gagal') }}</span>
                </div>
            @endif
            @if(count($errors))
               <ul class="alert alert-danger">
                   @foreach($errors->all() as $error)
                      <li>{{$error}}</li>
                    @endforeach
               </ul>
            @endif
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <a href="#" class="btn btn-success" data-toggle="modal" data-target="#addModal">Tambah Jenis Ikan</a>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped" id="table-2">
                        <thead>
                          <tr>
                            <th>Jenis Ikan</th>
                            <th>Foto</th>
                            <th colspan="2">Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($fishes as $data)
                          <tr>
                            <td>{{$data->name}}</td>
                            <td>
                              <img alt="image" src="{{ Storage::url($data->image) }}" class="rounded-circle" width="35">
                            </td>
                            <td>
                              <button class="btn btn-warning" data-toggle="modal" data-target="#editModal{{$data->id}}">Edit</button>
                            </td>
                            <td>
                              <form action="{{action('FishController@destroy',$data->id)}}" method="post" onsubmit="return confirm('Apakah anda yakin ingin menghapus spesies ikan ini?');">
                                  @csrf
                                  <input name="_method" type="hidden" value="DELETE"> 
                                  <button class="btn btn-danger pull-right" type="submit">Hapus</button>
                              </form>
                            </td>
                          </tr>
                          <div class="modal fade" id="editModal{{$data->id}}" tabindex="-1" role="dialog" data-backdrop="false">
                              <div class="modal-dialog" role="document">
                                  <div class="modal-content">
                                      <div class="modal-header">
                                          <h4 class="modal-title" id="editModalLabel">Edit Jenis Ikan</h4>
                                      </div>
                                      <div class="modal-body">
                                          <form class="forms-sample" method="post" action="{{ action('FishController@update', $data->id) }}" enctype="multipart/form-data">
                                          @csrf
                                          <input name="_method" type="hidden" value="PATCH">
                                          <label for="name">Jenis Ikan</label>
                                          <div class="form-group">
                                              <div class="form-line">
                                                  <input type="text" id="name" name="name" class="form-control" placeholder="Masukkan jenis ikan" value="{{ $data->name }}" required>
                                              </div>
                                          </div>
                                          <div class="form-group">
                                              <label for="gambar">Upload Foto Ikan</label>
                                              <p>Upload gambar hanya dengan ekstensi : .PNG / .JPG / .JPEG (Ukuran maks : 2048 KB)</p>
                                              <input type="file" class="form-control-file" id="gambar" name="gambar">
                                          </div>
                                      <div class="modal-footer">
                                          <button type="submit" class="btn btn-primary waves-effect">Edit</button>
                                      </form>
                                          <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Batal</button>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>

    <!-- Modal Add Admin -->
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="addModalLabel">Tambah Jenis Ikan</h4>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{url('/admin/ikan')}}" enctype="multipart/form-data">
                    @csrf
                    <label for="name">Jenis Ikan</label>
                    <div class="form-group">
                        <div class="form-line">
                            <input type="text" id="name" name="name" class="form-control" placeholder="Masukkan jenis ikan" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="gambar">Upload Foto Ikan</label>
                        <p>Upload gambar hanya dengan ekstensi : .PNG / .JPG / .JPEG (Ukuran maks : 2048 KB)</p>
                        <input type="file" class="form-control-file" id="gambar" name="gambar" required="">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary waves-effect">Tambah</button>
                </form>
                    <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Batal</button>
                </div>
            </div>
        </div>
    </div>
    <!-- /Modal Add Admin -->

      <script>
        $("#table-2").dataTable({
          "columnDefs": [
            { "sortable": false, "targets": [0,2,3] }
          ]
        });
      </script>