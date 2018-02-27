<?php
if (empty($project)) {
	return;
}

$slider_id = 'slider-'.$project['id'];

$query = $db->prepare('SELECT * FROM project_pictures WHERE project_id = :project_id ORDER BY sort ASC, date DESC');
$query->bindValue('project_id', $project['id'], PDO::PARAM_INT);
$query->execute();
$project_pictures = $query->fetchAll();

$count_project_pictures = count($project_pictures);
//echo debug($projects);
?>
		<div class="modal-content">
			<div class="close-modal" data-dismiss="modal">
				<div class="lr">
					<div class="rl">
					</div>
				</div>
			</div>
			<div class="container">
				<div class="row">
					<div class="col-lg-8 col-lg-offset-2">
						<div class="modal-body">

							<?php if (!empty($project['logo'])) { ?>
							<img src="img/portfolio/projects/<?= $project['logo'] ?>" class="img-centered modal-picture" alt="">
							<?php } ?>

							<h2><?= getTitle($project['title']) ?></h2>
							<hr class="star-primary">
							<?php if ($count_project_pictures === 0) { ?>
							<img src="<?= getPicture($project['picture']) ?>" class="img-responsive img-centered modal-picture" alt="">
							<?php } else { ?>
							<div id="<?= $slider_id ?>" class="carousel slide" data-ride="carousel">

								<!-- Bullets -->
								<ol class="carousel-indicators">
									<?php for ($i = 0; $i < $count_project_pictures; $i++) { ?>
									<li data-target="#<?= $slider_id ?>" data-slide-to="<?= $i ?>" class="<?= $i === 0 ? 'active' : '' ?>"></li>
									<?php } ?>
								</ol>

								<!-- Slides -->
								<div class="carousel-inner" role="listbox">
									<?php foreach($project_pictures as $key => $project_picture) { ?>
									<div class="item<?= $key === 0 ? ' active' : '' ?>">
										<img src="img/portfolio/projects/<?= $project_picture['src'] ?>" alt="<?= $project_picture['alt'] ?>">
										<div class="carousel-caption">
											<?= $project_picture['desc'] ?>
										</div>
									</div>
									<?php } ?>
								</div>

								<!-- Controls -->
								<a class="left carousel-control" href="#<?= $slider_id ?>" role="button" data-slide="prev">
									<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
									<span class="sr-only">Précédent</span>
								</a>
								<a class="right carousel-control" href="#slider-<?= $project['id'] ?>" role="button" data-slide="next">
									<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
									<span class="sr-only">Suivant</span>
								</a>
							</div>
							<?php } ?>

							<p>
								<?= getDescription($project['description']) ?>
							</p>

							<ul class="list-inline item-details">
								<li>Client: <strong><a href=""><?= $project['client'] ?></a></strong>
								</li>
								<li>Date:
									<strong><a href=""><?= getProjectFormattedDate($project['date'], '%B %Y') ?></a></strong>
								</li>
								<li>Service:
									<strong>
									<?= getTagsLinks($project['tags']) ?>
									</strong>
								</li>
							</ul>
							<button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Fermer</button>
						</div>
					</div>
				</div>
			</div>
		</div>