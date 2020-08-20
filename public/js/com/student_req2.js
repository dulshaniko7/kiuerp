const file = document.querySelector('#image')
const container = document.querySelector('#img');
const preview = document.querySelector('#preview');
const text = document.querySelector('#text');

const course = document.querySelector('#course_id')

let course_id = course.value;
console.log(course_id)
const req = document.querySelector('#req');

file.addEventListener("change", function () {
    const f = this.files[0];

    if (f) {
        const reader = new FileReader();
        preview.style.display = "block"
        reader.addEventListener("load", function () {
            preview.setAttribute("src", this.result)
        });

        reader.readAsDataURL(f)
    } else {
        preview.style.display = null
        preview.setAttribute("src", "")
    }
})

req.addEventListener('click', function () {
    id = parseInt(course_id);
    req.style.visibility = 'hidden'


    fetch('/slo/getCourseRequirements/' + id)
        .then(res => res.json())
        .then(data => {
            console.log(' requirements' + data)
            //  let groupStart = data;

            console.log(data[0]['edu_req'])
            console.log(data[0]['pro_req'])
            console.log(data[0]['work_req'])
            console.log(data[0]['ref_req'])
            if (data[0]['edu_req'])
                if (data[0]['edu_req'].length > 0) {
                    for (i = 0; i < data[0]['edu_req'].length; i++) {
                        console.log("this is edu")
                        let html = '';
                        html += '<div class="row">'
                        html += '<div class="col-md-10"><div class="form-group"><label for="qualifications">Educational Qualifications:</label>'
                        html += ' <input type="text" name="" class="form-control mb-2" placeholder="Year"> '
                        html += ' <input type="text" name="" class="form-control mb-2" placeholder="School"> '
                        html += ' <input type="text" name="" class="form-control mb-2" placeholder="Qualification Obtained"> '
                        html += ' <input type="text" name="" class="form-control mb-2" placeholder="Results"></div></div></div> '
                        $('#newHtml').append(html)
                    }
                } else {
                    console.log("no edu")
                }
            console.log("no new")

            if (data[0]['pro_req']) {
                if (data[0]['pro_req'].length > 0) {
                    for (i = 0; i < data[0]['pro_req'].length; i++) {
                        console.log("this is pro")
                        let html = '';
                        html += '<div class="row">'
                        html += '<div class="col-md-10"><div class="form-group"><label for="qualifications">Professional Qualifications:</label>'
                        html += ' <input type="text" name="" class="form-control mb-2" placeholder="Year"> '
                        html += ' <input type="text" name="" class="form-control mb-2" placeholder="Institute"> '
                        html += ' <input type="text" name="" class="form-control mb-2" placeholder="Qualification Obtained"> '
                        html += ' <input type="text" name="" class="form-control mb-2" placeholder="Results"></div></div></div> '
                        $('#newHtml').append(html)
                    }
                } else {
                    console.log("no pro")
                }
                console.log("no new")
            }

            if (data[0]['work_req'])
                if (data[0]['work_req'].length > 0) {
                    for (i = 0; i < data[0]['work_req'].length; i++) {
                        console.log("this is work")
                        let html = '';
                        html += '<div class="row">'
                        html += '<div class="col-md-10"><div class="form-group"><label for="qualifications">Working Experience:</label>'
                        html += ' <input type="text" name="" class="form-control mb-2" placeholder="Year"> '
                        html += ' <input type="text" name="" class="form-control mb-2" placeholder="Institute"> '
                        html += ' <input type="text" name="" class="form-control mb-2" placeholder="Qualification Obtained"> '
                        html += ' <input type="text" name="" class="form-control mb-2" placeholder="Results"></div></div></div> '
                        $('#newHtml').append(html)
                    }
                } else {
                    console.log("no work")
                }
            console.log("no new")

            if (data[0]['ref_req']) {
                if (data[0]['ref_req'].length > 0) {
                    for (i = 0; i < data[0]['ref_req'].length; i++) {
                        let html = '';
                        html += '<div class="row">'
                        html += '<div class="col-md-10"><div class="form-group"><label for="qualifications">References:</label>'
                        html += ' <textarea  name="" class="form-control mb-2" rows="5" placeholder="Reference"></textarea> '
                        html += '</div></div></div> '
                        $('#newHtml').append(html)
                    }
                } else {
                    console.log("no ref")
                }
                console.log('no new')
            }
        })

})


