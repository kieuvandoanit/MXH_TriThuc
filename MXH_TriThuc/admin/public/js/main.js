$('document').ready(function(){
    $("#frmCSVImport").on("submit", function () {

        $("#response").attr("class", "");
        $("#response").html("");
        var fileType = ".csv";
        var regex = new RegExp("([a-zA-Z0-9\s_\\.\-:])+(" + fileType + ")$");
        if (!regex.test($("#file").val().toLowerCase())) {
                $("#response").addClass("error");
                $("#response").addClass("display-block");
            $("#response").html("Invalid File. Upload : <b>" + fileType + "</b> Files.");
            return false;
        }
        return true;
    });
    

});

function pagination(data){
    console.log('voday');
    console.log(data);
    var rowsShown=5;
    var rowsTotal=data.length;
    var numPages=Math.floor(rowsTotal/rowsShown)+((rowsTotal%rowsShown>0)?1:0);
    console.log(numPages)
    $('#table').after('<div id="pagination"></div>');
    for(i = 0;i < numPages;i++) {
        var pageNum = i + 1;
        console.log(pageNum)
        $('#pagination').append('<a id="numPage'+i+'" class="numPage" href="#" rel="'+i+'">'+pageNum+'</a>');
    }
    $('#pagination a:first').addClass('active');
    var dataShown=data.slice(0,rowsShown);
    showData(dataShown);
    $('#pagination a').bind('click',function(e){
        // alert( "Handler for .click() called." );
        e.preventDefault();
        var currPage = $(this).attr('rel');
        $('#pagination a').removeClass('active');
        $(this).addClass('active');
        console.log(currPage);
        var startItem = currPage * rowsShown;
        var endItem = startItem + rowsShown;
        dataShown=data.slice(startItem,endItem);
        showData(dataShown);
    });
}