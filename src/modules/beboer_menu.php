<div class="row">
	<div class='col-12'>
		<div class="alert alert-warning" role="alert">
			Hvis din henvendelse er akut, bedes du kontakte din vicevært direkte pr. telefon på: <?php echo $GLOBALS['vice-tlf'];?>
		</div>
	</div>
  <div class="col-sm-4 offset-sm-4">
    <div class="beboer-menu__wrapper">
      <div class="row">
        <div class="col-sm-12">
          <a href="src/anmeld_skade.php" class="beboer-menu__link">
            <div class="beboer-menu__item">
              <h2>Anmeld Skade</h2>
            </div>
          </a>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-12">
          <a href="#" class="beboer-menu__link">
            <div class="beboer-menu__item">
              <h2>Anmeld Klage</h2>
            </div>
          </a>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-12">
          <a href="#" class="beboer-menu__link" data-toggle="modal" data-target="#avavavModal">
            <div class="beboer-menu__item">
              <h2>Status på henvendelse</h2>
            </div>
          </a>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-12">
          <a href="#" class="beboer-menu__link" data-toggle="modal" data-target="#avavavModal">
            <div class="beboer-menu__item">
              <h2>FAQ</h2>
            </div>
          </a>
        </div>
      </div>
	    <div class="row">
		    <div class="col-sm-12">
			    <a href="<?php echo ROOT_PATH?>src/logout.php" class="btn btn-danger">
				    Log ud
			    </a>
		    </div>
	    </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade ticket-modal" id="avavavModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-body">
				Dette er stadig under konstruktion, beklager!
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary" data-dismiss="modal">Ok</button>
			</div>
		</div>
	</div>
</div>
