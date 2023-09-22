<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class mahasiswa extends CI_Model {

	public function __construct() {
		parent::__construct();
        $this->load->database(); // Memuat library database
	}
	public function insert_batch($data){
		$this->db->insert_batch('mahasiswa',$data);
		if($this->db->affected_rows()>0)
		{
			return 1;
		}
		else{
			return 0;
		}
	}
	public function mahasiswa_list()
	{
		$this->db->select('*');
		$this->db->from('mahasiswa');
		$query=$this->db->get();
		return $query->result();
	}

	// Metode untuk mengambil semua data mahasiswa
	public function get_all_data() {
		$query = $this->db->get('mahasiswa'); // 'mahasiswa' adalah nama tabel dalam contoh ini
		return $query->result_array();
	}
}