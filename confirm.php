<?PHP
  session_start();
    include("connect.php");
  	if(!isset($_SESSION['cart'])){
      $_SESSION['cart']=[]; 
    }
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
    $layout_header->set('title',' Confirm Order : IT Online Shopping website');
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
        <td class='active'>
          <a href='cart.php?cartfull=1'>My cart</a>
        </td>
      </tr>
      <tr>
        <td>
          <a href='my_order.php'>Order list</a>
        </td>
      </tr>
      <tr>
        <td>
          <a href='logout.php'>Logout</a>
        </td>
      </tr>
    </table>
  </div>
  <div class='ucart_right'>
    <form class="form_input" method="post" action="process.php">
      <div class="ucart_box">
        <h3>Confirm Order</h3>
        <table class="ucart_tb" width="100%">
          <tr>
            <th>Product</th>
            <th>Price</th>
            <th>Qty</th>
            <th>total/product</th>
          </tr>
      <?PHP
      	$total=0;
      	foreach($_SESSION['cart'] as $pid=>$qty)
      	{
      		$sql	= "select * from product where pro_id=$pid";
      		$result = $mysqli->query($sql) or die("error=$sql");
      		$row  = $result->fetch_array();
      		$sum	= $row['pro_psale']*$qty;
      		$total += $sum;
      ?>
          <tr>
            <td><?php echo $row['pro_name']; ?></td>
            <td><?php echo number_format($row['pro_psale']); ?></td>
            <td><?php echo number_format($qty); ?></td>
            <td><?php echo number_format($sum); ?></td>
          </tr>
      <?PHP
      	}
      ?>    
          <tr>
            <td colspan="3" style="text-align: right;padding-right: 8px">Total</td>
            <td><?php echo number_format($total) ?></td>
          </tr>
        </table>
      <?php
        $username = $_SESSION['username'];
        $q  = "select user_recip,user_rtel,user_addr from user where user_id = '$uid'";
        $result = $mysqli->query($q);
        if(!$result){
          echo "Error on : $q";
        }
        else{
          $row=$result->fetch_array();
        }
      ?>
        <table class="user_contact" style="margin: 10px 0px 0px 0px">
          <tr>
            <th>Address</th>
            <th></th>
          </tr>
          <tr>
            <td>
              Recipient`s name : 
            </td>
            <td>
              <input type="text" name="urecip" value="<?php echo $row['user_recip']; ?>" required>
            </td>
          </tr>
          <tr>
            <td>
              Mobile Phone : 
            </td>
            <td>
              <input type="text" name="urtel" value="<?php echo $row['user_rtel']; ?>" required>
            </td>
          </tr>
          <tr>
            <td>
              Address : 
            </td>
            <td>
              <textarea class="input_addr" rows="5" name="uaddr" required><?php echo $row['user_addr']; ?></textarea>
            </td>
          </tr>
        </table>
        <input type="submit" class='confirmation cartbt' name="Submit2" value="checkout" />
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