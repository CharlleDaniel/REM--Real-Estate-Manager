 <section class="content-header">
  <h1>
    Início
    <small>Minhas Casas</small>
  </h1>
  
</section>
<!-- Main content -->
<section class="content" ng-controller="GetImmobilesController">
  <div class="zui-pager" style="margin-top: -35px; margin-right: -15px" align="right">
    <ol class="btn-group" id="pagination">

      <li class="btn-group__item">
        <i class="i-chevron-left"></i>
      </li>

      <li class="btn-group__item" ng-repeat="p in pages">
        <button type="button" id="{{p}}" class="btn btn--basic" ng-click="getImmobiles(p)"><span>{{p}}</span></button>
      </li>

      <li class="btn-group__item">
        <i class="i-chevron-right"></i>
      </li>
      

    </ol>
  </div>
  <!-- Todas as Casinhas -->
  <div class="row" id="message" style="height: 993px; margin-top: -30px">

    <div class="col-lg-3 col-xs-6" style="height: 130px">
      <!-- Casinha azul fixa -->
      <div href="" class="small-box bg-light-blue" data-toggle="modal" data-target="#modal_immobile" >
        <!-- Control Sidebar Toggle Button -->
        
        <div class="inner">
          <h3 style="font-size:18px">+ Cadastrar</h3>
          <p>Novo Imóvel</p>

        </div>
        <div class="icon" style="margin-top: -10px">
          <i class="fa fa-home"></i>
        </div>
        <a href="" class="small-box-footer" >Cadastrar <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    
    <immobile ng-repeat="i in immobiles" immobile-address="i.address" immobile-description="i.description" immobile-rent="i.rentValue" immobile-id="i.id"></immobile>
  </div>

</section>