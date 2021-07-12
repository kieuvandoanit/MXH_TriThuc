<h1>Upload file</h1>
        <form enctype="multipart/form-data" action="<?php echo HEADERLINK."/test/upload"; ?>" method="POST">
            Chọn file: <br><input type="file" name="file"/> <br><br>
            <input type="submit" value="Upload file"/>
        </form>