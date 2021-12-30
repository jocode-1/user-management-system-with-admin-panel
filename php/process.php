<?php 

require_once 'session.php';

if (isset($_POST['action']) && $_POST['action'] == 'add_note' ) { 
    // print_r($_POST);

    $title = $cuser->test_input($_POST['title']);
    $note = $cuser->test_input($_POST['note']);

    $cuser->add_new_note($cid, $title, $note);
    $cuser->notification($cid, 'admin', 'New Note Added'); 

}

if (isset($_POST['action']) && $_POST['action'] == 'display_notes' ) { 
    // print_r($_POST); 
    $output = '';

    $notes = $cuser->get_notes($cid);
    // print_r($notes);

    if($notes) {
     $output .= '<table class="table table-bordered table-sm">
     <thead>
         <tr>
             <th>#</th>
             <th>Title</th>
             <th>Note</th>
             <th>Action</th>
         </tr>
     </thead>
     <tbody>';
     foreach ($notes as $row) {
        $output .= '<tr>
        <td>'.$row['id'].'</td>
        <td>'.$row['title'].'</td>
        <td>'.substr($row['note'], 0, 75).'...</td>
        <td> 
        <a class="btn btn-success infoBtn" href="#" title="View Details" id="'.$row['id'].'" aria-label="Info">
        <i class="fa fa-info-circle" aria-hidden="true"></i></a>
        <a class="btn btn-primary editBtn" title="Edit note" id="'.$row['id'].'" aria-label="Edit">
        <i class="fa fa-pencil-square-o" aria-hidden="true" data-bs-toggle="modal" data-bs-target="#editNoteModal"></i></a>
        <a class="btn btn-danger deleteBtn" title="Delete" href="#" id="'.$row['id'].'" aria-label="Delete">
        <i class="fa fa-trash-o" aria-hidden="true"></i>
        </a>
        </td>
        </tr>';
     }
     $output .='</tbody></table>';
     echo $output;  
    // var_dump($output);
     } else {
        echo '<h3 class= "text-center text-secondary">You have not written any note yet! Write your first note now!</h>';
    } 
 }


//  EDIT NOTE AJAX REQUEST
if (isset($_POST['edit_id'])) {
    // print_r($_POST);
    $id = $_POST['edit_id'];

    $row = $cuser->edit_note($id);
    echo json_encode($row);

}

// HANDLE UPDATE NOTE AJAX REQUEST
if (isset($_POST['action']) && $_POST['action'] == 'update_note' ) { 
    // print_r($_POST);

    
    $id = $cuser->test_input($_POST['id']);
    $title = $cuser->test_input($_POST['title']);
    $note = $cuser->test_input($_POST['note']);

    $cuser->update_note($id, $title, $note);
    $cuser->notification($cid, 'admin', 'Note Updated');
    

} 

// DELETE USER NOTE
if (isset($_POST['del_id'])) {
    // print_r($_POST);
    $id = $_POST['del_id'];

    $cuser->delete_note($id);
    $cuser->notification($cid, 'admin', 'Note Deleted');

}

// VIEW NOTE OF AN USER

if (isset($_POST['info_id'])) {
    // print_r($_POST);
    $id = $_POST['info_id'];

    $row = $cuser->edit_note($id);
    echo json_encode($row);

}

// HANDLE PROFILE UPDATE AJAX REQUEST

if(isset($_FILES['image'])) {
    // print_r($_FILES);
    // print_r($_POST);
    $name = $cuser->test_input($_POST['name']);
    $gender = $cuser->test_input($_POST['gender']);
    $dob = $cuser->test_input($_POST['dob']);
    $phone = $cuser->test_input($_POST['phone']);

    $oldImage = $_POST['oldimage'];
    $folder = 'uploads/';

    if(isset($_FILES['image']['name']) && ($_FILES['image']['name'] != "")) {
        $newImage = $folder.$_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'], $newImage);

        if ($oldImage != null) {
            unlink($oldImage);
        }
    } 
    else {
        $newImage = $oldImage;
    }
    $cuser->update_profile($name, $gender, $dob, $phone, $newImage, $cid);
    $cuser->notification($cid, 'admin', 'Profile Updated');

}

// Change User PASSWORD EDIT PROFILE

if (isset($_POST['action']) && $_POST['action'] == 'change_pass' ) { 
    // print_r($_POST); 
    $currentPass = $_POST['curpass'];
    $newPass = $_POST['newpass'];
    $cnewPass = $_POST['cnewpass'];

    $hnewPass = password_hash($newPass, PASSWORD_DEFAULT);

    if ($newPass != $cnewPass) {
        echo $cuser->showMessage('danger', 'Password did not Matched');
    } 
    else {
        if (password_verify($currentPass, $cpass)) {
            $cuser->change_password($hnewPass, $cid);
            echo $cuser->showMessage('success', 'Password Successfully Changed');
            $cuser->notification($cid, 'admin', 'Password Changed');
        }   
        else {
            echo $cuser->showMessage('danger', 'Password is Wrong boss!');
        }
    }

}

// SEND FEEDBACK AJAX REQUEST

if (isset($_POST['action']) && $_POST['action'] == 'feedback' ) { 
    // print_r($_POST); 
    $subject = $cuser->test_input($_POST['subject']);
    $feedback = $cuser->test_input($_POST['feedback']);

    $cuser->send_feedback($cid, $subject, $feedback);
    $cuser->notification($cid, 'admin', 'Feedback Written');

}

// FETCH NOTIFICATION

if (isset($_POST['action']) && $_POST['action'] == 'fetchNotification' ) { 
    print_r($_POST); 


}


?>