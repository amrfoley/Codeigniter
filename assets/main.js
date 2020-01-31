$(document).ready(function() {
    $("#txtEditor").Editor();
    $('form').submit(function () {
        $('#txtEditor').val($('#txtEditor').Editor('getText'));
    });
    $('#txtEditor').Editor('setText', $('#txtEditor').val());
});