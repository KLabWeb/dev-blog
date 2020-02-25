<?php
  error_reporting(E_ALL);
?>

<!DOCTYPE html>
<html lang="en-US">

<head>
  <meta charset="utf-8">
  <meta name="author" content="KMiskell">
  <meta name="description" content="Week 24 General Practice">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="../root-assets/favicon/javascript-original.svg" type="image/x-icon">
  <link rel="stylesheet" href="css/practice-stylesheet.css">
  <link rel="stylesheet" href="css/stylesheet-w24-practice.css">
  <link rel="stylesheet" href="../root-css/header.css">
  <link rel="stylesheet" href="../root-css/nav-buttons.css">
  <link rel="stylesheet" href="../Higlightjs/styles/tomorrow-night-bright.css">
  <script src="../Higlightjs/highlight.pack.js"></script>
  <script>hljs.initHighlightingOnLoad();</script>
  <title>Week 24 Sandbox</title>
</head>

<body>
  <div>
    <header class="header-v2">
      <h1>Week 24 Sandbox</h1>
    </header>

    <nav class="nav-v2">
      <ul>
        <li><a href="../index.html" title="Home">Home</a></li>
        <li><a href="../practice-weeks/week23-practice.php" title="Previous Work">Previous Work</a></li>
        <li><a href="../study-weeks/week24.html" title="Week Log">Week Log</a></li>
        <!-- <li><a href="../practice-weeks/week25-practice.php" title="Next Work">Next Work</a></li> -->
        <li><a href="../roadmap.html" title="Roadmap">Roadmap</a></li>
        <li><select class="hide-select" onchange="location = this.value;" target="_blank">
              <option class="hide-option" value="">Notes</option>
              <option value="../notes/ModernPHP.pdf" title="Modern PHP Studies in PDF">Modern PHP</option>
              <option value="../notes/Python.pdf" title="Python Studies in PDF">Python</option>
              <option value="../notes/OO_Thought_Process-Notes.pdf" title="OOP Studies in PDF">OO Thought Process</option>
              <option value="../notes/Laravel6.pdf" title="Laravel Studies in PDF">Laravel</option>
              <option value="../notes/PHP7.pdf" title="PHP Studies in PDF">PHP</option>
              <option value="../notes/Architecture-I.pdf" title="Design Studies in PDF">Software Design</option>
              <option value="../notes/jQuery.pdf" title="jQuery Studies in PDF">jQuery</option>
              <option value="../notes/React-II.pdf" title="React Studies in PDF">REACT II</option>
              <option value="../notes/MySQL.pdf" title="React Studies in PDF">MySQL & DB Design</option>
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
              <option value="../notes/Modern-PHP-2015.pdf">Modern PHP</option>
              <option value="../notes/python-crash-course.pdf">Python Crash Course</option>
              <option value="https://docs.python.org/3/tutorial/index.html">Python Official Docs</option>
              <option value="../notes/OO-Thought-Process.pdf">Object Oriented Thought Process</option>
              <option value="https://laravel.com/docs/6.x">Laravel Official Docs</option>
              <option value="https://reactjs.org/docs/getting-started.html">React Official Docs</option>
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
      <h2>Python - Arbitrary Keyword Args</h2>
      <pre><code class='python'>
        #In addition to positional arbitrary args, Python also provides keyword arbitary args
        &gt;&gt;&gt; def cities_lived(first_name, last_name, **cities):
        &gt;&gt;&gt;     if cities:
        &gt;&gt;&gt;         print(f"{first_name} {last_name} has lived in {len(cities)} cities:\n")
        &gt;&gt;&gt;         for order, city in cities.items():
        &gt;&gt;&gt;             print(f"{order} city: {city.title()}")
        &gt;&gt;&gt;     else:
        &gt;&gt;&gt;         print(f"{first_name} {last_name} has not lived in any cities")

        Tom Markel has lived in 3 cities:

        first city: Chicago
        second city: Portland
        third city: Seattle
        </code>
      </pre>
    </section>

    <section>
      <h2>Python - Exceptions</h2>
      <pre><code class='python'>
        #Python try-catch is a bit different than in other languages, and instead uses try-except
        #multiple 'except' with different exception types can be defined, as well as an 'else' to execute only if no exception thrown
        #last, typical 'finally' statement can be added to 'try', to execute regardless of if exception thrown or not

        &gt;&gt;&gt; def catch_me(numer, denom):
        &gt;&gt;&gt;     try:
        &gt;&gt;&gt;         int(numer)/int(denom)
        &gt;&gt;&gt;     except ValueError:
        &gt;&gt;&gt;         print("catch_me() call failed due to non-numerical args")
        &gt;&gt;&gt;     except ZeroDivisionError:
        &gt;&gt;&gt;         print("catch_me() call failed due to zero denominator")
        &gt;&gt;&gt;     except:
        &gt;&gt;&gt;         print("catch_me() call failed due to other exception")
        &gt;&gt;&gt;     else:
        &gt;&gt;&gt;         print(f"Divsion {numer} / {denom} = {numer / denom}")
        &gt;&gt;&gt;     finally:
        &gt;&gt;&gt;         print(f"catch_me() call finished")

        &gt;&gt;&gt; catch_me(12, "fish")
        catch_me() call failed due to non-numerical args
        catch_me() call finished

        &gt;&gt;&gt; catch_me(12, 0)
        catch_me() call failed due to zero denominator
        catch_me() call finished

        &gt;&gt;&gt; catch_me(12, 3)
        Divsion 12 / 3 = 4.0
        catch_me() call finished
        </code>
      </pre>
    </section>

    <br><br>

  </main>

</body>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="js/hide-option.js"></script>    <!---requires jQuery-->
<!-- <script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script> -->

</html>
