<?php
class Sales_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function get_all_bystore()
    {
        $query = $this->db->query("SELECT ts.*, st.store_name FROM transorder as ts LEFT JOIN msstore as st on st.id_store = ts.id_store");
        return $query->result();
    }

    function get_bystore($req,$st,$ed)
    {
        $query = $this->db->query("SELECT ms.store_name,cs.brand_name,SUM(td.transAmt) as transAmt,SUM(td.discAmt) as discAmt,SUM(ts.qty) as qty FROM transorder as td
                                    LEFT JOIN msstore as ms ON td.id_store = ms.id_store
                                    LEFT JOIN transorderdetail as ts on ts.transID = td.transID
                                    LEFT JOIN msimage as img on img.imageid = ts.menuID
                                    LEFT JOIN mscategory as cat on cat.id_category = img.id_category
                                    LEFT JOIN mscustomer as cs on cs.id_customer = cat.idBrand
                                    WHERE cs.brand_name  LIKE '%".$req."%'
                                    AND (td.transDt BETWEEN '".$st."' AND '".$ed."') 
                                    GROUP BY ms.store_name,cs.brand_name");
                                    // echo "<pre>" . htmlspecialchars($this->db->last_query()) . "</pre>";
        return $query->result();
    }

    function get_bybrand($req,$st,$ed)
    {
        $query = $this->db->query("SELECT ms.store_name,cs.brand_name,SUM(td.transAmt) as transAmt,SUM(td.discAmt) as discAmt,SUM(ts.qty) as qty FROM transorder as td
                                    LEFT JOIN msstore as ms ON td.id_store = ms.id_store
                                    LEFT JOIN transorderdetail as ts on ts.transID = td.transID
                                    LEFT JOIN msimage as img on img.imageid = ts.menuID
                                    LEFT JOIN mscategory as cat on cat.id_category = img.id_category
                                    LEFT JOIN mscustomer as cs on cs.id_customer = cat.idBrand
                                    WHERE ms.store_name  LIKE '%".$req."%'
                                    AND (td.transDt BETWEEN '".$st."' AND '".$ed."') 
                                    GROUP BY cs.brand_name");
                                    // echo "<pre>" . htmlspecialchars($this->db->last_query()) . "</pre>";
        return $query->result();
    }

    function get_one_faq_by_id($req)
    {
        $query = $this->db->query("SELECT * FROM msfaq WHERE id_faq = " . $this->db->escape($req));
        return $query->result();
    }

    public function update($req, $data)
    {
        $this->db->set($data);
        $this->db->where("id_faq", $req);
        $this->db->update("msfaq");
    }

    public function add($data)
    {
        $this->db->insert("msfaq", $data);
    }

    public function delete($req)
    {
        $this->db->where("id_faq", $req);
        $this->db->delete("msfaq");
    }
}
