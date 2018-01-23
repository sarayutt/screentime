<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Impact_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get impact by Imp_id
     */
    function get_impact($Imp_id)
    {
        return $this->db->get_where('impact',array('Imp_id'=>$Imp_id))->row_array();
    }
        
    /*
     * Get all impact
     */
    function get_all_impact()
    {
        $this->db->order_by('Imp_id', 'desc');
        return $this->db->get('impact')->result_array();
    }
        
    /*
     * function to add new impact
     */
    function add_impact($params)
    {
        $this->db->insert('impact',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update impact
     */
    function update_impact($Imp_id,$params)
    {
        $this->db->where('Imp_id',$Imp_id);
        return $this->db->update('impact',$params);
    }
    
    /*
     * function to delete impact
     */
    function delete_impact($Imp_id)
    {
        return $this->db->delete('impact',array('Imp_id'=>$Imp_id));
    }
}
