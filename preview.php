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
	$layout_header->set('title','My account : IT Online Shopping website');
	$layout_header->set('title','IT Online Shopping website');
	echo $layout_header->output();
?>
<!--Content-->
		<div class="full_page">
			<div class="preview_box">
				<h3>AMD TR4 RYZEN THREADRIPPER 1950X</h3>
				<div class="pic_desc_box">
					<div class="pic_box">
						<img src="img/amd_pic.jpg">
					</div>
					<div class="desc_box">
						<p>AMD TR4 RYZEN THREADRIPPER 1950X</p>
						<ul>
							<li>Socket : TR4</li>
							<li># OF CPU CORE : 16</li>
							<li># OF THREADS : 32</li>
							<li>Frequency : 3.4 GHz</li>
							<li>Turbo Frequency : 4.0 GHz</li>
						</ul>
						<h2>Price 38,900 THB<span>Warranty 3 y</span></h2>
					</div>
					<div class="clear"></div>
				</div>
				<div class="detail_box">
					<h3>Product detail</h3>
					<table class="detail_tb">
						<tr>
							<td>Brand</td>
							<td>AMD</td>
						</tr>
						<tr>
							<td>Processor</td>
							<td>AMD Ryzen Threadripper</td>
						</tr>
						<tr>
							<td>Model</td>
							<td>1950X</td>
						</tr>
						<tr>
							<td>L1 Cache Size (KB)</td>
							<td>1.5 MB</td>
						</tr>
						<tr>
							<td>L2 Cache Size</td>
							<td>8 MB</td>
						</tr>
						<tr>
							<td>L3 Cache Size</td>
							<td>32 MB</td>
						</tr>
						<tr>
							<td>Socket</td>
							<td>TR4</td>
						</tr>
						<tr>
							<td>Integrated graphics</td>
							<td>None</td>
						</tr>
						<tr>
							<td>Frequency</td>
							<td>3.4 GHz</td>
						</tr>
						<tr>
							<td>Turbo frequency</td>
							<td>4.0 GHz</td>
						</tr>
						<tr>
							<td>The number of cores</td>
							<td>16</td>
						</tr>
						<tr>
							<td>The number of threads</td>
							<td>32</td>
						</tr>
					</table>
				</div>
			</div>
			<div class="clear"></div>
		</div>
<?php
	echo $layout_footer->output();
?>
