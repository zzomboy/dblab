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
	$layout_header->set('menu_price','class="active"');
	$layout_header->set('title','Pricelist : IT Online Shopping website');
	echo $layout_header->output();
?>
<!--Content-->
		<div class="category_picture">			
			<div class="categories">
				<ul>
					<h3>Categories</h3>
					<li><a href="?show=1">CPU</a></li>
				    <li><a href="?show=2">Mainboard</a></li>
				    <li><a href="?show=3">Graphic card</a></li>
				    <li><a href="?show=4">Monitor</a></li>
				    <li><a href="?show=5">Harddisk & Solid state drive</a></li>
				    <li><a href="?show=6">RAM for PC</a></li>
				    <li><a href="?show=7">Case & Power supply</a></li>
				    <li><a href="?show=8">Optical disk drive</a></li>
				</ul>
			</div>

<!-- pricelist table -->
		<?php
			if (!isset($_GET['show'])) {
				$allcat = array('CPU','Mainboard','Graphic card','Monitor','HDD & SSD','RAM','Case & PSU','Optical disk drive');
				foreach ($allcat as $catname) {
					echo '
			<div class="pricelist_box">
				<h3>'.$catname.'</h3>
				<table class="pricelist_tb">
					<tr>
						<th>
							Picture
						</th>
						<th>
							Product name
						</th>
						<th>
							Price (THB)
						</th>
						<th>
							Discount (THB)
						</th>
						<th>
							Sale price (THB)
						</th>
						<th>
							Warranty
						</th>
					</tr>';
						$q = "SELECT pro_id,pro_pic,pro_name,pro_price,pro_pdis,pro_psale,pro_warr,c.cat_name FROM product as p , category as c WHERE p.cat_id = c.cat_id and c.cat_name like '$catname' ORDER BY pro_psale";
						$result = $mysqli -> query($q);
						while($row=$result->fetch_array()){
							echo "<tr>";
							if (file_exists("img/product/".$row['pro_pic'])) {
								echo "<td style='text-align: center;'><a href='preview.php?pid=".$row['pro_id']."' target='_blank'><img src='img/product/".$row['pro_pic']."'  height='40px'></a></td>";
							}
							else{
								echo "<td style='text-align: center;'><a href='preview.php?pid=".$row['pro_id']."' target='_blank'><img src='img/product/noimgfoundsmall.jpg' width='40px' height='40px'></a></td>";
							}
							echo "<td><a href='preview.php?pid=".$row['pro_id']."' target='_blank'>".$row['pro_name']."</a></td>";
							echo "<td>".$row['pro_price']."</td>";		
							if ($row['pro_pdis'] == 0) {
								echo "<td>-</td>";
							}else{
								$salebaht = ($row['pro_price'] * $row['pro_pdis'])/100;
								echo "<td>".$salebaht."<br>(".$row['pro_pdis']."%)</td>";
							}
							echo "<td>".$row['pro_psale']."</td>";
							echo "<td>".$row['pro_warr']."</td>";
							echo "</tr>";
						}
					echo '
				</table>
				<div class="clear"></div>
			</div>';
				}
			}



			else{
				switch ($_GET['show']) {
					case 1:
						$catname = "CPU";
						break;
					case 2:
						$catname = "Mainboard";
						break;
					case 3:
						$catname = "Graphic card";
						break;
					case 4:
						$catname = "Monitor";
						break;
					case 5:
						$catname = "HDD & SSD";
						break;
					case 6:
						$catname = "RAM";
						break;
					case 7:
						$catname = "Case & PSU";
						break;
					case 8:
						$catname = "Optical disk drive";
						break;
				}
				echo '
			<div class="pricelist_box">
				<h3>'.$catname.'</h3>
				<table class="pricelist_tb">
					<tr>
						<th>
							Picture
						</th>
						<th>
							Product name
						</th>
						<th>
							Price (THB)
						</th>
						<th>
							Discount (THB)
						</th>
						<th>
							Sale price (THB)
						</th>
						<th>
							Warranty
						</th>
					</tr>';
						$q = "SELECT pro_id,pro_pic,pro_name,pro_price,pro_pdis,pro_psale,pro_warr,c.cat_name FROM product as p , category as c WHERE p.cat_id = c.cat_id and c.cat_name like '$catname' ORDER BY pro_psale";
						$result = $mysqli -> query($q);
						while($row=$result->fetch_array()){
							echo "<tr>";
							if (file_exists("img/product/".$row['pro_pic'])) {
								echo "<td style='text-align: center;'><a href='preview.php?pid=".$row['pro_id']."' target='_blank'><img src='img/product/".$row['pro_pic']."'  height='40px'></a></td>";
							}
							else{
								echo "<td style='text-align: center;'><a href='preview.php?pid=".$row['pro_id']."' target='_blank'><img src='img/product/noimgfoundsmall.jpg' width='40px' height='40px'></a></td>";
							}
							echo "<td><a href='preview.php?pid=".$row['pro_id']."' target='_blank'>".$row['pro_name']."</a></td>";
							echo "<td>".$row['pro_price']."</td>";		
							if ($row['pro_pdis'] == 0) {
								echo "<td>-</td>";
							}else{
								$salebaht = ($row['pro_price'] * $row['pro_pdis'])/100;
								echo "<td>".$salebaht."<br>(".$row['pro_pdis']."%)</td>";
							}
							echo "<td>".$row['pro_psale']."</td>";
							echo "<td>".$row['pro_warr']."</td>";
							echo "</tr>";
						}
					echo '
				</table>
				<div class="clear"></div>
			</div>';
			}
		?>

			<div class="clear"></div>
		</div>
<?php
	echo $layout_footer->output();
?>