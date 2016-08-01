<section>
	<div class="modal" id="modal_immobile_update" >
		<div class="modal-dialog"  ng-controller="GetImmobileValuesController">
			<div class="modal-content" ng-controller="UpdateImmobileController as update">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"aria-hidden="true">&times;</button>
					<h4 class="modal-title">
						<i class="fa fa-home"></i> Atualização do Imóvel
					</h4>
				</div>

				<div class="modal-body">
					<div id="messageUpdate" style="color: red; text-align: center; font-size: 18px"></div>
					<br>
					<form id="form_immobile_update"  >
						<div class="col-md-12" style="display:none">
							<div class="form-group">
								<div >
									<input class="form-control" type="text" ng-model="id" value="{{id}}">
								</div>
							</div>
						</div>
						<!-- Nome -->
						<div class="col-md-12">
							<div class="form-group">
								<label>Imóvel*</label>
								<div >
									<input class="form-control" type="text" ng-model="immobile" value="{{immobile}}">
								</div>
							</div>
						</div>

						<!-- RG -->
						<div class="col-md-6">
							<div class="form-group">
								<label>Endereço*</label>
								<div>
									<input class="form-control"  type="text" ng-model="address" value="{{address}}">
								</div>
							</div>
						</div>

						<!-- RG -->
						<div class="col-md-6"  ng-controller="ClientsController">
							<div class="form-group">
								<label>Proprietário*</label>
								<div>
									
									<select class="form-control" ng-model="owner" ng-change="updateOwner(owner)" ng-options="c.id as c.name for c in clients"></select>
								</div>
							</div>
						</div>

						<!-- RG -->
						<div class="col-md-6">
							<div class="form-group">
								<label>Valor do Aluguel*</label>
								<div>
									<input class="form-control" ng-model="rentValue" id="rentValue" type="number">
								</div> 
							</div>
						</div>

						<!-- RG -->
						<div class="col-md-6">
							<div class="form-group">
								<label>Valor - Avaliado*</label>
								<div>
									<input class="form-control" ng-model="valuedValue" id="valuedValue" type="number">
								</div>
							</div>
						</div>

						<!-- CPF -->
						<div class="col-md-12">
							<div class="form-group">
								<label>Descrição*</label>
								<div>
									<textarea  rows="1" cols="" class="form-control" ng-model="description" value="{{description}}"></textarea>
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
				<div class="modal-footer clearfix" >
					<button type="button" class="btn btn-primary pull-right" ng-click="updateImmobile()">
						<i class="fa fa-home"></i> Atualizar
					</button>
				</div>


			</div>
		</div>
	</div>
</section>