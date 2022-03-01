<!doctype html>
<html lang="en">
  <head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>File View</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-4">
    <div class="d-flex justify-content-end">
        <a href="<?php echo site_url('/upload-image') ?>" class="btn btn-success mb-2">Add file</a>
	</div>
    <?php
     if(isset($_SESSION['msg'])){
        echo $_SESSION['msg'];
      }
     ?>
  <div class="mt-3">
     <table class="table table-bordered" id="users-list">
       <thead>
          <tr>
             <th>Id</th>
             <th>Name</th>
             <th>Type</th>
          </tr>
       </thead>
       <tbody>
          <?php if($profiles): ?>
          <?php foreach($profiles as $profile): ?>
          <tr>
             <td><?php echo $profile['id']; ?></td>
             <td>
                <img src="file:///C:/codeignator/appstarter/writable/uploads/123.jpg">
                <img src="<?php echo WRITEPATH.'uploads\123.jpg'; ?>">
                <img src="<?= base_url() ?>/writable/uploads/123.jpg" width="120">
                <br/>
                <?php echo $profile['file_name']; ?>
            </td>
             <td><?php echo $profile['file_type']; ?></td>
          </tr>
         <?php endforeach; ?>
         <?php endif; ?>
       </tbody>
     </table>
  </div>
</div>
 
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
<script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready( function () {
      $('#users-list').DataTable();
  } );
</script>
</body>
</html>