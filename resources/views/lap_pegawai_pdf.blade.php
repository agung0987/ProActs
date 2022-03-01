<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

 
</head>
<style>
    @page{
        size: A4 landscape;        
    }
</style>
<body style="margin: 2%;">
    
        <div class="row" style="border-bottom: 3px solid; padding-bottom:1rem">

            <div class="col-md-3 justify-content-center">
                <!-- <img src="{{asset('data_file/logo_kemenkumham.png')}}" class="img-fluid" alt="..."> -->
                <img src="{{asset('data_file/logo_kemenkumham.png')}}" class="rounded float-start" style="height:8rem">
            </div>
            <div class="col-md-7 justify-content-start">
                <div class="text-center">

                    <h3>KEMENTRIAN HUKUM DAN HAK ASASI MANUSIA <br>
                        REPUBLIK INDONESIA</h3>
                    <h5>SEKTARIAT JENDRAL</h4>
                </div>
            </div>
        </div>
        <!-- <hr size="4" style="background-color: #000000;"> -->
        <h5 class="text-center mt-2">LAPORAN PER-PEGAWAI</h5>
        <table class="table table-striped table-hover mt-5">
            <thead style="display:table-row-group;">
                <tr>
                    <th><b>Tahun</b></th>
                    <th><b>Periode</b></th>
                    <th><b>Bulan</b></th>
                    <th><b>Nip</b></th>
                    <th><b>Nama</b></th>
                    <th><b>Pendidikan</b></th>
                    <th><b>Gender</b></th>
                    <th><b>Jabatan</b></th>
                    <th><b>Upt</b></th>
                    <th><b>Wilayah</b></th>
                    <th><b>Total</b></th>
                    <th><b>Sub1</b></th>
                    <th><b>Sub2</b></th>
                    <th><b>Sub3</b></th>
                    <th><b>Sub4</b></th>
                    <th><b>Sub5</b></th>
                </tr>
                <tbody>
                    @foreach($Data as $data_get)

            <tr>
                <td>
                    {{ $data_get->tahun }}
                </td>


                <td>
                    {{ $data_get->periode }}
                </td>


                <td>
                    {{ $data_get->bulan }}
                </td>


                <td>
                    {{ $data_get->nip }}
                </td>


                <td>
                    {{ $data_get->nama }}
                </td>


                <td>
                    {{ $data_get->pendidikan }}
                </td>


                <td>
                    {{ $data_get->gender }}
                </td>


                <td>
                    {{ $data_get->jabatan }}
                </td>


                <td>
                    {{ $data_get->upt }}
                </td>


                <td>
                    {{ $data_get->wilayah }}
                </td>


                <td>
                    {{ $data_get->total }}
                </td>


                <td>
                    {{ $data_get->sub1 }}
                </td>


                <td>
                    {{ $data_get->sub2 }}
                </td>


                <td>
                    {{ $data_get->sub3 }}
                </td>


                <td>
                    {{ $data_get->sub4 }}
                </td>


                <td>
                    {{ $data_get->sub5 }}
                </td>

            </tr>
            @endforeach
                </tbody>
            </thead>
        </table>

        <div style="margin: 0rem 3rem;">
        <div class="bottom row " style="margin-top:5rem; padding-bottom:5rem; border-bottom:none; margin-bottom:2rem;">
            <div class="col-2 text-center" style="border-bottom: 2px solid; padding-bottom:6rem">
                <p style="text-align: center;">PENILAI</p>
            </div>
            <div class="col"></div>
            <div class="col-2 text-center">
                <p style="border-bottom: 2px solid; padding-bottom:8rem">DINILAI</p>
            </div>
        </div>
    </div>


       <!-- <div class="row mt-3">
           <div class="col-md-2 text-center pb-5" style="border-bottom: #000000;">
               penilai
           </div>
           <div class="col"></div>
           <div class="col-md-2 text-center pb-5" style="border-bottom: #000000;">
               dinilai
           </div>
       </div> -->




    <script>
    window.print();
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>