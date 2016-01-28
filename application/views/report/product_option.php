<option value="">Please Product</option>
<?php foreach ($products as $product_item): ?>
	<option value="<?php echo $product_item['product_id']; ?>"><?php echo $product_item['product_description']; ?></option>
<?php endforeach; ?>