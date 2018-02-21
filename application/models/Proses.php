<?php
	class Proses extends CI_Model{

		public function tampil($tbl, $kondisi)
		{
			$sql = $this->db->get_where($tbl, $kondisi);
			return $sql->row();
		}

		public function tampil_jumlah($tbl, $status)
		{
			if($status=="keluarga"){
				return $this->db->count_all($tbl); 
			}else{
				return $this->db->count_all($tbl); 
			}
		}

		public function tampil_detail($id, $cek = null)
		{
			if($cek=='1'){
				$query = $this->db->get_where('keluarga', array('no_kk' => $id ));
				return $query->result();
			}else{
				$query = $this->db->get_where('anggota', array('no_kk' => $id ));
				return $query->result();
			}
		}

		public function tampil_penduduk()
		{
			$query = $this->db->get('anggota');
			return $query->result();
		}

		public function simpan($tbl, $data)
		{
			if($this->db->insert($tbl, $data)){
				return TRUE;
			}
		}

		public function edit($tbl, $kondisi, $data = null)
		{
			if($data){
				$this->db->where($kondisi);
				if($this->db->update($tbl, $data)){
					return TRUE;
				}
			}else{
				$sql = $this->db->get_where($tbl, $kondisi);
				return $sql->result();
			}
		}

		public function hapus($tbl, $data)
		{
			if($this->db->delete($tbl, $data)){
				return TRUE;
			}
		}

	}