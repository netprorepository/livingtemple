<?php
class Cart extends dbConnect
{
	
	public function addToCart($id,$product,$price,$quantity,$image,$productcode)
	{	
	
			$_SESSION['brainfreezer'][$id]=array('product'=>$product,'price'=>$price,'quantity'=>$quantity,'image'=>$image,'id'=>$id,'productcode'=>$productcode);			
		
		
	}
	
	
	
	public function countcart(){
		return count($_SESSION['brainfreezer']);
	}
	
	
	public function findAllProduct()
	{
	
	if(isset($_SESSION['brainfreezer'])){

	if(count($_SESSION['brainfreezer'])>0){
	?>
		
		<table class="tb-re ml16">
		<thead>
		<tr>
			<th>Image</th>
			<th>Product Name</th>
			<th>Unit Price</th>
			<th>Qty</th>
			<th>Subtotal</th>
			<th>Delete</th>
		</tr>
		</thead>
		<tbody>
		<?php 
		$ch_sell='';
		foreach($_SESSION['brainfreezer'] as $k=>$v)
		{
		?>
		<tr>
		    <input type="hidden" value="<?php echo $sell = self::getSellByItem($v['id']); ?>" />
			<input type="hidden" class="c_id" value="<?php echo $v['id']; ?>" />
			<input type="hidden" value="<?php echo $qn = self::getItemInfo($v['id']); ?>" />
			<input type="hidden" value="<?php echo $ch_sell = self::getItemInfo($v['id'])-self::getSellByItem($v['id']); ?>" />
			<td><img src="<?=$v['image']?>" class="img-thumbnail center-block" width="100"></td>
			<td><?=$v['product']?></td>
			<td><?=CURRENCY?> <?=$v['price']?></td>
			<td><input type="text" class="form-control xyz" value="<?=$v['quantity']?>" /><br><span style="color: red; font-size: 14px;"></span><br><input type="button" class="up_cart_qun" value="Update"></td>
			<td><?=CURRENCY?> <?=self::getsubprice($v['id'])?></td>
			<td class="del"><a href="#" onclick="return delet_confirm('<?=$v['id']?>')"><i class="fa fa-times"></i></a></td>
			
		</tr>
		<?php } ?>
       
        
        <tr>
			<td colspan="4"></td>
			<td colspan="2" class="del">
            
<table border="0" cellspacing="0" cellpadding="0" width="100%">
  <tr class="new-d1">
    <td>Subtotal :</td>
    <td><?=CURRENCY?> <?=self::get_order_total()?></td>
  </tr>
  <tr>
    <td>Shipping Charge :</td>
    <td>Free</td>
  </tr>
  <tr class="new-d2">
    <td>Total :</td>
    <td><?=CURRENCY?> <?=self::get_order_total()?></td>
  </tr>
</table>

            </td>
			
		</tr>
		
        <tr>
			<td colspan="3"><a href="<?=BASE_URL?>" class="shop1"><i class="fa fa-reply-all ml10"></i> Continue Shopping</a></td>
			
			<?php
			if($sell>=$qn){ ?>
			<td colspan="3" class="del new-d2"><a href="#"><input class="btn btn-sm btn-primary red-gr pull-right" type="button" value="Out Of Stock" id=""></a></td>
			<?php }else{
			if(isset($_SESSION['user_email'])){ ?>			
				<?php $_SESSION['b']==""; ?>
				<td colspan="3" class="del new-d2"><a href="<?=BASE_URL?>checkout/proceed-to-payment/?step=2"><input class="btn btn-sm btn-primary red-gr pull-right" type="button" value="Proceed To Checkout" id=""></a></td>
			
			<?php } else {?>
                         <?php $_SESSION['a']==""; ?>
			<td colspan="3" class="del new-d2"><a href="<?=BASE_URL?>checkout/proceed-to-payment/"><input class="btn btn-sm btn-primary red-gr pull-right" type="button" value="Proceed To Checkout" id=""></a></td>
			<?php } } ?>
		</tr>
        
		
		
		
		</tbody>
	</table>
	
	<?php
		
		}else{ ?>
		<div class="tiel1">
        	<div class="n-1">This Area is empty. Choose other products</div>
            <a href="<?=BASE_URL?>" class="shop3 col-md-4">Shop Now</a>
         
        </div>
	<?php	}
		
		}else{ ?>
		<div class="tiel1">
        	<div class="n-1">This Area is empty. Choose other products</div>
            <a href="<?=BASE_URL?>" class="shop3 col-md-4">Shop Now</a>
         
        </div>
	<?php	}
	}
	
	
	
	

	public function updateProductQuty($pid,$quty)
	{
	
		if($quty>0){
			$_SESSION['brainfreezer'][$pid]['quantity']=$quty;
			//else
		}
	
		//unset($_SESSION['brainfreezer'][$pid]);
	}
	
	public function getsubprice($id)
	{
	$pirce=$_SESSION['brainfreezer'][$id]['price'];
	$quantity=$_SESSION['brainfreezer'][$id]['quantity'];
	return $quantity*$pirce;
	}
	
	public function get_order_total()
	{
		$sum=0;	
		foreach($_SESSION['brainfreezer'] as $k=>$v)
		{
			$id=$v['id'];
			$q=$v['quantity'];
			$price=self::getsubprice($id,$q);
			$sum+=$price;
		}
		return $sum;
	}
	
	public function deleteProduct($id)
	{
	unset($_SESSION['brainfreezer'][$id]);
	}
	
	
	
	public function addToCompare($id)
	{	
		
	$_SESSION['compare'][$id]=array('id'=>$id);
		
	}
	
	public function deleteCompare($id)
	{
	unset($_SESSION['compare'][$id]);
	}
	function getSellByItem($id){
		
		$sql = "select SUM(quantity) from orders where productId='$id' and status='Delivered'";
					
		$result = mysql_query($sql);
		while($row1=mysql_fetch_array($result))
					 {
						return $mark=$row1['SUM(quantity)'];
						
					}
							 
			
		
	}
	function getItemInfo($id){
		
		$sql = "select * from products where id='$id'";
					
		$result = mysql_query($sql);
		while($row1=mysql_fetch_array($result))
					 {
						return $mark=$row1['quantity'];
						
					}
							 
			
		
	}

}





?>