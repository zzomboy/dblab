<?php include("connect.php"); ?>
<link href="style.css" rel="stylesheet" type="text/css" />
<script type="text/JavaScript">
<!--
function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}
//-->
</script>
<table width="600" border="0" align="center" cellpadding="0" cellspacing="1" 
class="square">
  <tr>
    <td colspan="4" align="right" bgcolor="#F7F7F7">
	<form id="form1" name="form1" method="post" action="">
        <select name="menu1" onchange="MM_jumpMenu('parent',this,0)">
		<option value="?"<?PHP if(empty($_GET['c_id'])){echo 'selected="selected"';} ?>>All</option>
	 <?PHP
	  $sqlc 	= "select * from category";
	  $queryc	= mysql_query($sqlc) or die("error=$sqlc");
	  $numc 	= mysql_num_rows($queryc);
	  for($i=1;$i<=$numc;$i++)
	  {
	  	$rowc = mysql_fetch_array($queryc);
	  ?>
        <option value="?c_id=<?PHP echo $rowc['c_id']?>" <?PHP if(@$_GET['c_id']==$rowc['c_id']){echo 'selected="selected"';} ?>> <?PHP echo $rowc['c_name']?></option>
        <?PHP
	  }
	  ?>
    </select>
    </form>
    </td>
  </tr>
  <tr>
    <td width="91" align="center" bgcolor="#CCCCCC"><strong>image</strong></td>
    <td width="401" align="center" bgcolor="#CCCCCC"><strong>name</strong></td>
    <td width="44" align="center" bgcolor="#CCCCCC"><strong>price</strong></td>
    <td width="57" align="center" bgcolor="#CCCCCC"><strong>view</strong></td>
  </tr>
  <?PHP
  include("connect.php");
  $c_id 		= @$_GET['c_id'];
  $str			= !empty($c_id)?" where  c_id=$c_id":"";
  $sql			= "select * from product $str order by p_id desc";
  $query 		= mysql_query($sql) or die("error=$sql");
  $num			= mysql_num_rows($query);
  for($i=1;$i<=$num;$i++)
  {
  	$row	= mysql_fetch_array($query);
  ?>
  <tr>
    <td align="center">
	<?PHP 
	if(file_exists("img/{$row['p_id']}.jpg"))
	{
	?>
	<img src="img/<?PHP echo $row['p_id']?>.jpg" width="80" border="0">	
	<?PHP
	}
	?>
	</td>
    <td align="left"><?PHP echo $row['p_name']?></td>
    <td align="center"><?PHP echo $row['p_price']?></td>
    <td align="center"><a href="product_detail.php?p_id=<?PHP echo $row['p_id']?>">view</a></td>
  </tr>
  <?
  }
  ?>
</table>
