$(document).ready(function(){
    // $(".delete-student").on('click', function(){
    //     // $('#delete-modal').modal();
    //     bootbox.confirm({
    //         message: "هل أنت متأكد من رغبتك في حذف الطالب :" + $("#thisStudent").val() + "?" ,
    //         buttons: {
    //             confirm: {
    //                 label: 'Yes',
    //                 className: 'btn-success'
    //             },
    //             cancel: {
    //                 label: 'No',
    //                 className: 'btn-danger'
    //             }
    //         },
    //         callback: function (result) {
    //             if (result) {
    //                 console.log(result);
    //                 $('#delete-student-form').submit();
    //             }
                
    //         }
    //     });

    // });
    var studentId = 0;
    $('.delete-student').on('click', function(event) {
        // studentName = event.target.parentNode.childNodes[3];
        studentId = event.target.parentNode.dataset['studentid'];
        studentName = event.target.parentNode.dataset['studentname'];
        $('#student-name').text(studentName);
        console.log(studentId);
        $('#modal-delete').modal();
    });

    $('#delete-student-yes').on('click', function() {
        $.ajax({
            method: 'GET',
            url: "/deletestudent/" + studentId,
            data: {id: studentId, _token: token}
        })
        .done(function (msg) {
            
            $('#modal-delete').modal('hide');
            location.reload();
        });
    });
    


    $("#save-classroom-participations").on('click', function(){
        // $('#delete-modal').modal();
        bootbox.confirm({
            message: "هل أنت متأكد من رغبتك في حفظ الدرجات المدخلة?",
            buttons: {
                confirm: {
                    label: 'Yes',
                    className: 'btn-success'
                },
                cancel: {
                    label: 'No',
                    className: 'btn-danger'
                }
            },
            callback: function (result) {
                if (result) {
                    $('#class-participations-form').submit();
                }
                
            }
        });

    });

}); // end of document ready

