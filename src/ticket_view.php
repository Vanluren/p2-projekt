<?php
require_once '../config/config.php';
include 'modules/header.php';


    $ticket_id = $_GET['ticket'];
    $sql_stmt="SELECT * from ticket WHERE ticket_id = $ticket_id";




    $result = mysqli_query($link, $sql_stmt);
    $row = mysqli_fetch_assoc($result);
?>

    <div class="container-fluid"><!-- <div> Index container-fluid åben -->
      <div class="row"><!-- <div> Index row åben -->
    		<!-- Sidebar menu -->
    	<?php include 'modules/vice_sidebar-menu.php'; ?>
    	<!-- Sidebar luk -->
    	<div class="col-sm-9 offset-sm-1">
		    <div class="ticket-view">
			    <div class='container'>
				    <div class='row'>
					    <div class='row'>
						    <div class='col-12'>
							    <h2 class='ticket-view__header'>Oplysninger</h2>
						    </div>
					    </div>
					    <div class='row'>
						    <div class='col-6'>
							    <span class="ticket__date"><?php echo $row['created_at'] ?></span>
							    <span class="ticket__header">Navn: <?php echo $row['name'] ?></span>
							    <span class="ticket__header">Telefon: <?php echo $row['contact_phone'] ?></span>
							    <span class="ticket__header">Email: <?php echo $row['contact_email'] ?></span>
						    </div>
						    <div class='col-4 offset-1'>
							    <span class="ticket__header">Afdeling: <?php echo $row['department'] ?></span>
							    <span class="ticket__header">Lejlighed: <?php echo $row['address'] ?></span>
							    <span class="ticket__header">Prioritering: <?php echo $row['priority'] ?></span>
							    <span class="ticket__header">Lokalisering: <?php echo $row['location'] ?></span>
						    </div>
					    </div>
				    </div>
				    <div class='row'>
					    <div class='row'>
						    <div class='col-12'>
							    <h2 class='ticket-view__header'>Beskrivelse</h2>
						    </div>
					    </div>
					    <div class='row'>
						    <div class='col-10'>
							    <p class="ticket__text"><?php echo $row['beskrivelse_text']; ?></p>
						    </div>
					    </div>
				    </div>
				    <div class='row'>
					    <div class='row'>
						    <div class='col-12'>
							    <h2 class='ticket-view__header'>Billeder</h2>
						    </div>
					    </div>
					    <div class='row'>
						    <div class='col-4'>
							    <div class='ticket-view_image'>
								    <img src="http://via.placeholder.com/350x150">
							    </div>
						    </div>
						    <div class='col-4'>
							    <div class='ticket-view_image'>
								    <img src="http://via.placeholder.com/350x150">
							    </div>
						    </div>
						    <div class='col-4'>
							    <div class='ticket-view_image'>
								    <img src="http://via.placeholder.com/350x150">
							    </div>
						    </div>
					    </div>
				    </div>
				    <div class='row'>
					    <div class='col-4 offset-8'>
						    <div class='btn btn-secondary'>Tilbage</div>
						    <div class='btn btn-success'>Afslut Opgave</div>
					    </div>
				    </div>
			    </div>
		    </div>
	    </div>
      </div>
    </div>
<?php
include 'modules/footer.php';
 ?>
