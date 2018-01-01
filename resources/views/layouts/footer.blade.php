  <!-- jQuery -->
    <script src="{{ URL::asset('') }}vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{ URL::asset('') }}vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="{{ URL::asset('') }}vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="{{ URL::asset('') }}vendor/raphael/raphael.min.js"></script>
    <script src="{{ URL::asset('') }}vendor/morrisjs/morris.min.js"></script>
    <script src="{{ URL::asset('') }}data/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="{{ URL::asset('') }}dist/js/sb-admin-2.js"></script>
    <script src="{{ URL::asset('') }}plugins/swall/sweetalert-dev.js"></script>
    <!-- DataTables -->
    <script src="{{ asset('assets/dataTables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/dataTables/js/dataTables.bootstrap.min.js') }}"></script>
    <!-- Validator -->
    <script src="{{ asset('assets/validator/validator.min.js') }}"></script>

  @yield('js')
</body>

</html>
