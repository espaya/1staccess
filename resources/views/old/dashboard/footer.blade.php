<div class="nk-footer">
   <div class="container-fluid">
      <div class="nk-footer-wrap">
         <div class="nk-footer-copyright"> &copy; <?php echo date("Y"); ?> 1staccess Health Care Inc
         </div>
         <div class="nk-footer-links">
            <ul class="nav nav-sm">
               <li class="nav-item"><a href="#" class="nav-link">About</a></li>
               <li class="nav-item"><a href="#" class="nav-link">Support</a></li>
               <li class="nav-item"><a href="#" class="nav-link">Blog</a></li>
            </ul>
         </div>
      </div>
   </div>
</div>
<script>
   $(document).ready(function() {
      // Sidebar toggle for mobile
      $('#sidebarToggleMobile').on('click', function() {
         $('body').toggleClass('sidebar-mobile-open');
      });

      // Sidebar toggle for desktop
      $('#sidebarToggleDesktop').on('click', function() {
         $('body').toggleClass('sidebar-open');
      });
   });

   $(document).ready(function() {
      $('#compactToggle').on('click', function() {
         $('body').toggleClass('compact-mode');
      });
   });

</script>