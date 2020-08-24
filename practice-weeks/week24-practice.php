<?php
  namespace SmilingStallman\DevBlog\Week24;

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

  <link rel="shortcut icon" href="../root-assets/favicon/python.svg" type="image/x-icon">

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
        <li><a href="../practice-weeks/week23-practice.html" title="Previous Work">Previous Work</a></li>
        <li><a href="../study-weeks/week24.html" title="Week Log">Week Log</a></li>
        <li><a href="../practice-weeks/week25-practice.html" title="Next Work">Next Work</a></li>
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
      <h2>Python - Arbitrary Keyword Args</h2>
      <pre class='basic-pre'><code class='python basic-code'>
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
      <pre class='basic-pre'><code class='python basic-code'>
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


        #Can assign alias to exception to access various properties of exception
        &gt;&gt;&gt; def zero_catch(numer, denom):
        &gt;&gt;&gt;     try:
        &gt;&gt;&gt;         int(numer)/int(denom)
        &gt;&gt;&gt;     except ZeroDivisionError as zero_error:
        &gt;&gt;&gt;         print("Error: ", zero_error)
        &gt;&gt;&gt;         print("Exception Type: ", type(zero_error))
        &gt;&gt;&gt;         print("Exception args: ", zero_error.args)

        &gt;&gt;&gt; zero_catch(12, 0)

        Error:  division by zero
        Exception Type:  &lt;class 'ZeroDivisionError'&gt;
        Exception args:  ('division by zero',)


        #Can manually throw specified exception with 'raise'
        &gt;&gt;&gt; def check_curse(name):
        &gt;&gt;&gt;     if(name == 'Damien'):
        &gt;&gt;&gt;         raise NameError('Cursed Name')

        &gt;&gt;&gt; try:
        &gt;&gt;&gt;     check_curse('Damien')
        &gt;&gt;&gt; except Exception as exp:
        &gt;&gt;&gt;     print(f'Warning: exception type {type(exp)} thrown. Exception message: {exp}.')

        Warning: exception type &lt;class 'NameError'&gt; thrown. Exception message: Cursed Name.

        </code>
      </pre>
    </section>

    <section>
      <h2>PHP - Namespaces</h2>
      <pre class='basic-pre'><code class='php basic-code'>
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

    <section>
      <h2>PHP - OOP General Practice</h2>
      <pre class='basic-pre'><code class='php basic-code'>
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

    <section>
      <h2>Python - Scope & Namespaces</h2>
      <pre class='basic-pre'><code class='python basic-code'>
        #Python has local, enclosing, global, and built-in (LEGB) level scope
        #local is the innermost function scope, enclosing is the scope of all functions wrapping the function
        #global is module level Scope, built-in holds Python core names
        &gt;&gt;&gt; scope = "I am global scope"

        &gt;&gt;&gt; def scope_func():
        &gt;&gt;&gt;     scope = "I am enclosing scope for nested"

        &gt;&gt;&gt;     def nested():
        &gt;&gt;&gt;         scope = 'I am local scope for nested'
        &gt;&gt;&gt;         print(scope)                                #I am local scope for nested

        &gt;&gt;&gt;     nested()
        &gt;&gt;&gt;     print(scope)                                    #I am enclosing scope for nested

        &gt;&gt;&gt; scope_func()
        &gt;&gt;&gt; print(scope)                                        #I am global scope


        #Python does not have an equivalent of block level scope,
        #so names defined in 'for', 'while', etc. exist in same scope as statement defined in
        &gt;&gt;&gt; for one in range(1):
        &gt;&gt;&gt;     temp = 'I still exist after this loop'

        &gt;&gt;&gt; print(temp)

        I still exist after this loop. I am a global var.


        #Python name resolution is cascading, checking the innermost scope first, then move up from local-&gt;enclosing-&gt;global-&gt;built-in
        #Note that only resolution is cascading and creating a same name var in an inner scope does not change the outer scope var value
        &gt;&gt;&gt; global_var = 'global'

        &gt;&gt;&gt; def many_scopes():
        &gt;&gt;&gt;     def inner_scope():
        &gt;&gt;&gt;         global_var = "different namespace"
        &gt;&gt;&gt;         def another_scope():
        &gt;&gt;&gt;             print(global_var)

        &gt;&gt;&gt;         another_scope()
        &gt;&gt;&gt;     inner_scope()
        &gt;&gt;&gt;     global_var = "new value"

        &gt;&gt;&gt; many_scopes()
        &gt;&gt;&gt; print(global_var)

        different namespace
        global                  #resolution cascading but assignment not


        #Python allows changing of namespace for variables in global and enclosing/local scope via 'global' and 'nonlocal' keywords
        #'global' switches a local/enclosing variable to global namespace
        &gt;&gt;&gt; x = 'global'

        &gt;&gt;&gt; def global_func():
        &gt;&gt;&gt;     global x
        &gt;&gt;&gt;     x = 'I am in global namespace'

        &gt;&gt;&gt; global_func()
        &gt;&gt;&gt; print(x)

        I am in global namespace


        #Likewise, Python also has nonlocal variables, in which declaring a var nonlocal
        #sets it's namespace to namespace of nearest enclosing function
        &gt;&gt;&gt; def non_local():
        &gt;&gt;&gt;     x = "outermost"
        &gt;&gt;&gt;     def middle():
        &gt;&gt;&gt;         x = "middle"
        &gt;&gt;&gt;         def inner():
        &gt;&gt;&gt;             nonlocal x
        &gt;&gt;&gt;             x = "inner"
        &gt;&gt;&gt;             print(x)    #"inner"

        &gt;&gt;&gt;         inner()
        &gt;&gt;&gt;         print(x)        #"inner" as x inside inner() is in same namespace as middle() due to 'nonlocal'

        &gt;&gt;&gt;     middle()
        &gt;&gt;&gt;     print(x)            #"outermost"
        </code>
      </pre>
    </section>

    <section>
      <h2>Python &amp; PHP Notes</h2>
      <div class="pdf-container">
        <iframe src="../notes/Python.pdf" class="pdf-double"></iframe>
        <iframe src="../notes/ModernPHP.pdf" class="pdf-double"></iframe>
      </div>
    </section>

    <br><br>

  </main>

</body>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="js/hide-option.js"></script>    <!---requires jQuery-->

</html>
