<?php
  error_reporting(E_ALL);

  session_start();

  if(!isset($_SESSION['start_time'])){
    $_SESSION['start_time'] = time();
    $_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
    $_SESSION['user_agent'] = $_SERVER['HTTP_USER_AGENT'];
  }

  if($_SESSION['ip'] != $_SERVER['REMOTE_ADDR'] || $_SESSION['user_agent'] != $_SERVER['HTTP_USER_AGENT']){
    die("Access data does not match session data. Page load cancelled");
    session_destroy();
  }

  $cur_mins = round((time() - $_SESSION['start_time']) / 60);
  $cur_hours = floor($cur_mins / 60);
  $cur_mins = $cur_mins % 60;

?>

<!DOCTYPE html>
<html lang="en-US">

<head>
  <meta charset="utf-8">
  <meta name="author" content="KMiskell">
  <meta name="description" content="Week 21 General Practice">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="../root-assets/favicon/javascript-original.svg" type="image/x-icon">
  <link rel="stylesheet" href="css/practice-stylesheet.css">
  <link rel="stylesheet" href="css/stylesheet-w21-practice.css">
  <link rel="stylesheet" href="../root-css/header.css">
  <link rel="stylesheet" href="../root-css/nav-buttons.css">
  <link rel="stylesheet" href="../Higlightjs/styles/tomorrow-night-bright.css">
  <link rel="stylesheet" href='https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css'>
  <script src="../Higlightjs/highlight.pack.js"></script>
  <script>hljs.initHighlightingOnLoad();</script>
  <title>Week 21 Sandbox</title>
</head>

<body>
  <div>
    <header class="header-v2">
      <h1>Week 21 Sandbox</h1>
    </header>

    <nav class="nav-v2">
      <ul>
        <li><a href="../index.html" title="Home">Home</a></li>
        <li><a href="../practice-weeks/week20-practice.php" title="Previous Work">Previous Work</a></li>
        <li><a href="../study-weeks/week21.html" title="Week Log">Week Log</a></li>
        <!-- <li><a href="../practice-weeks/week22-practice.php" title="Next Work">Next Work</a></li> -->
        <li><a href="../roadmap.html" title="Roadmap">Roadmap</a></li>
        <li><select class="hide-select" onchange="location = this.value;" target="_blank">
              <option value="" class='hide-option'>Notes</option>
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
        <li><select class="hide-select" onchange="location = this.value;">
    ``          <option class="hide-option" value="">Learning Resources</option>
              <option value="../notes/python-crash-course.pdf">Python Crash Course</option>
              <option value="https://docs.python.org/3/tutorial/index.html">Python Official Docs</option>
              <option value="https://reactjs.org/docs/getting-started.html">React Official Docs</option>
              <option value="https://www.udemy.com/course/complete-react-developer-zero-to-mastery/">Complete React 2020 Course</option>
              <option value="../notes/php-mysql-js-jquery.pdf">Learning PHP, MySQL & JS</option>
              <option value="../notes/Prof-Frisby-Funct-JS.pdf">Prof Frsiby's Functional JS</option>
              <option value="../notes/eloquent-javascript.pdf">Eloquent JavaScript</option>
              <option value="https://developer.mozilla.org/en-US/docs/Learn">MDN Docs</option>
            </select>
        </li>
      </ul>
    </nav>
  </div>

  <main>

  <section>
    <h3>Hello ip <?= $_SESSION['ip'] ?>. Your current session has lasted for <?= $cur_hours ?> hours, <?= $cur_mins ?> mins.
      User Agent info allows webservers to see more data on you. Here is some data on your OS and browser:
      <br><br> <?= $_SESSION['user_agent'] ?><br><br> To prevent this, use an user agent switcher extension.</h3>
    <br><br>
  </section>


  <section>
    <h2>jQuery View Sandbox - Before</h2>

    <div id="box-container">
      <?php for($i = 0; $i < 12; $i++){ ?>
        <div class="color-box hvr-bounce-in">
          <div class="inner-color-box"></div>
          <div class="inner-color-box inner-color-box-bottom"></div>
        </div>
      <?php } ?>
    </div>

    <p class="p">Text is here</p>

    <div class="form-container">
      <form class="" id="jquery-form" action="">
        <label>
          Username:
          <input type="text" name="user">
        </label>
        <label>
          Pass:
          <input type="password" name="pass" value="">
        </label>
        <label>
          Date Ordered:
          <input type="date" name="date">
        </label>
        <label>
          Notes:
          <input type="textarea" name="notes">
        </label>
        <label>
          Order Details:
          <input type="text" name="details">
        </label>
      </form>
    </div>

    <p class="insert">Insert Text Here</p>

    <p class="replace">Replace Me</p>

  </section>

  <section>
    <h2>jQuery Memorization Practice</h2>
    <p>jQuery is used at my current job, with <i>ajax()</i> being used frequently, as well as jQuery selectors, attribute manipulation, etc.. Much of jQuery's functionality is now available in core JavaScript, ES6 and onwards, but since already been using it at job for awhile now, taking some time to fully read through docs and memorize more of it.</p>
    <pre><code class='jquery'>
      &lt;script type="text/javascript"&gt;
        $(document).ready(() =&gt; {
          //BASIC SELECTORS AND ATTRIBUTES
          $('.p-after').text('Text Changed');

          $('#second-form input[name="notes"]').val("Default notes added");

          $('#second-form :text').val('&lt;p&gt; text: ' + $('.p-after').text());

          $('.inner-color-box-bottom-after:odd').attr('hidden', 'true');

          $('.inner-color-box-bottom-after:even').html('&lt;img src="assets/images/lainlines.gif" alt="jquery image" style="width: 100%;
              height: 100%; margin: auto"&gt;');


          //DOM TRAVERSAL & CSS
          $('.inner-color-box-after').css({'text-align':'center', 'color':'black'});

          $('#box-container-after').children().css('border', '5px solid #e05915');

          $('.color-box-after').parent().css('background-color', 'white');

          $('.color-box-after:last').siblings().css('background-color', '#cdd422');

          $('.color-box-after').eq(2).css('background-color', '#c2dde6');

          //FILTERING
          $('.color-box-after').slice(2, 4).text("TEXT ADDED HERE");
          $('.color-box-after').slice(2, 4).css({"color":"black", "text-align": "center"});

          $('#second-form input[name="date"]').focus(()=&gt; {
            if(!$(this).is('h4')){
              $('#jquery-form-after').css({'border':'5px solid #cdd422', 'padding':'5px'});
              console.log('text');
            }
          });

          $('#second-form').find('input:text').css('transform', 'rotate(180deg)');

          $('#second-form input').not(":first, input:text").css('transform', 'rotate(20deg)');

          $('#second-form input').filter((node_index) =&gt; {
            return node_index == 3;
          }).css('opacity', '.5');

          $('#after .insert').text(`This paragraph is ${$('#after .insert').width()} px long. It's BG
             is ${$('#after .insert').css('background-color')}.`);

          //DOM MANIPULATION
          $('#after .replace').replaceWith("&lt;div&gt;&lt;img src='assets/images/john.gif' alt='Titor jQuery img'&gt;This &lt;div&gt;
            and &lt;img&gt; have replaced a paragraph&lt;/div&gt;");

        });
      &lt;/script&gt;
      </code>
    </pre>
  </section>

  <section id="after">
    <h2>jQuery View Sandbox - After</h2>

    <div id="box-container-after">
      <?php for($i = 0; $i < 12; $i++){ ?>
        <div class="color-box-after hvr-bounce-in">
          <div class="inner-color-box-after"></div>
          <div class="inner-color-box-after inner-color-box-bottom-after"></div>
        </div>
      <?php } ?>
    </div>

    <p class="p-after">Text is here</p>

    <div class="form-container-after" id="second-form">
      <form class="" id="jquery-form-after" action="">
        <label>
          Username:
          <input type="text" name="user">
        </label>
        <label>
          Pass:
          <input type="password" name="pass" value="">
        </label>
        <label>
          Date Ordered:
          <input type="date" name="date">
        </label>
        <label>
          Notes:
          <input type="textarea" name="notes">
        </label>
        <label>
          Order Details:
          <input type="text" name="details">
        </label>
      </form>
    </div>

    <p class="insert">Insert Text Here</p>

    <p class="replace">Replace Me</p>

  </section>

  <br><br>

  </main>

</body>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="js/hide-option.js"></script>    <!---requires jQuery-->
<script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>

<script type="text/javascript">
  $(document).ready(() => {
    //BASIC SELECTORS AND ATTRIBUTES
    $('.p-after').text('Text Changed');

    $('#second-form input[name="notes"]').val("Default notes added");

    $('#second-form :text').val('<p> text: ' + $('.p-after').text());

    $('.inner-color-box-bottom-after:odd').attr('hidden', 'true');

    $('.inner-color-box-bottom-after:even').html('<img src="assets/images/lainlines.gif" alt="jquery image" style="width: 100%; height: 100%; margin: auto">');


    //DOM TRAVERSAL & CSS
    $('.inner-color-box-after').css({'text-align':'center', 'color':'black'});

    $('#box-container-after').children().css('border', '5px solid #e05915');

    $('.color-box-after').parent().css('background-color', 'white');

    $('.color-box-after:last').siblings().css('background-color', '#cdd422');

    $('.color-box-after').eq(2).css('background-color', '#c2dde6');

    //FILTERING
    $('.color-box-after').slice(2, 4).text("TEXT ADDED HERE");
    $('.color-box-after').slice(2, 4).css({"color":"black", "text-align": "center"});

    $('#second-form input[name="date"]').focus(()=> {
      if(!$(this).is('h4')){
        $('#jquery-form-after').css({'border':'5px solid #cdd422', 'padding':'5px'});
        console.log('text');
      }
    });

    $('#second-form').find('input:text').css('transform', 'rotate(180deg)');

    $('#second-form input').not(":first, input:text").css('transform', 'rotate(20deg)');

    $('#second-form input').filter((node_index) => {
      return node_index == 3;
    }).css('opacity', '.5');

    $('#after .insert').text(`This paragraph is ${$('#after .insert').width()} px long. It's BG is ${$('#after .insert').css('background-color')}.`);

    //DOM MANIPULATION
    $('#after .replace').replaceWith("<div><img src='assets/images/john.gif' alt='Titor jQuery img'>This &lt;div&gt; and &lt;img&gt; have replaced a paragraph</div>");

  });
</script>

</html>
