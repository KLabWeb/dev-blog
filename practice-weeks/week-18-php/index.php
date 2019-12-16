<?php
    require_once 'db.php';
    require_once 'TableBuilder.php';

    $fetch_head = array_keys($result->fetch_assoc());
    $fetch_rows = $result->fetch_all();
 ?>

<!DOCTYPE html>
<html lang="en-US" class="index">

  <head>
      <meta charset="utf-8">
      <meta name="author" content="KMiskell">
      <meta name="description" content="Some basic PHP mysqli practice">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css"/>
      <link rel="stylesheet" type="text/css" href="index.css"/>
      <title>Muh PHP</title>
  </head>

  <body>
    <h1>Table Test</h1>
    <div style="width: 60%;">
      <table id="table_id" class="display">
          <thead style="font-weight: bold;">
              <?php add_head_row($fetch_head); ?>
          </thead>
          <tbody>
              <?php build_rows($fetch_rows); ?>
              <?php build_rows($fetch_rows); ?>
              <?php build_rows($fetch_rows); ?>
          </tbody>
      </table>
    </div>
    <div>
      <?php require_once 'simple.php';?>
    </div>
  </body>

  <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>

</html>

<script>
$(document).ready( function () {
  $('#table_id').DataTable();
} );
</script>
