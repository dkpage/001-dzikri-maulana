// THIS SCRIPT REQUIRE JQUERY

$(".docWrapper").each(function () {
    var marginX = $(this).data("margin-x");
    var marginY = $(this).data("margin-y");
    $(this).css({
        "padding-left": marginY,
        "padding-right": marginY,
        "padding-top": marginX,
        "padding-bottom": marginX,
    });
});
