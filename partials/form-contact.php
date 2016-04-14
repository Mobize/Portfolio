
		<div class="container">
			<div class="row">
				<div class="col-lg-12 text-center">
					<h2>Contactez-moi !</h2>
					<hr class="star-primary">
				</div>
			</div>
			<div class="row">
				<div class="col-lg-8 col-lg-offset-2">

					<form name="form-contact" id="form-contact" novalidate>
						<div class="row control-group">
							<div class="form-group col-xs-12 floating-label-form-group controls">
								<label>Nom</label>
								<input type="text" class="form-control" placeholder="Nom" id="name" required data-validation-required-message="Merci d'indiquer votre nom">
								<p class="help-block text-danger"></p>
							</div>
						</div>
						<div class="row control-group">
							<div class="form-group col-xs-12 floating-label-form-group controls">
								<label>Email</label>
								<input type="email" class="form-control" placeholder="Email" id="email" required data-validation-required-message="Merci de renseigner un email valide">
								<p class="help-block text-danger"></p>
							</div>
						</div>
						<div class="row control-group">
							<div class="form-group col-xs-12 floating-label-form-group controls">
								<label>Téléphone</label>
								<input type="tel" class="form-control" placeholder="Téléphone" id="phone">
								<p class="help-block text-danger"></p>
							</div>
						</div>
						<div class="row control-group">
							<div class="form-group col-xs-12 floating-label-form-group controls">
								<label>Message</label>
								<textarea rows="5" class="form-control" placeholder="Message" id="message" required data-validation-required-message="Votre message est vide"></textarea>
								<p class="help-block text-danger"></p>
							</div>
						</div>
						<br>
						<div id="success"></div>
						<div class="row">
							<div class="form-group col-xs-12">
								<button type="submit" class="btn btn-success btn-lg">Envoyer</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>