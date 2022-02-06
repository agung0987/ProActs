@extends(Auth::user()->hakAkses == 1 ? 'dashboard' : 'dashboard2' )

@section('content')

<section class="bodytabel">
  <div class="container-sm overflow-hidden">





    <form action="{{url('/penilaian-proaktif2/update')}} " method="POST">
      @csrf
      <div class="row justify-content-start mt-3">


        <div class="col-3">
          <div class="p-3 border bg-light">
            @foreach($dtpn as $getdtpn)
            <ul class="list-group">
              <li class="list-group-item active" aria-current="true">Penilai</li>
              <li class="list-group-item"><b>NIP </b> &emsp;&emsp;&emsp;: {{$getdtpn->nip}}</li>
              <li class="list-group-item"><b> Nama </b>&emsp;&emsp;: {{$getdtpn->nama}}</li>
              <li class="list-group-item"><b> Jabatan </b>&emsp;: {{$getdtpn->jabatan}}</li>
              <li class="list-group-item"><b> UPT </b>&emsp;&emsp;&emsp;: {{$getdtpn->upt}}</li>
              <li class="list-group-item"><b> Wilayah </b>&emsp;: {{$getdtpn->wilayah}}</li>
            </ul>
            @endforeach
          </div>
        </div>


        <div class="col-3 " style="margin-left: 10px;">
          <div class="p-3 border bg-light">
            @if($dtpg == null)
            <li class="list-group-item active" aria-current="true">Pegawai</li>
            <li class="list-group-item"><b>NIP </b> &emsp;&emsp;&emsp;: --</li>
            <li class="list-group-item"><b> Nama </b>&emsp;&emsp;: --</li>
            <li class="list-group-item"><b> Jabatan </b>&emsp;: --</li>

            @else
            @foreach($dtpg as $getdtpg)
            <li class="list-group-item active" aria-current="true">Pegawai</li>
            <li class="list-group-item"><b>NIP </b> &emsp;&emsp;&emsp;: {{$getdtpg->nip}}</li>
            <li class="list-group-item"><b> Nama </b>&emsp;&emsp;: {{$getdtpg->nama}}</li>
            <li class="list-group-item"><b> Jabatan </b>&emsp;: {{$getdtpg->jabatan}}</li>
            <li class="list-group-item"><b> UPT </b>&emsp;&emsp;&emsp;: {{$getdtpg->upt}}</li>
            <li class="list-group-item"><b> Wilayah </b>&emsp;: {{$getdtpg->wilayah}}</li>
            @endforeach
            @endif
          </div>
        </div>
      </div>
      <!-- status -->


      <div class="row justify-content-between  ">
        <div class="col-3">

          <div class="col-5">
            <!-- <div class="card " style="width: 25rem; ">
            <form action="{{ url('/penilaian-proaktif/search')}}" method="get">
              @csrf
              <div class="input-group">

                <input type="text" name="kategoriSearch" placeholder="Indikator" aria-label="First name" class="form-control">
                <input type="number" name="bobotSearch" placeholder="bobot" aria-label="Last name" class="form-control">
                <input type="text" name="jawabanSearch" placeholder="jawaban" aria-label="Last name" class="form-control">
                <button type="submit" class="btn btn-primary" style="background-color: #052840; border-radius:0.25rem;"> <i class="bi bi-search"></i> </button>
              </div>
            </form>
          </div> -->
          </div>

        </div>






        <div class="table-responsive">
          <div class="table-wrapper">
            <div class="table-title">
              <div class="row">
                <div class="col-sm-3">
                  <h2> Master <b>kuesioner</b></h2>
                </div>

                <div class="col-sm-9">
                  <!-- <a href="http://127.0.0.1:8000/tambahPenilaian" data-toggle="modal" data-target="#myModal" class="btn btn-secondary"><i class="bi bi-file-earmark-plus"></i> <span style="padding-top: 4px;">Add New User</span></a> -->
                  <a href="http://127.0.0.1:8000/penilaian-proaktif/cetak" class="btn btn-secondary"><i class="bi bi-file-pdf-fill"></i><span style="padding-top: 4px;">Export to PDF</span></a>


                </div>
              </div>
            </div>


            <table class="table table-striped table-hover rounded  " class="input-group input-group-sm mb-3">
              <thead>
                <tr>
                  <td><b> #</b></td>
                  <td><b>indikator</b></td>
                  <td><b>bobot</b></td>
                  <td><b>jawaban</b></td>
                  <td><b>rating</b></td>
                  <td><b>Nilai terbobot</b></td>

                </tr>
              </thead>

              <tbody>
                @foreach($cobacrud as $key => $data_get)

                <tr>
                  <td>
                    @php $no = 1; @endphp
                    {{ $loop->index+1 }}
                  </td>
                  <td>
                    {{ $data_get->indikator }}

                    <!-- <span type="text" name="indikator[]" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" value="{{  $data_get->indikator }}"> -->
                    <!-- <input  value="{{  $data_get->indikator }}"></input> -->

                  </td>
                  <td>
                    {{$data_get->bobot}}
                  </td>

                  <td>



                    <input type="hidden" name="kuesioner_id[<?php echo $data_get->kuesioner_id; ?>]" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" value="{{  $data_get->kuesioner_id }}">

                    <input type="hidden" name="master_id[<?php echo $data_get->kuesioner_id; ?>]" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" value="{{  $data_get->master_id }}">

                    <input type="text" name="jawaban[<?php echo $data_get->kuesioner_id; ?>]" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" value="{{  $data_get->jawaban }}">

                  </td>

                  <td>
                    <!-- <input type="radio" id="rating-0" name="rating[<?php echo $data_get->id; ?>]" value="0" class="star-cb-clear" /><label for="rating-0">0</label> -->
                    <div class="row">
                      <div class="col-2">
                        <input type="hidden" name="rating[<?php echo $data_get->kuesioner_id; ?>]" value="0"></input>
                        1<br>
                        <input type="radio" onclick="rating(1,<?php echo $data_get->bobot; ?>,'coba_{{$key}}'  )" name="rating[<?php echo $data_get->kuesioner_id; ?>]" value="1" {{ "1" == $data_get->rating ? 'checked'  : ''  }}></input>
                      </div>
                      <div class="col-2">
                        2<br>
                        <input type="radio" onclick="rating(2,<?php echo $data_get->bobot; ?>,'coba_{{$key}}'  )" name="rating[<?php echo $data_get->kuesioner_id; ?>]" value="2" {{ "2" == $data_get->rating ? 'checked'  : ''  }}></input>
                      </div>
                      <div class="col-2">
                        3<br>
                        <input type="radio" onclick="rating(3,<?php echo $data_get->bobot; ?>,'coba_{{$key}}'  )" name="rating[<?php echo $data_get->kuesioner_id; ?>]" value="3" {{ "3" == $data_get->rating ? 'checked'  : ''  }}></input>
                      </div>
                      <div class="col-2">
                        4<br>
                        <input type="radio" onclick="rating(4,<?php echo $data_get->bobot; ?>,'coba_{{$key}}' )" name="rating[<?php echo $data_get->kuesioner_id; ?>]" value="4" {{ "4" == $data_get->rating ? 'checked'  : ''  }}></input>
                      </div>
                      <div class="col-2">
                        5<br>
                        <input type="radio" onclick="rating(5,<?php echo $data_get->bobot; ?>,'coba_{{$key}}' )" name="rating[<?php echo $data_get->kuesioner_id; ?>]" value="5" {{ "5" == $data_get->rating ? 'checked'  : ''  }}></input>
                      </div>
                    </div>
                  </td>
                  <!-- <td> <span class="star-cb-group">
                  <input type="radio" id="rating-5[<?php echo $data_get->id; ?>]" name="rating" value="5" /><label for="rating-5">5</label>
                  <input type="radio" id="rating-4[<?php echo $data_get->id; ?>]" name="rating" value="4" checked="checked" /><label for="rating-4">4</label>
                  <input type="radio" id="rating-3[<?php echo $data_get->id; ?>]" name="rating" value="3" /><label for="rating-3">3</label>
                  <input type="radio" id="rating-2[<?php echo $data_get->id; ?>]" name="rating" value="2" /><label for="rating-2">2</label>
                  <input type="radio" id="rating-1[<?php echo $data_get->id; ?>]" name="rating" value="1" /><label for="rating-1">1</label>
                  <input type="radio" id="rating-0[<?php echo $data_get->id; ?>]" name="rating" value="0" class="star-cb-clear" /><label for="rating-0">0</label>
                </span></td> -->
                  <td style="width: 3rem;">
                    <p id='coba_{{$key}}'>{{$data_get->nilaiTerbobot}}</p>

                    <!-- <input name="nilaiTerbobot[]" value="{{$data_get->nilaiTerbobot}}"></input> -->
                  </td>


                </tr>

                @endforeach
              </tbody>

            </table>
            <div class="row justify-content-end">
              <div class="col">
                <input type="hidden" name="status" value="{{$status}}">
                <button type="submit" class="btn btn-primary">simpan</button>
              </div>
              <div class="col-2 text-end">
                <b> Total:</b>
              </div>
              <div class="col-1 " style="padding-left: 1rem;">


                <p id="total"><b> {{$total}} </b></p>

              </div>
            </div>
          </div>
        </div>

    </form>
  </div>
</section>



@endsection

<script>
  function rating(_rate, _bobot, _hasil) {
    let x = _rate * _bobot;
    document.getElementById(_hasil).innerHTML = x;
    let y = <?php echo $key ?>;
    hitung_total(y);

  }


  function hitung_total(_count) {
    let total = 0;
    let i = 0;
    for (i; i <= _count; i++) {

      total += Number(document.getElementById('coba_' + i).textContent);
    };
    document.getElementById("total").innerHTML = total;
  }
</script>