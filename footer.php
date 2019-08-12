<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

  <!-- Main Footer -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2014-<?=date('Y')?> <a href="https://shipstores.net">ShipStores.net</a>.</strong>
    All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->
<?// сделано для экономии вызывов функций
require($_SERVER["DOCUMENT_ROOT"]."/include/7studio.php");
?>
<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="dist/js/demo.js"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="plugins/raphael/raphael.min.js"></script>
<script src="plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="plugins/jquery-mapael/maps/world_countries.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>

<!-- PAGE SCRIPTS -->
<script src="dist/js/pages/dashboard2.js"></script>
<script>
    BX.addCustomEvent("onPullEvent-studio7.pull", BX.delegate(function(command,params){
        if(command == 'checkNotify') {
            Shipstore.notify();
        }
    }, this));
</script>
</body>
</html>
