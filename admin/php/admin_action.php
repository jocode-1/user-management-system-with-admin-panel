<?php 

// require_once 'session.php';
require_once 'admin_db.php';
$admin = new Admin();

if (isset($_POST['action']) && $_POST['action'] == 'adminLogin' ) { 
    // print_r($_POST);
    $username = $admin->test_input($_POST['username']);
    $password = $admin->test_input($_POST['password']);

    $hpassword = sha1($password);
    $loggedInAdmin = $admin->admin_login($username, $hpassword);
    if($loggedInAdmin != null) {
            echo 'admin_login';
            $_SESSION['username'] = $username;
        } else {
            echo $admin->showMessage('danger','Username or Password is Incorrect!!!!');
        }
}

// HANDLE FETCH ALL USERS AJAX REQUEST
if (isset($_POST['action']) && $_POST['action'] == 'fetchAllUsers' ) { 
    // echo 'working';
    $output = '';
    $data = $admin->fetchAllUsers(0);
    $path = '../php/';

    if($data){
        $output .= '<table class="table table-striped" id="table-1">
                    <thead>
                        <tr>
                        <th>#</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>E-mail</th>
                        <th>Phone</th>
                        <th>Gender</th>
                        <th>Verified</th>
                        <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>';
                foreach($data as $row) {
                    if ($row['photo'] != '') {
                        $uphoto = $path.$row['photo'];
                    } else {
                        $uphoto = '../assets/images/others/profile-cover.png';
                    }
                    $output .= '<tr>
                                <td>'.$row['id'].'</td>
                                <td><img src="'.$uphoto.'" class="rounded-circle" width="40" height="40"></td>
                                <td>'.$row['name'].'</td>
                                <td>'.$row['email'].'</td>
                                <td>'.$row['phone'].'</td>
                                <td>'.$row['gender'].'</td>
                                <td>'.$row['verified'].'</td>
                                <td> 
                                <a class="btn btn-primary usersDetailsIcon" data-toggle="modal" data-target="#showUsersDetailsModal" href="#" title="View Details" id="'.$row['id'].'" aria-label="Info">
                                Details</a>
                                <a class="btn btn-danger deleteUserIcon" title="Delete" href="#" id="'.$row['id'].'" aria-label="Delete">
                                Delete</a>
                                </td>
                                </tr>';
                }
                    $output .= ' </tfoot>
                                </table>';
                                echo $output;
                } else {
        echo '<h3 class= "text-center text-secondary">:(No Any user Registered yet!</h>';
    
    }
}

// HANDLE FETCH USER DETAILS BY ID AJAX REQUEST

if (isset($_POST['details_id'])) { 
    // print_r($_POST);
    $id = $_POST['details_id'];

    $data = $admin->fetchUsersDetailsById($id);
    echo json_encode($data);
}

// handle delete user admin
if (isset($_POST['del_id'])) {
    // print_r($_POST);
    $id = $_POST['del_id'];

    $admin->userAction($id, 0);

}

// HANDLE FETCH DELETED USERS AJAX

if (isset($_POST['action']) && $_POST['action'] == 'fetchAllDeletedUsers' ) { 
    // echo 'working';
    $output = '';
    $data = $admin->fetchAllUsers(1);
    $path = '../php/';

    if($data){
        $output .= '<table class="table table-striped" id="table-1">
                    <thead>
                        <tr>
                        <th>#</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>E-mail</th>
                        <th>Phone</th>
                        <th>Gender</th>
                        <th>Verified</th>
                        <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>';
                foreach($data as $row) {
                    if ($row['photo'] != '') {
                        $uphoto = $path.$row['photo'];
                    } else {
                        $uphoto = '../assets/images/others/profile-cover.png';
                    }
                    $output .= '<tr>
                                <td>'.$row['id'].'</td>
                                <td><img src="'.$uphoto.'" class="rounded-circle" width="40" height="40"></td>
                                <td>'.$row['name'].'</td>
                                <td>'.$row['email'].'</td>
                                <td>'.$row['phone'].'</td>
                                <td>'.$row['gender'].'</td>
                                <td>'.$row['verified'].'</td>
                                <td><a class="btn btn-light restoreUserIcon" title="Restore User" href="#" id="'.$row['id'].'" aria-label="Delete">
                                Restore</a>
                                </td>
                                </tr>';
                }
                    $output .= ' </tfoot>
                                </table>';
                                echo $output;
                } else {
        echo '<h3 class= "text-center text-secondary">:(No Any user Deleted yet!</h>';
    
    }
}

// handle restore deleted user admin
if (isset($_POST['res_id'])) {
    // print_r($_POST);
    $id = $_POST['res_id'];

    $admin->userAction($id, 1);
    // $admin->notification($cid, 'admin', 'Note Deleted');

}

// FETCH ALL NOTES 

if (isset($_POST['action']) && $_POST['action'] == 'fetchAllNotes' ) { 
    // echo 'working';
    $output = '';
    $note = $admin->fetchAllNotes();

    if($note){
        $output .= '<table class="table table-striped" id="table-1">
                    <thead>
                        <tr>
                        <th>#</th>
                        <th>User Name</th>
                        <th>User Email</th>
                        <th>Note Title</th>
                        <th>Note</th>
                        <th>Written On</th>
                        <th>Updated On</th>
                        <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>';
                foreach($note as $row) {
                    $output .= '<tr>
                                <td>'.$row['id'].'</td>
                                <td>'.$row['name'].'</td>
                                <td>'.$row['email'].'</td>
                                <td>'.$row['title'].'</td>
                                <td>'.$row['note'].'</td>
                                <td>'.$row['created_at'].'</td>
                                <td>'.$row['updated_at'].'</td>
                                <td>
                                <a class="btn btn-danger deleteNoteIcon" title="Delete Note" href="#" id="'.$row['id'].'" aria-label="Delete">
                                Delete</a>
                                </td>
                                </tr>';
                }
                    $output .= ' </tfoot>
                                </table>';
                                echo $output;
                } else {
        echo '<h3 class= "text-center text-secondary">:(No Any Note Written yet!</h>';
    
    }
}
// delete admin note
if (isset($_POST['note_id'])) {
    // print_r($_POST);
    $id = $_POST['note_id'];

    $admin->deleteNoteOfUser($id);

}

// FETCH USERS FEEDBACK
if (isset($_POST['action']) && $_POST['action'] == 'fetchFeedback' ) { 
    // echo 'working';
    $output = '';
    $feedback = $admin->fetchAllFeedback();

    if($feedback){
        $output .= '<table class="table table-striped" id="table-1">
                    <thead>
                        <tr>
                        <th>FID</th>
                        <th>UID</th>
                        <th>User Name</th>
                        <th>User E-mail</th>
                        <th>Subject</th>
                        <th>Feedback</th>
                        <th>Sent On</th>
                        <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>';
                foreach($feedback as $row) {
                    $output .= '<tr>
                                <td>'.$row['id'].'</td>
                                <td>'.$row['uid'].'</td>
                                <td>'.$row['name'].'</td>
                                <td>'.$row['email'].'</td>
                                <td>'.$row['subject'].'</td>
                                <td>'.$row['feedback'].'</td>
                                <td>'.$row['created_at'].'</td>
                                <td>
                                <a class="btn btn-primary replyFeedbackIcon" title="Reply" href="#" id="'.$row['id'].'" aria-label="Reply">
                                Reply</a>
                                </td>
                                </tr>';
                }
                    $output .= ' </tfoot>
                                </table>';
                                echo $output;
                } else {
        echo '<h3 class= "text-center text-secondary">:(No Feedback Written yet!</h>';
    
    }
}

// HANDLE EXPORT ALL USERS IN EXCEL
if (isset($_GET['export']) && $_GET['export'] == 'excel' ) {
    header("Content-Type: application/xls");
    header("Content-Disposition: attachment; filename=users.xls");
    header("Pragma: no-cache");
    header("Expires: 0");

    $data = $admin->exportAllUsers();
            echo '<table border=1 align=center>';

            echo'<tr>
            <th>#</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Gender</th>
            <th>DOB</th>
            <th>Joined On</th>
            <th>Verified</th>
            <th>Deleted</th>
            </tr>';

               foreach($data as $row) {
                    echo '<tr>
                                <td>'.$row['id'].'</td>
                                <td>'.$row['name'].'</td>
                                <td>'.$row['email'].'</td>
                                <td>'.$row['phone'].'</td>
                                <td>'.$row['gender'].'</td>
                                <td>'.$row['dob'].'</td>
                                <td>'.$row['created_at'].'</td>
                                <td>'.$row['verified'].'</td>
                                <td>'.$row['deleted'].'</td> 
                                </tr>';
                }
                    echo  '</table>';

 }



    
?>