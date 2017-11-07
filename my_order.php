<?PHP
  session_start();
    include("connect.php");
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
      $uid = $_SESSION['uid'];
    }
    $layout_header->set('title','Order list : IT Online Shopping website');
    echo $layout_header->output();
?>
<div class='user_full'>
  <div class='user_left'>
    <table class='user_menu'>
      <tr>
        <th>
          My account
        </th>
      </tr>
      <tr>
        <td>
          <a href='my_account.php'>My infomation</a>
        </td>
      </tr>
      <tr>
        <td>
          <a href='cart.php?cartfull=1'>My cart</a>
        </td>
      </tr>
      <tr>
        <td class='active'>
          <a href='my_order.php'>Order list</a>
        </td>
      </tr>
      <?php if ($_SESSION['type'] != "admin") { ?>
      <tr>
        <td>
          <a href="my_message.php">My message</a>
        </td>
      </tr>
      <?php } ?>
      <tr>
        <td>
          <a href='logout.php'>Logout</a>
        </td>
      </tr>
    </table>
  </div>
  <div class='ucart_right'>
    <form class="form_input" method="post" action="process.php">
      <div class="ucart_box" style="max-width: 1000px;">
        <h3>Confirm Order</h3>
        <table class="order_tb" width="100%">
          <tr>
            <th>Order id</th>
            <th>Order date</th>
            <th>Products</th>
            <th>Cost</th>
            <th>Status</th>
          </tr>
      <?PHP
      	
      		$sql	= "select user_order.*,status.status_Name from user_order,status where user_id = $uid and user_order.status_id = status.status_id";
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
                        echo "<p>".trim($first)."<span style='float:right;'>".trim($second)." x ".trim($last)."</span></p>";
                      }
                    }
                }
                
              ?>
            </td>
            <td><?php echo number_format($row['order_cost']); ?></td>
            <td><?php echo $row['status_Name']; ?></td>
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