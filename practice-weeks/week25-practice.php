<?php
  error_reporting(E_ALL);
?>

<!DOCTYPE html>
<html lang="en-US">

<head>
  <meta charset="utf-8">
  <meta name="author" content="KMiskell">
  <meta name="description" content="Week 25 General Practice">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="../root-assets/favicon/javascript-original.svg" type="image/x-icon">
  <link rel="stylesheet" href="css/practice-stylesheet.css">
  <link rel="stylesheet" href="css/stylesheet-w25-practice.css">
  <link rel="stylesheet" href="../root-css/header.css">
  <link rel="stylesheet" href="../root-css/nav-buttons.css">
  <link rel="stylesheet" href="../Higlightjs/styles/tomorrow-night-bright.css">
  <script src="../Higlightjs/highlight.pack.js"></script>
  <script>hljs.initHighlightingOnLoad();</script>
  <title>Week 25 Sandbox</title>
</head>

<body>
  <div>
    <header class="header-v2">
      <h1>Week 25 Sandbox</h1>
    </header>

    <nav class="nav-v2">
      <ul>
        <li><a href="../index.html" title="Home">Home</a></li>
        <li><a href="../practice-weeks/week24-practice.php" title="Previous Work">Previous Work</a></li>
        <li><a href="../study-weeks/week25.html" title="Week Log">Week Log</a></li>
        <!-- <li><a href="../practice-weeks/week26-practice.php" title="Next Work">Next Work</a></li> -->
        <li><a href="../roadmap.html" title="Roadmap">Roadmap</a></li>
        <li><select class="hide-select" onchange="location = this.value;" target="_blank">
              <option class="hide-option" value="">Notes</option>
              <option value="../notes/HeadFirst.pdf" title="Design Studies in PDF">Design Patterns</option>
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
              <option value="../notes/Head-First-2004.pdf">Head First Design Patterns</option>
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
      <h2>Object Oriented Design Patterns Book Switch</h2>
      <div class='plaintext notes-block'>
          <p>This past week I've been reading <i>Head First Design Patterns</i> as my primary learning resource and refresher for OO design patterns. I've found I don't click well at all with it's teaching style, though. I prefer a teaching method that first details foundation, rules, and theory, then gives brief practical example, preferably also with a following challenge problem for practice.</p>
          <p><i>Head First</i>, however, teaches largely by example, breaking up the foundations over long, drawn out, slowly built examples, sometimes starting with, "done the wrong way," examples. This style is too drawn out for me and too similiar to how online courses generally teach, in which I feel I lose too much foundational knowledge in exchange for time that could be better spent than on fifty page or four hour video examples. Thus, dropping this book for now, and moving to replacement, <a href="../notes/DiveInto.pdf"><i>Dive Into Design Patterns</i></a> instead.</p>
      </div>
    </section>

    <section>
      <h2>Object Oriented Design Patterns Notes</h2>
      <div class="pdf-container">
        <iframe src="../notes/head_first_notes.pdf" class="pdf"></iframe>
        <iframe src="../notes/dive_into_notes.pdf" class="pdf"></iframe>
      </div>
    </section>

    <section id="exceptions">
      <h2>Program to Interface, Not Implementation</h2>
      <div class="grid-code-container">
      <pre class="grid-code"><code>
        &lt;?php

        require_once 'Cat.php';
        require_once 'Dog.php';
        require_once 'Panda.php';

        class AnimalFeeder{
          private $dog;
          private $cat;
          private $panda;

          public function __construct(){
            $this->dog = new Dog();
            $this->cat = new Cat();
            $this->panda = new Panda();
          }

          public function feedAnimals(){
            $this->dog->eatKibble();
            $this->cat->eatFish();
            $this->panda->eatBamboo();
          }

        }

        ?&gt;
        </code>
      </pre>
      <pre class="grid-code"><code>
        &lt;?php

        require_once 'Cat.php';
        require_once 'Dog.php';
        require_once 'Panda.php';

        class AnimalFeeder{
          private $dog;
          private $cat;
          private $panda;

          public function __construct(){
            $this->dog = new Dog();
            $this->cat = new Cat();
            $this->panda = new Panda();
          }

          public function feedAnimals(){
            $this->dog->eatKibble();
            $this->cat->eatFish();
            $this->panda->eatBamboo();
          }

        }

        ?&gt;
        </code>
      </pre>
      <pre class="grid-code"><code>
        &lt;?php

        require_once 'Cat.php';
        require_once 'Dog.php';
        require_once 'Panda.php';

        class AnimalFeeder{
          private $dog;
          private $cat;
          private $panda;

          public function __construct(){
            $this->dog = new Dog();
            $this->cat = new Cat();
            $this->panda = new Panda();
          }

          public function feedAnimals(){
            $this->dog->eatKibble();
            $this->cat->eatFish();
            $this->panda->eatBamboo();
          }

        }

        ?&gt;
        </code>
      </pre>
      <pre class="grid-code"><code>
        &lt;?php

        require_once 'Cat.php';
        require_once 'Dog.php';
        require_once 'Panda.php';

        class AnimalFeeder{
          private $dog;
          private $cat;
          private $panda;

          public function __construct(){
            $this->dog = new Dog();
            $this->cat = new Cat();
            $this->panda = new Panda();
          }

          public function feedAnimals(){
            $this->dog->eatKibble();
            $this->cat->eatFish();
            $this->panda->eatBamboo();
          }

        }

        ?&gt;
        </code>
      </pre>
      <pre class="grid-code"><code>
        &lt;?php

        require_once 'Cat.php';
        require_once 'Dog.php';
        require_once 'Panda.php';

        class AnimalFeeder{
          private $dog;
          private $cat;
          private $panda;

          public function __construct(){
            $this->dog = new Dog();
            $this->cat = new Cat();
            $this->panda = new Panda();
          }

          public function feedAnimals(){
            $this->dog->eatKibble();
            $this->cat->eatFish();
            $this->panda->eatBamboo();
          }

        }

        ?&gt;
        </code>
      </pre>

      </div>
    </section>
    <br><br>

  </main>

</body>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="js/hide-option.js"></script>    <!---requires jQuery-->
<!-- <script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script> -->

</html>
