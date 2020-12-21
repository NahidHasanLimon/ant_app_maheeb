$('.disable_btn').prop("disabled", true).css('color', '#C5C9D1');


$(".my_sidenav_dropdown").attr("src", "../../backend/img/theme/light/add_plus.png");
let height = window.innerHeight;
$(".page-content").css({"height": height-145});
// $("#sidenav-main").css({"height":height});
// $(".nav-application").css({"height":height});
// $("#first_menu").css({"height":height});
$("#whole_sidebar").css({"height": height - 330});

// $('.test_toggler').toggle(function () {
//     $(".toggle_css").addClass('col-xl-4');
// }, function () {
//     $(".toggle_css").addClass('col-xl-6');
// });



$('#btn_1').click(function () {

    $('#dropdown_1').toggle();
    // $('.submenu_dropdown').hide();
    $('#leave_dropdown').hide();
    $('#attendnace_dropdown').hide();

    $(this).find('i').toggleClass('fas fa-plus fas fa-minus');

});


$('#btn_2').click(function () {


    $('#employee_information_dropdown').toggle();

    $(this).find('i').toggleClass('fas fa-plus fas fa-minus');
});

$('#employee_role_mng').click(function () {

    $('#emp_role_mng_dropdown').toggle();
    $('#mng_emp_dropdown').hide();
    $(this).find('i').toggleClass('fas fa-plus fas fa-minus');
});
$('#company_structure').click(function () {

    $('#company_structure_dropdown').toggle();
    $(this).find('i').toggleClass('fas fa-plus fas fa-minus');
});

$('#tang_assets').click(function () {

    $('#tang_assets_dropdown').toggle();
    $(this).find('i').toggleClass('fas fa-plus fas fa-minus');
});

$('#intangible_assets').click(function () {

    $('#intangible_assets_dropdown').toggle();
    $(this).find('i').toggleClass('fas fa-plus fas fa-minus');
});

$('#manage_subscription').click(function () {

    $('#subscription_dropdown').toggle();
    $(this).find('i').toggleClass('fas fa-plus fas fa-minus');
});
$('#lead_structure').click(function () {

    $('#lead_structure_dropdown').toggle();
    $(this).find('i').toggleClass('fas fa-plus fas fa-minus');
});





$('#parent_1').click(function () {

    $('#leave_dropdown').toggle();
    $(this).find('i').toggleClass('fa fa-angle-right fa fa-angle-down');
});
// attendance sidebar
$('#parent_manage_attendance').click(function () {

    $('#attendnace_dropdown').toggle();
    $(this).find('i').toggleClass('fa fa-angle-right fa fa-angle-down');
});
// attendance sidebar
$('#mng_emp_roles').click(function () {

    $('#mng_emp_dropdown').toggle();
    $(this).find('i').toggleClass('fa fa-angle-right fa fa-angle-down');
});

$('#project_management_structure_btn').click(function () {

    $('#project_management_dropdown').toggle();
    $('#pro_structure_dropdown').hide();
    $('#mng_pro_dropdown').hide();
    $('#mng_pro_item_cat_dropdown').hide();
    $(this).find('i').toggleClass('fas fa-plus fas fa-minus');
});




$('#parent_pro_structure').click(function () {

    $('#pro_structure_dropdown').toggle();
    $(this).find('i').toggleClass('fa fa-angle-right fa fa-angle-down');
});


$('#parent_mng_pro').click(function () {

    $('#mng_pro_dropdown').toggle();
    $(this).find('i').toggleClass('fa fa-angle-right fa fa-angle-down');
});


$('#parent_mng_pro_item').click(function () {

    $('#mng_pro_item_cat_dropdown').toggle();
    $(this).find('i').toggleClass('fa fa-angle-right fa fa-angle-down');
});




$(".second_sidebar").hide();
$(".expanding_sidenav").hide();


$(document).ready(function () {

    $('#hr_mng_list_second_sb').click(function (e) {
        e.preventDefault();
        $('#a1').addClass("active");
        // $('#a1 span img').attr("src", "/backend/img/theme/light/human-resources_White.png");
        $('#a1 span img').attr("src", "/backend/img/theme/light/human-resources_white.png");
        $('#a2 span img').attr("src", "/backend/img/theme/light/anthill_Black.png");
        $('#lead_generation_link span img').attr("src", "/backend/img/theme/light/Lead_black.png");
        $('#project_management_link span img').attr("src", "/backend/img/theme/light/Project_black.png");
        $('#a2').removeClass("active");
        $('#lead_generation_link').removeClass("active");
        $('#project_management_link').removeClass("active");
        $("#item_1").show();
        $("#item_2").hide();
        $("#lead_generation_item").hide();
        $("#project_management_item").hide();
    });
    //

    $('#list_2').click(function (e) {
        e.preventDefault();
        $('#a1 span img').attr("src", "/backend/img/theme/light/human-resources_black.png");
        $('#a2 span img').attr("src", "/backend/img/theme/light/anthill_white.png");
        $('#lead_generation_link span img').attr("src", "/backend/img/theme/light/Lead_black.png");
        $('#project_management_link span img').attr("src", "/backend/img/theme/light/Project_black.png");

        $('#a1').removeClass("active");
        $('#a2').addClass("active");
        $('#lead_generation_link').removeClass("active");
        $('#project_management_link').removeClass("active");
        $("#item_1").hide();
        $("#item_2").show();
        $("#lead_generation_item").hide();
        $("#project_management_item").hide();
    });


    // Project management Sidebar starts

    $("#project_management_page").click(function (e) {
        e.preventDefault();
        // $(".temp").hide();
        $(".first_sidebar").hide();
        $(".second_sidebar").show();
        $('#a2 span img').attr("src", "/backend/img/theme/light/anthill_Black.png");
        $('#a1 span img').attr("src", "/backend/img/theme/light/human-resources_black.png");
        $('#lead_generation_link span img').attr("src", "/backend/img/theme/light/Lead_black.png");
        $('#project_management_link span img').attr("src", "/backend/img/theme/light/Project_white.png");
        $('#a1').removeClass("active");
        $('#a2').removeClass("active");
        $('#lead_generation_link').removeClass("active");
        $('#project_management_link').addClass("active");

        $("#item_1").hide();
        $("#item_2").hide();
        $("#lead_generation_item").hide();
        $("#project_management_item").show();
    });


    $('#project_management_list').click(function (e) {
        e.preventDefault();
        $('#a2 span img').attr("src", "/backend/img/theme/light/anthill_Black.png");
        $('#a1 span img').attr("src", "/backend/img/theme/light/human-resources_black.png");
        $('#lead_generation_link span img').attr("src", "/backend/img/theme/light/Lead_black.png");
        $('#project_management_link span img').attr("src", "/backend/img/theme/light/Project_white.png");
        $('#a1').removeClass("active");
        $('#a2').removeClass("active");
        $('#lead_generation_link').removeClass("active");
        $('#project_management_link').addClass("active");
        $("#item_1").hide();
        $("#item_2").hide();
        $("#lead_generation_item").hide();
        $("#project_management_item").show();
    });


    // Project Management Sidebar ends



    $('#lead_generation_list').click(function (e) {
        e.preventDefault();
        $('#a1 span img').attr("src", "/backend/img/theme/light/human-resources_black.png");
        $('#a2 span img').attr("src", "/backend/img/theme/light/anthill_Black.png");
        $('#lead_generation_link span img').attr("src", "/backend/img/theme/light/Lead_white.png");
        $('#project_management_link span img').attr("src", "/backend/img/theme/light/Project_black.png");

        $('#project_management_link').removeClass("active");
        $('#a1').removeClass("active");
        $('#a2').removeClass("active");
        $('#lead_generation_link').addClass("active");

        $("#item_1").hide();
        $("#item_2").hide();
        $("#project_management_item").hide();
        $("#lead_generation_item").show();
    });


    $("#part_1").click(function (e) {
        e.preventDefault();
        // $(".temp").hide();
        $(".first_sidebar").hide();
        $(".second_sidebar").show();
        $('#a1').addClass("active");
        // $('#a1 span img').attr("src","../assets/img/theme/light/human-resources_WHite.png");
        // $('#a1 span img').attr("src", "/backend/img/theme/light/human-resources_WHite.png");
        $('#a1 span img').attr("src", "/backend/img/theme/light/human-resources_white.png");
        $('#a2 span img').attr("src", "/backend/img/theme/light/anthill_Black.png");
        $('#lead_generation_link span img').attr("src", "/backend/img/theme/light/Lead_black.png");
        $('#project_management_link span img').attr("src", "/backend/img/theme/light/Project_black.png");

        $("#part_0").hide();
        $("#item_1").show();
        $("#item_2").hide();
        $("#lead_generation_item").hide();
        $("#project_management_item").hide();
    });

    $("#part_2").click(function (e) {
        e.preventDefault();
        // $(".temp").hide();
        $(".first_sidebar").hide();
        $(".second_sidebar").show();
        $('#a2 span img').attr("src", "/backend/img/theme/light/anthill_white.png");
        $('#a1 span img').attr("src", "/backend/img/theme/light/human-resources_black.png");
        $('#lead_generation_link span img').attr("src", "/backend/img/theme/light/Lead_black.png");
        $('#project_management_link span img').attr("src", "/backend/img/theme/light/Project_black.png");

        $('#a1').removeClass("active");
        $('#project_management_link').removeClass("active");
        $('#lead_generation_link').removeClass("active");
        $('#a2').addClass("active");
        $("#part_0").hide();
        $("#item_1").hide();
        $("#lead_generation_item").hide();
        $("#project_management_item").hide();
        $("#item_2").show();
    });

    $("#lead_generation_page").click(function (e) {
        e.preventDefault();
        // $(".temp").hide();
        $(".first_sidebar").hide();
        $(".second_sidebar").show();
        $('#a2 span img').attr("src", "/backend/img/theme/light/anthill_Black.png");
        $('#a1 span img').attr("src", "/backend/img/theme/light/human-resources_black.png");
        $('#lead_generation_link span img').attr("src", "/backend/img/theme/light/Lead_white.png");
        $('#project_management_link span img').attr("src", "/backend/img/theme/light/Project_black.png");

        $('#a1').removeClass("active");
        $('#a2').removeClass("active");
        $('#project_management_link').removeClass("active");
        $('#lead_generation_link').addClass("active");
        // $("#part_0").hide();
        $("#item_1").hide();
        $("#item_2").hide();
        $("#lead_generation_item").show();
        $("#project_management_item").hide();
    });


});
