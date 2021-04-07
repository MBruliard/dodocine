<?php
	/**
	 * @file elements/footer.php
	 * @brief Template de fin de page HTML
	 * @author Nahida BENHAFFAF
	 * @author Margaux BRULIARD
	 * @date 11 mars 2021
	 */	
?>


			</div> <!-- fin base container -->
			
			<footer id="sticky-footer" class="bg-dark footer-dark">
				<div class="container my-auto">
			  		<div class="copyright text-center my-auto">
			    		<span>Copyright &copy; L3 Informatique USPN - 2021</span>
			  		</div>
				</div>
			</footer>

			<!-- Bootstrap core JavaScript-->
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
			
			<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
			<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
			<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>


			<?php 
				if (isset($js_addon)) {
					echo $js_addon;
				}
			?>
		</div> <!-- page-container -->
	</body>

</html>