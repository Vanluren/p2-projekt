<?php


include_once 'config.php';

include 'modules/header.php';

    $ticket_id = $_GET['ticket'];
    $sql_stmt="SELECT * from ticket WHERE ticket_id = $ticket_id";




    $result = mysqli_query($link, $sql_stmt);


?>

    <div class="container-fluid"><!-- <div> Index container-fluid åben -->
      <div class="row"><!-- <div> Index row åben -->
    		<!-- Sidebar menu -->
    	<?php include 'src/modules/vice_sidebar-menu.php'; ?>
    	<!-- Sidebar luk -->
    	<div class="col-sm offset-sm-1">

        <?php
            $row = mysqli_fetch_assoc($result);
         ?>


    <div class="row">
      <div class="ticket">
        <div class="col">
          <span class="ticket__date"><?php echo $row['created_at'] ?></span>
          <span class="ticket__header">Afdeling: <?php echo $row['department'] ?></span>
          <span class="ticket__header">Lejlighed: <?php echo $row['address'] ?></span>
          <span class="ticket__header">Navn: <?php echo $row['name'] ?></span>
          <span class="ticket__header">Telefon: <?php echo $row['contact_phone'] ?></span>
          <span class="ticket__header">Email: <?php echo $row['contact_email'] ?></span>
          <span class="ticket__header">Prioritering: <?php echo $row['priority'] ?></span>
          <span class="ticket__header">Lokalisering: <?php echo $row['location'] ?></span>
          <p class="ticket__text"><?php echo $row['beskrivelse_text']; ?></p>
        </div>
      </div>
    </div>

<?php

// var_dump($TICKET_ID);

include 'modules/footer.php';
 ?>
