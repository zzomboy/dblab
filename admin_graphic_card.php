<?php
	session_start();
	require_once('connect.php');
	include("template.class.php");
	if(!isset($_SESSION['username']))
	{
		$user_login = false;
		$layout_header = new Template("layout_header.tpl");
		$layout_footer = new Template("layout_footer.tpl");
	}
	else{
		$user_login = true;
		if($_SESSION['type'] == 'admin'){
			$layout_header = new Template("layout_login_header_admin.tpl");
			$layout_footer = new Template("layout_login_footer_admin.tpl");
		}
		else{
			$layout_header = new Template("layout_login_header.tpl");
			$layout_footer = new Template("layout_login_footer.tpl");
		}
	}
	$layout_header->set('title','Admin : My account : IT Online Shopping website');
	echo $layout_header->output();
/*****************sort by*********************/	
	if (!isset($_GET['sortby'])) {
		$sortby = "pro_price";
	}
	else{
		$sortby = $_GET['sortby'];
	}
?>
<!--Content-->
<div class="user_full">
	<div class="user_left">
		<table class="user_menu">
			<tr>
				<th>
					Admin page
				</th>
			</tr>
			<tr>
				<td class="active">
					<a href="admin.php">Product management</a>
				</td>
			</tr>
			<tr>
				<td>
					<a href="admin_add_product.php">Add Product</a>
				</td>
			</tr>
			<tr>
				<td>
					<a href="admin_check_pay.php">Check Confirm Payment</a>
				</td>
			</tr>
			<tr>
				<td>
					<a href="admin_user.php">User management</a>
				</td>
			</tr>
			<tr>
				<td>
					<a href="contact_read.php">View Contacts</a>
				</td>
			</tr>
		</table>
	</div>

	<div class="admin_right">
		<div class="admin_tool_box">
			<div class="admin_search_box">
				<form method="get" action="admin_pro_search.php">
	     			<input type="text" placeholder="Search product" name="searchword">
	     			<input type="submit" value="">
			     </form>
			</div>
			<select class="sortby_tool" onchange="location = this.value;">
				<option disabled selected value> Sort By </option>
				<option value="?sortby=pro_name">Name A - Z</option>
				<option value="?sortby=pro_name desc">Name Z - A</option>
				<option value="?sortby=pro_price">Price lowest - highest</option>
				<option value="?sortby=pro_price desc">Price highest - lowest</option>	
			</select>
			<select class="sortby_tool" onchange="location = this.value;">
				<option disabled selected value> Select category </option>
				<option value="admin_cpu.php">CPU</option>
				<option value="admin_mainboard.php">Mainboard</option>
				<option value="admin_graphic_card.php">Graphic card</option>
				<option value="admin_monitor.php">Monitor</option>
				<option value="admin_hdd_ssd.php">HDD & SSD</option>
				<option value="admin_ram.php">RAM</option>
				<option value="admin_case_psu.php">Case & PSU</option>
				<option value="admin_odd.php">Optical disk drive</option>
			</select>
     	</div>
		<div class="clear"></div>
			<?php
/**************************graphic card**************************/		
			echo "<h2>Graphic card</h2>
					<table class='product_tb'>";
				$q = "SELECT pro_id,pro_pic,pro_name,pro_price,pro_pdis,c.cat_name FROM product as p , category as c WHERE 
p.cat_id = c.cat_id and c.cat_id = 3 ORDER BY $sortby";
				$result = $mysqli -> query($q);
				while($row=$result->fetch_array()){
					echo "<tr>";
					if (file_exists("img/product/".$row['pro_pic'])) {
						echo "<td><img src='img/product/".$row['pro_pic']."'  height='40px'></td>";
					}
					else{
						echo "<td><img src='img/product/noimgfoundsmall.jpg' width='40px' height='40px'></td>";
					}
					echo "<td>".$row['pro_name']."</td>";
					echo "<td>".number_format($row['pro_price'])."</td>";		
					if ($row['pro_pdis'] == 0) {
						echo "<td>-</td>";
					}else{
						echo "<td>".$row['pro_pdis']."</td>";
					}
					echo "<td><a href='edit_pro.php?edit_id=".$row['pro_id']."'><img src='img/pro_edit.png' width='24' height='24'></td>";
					echo "<td><a href='del_pro.php?delete_id=".$row['pro_id']."' class='confirmation'><img src='img/pro_delete.png' width='24' height='24'></a></td>";
					echo "</tr>";
				}
				echo "</table>";
			?>
	</div>
	<div class="clear"></div>
</div>
<?php
	echo $layout_footer->output();
?>
<script type="text/javascript">
    $('.confirmation').on('click', function () {
        return confirm('Are you sure?');
    });
</script> 