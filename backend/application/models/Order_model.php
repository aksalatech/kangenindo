<?php

/**
 * 
 */
class Order_model extends CI_Model
{

    function __construct()
    {
        # code...
        parent::__construct();
    }

    public function get_all_order($loc,$req)
    {   $loc1 = ($loc == "") ? "%" : $loc;
		// $req1 = ($req == "") ? "%" : $req;

        $query = $this->db->query("SELECT * from transorder AS o
                                    LEFT JOIN msstore AS st ON o.id_store = st.id_store
                                    WHERE st.store_name LIKE '%".$loc1."%'
                                    AND o.transStatus ='".$req."'");
        return $query->result();
    }

    public function get_all_detail()
    {
        $query = $this->db->query("SELECT * from transorderdetail AS od
                                            LEFT JOIN msimage AS im ON od.menuid=im.imageid");
        return $query->result();
    }

    public function status_detail($req)
    {
        $query = $this->db->query("SELECT status from transorderdetail WHERE transID=" . $this->db->escape($req));
        $result = $query->result();

        $allStatus = array_column($result, 'status');

        // If 'P' is present, return 'P'
        if (in_array('P', $allStatus)) {
            return 'P';
        }

        // If 'R' is present
        if (in_array('R', $allStatus)) {
            // If all statuses are 'R', return 'R'
            if (count(array_unique($allStatus)) === 1 && $allStatus[0] === 'R') {
                return 'R';
            } else {
                return 'D';
            }
        }

        // Default return 'D' if no 'P' or 'R' is found
        return 'D';
    }


    public function get_all_store()
    {
        $query = $this->db->query("SELECT * from msstore");
        return $query->result();
    }

    public function reject_order($data, $ID)
    {
        $this->db->set($data);
        $this->db->where("transdetailID", $ID);
        $this->db->update("transorderdetail");
    }

    public function status_transc($data, $ID)
    {
        $this->db->set($data);
        $this->db->where("transID", $ID);
        $this->db->update("transorder");
    }

    public function complete_order($ID)
    {
        // Validate and sanitize the ID if needed
        if (empty($ID) || !is_numeric($ID)) {
            return false; // or handle the error as needed
        }

        $data = array('status' => 'C');

        // Update query
        $this->db->set($data);
        $this->db->where("transdetailID", $ID);
        $success = $this->db->update("transorderdetail");

        if (!$success) {
            // Optionally log the error or take additional actions
            log_message('error', 'Failed to update order status for ID: ' . $ID);
            return false; // Indicate failure
        }

        return true; // Indicate success
    }

    public function get_all_user_by_id($userID)
    {
        $query = $this->db->query("SELECT * FROM user_web
			WHERE userid = " . $this->db->escape($userID));
        return $query->row();
    }

    public function get_all_user_by_position($position)
    {
        $query = $this->db->query("SELECT * FROM user_web WHERE position = " . $this->db->escape($position));
        return $query->result();
    }

    function getUserByPosition($position)
    {
        $query = $this->db->select()
            ->from("user_web")
            ->where("Position", $position)
            ->get();
        return $query->result();
    }

    public function delete_user($r)
    {
        $this->db->where("userid", $r);
        $this->db->delete("user_web");
    }

    public function add($data)
    {
        if ($this->db->insert('user_web', $data)) {
            return true;
        }
    }

    public function get_all_user_update($data)
    {
        $query = $this->db->query("SELECT * FROM user_web WHERE userID ='" . $this->input->get("d") . "'");
        return $query->result();
    }

    public function get_all_user_id($data)
    {
        $query = $this->db->query("SELECT * FROM user_web WHERE userID =" . $this->db->escape($data));
        return $query->row();
    }

    public function update($data, $ID)
    {
        $this->db->set($data);
        $this->db->where("userid", $ID);
        $this->db->update("user_web");
    }
}
