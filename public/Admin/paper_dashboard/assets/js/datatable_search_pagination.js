$().ready(function() {
    $('#datatables').DataTable({
        "pagingType": "full_numbers",
        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
        responsive: true,
        language: {
            search: "_INPUT_",
            searchPlaceholder: "Search records",
            class: 'navbar-form navbar-left navbar-search-form'
        }
    });
      let table = $('#datatables').DataTable();
                // Edit record
                table.on( 'click', '.edit', function (e) {

                    let id = $(this).data('id');
                    let url = $(this).data('body');

                    //alert(url)
                    $.ajax({
                        url: url+'s/'+id,
                        method: 'GET',
                        success: function (response) {

                            console.log(response)
                            loadData(url, response)

                        }, error: function (response) {

                            modalHide();
                            swal("Failed to load data", "", "error");
                        }
                    })
                });

                // Delete a record
                table.on( 'click', '.remove', function (e) {
                    //alert('HH')
                    let id = $(this).data('id');
                    let url = $(this).data('body');
                    //alert(url)
                    swal({
                            title: "Are you sure?",
                            text: "You won't be able to retrieve this file.",
                            type: "warning",
                            showCancelButton: true,
                            confirmButtonColor: "#DD6B55",
                            confirmButtonText: "Yes, archive it!",
                            cancelButtonText: "No, cancel please!",
                            closeOnConfirm: false,
                            closeOnCancel: false
                        },
                        function(isConfirm){
                            if (isConfirm) {
                                $.ajax({
                                    url: url+'s/'+id,
                                    method: 'DELETE',
                                    data: {"_token": $('meta[name="csrf-token"]').attr('content')},
                                    success: function (data) {

                                        swal("success", "Data Updated", "success");
                                        window.location.href = url+'s'
                                    },
                                    error: function (response) {
                                        swal("error", "Failed to delete", "error");
                                    }
                                })
                                // window.location.href = url+'s/'+id;
                            } else {
                                swal("Cancelled", "Your imaginary file is safe :)", "error");
                            }
                        });

                    e.preventDefault();
                } );

});

function loadData(url, response) {
    switch (url) {
        case 'area' :
            loadArea(response);
            break;

        case 'comment':
            loadComment(response)
            // alert('Contact')
            break;

        case 'constructor' :
            loadConstructor(response)
            //tinyMCE_init();
            break;

        case 'member':
            loadMember(response)
            break;

        case 'report':
            loadReport(response);
            break;

        case 'task' :
            loadTask(response);
            break;

    }

}

function tinyMCE_init() {
    tinymce.init({
        selector:'textarea',
        height: 200,
    });
}

function loadArea(response) {
    $('#area_id').val(response.id);
    $('#area_name').val(response.area_name);
    $('#area_ward').val(response.area_ward);
    $('#area_thana').val(response.area_thana);
    $('#area_city').val(response.area_city);
}

function loadComment(response) {

    $('#comment_id').val(response.id);
    $('#user_name').text(response.member.user.name);
    $('#user_email').text(response.member.user.email);
    $('#user_phone').text(response.member.phone);
    $('#constructor_name').text(response.constructor.user.name);
    $('#constructor_email').text(response.constructor.user.email);
    $('#constructor_phone').text(response.constructor.phone);
    $('#message').text(response.comment);
    $('#photo').attr('src',response.photos)
}

function loadConstructor(response) {
    $('#constructor_id').val(response.id);
    $('#old_role').val(response.user['role']);
    $('#name').val(response.user['name']);
    $('#email').val(response.user['email']);
    $('#phone').val(response.phone);
    $('#national_id').val(response.national_id);
    $('#address').val(response.address);
    $('#old_logo').attr('src',response.photo);
}

function loadMember(response) {
    $('#constructor_id').val(response.id);
    $('#old_role').val(response.member.user.role);
    $('#name').val(response.member.user.name);
    $('#email').val(response.member.user.email);
    $('#phone').val(response.phone);
    $('#national_id').val(response.national_id);
    $('#address').val(response.address);
    $('#old_logo').attr('src',response.photo);
}

function loadReport(response) {

    $('#constructor_name').text(response.constructor.user.name);
    $('#constructor_email').text(response.constructor.user.email);
    $('#constructor_phone').text(response.constructor.user.phone);
    $('#task_id').text(response.task.task_name);
    $('#task_area').text(response.area.area_name);
    $('#report').text(response.report_details);
    $('#report_image').attr('src',response.report_images);
}

function loadTask(response) {
    $('#task_id').val(response.id);
    $('#old_constructor').val(response.constructor.user.name);
    $('#old_area').val(response.area.area_name);
    $('#task_name').val(response.task_name);
    $('#task_details').val(response.task_details);
    $('#task_budget').val(response.task_budget);
}
function modalHide() {
    $('#Modal').modal('hide')
}

