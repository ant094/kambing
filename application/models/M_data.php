<?php
class M_data extends CI_Model {

	function tampil_data($data1){
		return $this->db->get($data1)->result();
	}
	function tampil_lagu($data1){
		$this->db->order_by('id_kpar', 'DESC');
		return $this->db->get($data1)->result_array();
	}

	public function tampil_data_berdasarkan($table,  $hint2, $a, $b)
	{
		$this->db->where($hint2);
		$this->db->limit($a,$b);
		$user =  $this->db->get($table)->result();
		return $user;
	}

	function tampil_data2($data1,$data2, $hint1, $id){
		$id = [$hint1 => $id];
		$this->db->where($id);
		$this->db->order_by($data2, 'DESC');
		return $this->db->get($data1)->row();
	}
	
	public function get_where($table, $id)
	{
		
		$this->db->where($id);
		$user =  $this->db->get($table)->row();
		return $user;
	}
	public function get_where_objek($table, $id)
	{
		// $names = array('A101', 'A102', 'A103', 'A104');
		// $this->db->where_not_in('id_kambing', $names);
		$this->db->where($id);
		$user =  $this->db->get($table)->result();
		return $user;
	}
	public function get_where_objek_not_in($table)
	{
		// $names = array('A101', 'A102', 'A103', 'A104');
		$this->db->where_not_in('status',0);
		// $this->db->where_not_in($id);
		$user =  $this->db->get($table)->result();
		return $user;
	}
	public function get_where_array($table, $id)
	{
		// $names = array('A101', 'A102', 'A103', 'A104');
		// $this->db->where_not_in('id_kambing', $names);
		$this->db->where($id);
		$user =  $this->db->get($table)->result_array();
		return $user;
	}

	public function get_where_filter($table, $id, $urutkan, $filter)
	{
		$this->db->where($id);
		$this->db->order_by($urutkan, $filter);
		$user =  $this->db->get($table)->row();
		return $user;
	}
	public function get_where2($table, $id,$id2)
	{
		$this->db->where($id);
		$this->db->where($id2);
		$user =  $this->db->get($table)->row();
		return $user;
	}
	public function get_kambing($table, $id)
	{
		// $names = array('A101', 'A102', 'A103', 'A104');
		// $this->db->where_not_in('no_ternak', $names);

// $this->db->select('*');
		// $this->db->from($table);
		// $this->db->join('kambing', 'kambing.no_ternak = bulan.no_ternak');
		// $this->db->where('status',0);

		$this->db->where($id);
		$user =  $this->db->get($table)->result();
		return $user;
	}
	public function get_kambing3($table, $id)
	{
		// $names = array('A101', 'A102', 'A103', 'A104');
		// $this->db->where_not_in('id_kambing', $names);
		$this->db->where($id);
		$user =  $this->db->get($table)->result();
		return $user;
	}
	public function get_kambing2($table, $id)
	{
		$this->db->where($id);
		$user =  $this->db->get($table)->row_array();
		return $user;
	}
	public function get_id($table, $hint1, $id)
	{
		$id = [$hint1 => $id];
		$this->db->where($id);
		$user =  $this->db->get($table)->row_array();
		return $user;
	}
	
	public function get_not_in_id($table, $hint1,$id,$a,$hint2)
	{
		$this->db->where_not_in($hint1,$id);
		$this->db->order_by($hint2,'ASC');
		$this->db->limit(5,$a);
		$user =  $this->db->get($table)->result();
		return $user;
	}
	public function get_id_2i($table, $hint1, $id, $hint2, $id2)
	{
		$id = [$hint1 => $id];
		$id2 = [$hint2 => $id2];
		$this->db->where($id);
		$this->db->where($id2);
		$user =  $this->db->get($table)->row_array();
		return $user;
	}
	public function get_id_2($table, $hint1, $id, $hint2, $id2,$hint3,$hint4)
	{
		$id = [$hint1 => $id];
		$id2 = [$hint2 => $id2];
		$this->db->where($id);
		$this->db->where($id2);
		$this->db->order_by($hint3, $hint4);
		$user =  $this->db->get($table)->row();
		return $user;
	}

	public function get_id_search($table, $hint1, $id,$a,$b, $hint2, $hint3)
	{
		$this->db->limit($a, $b);
		$this->db->order_by($hint2,$hint3);
		$id = [$hint1 => $id];
		$this->db->where($id);
		$user =  $this->db->get($table)->result();
		return $user;
	}
	public function get_list_berat($table, $hint1, $id, $hint4, $id2, $a,$b, $hint2, $hint3)
	{
		$this->db->limit($a, $b);
		$this->db->order_by($hint2,$hint3);
		$id = [$hint1 => $id];
		$this->db->where($id);
		$id2 = [$hint4 => $id2];
		$this->db->where($id2);
		$user =  $this->db->get($table)->result();
		return $user;
	}
	
	public function get_kesehatan($table,$id, $a, $b, $hint2, $hint3)
	{
		$this->db->limit($a, $b);
		$this->db->order_by($hint2, $hint3);
		$this->db->where($id);
		$user =  $this->db->get($table)->result();
		return $user;
	}

	public function cariGejala($table, $column, $cari)
	{
		
		$data = [$column => $cari];
		$this->db->like($data);
		$search = $this->db->get($table)->result_array();
		return $search;
	}
	// public function cariGejala2($table, $column, $cari, $column2, $a)
	// {
	// 	$b = count($a);
	// 	$c = array();
	// 	for ($i = 0; $i < $b; $i++) {
	// 		$c[$i] = "'" . $a[$i] . "'";
	// 	}
	// 	$data = [$column => $cari];
	// 	$this->db->like($data);
	// 	$this->db->where_not_in($column2,$a);
	// 	$search = $this->db->get($table)->result_array();;
	// 	return $search;
	// }

	//Login
	public function get_login($email)
	{
		$user = ['email ' => $email];
		$this->db->where($user);
		$user =  $this->db->get('user')->row_array();
		return $user;
	}
	public function get_login_password($email, $password)
	{
		$user = [
			'email ' 	=> $email,
			'password'	=> $password,
		];
		$this->db->where($user);
		$user =  $this->db->get('user')->row_array();
		return $user;
	}

	//Join
	// public function join($table,$table2,$id4,$a)
	// {
	// 	$this->db->select('*');
	// 	$this->db->from($table);
	// 	$this->db->join($table2,$id4);
	// 	$this->db->limit(4, $a);
	// 	$user =  $this->db->get()->result_array();
	// 	return $user;
	// }
	public function join2($table,$table2,$table3,$id3,$column2,$id4,$hint2,$hint3,$a,$b)
	{
		$this->db->select('*');
		$this->db->from($table);
		$this->db->join($table2, $table3);
		$this->db->join($column2,$id4);
		$this->db->where($id3);
		$this->db->limit($a, $b);
		$this->db->order_by($hint2, $hint3);
		$user =  $this->db->get()->result_array();
		return $user;
	}
	// public function join3($table,$table2,$table3,$column,$id3,$column2,$id4, $column3, $id5,$column6,$id6,$a)
	// {
	// 	$this->db->select('*');
	// 	$this->db->from($table);
	// 	$this->db->join($table2, $table3);
	// 	$this->db->join($column2,$id4);
	// 	$this->db->join($column3,$id5);
	// 	$this->db->where($column,$id3);
	// 	$this->db->where($column6,$id6);
	// 	$this->db->limit(4, $a);
	// 	$user =  $this->db->get()->result_array();
	// 	return $user;
	// }

	//Insert Data
	public function insert_data($table, $data)
	{
		$this->db->insert($table, $data);
	}
	// public function insert_data_where($table, $data,$hint1,$id)
	// {
	// 	$id = [$hint1 => $id];
	// 	// $this->db->update($table, $data,$id);
	// 	$this->db->where($id);
	// 	$this->db->update($table,$data);
	// }
	//Update
	public function u_data2($table, $hint, $id, $data)
	{
		$id = [
			$hint => $id
		];
		$this->db->where($id);
		$this->db->update($table, $data);
	}	
	
	public function update_data($table, $id, $data)
	{
		$this->db->where($id);
		$this->db->update($table, $data);
	}	

	public function u_data3($table, $hint, $id, $data,$hint2, $hint3)
	{
		$id = [
			$hint => $id
		];
		$this->db->where($id);
		$this->db->order_by($hint2, $hint3);
		$this->db->update($table, $data);
	}	

	//Delete
	public function get_delete($table, $field,$nama)
	{
		$user = [$field => $nama];
		$this->db->where($user);
		$user =  $this->db->delete($table);
	}

	//Dashboard
	function tampil_dashboard($data1, $user)
	{
		$this->db->where($user);
		// $names = array('A101', 'A102', 'A103', 'A104');
		// $this->db->where_not_in('id_kambing', $names);
		return $this->db->get($data1)->result();
	}
	function tampil_dari($data1, $A, $B, $C, $user)
	{
		// $names = array('A101', 'A102', 'A103', 'A104');
		// $this->db->where_not_in('id_kambing', $names);
		$this->db->where("$A >=", $B);
		$this->db->where("$A <=", $C);
		$this->db->where($user);
		$this->db->join('kambing', 'kambing.no_ternak = rekam_penyakit.id_kambing');
		return $this->db->get($data1)->result();
	}
	function tampil_dari2($data1, $A, $B, $C, $id)
	{
		// $names = array('A101', 'A102', 'A103', 'A104');
		// $this->db->where_not_in('id_kambing', $names);
		$this->db->join('kambing', 'kambing.no_ternak = rekam_penyakit.id_kambing');
		$this->db->where($id);
		$this->db->where("$A >=", $B);
		$this->db->where("$A <=", $C);
		return $this->db->get($data1)->result();
	}
	function tampil_dashboard2($data1, $user)
	{
		$this->db->where($user);
		// $names = array('A101', 'A102', 'A103', 'A104');
		// $this->db->select($data3);
		// $this->db->where_not_in($data2, $names);
		return $this->db->get($data1)->result();
	}
	function tampil_dashboard3($data1)
	{
		$this->db->join('kambing', 'kambing.no_ternak = bulan.no_ternak');
		$this->db->where('status',0);
		return $this->db->get($data1)->result();
	}
	function tampil_dashboard4($data1)
	{
		// $this->db->select('no_ternak','nm_penyakit','tgl_pencatatan');
		$this->db->join('kambing', 'kambing.no_ternak = rekam_penyakit.id_kambing');
		$this->db->where('status',0);
		return $this->db->get($data1)->result();
	}
	function tampil_dashboard5($data1, $id)
	{
		// $this->db->select('no_ternak','nm_penyakit','tgl_pencatatan');
		$this->db->join('kambing', 'kambing.no_ternak = rekam_penyakit.id_kambing');
		$this->db->where($id);
		return $this->db->get($data1)->result();
	}


}
