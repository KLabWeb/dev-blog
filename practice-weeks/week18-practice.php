<?php
    require_once 'week-18-php/db.php';
    require_once 'week-18-php/TableBuilder.php';

    $result = $conn->query('SELECT * FROM classics');
    !result && die("Query failed.");

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
  <!-- <link rel="stylesheet" href="css/stylesheet-w16-practice.css"> -->
  <link rel="stylesheet" href="css/stylesheet-w18-practice.css">
  <link rel="stylesheet" href="../root-css/header.css">
  <link rel="stylesheet" href="../root-css/nav-buttons.css">
  <link rel="stylesheet" href="../Higlightjs/styles/tomorrow-night-bright.css">
  <script src="../Higlightjs/highlight.pack.js"></script>
  <script>hljs.initHighlightingOnLoad();</script>
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
        <li><a href="../practice-weeks/week19-practice.html" title="Next Work">Next Work</a></li>
        <li><a href="../roadmap.html" title="Roadmap">Roadmap</a></li>
        <li><select onchange="location = this.value;">
              <option value="">Notes</option>
              <option value="../notes/Python.pdf" title="Python Studies in PDF">Python</option>
              <option value="../notes/React-II.pdf" title="React Studies in PDF">REACT II</option>
              <option value="../notes/MySQL.pdf" title="React Studies in PDF">MySQL & DB Design</option>
              <option value="../notes/PHP7.pdf" title="PHP Studies in PDF">PHP</option>
              <option value="../notes/Functional-JS-I.pdf">Functional JS</option>
              <option value="../notes/React-I.pdf">React</option>
              <option value="../notes/Git.pdf">Git</option>
              <option value="../notes/JS-I.pdf">JS</option>
              <option value="../notes/CSS3-I.pdf">CSS</option>
              <option value="../notes/HTML-I.pdf">HTML</option>
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
      <a href="https://unfoldkyle.com/practice-weeks/week-18-react"><img src='./assets/images/week-18-react.png' alt='Week 17 React'></img></a>
    </section>

    <section>
      <h2>Basic PHP Back-End with MYSQLi</h2>
      <div class="table-container">
        <table id="practice_table" class="display">
            <thead style="font-weight: bold;">
                <?php add_head_row($fetch_head); ?>
            </thead>
            <tbody>
                <?php get_row_group($fetch_rows); ?>
            </tbody>
        </table>
      </div>
    </section>

    <section>
      <pre><code class="php">
        //db.php

        require_once 'login.php';

        //args passed in from login.php
        $conn = new mysqli($host, $user, $pass, $db);
        $conn->connect_error && die('Fatal DB connection error');
        </code>
      </pre>

      <pre><code class="php">
        //php main section of week18-practice.php

        require_once 'week-18-php/db.php';
        require_once 'week-18-php/TableBuilder.php';

        $result = $conn->query('SELECT * FROM classics');
        !result && die("Query failed.");

        $fetch_head = array_keys($result->fetch_assoc());
        $fetch_rows = $result->fetch_all();
        </code>
      </pre>

      <pre><code class="html">
        //html + php section of week18-practice.php

        &lt;table id="practice_table" class="display"&gt;
             &lt;thead style="font-weight: bold;"&gt;
                 &lt;*php add_head_row($fetch_head); *&gt;
             &lt;/thead>
             &lt;tbody>
                 &lt;*php build_rows($fetch_rows); *&gt;
             &lt;/tbody&gt;
        &lt;/table&gt;
        </code>
      </pre>

      <pre><code class="php">
        //TableBuilder.php

        //wrapper for add_row, for easy user interface
        function add_head_row($row){
          echo add_row($row, 'thead');
        }

        //wrapper for add_row, for easy user interface
        function add_body_row($row){
          echo add_row($row, 'tbody');
        }

        //takes in a single 1D row array, optional row type, body by default
        function add_row($row, $type = 'tbody'){
          echo "<tr>" .
           array_reduce($row, function($persist, $index){
              $t = $type == 'thead' ? ['<th>', '</th>'] : ['<td>', '</td>'];
              return $persist.$t[0].$index.$t[1];
          }, '') .
          "</tr>";
        }

        //takes in a 2D array of rows, optional row type, body by default
        function get_row_group($rows, $type='tbody'){
          echo array_reduce($rows, function($persist, $index){
            return $persist.add_row($index, $type);
          }, '');
        }
        </code>
      </pre>
    </section>

    <section>
      <h2>Animation Collection Browser Initial Specs</h2>
      <img id="collection-img" src='assets/images/collection-design.png' alt="collection UI">
      <pre><code class="html">
        Essentially taking my current collection, which is a mixed of well organized titles, each
        with a 'qaulity info - title.txt' file, which holds A/V, series, summary, download source,
        and fansub group notes, and a hand selected preview image, and turning it into a searchable,
        sortable, filterable, etc. app. Above image is basis for UI &#40;image only, no
        code template, etc.&#41;.

        -Back end:
           -Existing Debian + Nginx + MariadbO
           -Python + Django or Flask REST API for MySQL queries, file hosting...set up to run well
            w/ existing php servers
        -Front end:
           -functional React w/ hooks for routing, state, etc., create-react-app
           -underscore.js ---optional
           -See image for layout React
           -some tables libary for "detailed view" (react-tables, ag-tables, etc.) ---optional
           -fancybox.js lib for lower image thumbs and upper browser viewer ---optional
        -Front end v2:
           -chart.js (genres compare, most common directors, studios, etc.)


        v1 - Basic Release - browser only
        --------------------------------
        *SEE ATTACHED DESIGN IMAGE
        -Upper portion shows details on title. Can change view to show different details/formats.
        -Lower portion is browser.
           -L menu changes view for browser.
           -R menu changes model shown in view (ex. titles, genres, etc.).
           -Clicking on genre takes to list of titles in genre, etc..
        -Search bar in between top and bottoms. Searched based on whatever is selected on R menu


        Back-End Popuplation
        --------------------------
        1) summary, series info details can be pulled from some web api
        2) for media details, see if can automate some media-info pull, which can display in json
           inside the app
        3) release notes and will have to come from existing .txt files
        4) as ALL titles have a 'quality info - tile.txt' file, I could could automate a lot of the
           DB population, API queries, etc. for population by using the 'title' string from those
          text files for the root model basis.


        v2 - User addition
        ---------------------------------
        -Add users. Users can log in. Create request lists. I send them a USB full of files.
        -Users can also create: watch, watched, etc lists

        -Can keep same SPA layout, by adding list views for user specific lists in lower portion, and
         adding 'add' 'remove' functions to titles.
        </code>
      </pre>
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

<?php
  $conn->close;
  $result->close;
?>
