    <footer class="main-footer">
        <div class="float-right d-none d-sm-block">
        </div>

    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="{{ asset('assets') }}/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('assets') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('assets') }}/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('assets') }}/dist/js/demo.js"></script>
    <script src="{{ asset('assets') }}/sweetalert/sweetalert.min.js"></script>
    {{-- Data Tables --}}
    <script src="{{ asset('assets') }}/dist/js/DataTables-1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('assets') }}/dist/js/DataTables-1.11.5/js/dataTables.bootstrap4.min.js"></script>
    @stack('script')
    </body>

    </html>
