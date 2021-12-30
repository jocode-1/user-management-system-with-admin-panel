<?php 
include_once 'php/header.php';
?>
<!-- partial -->

<div class="page-content">

  <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
    <div>
      <h4 class="mb-3 mb-md-0">Welcome to Dashboard</h4>
      <div class="mb-md-0">
        <? if($verified == 'Not verified!'): ?>
        <div class="alert alert-danger alert-dismissible fade show mt-2 m-0" role="alert">
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close"> </button><strong>Hey
            <?= $fname ?>
          </strong> Your email is Not verified! we've sent you an E-mail verification link, check and verify now!.
        </div>
        <? endif; ?>
      </div>

    </div>
    <div class="d-flex align-items-center flex-wrap text-nowrap">
      <div class="input-group date datepicker wd-200 me-2 mb-2 mb-md-0" id="dashboardDate">
        <span class="input-group-text input-group-addon bg-transparent border-primary"><i data-feather="calendar"
            class=" text-primary"></i></span>
        <input type="text" class="form-control border-primary bg-transparent">
      </div>
      <button type="button" class="btn btn-outline-primary btn-icon-text me-2 mb-2 mb-md-0">
        <i class="btn-icon-prepend" data-feather="printer"></i>
        Print
      </button>
      <button type="button" class="btn btn-primary btn-icon-text mb-2 mb-md-0">
        <i class="btn-icon-prepend" data-feather="download-cloud"></i>
        Download Note
      </button>
    </div>
  </div>

  <!-- <div class="row">
    <div class="col-12 col-xl-12 stretch-card">
      <div class="row flex-grow-1">
        <div class="col-md-4 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <div class="d-flex justify-content-between align-items-baseline">
                <h6 class="card-title mb-0">New Customers</h6>
                <div class="dropdown mb-2">
                  <button class="btn p-0" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                  </button>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="eye"
                        class="icon-sm me-2"></i> <span class="">View</span></a>
                    <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="edit-2"
                        class="icon-sm me-2"></i> <span class="">Edit</span></a>
                    <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="trash"
                        class="icon-sm me-2"></i> <span class="">Delete</span></a>
                    <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="printer"
                        class="icon-sm me-2"></i> <span class="">Print</span></a>
                    <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="download"
                        class="icon-sm me-2"></i> <span class="">Download</span></a>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-6 col-md-12 col-xl-5">
                  <h3 class="mb-2">3,897</h3>
                  <div class="d-flex align-items-baseline">
                    <p class="text-success">
                      <span>+3.3%</span>
                      <i data-feather="arrow-up" class="icon-sm mb-1"></i>
                    </p>
                  </div>
                </div>
                <div class="col-6 col-md-12 col-xl-7">
                  <div id="customersChart" class="mt-md-3 mt-xl-0"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <div class="d-flex justify-content-between align-items-baseline">
                <h6 class="card-title mb-0">New Orders</h6>
                <div class="dropdown mb-2">
                  <button class="btn p-0" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                  </button>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="eye"
                        class="icon-sm me-2"></i> <span class="">View</span></a>
                    <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="edit-2"
                        class="icon-sm me-2"></i> <span class="">Edit</span></a>
                    <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="trash"
                        class="icon-sm me-2"></i> <span class="">Delete</span></a>
                    <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="printer"
                        class="icon-sm me-2"></i> <span class="">Print</span></a>
                    <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="download"
                        class="icon-sm me-2"></i> <span class="">Download</span></a>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-6 col-md-12 col-xl-5">
                  <h3 class="mb-2">35,084</h3>
                  <div class="d-flex align-items-baseline">
                    <p class="text-danger">
                      <span>-2.8%</span>
                      <i data-feather="arrow-down" class="icon-sm mb-1"></i>
                    </p>
                  </div>
                </div>
                <div class="col-6 col-md-12 col-xl-7">
                  <div id="ordersChart" class="mt-md-3 mt-xl-0"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <div class="d-flex justify-content-between align-items-baseline">
                <h6 class="card-title mb-0">Growth</h6>
                <div class="dropdown mb-2">
                  <button class="btn p-0" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                  </button>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                    <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="eye"
                        class="icon-sm me-2"></i> <span class="">View</span></a>
                    <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="edit-2"
                        class="icon-sm me-2"></i> <span class="">Edit</span></a>
                    <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="trash"
                        class="icon-sm me-2"></i> <span class="">Delete</span></a>
                    <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="printer"
                        class="icon-sm me-2"></i> <span class="">Print</span></a>
                    <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="download"
                        class="icon-sm me-2"></i> <span class="">Download</span></a>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-6 col-md-12 col-xl-5">
                  <h3 class="mb-2">89.87%</h3>
                  <div class="d-flex align-items-baseline">
                    <p class="text-success">
                      <span>+2.8%</span>
                      <i data-feather="arrow-up" class="icon-sm mb-1"></i>
                    </p>
                  </div>
                </div>
                <div class="col-6 col-md-12 col-xl-7">
                  <div id="growthChart" class="mt-md-3 mt-xl-0"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div> row -->

  <div class="row">
					<div class="col-lg-12 stretch-card">
						<div class="card">
							<div class="card-body">
								<h4 class="card-title">Table with contextual classes</h4>
								<p class="text-muted mb-3">
									<!-- Add class <code>.table-{color}</code> and <code>.text-dark</code> -->
								</p>
                <button type="button" class="btn btn-primary  mb-1 mb-md-0" data-bs-toggle="modal" data-bs-target="#addNoteModal"
                  data-bs-whatever="@fat" >Add New Note</button>

                <div class="modal fade" id="addNoteModal" aria-labelledby="varyingModalLabel"
                  aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="varyingModalLabel">New message</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
                      </div>
                      <div class="modal-body">
                        <form action="#" method="post" id="add-note-form">
                          <div class="mb-3">
                            <label for="recipient-name" class="form-label" >Enter Title</label>
                            <input type="text" class="form-control" name="title" id="recipient-name">
                          </div>
                          <div class="mb-3">
                            <label for="message-text" class="form-label">Write your Notes here</label>
                            <textarea class="form-control form-control-lg " id="message-text" name="note" rows="6"></textarea>
                          </div>
                        </form>
                      </div>
                      <div class="modal-footer">
                        <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                        <input type="submit" name="addNote" id="addNoteBtn" value="Add Note" class="btn btn-primary"></input>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- EDIT NOTE MODAL -->

                <div class="modal fade" id="editNoteModal" aria-labelledby="varyingModalLabel"
                  aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="varyingModalLabel">New message</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
                      </div>
                      <div class="modal-body">
                        <form action="#" method="post" id="edit-note-form">
                          <input type="hidden" name="id" id="id">
                          <div class="mb-3">
                            <label for="recipient-name" class="form-label" >Enter Title</label>
                            <input type="text" class="form-control" name="title" id="title">
                          </div>
                          <div class="mb-3">
                            <label for="message-text" class="form-label">Write your Notes here</label>
                            <textarea class="form-control form-control-lg " id="note" name="note" rows="6"></textarea>
                          </div>
                        </form>
                      </div>
                      <div class="modal-footer">
                        <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                        <input type="submit" name="editNote" id="editNoteBtn" value="Update Note" class="btn btn-info"></input>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- Table -->
								<div class="table-responsive pt-3" id="showNote">
                <!-- <table class="table table-bordered"> -->
										<!-- <thead>
											<tr>
												<th>#</th>
												<th>Title</th>
												<th>Note</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
											<tr class="table-info text-dark">
												<td>1</td>
												<td>Cedric Kelly</td>
												<td>Photoshop</td>
												<td> <a href="#" title="View Details" class="text-success infoBtn"><i data-feather="info"></i></a> &nbsp;
                        <a href="#" title="Edit note" class="text-primary editBtn"><i data-feather="edit" data-bs-toggle="modal" data-bs-target="#editNoteModal"></i></a>&nbsp;
                        <a href="#" title="Delete-note" class="text-danger deleteBtn"><i data-feather="delete"></i></a>&nbsp;
                        </td>
											</tr>
											
										</tbody>
									</table> -->
								</div>
							</div>
						</div>
					</div>
				</div>
</div>

<!-- partial:partials/_footer.html -->
<footer
  class="footer d-flex flex-column flex-md-row align-items-center justify-content-between px-4 py-3 border-top small">
  <p class="text-muted mb-1 mb-md-0">Copyright © 2021 <a href="https://www.nobleui.com/" target="_blank">NobleUI</a>.
  </p>
  <p class="text-muted">Handcrafted With <i class="mb-1 text-primary ms-1 icon-sm" data-feather="heart"></i></p>
</footer>
<!-- partial -->

</div>
</div>

<!-- core:js -->
<script src="assets/vendors/core/core.js"></script>
<!-- endinject -->

<!-- Plugin js for this page -->
<!-- <script src="assets/vendors/chartjs/Chart.min.js"></script> -->
<script src="assets/vendors/feather-icons/feather.min.js"></script>
<script src="assets/vendors/jquery.flot/jquery.flot.js"></script>
<script src="assets/vendors/jquery.flot/jquery.flot.resize.js"></script>
<script src="assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
<script src="assets/vendors/apexcharts/apexcharts.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.3/datatables.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script type="text/javascript" src="assets/js/home.js"> </script>
<!-- End plugin js for this page -->

<!-- inject:js -->
<script src="assets/js/template.js"></script>
<!-- endinject -->

<!-- Custom js for this page -->
<script src="assets/js/dashboard-dark.js"></script>
<script src="assets/js/datepicker.js"></script>
<!-- End custom js for this page -->

</body>

</html>