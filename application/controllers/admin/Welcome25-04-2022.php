<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/*
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('login');
	}

    public function user_details(){
        $data['user']=$this->Auth->getAllUser();
        $this->layout->view('users',$data);
     }

	public function post_login()
        {
 
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
 
        $this->form_validation->set_error_delimiters('<div class="text text-danger">', '</div>');
        $this->form_validation->set_message('required', 'Enter %s');
 
        if ($this->form_validation->run() === FALSE)
        {  
            $this->load->view('login');
        }
        else
        {   
            $data = array(
               'email' => $this->input->post('email'),
               'password' => hash('sha512', $this->input->post('password')),
 
             );
   
            $check = $this->Auth->login($data);
            
            if($check == true){
 
                 $user = array(
                 'id' => $check->id,
                 'unique_id' => $check->id,
                 'email' => $check->email,
                );
       
            $this->session->set_userdata($user);
 
             redirect('dashboard') ; 
            }
            
                     $this->form_validation->set_error_delimiters('<div class="text text-danger">', '</div>');  
                     //redirect('Welcome');  
              
 
          $this->load->view('login');
        }
         
    }

   public function checkTherapist(){

	//$therapist_id =	$this->db->post('therapist_id');
     extract($_POST);   
     $data=array(
        'start_date' => $start_date,
		'end_date' => $end_date,
        'therapist_id' => $therapist_id,
		'move_to_last' => $move_to_last,
        'date' => date('Y-m-d')
     );
	
	$check_therapist_query = $this->db->query("SELECT * FROM check_therapist");
		$check_therapist_rownum = $check_therapist_query->num_rows();
		
		if($check_therapist_rownum > 0){
			$this->db->where('id', '1');
			$insert = $this->db->update('check_therapist', $data);
		}else{
			$insert = $this->Auth->insertDur($data);
		}
     
     /*if($insert == true){
        $orderAsc = $this->Auth->checkOrderAsc("SELECT * FROM therapists WHERE order_id='0' ORDER BY order_id ASC");
        $orderDESC = $this->Auth->checkOrderAsc("SELECT * FROM therapists WHERE order_id='0' ORDER BY order_id DESC");
        if(!empty($orderAsc)){
            $therapist_id = $orderAsc[0]['id'];
            $order_id = $orderDESC[0]['order_id'];
            $data=array(
                'order_id'=> $order_id + 1
            );
        
           $this->Main->update('id',$therapist_id, $data,'therapists');
        }
        
     }*/
	 if($insert == true){
		 redirect('dashboard');
	 }

    }
    public function dashboard(){

    $data_duration =  $this->Auth->getAllDuration();
    if(!empty($data_duration)){
        $therapist_id = $data_duration[0]['therapist_id'];
		$start_date = $data_duration[0]['start_date']; 
		$end_date = $data_duration[0]['end_date']; 
		$move_to_last = $data_duration[0]['move_to_last'];
	
			
		if(strtotime($start_date) <= strtotime(date('Y-m-d'))  && strtotime($end_date) >= strtotime(date('Y-m-d'))){
			if($move_to_last == 2){  //Move to First
				$orderAsc = $this->Auth->checkOrderAsc("SELECT * FROM xin_employees  ORDER BY order_id ASC");
				$order_id = $orderAsc[0]['order_id'];
				$data=array(
					'order_id'=> $order_id - 1,
					'date'=> date("Y-m-d"),
				);
				$this->Main->update('user_id',$therapist_id, $data,'xin_employees');

			}else{
				$orderDesc = $this->Auth->checkOrderAsc("SELECT * FROM xin_employees ORDER BY order_id DESC");
				$order_id = $orderDesc[0]['order_id'];
				$data=array(
					'order_id'=> $order_id + 1,
					'date'=> date("Y-m-d"),
				);
				$this->Main->update('user_id',$therapist_id, $data,'xin_employees');
			}
		}else{
			$orderAsc = $this->Auth->checkOrderAsc("SELECT * FROM xin_employees  ORDER BY order_id ASC");
			$orderDesc = $this->Auth->checkOrderAsc("SELECT * FROM xin_employees  ORDER BY order_id DESC");

			$therapist_id = $orderAsc[0]['user_id'];
			$date = $orderAsc[0]['date'];
			$order_id = $orderDesc[0]['order_id'];

			if(date('Y-m-d',strtotime($date)) != date('Y-m-d')){
				$data=array(
					'order_id'=> $order_id + 1,
					'date'=> date("Y-m-d"),
				);
				$this->Main->update('user_id',$therapist_id, $data,'xin_employees');
			}
		}
			
    }else{
    
    }

    $therapy= $this->Auth->getAllTherapistH();
    // echo '<pre>',
    //print_r($therapy);
    foreach($therapy as $a => $thera){      
		$name =  $thera['first_name']; 
		$id = $thera['user_id'];


		$data=array(
			'date'=> date("Y-m-d"),
		);
		$this->Main->update('user_id',$id, $data,'xin_employees');

		$data1[] = 
			[
				'id' =>$id,
				'title'=> $name,
			];    
		}  
		$data1[] = 
			[
				'id' =>0,
				'title'=> 'No Preference',
			];
    	$event = $this->Auth->getAllEvent();
		foreach($event as $events){
			$resourceId = $events['therapist_id'];  
			$name = $events['customer_name'];
			$start = $events['start_date'];
			$startTime = $events['start_time'];
			$end = $events['end_date'];
			$endTime = $events['end_time'];
			$data2[] = 
			[
				'resourceId' =>$resourceId,
				'title'=> $name,
				'start' =>$start.'T'.$startTime,
				'end'=>$end.'T'.$endTime,
			];    
		}    //$data['therapy']= $therapy;
		$data['service'] = $this->Auth->getAllServices();
		$data['therapist'] = $this->Auth->getAllTherapistH();
		$data['duration'] = $this->Auth->getAllDuration();
		$data['cal'] = json_encode($data1);
		$data['event'] = json_encode($data2);
		$this->layout->view('dashboard',$data);
    }

	public function showTherapistAttandance(){
		
		$therapist_id = $_GET['therapist_id'];
		$date = date("Y-m-d");
		
		$attendance_time_sql  = "SELECT xin_attendance_time.* FROM xin_attendance_time WHERE DATE_FORMAT(xin_attendance_time.clock_in, '%Y-%m-%d') = '$date' AND xin_attendance_time.employee_id = $therapist_id"; 
		
		$attendance_time_query = $this->db->query($attendance_time_sql);
		$check_therapist_rownum = $attendance_time_query->num_rows();
		echo $check_therapist_rownum;
	}
	
    public function postAppointment(){
        
        extract($_POST);
        if($thera_id==0){
            $data = [];
            $all =$this->Auth->getAllTherapistH();
            foreach($all as $alls){
                $therapist_id=$alls['user_id'];
                $checkEvent = $this->Auth->checkEvent($therapist_id,$start_date,$start_time,$end_time);
                if($checkEvent>0){
     
                }
                else{
                    $data = array(
                        'customer_number' => $customer_num,
                        'customer_name' => $name,
                        'therapist_id' => $therapist_id,
                        'services' => implode(',',$service),
                        'amount' => $amount,
                        'start_date' => $start_date,
                        'start_time' => $start_time,
                        'end_date' => $end_date,
                        'end_time' => $end_time,
                        'created_by' => $this->session->userdata('id'));
                        break;
                }
            }
        }
        else{
            
        
            $data = array(
                'customer_number' => $customer_num,
                'customer_name' => $name,
                'therapist_id' => $thera_id,
                'services' => implode(',',$service),
                'amount' => $amount,
                'start_date' => $start_date,
                'start_time' => $start_time,
                'end_date' => $end_date,
                'end_time' => $end_time,
                'created_by' => $this->session->userdata('id'));
                
        }
        if(!empty($data)){
            $insert = $this->Auth->dashboard($data); 
                echo json_encode($insert);
        } else{
            echo json_encode(0);
        }
        
    }
    // public function find(){
    //     $selectDate = $_GET['findDate'];
    //     $data['list'] = $this->Auth->findList($selectDate);
    //     echo json_encode($data);
    //  }

     public function branch(){
       if(empty($this->session->has_userdata('id'))){
        redirect('admin');
      }
       $data['branch'] = $this->Auth->getAllBranch();
       $this->layout->view('branch' ,$data);
    
    }

     public function add_branch(){
        $this->form_validation->set_rules('branch_name', 'Branch Name', 'required|is_unique[branch.branch_name]', ['required' => "Please Enter Branch Name"]);
        if ($this->form_validation->run() === FALSE)
        {  
            return redirect('branch');
        }
        else
        {
        extract($_POST);
        $data = array(
            'branch_name' => $branch_name,
            'name' => "handynasty_".$name,
            'email' => $email,
            'address' => $address,
            'password' => hash('sha512', $this->input->post('password')),
            'contact' => $contact,
            'created_by' => $this->session->userdata('id'),
            'created_at' => date("Y-m-d H:i:s"));
            $insert = $this->Auth->storeBranch($data); 
            if($insert == true)
            {
                return redirect('branch');
            }
            else
            {
                $errorUploadType = 'Some problem occurred, please try again.';
            }   
          }  
     }

     public function branch_edit(){
          if(empty($this->session->has_userdata('id'))){
            redirect('admin');
          }
          $data['branchId'] = $this->uri->segment(4);
          $data['branch'] = $this->Auth->getAllBranch();
          $this->layout->view('branch-edit',$data);
     }

     public function post_edit_branch(){
          if(empty($this->session->has_userdata('id'))){
            redirect('admin');
          }
              $branchId=$this->uri->segment(4);
              extract($_POST);
              $data=array('name' => $name,
                          'email' => $email,
                          'address' => $address,
                          'contact' => $contact);
                $clean_data=$this->security->xss_clean($data);
                $result=$this->Main->update('id',$branchId, $data,'branch');
                if($result==true)
                {
                    redirect('branch');
                }
                else
                {
                    redirect('branch');
                }
          }

     public function sign_up(){
        extract($_POST);
        $data = array(
            'branch_id' => $branch_name,
            'employee_name' => $name,
            'email' => $email,
            'password' => hash('sha512', $this->input->post('password')),
            'created_by' => $this->session->userdata('id'),
            'created_at' => date("Y-m-d H:i:s")); 
            $insert = $this->Auth->signUp($data); 
            if($insert == true)
            {
                return redirect('users');
            }
            else
            {
                $errorUploadType = 'Some problem occurred, please try again.';
            }   
     }
    
    public function appointment()
    {
       if($this->session->has_userdata('branch_id')){
        $data['appointment'] = $this->Auth->getAllAppointment($this->session->userdata('branch_id'));
      }
      else
      { 
       $data['appointment'] = $this->Auth->getAllAppointment();
     }
       $this->layout->view('appointment',$data);
  }

    public function add_appointment(){
       if(empty($this->session->has_userdata('id'))){
        redirect('admin');
      }
       $data['therapist'] = $this->Auth->getAllTherapist();
       $data['name'] = $this->session->userdata('name');
       $data['branch'] = $this->Auth->getAllBranch();
       $data['service'] = $this->Auth->getAllServices();
       $data['addon']  = $this->Auth->getAllAddon();
       $this->layout->view('add_appointment',$data);
    }
    
    public function getServiceByID(){
        $sId =$this->input->get('id');
        // print_r($sId);
        // die;
        $totalPrice = 0;
        $totalDuration =0;
        foreach($sId as $val){
            $data=$this->Auth->getServiceByID($val);
            $totalPrice += $data->service_price;
            $totalDuration += $data->duration;
        }
        $data1['totalPrice']=$totalPrice;
        $data1['totalDuration']=$totalDuration;
        echo json_encode($data1);
        
    }

    public function post_add_appointment(){
        //$this->form_validation->set_rules('customer_number', 'Customer Number', 'required|is_unique[appointment.customer_number]', ['required' => "Please Enter Customer Number"]);
        // $this->form_validation->set_error_delimiters('<div class="text text-danger">', '</div>');
        // if ($this->form_validation->run() === FALSE)
        // {  
        //     $this->layout->view('add_appointment');
        // }
        // else
        // {   
        
       extract($_POST);
       $abc=explode('-',$_POST['start_time']);
       $_POST['start_time']=$abc[0];
       $_POST['end_time']=$abc[1];
        if($therapist==0){
            $all =$this->Auth->getAllTherapist();
            $data = [];
            foreach($all as $alls){
                $therapist_id=$alls['id'];
                $checkEvent = $this->Auth->checkEvent($therapist_id,$date,$start_time,$_POST['end_time']);
                if($checkEvent>0){
                    
                }
                else{
                    $data = array(
                        'customer_number' => $customer_number,
                        //'customer_id' => $customer_id,
                        'customer_name' => $customer_name,
                        //'email' => $email,
                        //'branch_id' => $branch,
                        'services' => implode(',',$service),
                        'therapist_id' => $therapist_id,
                        'start_time' => $_POST['start_time'],
                        'end_time' => $_POST['end_time'],
                        'amount' => $amount,
                        'start_date' => $date,
                        'end_date' => $date,
                        'created_by' => $this->session->userdata('id'));
                        break;
                }
            }
        }
        else{
            $data = array(
                'customer_number' => $customer_number,
                //'customer_id' => $customer_id,
                'customer_name' => $customer_name,
                //'email' => $email,
                //'branch_id' => $branch,
                'services' => implode(',',$service),
                'therapist_id' => $therapist,
                'start_time' => $start_time,
                'end_time' => $end_time,
                'amount' => $amount,
                'start_date' => $date,
                'end_date' => $date,
                'created_by' => $this->session->userdata('id'));
        }
            if(!empty($data)){
                //'created_at' => date("Y-m-d H:i:s");  
                $insert = $this->Auth->dashboard($data); 
                if($insert == true)
                {
                    return redirect('dashboard');
                }
                else
                {
                    $errorUploadType = 'Some problem occurred, please try again.';
                }
            } else{
                $this->session->set_flashdata('error',"Therapist is not available on this selected slot");
                redirect('admin/welcome/add_appointment');
            }     
     }

     public function bookingSlot()
     {
        $therapistId = $_GET['therapistId']; 
        $totalDuration = $_GET['duration']; 
        $date = $_GET['date']; 
        $data['leave'] = $this->Auth->checkLeave($therapistId, $date);
        $data['bookingslot']=$this->Auth->getBookingAvailable( $date,  $therapistId);
        //$serviceId = $_GET['serviceId'];
        //$data1=$this->Auth->getServiceByID($serviceId[0]);
        $data2 = $this->Auth->getTimeSlot($totalDuration,'7:00', '23:00');
        $data3=[];
        $data3['bookslot']=$data;
        $data3['availabletimelist']=$data2;
        echo json_encode($data3);
     }
     

      public function editAppointment(){
            if(empty($this->session->has_userdata('id'))){
              redirect('admin');
            }
            $data['appointmentId'] = $this->uri->segment(4);
            $this->layout->view('appointment-edit',$data);
       }
    
      public function post_edit_appointment(){
          if(empty($this->session->has_userdata('id'))){
            redirect('admin');
          }
              $appointmentId=$this->uri->segment(4);
              extract($_POST);
              $data=array('customer_number' => $customer_number,
                          'customer_name' => $customer_name,
                          'instructions' => $instructions,
                          'feedback' => $feedback);
                $clean_data=$this->security->xss_clean($data);
                $result=$this->Main->update('id',$appointmentId, $data,'appointment');
                if($result==true)
                {
                    redirect('appointment');
                }
                else
                {
                    redirect('appointment');
                }
          }
      

      public function deleteAppointment()
     {
        if($this->session->has_userdata('id')!=false)
        {
            $appointmentId=$this->uri->segment(4);
            $result=$this->Main->delete('id',$appointmentId,'appointment');
            if($result==true)
            {
                redirect('appointment');
            }
            else
            {
                redirect('appointment');
            }
        }
     }

     public function therapists()
    {
       if($this->session->has_userdata('branch_id')){
        $data['therapist'] = $this->Auth->getAllTherapist($this->session->userdata('branch_id'));
      }
      else
      {
       $data['therapist'] = $this->Auth->getAllTherapist();
     }
       $this->layout->view('therapists',$data);
    }

    public function add_therapists(){
       if(empty($this->session->has_userdata('id'))){
        redirect('admin');
      }
       $data['name'] = $this->session->userdata('name');
       $data['branch'] = $this->Auth->getAllBranch();
       $data['service'] = $this->Auth->getAllServices();
       $this->layout->view('add_therapists',$data);
    
    }

    public function post_add_therapist()
      {
        $errorUploadType = "";
        $order_id =$this->Auth->getMaxorderId();
        $statusMsg = "";
        if($_POST!=NULL)
        {
            if($this->session->has_userdata('id')!=false)
            {
                if(!empty($_FILES['files']['name']) && count(array_filter($_FILES['files']['name'])) > 0)
                {
                    $name = $this->input->post('name');
                    $age =  $this->input->post('age');
                    $gender = $this->input->post('gender');
                    $branch_id = $this->input->post('branch');
                    $service = $this->input->post('service');
                    $checkin = $this->input->post('checkin');
                    $mobile = $this->input->post('mobile');
                    $filesCount = count($_FILES['files']['name']);
                    for($i = 0; $i < $filesCount; $i++)
                    {
                        $_FILES['file']['name']     = $_FILES['files']['name'][$i]; 
                        $_FILES['file']['type']     = $_FILES['files']['type'][$i]; 
                        $_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i]; 
                        $_FILES['file']['error']     = $_FILES['files']['error'][$i]; 
                        $_FILES['file']['size']     = $_FILES['files']['size'][$i]; 
                        $uploadPath = 'uploads/'; 
                        $config['upload_path'] = $uploadPath; 
                        $config['allowed_types'] = 'jpg|jpeg|png|gif|pdf|doc|docx'; 
                        $config['max_size'] = ""; // Can be set to particular file size , here it is 2 MB(2048 Kb)
                        $config['max_height'] = "";
                        $config['max_width'] = "";
                        $this->load->library('upload', $config); 
                        $this->upload->initialize($config);

                        if($this->upload->do_upload('file'))
                        {
                            $fileData = $this->upload->data(); 
                            $uploadData[$i]['image'] = $fileData['file_name']; 
                            //$uploadData[$i]['type']=$fileData['file_type'];
                            $uploadData[$i]['name'] = $name;
                            $uploadData[$i]['age'] = $age;
                            $uploadData[$i]['order_id'] = $order_id+1;
                            $uploadData[$i]['date']=date("Y-m-d");
                            $uploadData[$i]['gender'] = $gender;
                            $uploadData[$i]['branch_id'] = $branch_id;
                            $uploadData[$i]['services'] = $service;
                            $uploadData[$i]['checkin'] = $checkin;
                            $uploadData[$i]['mobile'] = $mobile;
                            $uploadData[$i]['created_by'] = $this->session->userdata('id');
                            $uploadData[$i]['created_at'] = date("Y-m-d H:i:s");
                            $uploadData[$i]['updated_at'] = date("Y-m-d H:i:s");
                            //$uploadData[$i]['tag'] = $tagname.''.($tag_number+1);       
                        }
                        else
                        {
                            $errorUploadType .= $_FILES['file']['name'].' | ';
                        }

                        $errorUploadType = !empty($errorUploadType)?'<br/>File Type Error: '.trim($errorUploadType, ' | '):''; 
                    }

                        if(!empty($uploadData))
                        {
                            $insert = $this->Auth->insert($uploadData); 
                            if($insert==true)
                            {
                                redirect('therapists');
                            }
                            else
                            {
                                $errorUploadType = 'Some problem occurred, please try again.';
                            }                   
                        }
                        else
                        {
                            $statusMsg = "Sorry, there was an error uploading your file.".$errorUploadType;
                        }
                }
                else
                {
                    echo "Please Select File to Upload";
                }
            }
            else
            {
                redirect('admin');
            }
        }
        else
        {
            redirect('admin');
        }
    }

    public function deleteTherapist()
     {
        if($this->session->has_userdata('id')!=false)
        {
            $therapistId=$this->uri->segment(4);
            $result=$this->Main->delete('id',$therapistId,'therapists');
            if($result==true)
            {
                redirect('therapists');
            }
            else
            {
                redirect('therapists');
            }
        }
     }

     public function package_list()
    {
       if($this->session->has_userdata('branch_id')){
        $data['package'] = $this->Auth->getAllPackage($this->session->userdata('branch_id'));
        
      }
      else{
       $data['package'] = $this->Auth->getAllPackage();
     }
       $this->layout->view('package_list',$data);
    }

    public function add_package()
    {
       if(empty($this->session->has_userdata('id'))){
        redirect('admin');
      }
       $data['name'] = $this->session->userdata('name');
       $data['branch'] = $this->Auth->getAllBranch();
       $this->layout->view('add_package',$data);
    
    }

    public function post_add_package()
    {
        extract($_POST);
        $data = array(
            'package_name' => $package_name,
            'package_name_mandarin' => $package_name_mandarin,
            'branch_id' => $branch,
            'package_detail' => $package_detail,
            'package_detail_mandarin' => $package_detail_mandarin,
            'package_price' => $package_price,
            'package_credits' => $package_credits,
            'created_by' => $this->session->userdata('id'),
            'created_at' => date("Y-m-d H:i:s")); 
            $insert = $this->Auth->storePackage($data); 
            if($insert == true)
            {
                return redirect('package_list');
            }
            else
            {
                $errorUploadType = 'Some problem occurred, please try again.';
            }   
     }
     

     public function deletePackage()
     {
        if($this->session->has_userdata('id')!=false)
        {
            $packageId=$this->uri->segment(4);
            $result=$this->Main->delete('id',$packageId,'package_list');
            if($result==true)
            {
                redirect('package_list');
            }
            else
            {
                redirect('package_list');
            }
        }
     }

     public function service()
    {
       if($this->session->has_userdata('branch_id')){
        $data['service'] = $this->Auth->getAllServices($this->session->userdata('branch_id'));
        
      }
      else
      {
       $data['service'] = $this->Auth->getAllServices();
      }
       $this->layout->view('service',$data);
    }

    public function add_service()
    {
       if(empty($this->session->has_userdata('id'))){
        redirect('admin');
      }
       $data['name'] = $this->session->userdata('name');
       $data['branch'] = $this->Auth->getAllBranch();
       $data['category'] = $this->Auth->getAllCategory();
       $this->layout->view('add_service',$data);
    }
    
    public function post_add_service()
      {
        $errorUploadType = "";
        $statusMsg = "";
        if($_POST!=NULL)
        {
            if($this->session->has_userdata('id')!=false)
            {
                if(!empty($_FILES['files']['name']) && count(array_filter($_FILES['files']['name'])) > 0)
                {
                    $service_name = $this->input->post('service_name');
                    $service_mandarin_name =  $this->input->post('service_mandarin_name');
                    $branch_id = $this->input->post('branch');
                    $service_category = $this->input->post('service_category');
                    $description = $this->input->post('description');
                    $mandarin_description = $this->input->post('mandarin_description');
                    $service_price = $this->input->post('service_price');
                    $duration = $this->input->post('duration');
                    $therapist_commission = $this->input->post('therapist_commission');
                    $amount = $this->input->post('amount');
                    $priority = $this->input->post('priority');
                    $loyalty_points = $this->input->post('loyalty_points');
                    $status = $this->input->post('status');
                    $filesCount = count($_FILES['files']['name']);
                    for($i = 0; $i < $filesCount; $i++)
                    {
                        $_FILES['file']['name']     = $_FILES['files']['name'][$i]; 
                        $_FILES['file']['type']     = $_FILES['files']['type'][$i]; 
                        $_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i]; 
                        $_FILES['file']['error']    = $_FILES['files']['error'][$i]; 
                        $_FILES['file']['size']     = $_FILES['files']['size'][$i]; 
                        $uploadPath = 'uploads/'; 
                        $config['upload_path'] = $uploadPath; 
                        $config['allowed_types'] = 'jpg|jpeg|png|gif|pdf|doc|docx'; 
                        $config['max_size'] = ""; // Can be set to particular file size , here it is 2 MB(2048 Kb)
                        $config['max_height'] = "";
                        $config['max_width'] = "";
                        $this->load->library('upload', $config); 
                        $this->upload->initialize($config);

                        if($this->upload->do_upload('file'))
                        {
                            $fileData = $this->upload->data(); 
                            $uploadData[$i]['service_icon'] = $fileData['file_name']; 
                            //$uploadData[$i]['type']=$fileData['file_type'];
                            $uploadData[$i]['service_name'] = $service_name;
                            $uploadData[$i]['service_mandarin_name'] = $service_mandarin_name;
                            $uploadData[$i]['branch_id'] = $branch_id;
                            $uploadData[$i]['service_category'] = $service_category;
                            $uploadData[$i]['description'] = $description;
                            $uploadData[$i]['mandarin_description'] = $mandarin_description;
                            $uploadData[$i]['service_price'] = $service_price;
                            $uploadData[$i]['duration'] = $duration;
                            $uploadData[$i]['commission_type'] = $therapist_commission;
                            $uploadData[$i]['commission_amount'] = $amount;
                            $uploadData[$i]['priority'] = $priority;
                            $uploadData[$i]['loyalty_point'] = $loyalty_points;
                            $uploadData[$i]['status'] = $status;
                            $uploadData[$i]['created_by'] = $this->session->userdata('id');
                            $uploadData[$i]['created_at'] = date("Y-m-d H:i:s");
                            //$uploadData[$i]['tag'] = $tagname.''.($tag_number+1);
                            
                        }
                        else
                        {
                            $errorUploadType .= $_FILES['file']['name'].' | ';
                        }

                        $errorUploadType = !empty($errorUploadType)?'<br/>File Type Error: '.trim($errorUploadType, ' | '):''; 
                    }

                        if(!empty($uploadData))
                        {
                            $insert = $this->Auth->insert2($uploadData); 
                            if($insert==true)
                            {
                                redirect('service');
                            }
                            else
                            {
                                $errorUploadType = 'Some problem occurred, please try again.';
                            }                   
                        }
                        else
                        {
                            $statusMsg = "Sorry, there was an error uploading your file.".$errorUploadType;
                        }
                }
                else
                {
                    echo "Please Select File to Upload";
                }
            }
            else
            {
                redirect('admin');
            }
        }
        else
        {
            redirect('admin');
        }
    }

    public function deleteService()
    {
        if($this->session->has_userdata('id')!=false)
        {
            $serviceId=$this->uri->segment(4);
            $result=$this->Main->delete('id',$serviceId,'service');
            if($result==true)
            {
                redirect('service');
            }
            else
            {
                redirect('service');
            }
        }
    }

    public function service_category()
    {
       if($this->session->has_userdata('branch_id')){
        $data['category'] = $this->Auth->getAllCategory($this->session->userdata('branch_id'));
    }
      else{
       $data['category'] = $this->Auth->getAllCategory();
     }

       $this->layout->view('service_category',$data); 
    }

    public function add_category(){
        if(empty($this->session->has_userdata('id'))){
         redirect('admin');
       }
        $data['name'] = $this->session->userdata('name');
        $data['branch'] = $this->Auth->getAllBranch();
        $this->layout->view('add_category',$data);
     }
    
     public function post_add_category()
     {
       $errorUploadType = "";
       $statusMsg = "";
       if($_POST!=NULL)
       {
           if($this->session->has_userdata('id')!=false)
           {
               if(!empty($_FILES['files']['name']) && count(array_filter($_FILES['files']['name'])) > 0)
               {
                   $name = $this->input->post('name');
                   $name_mandarin =  $this->input->post('name_mandarin');
                   $details = $this->input->post('details');
                   $mandarin_detail = $this->input->post('mandarin_details');
                   $branch_id = $this->input->post('branch');
                   $status = $this->input->post('status');
                   $priority = $this->input->post('priority');
                   $filesCount = count($_FILES['files']['name']);
                   for($i = 0; $i < $filesCount; $i++)
                   {
                       $_FILES['file']['name']     = $_FILES['files']['name'][$i]; 
                       $_FILES['file']['type']     = $_FILES['files']['type'][$i]; 
                       $_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i]; 
                       $_FILES['file']['error']    = $_FILES['files']['error'][$i]; 
                       $_FILES['file']['size']     = $_FILES['files']['size'][$i]; 
                       $uploadPath = 'uploads/'; 
                       $config['upload_path'] = $uploadPath; 
                       $config['allowed_types'] = 'jpg|jpeg|png|gif|pdf|doc|docx'; 
                       $config['max_size'] = ""; // Can be set to particular file size , here it is 2 MB(2048 Kb)
                       $config['max_height'] = "";
                       $config['max_width'] = "";
                       $this->load->library('upload', $config); 
                       $this->upload->initialize($config);

                       if($this->upload->do_upload('file'))
                       {
                           $fileData = $this->upload->data(); 
                           $uploadData[$i]['category_image'] = $fileData['file_name']; 
                           //$uploadData[$i]['type']=$fileData['file_type'];
                           $uploadData[$i]['category_name'] = $name;
                           $uploadData[$i]['category_mandarin_name'] = $name_mandarin;
                           $uploadData[$i]['category_detail'] = $details;
                           $uploadData[$i]['category_mandarin_detail'] = $mandarin_detail;
                           $uploadData[$i]['branch_id'] = $branch_id;
                           $uploadData[$i]['status'] = $status;
                           $uploadData[$i]['priority'] = $priority;
                           $uploadData[$i]['created_by'] = $this->session->userdata('id');
                           $uploadData[$i]['created_at'] = date("Y-m-d H:i:s");
                           //$uploadData[$i]['tag'] = $tagname.''.($tag_number+1);
                           
                       }
                       else
                       {
                           $errorUploadType .= $_FILES['file']['name'].' | ';
                       }

                       $errorUploadType = !empty($errorUploadType)?'<br/>File Type Error: '.trim($errorUploadType, ' | '):''; 
                   }

                       if(!empty($uploadData))
                       {
                           $insert = $this->Auth->insert3($uploadData); 
                           if($insert==true)
                           {
                               redirect('category');
                           }
                           else
                           {
                               $errorUploadType = 'Some problem occurred, please try again.';
                           }                   
                       }
                       else
                       {
                           $statusMsg = "Sorry, there was an error uploading your file.".$errorUploadType;
                       }
               }
               else
               {
                   echo "Please Select File to Upload";
               }
           }
           else
           {
               redirect('admin');
           }
       }
       else
       {
           redirect('admin');
       }
   }

   public function deleteCategory()
    {
       if($this->session->has_userdata('id')!=false)
       {
           $categoryId=$this->uri->segment(4);
           $result=$this->Main->delete('id',$categoryId,'service_category');
           if($result==true)
           {
               redirect('category');
           }
           else
           {
               redirect('category');
           }
       }
    }

     public function promotion()
    {
       if($this->session->has_userdata('branch_id')){
        $data['promotion'] = $this->Auth->getAllPromotion($this->session->userdata('branch_id'));
    }
      else{
       $data['promotion'] = $this->Auth->getAllPromotion();
     }
       $this->layout->view('promotion',$data); 
    }
    
    public function add_promotion(){
       if(empty($this->session->has_userdata('id'))){
        redirect('admin');
      }
       $data['name'] = $this->session->userdata('name');
       $data['branch'] = $this->Auth->getAllBranch();
       $data['category'] = $this->Auth->getAllCategory();
       $data['service'] = $this->Auth->getAllServices();
       $data['customer'] = $this->Auth->getAllCustomer();
       $this->layout->view('add_promotion',$data);
    
    }

    public function post_add_promotion()
      {
        $errorUploadType = "";
        $statusMsg = "";
        if($_POST!=NULL)
        {
            if($this->session->has_userdata('id')!=false)
            {
                if(!empty($_FILES['files']['name']) && count(array_filter($_FILES['files']['name'])) > 0)
                {
                    $name = $this->input->post('name');
                    $name_mandarin =  $this->input->post('name_mandarin');
                    //$category = $this->input->post('category');
                    $branch_id = $this->input->post('branch');
                    $price = $this->input->post('price');
                    $targetServ= implode(',',$this->input->post('service'));
                    $targetUser= implode(',',$this->input->post('customer'));
                    $pValidity = $this->input->post('duration');
                    $details = $this->input->post('details');
                    $details_mandarin = $this->input->post('details_mandarin');
                    $validity = $this->input->post('validity');
                    $validity_mandarin = $this->input->post('validity_mandarin');
                    $status = $this->input->post('status');
                    $priority = $this->input->post('priority');
                    $filesCount = count($_FILES['files']['name']);
                    for($i = 0; $i < $filesCount; $i++)
                    {
                        $_FILES['file']['name']     = $_FILES['files']['name'][$i]; 
                        $_FILES['file']['type']     = $_FILES['files']['type'][$i]; 
                        $_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i]; 
                        $_FILES['file']['error']    = $_FILES['files']['error'][$i]; 
                        $_FILES['file']['size']     = $_FILES['files']['size'][$i]; 
                        $uploadPath = 'uploads/'; 
                        $config['upload_path'] = $uploadPath; 
                        $config['allowed_types'] = 'jpg|jpeg|png|gif|pdf|doc|docx'; 
                        $config['max_size'] = ""; // Can be set to particular file size , here it is 2 MB(2048 Kb)
                        $config['max_height'] = "";
                        $config['max_width'] = "";
                        $this->load->library('upload', $config); 
                        $this->upload->initialize($config);

                        if($this->upload->do_upload('file'))
                        {
                            $fileData = $this->upload->data(); 
                            $uploadData[$i]['image'] = $fileData['file_name']; 
                            //$uploadData[$i]['type']=$fileData['file_type'];
                            $uploadData[$i]['name'] = $name;
                            $uploadData[$i]['name_mandarin'] = $name_mandarin;
                            //$uploadData[$i]['category'] = $category;
                            $uploadData[$i]['branch_id'] = $branch_id;
                            $uploadData[$i]['price'] = $price;
                            //$uploadData[$i]['duration'] = $duration;
                            $uploadData[$i]['target_service'] = $targetServ;
                            $uploadData[$i]['target_user'] = $targetUser;
                            $uploadData[$i]['promotion_validity'] = $pValidity;
                            $uploadData[$i]['details'] = $details;
                            $uploadData[$i]['details_mandarin'] = $details_mandarin;
                            $uploadData[$i]['validity'] = $validity;
                            $uploadData[$i]['validity_mandarin'] = $validity_mandarin;
                            $uploadData[$i]['status'] = $status;
                            $uploadData[$i]['priority'] = $priority;
                            $uploadData[$i]['created_by'] = $this->session->userdata('id');
                            $uploadData[$i]['created_at'] = date("Y-m-d H:i:s");
                            //$uploadData[$i]['tag'] = $tagname.''.($tag_number+1);
                            
                        }
                        else
                        {
                            $errorUploadType .= $_FILES['file']['name'].' | ';
                        }

                        $errorUploadType = !empty($errorUploadType)?'<br/>File Type Error: '.trim($errorUploadType, ' | '):''; 
                    }

                        if(!empty($uploadData))
                        {
                            $insert = $this->Auth->inserts($uploadData); 
                            if($insert==true)
                            {
                                redirect('promotion');
                            }
                            else
                            {
                                $errorUploadType = 'Some problem occurred, please try again.';
                            }                   
                        }
                        else
                        {
                            $statusMsg = "Sorry, there was an error uploading your file.".$errorUploadType;
                        }
                }
                else
                {
                    echo "Please Select File to Upload";
                }
            }
            else
            {
                redirect('admin');
            }
        }
        else
        {
            redirect('admin');
        }
    }

    public function deletePromotion()
     {
        if($this->session->has_userdata('id')!=false)
        {
            $promotionId=$this->uri->segment(4);
            $result=$this->Main->delete('id',$promotionId,'promotions');
            if($result==true)
            {
                redirect('promotion');
            }
            else
            {
                redirect('promotion');
            }
        }
     }
    
    // public function timeslot()
    // {
    //     $newdata= array(); 
    //     $data = $this->Auth->getTimeSlot($this->input->get('slots'), '9:00', '19:00');
    //     foreach($data as $data1){
    //         $newdata[] = $data1;
    //     }
    //     echo json_encode($newdata);
    // }
    
   public function feedback()
    {
       if($this->session->has_userdata('branch_id')){
        $data['feedback'] = $this->Auth->getAllFeedback($this->session->userdata('branch_id'));
      }
      else
      {
       $data['feedback'] = $this->Auth->getAllFeedback();
      }
       $this->layout->view('feedback',$data);
    }

    public function add_feedback(){
       if(empty($this->session->has_userdata('id'))){
        redirect('admin');
      }
       $data['name'] = $this->session->userdata('name');
       $data['branch'] = $this->Auth->getAllBranch();
       $data['user'] = $this->Auth->getAllUser();
       $this->layout->view('add_feedback',$data);
    }

    public function post_add_feedback(){
        extract($_POST);
        $data = array(
            'user_id' => $user_id,
            'branch_id' => $branch,
            'rate' => $rate,
            'comment' => $comment,
            'created_by' => $this->session->userdata('id'),
            'created_at' => date("Y-m-d H:i:s"));
            $insert = $this->Auth->storeFeedback($data); 
            if($insert == true)
            {
                return redirect('feedback');
            }
            else
            {
                $errorUploadType = 'Some problem occurred, please try again.';
            }   
     }
   
    public function deleteFeedback()
     {
        if($this->session->has_userdata('id')!=false)
        {
            $feedbackId=$this->uri->segment(4);
            $result=$this->Main->delete('id',$feedbackId,'feedback');
            if($result==true)
            {
                redirect('feedback');
            }
            else
            {
                redirect('feedback');
            }
        }
     }

    public function coupon()
    {
       if($this->session->has_userdata('branch_id')){
        $data['coupon'] = $this->Auth->getAllCoupon($this->session->userdata('branch_id'));
        
      }
      else{
       $data['coupon'] = $this->Auth->getAllCoupon();
     }
       $this->layout->view('coupon',$data);
    }

    public function add_coupon(){
       if(empty($this->session->has_userdata('id'))){
        redirect('admin');
      }
       $data['name'] = $this->session->userdata('name');
       $data['branch'] = $this->Auth->getAllBranch();
       $this->layout->view('add_coupon',$data);
    
    }

    public function post_add_coupon()
      {
        $errorUploadType = "";
        $statusMsg = "";
        if($_POST!=NULL)
        {
            if($this->session->has_userdata('id')!=false)
            {
                if(!empty($_FILES['files']['name']) && count(array_filter($_FILES['files']['name'])) > 0)
                {
                    $coupon_code = $this->input->post('coupon_code');
                    $branch_id = $this->input->post('branch');
                    $description =  $this->input->post('description');
                    $discount = $this->input->post('discount');
                    $loyalty_points = $this->input->post('loyalty_points');
                    $status = $this->input->post('status');
                    $filesCount = count($_FILES['files']['name']);
                    for($i = 0; $i < $filesCount; $i++)
                    {
                        $_FILES['file']['name']     = $_FILES['files']['name'][$i]; 
                        $_FILES['file']['type']     = $_FILES['files']['type'][$i]; 
                        $_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i]; 
                        $_FILES['file']['error']    = $_FILES['files']['error'][$i]; 
                        $_FILES['file']['size']     = $_FILES['files']['size'][$i]; 
                        $uploadPath = 'uploads/'; 
                        $config['upload_path'] = $uploadPath; 
                        $config['allowed_types'] = 'jpg|jpeg|png|gif|pdf|doc|docx'; 
                        $config['max_size'] = ""; // Can be set to particular file size , here it is 2 MB(2048 Kb)
                        $config['max_height'] = "";
                        $config['max_width'] = "";
                        $this->load->library('upload', $config); 
                        $this->upload->initialize($config);

                        if($this->upload->do_upload('file'))
                        {
                            $fileData = $this->upload->data(); 
                            $uploadData[$i]['banner_icon'] = $fileData['file_name']; 
                            //$uploadData[$i]['type']=$fileData['file_type'];
                            $uploadData[$i]['coupon_code'] = $coupon_code;
                            $uploadData[$i]['branch_id'] = $branch_id;
                            $uploadData[$i]['description'] = $description;
                            $uploadData[$i]['discount'] = $discount;
                            $uploadData[$i]['coupon_loyalty_points'] = $loyalty_points;
                            $uploadData[$i]['status'] = $status;
                            $uploadData[$i]['created_by'] = $this->session->userdata('id');
                            $uploadData[$i]['created_at'] = date("Y-m-d H:i:s");
                            $uploadData[$i]['updated_at'] = date("Y-m-d H:i:s");
                        }
                        else
                        {
                            $errorUploadType .= $_FILES['file']['name'].' | ';
                        }

                        $errorUploadType = !empty($errorUploadType)?'<br/>File Type Error: '.trim($errorUploadType, ' | '):''; 
                    }

                        if(!empty($uploadData))
                        {
                            $insert = $this->Auth->insert1($uploadData); 
                            if($insert==true)
                            {
                                redirect('coupon');
                            }
                            else
                            {
                                $errorUploadType = 'Some problem occurred, please try again.';
                            }                   
                        }
                        else
                        {
                            $statusMsg = "Sorry, there was an error uploading your file.".$errorUploadType;
                        }
                }
                else
                {
                    echo "Please Select File to Upload";
                }
            }
            else
            {
                redirect('admin');
            }
        }
        else
        {
            redirect('admin');
        }
    }

     public function editCoupon(){
            if(empty($this->session->has_userdata('id'))){
              redirect('admin');
            }
            $data['couponId'] = $this->uri->segment(4);
            $this->layout->view('edit-coupon',$data);
       }

     public function post_edit_coupon(){
          if(empty($this->session->has_userdata('id'))){
            redirect('admin');
          }
              $couponId=$this->uri->segment(4);
              extract($_POST);
              $data=array('coupon_code' => $coupon_code,
                          'description' => $description,
                          'discount' => $discount,
                          'coupon_loyalty_points' => $loyalty_points,
                          'status' => $status,
                          'updated_at' => date("Y-m-d H:i:s"));
                $clean_data=$this->security->xss_clean($data);
                $result=$this->Main->update('id',$couponId, $data,'coupons');
                if($result==true)
                {
                    redirect('coupon');
                }
                else
                {
                    redirect('coupon');
                }
          }  

    public function deleteCoupon()
     {
        if($this->session->has_userdata('id')!=false)
        {
            $couponId=$this->uri->segment(4);
            $result=$this->Main->delete('id',$couponId,'coupons');
            if($result==true)
            {
                redirect('coupon');
            }
            else
            {
                redirect('coupon');
            }
        }
     }

     public function customer()
    {
       if($this->session->has_userdata('branch_id')){
        $data['customer'] = $this->Auth->getAllCustomer($this->session->userdata('branch_id'));
    }
      else{
       $data['customer'] = $this->Auth->getAllCustomer();
     }
       $this->layout->view('customers',$data); 
    }
    
    public function add_customer(){
       if(empty($this->session->has_userdata('id'))){
        redirect('admin');
      }
       $data['name'] = $this->session->userdata('name');
       $data['branch'] = $this->Auth->getAllBranch();
       $this->layout->view('add_customer',$data);
    
    }
    
    public function post_add_customer(){
            extract($_POST);
            $data = array(
                'first_name' => $first_name,
                'last_name' => $last_name,
                'dob' => $dob,
                'age' => $age,
                'email' => $email,
                'contact' => $contact,
                'branch_id' => $branch,
                'address' => $address,
                'created_by' => $this->session->userdata('id'),
                'created_at' => date("Y-m-d H:i:s"));
                $insert = $this->Auth->storeCustomer($data); 
                echo json_encode($insert);
                // if($insert == true)
                // {
                //     $output = json_encode(array('type' => 'success', 'message' => 'Data Submitted Successfully', 'data' => 'SELECT contact FROM customer ORDER BY id DESC LIMIT 1;'));
                //      //redirect('customer');
                    
                // }
                // else
                // {
                //     $errorUploadType = 'Some problem occurred, please try again.';
                // }   
    }
  
    public function getCustomerByID(){
        $data=$this->Auth->getCustomerByID($this->input->get('contact'));
        echo json_encode($data);
    }

    public function logout(){
	    $this->session->sess_destroy();
	    redirect('welcome');
   }    
  
  
}

