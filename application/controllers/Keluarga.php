<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Keluarga extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('Proses');
		if(!$this->session->has_userdata('logged_in')){
			redirect(site_url('Welcome'));
		}
	}

	public function tambah()
	{
		$data['title'] = 'TAMBAH DATA KELUARGA';
		$this->template->view_admin('keluarga/tkeluarga', $data);
	}

	public function detail($id)
	{
		$data['title'] = 'DETAIL DATA KELUARGA';
		$data['tampil'] = $this->Proses->tampil_detail($id, '1');
		foreach ($data['tampil'] as $t) {
			$data['anggota'] = $this->Proses->tampil_detail($t->no_kk);

		}
		$this->template->view_admin('keluarga/dkeluarga', $data);
	}

	public function simpan()
	{
		$no = $this->input->post('no');
		$nama = $this->input->post('nama');
		$alamat = $this->input->post('alamat');
		$rt = $this->input->post('rt');
		$rw = $this->input->post('rw');
		$desa = $this->input->post('desa');
		$kecamatan = $this->input->post('kecamatan');
		$kabupaten = $this->input->post('kabupaten');
		$pos = $this->input->post('pos');
		$propinsi = $this->input->post('propinsi');

		$data = array(
						'no_kk' => $no,
						'kepala_keluarga' => $nama,
						'alamat' => $alamat,
						'rt' => $rt,
						'rw' => $rw,
						'desa' => $desa,
						'kecamatan' => $kecamatan,
						'kabupaten' => $kabupaten,
						'kode_pos' => $pos,
						'propinsi' => $propinsi
				);
		$simpan = $this->Proses->simpan('keluarga', $data);
		if ($simpan) {
			$this->session->set_flashdata('proses','berhasil');
			redirect(site_url('adminportal/keluarga'));
		}else{
			$this->session->set_flashdata('proses','gagal');
			redirect(site_url('adminportal/keluarga'));
		}
	}

	public function edit($id)
	{
		$edit = $this->input->post('edit');
		if($edit){
			$no = $this->input->post('no');
			$nama = $this->input->post('nama');
			$alamat = $this->input->post('alamat');
			$rt = $this->input->post('rt');
			$rw = $this->input->post('rw');
			$desa = $this->input->post('desa');
			$kecamatan = $this->input->post('kecamatan');
			$kabupaten = $this->input->post('kabupaten');
			$pos = $this->input->post('pos');
			$propinsi = $this->input->post('propinsi');

			$data = array(
						'no_kk' => $no,
						'kepala_keluarga' => $nama,
						'alamat' => $alamat,
						'rt' => $rt,
						'rw' => $rw,
						'desa' => $desa,
						'kecamatan' => $kecamatan,
						'kabupaten' => $kabupaten,
						'kode_pos' => $pos,
						'propinsi' => $propinsi
				);
			$kondisi = array('no_kk' => $id );
			$edit = $this->Proses->edit('keluarga', $kondisi, $data);
			if($edit){
				$this->session->set_flashdata('proses','berhasil');
				redirect(site_url('adminportal/keluarga'));
			}
		}else{
			$data['title'] = 'EDIT DATA KELUARGA';
			$kondisi = array('no_kk' => $id );
			$data['tampil'] = $this->Proses->edit('keluarga', $kondisi);
			$this->template->view_admin('keluarga/ekeluarga.php', $data);
		}
	}

	public function hapus($id)
	{
		$data = array('no_kk' => $id );
		$this->Proses->hapus('keluarga', $data);
		redirect(site_url('adminportal/keluarga'));
	}
}
