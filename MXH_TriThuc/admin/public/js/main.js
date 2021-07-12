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
