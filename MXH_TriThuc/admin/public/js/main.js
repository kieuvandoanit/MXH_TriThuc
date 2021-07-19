$('document').ready(function(){
    var url = "http://localhost:8080/MXH_TriThuc";
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
    


    $("#notification").change(function(){
        var value = $("#notification").attr("data-value");
        
        $.ajax({
            url: url+"/admin/Setting/changeNotification",
            method: "POST",
            dataType: 'text',
            data:{value:value},
            success: function(data){
                if(data == 1){
                    window.location = url+'/admin/Setting';
                }else if(data == 0){
                    window.location = url+'/admin/Setting';
                }else{
                    alert("Có lỗi trong quá trình bật/tắt mail!");
                }
            }
        });
    });

    $("#autoBrowsing").change(function(){
        var value = $("#autoBrowsing").attr("data-value");
        
        $.ajax({
            url: url+"/admin/Setting/changeAutoBrowsing",
            method: "POST",
            dataType: 'text',
            data:{value:value},
            success: function(data){
                if(data == 1){
                    window.location = url+'/admin/Setting';
                }else if(data == 0){
                    window.location = url+'/admin/Setting';
                }else{
                    alert("Có lỗi trong quá trình bật/tắt duyệt bài post tự động!");
                }
            }
        });
    });

});

function pagination(data){
    var rowsShown=5;
    var rowsTotal=data.length;
    var numPages=Math.floor(rowsTotal/rowsShown)+((rowsTotal%rowsShown>0)?1:0);
    if(rowsTotal>0){
        $('#table').after('<div id="pagination"></div>');
        for(i = 0;i < numPages;i++) {
            var pageNum = i + 1;
            $('#pagination').append('<a id="numPage'+i+'" class="numPage" href="#" rel="'+i+'">'+pageNum+'</a>');
        }
        $('#pagination a:first').addClass('active');
        var dataShown=data.slice(0,rowsShown);
        showData(dataShown);
        $('#pagination a').bind('click',function(e){
            e.preventDefault();
            var currPage = $(this).attr('rel');
            $('#pagination a').removeClass('active');
            $(this).addClass('active');
            var startItem = currPage * rowsShown;
            var endItem = startItem + rowsShown;
            dataShown=data.slice(startItem,endItem);
            showData(dataShown);
        });
    }
}
