<h2>Import CSV file into Mysql using PHP</h2>

    <div id="response"
        class="<?php if(!empty($type)) { echo $type . " display-block"; } ?>">
        <?php if(!empty($message)) { echo $message; } ?>
        </div>
    <div class="outer-scontainer">
        <div class="row">

            <form class="form-horizontal" action="<?php echo HEADERLINK."/CallAPI/handleImportFileCSVPost" ?>" method="post"
                name="frmCSVImport" id="frmCSVImport"
                enctype="multipart/form-data">
                <div class="input-row">
                    <label class="col-md-4 control-label">Choose CSV
                        File</label> <input type="file" name="file"
                        id="file" accept=".csv">
                    <button type="submit" id="submit" name="import"
                        class="btn-submit">Import</button>
                    <br />

                </div>

            </form>

        </div>
               <!-- <?php
            $sqlSelect = "SELECT * FROM users";
            $result = $db->select($sqlSelect);
            if (! empty($result)) {
                ?> -->
            <table id='userTable'>
            <thead>
                <tr>
                    <th>User ID</th>
                    <th>User Name</th>
                    <th>First Name</th>
                    <th>Last Name</th>

                </tr>
            </thead>
<!-- <?php
                
                foreach ($result as $row) {
                    ?>
                    
                <tbody>
                <tr>
                    <td><?php  echo $row['userId']; ?></td>
                    <td><?php  echo $row['userName']; ?></td>
                    <td><?php  echo $row['firstName']; ?></td>
                    <td><?php  echo $row['lastName']; ?></td>
                </tr>
                    <?php
                }
                ?>
                </tbody>
        </table>
        <?php } ?> -->
    </div>

