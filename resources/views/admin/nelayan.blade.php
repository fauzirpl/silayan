      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Data Nelayan</h1>
          </div>

          <div class="section-body">
            <h2 class="section-title">Data Nelayan di Kab. Bengkalis</h2>
            <p class="section-lead">
              Data berikut ini merupakan data user yang terdaftar di sistem
            </p>
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped" id="table-2">
                        <thead>
                          <tr>
                            <th>Nama</th>
                            <th>Foto</th>
                            <th>No. HP</th>
                            <th>No. KTP</th>
                            <th>No. Kartu Nelayan</th>
                            <th>Alamat</th>
                            <th>Area</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($fishermen as $data)
                          <tr>
                            <td>{{$data->name}}</td>
                            <td>
                              <img alt="image" src="{{ Storage::url($data->foto) }}" class="rounded-circle align-middle" width="35">
                            </td>
                            <td class="align-middle">
                              {{$data->nohp}}
                            </td>
                            <td class="align-middle">
                              {{$data->noktp}}
                            </td>
                            <td class="align-middle">
                              {{$data->nonelayan}}
                            </td>
                            <td class="align-middle">
                              {{$data->alamat}}
                            </td>
                            <td class="align-middle">
                              {{$data->kecamatan}}
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