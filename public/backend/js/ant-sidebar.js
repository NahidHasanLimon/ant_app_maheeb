
$(".my_sidenav_dropdown").attr("src","../../backend/img/theme/light/add_plus.png");
let height = window.innerHeight;
$(".page-content").css({"height":height-145});
$("#whole_sidebar").css({"height":height-330});




$(".second_sidebar").hide();

$(document).ready(function(){

    $('#list_1').click(function (e) {

        $('#a1 span img').attr("src","/backend/img/theme/light/Attendnce-white.png");
        $('#a2 span img').attr("src","/backend/img/theme/light/Holiday_black.png");
        $('#lead_generation_link span img').attr("src","/backend/img/theme/light/Lead_black.png");
        $('#a1').addClass("active");
        $('#a2').removeClass("active");
        $('#home_anchor').removeClass("active");
        $('#lead_generation_link').removeClass("active");
        $('#afl_link').removeClass("active");

        $("#item_1").hide();
        $("#item_2").show();
    });
    //

    $('#list_2').click(function (e) {

        $('#a1 span img').attr("src","/backend/img/theme/light/Attendnce-black.png");
        $('#a2 span img').attr("src","/backend/img/theme/light/Holiday_white.png");
        $('#lead_generation_link span img').attr("src","/backend/img/theme/light/Lead_black.png");
        $('#a2').addClass("active");
        $('#a1').removeClass("active");
        $('#home_anchor').removeClass("active");
        $('#lead_generation_link').removeClass("active");
        $('#afl_link').removeClass("active");
        $("#item_1").hide();
        $("#item_2").show();

    });

    $('#lead_generation_list').click(function (e) {
        // e.preventDefault();
        $('#a1 span img').attr("src","/backend/img/theme/light/Attendnce-black.png");
        $('#a2 span img').attr("src","/backend/img/theme/light/Holiday_black.png");
        $('#lead_generation_link span img').attr("src","/backend/img/theme/light/Lead_white.png");

        $('#a1').removeClass("active");
        $('#a2').removeClass("active");
        $('#home_anchor').removeClass("active");
        $('#lead_generation_link').addClass("active");
        $("#item_1").hide();
        $("#item_2").hide();
        $("#lead_generation_item").show();
    });


    $('#ask_for_leave').click(function (e) {
        // e.preventDefault();
        $('#a1 span img').attr("src","/backend/img/theme/light/Attendnce-black.png");
        $('#a2 span img').attr("src","/backend/img/theme/light/Holiday_black.png");
        $('#afl_link span img').attr("src","/backend/img/theme/light/Leave_white.png");

        $('#a1').removeClass("active");
        $('#a2').removeClass("active");
        $('#home_anchor').removeClass("active");
        $('#lead_generation_link').removeClass("active");
        $('#afl_link').addClass("active");
        $("#item_1").hide();
        $("#item_2").hide();
        // $("#lead_generation_item").show();
    });



    // $("#lead_generation_page").click(function(e){
    //     e.preventDefault();
    //     // $(".temp").hide();
    //     $(".test_div_1").hide();
    //     $(".test_div").show();
    //     $('#a2 span img').attr("src","/backend/img/theme/light/anthill_Black.png");
    //     $('#a1 span img').attr("src","/backend/img/theme/light/human-resources_black.png");
    //     $('#lead_generation_link span img').attr("src","/backend/img/theme/light/Lead_white.png");
    //     $('#a1').removeClass("active");
    //     $('#a2').removeClass("active");
    //     $('#lead_generation_link').addClass("active");
    //     // $("#part_0").hide();
    //     $("#item_1").hide();
    //     $("#item_2").hide();
    //     $("#lead_generation_item").show();
    // });



});
