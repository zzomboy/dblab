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
	$layout_header->set('title','IT Online Shopping website');
	echo $layout_header->output();

	$edit_id = $_GET['edit_id'];
?>
<script type="text/javascript" src="jquery.min.js"></script>
<script type="text/javascript">
	var $i=0;
	var $j=0;
	function seti(item){
		var $i=item;
	};
	function setj(item){
		var $j=item;
	};
	//document.getElementById("add_line").onclick = function() {add_line_f()};

	function add_line_f(hidden_i) {
		$i++;
		var $new_line = '<input type="text" placeholder="Topic" name="'+top_n()+'" style="width: 40%;"><input type="text" placeholder="Detail" name="'+detail_n()+'" style="width: 58%;float: right;">';
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

	function add_line_d(hidden_j,desc_input) {
		$j++;
		var $new_line_desc = '<input type="text" placeholder="Enter description" name="'+desc_n()+'">';
	    $(".desc_input").append($new_line_desc);
	    
	    console.log($j);
	    document.getElementById(hidden_j).innerHTML='<input type="hidden" name="nline_desc" value="'+$j+'">';
	};
	function print_line_d(item,hidden_j,desc_input){
		$j++;
		var $new_line_desc = '<input type="text" placeholder="Enter description" value="'+item+'" name="'+desc_n()+'">';
	    //$(".desc_input").append($new_line_desc);
	    document.getElementById(desc_input).innerHTML += $new_line_desc;
	    
	    console.log($j);
	    console.log(desc_input)
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
							<div id="desc_input"></div>
							<?php 
								if(trim($row['pro_desc']) == ""){
									echo "<script>setj(0);</script>";
									echo "<script>add_line_d('hidden_j','desc_input','desc_input');</script>";
								}else{
									echo "<script>setj(0);</script>";
									$nline_desc = explode(",",$row['pro_desc']);
									foreach ($nline_desc as $d => $txt) {
										if($txt != "")
										echo "<script>print_line_d('".$txt."','hidden_j','.desc_input');</script>";
										$d++;
									}
								}
							?>

							<button type="button" class="add_bt" id="add_line_desc" onclick="add_line_d('hidden_j')">add new line</button>
						</td>
						<td></td>
					</tr>
					<tr>
						<td>
							Price : 
						</td>
						<td>
							<input type="number" placeholder="Enter product`s price" name="pprice" required>
						</td>
						<td></td>
					</tr>
					<tr>
						<td>
							Discount : 
						</td>
						<td>
							<input type="number" placeholder="Enter product`s % discount" name="ppdis">
						</td>
						<td></td>
					</tr>
					<tr>
						<td>
							Warranty : 
						</td>
						<td>
							<input type="text" placeholder="Enter warranty" name="pwarr" required>
						</td>
						<td></td>
					</tr>
					<tr>
						<td>
							Detail : 
						</td>
						<td colspan="2">
							<input type="text" placeholder="Topic" name="topic_detail_1" style="width: 40%;">
							<input type="text" placeholder="Detail" name="text_detail_1" style="width: 58%;float: right;">

							<div class="detail_input"></div>

							<button type="button" class="add_bt" id="add_line" onclick="add_line_d('hidden_i')">add new line</button>			
						</td>
					</tr>
					<tr>
						<td>
							Category : 
						</td>
						<td>
							<select class="input_select" name="pcat" required>
								<option disabled selected value>select category</option>
								<?php
									$mysqli = new mysqli('localhost','root','','dblab');
									$q = "SELECT * FROM category";
									$result = $mysqli -> query($q);
									
									while($row=$result->fetch_array()){
										echo "<option value='".$row['cat_id']."'>".$row['cat_name']."</option>";
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
						<td colspan="2">
    						<div class="clearfix">
      							<button type="submit" class="signupbtn" name="submit" value="Add">Add</button>
      							<button type="reset"  class="cancelbtn">Cancel</button>
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
