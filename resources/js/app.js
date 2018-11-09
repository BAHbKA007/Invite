
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

var waitForFinalEvent = (function () {
    var timers = {};
    return function (callback, ms, uniqueId) {
        if (!uniqueId) {
        uniqueId = "Don't call this twice without a uniqueId";
        }
        if (timers[uniqueId]) {
        clearTimeout (timers[uniqueId]);
        }
        timers[uniqueId] = setTimeout(callback, ms);
    };
    })();

if($('.card').height() >= ($( document ).height() -55)) {
    $('.navbar').removeClass('fixed-top');
    $('main').removeClass('h-100');
    $('main').css('padding', '14px 0 14px 0');
}
    
    
$(window).resize(function () {
    waitForFinalEvent(function(){
    if($('.card').height() >= ($( document ).height() -55)) {
        $('.navbar').removeClass('fixed-top');
        $('main').removeClass('h-100');
        $('main').css('padding', '14px 0 14px 0');
    }
    }, 500, "some unique string");
});

$(document).ready(function(){
    $('[data-toggle="popover"]').popover()
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    var wrapper = $('.field_wrapper'); //Input field wrapper
    let id = $('#project_id').attr("data-id");
    var fieldHTML = "<div class='input-group'><input type='text' class='input_readonly form-control focus' placeholder='Name' data-id='"+id+"'></div>"; //New input field html 

    function addInput(){ 
            $(wrapper).append(fieldHTML);
            $( ".focus" ).focus();
            $.ajax({
                    url: '/postajax',
                    type: 'POST',
                    data:{
                        _token: CSRF_TOKEN, 
                        name: $(this).val(),
                        art: 'post',
                        id: $(this).attr("data-id")
                    },
                    success: function (data) {
                        if (data == 0) {
                            alert('bereits vorhanden!');
                            location.reload(forceGet=true)
                        }
                    }
            });
            $(this).attr('readonly', true);     
        }
    $(wrapper).append(fieldHTML);
    $( ".focus" ).focus();

    $(document).on("change", ".input_readonly", addInput);

    $("#syn").click(function(){
        location.reload(forceGet=true)
    });

    $(".del").click(function(){
        if (conf()) {
            $.ajax({
                url: '/postajax',
                type: 'POST',
                data:{
                    _token: CSRF_TOKEN, 
                    art: 'del',
                    id: $(this).attr("data-id")
                },
                success: function (data) {
                }
            });
            $(this).parents('div').eq(1).remove();
        }
    });

});

function conf(){
    check = window.confirm("Wirklich löschen?");
    return check;
}