<div class="table-responsive">
    <div class="table-wrapper">
        <div class="table-title">
            <div class="row">
                <div class="col-sm-5 judul">
                    <h2> <b>Data kuesioner</b></h2>
                </div>
                <!-- <div class="col-sm-7">
              <a href="#" class="btn btn-secondary"><i class="bi bi-file-earmark-plus"></i> <span style="padding-top: 4px;">Add New User</span></a>
              <a href="#" class="btn btn-secondary"><i class="bi bi-file-pdf-fill"></i><span style="padding-top: 4px;">Export to Excel</span></a>
            </div> -->
                <div class="col-sm-12">
                    <a href="/view/kuesionertambah" class="btn btn-secondary"><i class="bi bi-file-earmark-plus"></i> <span style="padding-top: 4px;">Tambah Kuesioner</span></a>
                </div>
            </div>
        </div>
        <table class="table table-striped table-hover rounded  ">
            <thead class="backgroud-thead">
                <tr>
                    <td><b> #</b></td>
                    <td><b>Indikator</b></td>
                    <td><b>Kategori Id</b></td>
                    <td><b>Bobot</b></td>
                    <td><b>Action</b></td>
                </tr>
            </thead>
            <tbody>
                @foreach($Data as $data_get)

                <tr>

                    <td>@php $no = 1; @endphp
                        {{ $loop->index+1 }}
                    </td>

                    <td>
                        {{$data_get->indikator}}
                        <!-- <input type="text" name="kategori" value="{{$data_get->indikator}}"></input> -->
                    </td>
                    <td>
                        {{$data_get->kategori_id}}
                        <!-- <input type="text" name="kategori" value="{{$data_get->kategori_id}}"></input> -->
                    </td>
                    <td>
                        {{$data_get->bobot}}
                        <!-- <input type="text" name="kategori" value="{{$data_get->bobot}}"></input> -->
                    </td>
                    <td style="width: 3rem;">
                        <div class="d-flex">
                            <div class="dropdown me-1">
                                <button type="button" class="btn btn-outline-primary dropdown-toggle  dropdown-toggle-split btn-sm" id="dropdownMenuOffset" data-bs-toggle="dropdown" aria-expanded="false" data-bs-offset="10,20">
                                    Aksi
                                </button>
                                <ul class="dropdown-menu " aria-labelledby="dropdownMenuOffset">
                                    <li><a class="btn btn-default btn-xs fs-6" type="button" class="btn btn-primary" data-bs-toggle="modal" href="" data-bs-target="#modaledit-{{$data_get->id}}"> Edit</a></li>
                                    <li><a class="btn btn-default btn-xs delete_kuesioner" data-id="{{$data_get->id}}" href="#">Hapus</a></li>
                                    <li><a class="btn btn-default btn-xs" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal-{{$data_get->id}}">Details</a></li>
                                </ul>
                            </div>

                    </td>
                </tr>

                @endforeach
            </tbody>
        </table>
        <div class="clearfix" style="justify-content:center;display: flex;
justify-content: center;">
            {{$Data->links()}}
        </div>
    </div>
</div>