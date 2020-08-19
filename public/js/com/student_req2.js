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
            if (data[0]['edu_req'].length > 0) {
                console.log("this is edu")
                let html = '';
                html += '<br> Educational Qualifications'
                html += ' <input type="text" name="" class="form-control"> ';
                $('#newHtml').append(html)
            } else {
                console.log("no edu")
            }

            if (data[0]['pro_req'].length > 0) {
                console.log("this is pro")
                let html = '';
                html += 'Professional Qualification'
                html += ' <input type="text" name="" class="form-control"> ';
                $('#newHtml').append(html)
            } else {
                console.log("no pro")
            }

            if (data[0]['work_req'].length > 0) {
                console.log("this is work")
                let html = '';
                html += 'Working Experiences'
                html += ' <input type="text" name="" class="form-control"> ';
                $('#req').append(html)
            } else {
                console.log("no work")
            }

            if (data[0]['pro_req'].length > 0) {
                let html = '';
                html += 'References'
                html += ' <input type="text" name="" class="form-control"> ';
                $('#req').append(html)
            } else {
                console.log("no ref")
            }
        })
})


