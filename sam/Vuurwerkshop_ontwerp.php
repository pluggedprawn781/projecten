<<?php
  include 'vuurwerkshopphp.php';


  if(isset($_POST["add_to_cart"]))
  {
    if(isset($_SESSION["shopping_cart"]))
    {
        $item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
        if(!in_array($_GET[id], $item_array_id))
        {
          $count = count($_SESSION["shopping_cart"]);
          $item_array = array (
        'item_id'       =>  $_GET["id"],
        'item_name'     =>  $_POST["hidden_name"],
        'item_price'    =>  $_POST["hidden_price"],
        'item_quantity' =>  $_POST["quantity"]
          );
          $_SESSION["shopping_cart"] [$count] = $item_array;
        }
        else
        {
          echo '<script>alert(alert("Item Already Added")</script>';
          echo '<script>window.location="index.php"</script>';

        }
    }
    else 
    {
      $item_array = array(
        'item_id'       =>  $_GET["id"],
        'item_name'     =>  $_POST["hidden_name"],
        'item_price'    =>  $_POST["hidden_price"],
        'item_quantity' =>  $_POST["quantity"]
      );
      $_SESSION["shopping_cart"][0] = $item_array;
    }
  }

if(isset($_GET["action"]))
{
  if($_GET["action"] == "delete")
  {
      foreach($_SESSION["shopping_cart"] as $keys => $values)
      {
        if($values["item_id"] == $_GET["id"])
        {
            unset($_SESSION["shopping_cart"] [$keys]);
            echo '<script>alert("Item Removed"</script';
            echo '<script>window.location="index.php"</script>';
        }
      }
  }
}
?>
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="vuurwerkshop.css">
  <link href="https://fonts.googleapis.com/css?family=Nunito|Titillium+Web" rel="stylesheet"> 
  <title>Vuurwerkshop</title>
</head>

<body>
<?php
$query = "select * FROM tbl_product ORDER BY id ASC";
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
  while($row = mysqli_fetch_array($result))
  {
    ?>            
    <div class="col-md-4"> 
      <form> method="post" action="index.php?action=add&id=<?php echo $row["id"]; ?> ""
      <div style=
        <img src="<?php echo $row["image"]; ?>" class="img-responsive"  /><br  />
        <h4 class="text-info"><?php echo $row["name"]; ?></h4>
        <h4 class="text-danger">$ <?php echo $row["price"];?></h4>
        <input type="text" name="quantity" class="from-control" value="1" />
        <input type="hidden" name="hidden_name" value="?php echo $row["name"]; ?>"  />
        <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>" />
        <input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-success" value="Add to Cart" />

    </div>
  </form>
</div>
    <?php
  }
}


?>
<div style="clear:both"></div>
<br />
<h3>Order Details</h3>
<div class="table-responsive">
  <table class="table table-bordered">
    <tr>
        <th width="40%">Item Name</th>
        <th width="10%">Quantity</th>
        <th width="20%">Price</th>
        <th width="15%">Total</th>
        <th width="5%">Action</th>
    </tr>
    <?php
      if(!empty($_SESSION["shopping_cart"]))
      {
          $total = 0;
          foreach($_SESSION["shopping_cart"] as $keys => $values)
          {

    ?>
    <tr>
      <td><?php echo $values["item_name"]; ?></td>
      <td><?php echo $values["item_quantity"]; ?></td>
      <td> $ <?php echo $values["item_price"]; ?></td>
      <td><?php echo number_format($values["item_quantity"] * $values["item_price"], 2); ?></td>
      <td><a href="index.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span class="text-danger">Remove</span></a></td>
    </tr>
    <?php
          $total = $total + ($values["item_quantity"] * $values["item_price"]);
          }
          ?>
            <tr>
              <td colspan="3" align="right">Total</td>
              <td align="right">$ <?php echo number_format($total, 2); ?></td>



            </tr>
          <?php
      }

    ?>






	 <div class="topnav">
  <a class="active" href="">Home</a>
  <a href="">Knalvuurwerk</a>
  <a href="">Siervuurwerk</a>
  <a href="">Hele assortiment</a>
</div> 
<br><br><br>
<div id="box1">
  <h1>Firevork vuurwerk</h1>
</div>
<br><br><br><br>
<div id="box2">
  <h3>ayyyyy</h3>
</div>
<div id="box3">
  <<div id="leftside">
    <div id="cobra6">
      <img src="https://static.webshopapp.com/shops/251250/files/180505415/image.jpg" id="leftpic">
      <h3>Cobra 6</h3>
    </div>
  </div>
  <div id="rightside">
    <div id="Nitraat">
      <img src="http://www.knalgoed.be/thumbnail/full/0d4c7aee3e91d35a37613a53b5633945.jpg" id="rightpic">
      <h3>Nitraat</h3>
    </div>
  </div>
  <div id="center">
    <div id="ThunderKing">
      <img src="https://anypos-sbo.o.auroraobjects.eu/2/article/31.1408952015.png" id="centerpic">
      <h3>Thunder King</h3>
    </div>
  </div>
</div>
</body>
</html>