$(document).ready(function(){

var t = "on";
$(".more").click(function () {

    if (t === "off") {
        $(".branches_descrip_text_more").fadeIn();
        $(this).text(">>");
        t = "on";
    } else {
        $(".branches_descrip_text_more").fadeOut();
        $(this).text("<<");
        t = "off";
    }
});



});

function openNav() {
    document.getElementById("myNav").style.height = "100%";
}

/* Close when someone clicks on the "x" symbol inside the overlay */
function closeNav() {
    document.getElementById("myNav").style.height = "0%";
}