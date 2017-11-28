<?php
	session_start();
	require_once('connect2.php');
	echo "<style>
		.tbs,.tbs td,.tbs th{
			border:1px solid black;
			border-collapse: collapse;
		}
	</style>";
	if(!isset($_GET['searchword']) || $_GET['searchword']==""){
?>

<!--Content-->

<form method="get" action="search.php">
	<select name="types">
		<option value="foods">foods</option>
		<option value="customers">customers</option>
		<option value="food_types">food_types</option>
	</select>
	<input type="text" placeholder="Search" name="searchword">
	<input type="submit" value="search">
</form>

<?php	
}else {
?>

	<form method="get" action="search.php">
		<select name="types">
			<option value="foods">foods</option>
			<option value="customers">customers</option>
			<option value="food_types">food_types</option>
		</select>
		<input type="text" placeholder="Search" name="searchword">
		<input type="submit" value="search">
	</form>

<?php
	if(isset($_GET['types']) && $_GET['types'] == "foods"){
		$searchword = $_GET['searchword'];
		echo "<table class='tbs'>";
		$q = "SELECT * FROM foods WHERE FoodName like '%".$searchword."%'";
		$result = $mysqli -> query($q);
		while($row=$result->fetch_array()){
			echo "<tr>";
			echo "<td>".$row['FoodCode']."</td>";
			echo "<td>".$row['FoodName']."</td>";
			echo "<td>".$row['FoodType']."</td>";
			echo "<td>".number_format($row['Price'])."</td>";
			echo "<td>".$row['FoodImageURL']."</td>";
			echo "</tr>";
		}
		echo "</table>";
	}
	if(isset($_GET['types']) && $_GET['types'] == "food_types"){
		$searchword = $_GET['searchword'];
		echo "<table class='tbs'>";
		$q = "SELECT * FROM food_types WHERE FoodType like '%".$searchword."%'";
		$result = $mysqli -> query($q);
		while($row=$result->fetch_array()){
			echo "<tr>";
			echo "<td>".$row['FoodType']."</td>";
			echo "<td>".$row['TypeName']."</td>";
			echo "</tr>";
		}
		echo "</table>";
	}
	if(isset($_GET['types']) && $_GET['types'] == "customers"){
		$searchword = $_GET['searchword'];
		echo "<table class='tbs'>";
		$q = "SELECT * FROM costomer WHERE CostomerName like '%".$searchword."%'";
		$result = $mysqli -> query($q);
		while($row=$result->fetch_array()){
			echo "<tr>";
			echo "<td>".$row['CostomerCode']."</td>";
			echo "<td>".$row['CostomerName']."</td>";
			echo "<td>".$row['BirthDate']."</td>";
			echo "</tr>";
		}
		echo "</table>";
	}
}
?>