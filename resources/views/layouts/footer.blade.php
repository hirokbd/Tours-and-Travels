<!-- plugins:js -->
<script src="{{ asset('assets/node_modules/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('assets/node_modules/popper.js/dist/umd/popper.min.js') }}"></script>
<script src="{{ asset('assets/node_modules/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/node_modules/perfect-scrollbar/dist/js/perfect-scrollbar.jquery.min.js') }}"></script>
<!-- endinject -->
<script src="{{ asset('assets/node_modules/datatables.net/js/jquery.dataTables.js') }}"></script>
<script src="{{ asset('assets/node_modules/datatables.net-bs4/js/dataTables.bootstrap4.js') }}"></script>
<script src="{{ asset('assets/node_modules/sweetalert2/dist/sweetalert2.min.js') }}"></script>
<script src="{{ asset('assets/node_modules/dropify/dist/js/dropify.min.js') }}"></script>
<script src="{{ asset('assets/node_modules/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
<!-- Plugin js for this page-->
<script src="{{ asset('assets/node_modules/flot/jquery.flot.js') }}"></script>
<script src="{{ asset('assets/node_modules/flot/jquery.flot.resize.js') }}"></script>
<script src="{{ asset('assets/node_modules/flot/jquery.flot.categories.js') }}"></script>
<script src="{{ asset('assets/node_modules/flot/jquery.flot.pie.js') }}"></script>
<script src="{{ asset('assets/node_modules/rickshaw/vendor/d3.v3.js') }}"></script>
<script src="{{ asset('assets/node_modules/rickshaw/rickshaw.min.js') }}"></script>
<script src="{{ asset('assets/bower_components/chartist/dist/chartist.min.js') }}"></script>
<script src="{{ asset('assets/node_modules/chartist-plugin-legend/chartist-plugin-legend.js') }}"></script>
<script src="{{ asset('assets/node_modules/chart.js/dist/Chart.min.js') }}"></script>
<script src="{{ asset('assets/node_modules/jquery-sparkline/jquery.sparkline.min.js') }}"></script>
<script src="{{ asset('assets/node_modules/jquery-validation/dist/jquery.validate.min.js') }}"></script>
<script src="{{ asset('assets/node_modules/select2/dist/js/select2.min.js') }}"></script>

<!-- End plugin js for this page-->
<!-- inject:js -->
<script src="{{ asset('assets/js/off-canvas.js') }}"></script>
<script src="{{ asset('assets/js/hoverable-collapse.js') }}"></script>
<script src="{{ asset('assets/js/misc.js') }}"></script>
<script src="{{ asset('assets/js/settings.js') }}"></script>
<!-- endinject -->
<script src="{{ asset('assets/js/data-table.js') }}"></script>
<script src="{{ asset('assets/js/alerts.js') }}"></script>
<script src="{{ asset('assets/js/dropify.js') }}"></script>
<script src="{{ asset('assets/js/form-validation.js') }}"></script>

<!-- Custom js for this page-->
<script src="{{ asset('assets/js/dashboard_1.js') }}"></script>
<!-- End custom js for this page-->
<script src="{{ asset('assets/js/formpickers.js') }}"></script>
<script src="{{ asset('assets/js/form-addons.js') }}"></script>
<script>
    $("#year").datepicker({
        format: "yyyy",
        viewMode: "years",
        minViewMode: 2,
        autoclose: true
    });
    $(".datepickernew").datepicker({
        format: "dd-mm-yyyy",
        autoclose: true
    });
</script>
<script>
function printContent(el){
var restorepage = $('body').html();
var printcontent = $('.' + el).clone();
$('body').empty().html(printcontent);
window.print();
$('body').html(restorepage);
}
</script>
</body>

</html>