$(document).ready(function(){

var t = "on";
$(".more").click(function () {

    if (t === "off") {
        $(".branches_descrip_text_more").fadeIn();
        $(this).text("hide text");
        t = "on";
    } else {
        $(".branches_descrip_text_more").fadeOut();
        $(this).text("المزيد");
        t = "off";
    }
});


    $(".search_input").keyup(function () {

        var content = $(this).val();

        $(".search_icon").attr("href", content);

    })


// $('.container-2').hover(

//     function () {
//         $(".indooy_search_logo").css({
//             "margin-left": "6%"
//         });
//     },

//     function () {
//         $(".indooy_search_logo").css({
//             "margin-left": "26%"
//         });
//     }
// );



});

function openNav() {
    document.getElementById("myNav").style.height = "100%";
}

/* Close when someone clicks on the "x" symbol inside the overlay */
function closeNav() {
    document.getElementById("myNav").style.height = "0%";
}