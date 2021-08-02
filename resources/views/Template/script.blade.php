<!-- jQuery -->
<script src="{{asset('Admin_LTE/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('Admin_LTE/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('Admin_LTE/dist/js/adminlte.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset('Admin_LTE/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- DataTables  & Plugins -->
<script src="{{asset('Admin_LTE/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('Admin_LTE/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('Admin_LTE/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('Admin_LTE/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<!-- Select2 -->
<script src="{{asset('Admin_LTE/plugins/select2/js/select2.full.min.js')}}"></script>
<!-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> -->
<script src="{{ $cdn ?? asset('vendor/sweetalert/sweetalert.all.js')  }}"></script>


@yield('script')