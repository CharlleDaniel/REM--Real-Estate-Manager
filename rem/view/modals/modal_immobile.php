<section>
	<div class="modal" id="modal_immobile">
		<div class="modal-dialog">
			<div class="modal-content" ng-controller="PostImmobileController">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"aria-hidden="true">&times;</button>
					<h4 class="modal-title">
						<i class="fa fa-home"></i> Cadastro de Imóveis
					</h4>
				</div>

				<div class="modal-body" >
					<div id="message3" style="color: red; text-align: center; font-size: 18px"></div>
					<br>
					<form  id="form_immobile" >
						<!-- Nome -->
						<div class="col-md-12">
							<div class="form-group">
								<label>Imóvel*</label>
								<div>
									<input class="form-control" type="text" ng-model="immobile.immobile">
								</div>
							</div>
						</div>

						<!-- RG -->
						<div class="col-md-6">
							<div class="form-group">
								<label>Endereço*</label>
								<div>
									<input class="form-control"  type="text" ng-model="immobile.address">
								</div>
							</div>
						</div>

						<!-- RG -->
						<div class="col-md-6"  ng-controller="ClientsController">
							<div class="form-group">
								<label>Proprietário*</label>
								<div>
									<select class="form-control" ng-model="immobile.owner" ng-options="c.id as c.name for c in clients"></select>
								</div>
							</div>
						</div>

						<!-- RG -->
						<div class="col-md-6">
							<div class="form-group">
								<label>Valor do Aluguel*</label>
								<div>
									<input class="form-control"  type="number" step="0.01" min="0.01" ng-model="immobile.rentValue">
								</div>
							</div>
						</div>

						<!-- RG -->
						<div class="col-md-6">
							<div class="form-group">
								<label>Valor - Avaliado*</label>
								<div>
									<input class="form-control"  type="number" step="0.01" min="0.01" ng-model="immobile.valuedValue">
								</div>
							</div>
						</div>

						<!-- CPF -->
						<div class="col-md-12">
							<div class="form-group">
								<label>Descrição*</label>
								<div>
									<textarea  rows="1" cols="" class="form-control" ng-model="immobile.description"></textarea>
								</div>
							</div>
						</div>
					</form>
					<br>
					<br>
					<br>
					<br>
					<br>
					<br>
					<br>
					<br>
					<br>
					<br>
					<br>
					<br>
				</div>
				<br>
				<br>
				<br>
				<div class="modal-footer clearfix">
					<button type="button" class="btn btn-primary pull-right" ng-click="postImmobile()">
						<i class="fa fa-home"></i> Cadastrar
					</button>
				</div>


			</div>
		</div>
	</div>
</section>