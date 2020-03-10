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

  <link rel="shortcut icon" href="../root-assets/favicon/jquery.svg" type="image/x-icon">

  <link rel="stylesheet" href="css/stylesheet-w21-practice.css">

  <link rel="stylesheet" href="css/html-body-main.css">
  <link rel="stylesheet" href="css/code.css">
  <link rel="stylesheet" href="css/headers.css">
  <link rel="stylesheet" href="css/img-p.css">
  <link rel="stylesheet" href="css/lists-a.css">
  <link rel="stylesheet" href="css/pdf.css">
  <link rel="stylesheet" href="css/plaintext.css">
  <link rel="stylesheet" href="css/section-span-div-article.css">

  <link rel="stylesheet" href="../root-css/header.css">
  <link rel="stylesheet" href="../root-css/nav-buttons.css">

  <link rel="stylesheet" href="../Higlightjs/styles/tomorrow-night-bright.css">
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
        <li><a href="../practice-weeks/week22-practice.html" title="Next Work">Next Work</a></li>
        <li><a href="../roadmap.html" title="Roadmap">Roadmap</a></li>
        <li><select class="hide-select" onchange="location = this.value;" target="_blank">
              <option value="" class='hide-option'>Notes</option>
              <option value="../notes/jQuery.pdf" title="jQuery Studies in PDF">jQuery</option>
              <option value="../notes/Python.pdf" title="Python Studies in PDF">Python</option>
              <option value="../notes/Architecture-I.pdf" title="Design Studies in PDF">Software Design</option>
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
              <option class="hide-option" value="">Learning Resources</option>
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
    <h2>
      Hello ip <?= $_SESSION['ip'] ?>. Your current session has lasted for <?= $cur_hours ?> hours, <?= $cur_mins ?> mins.
      User Agent info allows webservers to see more data on you.
      <br>
      Here is some data on your OS and browser:
      <br><br>
      <?= $_SESSION['user_agent'] ?>
    </h2>
    <br>
  </section>


  <section>
    <h2>jQuery View Sandbox - Before jQuery</h2>

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

    <div class="event-div">
      <button class="click-me">Click Me</button>
      <button class="focus-me">Click & Click Off</button>
      <button class="show">Toggle Last Img</button>
      <button class="fade">Fade First Img</button>
      <button class="slide">Slide Container</button>
      <button class="animate">Arrange Buttons</button>
      <p class="result"></p>
    </div>

    <div class="event-div-mouse">
      <div class='wrap-click'>Click me to wrap container via wrap()</div>
      <div class='cord-click'>Click me to show mouse coordinates</div>
    </div>

  </section>

  <section>
    <h2>jQuery Memorization Practice</h2>
    <p class="plaintext">jQuery is used at my current job, with ajax() being used frequently, as well as jQuery selectors, attribute manipulation, etc.. Much of jQuery's functionality is now available in core JavaScript, ES6 and onwards, but since already been using it at job for awhile now, taking some time to fully read through docs and memorize more of it.</p>
    <br>
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
          $('#after .replace').replaceWith("&lt;div&gt;&lt;img src='assets/images/john.gif' alt='Titor jQuery img'&gt;Above &lt;div&gt;
            and &lt;img&gt; have replaced a paragraph&lt;/div&gt;");

          $('#after .replace').before('&lt;p&gt;This node inserted as html content passed in via before()&lt;/p&gt;');
          $('#after .replace').after('&lt;p&gt;This node inserted as html content passed in via after()&lt;/p&gt;');

          $('#after .replace').wrap('&lt;div style="background: black; width: 100%;"&gt;This div added to wrap image with wrap()&lt;/div&gt;');

          $('#after .replace').append('&lt;p&gt;This paragraph appended as a child to &lt;div&gt; via append(). Second image added
             via clone() on existing &lt;img&gt;. Made italic via wrapping text with wrapInner().&lt;/p&gt;');

          $('#after .replace img').clone().insertAfter($('#after .replace img'));

          $('#after .replace p:last').wrapInner('&lt;i&gt;&lt;/i&gt;');

          $('#after .wrap-click').click(() =&gt; $('#after .event-div-mouse')
            .wrap('&lt;div style="border: 5px solid #cdd422; margin: 3px;"&gt;&lt;/div&gt;'));


          //EVENT HANDLING
          $('#after .click-me').bind('click', ()=&gt; $('#after .event-div .result')
            .text("Text filled via bind() 'click' event type handling function."));

          $('#after .focus-me').focus(() =&gt; $('#after .event-div .result').text("Focused on focus button"));
          $('#after .focus-me').blur(() =&gt; $('#after .event-div .result').text("Focus removed from focus button"));

          $('#after .input-me').keypress(() =&gt; $('#after .event-div .result').text($('#after .input-me').val()));

          $('#after .cord-click').click(event =&gt; $('#after .cord-click').text(`Mouse at screen
             location x: ${event.screenX}px, y: ${event.screenY}px`));


           //ANIMATIONS
           $('#after .show').click(() =&gt; $('.replace img:last').toggle(1000));

           $('#after .fade').click(() =&gt; {
                                             const img = $('.replace img:first');
                                             Number(img.css('opacity')) === 1 ? img.fadeTo(1000, .3) : img.fadeTo(1000, 1);
                                            });

           $('#after .slide').click(() =&gt; $('.replace').slideToggle(1000));

           $('#after .animate').click(event =&gt; {
             let offset = $('#after .event-div button:first').offset().left;
             let opac = $('#after .event-div button:first').css('opacity');

             if(offset &gt;= $(document).width()-275){
               right_hit = true;
               left_hit = false;
             }
             else if(offset &lt;= 20){
               right_hit = false;
               left_hit = true;
             }

             if(right_hit){
               offset = {left: `${offset - 200}px`, opacity: opac + .1};
             }
             else if(left_hit){
               offset = {left: `${offset + 200}px`, opacity: opac - .1};
             }

             $('#after .event-div button, #after .event-div input').animate(offset)
           });
        });
      &lt;/script&gt;
      </code>
    </pre>
  </section>

  <section id="after">
    <h2>jQuery View Sandbox - After jQuery</h2>

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


    <div class="event-div">
      <button class="click-me">Show Text</button>
      <button class="focus-me">Click & Click Off</button>
      <input type="text" placeholder='Type text here'></input>
      <button class="show">Toggle Last Img</button>
      <button class="fade">Fade First Img</button>
      <button class="slide">Slide Container</button>
      <button class="animate">Arrange Buttons</button>
      <p class="result"></p>
    </div>

    <div class="event-div-mouse">
      <div class='wrap-click'>Click me to wrap container via wrap()</div>
      <div class='cord-click'>Click me to show mouse coordinates</div>
    </div>

  </section>

  <section>
    <h2>jQuery Notes</h2>
    <div class='pdf-container'>
      <iframe src="../notes/jQuery.pdf" class="pdf-single"></iframe>
    </div>
  </section>

  <br><br>

  </main>

</body>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="js/hide-option.js"></script>    <!---requires jQuery-->

<script type="text/javascript" src="js/week21-practice.js">

</script>

</html>
