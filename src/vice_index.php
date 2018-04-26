<?php

$curr_department = $_SESSION['department'];
$sql_stmt = "SELECT * FROM ticket WHERE department = $curr_department";
$lejlighed_num = 0;

include_once 'config.php';

    $result = mysqli_query($link, $sql_stmt);

 ?>


<div class="container-fluid"><!-- <div> Index container-fluid åben -->
  <div class="row"><!-- <div> Index row åben -->
		<!-- Sidebar menu -->
	<?php include 'src/modules/vice_sidebar-menu.php'; ?>
	<!-- Sidebar luk -->
	<div class="col-sm offset-sm-1">

    <?php
      if(mysqli_num_rows($result) >0):
        while ($row = mysqli_fetch_assoc($result)):.
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
