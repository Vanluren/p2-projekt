<!-- Begin footer -->
<footer class="footer__wrapper">
	<div class='container-fluid'>
            <?php if ($_SESSION['user-type'] == 'beboer'): ?>
			<div class='col-12'>
            <?php else: ?>
            <div class='col-10 offset-2'>
            <?php endif; ?>
			<div class="footer__adrress-wrapper">
				<p class="footer__text text-center">
					Nørresundby Boligselskab
					Vesterbro 102
					9000  Aalborg
					Tlf. 96 32 40 70
					Fax. 98 19 15 77
					info@nrsbbolig.dk
				</p>
			</div>
		</div>
	</div>
</footer>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
<script rel='application/javascript' src="<?php echo JS_PATH?>/app.compiled.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
</body>
</html>
