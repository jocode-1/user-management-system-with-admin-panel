<?php 
include_once 'php/header.php'

?>
<div class="page-content">
<div class="col-lg-6 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
				  <?php if($verified != 'Not Verified!'): ?>
                <h4 class="card-title">FeedBack </h4>
                <p class="text-muted mb-3"> Send a Message to the Admin</p>
				<form action="" method="post" id="feedback-form">
                <!-- <div class="row mb-3">
                  <div class="col-lg-3">
                    <label for="defaultconfig" class="col-form-label">Default usage</label>
                  </div>
                  <div class="col-lg-8">
                    <input class="form-control" maxlength="25" name="defaultconfig" id="defaultconfig" type="text"
                      placeholder="Type Something..">
                  </div>
                </div> -->
                <div class="row mb-3">
                  <div class="col-lg-3">
                    <label for="defaultconfig-2" class="col-form-label"> Subject </label>
                  </div>
                  <div class="col-lg-8">
                    <input class="form-control" maxlength="20" name="subject" id="subject" type="text"
                      placeholder="Write Your Subject Here...">
                  </div>
                </div>
                
                <div class="row">
                  <div class="col-lg-3">
                    <label for="defaultconfig-4" class="col-form-label">FeedBack</label>
                  </div>
                  <div class="col-lg-8">
                    <textarea id="feed_back" class="form-control" name="feedback" maxlength="100" rows="8"
                      placeholder="Write Your FeedBack Here..."></textarea>
                  </div>
				  <!-- <div class="row">
					<div class="col-lg-8"> -->
					<input class="btn btn-primary btn-block btn-lg text-white " id="feedbackBtn" value = "Send FeedBack" type= "submit" style="margin-top: 10px;"></a>
				</div>
				</div>
                </div>
              </div>
			  </form>
			  <?php else: ?>
				<h1 class="text-center text-secondary">Verify Your Email First to Send Message to Admin. </h1>
				<?php endif; ?>
            </div>
			
          </div>


</div>
	</div>

	<!-- core:js -->
	<script src="assets/vendors/core/core.js"></script>
	<script type="text/javascript" src="assets/js/jquery-3.5.1.min.js"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-ajaxy/1.6.1/scripts/jquery.ajaxy.min.js"></script> -->
<script type="text/javascript" src="assets/js/profile_update.js"></script>
	<!-- endinject -->

	<!-- Plugin js for this page -->
  <script src="assets/vendors/chartjs/Chart.min.js"></script>
  <script src="assets/vendors/jquery.flot/jquery.flot.js"></script>
  <script src="assets/vendors/jquery.flot/jquery.flot.resize.js"></script>
  <script src="assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
  <script src="assets/vendors/apexcharts/apexcharts.min.js"></script>
	<!-- End plugin js for this page -->

	<!-- inject:js -->
	<script src="assets/vendors/feather-icons/feather.min.js"></script>
	<script src="assets/js/template.js"></script>
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@8"></script>

	<!-- endinject -->

	<!-- Custom js for this page -->
  <script src="assets/js/dashboard-dark.js"></script>
  <script src="assets/js/datepicker.js"></script>
	<!-- End custom js for this page -->

</body>
</html>    