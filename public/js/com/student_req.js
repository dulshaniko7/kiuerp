
$(document).ready(function () {
    console.log('hi')
    
   
});

$('#faculty_id').change(function () {

    var faculty_id = $(this).val();

    if(faculty_id){
        console.log('hii'+faculty_id);
        $.ajax({
            url: '/slo/getDepartments/'+faculty_id,
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                console.log(data);

                $('#dept_id').empty();
                $.each(data, function (key,value) {
                    $('#dept_id').append('<option value="'+key+'">' + value + '</option>');
                });
            }
        })
    }
});

$('#dept_id').change(function () {

    var dept_id = $(this).val();

    if(dept_id){
        console.log('hiiiii dep'+dept_id);
        console.log('working');
        $.ajax({
            url: '/slo/getCourses/'+dept_id,
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                console.log(data);
                $('#course_id').empty();
                $.each(data, function (key,value) {
                    $('#course_id').append('<option value="'+key+'">' + value + '</option>');
                });
            }
        })
    }
})

$('#course_id').change(function () {

    var course_id = $(this).val();

    if(course_id){
        console.log('hii batch'+course_id);
        console.log('working batch');
        $.ajax({
            url: '/slo/getBatches/'+course_id,
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                console.log(data);
                $('#batch_id').empty();
                $.each(data, function (key,value) {
                    $('#batch_id').append('<option value="'+key+'">' + value + '</option>');
                });
            }
        })
    }
})
