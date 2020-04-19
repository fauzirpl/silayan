      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Informasi Nelayan</h1>
          </div>

          <div class="section-body">
            <h2 class="section-title">Profil Nelayan</h2>
            <p class="section-lead">
              Isi data berikut dengan informasi yang valid
            </p>
            @if(session('sukses'))
              <div class="alert alert-info alert-with-icon" data-notify="container">
                  <button type="button" aria-hidden="true" class="close">×</button>
                  <span data-notify="icon" class="pe-7s-bell"></span>
                  <span data-notify="message">{{ session('sukses') }}</span>
              </div>
            @elseif(session('gagal'))
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
              <div class="col-12 col-md-7 col-lg-7">
                <div class="card">
                  <form method="post" action="{{ action('NelayanController@update', $data->id) }}" enctype="multipart/form-data">
                    @csrf
                    <input name="_method" type="hidden" value="PATCH">
                    <div class="card-header">
                      <h4>Data Pribadi</h4>
                    </div>
                    <div class="card-body">
                      <div class="form-group">
                          <label for="name">Nama Lengkap</label>
                          <input type="text" class="form-control" placeholder="Masukkan Nama Lengkap Anda" value="{{ Auth::user()->name }}" name="name" id="name" required>
                          @if($errors->has('name'))
                            <p class="alert alert-danger alert-dismissible invalid-feedback" role="alert">
                              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                              <strong>{{ $errors->first('name') }}</strong>
                            </p>
                          @endif
                      </div>
                      <div class="form-group">
                          <label for="email">Email</label>
                          <input type="email" class="form-control" placeholder="Masukkan Email Anda" value="{{ Auth::user()->email }}" name="email" id="email" required>
                          @if($errors->has('email'))
                            <p class="alert alert-danger alert-dismissible invalid-feedback" role="alert">
                              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                              <strong>{{ $errors->first('email') }}</strong>
                            </p>
                          @endif
                      </div>
                      <div class="form-group">
                          <label for="password">Kata Sandi</label>
                          <input type="password" class="form-control" placeholder="Kosongkan Jika Tidak Ingin Dirubah" name="password" id="password">
                          @if($errors->has('password'))
                            <p class="alert alert-danger alert-dismissible invalid-feedback" role="alert">
                              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                              <strong>{{ $errors->first('password') }}</strong>
                            </p>
                          @endif
                      </div>
                      <div class="form-group">
                          <label for="nohp">No. Telepon</label>
                          <input type="text" class="form-control" placeholder="Masukkan Nomor Telepon Anda" name="nohp" id="nohp" value="{{ $data->nohp }}" required>
                          @if($errors->has('nohp'))
                            <p class="alert alert-danger alert-dismissible invalid-feedback" role="alert">
                              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                              <strong>{{ $errors->first('nohp') }}</strong>
                            </p>
                          @endif
                      </div>
                      <div class="form-group">
                          <label for="noktp">No. KTP</label>
                          <input type="text" class="form-control" placeholder="Masukkan Nomor KTP Anda" name="noktp" id="noktp" value="{{ $data->noktp }}" required>
                          @if($errors->has('noktp'))
                            <p class="alert alert-danger alert-dismissible invalid-feedback" role="alert">
                              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                              <strong>{{ $errors->first('noktp') }}</strong>
                            </p>
                          @endif
                      </div>
                      <div class="form-group">
                          <label for="nonelayan">No. Kartu Nelayan</label>
                          <input type="text" class="form-control" placeholder="Masukkan Nomor Kartu Nelayan Anda" name="nonelayan" id="nonelayan" value="{{ $data->nonelayan }}" required>
                          @if($errors->has('nonelayan'))
                            <p class="alert alert-danger alert-dismissible invalid-feedback" role="alert">
                              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                              <strong>{{ $errors->first('nonelayan') }}</strong>
                            </p>
                          @endif
                      </div>
                      <div class="form-group mb-0">
                        <label for="alamat">Alamat Lengkap</label>
                        <textarea class="form-control" required="" id="alamat" name="alamat">{{ $data->alamat }}</textarea>
                        @if($errors->has('nonelayan'))
                          <p class="alert alert-danger alert-dismissible invalid-feedback" role="alert">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>{{ $errors->first('nonelayan') }}</strong>
                          </p>
                        @endif
                      </div>
                      <div class="form-group">
                        <label for="kecamatan">Kecamatan</label>
                        <select class="custom-select" id="kecamatan" name="kecamatan" required="">
                          <option selected disabled="">Pilih Kecamatan Tempat Anda Tinggal</option>
                          <option value="Bengkalis" @if($data->kecamatan == 'Bengkalis') selected @endif>Bengkalis</option>
                          <option value="Bantan" @if($data->kecamatan == 'Bantan') selected @endif>Bantan</option>
                          <option value="Bukit Batu" @if($data->kecamatan == 'Bukit Batu') selected @endif>Bukit Batu</option>
                          <option value="Mandau" @if($data->kecamatan == 'Mandau') selected @endif>Mandau</option>
                          <option value="Rupat" @if($data->kecamatan == 'Rupat') selected @endif>Rupat</option>
                          <option value="Rupat Utara" @if($data->kecamatan == 'Rupat Utara') selected @endif>Rupat Utara</option>
                          <option value="Siak Kecil" @if($data->kecamatan == 'Siak Kecil') selected @endif>Siak Kecil</option>
                          <option value="Pinggir" @if($data->kecamatan == 'Pinggir') selected @endif>Pinggir</option>
                          <option value="Bandar Laksamana" @if($data->kecamatan == 'Bandar Laksamana') selected @endif>Bandar Laksamana</option>
                          <option value="Talang Muandau" @if($data->kecamatan == 'Talang Muandau') selected @endif>Talang Muandau</option>
                          <option value="Bathin Solapan" @if($data->kecamatan == 'Bathin Solapan') selected @endif>Bathin Solapan</option>
                        </select>
                        @if($errors->has('kecamatan'))
                            <p class="alert alert-danger alert-dismissible invalid-feedback" role="alert">
                              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                              <strong>{{ $errors->first('kecamatan') }}</strong>
                            </p>
                          @endif
                      </div>
                      <div class="form-group">
                        <label for="koordinat">Koordinat Latitude & Longitude Home Base Nelayan</label>
                        <input type="text" class="form-control" id="koordinat" name="koordinat" placeholder="Contoh : 1.794639, 102.032958" required="" value="{{ $data->koordinat }}">
                      </div>
                    </div>
                    <div class="card-footer text-right">
                      <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
              </div>
              <div class="col-12 col-md-5 col-lg-5">
                <div class="card">
                  <div class="card-header">
                    <h4>Foto Profil</h4>
                  </div>
                  <div class="card-body">
                    <div class="chocolat-parent">
                      <a href="{{ Storage::url(Auth::user()->foto) }}" class="chocolat-image" title="Avatar">
                        <div data-crop-image="285">
                          <img alt="image" src="{{ Storage::url(Auth::user()->foto) }}" class="img-fluid">
                        </div>
                      </a>
                    </div>
                    <div class="section-title">Ganti Foto Profil</div>
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="gambar" name="gambar">
                      <label class="custom-file-label" for="gambar">Pilih Foto</label>
                      @if($errors->has('gambar'))
                            <p class="alert alert-danger alert-dismissible invalid-feedback" role="alert">
                              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                              <strong>{{ $errors->first('gambar') }}</strong>
                            </p>
                      @endif
                    </div>
                  </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>