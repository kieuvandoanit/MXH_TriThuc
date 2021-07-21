$(document).ready(function () {
    var url = "http://localhost:8080";
    //Xử lý like
    $(document).on("click", ".post_like", function(event) { 
        var id = $(event.target).attr('id');
        let classLike = ".fa-thumbs-up-"+id;
        // console.log(event.target);
        if($(event.target).hasClass("post_liked")){
            $.ajax({
                url: url+"/MXH_TriThuc/post/handleDisLike",
                method: "POST",
                dataType: 'text',
                data:{id:id},
                success: function(data){
                    if(isFinite(data)){
                        let html = "<p class='action_like post_like_num postLikeNum_"+id+"'>"+data+"</p>";
                        let temp = ".postLikeNum_"+id;
                        $(temp).html(html);
                        $(event.target).removeClass("post_liked");
                        $(classLike).css("color","white");
    
                    }else{
                        window.location.href = url+"/MXH_TriThuc/user";
                    }
                }
    
            });
        }else{
            $.ajax({
                url: url+"/MXH_TriThuc/post/handleLike",
                method: "POST",
                dataType: 'text',
                data:{id:id},
                success: function(data){
                    if(isFinite(data)){
                        let html = "<p class='action_like post_like_num postLikeNum_"+id+"'>"+data+"</p>";
                        let temp = ".postLikeNum_"+id;
                        $(temp).html(html);
                        $(event.target).addClass("post_liked");
                        $(classLike).css("color","black");
    
                    }else{
                        window.location.href = url+"/MXH_TriThuc/user";
                    }
                }
    
            });
        }
        
        
    });

    //Xử lý rating
    var formRatingPost = $("#form_rating_post");
    formRatingPost.submit(function(e){
        e.preventDefault();

        $.ajax({
            type: formRatingPost.attr('method'),
            url: formRatingPost.attr('data-action'), 
            data: formRatingPost.serialize(),
            success: function(result){
                // console.log(result);
                var res = result.split("/")
                let agvrate = parseFloat(res[0]);
                res[0] = agvrate.toFixed(1);
                
                let post_rating_score_start = "";
            
                if(res[0] < 0.5){
                    post_rating_score_start = "<i class='far fa-star'></i><i class='far fa-star'></i><i class='far fa-star'></i><i class='far fa-star'></i><i class='far fa-star'></i>";
                }else if(res[0] >= 0.5 && res[0] < 1.5){
                    post_rating_score_start = "<i class='fas fa-star'></i><i class='far fa-star'></i><i class='far fa-star'></i><i class='far fa-star'></i><i class='far fa-star'></i>";
                }else if(res[0] >= 1.5 && res[0] < 2.5){
                    post_rating_score_start = "<i class='fas fa-star'></i><i class='fas fa-star'></i><i class='far fa-star'></i><i class='far fa-star'></i><i class='far fa-star'></i>";
                }else if(res[0] >= 2.5 && res[0] < 3.5){
                    post_rating_score_start = "<i class='fas fa-star'></i><i class='fas fa-star'></i><i class='fas fa-star'></i><i class='far fa-star'></i><i class='far fa-star'></i>";
                }else if(res[0] >= 3.5 && res[0] < 4.5){
                    post_rating_score_start = "<i class='fas fa-star'></i><i class='fas fa-star'></i><i class='fas fa-star'></i><i class='fas fa-star'></i><i class='far fa-star'></i>";
                }else{
                    post_rating_score_start = "<i class='fas fa-star'></i><i class='fas fa-star'></i><i class='fas fa-star'></i><i class='fas fa-star'></i><i class='fas fa-star'></i>";
                }
                // console.log(post_rating_score_start);
                let pHtmlText = "<p class='rating_score_info' id='post_rating_score_number'>"+res[0]+"</p>"
                let post_count_rating = "<div class='number_ranked text-center' id='post_count_rating'>("+res[1]+" đánh giá)</div>";
                
                
                let sao5= parseInt(res[6]);
                let sao4= parseInt(res[5]);
                let sao3= parseInt(res[4]);
                let sao2= parseInt(res[3]);
                let sao1= parseInt(res[2]);

                let tongsao = sao1+sao2+sao3+sao4+sao5;

                let tylesao5 = (sao5/tongsao)*100;
                let tylesao4 = (sao4/tongsao)*100;
                let tylesao3 = (sao3/tongsao)*100;
                let tylesao2 = (sao2/tongsao)*100;
                let tylesao1 = (sao1/tongsao)*100;
                
                
                $("#1star").css("width",tylesao1+"%");
                $("#2star").css("width",tylesao2+"%");
                $("#3star").css("width",tylesao3+"%");
                $("#4star").css("width",tylesao4+"%");
                $("#5star").css("width",tylesao5+"%");
                $("#post_count_rating").html(post_count_rating);
                $("#post_rating_score_number").html(pHtmlText);
                $(".post_rating_score_start").html(post_rating_score_start);
            }

        });
    });

    //Xử lý validate username
    $('.validate').on('keypress', function (event) {
        // console.log(event);
        var regex = new RegExp("^[a-zA-Z0-9# ]+$");
        var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
        if (!regex.test(key)) {
           event.preventDefault();
           alert("Kí tự nhập không phù hợp. Vui lòng nhập lại!");
        }
    });
    
    //Xử lý login form
    $("#formLogin").submit(function(e){
        let uri = $("#formLogin").attr("data-action");
        let method = $("#formLogin").attr("method");
        let username = $("#username").val();
        let password = $("#password").val();
        
        $.ajax({
            url: url+uri,
            method: method,
            dataType: 'text',
            data: {username: username, password: password, btn_login:'Đăng nhập'},
            success: function(data){
                if(data == 1){
                    window.location.href = url+"/MXH_TriThuc";
                }else{
                    alert("Thông tin đăng nhập không chính xác! Vui lòng đăng nhập lại!");
                }
            }
        });
        

        
    });

    
    
});
//Phân trang
function pagination(data){

    var rowsShown=8;
    var rowsTotal=data.length;
    var numPages=Math.floor(rowsTotal/rowsShown)+((rowsTotal%rowsShown>0)?1:0);
    if(rowsTotal>0){
        $('#table').after('<div id="pagination"></div>');
        for(i = 0;i < numPages;i++) {
            var pageNum = i + 1;
            // console.log(pageNum)
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
            var startItem = currPage * rowsShown;
            var endItem = startItem + rowsShown;
            dataShown=data.slice(startItem,endItem);
            showData(dataShown);
        });
    }  
}