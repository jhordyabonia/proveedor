<div class="col-md-12">
	<nav class="text-center">
	  <?php if ($paginacion): ?>
	  <ul class="pagination">
		<!-- <li>
			<a href="#" aria-label="Previous">
				<span aria-hidden="true">&laquo;</span>
			</a>
		</li> -->
		<?php foreach ($paginacion as $pagina): ?>
			<li>
				<a href="<?php echo $pagina['url'] ?>"><?php echo $pagina['numero'] ?></a>
			</li>
		<?php endforeach ?>
		<!-- <li>
			<a href="#" aria-label="Next">
				<span aria-hidden="true">&raquo;</span>
			</a>
		</li> -->
	  </ul>
	  <?php endif ?>
	</nav>
</div>