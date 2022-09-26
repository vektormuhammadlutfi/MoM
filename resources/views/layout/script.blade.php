<script src="{{URL::asset('/assets/js/plugins/jquery/dist/jquery.min.js')}}"></script>
  <script src="{{URL::asset('/assets/js/plugins/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
  <!--   Optional JS   -->
  {{-- <script src="{{URL::asset('/assets/js/plugins/chart.js/dist/Chart.min.js')}}"></script>
  <script src="{{URL::asset('/assets/js/plugins/chart.js/dist/Chart.extension.js')}}"></script> --}}
  <!--   Argon JS   -->
  <script src="{{URL::asset('/assets/js/argon-dashboard.min.js?v=1.1.2')}}"></script>
  <script src="https://cdn.trackjs.com/agent/v3/latest/t.js"></script>

  {{-- <script src="//code.jquery.com/jquery-3.5.1.js"></script> --}}
  <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
  <script src="//cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
  <script src="{{URL::asset('/assets/js/table.js')}}"></script>
  {{-- SweetAlert --}}
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  {{-- Aos Animation --}}
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>

  {{-- iconify --}}
  <script src="https://code.iconify.design/iconify-icon/1.0.0/iconify-icon.min.js"></script>
  <script>
    window.TrackJS &&
      TrackJS.install({
        token: "ee6fab19c5a04ac1a32a645abde4613a",
        application: "argon-dashboard-free"
      });
  </script>
