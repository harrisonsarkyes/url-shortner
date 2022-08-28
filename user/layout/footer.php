<!-- partial:partials/_footer.html -->
    <footer class="footer">
            <div class="container-fluid d-flex justify-content-between">
              <span class="text-muted d-block text-center text-sm-start d-sm-inline-block">Copyright © Url Shortener <?=date('Y') ?></span>
              <!-- <span class="float-none float-sm-end mt-1 mt-sm-0 text-end"> Free <a href="https://www.bootstrapdash.com/bootstrap-admin-template/" target="_blank">Bootstrap admin template</a> from Bootstrapdash.com</span> -->
            </div>
          </footer>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
      <script>

        function copy(){
          let copy_link = document.getElementById("url");
          let copied = document.getElementById("copied");

          copy_link.select();
          copy_link.setSelectionRange(0, 99999);

          navigator.clipboard.writeText(copy_link.value);

          copied.innerHTML = "copied";

        }

        function clickCounter() {
        if (typeof (Storage) !== "undefined") {
            if (localStorage.clickcount) {
                localStorage.clickcount = Number(localStorage.clickcount) + 1;
            } else {
                localStorage.clickcount = 1;
            }
            document.getElementById("result").innerHTML = localStorage.clickcount;
        } else {
            document.getElementById("result").innerHTML = "Sorry, your browser does not support web storage...";
        }
        window.location = '';
    }
      </script>

      <!-- <script>
        let click = 0;
    function fun(){
        document.getElementById('countNum').innerHTML = ++click;
        click = click
    }
      </script> -->
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="assets/vendors/chart.js/Chart.min.js"></script>
    <script src="assets/js/jquery.cookie.js" type="text/javascript"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/hoverable-collapse.js"></script>
    <script src="assets/js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="assets/js/dashboard.js"></script>
    <script src="assets/js/todolist.js"></script>
    <!-- End custom js for this page -->
  </body>
</html>