<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Suggestion extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Suggestion_model');
    } 

    /*
     * Listing of suggestion
     */
    function index()
    {
        $data['suggestion'] = $this->Suggestion_model->get_all_suggestion();
        
        $data['_view'] = 'suggestion/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new suggestion
     */
    function add()
    {   
        if(isset($_POST) && count($_POST) > 0)     
        {   
            $params = array(
				'Imp_id' => $this->input->post('Imp_id'),
				'date' => $this->input->post('date'),
				'text' => $this->input->post('text'),
            );
            
            $suggestion_id = $this->Suggestion_model->add_suggestion($params);
            redirect('suggestion/index');
        }
        else
        {            
            $data['_view'] = 'suggestion/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a suggestion
     */
    function edit($Sug_Id)
    {   
        // check if the suggestion exists before trying to edit it
        $data['suggestion'] = $this->Suggestion_model->get_suggestion($Sug_Id);
        
        if(isset($data['suggestion']['Sug_Id']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
					'Imp_id' => $this->input->post('Imp_id'),
					'date' => $this->input->post('date'),
					'text' => $this->input->post('text'),
                );

                $this->Suggestion_model->update_suggestion($Sug_Id,$params);            
                redirect('suggestion/index');
            }
            else
            {
                $data['_view'] = 'suggestion/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The suggestion you are trying to edit does not exist.');
    } 

    /*
     * Deleting suggestion
     */
    function remove($Sug_Id)
    {
        $suggestion = $this->Suggestion_model->get_suggestion($Sug_Id);

        // check if the suggestion exists before trying to delete it
        if(isset($suggestion['Sug_Id']))
        {
            $this->Suggestion_model->delete_suggestion($Sug_Id);
            redirect('suggestion/index');
        }
        else
            show_error('The suggestion you are trying to delete does not exist.');
    }
    
}