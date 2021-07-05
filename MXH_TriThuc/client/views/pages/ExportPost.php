

    <!--  Header  -->
    <div class="row">
        <div class="col-md-12">
            <h2>Export Post from MySQL to CSV</h2>
        </div>
    </div>
    <br>
    <!--  /Header  -->

    <!--  Content   -->
    <table class="table table-bordered table-dark" style="background-color: #bdbdbd;">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Tiêu đề</th>
      <th scope="col">Hash tag</th>
      <th scope="col">Member_id</th>
    </tr>
  </thead>
  <tbody>
    
    <?php
    $count = 1;   
    foreach($data['post'] as $post){
        ?>
        <tr>
        <th scope="row"><?php echo $count; ?></th>
        <td><?php echo $post['Title'];  ?></td>
        <td><?php echo $post['HashTag']; ?></td>
        <td><?php echo $post['Member_id']; ?></td>
        </tr>
        <?php
        $count = $count + 1; 
    }
    ?>
      
    
  </tbody>
</table>

    <div class="form-group">
        <button onclick="Export()" class="btn btn-primary">Export to CSV File</button>
    </div>
    <!--  /Content   -->

    

