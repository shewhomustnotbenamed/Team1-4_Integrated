<?php $this->load->view("includes/header")?>

<p>
<?php
 echo '<a href="'.base_url('index.php/cart_controller/empty_cart')."\" id='empty'>Empty Cart </a>";
?>
</p>
<?php if($this->cart->total() > 0 ): ?>
<table  border="1">
<?php echo form_open('cart_controller/remove_selected'); ?>
<tr>
  <th><input type="submit" value="Remove Checked items" onclick="javascript:return confirm('Are you sure?');"></th>
  <th>Title</th>
  <th>Year</th>
  <th>Author</th>
  <th>Course code</th>
</tr>

<?php $i = 1; ?>

<?php foreach ($this->cart->contents() as $items): ?>

	<?php echo form_hidden($i.'[rowid]', $items['rowid']); ?>

	<tr>
		<!-- checkbox -->
		
		<td>
			<?php 
				$total = $this->cart->total();
				$checkboxname = "cart".$i;
				echo "<input type='checkbox' name='{$checkboxname}' value='{$items['rowid']}' />" ; 

			?>
		</td>
			<?php if ($this->cart->has_options($items['rowid']) == TRUE): ?>
			<p><?php foreach ($this->cart->product_options($items['rowid']) as $option_name => $option_value): ?>
					<td>
						<?php echo $option_value; ?><br />
					</td>
				<?php endforeach; ?>
				<td><!--
					<form action="<?php echo base_url('index.php/search/transaction'); ?>" method="get" accept-charset="utf-8">
						
						<input type="hidden" name="id" value=<?=$items['id']?> />
						<input type="submit" name="reserve" id="reserve" value="Reserve"/>
					
					</form>
				-->
				
				<button type="submit" formmethod="get" formaction="<?php echo base_url('index.php/search/transaction/'.$items['id']); ?>" name="reserve">Reserve</button>
				</td>
			</p>
			<?php endif; ?>

			</label>
	</tr>

<?php $i++; ?>

<?php endforeach; ?>
</form>
</table>
<?php else: ?>
	<?php echo 'Cart is Empty'; ?>
<?php endif; ?>