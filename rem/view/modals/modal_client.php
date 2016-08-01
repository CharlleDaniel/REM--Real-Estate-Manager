<section>
  <div class="modal fade" id="modal_client" >
    <div class="modal-dialog">
      <div class="modal-content" ng-controller="PostClientController">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"aria-hidden="true">&times;</button>
          <h4 class="modal-title">
            <i class="fa fa-user"></i> Cadastro de Clientes
          </h4>
        </div>

        <div class="modal-body" >
          <div id="message" style="color: red; text-align: center; font-size: 18px"></div>
          <form id="form_clients">
            <!-- Nome -->
            <div class="col-md-12">
              <label>Nome*</label>
              <div>
                <input class="form-control" type="text" ng-model="client.name">
              </div>
            </div>
            <p></p>

            <!-- CPF -->
            <div class="col-md-6">
              <label>CPF*</label>
              <div>
                <input class="form-control" type="text" ng-model="client.cpf" maxlength="14">
              </div>
            </div>

            <!-- RG -->
            <div class="col-md-6">
              <label>RG*</label>
              <div>
                <input class="form-control" type="text" ng-model="client.rg" maxlength="7">
              </div>
            </div>

            <!-- RG -->
            <div class="col-md-6">
              <label>Endereço*</label>
              <div>
                <input class="form-control" type="text" ng-model="client.address">
              </div>
            </div>

            <br>
            <br>
            <br>
            <br>
            <br>
          </form>
        </div>
        <br>
        <br>
        <br>
        <br>
        <div class="modal-footer clearfix">
          <button type="button" class="btn bg-blue pull-right" ng-click="postClient()">
            <i class="fa fa-group"></i> Cadastrar
          </button>
        </div>

      </div>
    </div>
  </div>
</section>