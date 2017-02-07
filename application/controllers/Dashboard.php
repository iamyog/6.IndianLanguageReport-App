<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();	
		$this->load->model('dashboard_model');	 
	}	 
	public function index()
	{
		$languages = $this->dashboard_model->getLang();
		$this->load->view('dashboard',compact('languages'));
	}
}
