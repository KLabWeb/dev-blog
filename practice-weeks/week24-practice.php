<?php
  namespace SmilingStallman\DevBlog\Week24;
  error_reporting(E_ALL);

  // include 'week-24-php/NamespaceA.php';
  // include 'week-24-php/NamespaceB.php';
  //
  // function printNamespace(){
  //   echo "I am Namespace Week24";
  // }
  //
  // //unqualified name access - similar to relative filename reference
  // printNameSpace();   //"I am Namespace Week24"
  //
  // //qualified name access - similar to relative filepath reference
  // $a = new ASpace\Namespacer();
  // $a->printNameSpace();   //"I am NamespaceA"
  //
  // //fully qualified name access - similar to absolute filepath reference
  // $b = new \SmilingStallman\DevBlog\Week24\BSpace\Namespacer();
  // $b->printNameSpace();   //"I am NamespaceB"
  //
  // //'use' combined with aliasing allows importing while also preventing name clashes and provides shorter reference names
  // use \SmilingStallman\DevBlog\Week24\Aspace\Namespacer as AspaceClass;
  // $a_alias = new AspaceClass();
  // $a_alias->printNameSpace();
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

    <section id="arb-keywords">
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

    <section id="exceptions">
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

    <section id="namespaces">
      <h2>PHP - Namespaces</h2>
      <pre><code class='php'>
        //Namespaces provide a way to prevent name clashes across files through encapsulation
        //They allow files to be grouped and together, then imported into a file, but each in their own namespace
        //For example, two packages, both with User classes, could exist fine in the same including file without name clash errors occuring
        //Even code without a user assigned namespace still has a namespace in PHP: the global namespaces

        //Here is an example of namespaces. Assume each namespace is also part of a large package based namespace.

        //NamespaceA.php
        &lt;?php
        namespace SmilingStallman\DevBlog\Week24\ASpace;

        class Namespacer{
          public function printNamespace(){
            echo "I am NamespaceA";
          }
        }
        ?&gt;

        //NamespaceB.php
        &lt;?php
        namespace SmilingStallman\DevBlog\Week24\BSpace;

        //same classname as class in NamespaceA.php
        class Namespacer{
          public function printNamespace(){
            echo "I am NamespaceB";
          }
        }
        ?&gt;

        //week24-practice.php
        &lt;?php
        namespace SmilingStallman\DevBlog\Week24;
        include 'week-24-php/NamespaceA.php';
        include 'week-24-php/NamespaceB.php';

        function printNamespace(){
          echo "I am Namespace Week24";
        }

        //unqualified name access - similar to relative filename reference
        printNameSpace();   //"I am Namespace Week24"

        //qualified name access - similar to relative filepath reference
        $a = new ASpace\Namespacer();
        $a->printNameSpace();   //"I am NamespaceA"

        //fully qualified name access - similar to absolute filepath reference
        $b = new \SmilingStallman\DevBlog\Week24\BSpace\Namespacer();
        $b->printNameSpace();   //"I am NamespaceB"

        //'use' combined with aliasing allows namespace importing while also preventing name clashes and provides shorter reference names
        use \SmilingStallman\DevBlog\Week24\Aspace\Namespacer as AspaceClass;
        $a_alias = new AspaceClass();
        $a_alias->printNameSpace();   //"I am NamespaceA"
        //Functions and consts can also be imported into a namespace using the 'function' and 'const' keywords combined with 'use'

        ?&gt;

        </code>
      </pre>
    </section>

    <section id="oop-separation">
      <h2>PHP - OOP General Practice</h2>
      <pre><code class='php'>
        //Lets say you want to design a base Animal class that separates common behaviors from shared behaviors. How could you do this?
        //One way would be to create an interface for each behavior, then implement different implementations of that behavior
        //By adding these behaviors via interface composition, the interface can then be set to any behavior at construction
        //Different Animal subclasses can then also set these behavior objects
        //The result is unique behaviors decoupled from both parent class, and child classes, with a uniform interface

        //Animal.php - the base parent class
        &lt;?php
        abstract class Animal{

          //unique behaviors...note no instantiation here
          protected $moveBehavior;
          protected $noiseBehavior;

          protected function set_move($moveObject){
            $this->moveBehavior = $moveObject;
          }

          protected function set_noise($noiseObject){
            $this->noiseBehavior = $noiseObject;
          }

          //concrete function shared across all classes
          public function eat(){
            echo "Animal is eating";
          }

          //wrappers, separating interface of class from behavior interfaces
          public function makeNoise(){
            $this->noiseBehavior->makeNoise();
          }

          public function move(){
            $this->moveBehavior->move();
          }

        }
        ?&gt;

        //AnimalMove.php - Animal behavior interface
        &lt;?php
        interface AnimalMove{
          public function move();
        }
        ?&gt;

        //AnimalNoise.php - Animal noise interface
        &lt;?php
        interface AnimalNoise{
          public function makeNoise();
        }
        ?&gt;

        //MoveWalk.php - An implementation of move behavior interface
        &lt;?php
        require_once 'AnimalMove.php';

        class MoveWalk implements AnimalMove{
          public function move(){
            echo "I am walking";
          }
        }
        ?&gt;

        //MoveWalk.php - Another implementation of move behavior interface
        &lt;?php
        require_once 'AnimalMove.php';

        class MoveFly implements AnimalMove{
          public function move(){
            echo "I am Flying";
          }
        }
        ?&gt;


        //Bark.php - An implementation of noise behavior interface
        &lt;?php
        require_once 'AnimalNoise.php';

        class Bark implements AnimalNoise{
          public function makeNoise(){
            echo "I am barking";
          }
        }
        ?&gt;

        //Dog.php - An extension of Animal
        &lt;?php
        require_once 'Animal.php';

        //For greater decoupling, could remove default behaviors and set by arg only
        require_once 'Bark.php';
        require_once 'MoveWalk.php';

        class Dog extends Animal{
          public function __construct($noise=null, $move=null){
            $this->set_move($noise == null ? new MoveWalk() : $move);
            $this->set_noise($move == null ? new Bark() : $noise);
          }

        }
        ?&gt;

        //test.php - testing the above
        &lt?php

        require_once 'Dog.php';
        require_once 'Bark.php';
        require_once 'MoveFly.php';

        //create a standard dog with default behaviors
        $animal = new Dog();

        $animal->makeNoise();   //I am barking
        $animal->move();        //I am walking

        //create a magical flying doge through injecting behaviors
        $bark = new Bark();
        $fly = new MoveFly();
        $another_animal = new Dog($bark, $fly);

        $another_animal->makeNoise();   //I am barking
        $another_animal->move();        //I am flying

        $animal->eat();                 //I am eating
        $another_animal->eat();         //I am eating
        ?&gt;

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
