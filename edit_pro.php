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

	$edit_id = $_GET['edit_id'];
?>
<script type="text/javascript" src="jquery.min.js"></script>
<script type="text/javascript">
	var $i=0;
	var $j=0;
	/*function seti(item){
		var $i=item;
	};
	function setj(item){
		var $j=item;
	};*/

	//document.getElementById("add_line").onclick = function() {add_line_f()};

	function add_line_f(hidden_i) {
		$i++;
		var $new_line = '<input type="text" placeholder="Topic" name="'+top_n()+'" style="width: 40%;">'
		+'<input type="text" placeholder="Detail" name="'+detail_n()+'" style="width: 58%;float: right;">';
	    $(".detail_input").append($new_line);
	    
	    console.log($i);
	    document.getElementById(hidden_i).innerHTML='<input type="hidden" name="nline_detail" value="'+$i+'">';
	};

	function print_line_f(item1,item2,hidden_i){
		$i++;
		var $new_line = '<input type="text" placeholder="Topic" name="'+top_n()+'" value="'+item1+'" style="width: 40%;"><input type="text" placeholder="Detail" name="'+detail_n()+'" value="'+item2+'" style="width: 58%;float: right;">';
	    $(".detail_input").append($new_line);
	    
	    console.log($i);
	    document.getElementById(hidden_i).innerHTML='<input type="hidden" name="nline_detail" value="'+$i+'">';

	};
	function top_n() {
		return "topic_detail_"+$i;
	};
	function detail_n() {
		return "text_detail_"+$i;
	};


	//document.getElementById("add_line_desc").onclick = function() {add_line_d()};

	function add_line_d(hidden_j) {
		$j++;
		var $new_line_desc = '<input type="text" placeholder="Enter description" name="'+desc_n()+'">';
	    $(".desc_input").append($new_line_desc);
	    //document.getElementById(desc_input).innerHTML += $new_line_desc;
	    
	    console.log($j);
	    document.getElementById(hidden_j).innerHTML='<input type="hidden" name="nline_desc" value="'+$j+'">';
	};
	function print_line_d(item,hidden_j){
		$j++;
		var $new_line_desc = '<input type="text" placeholder="Enter description" value="'+item+'" name="'+desc_n()+'">';
	    $(".desc_input").append($new_line_desc);
	    
	    console.log($j);
	    document.getElementById(hidden_j).innerHTML='<input type="hidden" name="nline_desc" value="'+$j+'">';

	};
	function desc_n() {
		return "text_desc_"+$j;
	};


	function show_name() {
	    var fullPath = document.getElementById("image");
	    if (document.getElementById("image").value === ""){
	    	var filename = "";
	    	document.getElementById("hidden_filename").innerHTML='<input type="hidden" name="pimg" value="">';
	    }
	    else{
	    	var filename = fullPath.files[0].name;
	    	document.getElementById("hidden_filename").innerHTML='<input type="hidden" name="pimg" value="'+filename+'">';
	    }
	    document.getElementById("file_show").innerHTML = filename;
	    console.log(filename);
	};
</script>
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
		<div class="add_product_form">
			<?php
				$q	= "select * from product where pro_id = '$edit_id'";
				$result	= $mysqli->query($q);
				if(!$result){
					echo "Error on : $q";
				}
				else{
					$row=$result->fetch_array();
				}
			?>
			<h3>Edit product</h3>
			<form method="post" action="admin_editsave_product.php" enctype="multipart/form-data">
				<input type="hidden" name="pid" value="<?php echo $row['pro_id']; ?>">
				<div id="hidden_filename"></div>
				<div id="hidden_i">
					<input type="hidden" name="nline_detail" value="1">
				</div>
				<div id="hidden_j">
					<input type="hidden" name="nline_desc" value="1">
				</div>
				<table class="add_product_tb">
					<tr>
						<td>
							Name : 
						</td>
						<td>
							<input type="text" placeholder="Enter prodeuct name" value="<?php echo $row['pro_name']; ?>" name="pname" required>
						</td>
						<td></td>
					</tr>
					<tr>
						<td>
							Description : 
						</td>
						<td>
							<div class="desc_input"></div>
							<?php 
								if(trim($row['pro_desc']) == ""){
									//echo "<script>setj(0);</script>";
									echo "<script>add_line_d('hidden_j');</script>";
								}else{
									//echo "<script>setj(0);</script>";
									$nline_desc = explode("!",$row['pro_desc']);
									foreach ($nline_desc as $txt) {
										if(trim($txt) != ""){
											echo "<script>print_line_d('".trim($txt)."','hidden_j');</script>";
										}
									}
								}
							?>

							<button type="button" class="add_bt" onclick="add_line_d('hidden_j')">add new line</button>
						</td>
						<td></td>
					</tr>
					<tr>
						<td>
							Price : 
						</td>
						<td>
							<input type="number" placeholder="Enter product`s price" name="pprice" value="<?php echo $row['pro_price']; ?>" required>
						</td>
						<td></td>
					</tr>
					<tr>
						<td>
							Discount : 
						</td>
						<td>
							<input type="number" placeholder="Enter product`s % discount" name="ppdis" value="<?php if($row['pro_pdis'] != 0) {echo $row['pro_pdis'];} ?>">
						</td>
						<td></td>
					</tr>
					<tr>
						<td>
							Warranty : 
						</td>
						<td>
							<input type="text" placeholder="Enter warranty" name="pwarr" value="<?php echo $row['pro_warr']; ?>" required>
						</td>
						<td></td>
					</tr>
					<tr>
						<td>
							Detail : 
						</td>
						<td colspan="2">
							<div class="detail_input"></div>
							<!-- <input type="text" placeholder="Topic" name="topic_detail_1" style="width: 40%;">
							<input type="text" placeholder="Detail" name="text_detail_1" style="width: 58%;float: right;"> -->
							<?php 
								if(trim($row['pro_detail']) == ""){
									//echo "<script>setj(0);</script>";
									echo "<script>add_line_f('hidden_i');</script>";
								}else{
									//echo "<script>setj(0);</script>";
									$nline_detail = explode("!",$row['pro_detail']);
									$item1 = array();
									$item2 = array();
									foreach ($nline_detail as $value) {
										if(trim($value) != ""){
											list($first,$last) = explode("?", $value);
											if($first != "" && $last != ""){
												array_push($item1, trim($first));
												array_push($item2, trim($last));
											}
										}
									}
									//echo print_r($item1)."<br><br>";
									//echo print_r($item2)."<br><br>";
									$u=0;
									while ($u < count($item1)) {
										echo "<script>print_line_f('".$item1[$u]."','".$item2[$u]."','hidden_i');</script>";
										$u++;
									}
								}
							?>

							<button type="button" class="add_bt"  onclick="add_line_f('hidden_i')">add new line</button>			
						</td>
					</tr>
					<tr>
						<td>
							Category : 
						</td>
						<td>
							<select class="input_select" name="pcat" required>
								<option disabled value>select category</option>
								<?php
									$mysqli = new mysqli('localhost','root','','dblab');
									$q = "SELECT * FROM category";
									$res = $mysqli -> query($q);
									$c=1;
									
									while($ro=$res->fetch_array()){
										if($c == $row['cat_id']){
											echo "<option value='".$ro['cat_id']."' selected>".$ro['cat_name']."</option>";
										}else{
											echo "<option value='".$ro['cat_id']."'>".$ro['cat_name']."</option>";
										}
										
										$c++;
									}
								?>
							</select>
						</td>
						<td></td>
					</tr>
					<tr>
						<td style="padding: 18px 20px 18px 0px;">
							Image : 
						</td>
						<td colspan="2">
							<label class="filecon">
								<strong>Choose an image...</strong>
								<input type="file" id="image" name="fileToUpload" onchange="show_name()">
							</label>
							<div id="file_show" style="font-size: 13px;padding: 5px 0 0 155px"></div>
    					</td>
					</tr>
					<tr>
						<td>
						</td>
						<td style="padding: 18px 20px 18px 0px;">
							
							<?php 
								if($row['pro_avai']==1){
							?>
	    						<input type="checkbox" name="pavai" value="1">
	    					<?php
	    						}
	    						else{
	    					?>
	    						<input type="checkbox" name="pavai" value="1" checked>
	    					<?php
	    						}
	    					?>
	    						<label class="checkbox_con">Unavailable(Sold out)</label>
    						
    					</td>
    					<td>
						</td>
					</tr>
					<tr>
						<td>
						</td>
						<td colspan="2">
    						<div class="clearfix">
      							<button type="submit" class="signupbtn" name="submit" value="Add">Update</button>
      							<button type="reset"  class="cancelbtn">Reset</button>
    						</div>
    					</td>
					</tr>
				</table>
			</form>
		</div>
	</div>
	<div class="clear"></div>
</div>

<?php
	echo $layout_footer->output();
?>
