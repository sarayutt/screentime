<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Knowledge extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Knowledge_model');
    } 

    /*
     * Listing of knowledge
     */
    function index()
    {
        $data['knowledge'] = $this->Knowledge_model->get_all_knowledge();
        
        $data['_view'] = 'knowledge/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new knowledge
     */
    function add()
    {   
        if(isset($_POST) && count($_POST) > 0)     
        {   
            $params = array(
				'type' => $this->input->post('type'),
				'name' => $this->input->post('name'),
				'text' => $this->input->post('text'),
                'fileupload' => $this->input->post('user_image'),
            );
            
            $knowledge_id = $this->Knowledge_model->add_knowledge($params);
            redirect('knowledge/index');
        }
        else
        {            
            $data['_view'] = 'knowledge/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a knowledge
     */
    function edit($Know_Id)
    {   
        // check if the knowledge exists before trying to edit it
        $data['knowledge'] = $this->Knowledge_model->get_knowledge($Know_Id);
        
        if(isset($data['knowledge']['Know_Id']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
					'type' => $this->input->post('type'),
					'name' => $this->input->post('name'),
					'text' => $this->input->post('text'),
                    'fileupload' => $this->input->post('user_image'),
                );

                $this->Knowledge_model->update_knowledge($Know_Id,$params);            
                redirect('knowledge/index');
            }
            else
            {
                $data['_view'] = 'knowledge/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The knowledge you are trying to edit does not exist.');
    } 

    /*
     * Deleting knowledge
     */
    function remove($Know_Id)
    {
        $knowledge = $this->Knowledge_model->get_knowledge($Know_Id);

        // check if the knowledge exists before trying to delete it
        if(isset($knowledge['Know_Id']))
        {
            $this->Knowledge_model->delete_knowledge($Know_Id);
            redirect('knowledge/index');
        }
        else
            show_error('The knowledge you are trying to delete does not exist.');
    }
    
}

