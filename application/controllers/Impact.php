<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Impact extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Impact_model');
    } 

    /*
     * Listing of impact
     */
    function index()
    {
        $data['impact'] = $this->Impact_model->get_all_impact();
        
        $data['_view'] = 'impact/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new impact
     */
    function add()
    {   
        if(isset($_POST) && count($_POST) > 0)     
        {   
            $params = array(
				'Factor_Id' => $this->input->post('Factor_Id'),
				'trac_id' => $this->input->post('trac_id'),
				'totallmp' => $this->input->post('totallmp'),
				'date' => $this->input->post('date'),
				'text' => $this->input->post('text'),
            );
            
            $impact_id = $this->Impact_model->add_impact($params);
            redirect('impact/index');
        }
        else
        {            
            $data['_view'] = 'impact/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a impact
     */
    function edit($Imp_id)
    {   
        // check if the impact exists before trying to edit it
        $data['impact'] = $this->Impact_model->get_impact($Imp_id);
        
        if(isset($data['impact']['Imp_id']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
					'Factor_Id' => $this->input->post('Factor_Id'),
					'trac_id' => $this->input->post('trac_id'),
					'totallmp' => $this->input->post('totallmp'),
					'date' => $this->input->post('date'),
					'text' => $this->input->post('text'),
                );

                $this->Impact_model->update_impact($Imp_id,$params);            
                redirect('impact/index');
            }
            else
            {
                $data['_view'] = 'impact/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The impact you are trying to edit does not exist.');
    } 

    /*
     * Deleting impact
     */
    function remove($Imp_id)
    {
        $impact = $this->Impact_model->get_impact($Imp_id);

        // check if the impact exists before trying to delete it
        if(isset($impact['Imp_id']))
        {
            $this->Impact_model->delete_impact($Imp_id);
            redirect('impact/index');
        }
        else
            show_error('The impact you are trying to delete does not exist.');
    }
    
}
