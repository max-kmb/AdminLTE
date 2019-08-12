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
<script src="<?=SITE_TEMPLATE_PATH?>/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="<?=SITE_TEMPLATE_PATH?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?=SITE_TEMPLATE_PATH?>/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?=SITE_TEMPLATE_PATH?>/dist/js/adminlte.js"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="<?=SITE_TEMPLATE_PATH?>/dist/js/demo.js"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="<?=SITE_TEMPLATE_PATH?>/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="<?=SITE_TEMPLATE_PATH?>/plugins/raphael/raphael.min.js"></script>
<script src="<?=SITE_TEMPLATE_PATH?>/plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="<?=SITE_TEMPLATE_PATH?>/plugins/jquery-mapael/maps/world_countries.min.js"></script>
<!-- ChartJS -->
<script src="<?=SITE_TEMPLATE_PATH?>/plugins/chart.js/Chart.min.js"></script>

<!-- PAGE SCRIPTS -->
<script src="<?=SITE_TEMPLATE_PATH?>/dist/js/pages/dashboard2.js"></script>
<script>
    BX.addCustomEvent("onPullEvent-studio7.pull", BX.delegate(function(command,params){
        if(command == 'checkNotify') {
            Shipstore.notify();
        }
    }, this));
</script>
</body>
</html>
