<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Notification extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Notification_model');
    } 

    /*
     * Listing of notification
     */
    function index()
    {
        $data['notification'] = $this->Notification_model->get_all_notification();
        
        $data['_view'] = 'notification/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new notification
     */
    function add()
    {   
        if(isset($_POST) && count($_POST) > 0)     
        {   
            $params = array(
				'user_id' => $this->input->post('user_id'),
				'tac_id' => $this->input->post('tac_id'),
				'status' => $this->input->post('status'),
				'date' => $this->input->post('date'),
				'text' => $this->input->post('text'),
            );
            
            $notification_id = $this->Notification_model->add_notification($params);
            redirect('notification/index');
        }
        else
        {            
            $data['_view'] = 'notification/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a notification
     */
    function edit($not_id)
    {   
        // check if the notification exists before trying to edit it
        $data['notification'] = $this->Notification_model->get_notification($not_id);
        
        if(isset($data['notification']['not_id']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
					'user_id' => $this->input->post('user_id'),
					'tac_id' => $this->input->post('tac_id'),
					'status' => $this->input->post('status'),
					'date' => $this->input->post('date'),
					'text' => $this->input->post('text'),
                );

                $this->Notification_model->update_notification($not_id,$params);            
                redirect('notification/index');
            }
            else
            {
                $data['_view'] = 'notification/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The notification you are trying to edit does not exist.');
    } 

    /*
     * Deleting notification
     */
    function remove($not_id)
    {
        $notification = $this->Notification_model->get_notification($not_id);

        // check if the notification exists before trying to delete it
        if(isset($notification['not_id']))
        {
            $this->Notification_model->delete_notification($not_id);
            redirect('notification/index');
        }
        else
            show_error('The notification you are trying to delete does not exist.');
    }
    
}