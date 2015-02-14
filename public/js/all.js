$( document ).ready(function() {

    $(".users-table tbody tr").hover(function() {
        $(this).toggleClass("active");
    });

});