<div id="post_page" style="min-height: calc(100vh - 235px);">
    <div id="top_home_page">
      <div id="">
          <div  id="table" class="list_post" style="display:flex">
            <div id="postTable"></div>
          </div>
      </div>
    </div>
</div>
<script>
$(document).ready(function(){
    data=<?php echo json_encode(isset($data['resultValue'])?$data['resultValue']:[]) ?>;
    // data=data?data:[];
    if(data.length>0){
      pagination(data);
    }else{
      contentHtml='<div id="table"><b>Không tìm thấy kết quả</b></div><div class="clearfix"></div>';
      $("#postTable").html(contentHtml);
    }
});
function showData(data){
    const likedUser=<?php echo json_encode(isset($data['liked'])?$data['liked']:[]) ?>;
    var isLike=false;
    console.log(data);
    contentHtml='';
    for(const key in data){
      contentHtml+=`<div class="col-md-3">
        <div class="post">
          <div class="post_thumb">
            <img src="${data[key]['thumb']}" alt="">
          </div>
          <div class="post_title">
            <a href="<?php echo HEADERLINK;?>/post/postDetail/${data[key]["Post_id"]}" class="post_link">${data[key]['Title']}</a>
          </div>
          <div class="post_describe">
            <div class="post_datetime">
            ${data[key]['CreatedDate']}
            </div>
            <div class="post_author">
              <div class="author_name"><a href="" class="author_link">${data[key]['Name']}</a></div>
              <div class="author_icon"><i class="far fa-user-circle"></i></div>
            </div>
          </div>
          <div class="post_rating">
            <div class="rate">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
            </div>
            <div class="rate_num">${data[key]['rateAmount']}</div>
          </div>
          <div class="post_react"><div class="post_like `;
          for (const i of likedUser) {
            if(likedUser[i]==data[key]['Post_id']){
              isLike=True;
              contentHtml+=`post_liked" id="${data[key]['Post_id']}">
                      <i class="fas fa-thumbs-up fa-thumbs-up-${data[key]['Post_id']}" style="color:black"></i>`;
              break;
            }
          }
          if(isLike!=true){
            contentHtml+=`" id="${data[key]['Post_id']}">
                      <i class="fas fa-thumbs-up fa-thumbs-up-${data[key]['Post_id']}" style=""></i>`;
          }
        contentHtml+=`<p class="post_like_num postLikeNum_${data[key]['Post_id']}">${data[key]['LikesAmount']}</p>
            </div><div class="post_comment">
              <i class="fas fa-comment"></i>
              <p class="post_comment_num">${data[key]['commentAmount']}</p>
              <div class="clearfix"></div>
            </div></div></div></div>`;
    };
    $("#postTable").html(contentHtml);
};
</script>
