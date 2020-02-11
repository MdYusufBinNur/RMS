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
        case 'about' :
            loadAbout(response);
            break;

        case 'contact':
            // alert('Contact')
            break;

        case 'course' :
            loadCourse(response)
            //tinyMCE_init();
            break;

        case 'countrie':
            loadCountry(response)
            break;

        case 'universitie':
            loadUniversity(response);
            break;

        case 'procedure' :
            tinyMCE_init();
            loadProcedure(response);
            break;

        case 'program':
            loadPrograms(response);
            break;

        case 'scholarship':
            loadScholarship(response);
            break;

        case 'service':
            loadService(response);
            break;

        case 'linker':
            loadLinker(response);
            break;

        case 'storie':
            loadStory(response);
            break;

        case 'testimonial':
            loadTestimonial(response);
            break;

        case 'applie':
            loadApplicant(response)
            break;

        case 'owner':
            loadOwnerInfo(response);
            break;

        case 'slider':
            loadSlider(response);
            break;

        case 'blog':
            loadBlog(response);
            break;

        case 'institute':
            loadInstitute(response);
            break;
    }

}

function tinyMCE_init() {
    tinymce.init({
        selector:'textarea',
        height: 200,
    });
}

function modalHide() {
    $('#Modal').modal('hide')
}

function loadAbout(response) {
    $('#about_id').val(response.id);
    $('#about_title').val(response.about_title);
    $('#about_description').val(response.about_description);
    $('#about_mission').val(response.about_mission);
    $('#about_vision').val(response.about_vision);
    $('#old_logo').attr('src',response.about_image);
}

function loadCountry(response) {
    console.log(response)
    $('#country_id').val(response.id);
    $('#country_name').val(response.country_name);
    $('#at_a_glance').val(response.at_a_glance);
    $('#old_logo').attr('src',response.country_image);
}

function loadUniversity(response) {
    console.log(response)
    $('#university_id').val(response.id)
    $('#old_country_name').val(response.country['country_name'])
    $('#university_name').val(response.university_name)
    $('#university_description').val(response.university_description)
    $('#old_logo').attr('src',response.university_image);

}

function loadPrograms(response) {
    $('#program_id').val(response.id);
    $('#old_university_name').val(response.university['university_name']);
    $('#program_name').val(response.program_name);

}

function loadCourse(response) {
    $('#course_id').val(response.id);
    $('#old_program_name').val(response.program['program_name']);
    $('#course_name').val(response.course_name);
    $('#course_details').text(response.course_details);
}

function loadOwnerInfo(response) {
    $('#owner_id').val(response.id);
    $('#owner_name').val(response.owner_name);
    $('#owner_message').val(response.owner_message);
    $('#old_logo').attr('src',response.owner_image);
}

function loadProcedure(response) {
    $('#procedure_id').val(response.id);
    $('#old_country_name').val(response.country['country_name']);
    $('#description').val(response.description);

}

function loadScholarship(response) {
    $('#scholarship_id').val(response.id);
    $('#scholarship_title').val(response.scholarship_title);
    $('#scholarship_description').val(response.scholarship_description);
    $('#old_logo').attr('src',response.scholarship_image);
}

function loadService(response) {

    $('#service_id').val(response.id);
    $('#service_title').val(response.service_title);
    $('#service_description').val(response.service_description);
    $('#old_logo').attr('src',response.service_image);
}

function loadLinker(response) {
    $('#social_linker_id').val(response.id);
    $('#name').val(response.name);
    $('#social_link').val(response.social_link);
    $('#old_logo').attr('src',response.social_icon);
}

function loadSlider(response) {
    $('#slider_id').val(response.id);
    $('#slider_name').val(response.slider_name);
    $('#old_logo').attr('src',response.slider_image);

}

function loadStory(response) {
    $('#success_story_id').val(response.id);
    $('#old_country').val(response.country['country_name']);
    $('#description').val(response.description);
    $('#source').val(response.source);
    $('#title').val(response.title);
    $('#old_logo').attr('src',response.story_image);

}

function loadTestimonial(response) {
    $('#testimonial_id').val(response.id);
    $('#testimonial_title').val(response.testimonial_title);
    $('#testimonial_description').val(response.testimonial_description);
    $('#old_logo').attr('src',response.testimonial_image);
}

function loadBlog(response) {
    $('#blog_id').val(response.id);
    $('#blog_title').val(response.blog_title);
    $('#blog_description').val(response.blog_description);
    $('#old_logo').attr('src',response.blog_image);
}

function loadApplicant(response) {
    $('#applicant_id').val(response.id);
    $('#applicant_name').text(response.first_name + ' ' + response.last_name);
    $('#applicant_email').text(response.email);
    $('#applicant_mobile').text(response.mobile);
    $('#applicant_nationality').text(response.nationality);
    $('#applicant_pre_address').text(response.present_address);
    $('#applicant_per_address').text(response.permanent_address);
    $('#applicant_dob').text(response.dob);
    $('#applicant_interested_course').text(response.interested_course);
    $('#applicant_academic_certificate').text(response.academic_files);
    $('#applicant_present_qualification').text(response.previous_qualification);
    $('#applicant_research_paper').text(response.research_paper);
    $('#applicant_image').attr('src',response.photo);
    $('#applicant_academic_certificate_').attr('href',response.academic_files);
    $('#applicant_research_paper_').attr('href',response.research_paper);
}

function loadInstitute(response) {
    $('#institute_id').val(response.id);
    $('#institute_name').val(response.institute_name);
    $('#old_logo').attr('src',response.institute_image);
}
