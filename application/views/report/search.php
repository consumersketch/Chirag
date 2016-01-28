<?php foreach ($search_results as $search_item): ?>
	<tr>
		<td><?php echo $search_item['invoice_num']?></td>
		<td><?php echo $search_item['invoice_date']?></td>
		<td><?php echo $search_item['product_description']?></td>
		<td><?php echo $search_item['qty']?></td>
		<td><?php echo $search_item['price']?></td>
		<td><?php echo $search_item['qty']*$search_item['price']?></td>
	</tr>
<?php endforeach; ?>