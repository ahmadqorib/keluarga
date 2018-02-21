<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		if(!$this->session->has_userdata('logged_in')){
			redirect(site_url('Welcome'));
		}
		$this->load->model('Proses');
		$this->load->model('Datatables','dtb');
	}

	public function index()
	{
		$data['title'] = 'PEJING';
		$data['jkeluarga'] = $this->Proses->tampil_jumlah('keluarga', 'keluarga');
		$data['jpenduduk'] = $this->Proses->tampil_jumlah('anggota','penduduk');
		$this->template->view_admin('home', $data);
	}

	public function data_keluarga()
	{
		$data['title'] = 'DATA KELUARGA';
		// $data['row'] = $this->Proses->tampil('keluarga', 'no_kk');
		$this->template->view_admin('keluarga/keluarga', $data);
	}

	public function data_penduduk()
	{
		$data['title'] = 'DATA PENDUDUK';
		$this->template->view_admin('anggota/penduduk', $data);
	}

	public function list_keluarga()
	{
		$column_order = array(null, 'no_kk','kepala_keluarga','alamat','rt','rw','desa');
		$column_search = array('no_kk','kepala_keluarga','alamat','rt','rw','desa');
		$order = array('no_kk' => 'asc');

		$list = $this->dtb->get_datatables('keluarga', $column_order, $column_search, $order);
		$data = array();
		$no = $this->input->post('start');
		foreach ($list as $k) {
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $k->no_kk;
			$row[] = $k->kepala_keluarga;
			$row[] = $k->alamat;
			$row[] = $k->rt.' / '.$k->rw;
			$row[] = $k->desa;
			$row[] = $k->kecamatan;
			$row[] = $k->kabupaten;
			$row[] = $k->kode_pos;
			$row[] = $k->propinsi;
			$row[] = '	<a href="keluarga/tambah-anggota/'.$k->no_kk.'" class="btn btn-sm btn-primary" title="tambah anggota keluarga">
							<span class="glyphicon glyphicon-plus"></span></a>
					 	<a href="keluarga/detail-keluarga/'.$k->no_kk.'" class="btn btn-sm btn-success" title="detail anggota keluarga">
					 		<span class="glyphicon glyphicon-list"></span></a>
					 	<a href="keluarga/edit/'.$k->no_kk.'" class="btn btn-sm btn-info" title="edit data keluarga"><span class="glyphicon glyphicon-edit">
					 		</span></a>
					 	<a data-href="keluarga/hapus/'.$k->no_kk.'" class="btn btn-sm btn-danger" title="hapus data keluarga" data-toggle="modal" data-target="#modalHapus"><span class="glyphicon glyphicon-trash"></span></a>
					 ';
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->dtb->count_all('keluarga'),
						"recordsFiltered" => $this->dtb->count_filtered('keluarga', $column_order, $column_search, $order),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function list_penduduk()
	{
		$column_order = array(null, 'nik', 'nama','jk','tempat_lahir','tanggal_lahir','agama','pendidikan','pekerjaan');
		$column_search = array('nik', 'nama','jk','tempat_lahir','tanggal_lahir','agama','pendidikan','pekerjaan');
		$order = array('nama' => 'asc');

		$list = $this->dtb->get_datatables('anggota', $column_order, $column_search, $order);
		$data = array();
		$no = $this->input->post('start');
		foreach ($list as $k) {
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $k->nama;
			$row[] = $k->nik;
			$row[] = $k->jk;
			$row[] = $k->tempat_lahir;
			$row[] = $k->tanggal_lahir;
			$row[] = $k->agama;
			$row[] = $k->pendidikan;
			$row[] = $k->pekerjaan;
			$row[] = '	
					 	<a href="penduduk/edit/'.$k->nik.'" class="btn btn-sm btn-info" title="edit data penduduk"><span class="glyphicon glyphicon-edit">
					 		</span></a>
					 	<a data-href="penduduk/hapus/'.$k->nik.'" class="btn btn-sm btn-danger" title="hapus data penduduk" data-toggle="modal" data-target="#modalHapus"><span class="glyphicon glyphicon-trash"></span></a>
					 ';
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->dtb->count_all('anggota'),
						"recordsFiltered" => $this->dtb->count_filtered('anggota', $column_order, $column_search, $order),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function cetak_keluarga($id)
	{
		$this->load->library('pdf');
        $pdf = new FPDF('l','mm','A4');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',16);
        $pdf->Cell(250,10,'',0,1);
        $pdf->Cell(20,5,"No KK",0,0);
     	$pdf->cell(3,5,':',0,0);
        $pdf->SetFont('Arial','',12);
        $pdf->Cell(250,5,$id,0,1);        
        $pdf->Cell(250,7,'',0,1);

     	$t = $this->Proses->tampil_detail($id, '1');

     	$pdf->SetFont('Arial','',10);
     	$pdf->cell(40,5,'Nama Kep. Keluarga',0,0);
     	$pdf->cell(3,5,':',0,0);
     	$pdf->cell(120,5,$t[0]->kepala_keluarga,0,0);

     	$pdf->cell(30,5,'Kecamatan',0,0);
     	$pdf->cell(3,5,':',0,0);
     	$pdf->cell(50,5,$t[0]->kecamatan,0,1);

     	$pdf->cell(40,5,'Alamat',0,0);
     	$pdf->cell(3,5,':',0,0);
     	$pdf->cell(120,5,$t[0]->alamat,0,0);

     	$pdf->cell(30,5,'Kabupaten',0,0);
     	$pdf->cell(3,5,':',0,0);
     	$pdf->cell(50,5,$t[0]->kabupaten,0,1);

     	$pdf->cell(40,5,'RT / RW',0,0);
     	$pdf->cell(3,5,':',0,0);
     	$pdf->cell(120,5,$t[0]->rt.' / '.$t[0]->rw,0,0);

     	$pdf->cell(30,5,'Kode Pos',0,0);
     	$pdf->cell(3,5,':',0,0);
     	$pdf->cell(50,5,$t[0]->kode_pos,0,1);

     	$pdf->cell(40,5,'Desa',0,0);
     	$pdf->cell(3,5,':',0,0);
     	$pdf->cell(120,5,$t[0]->desa,0,0);

     	$pdf->cell(30,5,'Propinsi',0,0);
     	$pdf->cell(3,5,':',0,0);
     	$pdf->cell(50,5,$t[0]->propinsi,0,1);


        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10,3,'',0,1);

        $pdf->SetFont('Arial','',10);
        $pdf->Cell(8,7,'No.',1,0);
        $pdf->Cell(70,7,'Nama Lengkap',1,0);
        $pdf->Cell(40,7,'NIK',1,0);
        $pdf->Cell(26,7,'Jenis Kelamin',1,0);
        $pdf->Cell(26,7,'Tempat Lahir',1,0);
        $pdf->Cell(26,7,'Tanggal Lahir',1,0);
        $pdf->Cell(20,7,'Agama',1,0);
        $pdf->Cell(30,7,'Pendidikan',1,0);
        $pdf->Cell(26,7,'Pekerjaan',1,1);

        $pdf->SetFont('Arial','',10);
        $anggota = $this->Proses->tampil_detail($id);
        $no = 0;
        foreach ($anggota as $a) {
        	$no++;
        	$pdf->Cell(8,7,$no,0,0);
        	$pdf->Cell(70,7,$a->nama,0,0);
        	$pdf->Cell(40,7,$a->nik,0,0);
	        $pdf->Cell(26,7,$a->jk,0,0);
	        $pdf->Cell(26,7,$a->tempat_lahir,0,0);
	        $pdf->Cell(26,7,$a->tanggal_lahir,0,0);
	        $pdf->Cell(20,7,$a->agama,0,0);
	        $pdf->Cell(30,7,$a->pendidikan,0,0);
	        $pdf->Cell(26,7,$a->pekerjaan,0,1);
        }

        $pdf->Output();
				
	}

	public function cetak_penduduk()
	{
		$this->load->library('pdf');
        $pdf = new FPDF('l','mm','A4');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',15);
        $pdf->Cell(250,10,'',0,1);
        $pdf->Cell('',5,"DATA PENDUDUK",0,1,'C');
        $pdf->Cell(250,10,'',0,1);

        $pdf->SetFont('Arial','',10);
        $pdf->Cell(8,7,'No.',1,0);
        $pdf->Cell(70,7,'Nama Lengkap',1,0);
        $pdf->Cell(40,7,'NIK',1,0);
        $pdf->Cell(26,7,'Jenis Kelamin',1,0);
        $pdf->Cell(26,7,'Tempat Lahir',1,0);
        $pdf->Cell(26,7,'Tanggal Lahir',1,0);
        $pdf->Cell(20,7,'Agama',1,0);
        $pdf->Cell(30,7,'Pendidikan',1,0);
        $pdf->Cell(26,7,'Pekerjaan',1,1);

        $tampil = $this->Proses->tampil_penduduk();
        $no = 0;
        foreach ($tampil as $a) {
        	$no++;
        	$pdf->Cell(8,7,$no,0,0);
        	$pdf->Cell(70,7,$a->nama,0,0);
        	$pdf->Cell(40,7,$a->nik,0,0);
	        $pdf->Cell(26,7,$a->jk,0,0);
	        $pdf->Cell(26,7,$a->tempat_lahir,0,0);
	        $pdf->Cell(26,7,$a->tanggal_lahir,0,0);
	        $pdf->Cell(20,7,$a->agama,0,0);
	        $pdf->Cell(30,7,$a->pendidikan,0,0);
	        $pdf->Cell(26,7,$a->pekerjaan,0,1);
        }

        $pdf->Output();
	}

}
