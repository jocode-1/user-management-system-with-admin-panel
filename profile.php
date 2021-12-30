<?php 
include_once 'php/header.php';

?>

<!-- partial -->

<div class="page-content">

  <div class="row chat-wrapper">
    <div class="col-lg-12 stretch-card">
      <div class="card">
        <!-- picture -->
        <div class="position-relative">
          <!-- <figure class="overflow-hidden mb-2 d-flex justify-content-left">
            <?php if(!$cphoto): ?>
            <img src="assets/images/others/profile-cover.png" class="img-thumbnail img-fluid" alt="profile cover">
            <?php else: ?>
              <img src="<?= 'php/'.$cphoto; ?>" class="img-thumbnail img-fluid" alt="profile cover">
              <?php endif; ?>
          </figure> -->
          <div
            class="d-flex justify-content-between align-items-center position-absolute top-90 w-100 px-2 px-md-4 mt-n4">
            <div class="d-none d-md-block">
            </div>
          </div>
          <div class="card-body">
            <div class="row ">
              <div class="col-md-12 chat-aside border-end-lg">
                <div class="aside-content">
                  <div class="aside-header">
                    <div class="d-flex justify-content-between align-items-center pb-2 mb-2">
                      <div class="d-flex align-items-center">
                        <figure class="me-2 mb-0">
                          <?php if(!$cphoto): ?>
                          <img src="assets/images/others/profile-cover.png"
                            class="img-thumbnail img-fluid rounded-circle" width="500px" alt="profile">
                          <?php else: ?>
                          <img src="<?= 'php/'.$cphoto; ?>" class="rounded-circle" height="180" width="180"
                            alt="profile cover">
                          <?php endif; ?>
                          <div class="status online"></div>
                        </figure>
                        <div>
                          <h6>
                            <?= $cname; ?>
                          </h6>
                          <p class="text-muted tx-13">Software Developer</p>
                        </div>
                      </div>
                      <div class="dropdown">
                        <button class="btn p-0" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown"
                          aria-haspopup="true" aria-expanded="false">
                          <i class="icon-lg text-muted pb-3px" data-feather="settings" data-bs-toggle="tooltip"
                            title="Settings"></i>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                          <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="eye"
                              class="icon-sm me-2"></i> <span class="">View Profile</span></a>
                          <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i
                              data-feather="edit-2" class="icon-sm me-2"></i> <span class="">Edit Profile</span></a>
                          <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i
                              data-feather="aperture" class="icon-sm me-2"></i> <span class="">Add status</span></a>
                          <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i
                              data-feather="settings" class="icon-sm me-2"></i> <span class="">Settings</span></a>
                        </div>
                      </div>
                    </div>
                    <!-- <form class="search-form">
                          <div class="input-group">
                            <span class="input-group-text">
                              <i data-feather="search" class="cursor-pointer"></i>
                            </span>
                            <input type="text" class="form-control" id="searchForm" placeholder="Search here...">
                          </div>
                        </form> -->
                  </div>
                  <div class="aside-body">
                    <ul class="nav nav-tabs nav-fill mt-3" role="tablist">
                      <li class="nav-item">
                        <a class="nav-link active" id="chats-tab" data-bs-toggle="tab" data-bs-target="#chats"
                          role="tab" aria-controls="chats" aria-selected="true">
                          <div
                            class="d-flex flex-row flex-lg-column flex-xl-row align-items-center justify-content-center">
                            <i data-feather="message-square"
                              class="icon-sm me-sm-2 me-lg-0 me-xl-2 mb-md-1 mb-xl-0"></i>
                            <p class="d-none d-sm-block">Profile</p>
                          </div>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="calls-tab" data-bs-toggle="tab" data-bs-target="#calls" role="tab"
                          aria-controls="calls" aria-selected="false">
                          <div
                            class="d-flex flex-row flex-lg-column flex-xl-row align-items-center justify-content-center">
                            <i data-feather="phone-call" class="icon-sm me-sm-2 me-lg-0 me-xl-2 mb-md-1 mb-xl-0"></i>
                            <p class="d-none d-sm-block"> Edit Profile</p>
                          </div>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="contacts-tab" data-bs-toggle="tab" data-bs-target="#contacts" role="tab"
                          aria-controls="contacts" aria-selected="false">
                          <div
                            class="d-flex flex-row flex-lg-column flex-xl-row align-items-center justify-content-center">
                            <i data-feather="users" class="icon-sm me-sm-2 me-lg-0 me-xl-2 mb-md-1 mb-xl-0"></i>
                            <p class="d-none d-sm-block"> Change Paswword</p>
                          </div>
                        </a>
                      </li>
                    </ul>
                    <div class="tab-content mt-3">
                      <div class="tab-pane fade show active" id="chats" role="tabpanel" aria-labelledby="chats-tab">
                        <div>
                          <p class="text-muted mb-1">User ID:
                            <?= $cid; ?>
                          </p>
                          <div id="verifyEmailAlert"></div>
                          <ul class="list-unstyled chat-list px-1">
                            <li class="chat-item pe-1">
                              <a href="javascript:;" class="d-flex align-items-center">
                                <div class="d-flex justify-content-between flex-grow-1 border-bottom">
                                  <div>
                                    <p class="text-body fw-bolder rounded"><b>Name: </b>
                                      <?= $cname; ?>
                                    </p>
                                  </div>

                                </div>
                              </a>
                            </li>
                            <li class="chat-item pe-1">
                              <a href="javascript:;" class="d-flex align-items-center">
                                <div class="d-flex justify-content-between flex-grow-1 border-bottom">
                                  <div>
                                    <p class="text-body fw-bolder rounded"><b>E-mail : </b>
                                      <?= $cemail; ?>
                                    </p>
                                  </div>
                                </div>
                              </a>
                            </li>
                            <li class="chat-item pe-1">
                              <a href="javascript:;" class="d-flex align-items-center">
                                <div class="d-flex justify-content-between flex-grow-1 border-bottom">
                                  <div>
                                    <p class="text-body fw-bolder rounded"><b>Gender : </b>
                                      <?= $cgender; ?>
                                    </p>
                                  </div>
                                </div>
                              </a>
                            </li>
                            <li class="chat-item pe-1">
                              <a href="javascript:;" class="d-flex align-items-center">
                                <div class="d-flex justify-content-between flex-grow-1 border-bottom">
                                  <div>
                                    <p class="text-body fw-bolder rounded"><b>Date Of Birth : </b>
                                      <?= $cdob; ?>
                                    </p>
                                  </div>
                              </a>
                            </li>
                            <li class="chat-item pe-1">
                              <a href="javascript:;" class="d-flex align-items-center">
                                <div class="d-flex justify-content-between flex-grow-1 border-bottom">
                                  <div>
                                    <p class="text-body fw-bolder rounded"><b>Phone : </b>
                                      <?= $cphone; ?>
                                    </p>
                                  </div>
                                </div>
                              </a>
                            </li>
                            <li class="chat-item pe-1">
                              <a href="javascript:;" class="d-flex align-items-center">
                                <div class="d-flex justify-content-between flex-grow-1 border-bottom">
                                  <div>
                                    <p class="text-body fw-bolder rounded"><b>Registered On : </b>
                                      <?= $reg_on; ?>
                                    </p>
                                  </div>
                                </div>
                              </a>
                            </li>
                            <li class="chat-item pe-1">
                              <!-- <a href="#;" class="d-flex align-items-center"> -->
                                <div class="d-flex justify-content-between flex-grow-1 border-bottom">
                                  <div>
                                    <p class="text-body fw-bolder rounded"><b>E-mail Verified: </b>
                                      <?= $verified; ?> <?php if(!$verified == 'Not Verified'): ?> <a href="#" id="verify-email"
                                        class="d-none d-sm-block" >Verify Now</a>
                                      <?php endif; ?>
                                    </p>
                                  </div>

                                  <!-- <div class="d-flex flex-column align-items-end">
                                      
                                      </div> -->
                                </div>
                              <!-- </a> -->
                            </li>
                          </ul>
                        </div>
                      </div>

                      <!-- CALLS -->
                      <div class="tab-pane fade" id="calls" role="tabpanel" aria-labelledby="calls-tab">
                        <!-- <p class="text-muted mb-1">Edit Profile</p> -->
                        <label for="profilePhoto" class="form-label">Upload Profile Image</label>
                        <ul class="list-unstyled chat-list px-1">
                          <li class="chat-item pe-1">
                            <a href="javascript:;" class="d-flex align-items-center">
                              <div class="d-flex align-items-center justify-content-between flex-grow-1 border-bottom">
                                <div>
                                  <form action="" method="post" class=" d-flex align-items-center"
                                    id="profile-update-form" enctype="multipart/formdata">
                                    <input type="hidden" name="oldimage" value="<?= $cphoto; ?>">
                                    <!-- <label class="form-label" for="formFile">File upload</label> -->
                                    <input class="form-control" type="file" name="image" id="profilePhoto">

                                    <!-- <input type="file" name="image" id="profilePhoto"> -->
                                </div>
                                <div class="d-flex flex-column align-items-end">
                                  <i data-feather="phone-call" class="text-primary icon-md"></i>
                                </div>
                              </div>
                            </a>
                          </li>
                          <li class="chat-item pe-1">
                            <a href="javascript:;" class="d-flex align-items-center">
                              <div class="d-flex align-items-center justify-content-between flex-grow-1 border-bottom">
                                <div>
                                  <div class="mb-3">
                                    <label for="name" class="form-label"> Name </label>
                                    <input type="text" class="form-control" name="name" id="name"
                                      value="<?= $cname; ?>">
                                  </div>
                                </div>
                              </div>
                            </a>
                          </li>
                          <li class="chat-item pe-1">
                            <a href="#" class="d-flex align-items-center">
                              <div class="d-flex align-items-center justify-content-between flex-grow-1 border-bottom">
                                <div>
                                  <!-- <p class="text-body">Carl Henson</p> -->
                                  <label for="gender" class="form-label">Select Gender</label>
                                  <select class="form-select" id="gender" name="gender">
                                    <option value="" disabled <?php if($cgender==null){echo 'selected' ;} ?>>Select your
                                      Gender</option>
                                    <option value="male" <?php if($cgender=='male' ){echo 'selected' ;} ?>>Male</option>
                                    <option value="female" <?php if($cgender=='female' ){echo 'selected' ;} ?>>Female
                                    </option>
                                  </select>
                                </div>
                              </div>
                            </a>
                          </li>
                          <li class="chat-item pe-1">
                            <a href="javascript:;" class="d-flex align-items-center">
                              <div class="d-flex align-items-center justify-content-between flex-grow-1 border-bottom">
                                <div>
                                  <div class="mb-3">
                                    <label for="dob" class="form-label"> Date Of Birth </label>
                                    <input type="date" class="form-control" name="dob" id="dob" value="<?= $cdob; ?>">
                                  </div>
                                </div>
                              </div>
                            </a>
                          </li>
                          <li class="chat-item pe-1">
                            <a href="javascript:;" class="d-flex align-items-center">
                              <div class="d-flex align-items-center justify-content-between flex-grow-1 border-bottom">
                                <div>
                                  <div class="mb-3">
                                    <label for="phone" class="form-label"> Phone Number </label>
                                    <input type="tel" class="form-control" name="phone" id="phone"
                                      placeholder="(+234)1234567890" value="<?= $cphone; ?>">
                                  </div>
                                </div>
                              </div>
                            </a>
                          </li>
                          <li class="chat-item pe-1">
                            <a href="javascript:;" class="d-flex align-items-center">
                              <div class="d-flex align-items-center justify-content-between flex-grow-1 border-bottom">
                                <div>
                                  <div class="mb-3">
                                    <!-- <label for="phone" class="form-label"> Phone Number </label> -->
                                    <input type="submit" class="btn btn-danger mb-1 mb-md-0" name="profile_update"
                                      id="profileUpdateBtn" placeholder="(+234)1234567890" value="Update Profile">
                                  </div>
                                </div>
                              </div>
                            </a>
                          </li>
                        </ul>
                        </form>
                      </div>

                      <!-- CONTACTS -->
                      <div class="tab-pane fade" id="contacts" role="tabpanel" aria-labelledby="contacts-tab">
                        <p class="text-muted mb-1">Change your Password</p>
                        <ul class="list-unstyled chat-list px-1">
                          <li class="chat-item pe-1">
                            <a href="#" class="#">
                              <!-- <div class="d-flex align-items-center justify-content-between flex-grow-1 border-bottom"> -->
                                <!-- <div class="col-md-6 grid-margin stretch-card"> -->
                                  <div class="row">
                                    <div class="col-md-6 grid-margin stretch-card">
                                      <h6 class="card-title"></h6>
                                      <div id="changePassAlert"></div>
                                      <!-- <div id="changePassErr1"></div> -->
                                      <!-- <p class="mb-3">Use class <code>.form-control-lg</code> or <code>.form-control-sm</code></p>								 -->
                                      
                                      </div>
                                      <form action="" method="post" id="change-pass-form">
                                      </div>
                          <li class="chat-item pe-1">
                            <a href="javascript:;" class="d-flex align-items-center">
                              <div class="d-flex align-items-center justify-content-between flex-grow-1 border-bottom">
                                <div>
                                  <label for="curpass" class="form-label">Current Password</label>
                                  <input type="password" class="form-control form-control-lg" id="curpass"
                                    name="curpass" placeholder="Current Password">
                                </div>
                              </div>
                            </a>
                          </li>
                          <li class="chat-item pe-1">
                            <a href="#" class="d-flex align-items-center">
                              <div class="d-flex align-items-center justify-content-between flex-grow-1 border-bottom">

                                <div>
                                  <label for="newpass" class="form-label">New Passwword</label>
                                  <input type="password" class="form-control form-control-lg" id="newpass"
                                    name="newpass" placeholder="New Password">
                                </div>
                              </div>
                            </a>
                          </li>
                      <li class="chat-item pe-1">
                        <a href="#" class="d-flex align-items-center">
                          <div class="d-flex align-items-center justify-content-between flex-grow-1 border-bottom">

                            <div>
                              <label for="cnewpass" class="form-label">Confirm New Password</label>
                              <input type="password" class="form-control form-control-lg" id="cnewpass" name="cnewpass"
                                placeholder="Confirm New Password">
                            </div>
                          </div>
                        </a>
                        <div>
                          <p class="" id="changePassErr" class="text-danger"></p>
                        </div>
                      </li>
                      <li class="chat-item pe-1">
                        <div class="d-flex align-items-center justify-content-between flex-grow-1 border-bottom">
                          <div>
                            <div class="mb-3">
                              <!-- <label for="phone" class="form-label"> Phone Number </label> -->
                              <input type="submit" class="btn btn-danger mb-1 mb-md-0" name="changepass"
                                id="changePassBtn" value="Change Password">
                            </div>
                          </div>
                        </div>
                        </a>
                      </li>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
              </a>
              </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</div>
</div>
</div>

<!-- partial:../../partials/_footer.html -->
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

<script type="text/javascript" src="assets/js/jquery-3.5.1.min.js"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-ajaxy/1.6.1/scripts/jquery.ajaxy.min.js"></script> -->
<script type="text/javascript" src="assets/js/profile_update.js"></script>

<script src="assets/vendors/feather-icons/feather.min.js"></script>
<script src="assets/vendors/jquery.flot/jquery.flot.js"></script>
<script src="assets/vendors/jquery.flot/jquery.flot.resize.js"></script>
<script src="assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script type="text/javascript" src="assets/js/profile_update.js"></script>

<script src="assets/vendors/core/core.js"></script>
<!-- endinject -->

<!-- Plugin js for this page -->
<!-- End plugin js for this page -->

<!-- inject:js -->
<script src="assets/vendors/feather-icons/feather.min.js"></script>
<script src="assets/js/template.js"></script>
<!-- endinject -->

<!-- Custom js for this page -->
<script src="assets/js/chat.js"></script>

<!-- End custom js for this page -->

</body>

</html>