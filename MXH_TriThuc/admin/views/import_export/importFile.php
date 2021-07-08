<h2>Import file CSV vào database</h2>
<h6>Bảng <?php echo $data ?></h6>
<div id="response"
    class="<?php if(!empty($type)) { echo $type . " display-block"; } ?>">
    <?php if(!empty($message)) { echo $message; } ?>
    </div>
<div class="outer-scontainer">
    <div class="row">

        <form class="form-horizontal" action="<?php echo HEADERLINK."/admin/Import/handleImportFileCSV".$data; ?>" method="post"
            name="frmCSVImport" id="frmCSVImport"
            enctype="multipart/form-data">
            <div class="input-row">
                <label class="col-md-4 control-label">Chọn file CSV</label> <input type="file" name="file"
                    id="file" accept=".csv">
                <button type="submit" id="submit" name="import"
                    class="btn-submit">Import</button>
                <br />
            </div>
        </form>
    </div>
</div>

