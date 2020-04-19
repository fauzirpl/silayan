      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Beranda</h1>
          </div>
          <a class="weatherwidget-io" href="https://forecast7.com/en/1d41101d62/bengkalis-regency/" data-label_1="BENGKALIS" data-label_2="CUACA SAAT INI" data-font="Roboto" data-icons="Climacons Animated" data-days="5" data-theme="original" >BENGKALIS CUACA SAAT INI</a>
          <script>
          !function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src='https://weatherwidget.io/js/widget.min.js';fjs.parentNode.insertBefore(js,fjs);}}(document,'script','weatherwidget-io-js');
          </script>
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
          <div class="row" style="margin-top: 30px">
            <div class="col-lg-8 col-md-12 col-12 col-sm-12">
              <div class="card">
                <div class="card-header">
                  <h4>Statistik Penangkapan Ikan</h4>
                  <div class="card-header-action">
                    <div class="btn-group">
                      <a href="#" class="btn btn-primary">Tahunan</a>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <canvas id="myChart" height="182"></canvas>
                </div>
              </div>
            </div>
            @if($cek_form == NULL)
            <div class="col-lg-4 col-md-12 col-12 col-sm-12">
              <div class="card">
                <div class="card-header">
                  <h4>Hasil Penangkapan Bulan Ini</h4>
                </div>
                <div class="card-body">
                  <form method="post" action="{{url('/admin/tangkapan')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                      <label for="total_catch">Tangkapan Bulan Ini</label>
                      <input type="text" class="form-control" id="total_catch" name="total_catch" placeholder="Dalam Kilogram" required="">
                    </div>
                </div>
                <div class="card-footer">
                  <button class="btn btn-primary">Tambahkan</button>
                </div>
              </form>
              </div>
            </div>
            @endif
          </div>
          <div class="row">
            <div class="col-lg-8 col-md-12 col-12 col-sm-12">
              <div class="card">
                <div class="card-header">
                  <h4>Daftar Harga Ikan Rata-rata di Tingkat Eceran (Rp/Kg) </h4>
                </div>
                <div class="card-body p-0">
                  <div class="table-responsive">
                    <table class="table table-striped" id="table-2">
                        <thead>
                          <tr>
                            <th>Tanggal</th>
                            <th>Jenis Ikan</th>
                            <th>Harga Ikan</th>
                            <th>Area</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($prices as $data)
                          <tr>
                            <td>{{$data->created_at}}</td>
                            <td>{{$data->name}}</td>
                            <td>Rp.{{$data->price}},-</td>
                            <td>{{$data->area}}</td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                      {{ $prices->links() }}
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-12 col-12 col-sm-12">
              <div class="card">
                <div class="card-header">
                  <h4>Lokasi & Jenis Tangkapan Ikan Minggu Ini</h4>
                </div>
                <div class="card-body">
                  <form method="post" action="{{url('/admin/lokasi')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                      <label for="spesies">Jenis Ikan</label>
                      <select class="custom-select" id="spesies" name="spesies" required="">
                        <option selected disabled="">Pilih Jenis Ikan</option>
                        @foreach($fishes as $data)
                        <option value="{{$data->id}}">{{$data->name}}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="koordinat">Koordinat Latitude & Longitude</label>
                      <input type="text" class="form-control" id="koordinat" name="koordinat" placeholder="Contoh : 1.794639, 102.032958" required="">
                    </div>
                </div>
                <div class="card-footer">
                  <button class="btn btn-primary">Tambahkan</button>
                </div>
                </form>
              </div>
            </div>
          </div>
        </section>
      </div>

      <script src="{{ asset('back/modules/chart.min.js') }}"></script>
      <script src="{{ asset('back/modules/summernote/summernote-lite.js') }}"></script>

      <script>
        $("#table-2").dataTable({
          "columnDefs": [
            { "sortable": false, "targets": [0,2,3] }
          ]
        });
      </script>

      <script>
      var ctx = document.getElementById("myChart").getContext('2d');
      var myChart = new Chart(ctx, {
        type: 'line',
        data: {
          labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Agu", "Sep", "Okt", "Nov", "Des"],
          datasets: [{
            label: 'Statistics',
            data: [{{ $januari }}, {{ $februari }}, {{ $maret }}, {{ $april }}, {{ $mei }}, {{ $juni }}, {{ $juli }}, {{ $agustus }}, {{ $september }}, {{ $oktober }}, {{ $november }}, {{ $desember }}],
            borderWidth: 2,
            backgroundColor: 'rgb(87,75,144)',
            borderColor: 'rgb(87,75,144)',
            borderWidth: 2.5,
            pointBackgroundColor: '#ffffff',
            pointRadius: 4
          }]
        },
        options: {
          legend: {
            display: false
          },
          scales: {
            yAxes: [{
              ticks: {
                beginAtZero: true,
                stepSize: 150
              }
            }],
            xAxes: [{
              gridLines: {
                display: false
              }
            }]
          },
        }
      });
      </script>