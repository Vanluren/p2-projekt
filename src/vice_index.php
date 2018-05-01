<?php
$ordervalue = 'created_at';
$curr_department = $_SESSION['department'];
$sql_stmt = "SELECT * FROM ticket WHERE department = $curr_department ORDER BY $ordervalue";

require_once CONFIG_PATH.'/config.php';

    $result = mysqli_query($link, $sql_stmt);
 ?>
<div class="container-fluid"><!-- <div> Index container-fluid åben -->
  <div class="row"><!-- <div> Index row åben -->
		<!-- Sidebar menu -->
	<?php include 'src/modules/vice_sidebar-menu.php'; ?>
	<!-- Sidebar luk -->

	<div class="col-sm offset-sm-1">

    <form action="" method="post">
    <input type="radio" name="radio" value="created_at">Nyeste
    <input type="radio" name="radio" value="priority">Prioritet
    <input type="submit" name="submit" value="Sorter efter" />
    </form>

    <?php
    if (isset($_POST['submit'])) {
      if(isset($_POST['radio']))
      {
        $ordervalue = $_POST['radio'];
        $sql_stmt = "SELECT * FROM ticket WHERE department = $curr_department ORDER BY $ordervalue";
        $result = mysqli_query($link, $sql_stmt);
      }
    }
?>

    <?php
      if(mysqli_num_rows($result) >0):
        while ($row = mysqli_fetch_assoc($result)):

     ?>
     <a href="src/ticket_view.php?ticket=<?php echo $row['ticket_id']; ?>">
       <div class="row">
         <div class="ticket">
           <div class="col">
             <span class="ticket__date"><?php echo $row['created_at'] ?></span>
             <span class="ticket__header">Afdeling: <?php echo $row['department'] ?></span>
             <span class="ticket__header">Lejlighed: <?php echo $row['address'] ?></span>
             <p class="ticket__text"><?php echo $row['beskrivelse_text']; ?></p>
           </div>
         </div>
       </div>
     </a>
   <?php endwhile;
 endif;?>
	</div> <!-- <div> Index row luk -->
</div>
</div><!-- Index container-fluid luk -->
<?php mysqli_close($link); ?>
