<!DOCTYPE html>
<html>
<head>
	<title>Laporan</title>
	<style type="text/css">
		table {
			border-style: double;
			border-width: 3px;
			border-color: white;
		}
		table tr .text2 {
			text-align: center;
			font-size: 23px;
         
		}
		table tr .text {
			text-align: center;
			font-size: 13px;
		}
		table tr td {
			font-size: 13px;
            text-align: center;
		}
        
        table {
  
}

	</style>
</head>
<body>
	<center>
		<table>
			<tr>
				<td style="width: 15%;"><img src="{{asset('data_file/logo_kemenkumham.png')}}" alt="" style="height:8rem"></td>
				<td>
				<center>
                <h2>KEMENTRIAN HUKUM DAN HAK ASASI MANUSIA <br>
                            REPUBLIK INDONESIA
                        </h2>
                        <h3><b>SEKTARIAT JENDRAL</b></h3>
				</center>
				</td>
			</tr>
			<tr>
				<td colspan="2"><hr></td>
			</tr>
		<table width="625">
			<tr>
				<td class="text2"><b>Laporan Per-Pegawai</b></td>
			</tr>
		</table>
		</table>
        <br>
        <br>
		<table border="1">
        <tr >
                        <th ><b>Tahun</b></th>
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
                        <th><b>Sub6</b></th>
                        <th><b>Sub7</b></th>
                    </tr>

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


                        <td >
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


                        <td>
                            {{ $data_get->sub6 }}
                        </td>


                        <td>
                            {{ $data_get->sub7 }}
                        </td>
                    </tr>
                    @endforeach
		</table>
		<br>
		<br>
		<table >
			<tr>
				<td ><br><br><br><br></td>
				<td class="text" style=text-align: right;>DINILAI<br><br><br><br>-----------------------------</td>
                <td width="600"></td>
				<td class="text" style=text-align: left;>PENILAI<br><br><br><br>-----------------------------</td>
			</tr>
	     </table>
	</center>
</body>
</html>