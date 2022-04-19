<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_Model extends CI_Model
{
	function login($data)
	{
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('email', $data['email']);
		$this->db->where('password', $data['password']);
		$query=$this->db->get();
		if($query->num_rows()==1)
		{
			return $query->row();
		}
		else
		{
			return false;
		}
		
	 }

    function insertDur($data){
        /*$check= $this->getAllDuration();
        if(!empty($check)){
            $this->db->where('id', 1);
            $this->db->update('check_therapist', $data);    
        }
       else{
      
       } */ 
	    $insert = $this->db->insert('check_therapist',$data); 
		return true;
     }

    function getAllDuration(){
      $this->db->select('*');
      $this->db->from('check_therapist');
      return $this->db->get()->result_array();  
    }
     
    function therapistList()
    {
      $this->db->select('*');
      $this->db->from('therapists');
      return $this->db->get()->result_array();
    }

     function findList($id,$selectDate){
         $this->db->select('*');
         $this->db->from('appointment');
         $this->db->where('appointment_date',$selectDate);
         $this->db->where('therapists',$id);
         //$this->db->join('therapists','therapists.id=appointment.therapists');
         //$this->db->join('customer','customer.id=appointment.customer_id');
         return $this->db->get()->result_array();
        //  print_r($this->db->last_query()); 
        //  die;
         
     }

     function getAllUser()
    {
      $this->db->select('*');
      $this->db->from('user');
      return $this->db->get()->result_array();
    }

    function getBookingAvailable($date,$therapist)
    {
      $this->db->select('*');
      $this->db->from('appointment');
      $this->db->where('appointment_date',$date);
      $this->db->where('therapists',$therapist);
      return $this->db->get()->result_array();
    } 

    
    function storeFeedback($data)
    {
        $insert = $this->db->insert('feedback',$data); 
        return true;
    }
	function storeBranch($data)
    {
        $insert = $this->db->insert('branch',$data); 
		return true;
    }
    
    function storeAppointment($data)
    {
        $insert = $this->db->insert('appointment',$data); 
        return true;
    }

    function storePackage($data)
    {
        $insert = $this->db->insert('package_list',$data); 
        return true;
    }

    function dashboard($data)
    {
        $insert = $this->db->insert('dashboard',$data); 
        return true;
    }

    function storeCustomer($data)
    {
        $insert = $this->db->insert('customer',$data); 
        return true;
    }

    function getAllEvent()
    {
    	$this->db->select('dashboard.*');
    	$this->db->from('dashboard');
        $this->db->join('xin_employees','xin_employees.user_id = dashboard.therapist_id');
    	return $this->db->get()->result_array();
    } 

    function getAllBranch()
    {
    	$this->db->select('branch.*');
    	$this->db->from('branch');
    	return $this->db->get()->result_array();
    } 

    function getAllCategory($id=null)
    {
        $this->db->select('service_category.*,branch.branch_name');
        $this->db->from('service_category');
        $this->db->join('branch','branch.id = service_category.branch_id');
        if(!empty($id)){
            $this->db->where('service_category.branch_id',$id);
        }
        return $this->db->get()->result_array();
    }
    
    function getAllAppointment($id=null)
    {
        $this->db->select('appointment.*,branch.branch_name as branch_name, service.service_name,xin_employees.first_name, xin_employees.last_name');
        $this->db->from('appointment');
        $this->db->join('service','service.id = appointment.services');
        $this->db->join('xin_employees','xin_employees.user_id = appointment.therapists');
        $this->db->join('branch','branch.id = appointment.branch_id');
        if(!empty($id))
        {
            $this->db->where('appointment.branch_id',$id);
        }
        return $this->db->get()->result_array();
    }

    function getAllPackage($id=null)
    {
        $this->db->select('package_list.*,branch.branch_name as branch_name');
        $this->db->from('package_list');
        $this->db->join('branch','branch.id = package_list.branch_id');
        if(!empty($id)){
            $this->db->where('package_list.branch_id',$id);
        }
        return $this->db->get()->result_array();
    }
    
    function getAllServices($id=null)
    {
        $this->db->select('service.*,branch.branch_name as branch_name');
        $this->db->from('service');
        $this->db->join('branch','branch.id = service.branch_id');
        // $this->db->order_by('id', 'desc');
        if(!empty($id)){
            $this->db->where('service.branch_id',$id);
        }
        return $this->db->get()->result_array();
    }
    
    function checkOrderAsc($query){
        $query = $this->db->query($query);
        return $query->result_array();
    }

    function checkLeave($empId, $appDate){
       $sql = "SELECT * FROM xin_leave_applications WHERE '$appDate' BETWEEN `from_date` AND `to_date` AND `employee_id` = '$empId' AND `status` = '2'"; 
       //$ENROLLEES->query($SQL);
    //    $this->db->select('*');
    //    $this->db->from('xin_leave_applications');
    //    $this->db->where('employee_id',$empId);
    //    $this->db->where_between($appDate, 'from_date', 'to_date'); 
    //    $this->db->where('from_date',$appDate);
    //    $this->db->where('status','2');
       //$result= $this->db->get()->result();
        $query = $this->db->query($sql);
        // $query= $this->db->last_query();
       $result = $query->result();
       if($result){
           return true;
       }
       else{
           return false;
       }

    }

    function getServiceByID($id){
        $this->db->select('*');
        $this->db->from('service');
        $this->db->where('id',$id);
        $result= $this->db->get()->row();
        return $result;
    }
   
    function checkEvent($therapist_id,$date,$start_time,$end_time){
        $this->db->select('id');
        $this->db->from('dashboard');
        $this->db->where('therapist_id',$therapist_id);
        $this->db->where('start_date',$date);
        $this->db->group_start();
        $this->db->where('start_time <=',$start_time);
        $this->db->where('end_time >=',$end_time);
        $this->db->group_end();
        return $this->db->get()->num_rows();
    }

    function getAllTherapistH(){
        $this->db->select('*');
        $this->db->from('xin_employees');
        $this->db->where('user_role_id','2');
		$this->db->order_by('order_id','ASC');
        //$this->db->join('xin_leave_applications','xin_leave_applications.employee_id = xin_employees.user_id','left');
        return $this->db->get()->result_array();
    }
    function getMaxorderId(){
        $this->db->select_max('order_id');
        $this->db->from('therapists');
        $result= $this->db->get()->row();
        return $result->order_id;

    }
    function getAllTherapist($id=null)
    {
        $this->db->select('therapists.*, branch.branch_name as branch_name');
        $this->db->from('therapists');
        $this->db->order_by('order_id','ASC');
        $this->db->join('branch','branch.id = therapists.branch_id');
        if(!empty($id)){
            $this->db->where('therapists.branch_id',$id);
        }
        return $this->db->get()->result_array();
    }

    function getAllAddon() 
    {
        $this->db->select('*');
        $this->db->from('add_ons');
        return $this->db->get()->result_array();
    }

    function getAllPromotion($id=null)
    {
    	$this->db->select('promotions.*,branch.branch_name as branch_name');
    	$this->db->from('promotions');
        $this->db->join('branch','branch.id = promotions.branch_id');
        if(!empty($id)){
            $this->db->where('promotions.branch_id',$id);
        }
    	return $this->db->get()->result_array();
    }
    
    function getAllFeedback($id=null)
    {
        $this->db->select('feedback.*,branch.branch_name as branch_name');
        $this->db->from('feedback');
        $this->db->join('branch','branch.id = feedback.branch_id');
        if(!empty($id)){
            $this->db->where('feedback.branch_id',$id);
        }
        return $this->db->get()->result_array();
    }

    function getAllCoupon($id=null)
    {
        $this->db->select('coupons.*,branch.branch_name as branch_name');
        $this->db->from('coupons');
        $this->db->join('branch','branch.id = coupons.branch_id');
        if(!empty($id)){
            $this->db->where('coupons.branch_id',$id);
        }
        return $this->db->get()->result_array();
    }
    
    function inserts($data = array())
    {
        $insert = $this->db->insert_batch('promotions',$data); 
        return true;
    }

    function insert($data = array())
    {
        $insert = $this->db->insert_batch('therapists',$data); 
        return true;
    }

    function insert1($data = array())
    {
        $insert = $this->db->insert_batch('coupons',$data); 
        return true;
    }

    function insert2($data = array())
    {
        $insert = $this->db->insert_batch('service',$data); 
        return true;
    }
    
    function insert3($data = array())
    {
        $insert = $this->db->insert_batch('service_category',$data); 
        return true;
    }

    function signUp($data)
    {
        $insert = $this->db->insert('employee',$data); 
		return true;
    }

    function getAllCustomer(){
        $this->db->select('customer.*,branch.branch_name as branch_name');
        $this->db->from('customer');
        $this->db->join('branch','branch.id = customer.branch_id');
        if(!empty($id)){
            $this->db->where('customer.branch_id',$id);
        }
        return $this->db->get()->result_array();     
    }

    function getCustomerByID($contact){
        $this->db->select('*');
        $this->db->from('customer');
        $this->db->where('contact',$contact);
        return $this->db->get()->result_array();
    }

     function getTimeSlot($interval, $start_time, $end_time)
 {
    $start = new DateTime($start_time);
    $end = new DateTime($end_time);
    $startTime = $start->format('H:i');
    $endTime = $end->format('H:i');
    $i=0;
    $time = [];
    while(strtotime($startTime) <= strtotime($endTime)){
        $start = $startTime;
        $end = date('H:i',strtotime('+'.$interval.' minutes',strtotime($startTime)));
        $startTime = date('H:i',strtotime('+'.$interval.' minutes',strtotime($startTime)));
        $i++;
        if(strtotime($startTime) <= strtotime($endTime)){
            $time[$i]['slot_start_time'] = $start;
            $time[$i]['slot_end_time'] = $end;
        }
    }
    return $time;
 }

}
