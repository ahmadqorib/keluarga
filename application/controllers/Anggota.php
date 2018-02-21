<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anggota extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('Proses');
		if(!$this->session->has_userdata('logged_in')){
			redirect(site_url('Welcome'));
		}
	}

	public function tambah($id)
	{
		$data['title'] = 'TAMBAH DATA ANGGOTA KELUARGA';
		$kondisi = array('no_kk' => $id );
		$data['tampil'] = $this->Proses->tampil('keluarga', $kondisi);
		$this->template->view_admin('anggota/tanggota.php', $data);
	}

	public function simpan()
	{
		$no = $this->input->post('no_kk');
		$nama = $this->input->post('nama');
		$nik = $this->input->post('nik');
		$jk = $this->input->post('jk');
		$tempat = $this->input->post('tempat');
		$tanggal = $this->input->post('tanggal');
		$agama = $this->input->post('agama');
		$pendidikan = $this->input->post('pendidikan');
		$pekerjaan = $this->input->post('pekerjaan');

		$data = array(
						'no_kk' => $no, 
						'nama' => $nama,
						'nik' => $nik,
						'jk' => $jk,
						'tempat_lahir' => $tempat,
						'tanggal_lahir' => $tanggal,
						'agama' => $agama,
						'pendidikan' => $pendidikan,
						'pekerjaan' => $pekerjaan
				);


		$simpan = $this->Proses->simpan('anggota', $data);
		if($simpan){
			$this->session->set_flashdata('proses','berhasil');
			redirect(site_url("adminportal/keluarga/tambah-anggota/$no"));
		}
	}

	public function edit($id)
	{
		$edit = $this->input->post('edit');
		if($edit){
			$nama = $this->input->post('nama');
			$nik = $this->input->post('nik');
			$jk = $this->input->post('jk');
			$tempat = $this->input->post('tempat');
			$tanggal = $this->input->post('tanggal');
			$agama = $this->input->post('agama');
			$pendidikan = $this->input->post('pendidikan');
			$pekerjaan = $this->input->post('pekerjaan');

			$data = array(
						'nama' => $nama,
						'nik' => $nik,
						'jk' => $jk,
						'tempat_lahir' => $tempat,
						'tanggal_lahir' => $tanggal,
						'agama' => $agama,
						'pendidikan' => $pendidikan,
						'pekerjaan' => $pekerjaan
				);

			$kondisi = array('nik' => $id );
			$edit = $this->Proses->edit('anggota', $kondisi, $data);
			if($edit){
				$this->session->set_flashdata('proses','berhasil');
				redirect(site_url('adminportal/penduduk'));
			}
		}else{
			$data['title'] = 'EDIT DATA PENDUDUK';
			$kondisi = array('nik' => $id );
			$data['tampil'] = $this->Proses->edit('anggota', $kondisi);
			$this->template->view_admin('anggota/eanggota', $data);
		}
	}

	public function hapus($id)
	{
		$data = array('nik' => $id );
		$this->Proses->hapus('anggota', $data);
		redirect(site_url("adminportal/penduduk"));
	}
}
