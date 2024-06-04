 <footer class="app-footer">
     <div class="container text-center py-3">
         <!--/* This template is free as long as you keep the footer attribution link. If you'd like to use the template without the attribution link, you can buy the commercial license via our website: themes.3rdwavemedia.com Thank you for your support. :) */-->
         <small class="copyright">Designed with <span class="sr-only">love</span><i class="fas fa-heart"
                 style="color: #fb866a;"></i> by <a class="app-link" href="http://themes.3rdwavemedia.com"
                 target="_blank">{{ config('app.name') }}</a> for developers</small>

     </div>
 </footer><!--//app-footer-->

 </div><!--//app-wrapper-->


 <!-- Javascript -->
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
 <script src="{{ asset('assets/plugins/popper.min.js') }}"></script>
 <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>

 <!-- Charts JS -->
 <script src="{{ asset('assets/plugins/chart.js/chart.min.js') }}"></script>
 <script src="{{ asset('assets/js/index-charts.js') }}"></script>

 <!-- Page Specific JS -->
 <script src="{{ asset('assets/js/app.js') }}"></script>
 <script src="https://cdn.datatables.net/2.0.8/js/dataTables.min.js"></script>

 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

 <script>
     function confirmLogout() {
         Swal.fire({
             title: 'Apa anda Yakin?',
             text: "anda akan keluar dari sesi login?",
             icon: 'warning',
             showCancelButton: true,
             confirmButtonColor: '#3085d6',
             cancelButtonColor: '#d33',
             confirmButtonText: 'Ya',
             cancelButtonText: 'Batal'
         }).then((result) => {
             if (result.isConfirmed) {
                 document.getElementById('logout-form').submit();
             }
         });
     }
 </script>

 </body>

 </html>
