<?php require_once("../resource/config.php") ; ?>

<?php 
if(isset($_GET['add'])) {

$query = query("select * from products where product_id=" . escape_string($_GET['add']) . " ");
confirm($query);
while($row =fetch_array($query))
{
if($row['product_quantity']!=$_SESSION['product_' . $_GET['add']]) {

	$_SESSION['product_' . $_GET['add']]+=1;
	redirect("checkout.php");
}
else{

	 set_message("we only have " . "{$row['product_quantity']}" . "  {$row['product_title']}  "  . "available");
	 redirect("Checkout.php");
}
}
}


if(isset($_GET['remove'])){
	$_SESSION['product_' . $_GET['remove']]--;
	if($_SESSION['product_' . $_GET['remove']] < 1){
		unset($_SESSION['item_total']);
	    unset($_SESSION['item_quantity']);
		redirect("checkout.php");
	}
	else{
		redirect("checkout.php");
	}
}


if(isset($_GET['delete'])){
	$_SESSION['product_' . $_GET['delete']]='0';
	if($_SESSION['product_' . $_GET['delete']]=='0'){
		unset($_SESSION['item_total']);
		unset($_SESSION['item_quantity']);
		redirect("checkout.php");
	}
	

}


function cart(){
$total=0;
$item_quantity=0;
$item_name=1;
$item_number=1;
$amount=1;
$quantity=1;

foreach ($_SESSION as $name => $values){

if ($values > 0) {

if(substr($name,0,8)=="product_") {

$length = strlen($name ) ;
$id = substr($name, 8 , $length);
$query = query("select * from products where product_id=". escape_string($id) . " ");
confirm($query);
while($row=fetch_array($query)) 
{
 $sub = $row['product_price']*$values; 
 $item_quantity +=$values;  
$product = <<<DELIMETER
<tr>
    <td>{$row['product_title']}</td>
    <td>&#36;{$row['product_price']}</td>
    <td>{$values}</td>
    <td>&#36;{$sub}</td>
    <td><a class="btn btn-success" href = "cart.php?add={$row['product_id']}"><i class= "fas fa-plus"></i></a>
    <a class="btn btn-danger" href = "cart.php?delete={$row['product_id']}"><i class= "fas fa-times"></i></a>
    <a class="btn btn-warning"href = "cart.php?remove={$row['product_id']}"><i class= "fas fa-minus"></i></a>
    </td>
    
</tr>

  <input type="hidden" name="item_name_{$item_name}" value="{$row['product_title']}">
  <input type="hidden" name="item_number_{$item_number}" value="{$row['product_id']}">
  <input type="hidden" name="amount_{$amount}" value="{$row['product_price']}">
  <input type="hidden" name="quantity_{$quantity}" value="{$values}">

DELIMETER;

echo $product;

$item_name++;
$item_number++;
$amount++;
$quantity++;


}
$_SESSION['item_total']=$total += $sub;

$_SESSION['item_quantity'] =$item_quantity;

}


}

}

}
?>