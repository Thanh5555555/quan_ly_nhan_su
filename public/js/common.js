$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('input[name=employee_name]').change(function() {
        var empId = $(this).attr('empId');
        $.ajax({
            type:'PUT',
            url:'employees/ajax/' + empId ,
            data: {
                name: this.value
            },
            success:function(data) {

                if (data.status == false) {
                    console.log(data);
                }
            }
        });
    });

});
