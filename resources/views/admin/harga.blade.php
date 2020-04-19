      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Data Harga Ikan</h1>
          </div>

          <div class="section-body">
            <h2 class="section-title">Data Harga Ikan di Kab. Bengkalis</h2>
            <p class="section-lead">
              Harap update data harga ikan sesegera mungkin.
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
                    <a href="#" class="btn btn-success" data-toggle="modal" data-target="#addModal">Update Harga Ikan Hari Ini</a>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped" id="table-2">
                        <thead>
                          <tr>
                            <th>Tanggal</th>
                            <th>Jenis Ikan</th>
                            <th>Harga Ikan</th>
                            <th>Area</th>
                            <th>Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($prices as $data)
                          <tr>
                            <td>{{$data->created_at}}</td>
                            <td>{{$data->name}}</td>
                            <td>Rp.{{$data->price}},-</td>
                            <td>{{$data->area}}</td>
                            <td>
                              <form action="{{action('FishPriceController@destroy',$data->id)}}" method="post" onsubmit="return confirm('Apakah anda yakin ingin data ini?');">
                                  @csrf
                                  <input name="_method" type="hidden" value="DELETE"> 
                                  <button class="btn btn-danger pull-right" type="submit">Hapus</button>
                              </form>
                            </td>
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
        </section>
      </div>

    <!-- Modal Add Admin -->
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="addModalLabel">Update Harga Ikan</h4>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{url('/admin/harga')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                      <label for="kecamatan">Kecamatan</label>
                      <select class="custom-select" id="kecamatan" name="kecamatan" required="">
                        <option selected disabled="">Pilih Area Harga Berlaku</option>
                        <option value="Bengkalis">Bengkalis</option>
                        <option value="Bantan">Bantan</option>
                        <option value="Bukit Batu">Bukit Batu</option>
                        <option value="Mandau">Mandau</option>
                        <option value="Rupat">Rupat</option>
                        <option value="Rupat Utara">Rupat Utara</option>
                        <option value="Siak Kecil">Siak Kecil</option>
                        <option value="Pinggir">Pinggir</option>
                        <option value="Bandar Laksamana">Bandar Laksamana</option>
                        <option value="Talang Muandau">Talang Muandau</option>
                        <option value="Bathin Solapan">Bathin Solapan</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="spesies">Jenis Ikan</label>
                      <select class="custom-select" id="spesies" name="spesies" required="">
                        <option selected disabled="">Pilih Jenis Ikan</option>
                        @foreach($fishes as $data)
                        <option value="{{$data->id}}">{{$data->name}}</option>
                        @endforeach
                      </select>
                    </div>
                    <label for="harga">Harga Ikan Dalam Kilogram</label>
                    <div class="form-group">
                        <div class="form-line">
                            <input type="text" id="harga" name="harga" class="form-control" placeholder="Masukkan harga ikan (KG)" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary waves-effect">Update</button>
                </form>
                    <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Batal</button>
                </div>
            </div>
        </div>
    </div>
    <!-- /Modal Add Admin -->

    <script>
        $(document).ready(function() {
            $('#table-2').DataTable( {
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            } );
        } );
      </script>