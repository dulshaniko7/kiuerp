let dep_code = document.querySelector('#dep_code');
let batchType_code = document.querySelector('#batch_type_code');
let batch_code = document.querySelector('#batch_code');

$('#faculty_id').click(function () {

    let faculty_id = $(this).val();

    if (faculty_id) {
        console.log('hii' + faculty_id);
        $.ajax({
            url: '/slo/getDepartments/' + faculty_id,
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                $('#dept_id').empty();
                $.each(data, function (key, value) {
                    $('#dept_id').append('<option value="' + key + '">' + value + '</option>');
                });
            }
        })
    }
});

$('#dept_id').click(function () {
    let code = null;
    var dept_id = $(this).val();


    $.ajax({
        url: '/slo/getDepartment/' + dept_id,
        type: 'GET',
        dataType: 'json',
        success: function (data) {
            console.log(data['dept_code'])
            code = data['dept_code'];
            dep_code.innerText = code;
        }
    })

    if (dept_id) {
        $.ajax({
            url: '/slo/getCourses/' + dept_id,
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                console.log(data);

                $('#course_id').empty();
                $.each(data, function (key, value) {
                    $('#course_id').append('<option value="' + key + '">' + value + '</option>');
                });
            }
        })
    }
})

$('#course_id').click(function () {

    var course_id = $(this).val();

    if (course_id) {

        $.ajax({
            url: '/slo/getBatches/' + course_id,
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                console.log(data);
                $('#batch_id').empty();
                $.each(data, function (key, value) {
                    $('#batch_id').append('<option value="' + key + '">' + value + '</option>');
                });
            }
        })
    }
})

$('#batch_id').click(function () {

    var batch_id = $(this).val();
    let code = null;
    if (batch_id) {

        $.ajax({
            url: '/slo/getBatchType/' + batch_id,
            type: 'GET',
            dataType: 'json',
            success: function (data) {

                console.log(data['batch_type'])
                t_code = data['batch_type'];
                if (code < 10) {
                    t_code = '0' + t_code;
                } else {
                    t_code = t_code;
                }
                batchType_code.innerText = t_code;
                code = data['batch_code'];
                batch_code.innerText = code
            }
        })
    }
})



