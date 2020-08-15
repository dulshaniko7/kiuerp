let dep_code = document.querySelector('#dep_code');
let batchType_code = document.querySelector('#batch_type_code');
let batch_code = document.querySelector('#batch_code');
let nic = document.querySelector('#nic');
let passport = document.querySelector('#passport');
let country = document.querySelector('#country');
var std_id = document.querySelector('#std_id');
let gen_id = document.querySelector('#gen_id');
let cgsid = document.querySelector('#cgsid');
let notification = document.querySelector('#noti');

var d_code = null
let bt_code = null
let b_code = null
var s_code = null

let d
let bt
let b
let qid


country.style.visibility = "hidden"

/*
$(document).ready(function () {
    //student id
    $.ajax({
        url: '/slo/getStudentId',
        type: 'GET',
        dataType: 'json',
        success: function (data) {
            let id = null
            getId = null
            console.log('data'+data)

            if (data < 10) {
                id = '0000' + data
            } else if (data < 100) {
                id = '000' + data
            } else if (data < 1000) {
                id = '00' + data
            } else if (data < 10000) {
                id = '0' + data
            } else {
                id = data
            }

            std_id.textContent = ' ' + id
            s_code = id;
            console.log('id ' + id)
            console.log('s code' + s_code)
        }
    })

})

*/
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
    d = $(this).val();

    $.ajax({
        url: '/slo/getDepartment/' + dept_id,
        type: 'GET',
        dataType: 'json',
        success: function (data) {
            console.log(data['dept_code'])
            code = data['dept_code'];
            dep_code.innerText = code;
            d_code = code;
            console.log('d code ' + d_code)

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

var course;
$('#course_id').click(function () {

    course = $(this).val();
    console.log('course id ' + course);
    console.log('d is ' + d)

    /*
    let std_code = d_code + '00' + ' ' + bt_code + b_code + ' ' + id
    console.log(std_code)
    std_id.textContent = ' ' + id;
    gen_id.value = std_code;
*/

    if (course) {

        $.ajax({
            url: '/slo/getBatches/' + course,
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                console.log("course id is last" + course_id);
                console.log("course id is" + course);
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
    console.log('d is ' + d)
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
                bt_code = t_code
                console.log('bt code' + bt_code)
                bt = bt_code;
                code = data['batch_code'];
                batch_code.innerText = code
                b_code = code
                b = b_code
                console.log('b code' + b_code)


                // console.log('bt'+ bt)
                /*
                                $.ajax({
                                    url: '/slo/getStudentId',
                                    type: 'GET',
                                    dataType: 'json',
                                    success: function (data) {
                                        let code1;
                                        getId = null
                                        console.log('00' + data);

                                        if (data < 10) {
                                            id = '0000' + data
                                        } else if (data < 100) {
                                            id = '000' + data
                                        } else if (data < 1000) {
                                            id = '00' + data
                                        } else if (data < 10000) {
                                            id = '0' + data
                                        } else {
                                            id = data
                                            console.log(id)
                                        }

                                    }
                                })
                */
                $.ajax({
                    url: '/slo/getIdRange/' + course,
                    type: 'GET',
                    dataType: 'json',
                    success: function (data) {


                        console.log((data + 1));
                        let no = parseInt((data));
                        no = no + 1
                        console.log('no is' + no)
                        if (no < 10) {
                            id = '0000' + no
                        } else if (no < 100) {
                            id = '000' + no
                        } else if (no < 1000) {
                            id = '00' + no
                        } else if (no < 10000) {
                            id = '0' + no
                        } else {
                            id = no
                            console.log(id)
                        }
                    }
                })
                //create the std code
                //  let std_code = d_code + '00' + ' ' + bt_code + b_code + ' ' + id
                // console.log(std_code)
                // std_id.textContent = ' ' + id;
                //  gen_id.value = std_code;


            }
        })
    }
})

let courseId = document.querySelector('#course_id');

let title = document.querySelector('#std_title');
title.addEventListener('click', function () {
    console.log(d)
    console.log(bt)
    console.log(b)
    console.log(qid)

    gen = d +'00'+' '+ bt + b +' '+ qid
    console.log(gen)
        gen_id.value = gen
})

passport.addEventListener('click', function () {
    country.style.visibility = 'visible';

})

nic.addEventListener('click', function () {
    country.style.visibility = 'hidden';

})


function getCgsid(id) {
    fetch('/slo/getIdStart/' + id)
        .then(res => res.json())
        .then(data => {
            console.log(data)

            cgsid.value = data;
            console.log(cgsid.value);
            cgsid.textContent = cgsid.value;


        })
        .catch(err => console.log(err));

}

function getStudentCount(id) {
    fetch('/slo/getStudentCount/' + id)
        .then(res => res.json())
        .then(data => {
            console.log("course student count" + data);
            let last = data;
            console.log(last);
            lastNo = parseInt(last);
            lastNo++;
            console.log(lastNo)
        })

}


function group(id) {

    console.log('d is ' + d)

    fetch('/slo/group/' + id)
        .then(res => res.json())
        .then(data => {
            console.log(' id group starting no' + data)
            let groupStart = data;

            console.log(data)
            let no = parseInt((data));
            console.log(lastNo);
            req_id = no + lastNo
            console.log(req_id)
            qid = req_id
            console.log(qid)
            bt_code = batchType_code.textContent
            console.log('bt' + bt_code)

            let std_code = d_code + '00' + ' ' + bt_code + b_code + ' ' + req_id
            console.log(std_code)
            std_id.textContent = ' ' + req_id;
            //  gen_id.value = std_code;

        })
}



