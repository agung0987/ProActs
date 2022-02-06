@extends(Auth::user()->hakAkses == 1 ? 'dashboard' : 'dashboard2' )

@section('content')


<section class="bodytabel">
    <div id="layoutSidenav">
        <div id="layoutSidenav_content">
            <div class="container-sm">

                <div id="table_data">
                    @include('pagination_data')
                </div>
            </div>
</section>

<script>
    $(document).ready(function() {

        $(document).on('click', '.pagination a', function(event) {
            event.preventDefault();
            var $halskrng = $(this).attr('href').split('$halskrng=')[1];
            fetch_data($halskrng);
        });

        function fetch_data($halskrng) {
            $.ajax({
                url: "lap_per_pegawai?_token=$_token&caritahun=$_tahun&caribulan=$_bulan&carinip=$_nip&limit=" + $halskrng,
                success: function(data) {
                    $('#table_data').html(data);
                }
            });
        }

    });
</script>
@endsection