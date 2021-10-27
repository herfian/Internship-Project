        {{-- <footer class="main-footer">
            <div class="footer-left">
                Copyright &copy; 2018 <div class="bullet"></div> Design By <a href="https://nauval.in/">Muhamad Nauval Azhar</a>
            </div>
            <div class="footer-right">

            </div>
        </footer> --}}
        </div>
        </div>

        <!-- General JS Scripts -->
        <script src="{{ asset('assets/modules/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/modules/popper.js') }}"></script>
        <script src="{{ asset('assets/modules/tooltip.js') }}"></script>
        <script src="{{ asset('assets/modules/bootstrap/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('assets/modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
        <script src="{{ asset('assets/modules/moment.min.js') }}"></script>
        <script src="{{ asset('assets/js/stisla.js') }}"></script>
        <script src="{{ asset('assets/js/highcharts.js') }}"></script>
        {{-- <script src=" {{ url('/js/jquery.min.js') }}"></script>
        <script src=" {{ url('/js/jquery.js') }}"></script> --}}
        
        <!-- JS Libraies -->
        @stack('sweet_alert')
        
        {{--<script src=" {{url('assets/js/jquery.dataTables.min.js') }}"></script>
        <script src=" {{ url('assets/js/dataTables.bootstrap.min.js') }}"></script> --}}
        <script src="{{asset('assets/plugins/datatables/jquery.dataTables.js')}}"></script>
        <script src="{{asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>
        <script src="{{asset('assets/plugins/chart.js/Chart.min.js')}}"></script>
        <script src="{{asset('assets/plugins/chart.js/Chartist.min.js')}}"></script>
        
        
        @yield('js')

        <!-- Page Specific JS File -->
        @stack('js')


        <!-- Template JS File -->
        <script src="{{ asset('assets/js/scripts.js') }}"></script>
        <script src="{{ asset('assets/js/custom.js') }}"></script>

        </body> 

        </html>