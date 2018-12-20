<?php
include 'connect.php';
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="main.css">
    <title>firevork vuurwerkshop</title>
      </head>
      <body>
        <center>
          <h2>firevork vuurwerkshop</h2>
        </center>
        <section>
          <ul>
            <li><a href="/projecten/project-2-vuurwerk/vuurwerk_shop.php">Home</a></li>
            <li><a href="/projecten/project-2-vuurwerk/knal.php">Knalvuurwerk</a></li>
            <li><a href="/projecten/project-2-vuurwerk/sier.php">Siervuurwerk</a></li>
            <li><a href="/projecten/project-2-vuurwerk/pakketten.php">pakketten</a></li>
          </ul>
        </section>
      
      <?php
        $query = "SELECT * FROM tblproduct WHERE Soort = 'knallers' ORDER BY price ASC";
        $result = mysqli_query($connect, $query);
        while($row = mysqli_fetch_array($result))
        {
      ?>
       <div class="display">
        <center>
         <form method="post" action="">
            <div class="item">
              <img src="<?php echo $row["image"]; ?>" >
              <h4><?php echo $row["name"]; ?></h4>
              <h4>&euro;<?php echo $row["price"]; ?></h4>
              <input class="aantal" type="text" name="quantity" value="1"><br><br>
              <input class="addto" type="submit" name="in winkelwagen" value="in winkelwagen">
            </div>
         </form>
         <center>
       </div>
       <?php
        }
       ?>
      <div class="bottom-list">
        <ul>
          <li><a class="active" href="html_opdracht4.htm">FAQ</a></li>
          <li><a href="#">Contact</a></li>
        </ul>
      </div>
    <footer>martijn van der waal    versie 1.0</footer>
  </body>
</html>
