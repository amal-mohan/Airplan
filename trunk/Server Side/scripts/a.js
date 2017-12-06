$(document).ready(function()
{
$('#myUL1').after('<div id="nav"></div>');
    var rowsShown = 5;
    var rowsTotal = $('#myUL1 tbody tr').length;
    var numPages = rowsTotal/rowsShown;
    for(i = 0;i < numPages;i++) {
        var pageNum = i + 1;
        $('#nav').append('<a href="#" rel="'+i+'">'+pageNum+'</a> ');
    }
    $('#myUL1 tbody tr').hide();
    $('#myUL1 tbody tr').slice(0, rowsShown).show();
    $('#nav a:first').addClass('active');
    $('#nav a').bind('click', function()
    {

        $('#nav a').removeClass('active');
        $(this).addClass('active');
        var currPage = $(this).attr('rel');
        var startItem = currPage * rowsShown;
        var endItem = startItem + rowsShown;
        $('#myUL1 tbody tr').hide().slice(startItem, endItem).
        show();
    });

$('#myUL2').after('<div id="nav1"></div>');
    var rowsShown = 5;
    var rowsTotal = $('#myUL2 tbody tr').length;
    var numPages = rowsTotal/rowsShown;
    for(i = 0;i < numPages;i++) {
        var pageNum = i + 1;
        $('#nav1').append('<a href="#" rel="'+i+'">'+pageNum+'</a> ');
    }
    $('#myUL2 tbody tr').hide();
    $('#myUL2 tbody tr').slice(0, rowsShown).show();
    $('#nav1 a:first').addClass('active');
    $('#nav1 a').bind('click', function()
    {

        $('#nav1 a').removeClass('active');
        $(this).addClass('active');
        var currPage = $(this).attr('rel');
        var startItem = currPage * rowsShown;
        var endItem = startItem + rowsShown;
        $('#myUL2 tbody tr').hide().slice(startItem, endItem).
        show();
    });

$('#myUL3').after('<div id="nav2"></div>');
    var rowsShown = 5;
    var rowsTotal = $('#myUL3 tbody tr').length;
    var numPages = rowsTotal/rowsShown;
    for(i = 0;i < numPages;i++) {
        var pageNum = i + 1;
        $('#nav2').append('<a href="#" rel="'+i+'">'+pageNum+'</a> ');
    }
    $('#myUL3 tbody tr').hide();
    $('#myUL3 tbody tr').slice(0, rowsShown).show();
    $('#nav2 a:first').addClass('active');
    $('#nav2 a').bind('click', function()
    {

        $('#nav2 a').removeClass('active');
        $(this).addClass('active');
        var currPage = $(this).attr('rel');
        var startItem = currPage * rowsShown;
        var endItem = startItem + rowsShown;
        $('#myUL3 tbody tr').hide().slice(startItem, endItem).
        show();
    });


});