<?php

/**
* 
*/
class Cert_type_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function get_type_by_id($req){
		$query = $this->db->query("SELECT * FROM MsAlumni WHERE alumniID=".$this->db->escape($req));
		return $query->result();
	}

	public function get_one_type_by_id($req){
		$query = $this->db->query("SELECT * FROM MsAlumni WHERE alumniID=".$this->db->escape($req));
		return $query->row();
	}

	public function get_one_type_by_nrp($req){
		$query = $this->db->query("SELECT * FROM MsAlumni WHERE nrp_nim=".$this->db->escape($req));
		return $query->row();
	}

	public function get_one_type_by_cleaned_nrp($req){
		$query = $this->db->query("SELECT *, regexp_replace(msalumni.nrp_nim::text, '[^0-9]'::text, ''::text, 'g'::text) AS cleaned_nrp FROM MsAlumni WHERE regexp_replace(msalumni.nrp_nim::text, '[^0-9]'::text, ''::text, 'g'::text)=".$this->db->escape($req));
		return $query->row();
	}

	public function get_data_where($where){
		$query = $this->db->query("SELECT a.* FROM MsAlumni AS a 
								   LEFT JOIN MsProvinsi AS p ON p.prov_id = a.province_nm ".$where);
		return $query->result();
	}

	public function get_prov_stats(){
		$query = $this->db->query("SELECT p.prov_name, COUNT(a.alumniID) AS jml FROM MsAlumni AS a 
								   LEFT JOIN MsProvinsi AS p ON p.prov_id = a.province_nm
								   WHERE p.prov_id IS NOT NULL
								   GROUP BY p.prov_name");
		return $query->result();
	}

	public function get_all_type(){
		$query = $this->db->query("SELECT a.*, p.provinsi, k.kab_kota FROM MsAlumni AS a 
								   LEFT JOIN MsProvinsi AS p ON p.prov_id = a.province_nm
								   LEFT JOIN MsKabKota AS k ON a.kabkota_nm = k.kabkot_id
								   order by alumniid ASC");
		return $query->result();
	}

	public function get_all_attendance($req1,$req2){
		$req1 = ($req1 == "") ? "%" : $req1;
		$req2 = ($req2 == "") ? "%" : $req2;
		$query = $this->db->query("SELECT ab.*, a.* 
								FROM Absence AS ab
								JOIN MsAlumni AS a ON ab.nrp_nim = regexp_replace(a.nrp_nim::text, '[^0-9]'::text, ''::text, 'g'::text)
								JOIN viewmaxid AS m ON a.alumniid = m.maxid AND m.cleaned_nrp = regexp_replace(a.nrp_nim::text, '[^0-9]'::text, ''::text, 'g'::text) 
								WHERE angkatan LIKE '".$req1."'
								AND tkt_pddk LIKE '%".$req2."%'
								order by a.alumniid ASC");
 
		return $query->result();
	}

	public function get_all_type_req($req1,$req2){
		$req1 = ($req1 == "") ? "%" : $req1;
		$req2 = ($req2 == "") ? "%" : $req2;
		$query = $this->db->query("SELECT a.*, p.provinsi, k.kab_kota FROM MsAlumni AS a 
								LEFT JOIN MsProvinsi AS p ON p.prov_id = a.province_nm
								LEFT JOIN MsKabKota AS k ON a.kabkota_nm = k.kabkot_id
								WHERE angkatan LIKE '".$req1."'
								AND tkt_pddk LIKE '%".$req2."%'
								order by alumniid ASC");
 
		return $query->result();
	}

	public function get_all_nongender(){
		$query = $this->db->query("SELECT a.*, p.provinsi, k.kab_kota FROM MsAlumni AS a 
								   LEFT JOIN MsProvinsi AS p ON p.prov_id = a.province_nm
								   LEFT JOIN MsKabKota AS k ON a.kabkota_nm = k.kabkot_id
								   WHERE COALESCE(a.Sex,'') = ''
								   order by alumniid ASC");
		return $query->result();
	}

	public function get_angkatan(){
		$query = $this->db->query("SELECT * FROM angkatan");
		return $query->result();
	}

	public function get_tktpddk(){
		$query = $this->db->query("SELECT * FROM tkt_pddk");
		return $query->result();
	}

	// public function get_type(){
	// 	$query = $this->db->query("SELECT * FROM MsAlumni order by alumniid ASC");
	// 	return $query->result();
	// }

	public function add($data){
		$this->db->insert("msalumni",$data);
	}

	public function add_absence($data){
		$this->db->insert("absence",$data);
	}

	public function update($req,$data){
		$this->db->set($data);
		$this->db->where("alumniid",$req);
		$this->db->update("msalumni");
	}

	public function delete($req){
		$this->db->where("alumniid",$req);
		$this->db->delete("msalumni");
	}

}