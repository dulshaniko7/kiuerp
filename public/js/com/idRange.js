$("#course_id").change(function () {
    var id = $(this).val();

    if (id) {
        $.ajax({
            type: 'GET',
            url:"/slo/idRange/start/" + id,
            success: function (response) {
                console.log(response.end)
                let value = (response.end[0].end)
                value++;

                $('#start').val(value)

            }
        })
    }

});
