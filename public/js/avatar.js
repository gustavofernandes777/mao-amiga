function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#change')
                .attr('src', e.target.result)
                .width(128)
                .height(128);
        };

        reader.readAsDataURL(input.files[0]);
    }
}