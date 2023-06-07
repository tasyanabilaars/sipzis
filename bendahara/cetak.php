<?php 
include '../koneksi.php';
include 'fpdf.php';

$tgl = date('d-M-Y');
$pdf= new FPDF('P','mm',array(297,210));
$pdf->addPage();
$pdf->setAutoPageBreak(false);
$yi=44;
$ya=44;
//untuk menuliskan nama bulan dengan format Indonesia
$bln_list = array (
    '01' => 'Januari',
    '02' => 'Februari',
    '03' => 'Maret',
    '04' => 'April',
    '05' => 'Mei',
    '06' => 'Juni',
    '07' => 'Juli',
    '08' => 'Agustus',
    '09' => 'September',
    '10' => 'Oktober',
    '11' => 'November',
    '12' => 'Desember'
);
    
$pdf->SetFont('Arial','B',12);
$pdf->Cell(0,0.7, 'Data Penerimaan ZIS DKM Masjid Al - Hidayah', 0,0,'C');
$pdf->ln(5);
$pdf->SetFont('Arial','B',11);
$pdf->Cell(0,0.7, '', 0,0,'C');
$pdf->ln(5);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(5,0.7, 'Dicetak pada : '.date('d').' '.$bln_list[date('m')].' '.date('Y'),0,'C');

//tabel
$pdf->ln(10);
$pdf->SetFont('Arial','B',0);
$width_cell=array(10,30,35,40,35,30);
$pdf->SetFillColor(193,229,252);
$pdf->Cell($width_cell[0],7,'No.',1,0,'C',true);
$pdf->Cell($width_cell[1],7,'Tanggal',1,0,'C',true);
$pdf->Cell($width_cell[2],7,'Penerima',1,0,'C',true);
$pdf->Cell($width_cell[3],7,'Alamat',1,0,'C',true);
$pdf->Cell($width_cell[4],7,'Jumlah Uang',1,0,'C',true);
$pdf->Cell($width_cell[5],7,'Jumlah Beras',1,1,'C',true);
//end tabel

$no=1;


//menampilkan data di database
$data = mysqli_query($koneksi,"SELECT * FROM penerimaan");

while($row=$data->fetch_array())
{
$pdf->SetFont('Arial','',8);
$pdf->Cell($width_cell[0],7,$no.'.',1,0,'C',false);
$pdf->Cell($width_cell[1],7,$row['tgl_penerima'],1,0,'C',false);
$pdf->Cell($width_cell[2],7,$row['penerima'],1,0,'C',false);
$pdf->Cell($width_cell[3],7,$row['alamat'],1,0,'C',false);
$pdf->Cell($width_cell[4],7, "Rp. ".number_format($row['jml_uang']).",-", 1, 0, 'L');
$pdf->Cell($width_cell[5],7,$row['jml_beras'],1,0,'C',false);

$no++;
$tglawal = $_GET['tglawal'];
$tglakhir = $_GET['tglakhir'];
}
$data = mysqli_query($koneksi,"SELECT * FROM penerimaan WHERE tgl_penerima BETWEEN '$tglawal' AND '$tglakhir'");
$jumlah = 0;
$jumlahberas = 0;
while($tampil = $data->fetch_array()){
    $jumlah += $tampil['jml_uang'];
    $jumlahberas += $tampil['jml_beras'];
}

$pdf->ln();
$pdf->SetFont('Arial','B',10);
$pdf->Cell(6,0.8,'',0,0,'C');
$pdf->Cell(6,0.8,'',0,0,'L');
$pdf->Cell(5,0.8,'',0,0,'L');
$pdf->Cell(4,0.8,'Total Penyaluran : ',0,0,'L');
$pdf->Cell($width_cell[1],7, "Rp. ".number_format($jumlah).",-", 0, 0, 'L');
$pdf->Cell($width_cell[1],7, "$jumlahberas", 0, 0, 'L');


$pdf->Output();  
?>