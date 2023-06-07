<?php 

$tanggal = date('2022-12-23');

switch (date('m', strtotime($tanggal))) {
	case '01':
		$bulan = 'Januari';
		break;
	case '02':
		$bulan = 'Februari';
		break;
	case '03':
		$bulan = 'Maret';
		break;
	case '04':
		$bulan = 'April';
		break;
	case '05':
		$bulan = 'Mei';
		break;
	case '06':
		$bulan = 'Juni';
		break;
	case '07':
		$bulan = 'Juli';
		break;
	case '08':
		$bulan = 'Agustus';
		break;
	case '09':
		$bulan = 'September';
		break;
	case '10':
		$bulan = 'Oktober';
		break;
	case '11':
		$bulan = 'November';
		break;
	case '12':
		$bulan = 'Desember';
		break;
	
	default:
		$bulan = 'Tidak diketahui';
		break;
}

echo date('d', strtotime($tanggal)). ' '. $bulan. ' '. date('Y', strtotime($tanggal));

?>