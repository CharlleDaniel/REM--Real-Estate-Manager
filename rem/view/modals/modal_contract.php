<section>
  <div class="modal fade" id="modal_contract" >
    <div class="modal-dialog" >
      <div class="modal-content" ng-controller="GetImmobileController">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"aria-hidden="true">&times;</button>
          <h4 class="modal-title">
            <i class="fa fa-files-o"></i> Cadastro de Contratos
          </h4>
        </div>

        <div class="modal-body" ng-controller="ClientsController">
          <div class="form-group">
            <label class="col-sm-2">LOCADOR: </label>
            <div class="col-sm-12">
              <select class="form-control" ng-model="client" ng-options="c as c.name for c in clients"></select>
            </div>
          </div>
          <br>                   
          <div class="form-group">
            <label class="col-sm-2">IMÓVEL: </label>
            <div class="col-sm-12">
              <select class="form-control" ng-model="immobile" ng-options="i as i.immobile for i in immobiles">
              </select>
            </div>
          </div>


          <div class="col-sm-12" style="width:70%; display: none" align="justify" id="contrato">
            <h4 style="color:black;">Contrato de Aluguel de Imóvel: <?php echo $_SESSION['name'] ?></h4> 
            <p style="color: black;">LOCÁTARIO:{{client.name}} brasileiro, casado, comerciante, portador da cédula de identidade {{client.rg}} e inscrito no CPF sob nº {{client.cpf}}, residente e domiciliado {{client.address}}.</p>

            <p style="color: black;">LOCADOR: {{immobile.immobile}}, inscrita no CNPJ sob nº {{cnpj}}, estabelecida com escritório profissional em {{immobile.address}}.</p>

            <p style="color: black;">OBJETO: A intermediação e a administração da locação do imóvel {{immobile.immobile}} em {{immobile.address}}.</p>

            <p style="color: black;">PRIMEIRA: O CONTRATANTE é legítimo senhor e possuidor do imóvel sito no endereço do perâmbulo,que se encontra livre e desocupado de pessoas e coisas(ou mobiliado - atenção: se for mobiliado, deverá ser feita relação dos móveis e utensílios que o guarnecem, para constar no contrato de locação, inclusive com o valor de avaliação de cada bem, para facilitar eventual apuração de perdas e danos)(ou com linha telefônica nº - atenção: a fatura de uma linha telefônica pode superar o valor da locação. Assim sendo, o contrato de locação de linha telefônica, deverá ser elaborado sempre em apartado ao do de locação, com outras garantias e cláusulas específicas), tendo interesse em alugá-lo para fins (de temporada) (não residenciais) (residenciais), pelo valor mensal mínimo de R$ {{immobile.rentValue}}, razão pela qual pretende se utilizar dos serviços do CONTRATADO para promover a seleção dos pretendentes à sua locação e sua subseqüente administração.</p>

            <p style="color: black;">SEGUNDA: Para essa finalidade, se compromete o CONTRATADO a efetuar completo levantamento das informações cadastrais dos eventuais pretendentes, de modo a poder selecionar dentre estes, aquele que vier a ser considerado como o mais indicado.</p>

            <p style="color: black;">§ ÚNICO: A indicação do pretendente pelo CONTRATADO não obriga o CONTRATANTE, que poderá a seu exclusivo critério, recusá-lo e indicar outro, desde que mediante expressa autorização e sob sua inteira responsabilidade.</p>

            <p style="color: black;">TERCEIRA: Além do pretendente, se compromete o CONTRATADO a diligenciar para obter a necessária garantia locatícia, que o CONTRATANTE deseja seja feita na forma de caução.</p>

            <p style="color: black;">QUARTA: Selecionado o pretendente e obtida a garantia locatícia, com aprovação do CONTRATANTE, compromete-se o CONTRATADO a elaborar e celebrar o respectivo contrato, nele estabelecido o prazo de vigência da locação, desde já estabelecido pelo mínimo de 12 meses, com a menção de que caberá ao locatário o pagamento de todos os encargos, inclusive o prêmio de seguro-incêndio, desde já estabelecido pelo valor comercial do imóvel, avaliado em R$ {{immobile.valuedValue}} e reajuste anual do aluguel pelos índices do IPCA. </p>

            <p style="color: black;">QUINTA: Os honorários devidos pela intermediação eficaz, serão equivalentes ao valor de R$ {{immobile.rentValue}}, ficando desde já estabelecido que a obtenção de majorações do valor locatício, acima dos índices pactuados, dará direito ao CONTRATADO de cobrar do CONTRATANTE a diferença entre o aluguel originalmente pactuado e o majorado, a ser deduzido da mesma forma acima prevista.</p>

            <p style="color: black;">SEXTA: Pela administração da locação, será devido ao CONTRATADO o percentual de 10% sobre o valor de cada aluguel mensal, nele incluídos os encargos no caso de eventual mora do(a) locatário(a), deduzido do valor a ser repassado ao CONTRATANTE.</p>

            <p style="color: black;">§ PRIMEIRO: Os alugueres recebidos pelo CONTRATADO, deduzida a remuneração estabelecida no "caput", serão repassados ao CONTRATANTE no prazo máximo de 5 dias úteis, através de depósito bancário na conta corrente nº {{conta}}, do banco {{banco}}, ag. {{agencia}}, convencionado desde já caber ao CONTRATADO deduzir as despesas de CPMF cobradas pela instituição bancária, tanto na compensação dos cheques utilizados pelo inquilino para pagamento dos alugueres, quanto no repasse do respectivo valor ao CONTRATANTE.</p> 
          </div>
          <div class="col-sm-12" id="contrato2" style="width:70%; color: black; display: none" align="right">João Pessoa, {{dia}} de {{mes}} de 2016</div>
          <div class="col-sm-12" style="width:30%; display: none; color: black; float: left">
            <p id="contrato3" style="margin-left: 20px">_____________________________</p>
            <p id="contrato4" style="margin-left: 63px">Assinatura Locatário</p>
          </div>
          <div class="col-sm-12" id="contrato4" style="margin-left: 30%; color: black; display: none">
            <p id="contrato5" style="margin-left: 20px">_____________________________</p>
            <p id="contrato6"style="margin-left: 63px">Assinatura Locador</p>
          </div>
          <br>
          <br>
          <br>
          <br>


        </div>    
        <div class="modal-footer clearfix" >
          <button type="button" class="btn bg-blue pull-right" data-dismiss="modal" onclick="gerar()">
            <i class="fa fa-files-o"></i> Cadastrar
          </button>
        </div>


      </div>
    </div>
  </div>
</section>

