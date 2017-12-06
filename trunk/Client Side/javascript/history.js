$(document).ready(function()
{

$("#cancel").click(function()
{
	window.location.href = "listairlines.php";

});

$('#confirm-delete').on('show.bs.modal', function(e) {
    $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
});

});