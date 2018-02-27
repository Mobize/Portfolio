<?php
$query = $db->query('SELECT * FROM projects ORDER BY date DESC');
$projects = $query->fetchAll();

//echo debug($projects);
?>
	<!-- Portfolio Section -->
	<section id="portfolio">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 text-center">
					<h2>Portfolio</h2>
					<hr class="star-primary">
				</div>
			</div>
			<div class="row">

				<?php foreach($projects as $project) { ?>
				<div class="col-sm-4 portfolio-item">
					<a href="#portfolio-modal-<?= $project['id'] ?>" class="portfolio-link" data-toggle="modal">
						<div class="caption">
							<div class="caption-content">
								<i class="fa fa-search-plus fa-3x"></i>
							</div>
						</div>
						<img src="<?= getPicture($project['picture']) ?>" class="img-responsive" alt="">
					</a>
				</div><!-- .portfolio-item -->
				<?php } ?>

			</div>
		</div>
	</section>

	<!-- Portfolio Modals -->
	<?php foreach($projects as $key => $project) { ?>
	<div id="portfolio-modal-<?= $project['id'] ?>" class="portfolio-modal modal fade" tabindex="<?= $key ?>" role="dialog" aria-hidden="true">
		<?php include 'partials/project-modal.php' ?>
	</div>
	<?php } ?>