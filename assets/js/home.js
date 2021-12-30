$(document).ready(function () {
    // send note ajax request

    $("#addNoteBtn").click(function (e) {
        if ($("#add-note-form")[0].checkValidity()) {
            e.preventDefault();
            // console.log(1);

            $("#addNoteBtn").val('Please Wait....');
            $.ajax({
                url: 'php/process.php',
                method: 'post',
                data: $("#add-note-form").serialize() + '&action=add_note',
                success: function (response) {
                    // console.log(response);
                    $("#addNoteBtn").val('Add Note');
                    $("#add-note-form")[0].reset();
                    $("#addNoteModal").modal('hide');
                    Swal.fire({
                        position: 'top-end',
                        type: 'success',
                        title: 'Note added Successfully',
                        showConfirmButton: false,
                        timer: 1500
                    });
                    displayAllNotes();
                    feather.replace()
                }
            });
        }
    });

    // EDIT NOTE OF AN USER AJAX REQUEST
    $("body").on("click", ".editBtn", function (e) {
        e.preventDefault();

        edit_id = $(this).attr('id');
        // console.log(edit_id);
        $.ajax({
            url: 'php/process.php',
            method: 'post',
            data: { edit_id: edit_id },
            success: function (response) {
                data = JSON.parse(response)
                // console.log(data);
                $("#id").val(data.id);
                $("#title").val(data.title);
                $("#note").val(data.note);
            }
        });

    });

    // UPDATE USER NOTE AJAX

    $("#editNoteBtn").click(function (e) {
        if ($("#edit-note-form")[0].checkValidity()) {
            e.preventDefault();
            $.ajax({
                url: 'php/process.php',
                method: 'post',
                data: $("#edit-note-form").serialize() + '&action=update_note',
                success: function (response) {
                    // console.log(response);
                    Swal.fire({
                        position: 'top-end',
                        type: 'success',
                        title: 'Note Updated Successfully',
                        showConfirmButton: false,
                        timer: 1500
                    });
                    $("#edit-note-form")[0].reset();
                    $("#editNoteModal").modal('hide');
                    displayAllNotes();
                }
            });

        }

    });

    // DELETE USER NOTE AJAX
    $("body").on("click", ".deleteBtn", function (e) {
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
                    url: 'php/process.php',
                    method: 'post',
                    data: { del_id: del_id },
                    success: function (response) {
                        Swal.fire(
                            'Deleted!',
                            'Note has been deleted.',
                            'success'
                        )
                        displayAllNotes();
                    }
                });

            }
        });

    });

    // DISPLAY NOTE OF AN USER

    $("body").on("click", ".infoBtn", function (e) {
        e.preventDefault();
        info_id = $(this).attr('id');
        $.ajax({
            url: 'php/process.php',
            method: 'post',
            data: { info_id: info_id },
            success: function (response) {
                // console.log(response);
                data = JSON.parse(response);
                Swal.fire({
                    type: 'info',
                    title: '<strong>Note : ID(' + data.id + ')</strong>',
                    html: '<b>Title : </b>' + data.title + '<br><br><b>Note :</br>' + data.note + '<br><br><b>Written On : </br>' + data.created_at + '<br><br><b>Updated On : </b>' + data.updated_at,
                    showCloseButton: true,
                });
            }
        });

    });



    // DISPLAY ALL NOTE OF AN USER

    displayAllNotes();
    function displayAllNotes() {
        $.ajax({
            url: 'php/process.php',
            method: 'post',
            data: { action: 'display_notes' },
            success: function (response) {
                $("#showNote").html(response);
                $('#table').DataTable({
                    order: [1, 'desc'],
                });
            }
        });
    }

    // CHECK USER LOGGED IN OR NOT

    $.ajax({
        url: 'php/action.php',
        method: 'post',
        data: { action: 'checkUser' },
        success: function (response) {
            // console.log(response);
            if (response == 'bye') {
                window.location = 'index.php';
            }
        }
    });

});