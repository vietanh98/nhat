 <footer class="footer">
     <div class="container-fluid">
         <nav class="float-left">
             <ul>
                 <li>
                     <a href="https://www.creative-tim.com">
                         Creative Tim
                     </a>
                 </li>
                 <li>
                     <a href="https://creative-tim.com/presentation">
                         About Us
                     </a>
                 </li>
                 <li>
                     <a href="http://blog.creative-tim.com">
                         Blog
                     </a>
                 </li>
                 <li>
                     <a href="https://www.creative-tim.com/license">
                         Licenses
                     </a>
                 </li>
             </ul>
         </nav>
         <div class="copyright float-right" id="date">
             , made with <i class="material-icons">favorite</i> by
             <a href="https://www.creative-tim.com" target="_blank">Việt Anh</a> for a better web.
         </div>
     </div>
 </footer>
 <script>
     const x = new Date().getFullYear();
     let date = document.getElementById('date');
     date.innerHTML = '&copy; ' + x + date.innerHTML;
 </script>
 <script src="https://cdn.ckeditor.com/ckeditor5/19.1.1/classic/ckeditor.js"></script>
 <script>
     $('#datepicker').datepicker({
         uiLibrary: 'bootstrap4'
     });
 </script>
 <script src="{{asset('backend/assets/demo/demo.js')}}"></script>

