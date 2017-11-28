<?php
  session_start();
  require_once('connect.php');
  include("template.class.php");
  if(!isset($_SESSION['username']))
  {
    $user_login = false;
    $layout_header = new Template("layout_header.tpl");
    $layout_footer = new Template("layout_footer.tpl");
    echo $layout_header->output();
    echo "<br><p>You don't permission to use this page.</p>";
    echo $layout_footer->output();
    exit();
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
      echo $layout_header->output();
      echo "You don't permission to use this page.";
      echo $layout_footer->output();
      exit();
    }
  }
    $layout_header->set('title','Order list : IT Online Shopping website');

    echo $layout_header->output();
?>
<div class='user_full'>
  <div class='user_left'>
    <table class="user_menu">
      <tr>
        <th>
          Admin page
        </th>
      </tr>
      <tr>
        <td>
          <a href="admin.php">Product management</a>
        </td>
      </tr>
      <tr>
        <td>
          <a href="admin_add_product.php">Add Product</a>
        </td>
      </tr>
      <tr>
        <td class="active">
          <a href="admin_check_order.php">User Orders</a>
        </td>
      </tr>
      <tr>
        <td>
          <a href="admin_user.php">User management</a>
        </td>
      </tr>
      <tr>
        <td>
          <a href="contact_read.php">View Messages</a>
        </td>
      </tr>
    </table>
  </div>
  <div class='ucart_right'>
    <form class="form_input" method="post" action="process.php">
      <div class="ucart_box" style="max-width: 1000px;">
        <h3>User Orders</h3>
        <table class="order_tb admin_order" width="100%">
          <tr>
            <th>Order id</th>
            <th>Order date</th>
            <th>Products</th>
            <th>Shipping to</th>
            <th>Status</th>
          </tr>
      <?PHP
      	
      		$sql	= "select user_order.*,status.status_Name from user_order,status where user_order.status_id = status.status_id";
      		$result = $mysqli->query($sql) or die("error=$sql");
          while($row=$result->fetch_array()){
      ?>
          <tr>
            <td><?php echo $row['order_id']; ?></td>
            <td>
              <?php 
                echo  $row['order_datetime'];
              ?>              
            </td>
            <td>
              <?php 
                $nline_pros = explode("@",$row['order_pros']);
                foreach ($nline_pros as $value) {
                  if(trim($value) != ""){
                    list($first,$second,$last) = explode("?", $value);
                    if($first != "" && $second != "" && $last != ""){
                      echo "<p>".trim($first)."<span style='float:right;'>".trim($second)." x ".trim($last)."</span></p><br>";
                    }
                  }
                }
                
              ?>
            </td>
            <td>
              <?php 
                $nline_ship = explode("^",$row['order_to']);
                foreach ($nline_ship as $value) {
                  if(trim($value) != ""){
                    echo $value."<br>";
                  }
                }
              ?>               
             </td>
            <td style="text-align: left;">
              <select style="margin-left: 0px;width: 100%" class="sortby_tool" onchange="location = value;" style="width: 100%;">
                <option value="admin_status_order.php?ostatus=1&oid=<?php echo $row['order_id']; ?>" <?php if($row['status_id']==1){echo "selected";} ?> >order receive</option>
                <option value="admin_status_order.php?ostatus=2&oid=<?php echo $row['order_id']; ?>" <?php if($row['status_id']==2){echo "selected";} ?> >prepare & package</option>
                <option value="admin_status_order.php?ostatus=3&oid=<?php echo $row['order_id']; ?>" <?php if($row['status_id']==3){echo "selected";} ?> >delivered</option> 
              </select>
            </td>
          </tr>
      <?PHP
      	}
      ?>
        </table>
      </div>
    </form>
    <div class='clear'></div>
  </div>
  <div class='clear'></div>
<?php
  echo $layout_footer->output();
?>
<script type="text/javascript">
    $('.confirmation').on('click', function () {
        return confirm('Are you sure?');
    });
</script> 