$(document).ready(function () {
    $(".post_like").click(function(event){
        var id = $(event.target).attr('id');
        $.ajax({
            url: "http://localhost:8080/MXH_TriThuc/post/handleLike",
            method: "POST",
            dataType: 'text',
            data:{id:id},
            success: function(data){
                if(data != 0){
                    var html = "<p class='post_like_num postLikeNum_"+id+"'>"+data+"</p>";
                    var temp = ".postLikeNum_"+id;
                    $(temp).html(html);
                }
            }

        })
    });
    
});

