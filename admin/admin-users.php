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
              <div class="table-responsive" id="fetchAllUsers">
                <p>Please Wait....</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- <div class="row">
              <div class="col-12 col-md-6 col-lg-6">
                <div class="card">
                  <div class="card-header">
                    <h4>Vertically Centered</h4>
                  </div>
                  <div class="card-body">
                    <button type="button" class="btn btn-primary" data-toggle="modal"
                      data-target="#exampleModalCenter">Vertically
                      Centered</button>
                  </div>
                </div>
              </div>
            </div> -->

            <div class="modal fade" id="showUsersDetailsModal" tabindex="-1" role="dialog"
          aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="getName"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <p id="getEmail"></p>
                <p id="getPhone"></p>
                <p id="getDob"></p>
                <p id="getGender"></p>
                <p id="getCreated"></p>
                <p id="getVerified"></p>
              </div>
              <div class="card align-self-center" id="getImage">

              </div>
              <div class="modal-footer bg-whitesmoke br">
                <!-- <button type="button" class="btn btn-primary">Save</button> -->
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>

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

<!-- FETCH ALL DELETED USER -->
<script>
  $(document).ready(function () {
    fetchAllUsers()
    function fetchAllUsers() {
      $.ajax({
        url: 'php/admin_action.php',
        method: 'post',
        data: { action: 'fetchAllUsers' },
        success: function (response) {
          // console.log(response);
          $("#fetchAllUsers").html(response);
          $("table").DataTable({
            order: [0, 'desc']

          });

        }

      });
    }
    // DELETE USER AJAX
    $("body").on("click", ".deleteUserIcon", function (e) {
        e.preventDefault();
        del_id = $(this).attr('id');
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: 'php/admin_action.php',
                    method: 'post',
                    data: { del_id: del_id },
                    success: function (response) {
                        Swal.fire(
                            'Deleted!',
                            'User has been deleted.',
                            'success'
                        )
                        fetchAllUsers();
                    }
                });

            }
        });

    });

     // VIEW USER-INFO AJAX
    $("body").on("click", ".usersDetailsIcon", function (e) {
      e.preventDefault();

      details_id = $(this).attr('id')
      $.ajax({
            url: 'php/admin_action.php',
            method: 'post',
            data: { details_id: details_id },
            success: function (response) {
                // console.log(response);
                data = JSON.parse(response);
                // console.log(data)
                $("#getName").text(data.name +' ' + '(ID: '+data.id+')');
                $("#getEmail").text('Email : '+data.email);
                $("#getPhone").text('Phone : '+data.phone);
                $("#getDob").text('DOB : '+data.dob);
                $("#getGender").text('Gender : '+data.gender);
                $("#getCreated").text('Joined On : '+data.created_at);
                $("#getVerified").text('Verified : '+data.verified);

                if(data.photo != '') {
                  $("#getImage").html('<img src="../php/'+data.photo+'" class="img-thumbnail img-fluid align-self-center" height="300px" width= "300px">');
                } else {
                  $("#getImage").html('<img src="../assets/images/others/profile-cover.png" class="img-thumbnail">');
                }

            }
        });

    });

  });
</script>
</body>

</html>