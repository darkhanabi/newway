$(document).ready(function() {

    //Preview the portrait image when file is chosen
    function previewPortrait(input, heroId) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            var imgElement = $('#preview'+heroId);

            reader.onload = function(e) {
                imgElement.attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $(".portrait_upload").on("change", function(e) {
        var heroId = $(this).data("hero-id");
        previewPortrait(this, heroId);
    });

});