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
	if (isset($_GET['show'])) {
		$show = $_GET['show'];
	}
	echo $layout_header->output();
?>
<!--Content-->
		<div class="category_picture">			
			<div class="categories">
				<ul>
					<h3>Categories</h3>
					<li><a href="?show=cpu">CPU</a></li>
				    <li><a href="?show=mainboard">Mainboard</a></li>
				    <li><a href="?show=graphiccard">Graphic card</a></li>
				    <li><a href="?show=monitor">Monitor</a></li>
				    <li><a href="?show=hdd-ssd">Harddisk & Solid state drive</a></li>
				    <li><a href="?show=ram">RAM for PC</a></li>
				    <li><a href="?show=case-psu">Case & Power supply</a></li>
				    <li><a href="&?show=odd">Optical disk drive</a></li>
				</ul>
			</div>

<!-- pricelist table -->
			<div class="pricelist_box">
				<h3>CPU</h3>
				<table class="pricelist_tb">
					<tr>
						<th>
							Product name
						</th>
						<th>
							Description
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
					</tr>

					<tr>
						<td>
							<a href="preview.php" target="_blank">CPU AMD TR4 RYZEN THREDRIPPER 1920X</a>
						</td>
						<td>
							CORES : 12 THREADS : 24
						</td>
						<td>
							31,900
						</td>
						<td>
							-
						</td>
						<td>
							31,900
						</td>
						<td>
							3 y
						</td>
					</tr>

					<tr>
						<td>
							<a href="#">CPU AMD TR4 RYZEN THREADRIPPER 1950X</a>
						</td>
						<td>
							CORES : 16 THREADS : 32
						</td>
						<td>
							38,900
						</td>
						<td>
							-
						</td>
						<td>
							38,900
						</td>
						<td>
							3 y
						</td>
					</tr>

				</table>
				<h3>Mainboard</h3>
				<table class="pricelist_tb">
					<tr>
						<th>
							Product name
						</th>
						<th>
							Description
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
					</tr>

					<tr>
						<td>
							<a href="#">MAINBOARD 1155 MSI H61M-P31/W8</a>
						</td>
						<td>
							SOCKET : 1155 CHIPSET : INTEL H61 MEMORY : 2 x DDR3 DIMM
						</td>
						<td>
							1,850
						</td>
						<td>
							-
						</td>
						<td>
							1,850
						</td>
						<td>
							3 y
						</td>
					</tr>

					<tr>
						<td>
							<a href="#">MAINBOARD 1155 GIGABYTE H61M-DS2 (REV3)</a>
						</td>
						<td>
							SOCKET : 1155 CHIPSET : INTEL H61 MEMORY : 2 x DDR3 DIMM
						</td>
						<td>
							1,840
						</td>
						<td>
							-
						</td>
						<td>
							1,840
						</td>
						<td>
							3 y
						</td>
					</tr>

					<tr>
						<td>
							<a href="#">MAINBOARD 1155 ASUS H61M-K</a>
						</td>
						<td>
							SOCKET : 1151 CHIPSET : INTEL H61(B3) MEMORY : 2 x DDR3 DIMM
						</td>
						<td>
							1,990
						</td>
						<td>
							-
						</td>
						<td>
							1,990
						</td>
						<td>
							3 y
						</td>
					</tr>

				</table>
				<div class="clear"></div>
			</div>
			<div class="clear"></div>
		</div>
<?php
	echo $layout_footer->output();
?>