<?php
	$mysqli = new mysqli('localhost','root','','staff');
	if($mysqli ->connect_errno){
		echo "Cannot connect!!";
	}
	else{
		if(isset($_POST['title']) && 
		isset($_POST['firstname']) && 
		isset($_POST['lastname']) && 
		isset($_POST['gender']) && 
		isset($_POST['email']) && 
		isset($_POST['username']) && 
		isset($_POST['passwd']) &&  
		isset($_POST['usergroup']))
		{
			if(isset($_POST['disabled'])){
				$x=1;
			}
			else{
				$x=0;
			}
			$q = "Insert INTO user(USER_TITLE,USER_FNAME,USER_LNAME,USER_GENDER,USER_EMAIL,USER_NAME,USER_PASSWD,USER_GROUPID,DISABLE) 
			value(
			'".$_POST['title']."' ,
			'".$_POST['firstname']."' ,
			'".$_POST['lastname']."' ,
			'".$_POST['gender']."' ,
			'".$_POST['email']."' ,
			'".$_POST['username']."' ,
			'".$_POST['passwd']."' ,
			'".$_POST['usergroup']."' ,
			'".$x."'
			);";
			$result = $mysqli->query($q);
			if(!$result){
				echo("ERROR : ".$q);
			}
		}
	}
 ?>
<html>
<head>
<title>ITS331 Sample</title>
<link rel="stylesheet" href="default.css">
</head>

<body>

<div id="wrapper"> 
	<div id="subwrapper">
		<div id="div_header">
			ITS331 System 
		</div>
		<div id="div_subhead">
			<ul id="menu">
				<li><a href="user.php">User Profile</a></li>
				<li><a href="add_user.php">Add User</a></li>
				<li><a href="group.php">User Group</a></li>
				<li><a href="add_group.html">Add User Group</a></li>
			</ul>		
		</div>
		<div id="div_main">
		<div id="div_content" class="usergroup">
			<!--%%%%% Main block %%%%-->
			
			<h2>User Profile</h2>
			<table>
                <col width="15%">
                <col width="30%">
                <col width="30%">
                <col width="20%">
                <col width="5%">

                <tr>
                    <th>Title</th> 
                    <th>Name</th>
                    <th>Email</th>
                    <th>User Group</th>
                    <th>Disabled</th>
                    <th>Edit</th>
                    <th>Del</th>
                </tr>
                <?php
					$q = "SELECT * FROM user order by USER_ID";
					$result = $mysqli -> query($q);
					while($row=$result->fetch_array()){
						echo "<tr>";
						if($row['USER_TITLE']==1){
							$t="Mr.";
						}
						elseif($row['USER_TITLE']==2){
							$t="Mrs.";
						}
						elseif($row['USER_TITLE']==3){
							$t="Ms.";
						}
						echo "<td>".$t."</td>";	
						echo "<td>".$row['USER_FNAME']." ".$row['USER_LNAME']."</td>";
						echo "<td>".$row['USER_EMAIL']."</td>";		
						
						$g = "SELECT USERGROUP_NAME FROM usergroup where USERGROUP_ID='".$row['USER_GROUPID']."'";
						$re = $mysqli -> query($g);
						$ro=$re->fetch_array();
						$gn = $ro['USERGROUP_NAME'];
							
/* 						if($row['USER_GROUPID']==1){
							$a="Admin";
						}
						elseif($row['USER_GROUPID']==2){
							$a="Staff";
						}
						elseif($row['USER_GROUPID']==3){
							$a="Member";
						} */
						echo "<td>".$gn."</td>";		
						
						if($row['DISABLE'] == 0){
							echo "<td><input type='checkbox'></td>";
						}
						else{
							echo "<td><input type='checkbox' checked></td>";
						}
						echo "<td><img src='images/Modify.png' width='24' height='24'></td>";
						echo "<td><a href='del_user.php?delete_id=".$row['USER_ID']."'><img src='images/Delete.png' width='24' height='24'></a></td>";
						echo "</tr>";
					}
				?>
                    
                </tr>      
            </table>
			</div> <!-- end div_content -->
			<div id="div_right">
					
			</div>				
		</div> <!-- end div_main -->
		
		<div id="div_footer">  
			
		</div>
	</div>
</div>
</body>
</html>


