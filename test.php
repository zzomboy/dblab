<?php
	session_start();
	require_once('connect2.php');

	echo '<script src="//code.jquery.com/jquery-2.1.4.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js" type="text/javascript"></script>
<script src="http://code.jquery.com/ui/1.8.20/jquery-ui.min.js" type="text/javascript"></script>';

	echo "<style>
		.tbs,.tbs td,.tbs th{
			border:1px solid black;
			border-collapse: collapse;
		}
		.ui-autocomplete-loading {
			background: white url('ui-anim_basic_16x16.gif') right center no-repeat;
		}
		.ui-corner-all{
			font-size:14px; 
		}
	</style>";
	?>
	<script>
		$(function() {
	        $( ".customer" ).autocomplete({
				source: "customer_show.php",
				select: function(event,ui){$('.customer').val(ui.item.value);}
			})
		});
    </script>
    <?php
	$q = "select * from foods";
	$result = $mysqli -> query($q);
	echo "<table class='tbs'>
		<tr>
		<th>Code</th>
		<th>Name</th>
		<th>FoodType</th>
		<th>Price</th>
		<th>Picture</th>
		<th>add to cart</th>
		</tr>";

	while ($row=$result->fetch_array()) {
		echo "<tr><td>";
		echo $row['FoodCode'];
		echo "</td><td>";
		echo $row['FoodName'];
		echo "</td><td>";
		echo $row['FoodType'];
		echo "</td><td>";
		echo $row['Price'];
		echo "</td><td>";
		//echo "<img src='img/product/".$row['FoodImageURL']."' width='200'>";
		echo "</td><td>";
		?>
		<div style='text-align:center;'>
			<a href='#' onclick="window.open('cart2.php?pid=<?php echo $row['FoodCode']; ?>&act=add', 'Cart', 'width=700,height=300'); return false;"><button class='addtocart'>Add to cart</button></a>
		<?php
		echo "</div>";
		echo "</td></tr>";
	}
	echo "</table>";
?>

<input type="text" name="customer" size="30" class="customer" placeholder="Enter customer name">