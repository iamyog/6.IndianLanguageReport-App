<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller 
{

	public function __construct()
	{
		parent::__construct();		
		$this->load->model('home_model');
	}	

	public function index()
	{		
		$this->load->view('home');
	}
	
	public function language($id,$lang = '')
	{		 
		 
		$this->lang->load('content',$lang == '' ? 'en' : $lang);
		
		$data['message'] = $this->lang->line('message');
		
		$data['txt_employee_name'] = $this->lang->line('txt_employee_name');
		$data['place_employee_name'] = $this->lang->line('place_employee_name');

		$data['txt_employee_des'] = $this->lang->line('txt_employee_des');
		$data['place_employee_des'] = $this->lang->line('place_employee_des');
		
		$data['txt_employee_salary'] = $this->lang->line('txt_employee_salary');
		$data['place_employee_salary'] = $this->lang->line('place_employee_salary');
		
		$data['btn_employee_save'] = $this->lang->line('btn_employee_save');

		$data['show_employees'] = $this->lang->line('show_employees');
		
		$data['id'] = $id;
		$data['lang'] = $lang;
		$this->load->view('home',$data);
	}
	public function addEmployee()
	{

		$lang = $this->input->post('hidden_lang');
		$id = $this->input->post('hidden_id');

		$this->lang->load('content',$lang == '' ? 'en' : $lang);
		

		$employee = array(
			'name'	=> $this->input->post('name'),
			'des'	=> $this->input->post('des'),
			'salary'	=> $this->input->post('salary'),
			'lang_id'	=> $this->input->post('hidden_id')
		);

		if ($this->home_model->saveEmployee($employee)) 
		{
			$this->session->set_flashdata('msg_success',$this->lang->line('success_message'));
			redirect("home/language/$id/$lang");	 
		}
		else
		{
			$this->session->set_flashdata('msg_failed',$this->lang->line('failed_message'));	
			redirect("home/language/$id/$lang");	 	 
		}
	}

	public function showMeAllEmployees($id,$lang = '')
	{	 	 

		$this->lang->load('content',$lang == '' ? 'en' : $lang);
		

		$data['all_employee_records'] = $this->lang->line('all_employee_records');

		$data['srno'] = $this->lang->line('srno');

		$data['employeename'] = $this->lang->line('employeename');

		$data['designation'] = $this->lang->line('designation');
		
		$data['salary'] = $this->lang->line('salary');

		$data['employees'] = $this->home_model->reportPrint($id);		
		$this->load->view('print_me',$data);
	}
	public function printAReport($lang_id)
	{
		$data['employees'] = $this->home_model->reportPrint($lang_id);

		/*echo "<pre>";
		print_r($data);
		exit();*/
		
		$this->load->library("mpdf/mpdf");	

		//go to indic(classes) class and chage static for  _move_info_pos ths method and guj lang will work

		$this->mpdf = new mPDF("san"); //for Sanskrit(sn or san)
		//$this->mpdf = new mPDF("kan"); //for Kannada(kn or kan)
		//$this->mpdf = new mPDF("en"); //for Urdu(en or eng)
		//$this->mpdf = new mPDF("ur"); //for Urdu(ur or urd)
		//$this->mpdf = new mPDF("ori"); //for Oria(or or ori)
		//$this->mpdf = new mPDF("ml"); //for Malyalam(ml or mal)
		//$this->mpdf = new mPDF("te"); //for Tamil(te or tel)
		//$this->mpdf = new mPDF("tam"); //for Tamil(tm or tam)
		//$this->mpdf = new mPDF("bn"); //for Bengali(bn or ben)
		//$this->mpdf = new mPDF("guj"); //for Gujarthi(gu or guj)
		//$this->mpdf = new mPDF('mar'); //for Marathi(mr or mar)
		//$this->mpdf = new mPDF('hi'); //for hindi (hi or hin)
		//$this->mpdf = new mPDF('pan'); //for punjab(pa or pan)
		
		//$data['header'] = $this->load->view('common/default_header',$this->params, true);
		//$data['footer'] = $this->load->view('common/default_footer', true);
		//$html = $this->load->view('reservation/complete', $data, true); 
	
	
		$html = $this->load->view('reports/employee_report', $data, true); 
		
		$this->mpdf->SetDisplayMode('fullpage');
		
		$this->mpdf->AddPage('', // L - landscape, P - portrait 
        '', '', '', '',
        5, // margin_left
        5, // margin right
       40, // margin top
       30, // margin bottom
        5, // margin header
        2); // margin footer
		
		$this->mpdf->WriteHTML($html);
		
		$this->mpdf->Output();
	}


}
