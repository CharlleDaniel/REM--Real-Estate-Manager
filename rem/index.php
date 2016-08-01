<?php
	include 'head.php';
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" ng-view></div>

<?php 
  include 'view/modals/modal_client.php';
  include 'view/modals/modal_employee.php';
  include 'view/modals/modal_immobile.php';
  include 'view/modals/modal_immobile_update.php';
  include 'view/modals/modal_contract.php';
?>

<!-- angular-->
  <script src="http://s.codepen.io/assets/libs/modernizr.js" type="text/javascript"></script>
 <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.2.8/angular.min.js"></script>

<script src="bower_components/angular/angular.js" charset="utf-8"></script>
 <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.2.0rc1/angular-route.min.js"></script>

<script>
 angular.module("CombineModule", ["app","clientApp","employeeApp","immobileApp","logoutApp"]);
</script>
<script src="view/angular/app.js" charset="utf-8"></script>
<script src="view/angular/controllers.js" charset="utf-8"></script>
<script src="view/angular/logout.js" charset="utf-8"></script>
<script src="view/angular/client.js" charset="utf-8"></script>
<script src="view/angular/contract.js" charset="utf-8"></script>
<script src="view/angular/client.js" charset="utf-8"></script>
<script src="view/angular/immobile.js" charset="utf-8"></script>
<script src="view/angular/employee.js" charset="utf-8"></script>

<script src="view/plugins/jQuery/jQuery-2.1.4.min.js"></script>

<!-- Bootstrap 3.3.5 -->
<script src="view/bootstrap/js/bootstrap.min.js"></script>

<script src="view/dist/js/app.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="view/dist/js/demo.js"></script>
<!-- JSPDF (Generate pdf to contract´s) -->
<script type="text/javascript" src="view/plugins/jsPDF-master/jspdf.js"></script>
<script type="text/javascript" src="view/plugins/jsPDF-master/dist/jspdf.debug.js"></script>
<script type="text/javascript" src="view/plugins/jsPDF-master/plugins/standard_fonts_metrics.js"></script>
<script type="text/javascript" src="view/plugins/jsPDF-master/plugins/split_text_to_size.js"></script>
<script type="text/javascript" src="view/plugins/jsPDF-master/plugins/from_html.js"></script>
<script type="text/javascript">
    function gerar() {
        var pdf = new jsPDF('p','pt','letter');
        // source can be HTML-formatted string, or a reference
        // to an actual DOM element from which the text will be scraped.
        source = $('#contrato')[0];

        // we support special element handlers. Register them with jQuery-style 
        // ID selector for either ID or node name. ("#iAmID", "div", "span" etc.)
        // There is no support for any other type of selectors 
        // (class, of compound) at this time.
        specialElementHandlers = {
            // element with id of "bypass" - jQuery style selector
            '#bypassme': function(element, renderer) {
                // true = "handled elsewhere, bypass text extraction"
                return true
            }
        };
        margins = {
            top: 20,
            bottom: 60,
            left: 40,
            width: 522
        };
              
        // all coords and widths are in jsPDF instance's declared units
        // 'inches' in this case
        pdf.fromHTML(
                source, // HTML string or DOM elem ref.
                margins.left, // x coord
                margins.top, {// y coord
                    'width': margins.width, // max width of content on PDF
                    'elementHandlers': specialElementHandlers
                },function(dispose) {
              // dispose: object with X, Y of the last line add to the PDF 
              //          this allow the insertion of new lines after html
          pdf.setFontSize(12);
          pdf.setFontType("blod");
          pdf.setTextColor(0,0,0);
          pdf.text(440, (700), document.getElementById('contrato2').textContent);
          pdf.text(60, (730), document.getElementById('contrato3').textContent);
          pdf.text(93, (730+20), document.getElementById('contrato4').textContent);

          pdf.text(360, (730), document.getElementById('contrato5').textContent);

          pdf.text(393, (730+20), document.getElementById('contrato6').textContent);

              pdf.save('Test.pdf');
            }
            , margins);
        return true;
    }</script>
</body>
</html>




