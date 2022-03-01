@extends(Auth::user()->hakAkses == 1 ? 'dashboard' : 'dashboard2' )


@section('content')



<div id="layoutSidenav">
    <div id="layoutSidenav_content">

        <div class="container-fluid px-4 mt-3">

            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">
                    <h2>DASHBOARD</h2>
                </li>
            </ol>
            
            <!-- <div class="row">
                        <div class="col-9 mt-5"> -->
                            <div class="row mt-5">
                            @foreach($data as $data_get)

                            <!-- </div> -->
                            <div class="col-xl-4 col-md-6">
                            <div class="card bg-success text-white mb-4 w-100">
                                <div class="card-body"><i class="bi bi-pie-chart-fill"></i> Rerata Total</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <div class="small text-white">{{$data_get->total}}</div>
                                </div>
                            </div>
                            </div>
                            <div class="col-xl-4 col-md-6">
                            <div class="card bg-secondary text-white mb-4">
                                <div class="card-body align-text-center"><i class="bi bi-arrow-return-right"></i> Transformational Leadership</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <div class="small text-white">{{$data_get->sub1}}</div>
                                </div>
                            </div>
                            </div>

                            <div class="col-xl-4 col-md-6">
                            <div class="card bg-primary text-white mb-4">
                                <div class="card-body align-text-center"><i class="bi bi-arrow-return-right"></i> Affective Commitment</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <div class="small text-white">{{$data_get->sub2}}</div>

                                </div>
                            </div>
                            </div>

                            <div class="col-xl-4 col-md-6">
                            <div class="card text-white mb-4" style="background-color:#8b1eba">
                                <div class="card-body align-text-center"><i class="bi bi-arrow-return-right"></i> General Self Efficacy as Job Self Efficacy</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <div class="small text-white">{{$data_get->sub4}}</div>

                                </div>
                            </div>
                            </div>
                            <div class="col-xl-4 col-md-6">
                            <div class="card text-white mb-4" style="background-color:#ba1e5f">
                                <div class="card-body align-text-center"><i class="bi bi-arrow-return-right"></i> Job Satisfaction</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <div class="small text-white">{{$data_get->sub4}}</div>

                                </div>
                            </div>
                            </div>
                            <div class="col-xl-4 col-md-6">
                            <div class="card bg-warning text-white mb-4" style="background-color:#ba1e5f">
                                <div class="card-body align-text-center"><i class="bi bi-arrow-return-right"></i> Organizational Citizenship Behavior (OCB)</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <div class="small text-white">{{$data_get->sub5}}</div>

                                </div>
                            </div>
                            </div>
                            

                            @endforeach
                            </div>
                        </div>


                    </div>

                
        </div>






        @endsection