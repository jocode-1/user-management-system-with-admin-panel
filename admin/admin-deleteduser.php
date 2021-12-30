 <?php 
 include_once 'php/header.php';
 ?>
 <div class="main-content">
  <section class="section">
    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>Basic DataTables</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive" id="fetchAllDeletedUsers">
                <p>Please Wait....</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
 
 
 
 
 </div>
  </div>
  <!-- General JS Scripts -->
  <script src="assets/js/app.min.js"></script>
  <!-- JS Libraies -->
  <script src="assets/bundles/apexcharts/apexcharts.min.js"></script>
  <!-- Page Specific JS File -->
  <script src="assets/js/page/index.js"></script>
  <!-- Template JS File -->
  <script src="assets/js/scripts.js"></script>
  <!-- Custom JS File -->
  <script src="assets/js/custom.js"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.3/datatables.min.js"></script>
  <script>
    $(document).ready(function () {
      fetchAllDeletedUsers()
      function fetchAllDeletedUsers() {
        $.ajax({
          url: 'php/admin_action.php',
          method: 'post',
          data: { action: 'fetchAllDeletedUsers' },
          success: function (response) {
            // console.log(response);
            $("#fetchAllDeletedUsers").html(response);
            $("table").DataTable({
              order: [0, 'desc']
            });
          }
        });
      }

      // RESTORE DELETED USER AJAX
    $("body").on("click", ".restoreUserIcon", function (e) {
        e.preventDefault();
        res_id = $(this).attr('id');
        Swal.fire({
            title: 'Are you sure want to restore this user?',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, restore it!'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: 'php/admin_action.php',
                    method: 'post',
                    data: { res_id: res_id },
                    success: function (response) {
                        Swal.fire(
                            'Restored!',
                            'User has been restored.',
                            'success'
                        )
                        fetchAllDeletedUsers();
                    }
                });

            }
        });

    });
    });
  </script>
</body>


<!-- index.html  21 Nov 2019 03:47:04 GMT -->

</html>