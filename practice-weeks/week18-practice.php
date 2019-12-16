<?php
    require_once 'week-18-php/db.php';
    require_once 'week-18-php/TableBuilder.php';

    $fetch_head = array_keys($result->fetch_assoc());
    $fetch_rows = $result->fetch_all();
 ?>

<!DOCTYPE html>

<html lang="en-US">

<head>
  <meta charset="utf-8">
  <meta name="author" content="KMiskell">
  <meta name="description" content="Week 18 General Practice">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="../root-assets/favicon/javascript-original.svg" type="image/x-icon">
  <link rel="stylesheet" href="css/practice-stylesheet.css">
  <link rel="stylesheet" href="css/stylesheet-w12-practice.css">
  <link rel="stylesheet" href="css/stylesheet-w16-practice.css">
  <link rel="stylesheet" href="css/stylesheet-w18-practice.css">
  <!-- <link rel="stylesheet" href="css/datatables-dark.css"> -->
  <link rel="stylesheet" href="../root-css/header.css">
  <link rel="stylesheet" href="../root-css/nav-buttons.css">
  <!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css"/> -->
  <!--code formatting-->
  <title>Week 18 Sandbox</title>
</head>

<body>
  <div>
    <header class="header-v2">
      <h1>Week 18 Sandbox</h1>
    </header>

    <nav class="nav-v2">
      <ul>
        <li><a href="../index.html" title="Home">Home</a></li>
        <li><a href="../practice-weeks/week17-practice.html" title="Previous Work">Previous Work</a></li>
        <li><a href="../study-weeks/week18.html" title="Week Log">Week Log</a></li>
        <!--<li><a href="../practice-weeks/week19-practice.html" title="Next Work">Next Work</a></li>-->
        <li><a href="../roadmap.html" title="Roadmap">Roadmap</a></li>
        <li><select onchange="location = this.value;">
              <option value="">Notes</option>
              <option value="../notes/Functional-JS-I.pdf">Functional JS</a></li>
              <option value="../notes/React-I.pdf">React</a></li>
              <option value="../notes/JS-I.pdf">JS</a></li>
              <option value="../notes/CSS3-I.pdf">CSS</a></li>
              <option value="../notes/HTML-I.pdf">HTML</a></li>
            </select>
        </li>
        <li><select onchange="location = this.value;">
              <option value="">Learning Resources</option>
              <option value="https://www.udemy.com/course/complete-react-developer-zero-to-mastery/">Complete React Developer 2020</option>
              <option value="../notes/Prof-Frisby-Funct-JS.pdf">Prof Frsiby's Functional JS</option>
              <option value="../notes/React-Quickly-2017.pdf">React Quickly</option>
              <option value="https://eloquentjavascript.net/">Eloquent JavaScript</option>
              <option value="https://developer.mozilla.org/en-US/docs/Learn">MDN Docs</option>
            </select>
        </li>
      </ul>
    </nav>
  </div>

  <main>
    <section>
      <h2>General React Practice &#40;click image to load React&#41;</h2>
      <a href="https://kylemiskell.com/practice-weeks/week-18-react"><img src='./assets/images/week-18-react.png' alt='Week 17 React'></img><a>
    </section>

    <section>
      <h2>Basic PHP Back-end with MYSQLi table Pull</h2>
      <div class="table-container">
        <table id="practice_table" class="display">
            <thead style="font-weight: bold;">
                <?php add_head_row($fetch_head); ?>
            </thead>
            <tbody>
                <?php build_rows($fetch_rows); ?>
            </tbody>
        </table>
      </div>
    </section>

  </main>

</body>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>

</html>


<script>
$(document).ready( function () {
  $('#practice_table').DataTable();
} );
</script>
