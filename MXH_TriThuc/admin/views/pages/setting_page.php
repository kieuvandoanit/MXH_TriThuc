<ul class="setting_class
    ">
    <li class="setting_header"><strong>Cài đặt</strong></li>
    <li>
        <ul class="setting_member">
            <li><strong>Cài đặt thông báo</strong></li>
            <li >
                <div class="setting_member row">
                    <input class="" type="checkbox" id="notification" data-value="<?php echo ($data['setting'][0]['Notification'] == 0)?1:0; ?>" <?php if($data['setting'][0]['Notification'] == 1){echo 'checked';} ?>>
                    <label>Gửi thông báo qua mail (<?php echo $data['setting'][0]['email']; ?>)</label>
                </div>
            </li>
            <br>
            <li><strong>Chế độ duyệt tự động</strong></li>
            <li>
                <div class="setting_member row">
                    <input class="" type="checkbox" id="autoBrowsing" data-value="<?php echo ($data['setting'][0]['AutoBrowsing'] == 0)?1:0; ?>" <?php if($data['setting'][0]['AutoBrowsing'] == 1){echo 'checked';} ?>>
                    <label>Bật</label>
                </div>
            </li>
        </ul>
    </li>
    <br>
</ul> 