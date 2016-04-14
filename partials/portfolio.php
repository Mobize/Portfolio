
		<div class="container">
			<div class="row">
				<div class="col-lg-12 text-center">
					<h2>Portfolio</h2>
					<hr class="star-primary">
				</div>
			</div>
			<div class="row">

				<?php
				foreach($projects as $key => $project) {
				?>
				<div class="col-sm-4 portfolio-item">
					<a href="#portfolioModal<?= $project['id'] ?>" class="portfolio-link" data-toggle="modal">
						<div class="caption">
							<div class="caption-content">
								<i class="fa fa-search-plus fa-3x"></i>
							</div>
						</div>
						<img src="img/portfolio/<?= $project['picture'] ?>" class="img-responsive" alt="">
					</a>
				</div><!-- .porfolio-item -->
				<?php } ?>

			</div>
		</div>