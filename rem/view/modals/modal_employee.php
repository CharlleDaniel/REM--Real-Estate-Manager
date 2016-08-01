<section>
<div class="modal fade" id="modal_employee">
	<div class="modal-dialog">
		<div class="modal-content" ng-controller="PostEmployeeController">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"aria-hidden="true">&times;</button>
				<h4 class="modal-title">
					<i class="fa fa-group"></i> Cadastro de Funcionários
				</h4>
			</div>

			<div class="modal-body">
				<div id="message2" style="color: red; text-align: center;  font-size: 18px"></div>
				<br>
				<form id="form_employee">
					<!-- Nome -->
					<div class="col-md-12">
						<label>Nome*</label>
						<div>
							<input class="form-control" type="text" ng-model="employee.name">
						</div>
					</div>

					<!-- RG -->
					<div class="col-md-6">
						<label>CPF*</label>
						<div>
							<input class="form-control" type="text" ng-model="employee.cpf" maxlength="14">
						</div>
					</div>

					<!-- RG -->
					<div class="col-md-6">
						<label>Telefone*</label>
						<div>
							<input class="form-control" type="text" ng-model="employee.phone">
						</div>
					</div>

					<!-- RG -->
					<div class="col-md-6">
						<label>Matricula*</label>
						<div>
							<input class="form-control" type="text" ng-model="employee.registry">
						</div>
					</div>

					<div class="col-md-6">
						<label>Senha*</label>
						<div>
							<input class="form-control" type="password" ng-model="employee.password">
						</div>

					</div>

					<div class="col-md-12">
						<label>Email*</label>
						<div>
							<input class="form-control" type="text" ng-model="employee.email">
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
			</div>
			<br>
			<br>
			<br>
			<br>		
			<div class="modal-footer clearfix" >
				<button type="button" class="btn bg-blue pull-right" ng-click="postEmployee()">
					<i class="fa fa-group"></i> Cadastrar
				</button>
			</div>

		</div>
	</div>
</div>

</section>
