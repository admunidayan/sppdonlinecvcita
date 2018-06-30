<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Sppd_m extends CI_Model
{
	public function jumlah_data($string){
		$this->db->select('sppd_ld.*,data_pegawai.id_pegawai,data_pegawai.nip,data_pegawai.nip_lama,data_pegawai.nama_pegawai');
		$this->db->from('sppd_ld');
		$this->db->join('data_pegawai', 'data_pegawai.id_pegawai = sppd_ld.id_pegawai');
		if (!empty($string)) {
			$this->db->like('nama_pegawai',$string);
		}
		$rs = $this->db->count_all_results();
		return $rs;
	}
	public function searcing_data($sampai,$dari,$string){
		// $this->db->select('data_pegawai.*,master_golongan');
		$this->db->select('sppd_ld.*,data_pegawai.id_pegawai,data_pegawai.nip,data_pegawai.nip_lama,data_pegawai.nama_pegawai');
		$this->db->join('data_pegawai', 'data_pegawai.id_pegawai = sppd_ld.id_pegawai');
		if (!empty($string)) {
			$this->db->like('data_pegawai.nama_pegawai',$string);}
		$this->db->order_by('id_sppd_ld','desc');
		$query = $this->db->get('sppd_ld',$sampai,$dari);
		return $query->result();
	}
	public function detail_pegawai($id){
		// $this->db->select('data_pegawai.*,master_golongan');
		$this->db->join('master_golongan', 'master_golongan.id_golongan = data_pegawai.id_golongan');
		// $this->db->join('master_lokasi_kerja', 'master_lokasi_kerja.id_lokasi_kerja = data_pegawai.lokasi_kerja');
		$this->db->join('master_status_pegawai', 'master_status_pegawai.id_status_pegawai = data_pegawai.status_pegawai');
		$this->db->join('master_agama', 'master_agama.id_agama = data_pegawai.agama');
		$this->db->where('id_honorer',$id);
		$query = $this->db->get('data_pegawai');
		return $query->row();
	}
	public function select_data($tabel){
		$query = $this->db->get($tabel);
		return $query->result();
	}
	public function detail_data($tabel,$field,$id){
		$this->db->where($field, $id);
		$query = $this->db->get($tabel);
		return $query->row();
	}
	function insert_data($tabel,$data){
		$this->db->insert($tabel,$data);
	}
	public function delete_data($tabel,$field,$id){
		$this->db->where($field, $id);
		$this->db->delete($tabel);
	}
	public function update_data($tabel,$field,$id,$data){
		$this->db->where($field, $id);
		$this->db->update($tabel,$data);
	}
}
