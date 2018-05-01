<?php
	require_once CONFIG_PATH.'/config.php';

	$ordervalue = 'created_at';
	$curr_department = $_SESSION['department'];
	$sql_stmt = "SELECT * FROM ticket WHERE department = $curr_department ORDER BY $ordervalue";
    $result = mysqli_query($link, $sql_stmt);

	if (isset($_POST['submit'])) {
	    if(isset($_POST['radio']))
	    {
	        $ordervalue = $_POST['radio'];
	        $sql_stmt = "SELECT * FROM ticket WHERE department = $curr_department ORDER BY $ordervalue";
	        $result = mysqli_query($link, $sql_stmt);
	    }
	}
 ?>
<div class="container-fluid"><!-- <div> Index container-fluid åben -->
  <div class="row"><!-- <div> Index row åben -->
	  <?php include 'src/modules/vice_sidebar-menu.php'; ?>
	<div class="col-sm-8 offset-sm-1">
		<div class='row'>
			<div class='col-sm-12'>
				<form action="" method="post">
					<label>
						<input type="radio" name="radio"
						       value="created_at"  <?php echo ($ordervalue == 'created_at' ? 'checked=""' : ''); ?>>
						Nyeste
					</label>
					<label>
						<input type="radio"
						       name="radio"
						       value="priority" <?php echo ($ordervalue == 'priority' ? 'checked=""' : ''); ?>>
						Prioritet
					</label>
					<input type="submit" name="submit" value="Sorter efter" />
				</form>
			</div>
		</div>

    <?php
      if(mysqli_num_rows($result) >0):
        while ($row = mysqli_fetch_assoc($result)):
		$date = date_create($row['created_at']);
		if($row['priority'] == 'a'){
            $bubble_color = 'red';
		}elseif ($row['priority'] == 'b'){
            $bubble_color = 'yellow';
		}else{
            $bubble_color = 'green';
		}

     ?>
		<a href="src/ticket_view.php?ticket=<?php echo $row['ticket_id']; ?>" class="ticket__link">
       <div class="row">
         <div class="ticket">
	           <div class='ticket__wrapper--left'>
		           <h2 class='ticket__address'>Lejlighed: <?php echo $row['address'] ?></h2>
		           <div class='ticket__beskrivelse'>
			           <p class="ticket__text">Beskrivelse: <?php echo $row['beskrivelse_text']; ?></p>
		           </div>
	           </div>
	           <div class='ticket__wrapper--right'>
		           <div class='ticket__prioritering'>Prioritering <div class='ticket__bubble <?php echo $bubble_color?>'></div></div>
		           <div class='ticket__afdeling'>Afdeling: <?php echo $row['department']; ?></div>
		           <div class='ticket__date'> <?php echo date_format($date, 'd/m/y'); ?></div>
	           </div>

         </div>
       </div>
		</a>
        <?php
            endwhile;
            endif; ?>
	</div> <!-- <div> Index row luk -->
</div>
</div><!-- Index container-fluid luk -->
<?php mysqli_close($link); ?>
