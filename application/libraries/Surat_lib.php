<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Surat_lib{

	protected $ci;

	function __construct()
	{
		$this->ci = &get_instance();
		$this->ci->load->model('surat/surat_kta_model');
		$this->ci->load->model('surat/surat_str_model');
	}
	
	function generate($surat,$type = "F")
	{
		require_once "assets/plugins/fpdf/fpdf.php";		
		$pdf = new FPDF();
		$pdf->SetAutoPageBreak(TRUE, 10);
		$pdf->AliasNbPages();

		/* Surat Pengajuan KTA */
		if ($surat->tipe==1) {			
			$total = $this->ci->surat_kta_model->surat_total($surat->date_from,$surat->date_to);
			$title = 'Surat Pengajuan KTA '.format_dmy($surat->date_from).' '.format_dmy($surat->date_to);

			$pdf->AddPage('P','A4');
			$pdf->SetTitle($title);

			/* Kop Surat*/
			$pdf->Image(base_url('assets/img/logo.jpg'),20,10);
			$pdf->SetFont('Arial','B',12);
			$pdf->Cell(20,5,'',0,0,'C');
			$pdf->Cell(0,5,'PENGURUS CABANG',0,0,'C');
			$pdf->Ln(5);
			$pdf->Cell(20,5,'',0,0,'C');
			$pdf->Cell(0,5,'IKATAN BIDAN INDONESIA CABANG KABUPATEN CIANJUR',0,0,'C');
			$pdf->Ln(5);
			$pdf->SetFont('Arial','',10);
			$pdf->Cell(20,5,'',0,0,'C');
			$pdf->Cell(0,5,'Indonesian Midwives Association - Cianjur West Java Region',0,0,'C');
			$pdf->Ln(5);
			$pdf->Cell(20,5,'',0,0,'C');
			$pdf->Cell(0,5,'Sekretariat : Jl. Otto Iskandardinata I No 11 Bojong Herang - Cianjur',0,0,'C');
			$pdf->Ln(5);
			$pdf->Cell(20,5,'',0,0,'C');
			$pdf->Cell(0,5,'Telp : (0263) 281496 || Website :  www.ibicianjur.net',0,0,'C');
			$pdf->Ln(5);
			$pdf->Cell(20,5,'',0,0,'C');
			$pdf->Cell(0,5,'Email: bidan@ibicianjur.net / pcibicianjur@gmail.com',0,0,'C');
			$pdf->Ln(5);
			$pdf->Cell(0,5,'','B',0,'C');
			$pdf->Ln(10);

			/* Isi Surat*/
			$pdf->Cell(100,5,'',0,0,'C');
			$pdf->Cell(0,5,'Cianjur, '.dateformatindo(date('Y-m-d'),2),0,0,'C');
			$pdf->Ln(10);
			$pdf->Cell(25,5,'Nomor',0,0,'L');
			$pdf->Cell(5,5,':',0,0,'L');
			$pdf->Cell(70,5,$surat->nomor,0,0,'L');
			$pdf->Cell(0,5,'Kepada Yth,',0,0,'C');
			$pdf->Ln(5);
			$pdf->Cell(25,5,'Lampiran',0,0,'L');
			$pdf->Cell(5,5,':',0,0,'L');
			$pdf->Cell(70,5,'1 Berkas',0,0,'L');
			$pdf->Cell(0,5,'Sekretariat Pengurus Daerah IBI',0,0,'C');
			$pdf->Ln(5);
			$pdf->Cell(25,5,'Perihal',0,0,'L');
			$pdf->Cell(5,5,':',0,0,'L');
			$pdf->Cell(70,5,'Pengajuan KTA Baru dan Lama',0,0,'L');
			$pdf->Cell(0,5,'Provinsi Jawa Barat',0,0,'C');
			$pdf->Ln(5);
			$pdf->Cell(100,5,'',0,0,'C');
			$pdf->Cell(0,5,'Di',0,0,'C');
			$pdf->Ln(5);
			$pdf->Cell(100,5,'',0,0,'C');
			$pdf->Cell(0,5,'Tempat',0,0,'C');
			$pdf->Ln(15);
			$pdf->Cell(0,5,'Dengan Hormat,',0,0,'L');
			$pdf->Ln(5);
			$pdf->MultiCell(0,5,'Bersama Surat ini kami kirimkan Rekap Data Pengajuan Anggota Baru dan Perpanjang sebanyak '.$total.' orang untuk mendapatkan Kartu Tanda Anggota Ikatan Bidan Indonesia, berasal dari Pengurus Cabang IBI Kabupaten Cianjur - Wilayah Jawa Barat. Sehubungan hal tersebut, mohon kiranya dapat ditindak lanjuti untuk dapat dibuatkan KTA - nya. Demikian yang dapat kami sampaikan atas perhatian dan bantuannya kami ucapkan terimakasih.',0,'J');
			$pdf->Ln(10);
			$pdf->SetFont('Arial','B',11);
			$pdf->Cell(0,5,'PENGURUS CABANG IKATAN BIDAN INDONESIA',0,0,'C');
			$pdf->Ln(5);
			$pdf->Cell(0,5,'KABUPATEN CIANJUR',0,0,'C');
			$pdf->Ln(15);
			$pdf->Image(base_url('assets/img/ttd_ketua.jpg'),25,160,50);
			$pdf->Image(base_url('assets/img/cap.jpg'),80,150,40);
			$pdf->Image(base_url('assets/img/ttd_sekretaris.jpg'),135,155,20);
			$pdf->SetFont('Arial','B',10);
			$pdf->Cell(90,5,'Ketua',0,0,'C');
			$pdf->SetFont('Arial','',10);
			$pdf->Cell(0,5,'Sekretaris',0,0,'C');
			$pdf->Ln(30);
			$pdf->Cell(90,5,'Liste Zulhijwati Wulan., AMKeb., SKM., M.Kes',0,0,'C');
			$pdf->Cell(0,5,'Dewi Ratih AMKeb., SKM., M.Kes',0,0,'C');
			$pdf->Ln(5);
		}
		/* DAFTAR NAMA PENGAJUAN KTA PD */
		else if($surat->tipe==2){
			$total = $this->ci->surat_kta_model->surat_total($surat->date_from,$surat->date_to);
			$bidan = $this->ci->surat_kta_model->bidan($surat->date_from,$surat->date_to);
			$title = 'DAFTAR NAMA PENGAJUAN KTA PERIODE '.format_dmy($surat->date_from).' '.format_dmy($surat->date_to);
			$limit = 30;

			$pdf->AddPage('L','Legal');
			$pdf->SetTitle($title);

			$pdf->SetFont('Arial','B',12);
			$pdf->Cell(0,5,'REKAP DATA PENGAJUAN BARU KARTU TANDA ANGGOTA IBI',0,0,'C');
			$pdf->Ln(5);
			$pdf->Cell(0,5,'PENGURUS CABANG IBI CIANJUR - WILAYAH JAWA BARAT PERIODE '.format_dmy($surat->date_from).' S/D '.format_dmy($surat->date_to),0,0,'C');
			$pdf->Ln(10);
			$pdf->SetFont('Arial','',6);
			$pdf->Cell(7,15,'NO',1,0,'C');
			$pdf->Cell(35,15,'NAMA',1,0,'C');
			$pdf->Cell(25,5,'PESERTA ANGGOTA',1,0,'C');
			$pdf->setXY(52,30);
			$pdf->Cell(12.5,10,'B',1,0,'C');
			$pdf->Cell(12.5,5,'LAMA',1,0,'C');
			$pdf->setXY(64.5,35);
			$pdf->Cell(12.5,5,'NO ID',1,0,'C');
			$pdf->setXY(77,25);
			$pdf->Cell(45,15,'TEMPAT/TGL LAHIR',1,0,'C');
			$pdf->Cell(115,15,'ALAMAT',1,0,'C');
			$pdf->Cell(40,5,'PENDIDIKAN',1,0,'C');
			$pdf->setXY(237,30);
			$pdf->Cell(8,10,'D1',1,0,'C');
			$pdf->Cell(8,10,'D3',1,0,'C');
			$pdf->Cell(8,10,'D4',1,0,'C');
			$pdf->Cell(8,10,'S1',1,0,'C');
			$pdf->Cell(8,10,'S2',1,0,'C');
			$pdf->setXY(277,25);
			$pdf->Cell(20,15,'LULUS',1,0,'C');
			$pdf->Cell(20,15,'G.D',1,0,'C');
			$pdf->Cell(0,15,'KET',1,0,'C');
			$pdf->Ln(15);
			$i = 1;
			foreach ($bidan as $b) {
				$pdf->Cell(7,4,$i,1,0,'C');
				$pdf->Cell(35,4,$b->name,1,0,'L');
				$pdf->Cell(12.5,4,($b->tipe==1?'x':''),1,0,'C');
				$pdf->Cell(12.5,4,($b->tipe==3?'x':$b->kta_no),1,0,'C');
				$pdf->Cell(45,4,$b->tempat_lahir.', '.dateformatindo($b->tanggal_lahir,2),1,0,'L');
				$pdf->Cell(115,4,$b->alamat,1,0,'L');
				$pdf->Cell(8,4,($b->pendidikan==1?'x':''),1,0,'C');
				$pdf->Cell(8,4,($b->pendidikan==2?'x':''),1,0,'C');
				$pdf->Cell(8,4,($b->pendidikan==3?'x':''),1,0,'C');
				$pdf->Cell(8,4,($b->pendidikan==4?'x':''),1,0,'C');
				$pdf->Cell(8,4,($b->pendidikan==5?'x':''),1,0,'C');
				$pdf->Cell(20,4,$b->tahun_lulus,1,0,'C');
				$pdf->Cell(20,4,$b->golongan_darah_name,1,0,'C');
				$pdf->Cell(0,4,strtoupper($b->bidan_kta_tipe_name),1,0,'C');
				$pdf->Ln(4);
				if ($i%$limit==0 && $i!=$total) {
					$pdf->AddPage('L','Legal');
				}
				if ($i == $total && $total > $limit) {
					$pdf->Image(base_url('assets/img/ttd_ketua.jpg'),30,25+(($i%$limit)*4),50);
					$pdf->Image(base_url('assets/img/ttd_sekretaris.jpg'),210,20+(($i%$limit)*4),20);
				}
				$i++;
			}
			$pdf->Ln(5);
			if ($total <= $limit) {
				$pdf->Image(base_url('assets/img/ttd_ketua.jpg'),30,55+($total*4),50);
				$pdf->Image(base_url('assets/img/ttd_sekretaris.jpg'),210,50+($total*4),20);
			}		
			$pdf->SetFont('Arial','B',10);
			$pdf->Cell(90,5,'Mengetahui',0,0,'C');
			$pdf->SetFont('Arial','',10);
			$pdf->Cell(0,5,'Cianjur, '.dateformatindo(date('Y-m-d'),2),0,0,'C');
			$pdf->Ln(5);
			$pdf->Cell(90,5,'Ketua',0,0,'C');
			$pdf->SetFont('Arial','',10);
			$pdf->Cell(0,5,'Sekretaris',0,0,'C');
			$pdf->Ln(20);
			$pdf->Cell(90,5,'Liste Zulhijwati Wulan., AMKeb., SKM., M.Kes',0,0,'C');
			$pdf->Cell(0,5,'Dewi Ratih AMKeb., SKM., M.Kes',0,0,'C');
			$pdf->Ln(5);
			$pdf->Output("./files/surat/".$surat->id.".pdf","F");

		}
		/* DAFTAR NAMA PENGAJUAN KTA PC */
		else if($surat->tipe==3){
			$bidan = $this->ci->surat_kta_model->bidan($surat->date_from,$surat->date_to);
			$title = 'DAFTAR NAMA PENGAJUAN KTA PERIODE '.format_dmy($surat->date_from).' S/D '.format_dmy($surat->date_to).' (PC)';

			$pdf->AddPage('L','Legal');
			$pdf->SetTitle($title);

			$pdf->SetFont('Arial','B',14);
			$pdf->Cell(0,5,'REKAP DATA PENGAJUAN BARU ANGGOTA IBI',0,0,'C');
			$pdf->Ln(5);
			$pdf->Cell(0,5,'PENGURUS CABANG IBI CIANJUR - WILAYAH JAWA BARAT PERIODE '.format_dmy($surat->date_from).' S/D '.format_dmy($surat->date_to),0,0,'C');
			$pdf->Ln(10);
			$pdf->SetFont('Arial','B',6);
			$pdf->Cell(7,15,'NO',1,0,'C');
			$pdf->Cell(35,15,'NAMA',1,0,'C');
			$pdf->Cell(115,15,'ALAMAT',1,0,'C');
			$pdf->Cell(40,15,'PUSKESMAS/BPS',1,0,'C');
			$pdf->Cell(20,15,'NO HP',1,0,'C');
			$pdf->Cell(30,15,'NO. KTA',1,0,'C');
			$pdf->Cell(30,15,'TGL PENGAMBILAN',1,0,'C');
			$pdf->Cell(30,15,'MASA BERLAKU',1,0,'C');
			$pdf->Cell(0,15,'TTD',1,0,'C');
			$pdf->Ln(15);
			$pdf->SetFont('Arial','',6);
			$i = 1;
			foreach ($bidan as $b) {
				$pdf->Cell(7,5,$i,1,0,'C');
				$pdf->Cell(35,5,$b->name,1,0,'L');
				$pdf->Cell(115,5,$b->alamat,1,0,'L');
				$pdf->Cell(40,5,$b->tempat_kerja,1,0,'L');
				$pdf->Cell(20,5,$b->tlp,1,0,'L');
				$pdf->Cell(30,5,'',1,0,'C');
				$pdf->Cell(30,5,'',1,0,'C');
				$pdf->Cell(30,5,'',1,0,'C');
				$pdf->Cell(0,5,$i.'...................','R',0,($i%2==0?'L':'R'));
				$pdf->Ln(5);
				$i++;
			}
			$pdf->Output("./files/surat/".$surat->id.".pdf","F");
		}
		/* SURAT REKOMENDASI STR */
		else if($surat->tipe==4){
			$title = 'SURAT REKOMENDASI '.format_dmy($surat->date_from).' S/D '.format_dmy($surat->date_to);

			$pdf->AddPage('P','A4');
			$pdf->SetTitle($title);

			/* Kop Surat*/
			$pdf->Image(base_url('assets/img/logo.jpg'),20,10);
			$pdf->SetFont('Arial','B',12);
			$pdf->Cell(20,5,'',0,0,'C');
			$pdf->Cell(0,5,'PENGURUS CABANG',0,0,'C');
			$pdf->Ln(5);
			$pdf->Cell(20,5,'',0,0,'C');
			$pdf->Cell(0,5,'IKATAN BIDAN INDONESIA CABANG KABUPATEN CIANJUR',0,0,'C');
			$pdf->Ln(5);
			$pdf->SetFont('Arial','',10);
			$pdf->Cell(20,5,'',0,0,'C');
			$pdf->Cell(0,5,'Indonesian Midwives Association - Cianjur West Java Region',0,0,'C');
			$pdf->Ln(5);
			$pdf->Cell(20,5,'',0,0,'C');
			$pdf->Cell(0,5,'Sekretariat : Jl. Otto Iskandardinata I No 11 Bojong Herang - Cianjur',0,0,'C');
			$pdf->Ln(5);
			$pdf->Cell(20,5,'',0,0,'C');
			$pdf->Cell(0,5,'Telp : (0263) 281496 || Website :  www.ibicianjur.net',0,0,'C');
			$pdf->Ln(5);
			$pdf->Cell(20,5,'',0,0,'C');
			$pdf->Cell(0,5,'Email: bidan@ibicianjur.net / pcibicianjur@gmail.com',0,0,'C');
			$pdf->Ln(5);
			$pdf->Cell(0,5,'','B',0,'C');
			$pdf->Ln(10);			
			$pdf->SetFont('Arial','B',11);
			$pdf->Cell(0,5,'SURAT REKOMENDASI',0,0,'C');
			$pdf->Ln(5);
			$pdf->Cell(0,5,'Nomor : '.$surat->nomor,0,0,'C');
			$pdf->Ln(10);
			$pdf->SetFont('Arial','',10);
			$pdf->MultiCell(0,5,'Dengan ini saya selaku Ketua PC IBI Kabupaten Cianjur - Wilayah Provinsi Jawa Barat memberikan rekomendasi untuk penerbitan Surat Tanda Registrasi (STR) kepada pengusul Re-Registrasi STR (daftar nama terlampir) karena telah memenuhi persyaratan administrasi sesuai dengan ketentuan yang berlaku, antara lain :',0,'J');
			$pdf->Ln(5);
			$pdf->Cell(10,5,'',0,0,'L');
			$pdf->Cell(0,5,' 1.	Fotocopy Ijazah legal basah',0,0,'L');
			$pdf->Ln(5);
			$pdf->Cell(10,5,'',0,0,'L');
			$pdf->Cell(0,5,' 2.	STR Asli',0,0,'L');
			$pdf->Ln(5);
			$pdf->Cell(10,5,'',0,0,'L');
			$pdf->Cell(0,5,' 3.	Fotocopy KTA',0,0,'L');
			$pdf->Ln(5);
			$pdf->Cell(10,5,'',0,0,'L');
			$pdf->Cell(0,5,' 4.	Bukti Asli Penyetoran PNBP',0,0,'L');
			$pdf->Ln(5);
			$pdf->Cell(10,5,'',0,0,'L');
			$pdf->Cell(0,5,' 5.	Pas Photo berwarna 4x6 2 lembar',0,0,'L');
			$pdf->Ln(10);
			$pdf->Cell(10,5,'Demikian surat rekomendasi ini dibuat, untuk dipergunakan sebagaimana mestinya.',0,0,'L');
			$pdf->Ln(10);
			$pdf->Image(base_url('assets/img/ttd_ketua.jpg'),130,140,50);	  		
			$pdf->Image(base_url('assets/img/cap.png'),120,130,40);
			$pdf->Cell(100,5,'',0,0,'L');
			$pdf->Cell(0,5,'Cianjur, '.dateformatindo(date('Y-m-d'),2),0,0,'C');
			$pdf->Ln(5);
			$pdf->Cell(100,5,'',0,0,'L');
	        $pdf->Cell(0,5,'Pengurus Cabang IBI Cianjur',0,0,'C');
			$pdf->Ln(5);
			$pdf->Cell(100,5,'',0,0,'L');
	  		$pdf->Cell(0,5,'Ketua',0,0,'C');
			$pdf->Ln(25);
			$pdf->Cell(100,5,'',0,0,'L');
	     	$pdf->Cell(0,5,'Liste Zulhijwati Wulan, AM.Keb., SKM., M.Kes',0,0,'C');
		}
		/* DAFTAR NAMA PENGUSUL REGISTRASI STR */
		else if($surat->tipe==5){
			$title = 'DAFTAR NAMA PENGUSUL REGISTRASI STR PERIODE '.strtoupper(dateformatindo($surat->date_from,2)).' S/D '.strtoupper(dateformatindo($surat->date_to,2));

			$pdf->AddPage('L','A4');
			$pdf->SetTitle($title);
			$pdf->SetFont('Arial','B',12);
			$pdf->Cell(0,5,'DAFTAR NAMA PENGUSUL REGISTRASI STR',0,0,'C');
			$pdf->Ln(5);
			$pdf->Cell(0,5,'PERIODE '.strtoupper(dateformatindo($surat->date_from,2)).' S/D '.strtoupper(dateformatindo($surat->date_to,2)),0,0,'C');
			$pdf->Ln(5);
			$pdf->Cell(0,5,'PC IBI KABUPATEN CIANJUR',0,0,'C');
			$pdf->Ln(10);
			$pdf->SetFont('Arial','B',8);
			$pdf->Cell(10,10,'NO',1,0,'C');
			$pdf->Cell(70,10,'NAMA',1,0,'C');
			$pdf->Cell(100,10,'INSTITUSI',1,0,'C');
			$pdf->Cell(50,10,'NO IJAZAH',1,0,'C');
			$pdf->Cell(0,10,'NO SIB/SERTIKOM',1,0,'C');
			$pdf->Ln(10);
			$pdf->SetFont('Arial','',8);
			$i = 1;
			$bidan = $this->ci->surat_str_model->baru($surat->date_from,$surat->date_to);
			foreach ($bidan as $b) {
				$pdf->Cell(10,5,$i,1,0,'C');
				$pdf->Cell(70,5,$b->name,1,0,'L');
				$pdf->Cell(100,5,$b->kampus,1,0,'L');
				$pdf->Cell(50,5,$b->no_ijazah,1,0,'C');
				$pdf->Cell(0,5,$b->sertikom,1,0,'C');
				$pdf->Ln(5);
				$i++;
			}
		}
		/* DAFTAR NAMA PENGUSUL RE-REGISTRASI STR */
		else if($surat->tipe==6){
			$title = 'DAFTAR NAMA PENGUSUL RE-REGISTRASI STR PERIODE '.strtoupper(dateformatindo($surat->date_from,2)).' S/D '.strtoupper(dateformatindo($surat->date_to,2));

			$pdf->AddPage('L','A4');
			$pdf->SetTitle($title);
			$pdf->SetFont('Arial','B',12);
			$pdf->Cell(0,5,'DAFTAR NAMA PENGUSUL RE-REGISTRASI STR',0,0,'C');
			$pdf->Ln(5);
			$pdf->Cell(0,5,'PERIODE '.strtoupper(dateformatindo($surat->date_from,2)).' S/D '.strtoupper(dateformatindo($surat->date_to,2)),0,0,'C');
			$pdf->Ln(5);
			$pdf->Cell(0,5,'PC IBI KABUPATEN CIANJUR',0,0,'C');
			$pdf->Ln(10);
			$pdf->SetFont('Arial','B',8);
			$pdf->Cell(10,10,'NO',1,0,'C');
			$pdf->Cell(50,10,'NAMA',1,0,'C');
			$pdf->Cell(80,10,'INSTITUSI',1,0,'C');
			$pdf->Cell(50,10,'NO IJAZAH',1,0,'C');
			$pdf->Cell(50,10,'NO STR',1,0,'C');
			$pdf->Cell(0,10,'EXPIRE STR',1,0,'C');
			$pdf->Ln(10);
			$pdf->SetFont('Arial','',8);
			$i = 1;
			$bidan = $this->ci->surat_str_model->perpanjang($surat->date_from,$surat->date_to);
			foreach ($bidan as $b) {
				$pdf->Cell(10,5,$i,1,0,'C');
				$pdf->Cell(50,5,$b->name,1,0,'L');
				$pdf->Cell(80,5,$b->kampus,1,0,'L');
				$pdf->Cell(50,5,$b->no_ijazah,1,0,'C');
				$pdf->Cell(50,5,$b->nomor_sebelum,1,0,'C');
				$pdf->Cell(0,5,dateformatindo($b->masa_berlaku_sebelum,2),1,0,'C');
				$pdf->Ln(5);
				$i++;
			}
		}
		/* PENGUSULAN RE-REGISTRASI STR */
		else if($surat->tipe==7){
			$title = 'PENGUSULAN RE-REGISTRASI STR PERIODE '.strtoupper(dateformatindo($surat->date_from,2)).' S/D '.strtoupper(dateformatindo($surat->date_to,2));

			$pdf->AddPage('P','A4');
			$pdf->SetTitle($title);
			$pdf->SetFont('Arial','B',12);
			$pdf->Cell(0,5,'PENGUSULAN RE-REGISTRASI STR',0,0,'C');
			$pdf->Ln(5);
			$pdf->Cell(0,5,'PERIODE '.strtoupper(dateformatindo($surat->date_from,2)).' S/D '.strtoupper(dateformatindo($surat->date_to,2)),0,0,'C');
			$pdf->Ln(5);
			$pdf->Cell(0,5,'PC IBI KABUPATEN CIANJUR',0,0,'C');
			$pdf->Ln(10);
			$pdf->SetFont('Arial','B',8);
			$pdf->Cell(10,10,'NO',1,0,'C');
			$pdf->Cell(60,10,'IDENTITAS BIDAN',1,0,'C');
			$pdf->Cell(60,10,'FOTO',1,0,'C');
			$pdf->Cell(0,10,'PENGAMBILAN STR',1,0,'C');
			$pdf->Ln(10);
			$pdf->SetFont('Arial','',7);
			$i = 1;
			$h = 80;
			$nu = 1;
			$bidan = $this->ci->surat_str_model->perpanjang($surat->date_from,$surat->date_to);
			foreach ($bidan as $b) {
				/* No */
				$pdf->SetXY(10,40+(($i-1)*$h));
				$pdf->Cell(10,$h,$nu,1,0,'C');

				/* Indentitas */
				$pdf->SetXY(20,40+(($i-1)*$h));
				$pdf->SetFont('Arial','B',7);
				$pdf->Cell(60,5,'Nama Bidan : ','TLR',0,'L');
				$pdf->Ln(5);
				$pdf->SetXY(20,45+(($i-1)*$h));
				$pdf->SetFont('Arial','',7);
				$pdf->Cell(60,5,strtoupper($b->name),'LR',0,'L');
				$pdf->Ln(5);
				$pdf->SetXY(20,50+(($i-1)*$h));
				$pdf->SetFont('Arial','B',7);
				$pdf->Cell(60,5,'Alamat : ','LR',0,'L');
				$pdf->Ln(5);
				$pdf->SetXY(20,55+(($i-1)*$h));
				$pdf->SetFont('Arial','',7);
				$pdf->MultiCell(60,5,strtoupper($b->alamat),'LR','L');
				$pdf->Ln(5);
				$pdf->SetXY(20,70+(($i-1)*$h));
				$pdf->SetFont('Arial','B',7);
				$pdf->Cell(60,5,'No HP : ','LR',0,'L');
				$pdf->Ln(5);
				$pdf->SetXY(20,75+(($i-1)*$h));
				$pdf->SetFont('Arial','',7);
				$pdf->MultiCell(60,5,strtoupper($b->tlp),'LR','L');
				$pdf->Ln(5);
				$pdf->SetXY(20,80+(($i-1)*$h));
				$pdf->SetFont('Arial','B',7);
				$pdf->Cell(60,5,'Institusi : ','LR',0,'L');
				$pdf->Ln(5);
				$pdf->SetXY(20,85+(($i-1)*$h));
				$pdf->SetFont('Arial','',7);
				$pdf->MultiCell(60,5,strtoupper($b->kampus),'LR','L');
				$pdf->Ln(5);
				$pdf->SetXY(20,90+(($i-1)*$h));
				$pdf->SetFont('Arial','B',7);
				$pdf->Cell(60,5,'No Ijazah : ','LR',0,'L');
				$pdf->Ln(5);
				$pdf->SetXY(20,95+(($i-1)*$h));
				$pdf->SetFont('Arial','',7);
				$pdf->MultiCell(60,5,strtoupper($b->no_ijazah),'LR','L');
				$pdf->Ln(5);
				$pdf->SetXY(20,100+(($i-1)*$h));
				$pdf->SetFont('Arial','B',7);
				$pdf->Cell(60,5,'No STR : ','LR',0,'L');
				$pdf->Ln(5);
				$pdf->SetXY(20,105+(($i-1)*$h));
				$pdf->SetFont('Arial','',7);
				$pdf->MultiCell(60,5,strtoupper($b->nomor_sebelum),'LR','L');
				$pdf->Ln(5);
				$pdf->SetXY(20,110+(($i-1)*$h));
				$pdf->SetFont('Arial','B',7);
				$pdf->Cell(60,5,'EXPIRED STR : ','LR',0,'L');
				$pdf->Ln(5);
				$pdf->SetXY(20,115+(($i-1)*$h));
				$pdf->SetFont('Arial','',7);
				$pdf->MultiCell(60,5,strtoupper(dateformatindo($b->masa_berlaku_sebelum,2)),'LRB','L');

				/* Foto*/
				$pdf->SetXY(80,40+(($i-1)*$h));
				if (file_exists('./files/bidan/'.$b->bidan.'.jpg')) {
					$pdf->Image(base_url('files/bidan/'.$b->bidan.'.jpg'),80,40+(($i-1)*$h),60,$h);					
				}
				$pdf->Cell(60,$h,'',1,0,'L');

				/* Pengambilan */
				$pdf->SetXY(140,40+(($i-1)*$h));
				$pdf->SetFont('Arial','B',7);
				$pdf->Cell(60,5,'No STR Baru : ','TLR',0,'L');
				$pdf->Ln(5);
				$pdf->SetXY(140,45+(($i-1)*$h));
				$pdf->SetFont('Arial','B',7);
				$pdf->Cell(60,5,'','LR',0,'L');
				$pdf->Ln(5);
				$pdf->SetXY(140,50+(($i-1)*$h));
				$pdf->SetFont('Arial','B',7);
				$pdf->Cell(60,5,'Expired STR Baru : ','LR',0,'L');
				$pdf->Ln(5);
				$pdf->SetXY(140,55+(($i-1)*$h));
				$pdf->SetFont('Arial','B',7);
				$pdf->Cell(60,5,'','LR',0,'L');
				$pdf->Ln(5);
				$pdf->SetXY(140,60+(($i-1)*$h));
				$pdf->SetFont('Arial','B',7);
				$pdf->Cell(60,5,'Tanggal Pengambilan : ','LR',0,'L');
				$pdf->Ln(5);
				$pdf->SetXY(140,65+(($i-1)*$h));
				$pdf->SetFont('Arial','B',7);
				$pdf->Cell(60,5,'','LR',0,'L');
				$pdf->Ln(5);
				$pdf->SetXY(140,70+(($i-1)*$h));
				$pdf->SetFont('Arial','B',7);
				$pdf->Cell(60,5,'Nama Pengambil : ','LR',0,'L');
				$pdf->Ln(5);
				$pdf->SetXY(140,75+(($i-1)*$h));
				$pdf->SetFont('Arial','B',7);
				$pdf->Cell(60,5,'','LR',0,'L');
				$pdf->Ln(5);
				$pdf->SetXY(140,80+(($i-1)*$h));
				$pdf->SetFont('Arial','B',7);
				$pdf->Cell(60,5,'TTD Pengambil : ','LR',0,'L');
				$pdf->Ln(5);
				$pdf->SetXY(140,85+(($i-1)*$h));
				$pdf->SetFont('Arial','B',7);
				$pdf->Cell(60,35,'','LRB',0,'L');
				if ($i%3==0) {
					$pdf->AddPage('P','A4');
					$pdf->SetFont('Arial','B',12);
					$pdf->Cell(0,5,'PENGUSULAN RE-REGISTRASI STR',0,0,'C');
					$pdf->Ln(5);
					$pdf->Cell(0,5,'PERIODE '.strtoupper(dateformatindo($surat->date_from,2)).' S/D '.strtoupper(dateformatindo($surat->date_to,2)),0,0,'C');
					$pdf->Ln(5);
					$pdf->Cell(0,5,'PC IBI KABUPATEN CIANJUR',0,0,'C');
					$pdf->Ln(10);
					$pdf->SetFont('Arial','B',8);
					$pdf->Cell(10,10,'NO',1,0,'C');
					$pdf->Cell(60,10,'IDENTITAS BIDAN',1,0,'C');
					$pdf->Cell(60,10,'FOTO',1,0,'C');
					$pdf->Cell(0,10,'PENGAMBILAN STR',1,0,'C');
					$pdf->Ln(10);
					$pdf->SetFont('Arial','',7);
					$i = 0;
				}
				$i++;
				$nu++;
			}

		}		
		$pdf->Output("./files/surat/".$surat->id.".pdf",$type);		
	}
}
