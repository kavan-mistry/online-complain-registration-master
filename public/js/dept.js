function showDiv(select) {
    if (select.value == 3) {
        document.getElementById('hidden_div').style.display = "block";
    } else {
        document.getElementById('hidden_div').style.display = "none";
    }
}

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            $('#blah')
                .attr('src', e.target.result);
        };

        reader.readAsDataURL(input.files[0]);
    }
}