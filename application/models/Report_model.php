<?php
class Report_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
        }
		
		public function get_clients()
		{
			$query = $this->db->get('clients');

			return $query->result_array();
        }
		
		public function get_products_by_client($client_id)
		{
			$this->db->select('product_id, product_description');

			$query = $this->db->get_where('products', array('client_id' => $client_id));

			return $query->result_array();
        }
		
		public function get_products_by_criteria($search_criteria)
		{
			$query = $this->db->select('invoices.*, invoicelineitems.*, products.*')
							  ->from('invoices')
							  ->join('invoicelineitems', 'invoicelineitems.invoice_num = invoices.invoice_num')
							  ->join('products', 'products.product_id = invoicelineitems.product_id')
							  ->where('invoices.client_id', $search_criteria['client_id']);
							  
			if ($search_criteria['product_id'] != '') {
				$query->where('invoicelineitems.product_id', $search_criteria['product_id']);
			}
							  
			
			if ($search_criteria['started_date'] != '' && $search_criteria['ended_date'] != '') {
					$query->where('DATE(invoices.invoice_date) BETWEEN "'.$search_criteria['started_date'].'" AND "'.$search_criteria['ended_date'].'"');
			}
			
			$query->order_by('invoices.invoice_date', "asc");
		
			unset($search_criteria);
			
			return $query->get()->result_array();
		}
}