<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	/**
	 * Author : Chirag Bavaria
	 * Email  : bavaria.chirag@gmail.com
	 * Description : This Controller have used for display required reports
	 *
	 */
class Report extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('report_model');
		$this->load->helper('url');
    }

	public function index()
	{
		$data['clients'] = $this->report_model->get_clients();

		$this->load->view('report/index', $data);
	}
	
	public function get_product_by_client()
	{
		$client_id = $this->input->post('client_id');

		if ($client_id != '') {
			$data['products'] = $this->report_model->get_products_by_client($client_id);
		}
		
		$this->load->view('report/product_option', $data);
	}
	
	public function search()
	{
		$search_criteria = array('started_date' => '', 'ended_date' => '');
		$search_criteria['client_id'] = $this->input->post('client_id');
		$search_criteria['product_id'] = $this->input->post('product_id');
		$search_criteria['range'] = $this->input->post('range');
		
		if ($search_criteria['range'] == 'month-with-date') {
			$search_criteria['started_date'] = date('Y-m-d', strtotime("first day of last month"));
			$search_criteria['ended_date'] = date('Y-m-d');
		} elseif ($search_criteria['range'] == 'this-month') {
			$search_criteria['started_date'] = date('Y-m-d', strtotime('first day of this month'));
			$search_criteria['ended_date'] = date('Y-m-d');
		} elseif ($search_criteria['range'] == 'this-year') {
			$search_criteria['started_date'] = date('Y-m-d', strtotime('first day of this year'));
			$search_criteria['ended_date'] = date('Y-m-d');
		} elseif($search_criteria['range'] == 'last-year') {
			$search_criteria['started_date'] = date('Y-m-d', strtotime('first day of last year'));
			$search_criteria['ended_date'] = date("Y-12-t", strtotime(date("Y-12-01", strtotime("-1 year"))));
		}

		$data['search_results'] = $this->report_model->get_products_by_criteria($search_criteria);

		$this->load->view('report/search', $data);
	}
}