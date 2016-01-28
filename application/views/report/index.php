<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome To Consumer Sketch eCommerce Report</title>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.min.js" ></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/script.js" ></script>
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css">
</head>
<body>
	<h2>Welcome To Consumer Sketch eCommerce Report</h2>
	<div class="fliters">
		<div class="float-left">
			<select id="js-select-client" data-route="<?php echo site_url('report/get-product-by-client'); ?>">
				<option value=''>Please Select Client</option>
				<?php foreach ($clients as $client_item): ?>
					<option value="<?php echo $client_item['client_id']; ?>"><?php echo $client_item['client_name']; ?></option>
				<?php endforeach; ?>
			</select>
		</div>
		<div class="float-left">
			<select id="js-select-product">
				<option value="">Please Product</option>
			</select>
		</div>
		<div class="float-left">
			<select id="js-select-range" data-route="<?php echo site_url('report/search'); ?>">
				<option value="">Please Select Date Range</option>
				<option value="month-with-date">Last Month to Date</option>
				<option value="this-month">This Month</option>
				<option value="this-year">This Year</option>
				<option value="last-year">Last Year</option>
			</select>
		</div>
		<div class="float-left">
			<button id="js-search" data-route="<?php echo site_url('report/search'); ?>">Submit</button>
		</div>
	</div>

	<div class="clear"></div>
	
	<div class="result">
		<table border="1" width="100%">
			<tr>
				<th>Invoice Num</th>
				<th>Invoice Date</th>
				<th>Product</th>
				<th>Qty</th>
				<th>Price</th>
				<th>Total</th>
			</tr>
			<tbody class="js-search-result">
				<tr><td colspan="6" align="center"><b>No Record Found</b></td></tr>
			</tbody>
		</table>
	</div>
</body>
</html>