
$('#sidebar-button').click(
    function () {
        $('.ui.sidebar').sidebar('toggle');
    }
);

$('#close-sidebar-button').click(
    function () {
        $('.ui.sidebar').sidebar('hide');
    }
);

$("#fileInput").change(function () {
    $('#uploadform').submit();
});