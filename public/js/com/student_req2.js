const file = document.querySelector('#image')
const container = document.querySelector('#img');
const preview = document.querySelector('#preview');
const text = document.querySelector('#text');

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
    alert('hii')
})
