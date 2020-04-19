      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Peta Wilayah Laut Kab. Bengkalis</h1>
          </div>

          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Persebaran Nelayan & Kondisi Laut</h4>
                  </div>
                  <div class="card-body">
                    <div class="alert alert-light">
                      Data yang ada berdasarkan informasi dari nelayan dan instansi terkait.
                    </div>
                    <div id="simple-map" style="height:400px;"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>

      <script>
        var mymap = new L.map('simple-map', { zoomControl:false }).setView([1.794639, 102.032958], 9);
        L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token={accessToken}', {
            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
            maxZoom: 18,
            id: 'mapbox.streets',
            accessToken: 'pk.eyJ1IjoiZmF1emlycGxwb2xiZW5nIiwiYSI6ImNqcXYxaDk4NDBxZ3E0M24zYWkxaGl5bmkifQ.GGuhR-rJ3inloTGlyVMrGg'
        }).addTo(mymap);

        var Icon = L.Icon.extend({
            options: {
                iconSize:     [24, 24]
            }
        });

        var shipIcon = new Icon({iconUrl: "{{ asset('back/img/ship.png') }}"});
        var fishIcon = new Icon({iconUrl: "{{ asset('back/img/fish.png') }}"});

        @foreach($data as $nelayan)
        L.marker([{{$nelayan->koordinat}}], {icon: shipIcon}).addTo(mymap).bindPopup("{{$nelayan->name}}");
        @endforeach

        @foreach($last_fish_location as $data)
        L.marker([{{$data->koordinat}}], {icon: fishIcon}).addTo(mymap).bindPopup("Jenis ikan : {{$data->ikan}}<br>Informan : {{ $data->nelayan }}");
        @endforeach
      </script>