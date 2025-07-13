<?php

class Corp_Model extends CI_Model{

  static $GUEST_TYPE = 5;
	function __construct() { 
    parent::__construct(); 
    $this->load->database();
  } 

  public function getTotalAccounts($sd, $ed) {
    $query = $this->db->query("SELECT COUNT(1) AS Jumlah FROM MsAlumni WHERE last_update BETWEEN ".$this->db->escape(date('Y-m-d', strtotime($sd)))." AND ".$this->db->escape(date('Y-m-d', strtotime($ed))));
    if ($query->row() == null) {
      return 0;
    }
    else{
      return $query->row()->jumlah;
    }
  }

  public function getTotalProvinsi($sd, $ed) {
    $query = $this->db->query("SELECT COUNT(DISTINCT province_nm) AS jumlah FROM MsAlumni  WHERE COALESCE(province_nm) <> '' AND last_update BETWEEN ".$this->db->escape(date('Y-m-d', strtotime($sd)))." AND ".$this->db->escape(date('Y-m-d', strtotime($ed))));
    if ($query->row()== null) {
      return 0;
    }
    else{
      return $query->row()->jumlah;
    }
  }

  public function getTotalKabKota($sd, $ed) {
    $query = $this->db->query("SELECT COUNT(DISTINCT kabkota_nm) AS jumlah FROM MsAlumni  WHERE COALESCE(kabkota_nm) <> '' AND last_update BETWEEN ".$this->db->escape(date('Y-m-d', strtotime($sd)))." AND ".$this->db->escape(date('Y-m-d', strtotime($ed))));
    if ($query->row() == null) {
      return 0;
    }
    else{
      return $query->row()->jumlah;
    }
  }

  public function getTotalMaleAccounts($sd, $ed) {
    $query = $this->db->query("SELECT COUNT(1) AS Jumlah FROM MsAlumni WHERE sex = 'M' AND last_update BETWEEN ".$this->db->escape(date('Y-m-d', strtotime($sd)))." AND ".$this->db->escape(date('Y-m-d', strtotime($ed))));
    if ($query->row() == null) {
      return 0;
    }
    else{
      return $query->row()->jumlah;
    }
  }

  public function getTotalFemaleAccounts($sd, $ed) {
    $query = $this->db->query("SELECT COUNT(1) AS Jumlah FROM MsAlumni WHERE sex = 'F' AND last_update BETWEEN ".$this->db->escape(date('Y-m-d', strtotime($sd)))." AND ".$this->db->escape(date('Y-m-d', strtotime($ed))));
    if ($query->row() == null) {
      return 0;
    }
    else{
      return $query->row()->jumlah;
    }
  }

  public function getTotalPerLembaga($sd, $ed) {
    $sql = "SELECT p.prov_name AS province_nm, COUNT(a.alumniID) AS total, SUM(
            CASE 
            WHEN sex = 'M' THEN 1
            ELSE 0
            END
          ) AS total_male, SUM(
            CASE 
            WHEN sex = 'F' THEN 1
            ELSE 0
            END
          ) AS total_female FROM MsProvinsi AS p
          LEFT JOIN MsAlumni AS a ON p.prov_id = a.province_nm AND a.last_update BETWEEN ".$this->db->escape(date('Y-m-d', strtotime($sd)))." AND ".$this->db->escape(date('Y-m-d', strtotime($ed)))."
          GROUP BY p.prov_name
          ORDER BY total DESC";
    $query = $this->db->query($sql);
    return $query->result();
  }

  public function getTotalPerTingkatPddk($sd, $ed) {
    $sql = "SELECT p.tkt_pddk_nm AS province_nm, COUNT(a.alumniID) AS total, SUM(
            CASE 
            WHEN sex = 'M' THEN 1
            ELSE 0
            END
          ) AS total_male, SUM(
            CASE 
            WHEN sex = 'F' THEN 1
            ELSE 0
            END
          ) AS total_female FROM Tkt_pddk AS p
          LEFT JOIN MsAlumni AS a ON p.tkt_pddk_nm = a.tkt_pddk AND a.last_update BETWEEN ".$this->db->escape(date('Y-m-d', strtotime($sd)))." AND ".$this->db->escape(date('Y-m-d', strtotime($ed)))."
          GROUP BY p.tkt_pddk_nm
          ORDER BY total DESC";
    $query = $this->db->query($sql);
    return $query->result();
  }

  public function getTotalPerProgramStudi($sd, $ed) {
    $sql = "SELECT CONCAT(pd.tkt_pddk_nm, ' ',p.fakultas_nm) AS province_nm, COUNT(a.alumniID) AS total, SUM(
            CASE 
            WHEN sex = 'M' THEN 1
            ELSE 0
            END
          ) AS total_male, SUM(
            CASE 
            WHEN sex = 'F' THEN 1
            ELSE 0
            END
          ) AS total_female FROM Fakultas AS p
          JOIN fakultas_mapping AS fm ON p.fakultas_id = fm.fakultas_id
          LEFT JOIN tkt_pddk AS pd ON fm.tkt_pddk_id = pd.tkt_pddk_id
          LEFT JOIN MsAlumni AS a ON p.fakultas_nm = a.program_studi AND pd.tkt_pddk_nm = a.tkt_pddk AND a.last_update BETWEEN ".$this->db->escape(date('Y-m-d', strtotime($sd)))." AND ".$this->db->escape(date('Y-m-d', strtotime($ed)))."
          GROUP BY p.fakultas_nm, pd.tkt_pddk_nm 
          ORDER BY total DESC";
    $query = $this->db->query($sql);
    return $query->result();
  }

  public function getTotalPerKeahlian($sd, $ed) {
    $sql = "SELECT p.keahlian_nm AS province_nm, COUNT(nrp_nim) AS total, SUM(
            CASE 
            WHEN sex = 'M' THEN 1
            ELSE 0
            END
          ) AS total_male, SUM(
            CASE 
            WHEN sex = 'F' THEN 1
            ELSE 0
            END
          ) AS total_female FROM Keahlian AS p
          LEFT JOIN MsAlumni AS a ON p.keahlian_nm = a.keahlian AND a.last_update BETWEEN ".$this->db->escape(date('Y-m-d', strtotime($sd)))." AND ".$this->db->escape(date('Y-m-d', strtotime($ed)))."
          GROUP BY p.keahlian_nm
          HAVING COUNT(nrp_nim) > 0
          ORDER BY total DESC";
    $query = $this->db->query($sql);
    return $query->result();
  }

  public function getTotalPerPekerjaan($sd, $ed) {
    $sql = "SELECT p.pekerjaan_nm AS province_nm, COUNT(nrp_nim) AS total, SUM(
            CASE 
            WHEN sex = 'M' THEN 1
            ELSE 0
            END
          ) AS total_male, SUM(
            CASE 
            WHEN sex = 'F' THEN 1
            ELSE 0
            END
          ) AS total_female FROM Pekerjaan AS p
          LEFT JOIN MsAlumni AS a ON p.pekerjaan_nm = a.pekerjaan AND a.last_update BETWEEN ".$this->db->escape(date('Y-m-d', strtotime($sd)))." AND ".$this->db->escape(date('Y-m-d', strtotime($ed)))."
          GROUP BY p.pekerjaan_nm
          HAVING COUNT(nrp_nim) > 0
          ORDER BY total DESC";
    $query = $this->db->query($sql);
    return $query->result();
  }

  public function getTotalPerRegion($sd, $ed) {
    $sql = "SELECT p.prov_id, p.prov_name AS name, p.latitude AS lat, p.langitude AS lon,  COUNT(nrp_nim) AS total, SUM(
            CASE 
            WHEN sex = 'M' THEN 1
            ELSE 0
            END
          ) AS total_male, SUM(
            CASE 
            WHEN sex = 'F' THEN 1
            ELSE 0
            END
          ) AS total_female FROM MsProvinsi AS p
          LEFT JOIN MsAlumni AS a ON p.prov_id = a.province_nm AND a.last_update BETWEEN ".$this->db->escape(date('Y-m-d', strtotime($sd)))." AND ".$this->db->escape(date('Y-m-d', strtotime($ed)))."
          GROUP BY p.prov_id, p.prov_name, p.latitude, p.langitude 
          ORDER BY total DESC";
    $query = $this->db->query($sql);
    $res = $query->result();
    $data = array();
    foreach ($res as $row) {
      // array_push($data, array($row->name, $row->total));
      array_push($data, $row);
    }
    return $data;
  }

   public function getTotalPerRegion2($sd, $ed) {
    $sql = "SELECT mk.kabkot_id, mk.kabkot_name AS name, p.prov_name, mk.latitude AS lat, mk.langitude AS lon, p.kd_provinsi AS country, COUNT(nrp_nim) AS value, COUNT(nrp_nim) AS total, SUM(
            CASE 
            WHEN sex = 'M' THEN 1
            ELSE 0
            END
          ) AS total_male, SUM(
            CASE 
            WHEN sex = 'F' THEN 1
            ELSE 0
            END
          ) AS total_female FROM MsKabKota AS mk 
          JOIN MsProvinsi AS p ON mk.prov_id = p.prov_id 
          LEFT JOIN MsAlumni AS a ON mk.kabkot_id = a.kabkota_nm AND a.last_update BETWEEN ".$this->db->escape(date('Y-m-d', strtotime($sd)))." AND ".$this->db->escape(date('Y-m-d', strtotime($ed)))."
          GROUP BY mk.kabkot_id, mk.kabkot_name, p.prov_name, mk.latitude, mk.langitude, p.kd_provinsi 
          ORDER BY total DESC";
    $query = $this->db->query($sql);
    $res = $query->result();
    $data = array();
    foreach ($res as $row) {
      // array_push($data, array($row->province_nm, $row->total));
      array_push($data, $row);
    }
    return $data;
  }

  public function getTotalPerAngkatan($sd, $ed) {
    $sql = "SELECT CONCAT('Angkatan ',p.angkatan_nm) AS province_nm, COUNT(nrp_nim) AS total, SUM(
            CASE 
            WHEN sex = 'M' THEN 1
            ELSE 0
            END
          ) AS total_male, SUM(
            CASE 
            WHEN sex = 'F' THEN 1
            ELSE 0
            END
          ) AS total_female FROM Angkatan AS p
          LEFT JOIN MsAlumni AS a ON p.angkatan_nm = a.angkatan AND a.last_update BETWEEN ".$this->db->escape(date('Y-m-d', strtotime($sd)))." AND ".$this->db->escape(date('Y-m-d', strtotime($ed)))."
          GROUP BY p.angkatan_nm
          ORDER BY total DESC";
    $query = $this->db->query($sql);
    return $query->result();
  }

  function get_monthly_log(){
     $query="SELECT a.angkatan_id, a.trdate, jml, COALESCE(apv,0) AS apv, COALESCE(rjc,0) AS rjc, (apv - rjc) AS cnt FROM (
                    SELECT angkatan_id, COALESCE(angkatan,'N/A') AS trdate, COUNT(*) AS jml from MsAlumni as a
                    JOIN angkatan as t on a.angkatan = t.angkatan_nm
                    GROUP BY angkatan_id, COALESCE(angkatan,'N/A')
                    ORDER BY angkatan_id ASC
                  ) AS a LEFT JOIN (
                      SELECT angkatan_id, COALESCE(angkatan,'N/A') AS trdate, COUNT(*) AS apv from MsAlumni as a
                    JOIN angkatan as t on a.angkatan = t.angkatan_nm
                      WHERE sex = 'M'
                      GROUP BY angkatan_id, COALESCE(angkatan,'N/A')
                      ORDER BY angkatan_id ASC
                  ) AS b ON a.trdate = b.trdate
                  LEFT JOIN (
                      SELECT angkatan_id, COALESCE(angkatan,'N/A') AS trdate, COUNT(*) AS rjc from MsAlumni as a
                      JOIN angkatan as t on a.angkatan = t.angkatan_nm
                      WHERE sex = 'F'
                      GROUP BY angkatan_id, COALESCE(angkatan,'N/A')
                      ORDER BY angkatan_id ASC
                  ) AS c ON a.trdate = c.trdate
                  ORDER BY a.angkatan_id ASC";
    $query = $this->db->query($query);
    $total = array();
    $apv = array();
    $rjc = array();
    $cnt = array();
    $timestamp = array();
    $res = $query->result();
    foreach ($res as $obj) {
        array_push($total, $obj->jml);
        array_push($apv, $obj->apv);
        array_push($rjc, $obj->rjc);
        array_push($cnt, $obj->cnt);
        array_push($timestamp, $obj->trdate);
    }
    $data = array("total" => $total, "apv" => $apv, "rjc" => $rjc, "cnt" => $cnt, "time" => $timestamp);
    return $data;

  }

  function get_kabkot_stats($prov) {
    $query="SELECT k.kabkot_name, COUNT(a.alumniID) AS jml FROM MsAlumni AS a 
                   LEFT JOIN MsKabKota AS k ON k.kabkot_id = a.kabkota_nm
                   LEFT JOIN MsProvinsi AS p ON k.prov_id = p.prov_id
                   WHERE k.kabkot_id IS NOT NULL AND p.prov_name = ".$this->db->escape($prov)."
                   GROUP BY k.kabkot_name";
    $query = $this->db->query($query);
    return $query->result();
  }

  function get_top_landing($limit, $sd, $ed) {
      $query = $this->db->query("SELECT bt.clientID, bt.nama_lembaga, COUNT(at.tokenID) AS jml FROM AppTokens AS at
                                JOIN AppClients AS bt ON at.user_key = bt.user_key
                                WHERE used_url LIKE '%callback%' AND at.last_update BETWEEN ".$this->db->escape(date('Y-m-d', strtotime($sd)))." AND ".$this->db->escape(date('Y-m-d', strtotime($ed)))." 
                                GROUP BY bt.clientID, bt.nama_lembaga ORDER BY Jml DESC");
     return $query->result();
  }

  function get_top_qr($limit, $sd, $ed) {
      $query = $this->db->query("SELECT bt.clientID, bt.nama_lembaga, COUNT(at.tokenID) AS jml FROM AppTokens AS at
                                JOIN AppClients AS bt ON at.user_key = bt.user_key
                                WHERE used_url LIKE '%validate3%' AND at.last_update BETWEEN ".$this->db->escape(date('Y-m-d', strtotime($sd)))." AND ".$this->db->escape(date('Y-m-d', strtotime($ed)))." 
                                GROUP BY bt.clientID, bt.nama_lembaga ORDER BY Jml DESC");
     return $query->result();
  }

  function get_top_qrikd($limit, $sd, $ed) {
      $query = $this->db->query("SELECT TOP ".$limit." bt.clientID, bt.nama_lembaga, COUNT(at.tokenID) AS jml FROM AppTokens AS at
                                JOIN AppClients AS bt ON at.user_key = bt.user_key
                                WHERE scope LIKE '%scanikd%' AND at.last_update BETWEEN ".$this->db->escape(date('Y-m-d', strtotime($sd)))." AND ".$this->db->escape(date('Y-m-d', strtotime($ed)))." 
                                GROUP BY bt.clientID, bt.nama_lembaga ORDER BY Jml DESC");
     return $query->result();
  }

  function get_monthly_detail($m, $sd, $ed, $id){
    if ($m == 'day') {
        $query = "SELECT a.trdate, jml, COALESCE(apv,0) AS apv, COALESCE(rjc,0) AS rjc FROM (
                    SELECT DATE_FORMAT(request_date, '%Y-%m-%d') AS trdate, COUNT(*) AS jml from `requests` AS r JOIN user_web AS u ON r.userID = u.userID JOIN cert_type AS ct ON u.typeID = ct.typeID WHERE  request_date BETWEEN ".$this->db->escape(date('Y-m-d', strtotime($sd)))." 
                    AND ".$this->db->escape(date('Y-m-d', strtotime($ed)))." AND ct.typeID = '$id'
                    GROUP BY trdate
                    ORDER BY trdate ASC
                  ) AS a LEFT JOIN (
                      SELECT DATE_FORMAT(request_date, '%Y-%m-%d') AS trdate, COUNT(*) AS apv from `requests` AS r JOIN user_web AS u ON r.userID = u.userID JOIN cert_type AS ct ON u.typeID = ct.typeID WHERE  request_date BETWEEN ".$this->db->escape(date('Y-m-d', strtotime($sd)))." 
                      AND ".$this->db->escape(date('Y-m-d', strtotime($ed)))." AND stats = 'A' AND ct.typeID = '$id'
                      GROUP BY trdate
                      ORDER BY trdate ASC
                  ) AS b ON a.trdate = b.trdate
                  LEFT JOIN (
                      SELECT DATE_FORMAT(request_date, '%Y-%m-%d') AS trdate, COUNT(*) AS rjc from `requests` AS r JOIN user_web AS u ON r.userID = u.userID JOIN cert_type AS ct ON u.typeID = ct.typeID  WHERE  request_date BETWEEN ".$this->db->escape(date('Y-m-d', strtotime($sd)))." 
                      AND ".$this->db->escape(date('Y-m-d', strtotime($ed)))." AND stats = 'R' AND ct.typeID = '$id'
                      GROUP BY trdate
                      ORDER BY trdate ASC
                  ) AS c ON a.trdate = c.trdate";
   }
   elseif ($m == 'month') {
        $query="SELECT a.trdate, jml, COALESCE(apv,0) AS apv, COALESCE(rjc,0) AS rjc FROM (
                    SELECT DATE_FORMAT(request_date, '%Y-%m') AS trdate, COUNT(*) AS jml from `requests` AS r JOIN user_web AS u ON r.userID = u.userID JOIN cert_type AS ct ON u.typeID = ct.typeID  WHERE  request_date BETWEEN ".$this->db->escape(date('Y-m-d', strtotime($sd)))." 
                    AND ".$this->db->escape(date('Y-m-d', strtotime($ed)))." AND ct.typeID = '$id'
                    GROUP BY trdate
                    ORDER BY trdate ASC
                  ) AS a LEFT JOIN (
                      SELECT DATE_FORMAT(request_date, '%Y-%m') AS trdate, COUNT(*) AS apv from `requests` AS r JOIN user_web AS u ON r.userID = u.userID JOIN cert_type AS ct ON u.typeID = ct.typeID  WHERE  request_date BETWEEN ".$this->db->escape(date('Y-m-d', strtotime($sd)))." 
                      AND ".$this->db->escape(date('Y-m-d', strtotime($ed)))." AND stats = 'A' AND ct.typeID = '$id'
                      GROUP BY trdate
                      ORDER BY trdate ASC
                  ) AS b ON a.trdate = b.trdate
                  LEFT JOIN (
                      SELECT DATE_FORMAT(request_date, '%Y-%m') AS trdate, COUNT(*) AS rjc from `requests` AS r JOIN user_web AS u ON r.userID = u.userID JOIN cert_type AS ct ON u.typeID = ct.typeID  WHERE  request_date BETWEEN ".$this->db->escape(date('Y-m-d', strtotime($sd)))." 
                      AND ".$this->db->escape(date('Y-m-d', strtotime($ed)))." AND stats = 'R' AND ct.typeID = '$id'
                      GROUP BY trdate
                      ORDER BY trdate ASC
                  ) AS c ON a.trdate = c.trdate";
   }
   elseif ($m == 'year'){
        $query = "SELECT a.trdate, jml, COALESCE(apv,0) AS apv, COALESCE(rjc,0) AS rjc FROM (
                    SELECT DATE_FORMAT(request_date, '%Y') AS trdate, COUNT(*) AS jml from `requests` AS r JOIN user_web AS u ON r.userID = u.userID JOIN cert_type AS ct ON u.typeID = ct.typeID  WHERE  request_date BETWEEN ".$this->db->escape(date('Y-m-d', strtotime($sd)))." 
                    AND ".$this->db->escape(date('Y-m-d', strtotime($ed)))." AND ct.typeID = '$id'
                    GROUP BY trdate
                    ORDER BY trdate ASC
                  ) AS a LEFT JOIN (
                      SELECT DATE_FORMAT(request_date, '%Y') AS trdate, COUNT(*) AS apv from `requests` AS r JOIN user_web AS u ON r.userID = u.userID JOIN cert_type AS ct ON u.typeID = ct.typeID  WHERE  request_date BETWEEN ".$this->db->escape(date('Y-m-d', strtotime($sd)))." 
                      AND ".$this->db->escape(date('Y-m-d', strtotime($ed)))." AND stats = 'A' AND ct.typeID = '$id'
                      GROUP BY trdate
                      ORDER BY trdate ASC
                  ) AS b ON a.trdate = b.trdate
                  LEFT JOIN (
                      SELECT DATE_FORMAT(request_date, '%Y') AS trdate, COUNT(*) AS rjc from `requests` AS r JOIN user_web AS u ON r.userID = u.userID JOIN cert_type AS ct ON u.typeID = ct.typeID  WHERE  request_date BETWEEN ".$this->db->escape(date('Y-m-d', strtotime($sd)))." 
                      AND ".$this->db->escape(date('Y-m-d', strtotime($ed)))." AND stats = 'R' AND ct.typeID = '$id'
                      GROUP BY trdate
                      ORDER BY trdate ASC
                  ) AS c ON a.trdate = c.trdate";
   } else {
    $query = "SELECT a.trdate, jml, COALESCE(apv,0) AS apv, COALESCE(rjc,0) AS rjc  FROM (
                    SELECT DATE_FORMAT(request_date, '%Y-%m-%d') AS trdate, COUNT(*) AS jml from `requests` AS r JOIN user_web AS u ON r.userID = u.userID JOIN cert_type AS ct ON u.typeID = ct.typeID  WHERE  request_date BETWEEN ".$this->db->escape(date('Y-m-d', strtotime($sd)))." 
                    AND ".$this->db->escape(date('Y-m-d', strtotime($ed)))." AND ct.typeID = '$id'
                    GROUP BY trdate
                    ORDER BY trdate ASC
                  ) AS a LEFT JOIN (
                      SELECT DATE_FORMAT(request_date, '%Y-%m-%d') AS trdate, COUNT(*) AS apv from `requests` AS r JOIN user_web AS u ON r.userID = u.userID JOIN cert_type AS ct ON u.typeID = ct.typeID  WHERE  request_date BETWEEN ".$this->db->escape(date('Y-m-d', strtotime($sd)))." 
                      AND ".$this->db->escape(date('Y-m-d', strtotime($ed)))." AND stats = 'A' AND ct.typeID = '$id'
                      GROUP BY trdate
                      ORDER BY trdate ASC
                  ) AS b ON a.trdate = b.trdate
                  LEFT JOIN (
                      SELECT DATE_FORMAT(request_date, '%Y-%m-%d') AS trdate, COUNT(*) AS rjc from `requests` AS r JOIN user_web AS u ON r.userID = u.userID JOIN cert_type AS ct ON u.typeID = ct.typeID  WHERE  request_date BETWEEN ".$this->db->escape(date('Y-m-d', strtotime($sd)))." 
                      AND ".$this->db->escape(date('Y-m-d', strtotime($ed)))." AND stats = 'R' AND ct.typeID = '$id'
                      GROUP BY trdate
                      ORDER BY trdate ASC
                  ) AS c ON a.trdate = c.rtrdate";
   }
    $query = $this->db->query($query);
    $total = array();
    $apv = array();
    $rjc = array();
    $timestamp = array();
    $res = $query->result();
    foreach ($res as $obj) {
        array_push($total, $obj->jml);
        array_push($apv, $obj->apv);
        array_push($rjc, $obj->rjc);
        array_push($timestamp, $obj->trdate);
    }
    $data = array("total" => $total, "apv" => $apv, "rjc" => $rjc, "time" => $timestamp);
    return $data;

  }

  function get_monthly_produsen($m, $sd, $ed, $id){
    if ($m == 'day') {
        $query = "SELECT a.trdate, jml, COALESCE(apv,0) AS apv, COALESCE(rjc,0) AS rjc FROM (
                    SELECT DATE_FORMAT(request_date, '%Y-%m-%d') AS trdate, COUNT(*) AS jml from `perso_requests` AS r JOIN user_web AS u ON r.userID = u.userID JOIN business_type AS ct ON u.businessID = ct.businessID WHERE  request_date BETWEEN ".$this->db->escape(date('Y-m-d', strtotime($sd)))." 
                    AND ".$this->db->escape(date('Y-m-d', strtotime($ed)))." AND ct.businessID = '$id'
                    GROUP BY trdate
                    ORDER BY trdate ASC
                  ) AS a LEFT JOIN (
                      SELECT DATE_FORMAT(request_date, '%Y-%m-%d') AS trdate, COUNT(*) AS apv from `perso_requests` AS r JOIN user_web AS u ON r.userID = u.userID JOIN business_type AS ct ON u.businessID = ct.businessID WHERE  request_date BETWEEN ".$this->db->escape(date('Y-m-d', strtotime($sd)))." 
                      AND ".$this->db->escape(date('Y-m-d', strtotime($ed)))." AND stats = 'A' AND ct.businessID = '$id'
                      GROUP BY trdate
                      ORDER BY trdate ASC
                  ) AS b ON a.trdate = b.trdate
                  LEFT JOIN (
                      SELECT DATE_FORMAT(request_date, '%Y-%m-%d') AS trdate, COUNT(*) AS rjc from `perso_requests` AS r JOIN user_web AS u ON r.userID = u.userID JOIN business_type AS ct ON u.businessID = ct.businessID  WHERE  request_date BETWEEN ".$this->db->escape(date('Y-m-d', strtotime($sd)))." 
                      AND ".$this->db->escape(date('Y-m-d', strtotime($ed)))." AND stats = 'R' AND ct.businessID = '$id'
                      GROUP BY trdate
                      ORDER BY trdate ASC
                  ) AS c ON a.trdate = c.trdate";
   }
   elseif ($m == 'month') {
        $query="SELECT a.trdate, jml, COALESCE(apv,0) AS apv, COALESCE(rjc,0) AS rjc FROM (
                    SELECT DATE_FORMAT(request_date, '%Y-%m') AS trdate, COUNT(*) AS jml from `perso_requests` AS r JOIN user_web AS u ON r.userID = u.userID JOIN business_type AS ct ON u.businessID = ct.businessID  WHERE  request_date BETWEEN ".$this->db->escape(date('Y-m-d', strtotime($sd)))." 
                    AND ".$this->db->escape(date('Y-m-d', strtotime($ed)))." AND ct.businessID = '$id'
                    GROUP BY trdate
                    ORDER BY trdate ASC
                  ) AS a LEFT JOIN (
                      SELECT DATE_FORMAT(request_date, '%Y-%m') AS trdate, COUNT(*) AS apv from `perso_requests` AS r JOIN user_web AS u ON r.userID = u.userID JOIN business_type AS ct ON u.businessID = ct.businessID  WHERE  request_date BETWEEN ".$this->db->escape(date('Y-m-d', strtotime($sd)))." 
                      AND ".$this->db->escape(date('Y-m-d', strtotime($ed)))." AND stats = 'A' AND ct.businessID = '$id'
                      GROUP BY trdate
                      ORDER BY trdate ASC
                  ) AS b ON a.trdate = b.trdate
                  LEFT JOIN (
                      SELECT DATE_FORMAT(request_date, '%Y-%m') AS trdate, COUNT(*) AS rjc from `perso_requests` AS r JOIN user_web AS u ON r.userID = u.userID JOIN business_type AS ct ON u.businessID = ct.businessID  WHERE  request_date BETWEEN ".$this->db->escape(date('Y-m-d', strtotime($sd)))." 
                      AND ".$this->db->escape(date('Y-m-d', strtotime($ed)))." AND stats = 'R' AND ct.businessID = '$id'
                      GROUP BY trdate
                      ORDER BY trdate ASC
                  ) AS c ON a.trdate = c.trdate";
   }
   elseif ($m == 'year'){
        $query = "SELECT a.trdate, jml, COALESCE(apv,0) AS apv, COALESCE(rjc,0) AS rjc FROM (
                    SELECT DATE_FORMAT(request_date, '%Y') AS trdate, COUNT(*) AS jml from `perso_requests` AS r JOIN user_web AS u ON r.userID = u.userID JOIN business_type AS ct ON u.businessID = ct.businessID  WHERE  request_date BETWEEN ".$this->db->escape(date('Y-m-d', strtotime($sd)))." 
                    AND ".$this->db->escape(date('Y-m-d', strtotime($ed)))." AND ct.businessID = '$id'
                    GROUP BY trdate
                    ORDER BY trdate ASC
                  ) AS a LEFT JOIN (
                      SELECT DATE_FORMAT(request_date, '%Y') AS trdate, COUNT(*) AS apv from `perso_requests` AS r JOIN user_web AS u ON r.userID = u.userID JOIN business_type AS ct ON u.businessID = ct.businessID  WHERE  request_date BETWEEN ".$this->db->escape(date('Y-m-d', strtotime($sd)))." 
                      AND ".$this->db->escape(date('Y-m-d', strtotime($ed)))." AND stats = 'A' AND ct.businessID = '$id'
                      GROUP BY trdate
                      ORDER BY trdate ASC
                  ) AS b ON a.trdate = b.trdate
                  LEFT JOIN (
                      SELECT DATE_FORMAT(request_date, '%Y') AS trdate, COUNT(*) AS rjc from `perso_requests` AS r JOIN user_web AS u ON r.userID = u.userID JOIN business_type AS ct ON u.typeID = ct.typeID  WHERE  request_date BETWEEN ".$this->db->escape(date('Y-m-d', strtotime($sd)))." 
                      AND ".$this->db->escape(date('Y-m-d', strtotime($ed)))." AND stats = 'R' AND ct.typeID = '$id'
                      GROUP BY trdate
                      ORDER BY trdate ASC
                  ) AS c ON a.trdate = c.trdate";
   } else {
    $query = "SELECT a.trdate, jml, COALESCE(apv,0) AS apv, COALESCE(rjc,0) AS rjc  FROM (
                    SELECT DATE_FORMAT(request_date, '%Y-%m-%d') AS trdate, COUNT(*) AS jml from `perso_requests` AS r JOIN user_web AS u ON r.userID = u.userID JOIN business_type AS ct ON u.businessID = ct.businessID  WHERE  request_date BETWEEN ".$this->db->escape(date('Y-m-d', strtotime($sd)))." 
                    AND ".$this->db->escape(date('Y-m-d', strtotime($ed)))." AND ct.businessID = '$id'
                    GROUP BY trdate
                    ORDER BY trdate ASC
                  ) AS a LEFT JOIN (
                      SELECT DATE_FORMAT(request_date, '%Y-%m-%d') AS trdate, COUNT(*) AS apv from `perso_requests` AS r JOIN user_web AS u ON r.userID = u.userID JOIN business_type AS ct ON u.businessID = ct.businessID  WHERE  request_date BETWEEN ".$this->db->escape(date('Y-m-d', strtotime($sd)))." 
                      AND ".$this->db->escape(date('Y-m-d', strtotime($ed)))." AND stats = 'A' AND ct.businessID = '$id'
                      GROUP BY trdate
                      ORDER BY trdate ASC
                  ) AS b ON a.trdate = b.trdate
                  LEFT JOIN (
                      SELECT DATE_FORMAT(request_date, '%Y-%m-%d') AS trdate, COUNT(*) AS rjc from `perso_requests` AS r JOIN user_web AS u ON r.userID = u.userID JOIN business_type AS ct ON u.businessID = ct.businessID  WHERE  request_date BETWEEN ".$this->db->escape(date('Y-m-d', strtotime($sd)))." 
                      AND ".$this->db->escape(date('Y-m-d', strtotime($ed)))." AND stats = 'R' AND ct.businessID = '$id'
                      GROUP BY trdate
                      ORDER BY trdate ASC
                  ) AS c ON a.trdate = c.trdate";
   }
    $query = $this->db->query($query);
    $total = array();
    $apv = array();
    $rjc = array();
    $timestamp = array();
    $res = $query->result();
    foreach ($res as $obj) {
        array_push($total, $obj->jml);
        array_push($apv, $obj->apv);
        array_push($rjc, $obj->rjc);
        array_push($timestamp, $obj->trdate);
    }
    $data = array("total" => $total, "apv" => $apv, "rjc" => $rjc, "time" => $timestamp);
    return $data;

  }

  function get_monthly_produsen_card($mode, $m, $sd, $ed, $id){
    if ($m == 'day') {
        $query = "SELECT a.trdate, jml, COALESCE(apv,0) AS apv, COALESCE(rjc,0) AS rjc FROM (
                    SELECT DATE_FORMAT(r.last_update, '%Y-%m-%d') AS trdate, COUNT(*) AS jml from `viewpersocarddata` AS r WHERE r.mode LIKE '$mode' AND r.last_update BETWEEN ".$this->db->escape(date('Y-m-d', strtotime($sd)))." 
                    AND ".$this->db->escape(date('Y-m-d', strtotime($ed)))." AND r.businessID = '$id'
                    GROUP BY trdate
                    ORDER BY trdate ASC
                  ) AS a LEFT JOIN (
                      SELECT DATE_FORMAT(r.last_update, '%Y-%m-%d') AS trdate, COUNT(*) AS apv from `viewpersocarddata` AS r WHERE r.mode LIKE '$mode' AND r.last_update BETWEEN ".$this->db->escape(date('Y-m-d', strtotime($sd)))." 
                      AND ".$this->db->escape(date('Y-m-d', strtotime($ed)))." AND stats = 'C' AND r.businessID = '$id'
                      GROUP BY trdate
                      ORDER BY trdate ASC
                  ) AS b ON a.trdate = b.trdate
                  LEFT JOIN (
                      SELECT DATE_FORMAT(r.last_update, '%Y-%m-%d') AS trdate, COUNT(*) AS rjc from `viewpersocarddata` AS r WHERE r.mode LIKE '$mode' AND r.last_update BETWEEN ".$this->db->escape(date('Y-m-d', strtotime($sd)))." 
                      AND ".$this->db->escape(date('Y-m-d', strtotime($ed)))." AND stats = 'F' AND r.businessID = '$id'
                      GROUP BY trdate
                      ORDER BY trdate ASC
                  ) AS c ON a.trdate = c.trdate";
   }
   elseif ($m == 'month') {
        $query="SELECT a.trdate, jml, COALESCE(apv,0) AS apv, COALESCE(rjc,0) AS rjc FROM (
                    SELECT DATE_FORMAT(r.last_update, '%Y-%m') AS trdate, COUNT(*) AS jml from `viewpersocarddata` AS r  WHERE r.mode LIKE '$mode' AND r.last_update BETWEEN ".$this->db->escape(date('Y-m-d', strtotime($sd)))." 
                    AND ".$this->db->escape(date('Y-m-d', strtotime($ed)))." AND r.businessID = '$id'
                    GROUP BY trdate
                    ORDER BY trdate ASC
                  ) AS a LEFT JOIN (
                      SELECT DATE_FORMAT(r.last_update, '%Y-%m') AS trdate, COUNT(*) AS apv from `viewpersocarddata` AS r  WHERE r.mode LIKE '$mode' AND r.last_update BETWEEN ".$this->db->escape(date('Y-m-d', strtotime($sd)))." 
                      AND ".$this->db->escape(date('Y-m-d', strtotime($ed)))." AND stats = 'C' AND r.businessID = '$id'
                      GROUP BY trdate
                      ORDER BY trdate ASC
                  ) AS b ON a.trdate = b.trdate
                  LEFT JOIN (
                      SELECT DATE_FORMAT(r.last_update, '%Y-%m') AS trdate, COUNT(*) AS rjc from `viewpersocarddata` AS r WHERE r.mode LIKE '$mode' AND r.last_update BETWEEN ".$this->db->escape(date('Y-m-d', strtotime($sd)))." 
                      AND ".$this->db->escape(date('Y-m-d', strtotime($ed)))." AND stats = 'F' AND r.businessID = '$id'
                      GROUP BY trdate
                      ORDER BY trdate ASC
                  ) AS c ON a.trdate = c.trdate";
   }
   elseif ($m == 'year'){
        $query = "SELECT a.trdate, jml, COALESCE(apv,0) AS apv, COALESCE(rjc,0) AS rjc FROM (
                    SELECT DATE_FORMAT(r.last_update, '%Y') AS trdate, COUNT(*) AS jml from `viewpersocarddata` AS r WHERE r.mode LIKE '$mode' AND r.last_update BETWEEN ".$this->db->escape(date('Y-m-d', strtotime($sd)))." 
                    AND ".$this->db->escape(date('Y-m-d', strtotime($ed)))." AND r.businessID = '$id'
                    GROUP BY trdate
                    ORDER BY trdate ASC
                  ) AS a LEFT JOIN (
                      SELECT DATE_FORMAT(r.last_update, '%Y') AS trdate, COUNT(*) AS apv from `viewpersocarddata` AS r WHERE r.mode LIKE '$mode' AND r.last_update BETWEEN ".$this->db->escape(date('Y-m-d', strtotime($sd)))." 
                      AND ".$this->db->escape(date('Y-m-d', strtotime($ed)))." AND stats = 'C' AND r.businessID = '$id'
                      GROUP BY trdate
                      ORDER BY trdate ASC
                  ) AS b ON a.trdate = b.trdate
                  LEFT JOIN (
                      SELECT DATE_FORMAT(r.last_update, '%Y') AS trdate, COUNT(*) AS rjc from `viewpersocarddata` AS r WHERE r.mode LIKE '$mode' AND r.last_update BETWEEN ".$this->db->escape(date('Y-m-d', strtotime($sd)))." 
                      AND ".$this->db->escape(date('Y-m-d', strtotime($ed)))." AND stats = 'F' AND r.businessID = '$id'
                      GROUP BY trdate
                      ORDER BY trdate ASC
                  ) AS c ON a.trdate = c.trdate";
   } else {
    $query = "SELECT a.trdate, jml, COALESCE(apv,0) AS apv, COALESCE(rjc,0) AS rjc  FROM (
                    SELECT DATE_FORMAT(r.last_update, '%Y-%m-%d') AS trdate, COUNT(*) AS jml from `viewpersocarddata` AS r WHERE r.mode LIKE '$mode' AND r.last_update BETWEEN ".$this->db->escape(date('Y-m-d', strtotime($sd)))." 
                    AND ".$this->db->escape(date('Y-m-d', strtotime($ed)))." AND r.businessID = '$id'
                    GROUP BY trdate
                    ORDER BY trdate ASC
                  ) AS a LEFT JOIN (
                      SELECT DATE_FORMAT(r.last_update, '%Y-%m-%d') AS trdate, COUNT(*) AS apv from `viewpersocarddata` AS r WHERE r.mode LIKE '$mode' AND r.last_update BETWEEN ".$this->db->escape(date('Y-m-d', strtotime($sd)))." 
                      AND ".$this->db->escape(date('Y-m-d', strtotime($ed)))." AND stats = 'C' AND r.businessID = '$id'
                      GROUP BY trdate
                      ORDER BY trdate ASC
                  ) AS b ON a.trdate = b.trdate
                  LEFT JOIN (
                      SELECT DATE_FORMAT(r.last_update, '%Y-%m-%d') AS trdate, COUNT(*) AS rjc from `viewpersocarddata` AS r WHERE r.mode LIKE '$mode' AND r.last_update BETWEEN ".$this->db->escape(date('Y-m-d', strtotime($sd)))." 
                      AND ".$this->db->escape(date('Y-m-d', strtotime($ed)))." AND stats = 'F' AND r.businessID = '$id'
                      GROUP BY trdate
                      ORDER BY trdate ASC
                  ) AS c ON a.trdate = c.trdate";
   }
    $query = $this->db->query($query);
    $total = array();
    $apv = array();
    $rjc = array();
    $timestamp = array();
    $res = $query->result();
    foreach ($res as $obj) {
        array_push($total, $obj->jml);
        array_push($apv, $obj->apv);
        array_push($rjc, $obj->rjc);
        array_push($timestamp, $obj->trdate);
    }
    $data = array("total" => $total, "apv" => $apv, "rjc" => $rjc, "time" => $timestamp);
    return $data;

  }

  function get_monthly_pengguna_card($mode, $m, $sd, $ed, $id)
  {
    if ($m == 'day') {
        $query = "SELECT a.trdate, jml, COALESCE(apv,0) AS apv, COALESCE(rjc,0) AS rjc FROM (
                    SELECT DATE_FORMAT(r.last_update, '%Y-%m-%d') AS trdate, COUNT(*) AS jml from `viewpersocarddata` AS r WHERE r.mode LIKE '$mode' AND r.last_update BETWEEN ".$this->db->escape(date('Y-m-d', strtotime($sd)))." 
                    AND ".$this->db->escape(date('Y-m-d', strtotime($ed)))." AND r.lembagaNm = '$id'
                    GROUP BY trdate
                    ORDER BY trdate ASC
                  ) AS a LEFT JOIN (
                      SELECT DATE_FORMAT(r.last_update, '%Y-%m-%d') AS trdate, COUNT(*) AS apv from `viewpersocarddata` AS r WHERE r.mode LIKE '$mode' AND  r.last_update BETWEEN ".$this->db->escape(date('Y-m-d', strtotime($sd)))." 
                      AND ".$this->db->escape(date('Y-m-d', strtotime($ed)))." AND stats = 'C' AND r.lembagaNm = '$id'
                      GROUP BY trdate
                      ORDER BY trdate ASC
                  ) AS b ON a.trdate = b.trdate
                  LEFT JOIN (
                      SELECT DATE_FORMAT(r.last_update, '%Y-%m-%d') AS trdate, COUNT(*) AS rjc from `viewpersocarddata` AS r WHERE r.mode LIKE '$mode' AND  r.last_update BETWEEN ".$this->db->escape(date('Y-m-d', strtotime($sd)))." 
                      AND ".$this->db->escape(date('Y-m-d', strtotime($ed)))." AND stats = 'F' AND r.lembagaNm = '$id'
                      GROUP BY trdate
                      ORDER BY trdate ASC
                  ) AS c ON a.trdate = c.trdate";
   }
   elseif ($m == 'month') {
        $query="SELECT a.trdate, jml, COALESCE(apv,0) AS apv, COALESCE(rjc,0) AS rjc FROM (
                    SELECT DATE_FORMAT(r.last_update, '%Y-%m') AS trdate, COUNT(*) AS jml from `viewpersocarddata` AS r  WHERE r.mode LIKE '$mode' AND  r.last_update BETWEEN ".$this->db->escape(date('Y-m-d', strtotime($sd)))." 
                    AND ".$this->db->escape(date('Y-m-d', strtotime($ed)))." AND r.lembagaNm = '$id'
                    GROUP BY trdate
                    ORDER BY trdate ASC
                  ) AS a LEFT JOIN (
                      SELECT DATE_FORMAT(r.last_update, '%Y-%m') AS trdate, COUNT(*) AS apv from `viewpersocarddata` AS r  WHERE r.mode LIKE '$mode' AND  r.last_update BETWEEN ".$this->db->escape(date('Y-m-d', strtotime($sd)))." 
                      AND ".$this->db->escape(date('Y-m-d', strtotime($ed)))." AND stats = 'C' AND r.lembagaNm = '$id'
                      GROUP BY trdate
                      ORDER BY trdate ASC
                  ) AS b ON a.trdate = b.trdate
                  LEFT JOIN (
                      SELECT DATE_FORMAT(r.last_update, '%Y-%m') AS trdate, COUNT(*) AS rjc from `viewpersocarddata` AS r WHERE r.mode LIKE '$mode' AND  r.last_update BETWEEN ".$this->db->escape(date('Y-m-d', strtotime($sd)))." 
                      AND ".$this->db->escape(date('Y-m-d', strtotime($ed)))." AND stats = 'F' AND r.lembagaNm = '$id'
                      GROUP BY trdate
                      ORDER BY trdate ASC
                  ) AS c ON a.trdate = c.trdate";
   }
   elseif ($m == 'year'){
        $query = "SELECT a.trdate, jml, COALESCE(apv,0) AS apv, COALESCE(rjc,0) AS rjc FROM (
                    SELECT DATE_FORMAT(r.last_update, '%Y') AS trdate, COUNT(*) AS jml from `viewpersocarddata` AS r WHERE r.mode LIKE '$mode' AND  r.last_update BETWEEN ".$this->db->escape(date('Y-m-d', strtotime($sd)))." 
                    AND ".$this->db->escape(date('Y-m-d', strtotime($ed)))." AND r.lembagaNm = '$id'
                    GROUP BY trdate
                    ORDER BY trdate ASC
                  ) AS a LEFT JOIN (
                      SELECT DATE_FORMAT(r.last_update, '%Y') AS trdate, COUNT(*) AS apv from `viewpersocarddata` AS r WHERE r.mode LIKE '$mode' AND  r.last_update BETWEEN ".$this->db->escape(date('Y-m-d', strtotime($sd)))." 
                      AND ".$this->db->escape(date('Y-m-d', strtotime($ed)))." AND stats = 'C' AND r.lembagaNm = '$id'
                      GROUP BY trdate
                      ORDER BY trdate ASC
                  ) AS b ON a.trdate = b.trdate
                  LEFT JOIN (
                      SELECT DATE_FORMAT(r.last_update, '%Y') AS trdate, COUNT(*) AS rjc from `viewpersocarddata` AS r WHERE r.mode LIKE '$mode' AND  r.last_update BETWEEN ".$this->db->escape(date('Y-m-d', strtotime($sd)))." 
                      AND ".$this->db->escape(date('Y-m-d', strtotime($ed)))." AND stats = 'F' AND r.lembagaNm = '$id'
                      GROUP BY trdate
                      ORDER BY trdate ASC
                  ) AS c ON a.trdate = c.trdate";
   } else {
    $query = "SELECT a.trdate, jml, COALESCE(apv,0) AS apv, COALESCE(rjc,0) AS rjc  FROM (
                    SELECT DATE_FORMAT(r.last_update, '%Y-%m-%d') AS trdate, COUNT(*) AS jml from `viewpersocarddata` AS r WHERE r.mode LIKE '$mode' AND  r.last_update BETWEEN ".$this->db->escape(date('Y-m-d', strtotime($sd)))." 
                    AND ".$this->db->escape(date('Y-m-d', strtotime($ed)))." AND r.lembagaNm = '$id'
                    GROUP BY trdate
                    ORDER BY trdate ASC
                  ) AS a LEFT JOIN (
                      SELECT DATE_FORMAT(r.last_update, '%Y-%m-%d') AS trdate, COUNT(*) AS apv from `viewpersocarddata` AS r WHERE r.mode LIKE '$mode' AND  r.last_update BETWEEN ".$this->db->escape(date('Y-m-d', strtotime($sd)))." 
                      AND ".$this->db->escape(date('Y-m-d', strtotime($ed)))." AND stats = 'C' AND r.lembagaNm = '$id'
                      GROUP BY trdate
                      ORDER BY trdate ASC
                  ) AS b ON a.trdate = b.trdate
                  LEFT JOIN (
                      SELECT DATE_FORMAT(r.last_update, '%Y-%m-%d') AS trdate, COUNT(*) AS rjc from `viewpersocarddata` AS r WHERE r.mode LIKE '$mode' AND  r.last_update BETWEEN ".$this->db->escape(date('Y-m-d', strtotime($sd)))." 
                      AND ".$this->db->escape(date('Y-m-d', strtotime($ed)))." AND stats = 'F' AND r.lembagaNm = '$id'
                      GROUP BY trdate
                      ORDER BY trdate ASC
                  ) AS c ON a.trdate = c.trdate";
   }
    $query = $this->db->query($query);
    $total = array();
    $apv = array();
    $rjc = array();
    $timestamp = array();
    $res = $query->result();
    foreach ($res as $obj) {
        array_push($total, $obj->jml);
        array_push($apv, $obj->apv);
        array_push($rjc, $obj->rjc);
        array_push($timestamp, $obj->trdate);
    }
    $data = array("total" => $total, "apv" => $apv, "rjc" => $rjc, "time" => $timestamp);
    return $data;

  }

  public function get_year_time_stamp($m){
    if ($m=="day") {
      $string="SELECT lt.Day as date FROM ltdays lt LEFT JOIN (select * from `project` WHERE finish = 1 AND year(startDt) = '".date('Y')."' AND month(startDt) = '6') tor on lt.ID =day(tor.startDt) GROUP BY lt.Day ORDER BY lt.ID";
    }
    elseif ($m=="month") {

    }
    else{
      $string="SELECT year(startDt) as date FROM `project` GROUP BY date ORDER BY date";
    }
    $query = $this->db->query($string);

    $data = array();
    $res = $query->result();

    foreach ($res as $key) {
      array_push($data, $key->date);
    }

      //var_dump($data);

    return $data;
  }

  function get_transaction_cost($m){
    if($m=="day")
    {
     $str="SELECT (materialCost + workCost + otherCost + taxCost) AS total FROM 
     project tok 
     WHERE tok.finish = 1 AND tok.startDt BETWEEN '".date('Y-m-d')." 00:00:00' and NOW()";
   }
   else if($m=="month")
   {
     $str="SELECT (materialCost + workCost + otherCost + taxCost) AS total FROM 
     project tok 
     WHERE tok.finish = 1 AND month(tok.startDt) = '".date('m')."' ";
   }
   else{
     $str="SELECT (materialCost + workCost + otherCost + taxCost) AS total FROM 
     project tok 
     WHERE tok.finish = 1 AND year(startDt) = '".date('Y')."' ";
   }

   $query = $this->db->query($str);
   if ($query->row() == null) {
     return 0;
   }
   else{
     return $query->row()->total;
   }
  }

  public function get_all_project(){
    $query = $this->db->query("SELECT p.projectID, p.cost as total, p.projectNm,p.latitude,p.langitude, p.address,p.city, c.countryNm 
                               FROM `project` AS p JOIN country AS c ON p.countryID = c.countryID");
    return $query->result();
  }

   public function get_progress_perso(){
    $query = $this->db->query("SELECT p.requestID, u.employee_name, p.request_title, p.request_date, p.actual_start, p.jml_mesin
                               FROM `perso_requests` AS p 
                               JOIN user_web AS u ON u.userID = p.userID
                               WHERE p.perso_stats = 'P'");
    return $query->result();
  }

  public function get_cleared_lists() {
    $query = $this->db->query("SELECT p.no_identitas, p.pcid, p.manifest, p.last_update,
                               CASE stats
                               WHEN 'C' THEN 'Cleared'
                               WHEN 'F' THEN 'Failed'
                               END AS stats_text
                               FROM `viewpersocarddata` AS p 
                               WHERE p.stats = 'C' AND COALESCE(activate, 0) = 0
                               order by p.last_update DESC
                               LIMIT 20");
    return $query->result();
  }

  public function get_all_requests_pengguna($id, $sd, $ed){
    $query = $this->db->query("SELECT r.requestID, COALESCE(bt.businessNm,'-') AS businessNm, r.request_title, r.request_date, r.request_no, r.jml_mesin, r.stats
                               FROM  requests AS r  
                               JOIN user_web AS u ON u.userID = r.userID
                               JOIN `cert_type` AS ct ON ct.typeID = u.typeID
                               LEFT JOIN business_type AS bt ON bt.businessID = r.businessID                              
                               WHERE request_date BETWEEN ".$this->db->escape(date('Y-m-d', strtotime($sd)))." 
                    AND ".$this->db->escape(date('Y-m-d', strtotime($ed)))." AND  ct.typeID = '$id'");
    return $query->result();
  }

  public function get_all_requests_produsen($id, $sd, $ed){
    $query = $this->db->query("SELECT r.requestID, COALESCE(ct2.typeNm,'-') AS businessNm, r.request_title, r.request_date, r.request_no, COALESCE(pd.qty,0) as jml_mesin, r.stats
                               FROM  perso_requests AS r  
                               JOIN user_web AS u ON u.userID = r.userID
                               JOIN `business_type` AS ct ON ct.businessID = u.businessID
                               JOIN `perso_detail` AS pd ON pd.requestID = r.requestID
                               JOIN requests AS q ON q.requestID = pd.activateID 
                               JOIN user_web AS u2 ON u2.userID = q.userID
                               JOIN `cert_type` AS ct2 ON ct2.typeID = u2.typeID               
                               WHERE r.request_date BETWEEN ".$this->db->escape(date('Y-m-d', strtotime($sd)))." 
                    AND ".$this->db->escape(date('Y-m-d', strtotime($ed)))." AND  ct.businessID = '$id'");
    return $query->result();
  }

  public function get_total_requests_produsen_card($mode, $id, $sd, $ed, $keyword){
    $query = $this->db->query("SELECT COUNT(vpc.card_id) AS jumlah FROM viewpersocarddata AS vpc
                               WHERE vpc.mode LIKE '$mode' AND vpc.last_update BETWEEN ".$this->db->escape(date('Y-m-d', strtotime($sd)))." 
                    AND ".$this->db->escape(date('Y-m-d', strtotime($ed)))." AND  vpc.businessID = '$id' AND (vpc.no_identitas LIKE '%".$keyword."%' OR vpc.pcid LIKE '%".$keyword."%' OR vpc.manifest LIKE '%".$keyword."%' OR vpc.stats LIKE '%".$keyword."%')");
    $row = $query->row();
    return $row->jumlah;
  }

  public function get_all_requests_produsen_card($mode, $id, $sd, $ed, $start, $keyword){
    $query = $this->db->query("SELECT vpc.card_id, vpc.last_update, vpc.no_identitas, vpc.pcid, vpc.manifest, vpc.stats FROM viewpersocarddata AS vpc
                               WHERE vpc.mode LIKE '$mode' AND vpc.last_update BETWEEN ".$this->db->escape(date('Y-m-d', strtotime($sd)))." 
                    AND ".$this->db->escape(date('Y-m-d', strtotime($ed)))." AND  vpc.businessID = '$id' AND (vpc.no_identitas LIKE '%".$keyword."%' OR vpc.pcid LIKE '%".$keyword."%' OR vpc.manifest LIKE '%".$keyword."%' OR vpc.stats LIKE '%".$keyword."%') ORDER BY vpc.last_update DESC 
                    LIMIT ".$start.", 25");
    return $query->result();
  }

  public function get_total_requests_pengguna_card($mode, $id, $sd, $ed, $keyword){
    $query = $this->db->query("SELECT COUNT(vpc.card_id) AS jumlah FROM viewpersocarddata AS vpc
                               WHERE vpc.mode LIKE '$mode' AND vpc.last_update BETWEEN ".$this->db->escape(date('Y-m-d', strtotime($sd)))." 
                    AND ".$this->db->escape(date('Y-m-d', strtotime($ed)))." AND  vpc.lembagaNm = '$id' AND (vpc.no_identitas LIKE '%".$keyword."%' OR vpc.pcid LIKE '%".$keyword."%' OR vpc.manifest LIKE '%".$keyword."%' OR vpc.stats LIKE '%".$keyword."%')");
    $row = $query->row();
    return $row->jumlah;
  }

  public function get_all_requests_pengguna_card($mode, $id, $sd, $ed, $start, $keyword){
    $query = $this->db->query("SELECT vpc.card_id, vpc.last_update, vpc.no_identitas, vpc.pcid, vpc.manifest, vpc.stats FROM viewpersocarddata AS vpc
                               WHERE vpc.mode LIKE '$mode' AND vpc.last_update BETWEEN ".$this->db->escape(date('Y-m-d', strtotime($sd)))." 
                    AND ".$this->db->escape(date('Y-m-d', strtotime($ed)))." AND  vpc.lembagaNm = '$id' AND (vpc.no_identitas LIKE '%".$keyword."%' OR vpc.pcid LIKE '%".$keyword."%' OR vpc.manifest LIKE '%".$keyword."%' OR vpc.stats LIKE '%".$keyword."%') ORDER BY vpc.last_update DESC 
                    LIMIT ".$start.", 25");
    return $query->result();
  }

   public function getRequestNumByPengguna($id_pengguna, $sts, $sd, $ed) {
    $query = $this->db->query("SELECT COUNT(r.requestID) AS jml_request FROM `cert_type` AS ct 
                                LEFT JOIN user_web AS u ON ct.typeID = u.typeID 
                                LEFT JOIN requests AS r ON u.userID = r.userID 
                                WHERE request_date BETWEEN ".$this->db->escape(date('Y-m-d', strtotime($sd)))." 
                    AND ".$this->db->escape(date('Y-m-d', strtotime($ed)))." AND  ct.active = 1 AND stats LIKE ".$this->db->escape($sts)." AND ct.typeID = '$id_pengguna'");
    if ($query->row()->jml_request == '') {
      return 0;
    }
    else{
      return $query->row()->jml_request;
    }
  }

   public function getRequestNumByProdusen($id_produsen, $sts, $sd, $ed) {
    $query = $this->db->query("SELECT COUNT(r.requestID) AS jml_request FROM `business_type` AS ct 
                                LEFT JOIN user_web AS u ON ct.businessID = u.businessID 
                                LEFT JOIN perso_requests AS r ON u.userID = r.userID 
                                WHERE request_date BETWEEN ".$this->db->escape(date('Y-m-d', strtotime($sd)))." 
                    AND ".$this->db->escape(date('Y-m-d', strtotime($ed)))." AND ct.active = 1 AND stats LIKE ".$this->db->escape($sts)." AND ct.businessID = '$id_produsen'");
    if ($query->row()->jml_request == '') {
      return 0;
    }
    else{
      return $query->row()->jml_request;
    }
  }

  public function getRequestNumByProdusenCard($mode, $id_produsen, $sts, $activate, $sd, $ed) {
    $query = $this->db->query("SELECT COUNT(vpc.card_id) AS jml_request FROM viewpersocarddata AS vpc
                                WHERE vpc.mode LIKE '$mode' AND vpc.last_update BETWEEN ".$this->db->escape(date('Y-m-d', strtotime($sd)))." 
                    AND ".$this->db->escape(date('Y-m-d', strtotime($ed)))." AND vpc.stats LIKE ".$this->db->escape($sts)." AND COALESCE(vpc.activate,0) LIKE ".$this->db->escape($activate)." AND vpc.businessID = '$id_produsen'");
    if ($query->row()->jml_request == '') {
      return 0;
    }
    else{
      return $query->row()->jml_request;
    }
  }

  public function getRequestNumByPenggunaCard($mode, $id_produsen, $sts, $activate, $sd, $ed) {
    $query = $this->db->query("SELECT COUNT(vpc.card_id) AS jml_request FROM viewpersocarddata AS vpc
                                WHERE vpc.mode LIKE '$mode' AND vpc.last_update BETWEEN ".$this->db->escape(date('Y-m-d', strtotime($sd)))." 
                    AND ".$this->db->escape(date('Y-m-d', strtotime($ed)))." AND vpc.stats LIKE ".$this->db->escape($sts)." AND COALESCE(vpc.activate,0) LIKE ".$this->db->escape($activate)." AND vpc.lembagaNm = '$id_produsen'");
    if ($query->row()->jml_request == '') {
      return 0;
    }
    else{
      return $query->row()->jml_request;
    }
  }

  public function get_progress_requests() {
     $query = $this->db->query("SELECT p.requestID, u.employee_name, p.request_title, p.request_date
                               FROM `requests` AS p 
                               JOIN user_web AS u ON u.userID = p.userID
                               WHERE p.stats = 'P'");
    return $query->result();
  }
}