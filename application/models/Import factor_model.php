<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Import factor_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get import factor by Factor_id
     */
    function get_import factor($Factor_id)
    {
        return $this->db->get_where('import factor',array('Factor_id'=>$Factor_id))->row_array();
    }
        
    /*
     * Get all import factor
     */
    function get_all_import factor()
    {
        $this->db->order_by('Factor_id', 'desc');
        return $this->db->get('import factor')->result_array();
    }
        
    /*
     * function to add new import factor
     */
    function add_import factor($params)
    {
        $this->db->insert('import factor',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update import factor
     */
    function update_import factor($Factor_id,$params)
    {
        $this->db->where('Factor_id',$Factor_id);
        return $this->db->update('import factor',$params);
    }
    
    /*
     * function to delete import factor
     */
    function delete_import factor($Factor_id)
    {
        return $this->db->delete('import factor',array('Factor_id'=>$Factor_id));
    }
}
