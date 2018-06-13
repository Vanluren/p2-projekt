<div class="container-fluid"><!-- <div> Index container-fluid åben -->
  <div class="container">
      <?php include 'modules/beboer_menu.php'; ?>
  </div>
	<?php include_once 'modules/footer.php'?>
</div><!-- Index container-fluid luk -->
<!-- Modal -->
<div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="confirmModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="confirmModalLabel">Bekræftelse på modtagelse</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<p>Din henvendelse er blevet sendt til viceværten.
					Du vil blive kontaktet af din vicevært snarest.</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary" data-dismiss="modal">Ok</button>
			</div>
		</div>
	</div>
</div>