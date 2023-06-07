<?php
include '../koneksi.php';
require 'fpdf.php';

$pdf = new FPDF("L","cm","A4");

$pdf->SetMargins(2,1,1);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','B',11);
$pdf->Image('../assets/img/alhidayah.jpg',1,1,2,2);
$pdf->SetX(4);            
$pdf->MultiCell(19.5,0.5,'Dewan Kemakmuran Masjid Al - Hidayah',0,'L');
$pdf->SetX(4);
$pdf->MultiCell(19.5,0.5,'Perumahan Mutiara Bekasi Jaya Blok D, RT 002 RW 007 ',0,'L');    
$pdf->SetX(4);
$pdf->MultiCell(19.5,0.5,'Desa Sindangmulya, Kecamatan Cibarusah, Kabupaten Bekasi, 17343',0,'L');
$pdf->SetX(4);
$pdf->MultiCell(19.5,0.5,'http://www.sipzis-alhidayah.byethost7.com',0,'L');
$pdf->Line(1,3.1,28.5,3.1);
$pdf->SetLineWidth(0.1);      
$pdf->Line(1,3.2,28.5,3.2);   
$pdf->SetLineWidth(0);
$pdf->ln(1);
$pdf->SetFont('Arial','B',14);
$pdf->Cell(0,0.7,'Laporan Data Infaq Masjid Al - Hidayah',0,0,'C');

$pdf->ln(1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(5,0.7,"Di cetak pada : ".date("d-M-Y"),0,0,'C');
$pdf->ln(1);
$pdf->ln(1);
$pdf->Cell(1, 0.7, 'No', 1, 0, 'C');
$pdf->Cell(5, 0.7, 'Tanggal', 1, 0, 'C');
$pdf->Cell(5, 0.7, 'Nama', 1, 0, 'C');
$pdf->Cell(9, 0.7, 'Alamat', 1, 0, 'C');
$pdf->Cell(5, 0.7, 'Jumlah Donasi', 1, 0, 'C');

$no=1;
$tgl_dari = $_GET['tanggal_dari'];
$tgl_sampai = $_GET['tanggal_sampai'];

//menampilkan data dari database
$data = mysqli_query($koneksi, "SELECT * FROM user,infaq WHERE user.id_user = infaq.id_user AND date(tgl_donasi)>='$tgl_dari' AND date(tgl_donasi)<='$tgl_sampai' AND status IN (2) ORDER BY id_infaq,tgl_donasi ASC");
while ($row=$data->fetch_array()) {
    $pdf->ln();
    $pdf->SetFont('Arial','B',9);

    $pdf->Cell(1, 0.8, $no.'.', 1, 0, 'C');
    $pdf->Cell(5, 0.8, date('d-m-Y', strtotime($row['tgl_donasi'])), 1, 0, 'C');
    $pdf->Cell(5, 0.8, $row['username'], 1, 0, 'C');
    $pdf->Cell(9, 0.8, $row['alamat'], 1, 0, 'C');
    $pdf->Cell(5, 0.8, "Rp. ".number_format($row['total']).",-", 1, 0, 'C');

    $no++;
} 

$data = mysqli_query($koneksi, "SELECT * FROM user,infaq WHERE user.id_user = infaq.id_user AND date(tgl_donasi)>='$tgl_dari' AND date(tgl_donasi)<='$tgl_sampai' AND status IN (2) ORDER BY id_infaq,tgl_donasi ASC");
$jumlah = 0;

while($tampil = $data->fetch_array()){
    $jumlah += $tampil['total'];
}
    $pdf->ln();
    $pdf->SetFont('Arial','B',9);

    $pdf->Cell(1, 0.8, '', 0, 0, 'C');
    $pdf->Cell(5, 0.8,'', 0, 0, 'C');
    $pdf->Cell(5, 0.8, '', 0, 0, 'C');
    $pdf->Cell(9, 0.8, 'Total Infaq', 0, 0, 'C');
    $pdf->Cell(5, 0.8, "Rp. ".number_format($jumlah).",-", 0, 0, 'C');

$pdf->Output("laporan_infaq.pdf","I");



?>

