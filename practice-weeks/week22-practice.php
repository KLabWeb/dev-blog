<?php
  error_reporting(E_ALL);

?>

<!DOCTYPE html>
<html lang="en-US">

<head>
  <meta charset="utf-8">
  <meta name="author" content="KMiskell">
  <meta name="description" content="Week 22 General Practice">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="../root-assets/favicon/python.svg" type="image/x-icon">
  <link rel="stylesheet" href="css/practice-stylesheet.css">
  <link rel="stylesheet" href="css/stylesheet-w22-practice.css">
  <link rel="stylesheet" href="../root-css/header.css">
  <link rel="stylesheet" href="../root-css/nav-buttons.css">
  <link rel="stylesheet" href="../Higlightjs/styles/tomorrow-night-bright.css">
  <script src="../Higlightjs/highlight.pack.js"></script>
  <script>hljs.initHighlightingOnLoad();</script>
  <title>Week 22 Sandbox</title>
</head>

<body>
  <div>
    <header class="header-v2">
      <h1>Week 22 Sandbox</h1>
    </header>

    <nav class="nav-v2">
      <ul>
        <li><a href="../index.html" title="Home">Home</a></li>
        <li><a href="../practice-weeks/week21-practice.php" title="Previous Work">Previous Work</a></li>
        <li><a href="../study-weeks/week22.html" title="Week Log">Week Log</a></li>
        <li><a href="../practice-weeks/week23-practice.php" title="Next Work">Next Work</a></li>
        <li><a href="../roadmap.html" title="Roadmap">Roadmap</a></li>
        <li><select class="hide-select" onchange="location = this.value;" target="_blank">
              <option class="hide-option" value="">Notes</option>
              <option value="../notes/OO_Thought_Process-Notes.pdf" title="OOP Studies in PDF">OO Thought Process</option>
              <option value="../notes/Laravel6.pdf" title="Laravel Studies in PDF">Laravel</option>
              <option value="../notes/Python.pdf" title="Python Studies in PDF">Python</option>
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
              <option value="../notes/OO-Thought-Process.pdf">Object Oriented Thought Process</option>
              <option value="https://laravel.com/docs/6.x">Laravel Official Docs</option>
              <option value="../notes/python-crash-course.pdf">Python Crash Course</option>
              <option value="https://docs.python.org/3/tutorial/index.html">Python Official Docs</option>
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
      <h2>Python - Sequences (cont.)</h2>
      <pre><code class='python'>
        #As comprehensions are expressions, nested iterables can be created by having the expression
        #for a comprehsion also be a comprehsion.
        #This code says, 'for 5 iterations (i in range(5)), create an inner array using comprehension through array [1,2,3,4]).'
        &gt;&gt;&gt; nested_comp = [[x for x in [1,2,3,4]] for i in range(5)]
        &gt;&gt;&gt; print(nested_comp)
        [[1, 2, 3, 4], [1, 2, 3, 4], [1, 2, 3, 4], [1, 2, 3, 4], [1, 2, 3, 4]]


        #Single item tuples MUST be declared with a trailing common following the item
        ('only one',)


        #Can loop through dictonary as if was ordered by passing into enumerate
        #enumerate() takes in an iterable and returns a tuple with a counter, where counter acts as index value
        &gt;&gt;&gt; my_dict = {'person': 'Tom', 'age': 32, 'city': 'NYC'}
        &gt;&gt;&gt; for index, value in enumerate(my_dict):
        &gt;&gt;&gt;     print(f"{index}: {value}")
        0: person
        1: age
        2: city


        #Can loop through multiple itetables by passing iterables into zip() during loop
        &gt;&gt;&gt; questions = ["Name", "How old", "Resident city"]
        &gt;&gt;&gt; answers = ["Tom", 32, "NYC"]

        &gt;&gt;&gt; for q, a in zip(questions, answers):
        &gt;&gt;&gt;     print(f'{q}? {a}')
        Name? Tom
        How old? 32
        Resident city? NYC


        #reversed() returns a reversed sequence copy of the sequence passed into it
        &gt;&gt;&gt; for i in reversed(questions):
        &gt;&gt;&gt;     print(i)
        NYC
        32
        Tom


        #'in' and 'not in' can be used on all sequences to boolean check existence of value in sequence
        &gt;&gt;&gt; print(f'"Tom" is in "answers" list? {"Tom" in answers}')
        "Tom" is in "answers" list? True


        #Can use comparison operators on sequences, such as lists and dictionaries
        #in such comparisons done lexicographical, comparing 1st index to 1st index, etc. and returing final result
        #for if all ==, all &gt;, etc.

        &gt;&gt;&gt; names = ['Yang Wen-li', 'Reinhard von Lohengramm', 'Siegfried Kircheis']
        &gt;&gt;&gt; dupe__names = ['Yang Wen-li', 'Reinhard von Lohengramm', 'Siegfried Kircheis']
        &gt;&gt;&gt; bad_names = ['Yang Wen-li', 'Reinhard', 'Siegfried Kircheis']
        &gt;&gt;&gt; print(f'{names == dupe__names} {names == bad_names}')
        names == dupe__names? True. names == bad_names? False.

        &gt;&gt;&gt; num_list = [1, 2, 3]
        &gt;&gt;&gt; another_num = [1, 2, 4]
        &gt;&gt;&gt; print(f'''num_list &gt; another_num? {num_list &gt; another_num}
        &gt;&gt;&gt;           num_list &lt; another_num? {num_list &lt; another_num}''')
        num_list &gt; another_num? False
        num_list &lt; another_num? True
        </code>
      </pre>
    </section>

    <section>
      <h2>Python - Modules & Packages</h2>
      <pre><code class='python'>
        #Python modules are simply scripts that can be imported into other scripts, then had their methods called,
        #vars accessed, etc. from the including script

        #module.py
        &gt;&gt;&gt; def hello_module():
        &gt;&gt;&gt;     print("This function exists in module.py")

        &gt;&gt;&gt; module_var = "I am a module variable."


        #week22.py
        &gt;&gt;&gt; import module
        &gt;&gt;&gt; module.hello_module()
        &gt;&gt;&gt; print(module.module_var)

        This function exists in module.py
        I am a module variable.

        #Can get all names (in array of strings) in module by calling dir(my_module) on imported module)


        #week22.py
        &gt;&gt;&gt; print(dir(module))

        ['__builtins__', '__cached__', '__doc__', '__file__', '__loader__', '__name__', '__package__',
         '__spec__', 'hello_module', 'i', 'module_var']


        #Packages are collections of modules where can import all modules in package in a single export
        my_package/
            __init__.py
            base_module.py
            ...
            inner_pack/
                _init__.py
                inner_module.py


        #Package imports (what to include in package) defined in __init__.py files contained within package/sub-package folders
        #importing via 'from .my_module import *' style imports all modules name into same package level namespace

        #base_module.py
        &gt;&gt;&gt; def print_me():
        &gt;&gt;&gt;     print("I am a module in the base my_package package")

        &gt;&gt;&gt; def _hidden_function():
        &gt;&gt;&gt;     print("I am not available")


        #my_package/__init__.py
        &gt;&gt;&gt; from .base_module import *
        &gt;&gt;&gt; from .inner_pack import *


        #inner_module.py
        &gt;&gt;&gt; def print_me():
        &gt;&gt;&gt;     print("I am a module in the nested package inner_pack")


        #inner_pack/__init__.py
        &gt;&gt;&gt; from .inner_module import *


        #week22.py
        &gt;&gt;&gt; import my_package
        &gt;&gt;&gt; my_package.inner_print_me()


        #Modules can also be imported into private namespaces within a package
        #This prevents nameclashes and huge namespaces, but requires more verbose reference

        #my_package/__init__.py
        &gt;&gt;&gt; import my_package.base_module
        &gt;&gt;&gt; import my_package.inner_pack.inner_module


        #inner_pack/__init__.py
        &gt;&gt;&gt; import my_package.inner_pack.inner_module


        #week22.py
        &gt;&gt;&gt; import my_package
        &gt;&gt;&gt; my_package.base_module.base_print_me()
        &gt;&gt;&gt; my_package.inner_pack.inner_module.inner_print_me()


        #Importing modules into import script using 'from' with module/sub-package specific
        #imports gives each module/sub-package its own namespace in importing file, thus removing need to
        #reference imports via package name

        #week22.py
        &gt;&gt;&gt; from my_package import inner_pack, base_module
        &gt;&gt;&gt; base_module.base_print_me()
        &gt;&gt;&gt; inner_pack.inner_module.inner_print_me()


        #Can also import just specific parts of module

        #base_module.py
        &gt;&gt;&gt; def base_print_me():
        &gt;&gt;&gt;     print("I am a module in the base my_package package")

        &gt;&gt;&gt; def base_hidden_function():
        &gt;&gt;&gt;     print("I am not available")


        #week22.py
        &gt;&gt;&gt; from my_package.base_module import base_print_me
        &gt;&gt;&gt; base_print_me()
        &gt;&gt;&gt; base_hidden_function()

        I am a module in the base my_package package

        Traceback (most recent call last):
          File "week22.py", line 216, in &lt;module&gt;
            base_hidden_function()
        NameError: name 'base_hidden_function' is not defined

        </code>
      </pre>
    </section>

    <section>
      <h2>Python - String Formatting II</h2>
      <pre><code class='python'>
        #format() allows for formating by passing in arguments into "formate fields," either by index or key
        #As f-strings are a Python 3.6 addition, this will be used for formatting strings in older code
        &gt;&gt;&gt; print('Hello. My name is {1}. I am {0} years old. I live in {city}'.format('32', 'Mark', city='Denver'))
        Hello. My name is Mark. I am 32 years old. I live in Denver


        #Manual string formatting allows another to format strings, and is often used with repr()
        #repr() takes and object and returns a string representation of it
        &gt;&gt;&gt; cities = ['Chicago', 'Portland', 'Denver', 'Seattle']
        &gt;&gt;&gt; print('\nThe cities are: ' + repr(cities) + f'. There are {4} cities in ' + repr(10) + ' states.')

        The cities are: ['Chicago', 'Portland', 'Denver', 'Seattle']. There are 4 cities in 10 states.

        &gt;&gt;&gt; def double(n):
        &gt;&gt;&gt;     return n * 2

        &gt;&gt;&gt; print('\nThree doubled is ' + repr(double(3)) + '\n')

        Three doubled is 6

        &gt;&gt;&gt; for x in range(1, 10):
        &gt;&gt;&gt;     print(repr(x), repr(x*x).rjust(2), repr(x**3).rjust(4))

        1  1    1
        2  4    8
        3  9   27
        4 16   64
        5 25  125
        6 36  216
        7 49  343
        8 64  512
        9 81  729

        </code>
      </pre>
    </section>

    <section>
      <h2>Python - File & <i>input()</i> I/O</h2>
      <pre><code class='python'>
        #Python's open() method opens a file in a specific read/write mode and assigns the file to a file object
        #Various methods, such as read(), write(), readline(), etc. can then be called on that object for interaction with the file
        &gt;&gt;&gt; file = open('read_me.txt', 'r+')


        #Can read whole file (or up to a max num chars/bytes, if pass in 'size' arg) by calling read() on file object
        &gt;&gt;&gt; print(file.read(150))
        This is the first line

        The second line is a blank line. This is the third line.
        This is the fourth line. It is a long line. Whenever I find myself g


        #Python uses pointer for file interaction. A read(50) reads to the 50th char. A following read() would start at the 51st char.
        #To set the pointer position, use seek(offset, position) where 'position' specifies where to start,
        #and offset moves pointer by n from that char/byte.
        #Note that seeking is limited to only end of file last char and start of file offsets for text file objects
        &gt;&gt;&gt; file.seek(0)
        &gt;&gt;&gt; print(file.readline())

        This is the first line

        &gt;&gt;&gt; file.seek(400, 0)
        &gt;&gt;&gt; print(file.readline())

        er hand of me, that it requires a strong moral principle to prevent me from deliberately stepping into the street,
        and methodically knocking hats off - then, I account it high time to get to sea as soon as I can.


        #Get current pointer position with .tell()
        &gt;&gt;&gt; print(file.tell())
        621


        #list(file_var) and file_var.readlines() will both return a list of a file, one line per index for text files
        &gt;&gt;&gt; file.seek(0)
        &gt;&gt;&gt; print(repr(list(file)))

        ['This is the first line\n', '\n', 'The second line is a blank line. This is the third line.\n', "This is the fourth line. It is
         a long line. Whenever I find myself growing grim about the mouth; whenever it is a damp, drizzly November in my soul; whenever
         I find myself involuntarily pausing before coffin warehouses, and bringing up the rear of every funeral I meet; and especially
         whenever my hypos get such an upper hand of me, that it requires a strong moral principle to prevent me from deliberately
         stepping into the street, and methodically knocking people's hats off - then, I account it high time to get to sea as soon
         as I can.\n"]


        #Write fo file via write() method which takes in a string for text files or byte object for binary
        #write(), like read, writes from current pointer, so be careful of accidental overwriting
        &gt;&gt;&gt; file.seek(0, 2)
        &gt;&gt;&gt; for line in range(4):
        &gt;&gt;&gt;     file.write(f"I am new line {line}
        &gt;&gt;&gt; ")
        &gt;&gt;&gt; file.seek(0)
        &gt;&gt;&gt; print(file.read())

        This is the first line

        The second line is a blank line. This is the third line.
        This is the fourth line. It is a long line. Whenever I find myself growing grim about the mouth; whenever it is a damp,
        drizzly November in my soul; whenever I find myself involuntarily pausing before coffin warehouses, and bringing up the
        rear of every funeral I meet; and especially whenever my hypos get such an upper hand of me, that it requires a strong
        moral principle to prevent me from deliberately stepping into the street, and methodically knocking hats off -
        then, I account it high time to get to sea as soon as I can.
        I am new line 0
        I am new line 1
        I am new line 2
        I am new line 3


        #Can read user input through use of input(), which pauses script, asks for input, then returns input in string and continues
        &gt;&gt;&gt; age = input("Hello. How old are you?:")
        &gt;&gt;&gt; print(f"Your age is {age}. You will be 100 in {100 - int(age)} years.")
        Hello. How old are you?:
        32
        Your age is 32. You will be 100 in 68 years.
        </code>
      </pre>
    </section>

    <section>
      <h2>Python - While Loops</h2>
      <pre><code class='python'>
        #While loop is in standard for of 'while condition:'
        &gt;&gt;&gt; message = ''
        &gt;&gt;&gt; while message != 'quit':
        &gt;&gt;&gt;     message = input("Enter a message to be repeated or type quit to exit: ")
        &gt;&gt;&gt;     print(message)

        Enter a message to be repeated or type quit to exit: First message
        First message
        Enter a message to be repeated or type quit to exit: Hey look, another input
        Hey look, another input
        Enter a message to be repeated or type quit to exit: quit
        quit


        #While loops can be used to iterate through a collection, like for loops
        &gt;&gt;&gt; full_list = ["One", "Red", 3, ["Inner", "List"]]
        &gt;&gt;&gt; empty_list = []

        &gt;&gt;&gt; while full_list:
        &gt;&gt;&gt;     empty_list.append(full_list.pop(0))

        &gt;&gt;&gt; print(repr(empty_list))

        ['One', 'Red', 3, ['Inner', 'List']]


        #'while' combined with 'in' and 'remove()' makes a nice way to remove all X from list
        &gt;&gt;&gt; colors = ["red", "blue", "red", "yellow", "black", "red"]

        &gt;&gt;&gt; while "red" in colors:
        &gt;&gt;&gt;     colors.remove("red")

        &gt;&gt;&gt; print(repr(colors))

        ['blue', 'yellow', 'black']

        </code>
      </pre>
    </section>

    <section>
      <h2>PHP - Namespaces</h2>
      <pre><code class='php'>
        //Namespaces allow you to segregate functions, consts, and classes similar to how you would in a directory structure
        //This prevents nameclashes when using classes, etc. across multiple packages
        //Below is an example of two classes with the same name, both being used in the same requiring class, through seperate Namespaces

        //---dog.php---
        &lt;?php

        //create namespace
        namespace canine\dog;

        class dog{
          private $name;

          function __construct($name){
            $this->name = $name;
          }

          function get_name(){
            echo "dog.php name is: $this->name";
          }
        }
        ?&gt;


        //---canine.php---
        &lt;?php

        //create another namespace
        namespace dog\big;

        //same class name as dog.php
        class dog{
          private $name;

          function __construct($name){
            $this->name = $name;
          }

          function get_name(){
            echo "canine.php name is: $this->name";
          }
        }
        ?&gt;


        //---week22-practice.php---
        require_once('dog.php');
        require_once('canine.php');

        //shorten with alias
        use \canine\dog\dog as dogA;
        use \dog\big\dog as dogB;

        $testDog = new dogA("Spot");
        $anotherDog = new dogB("Yang Wen-li");

        echo $testDog->get_name();      //Spot
        echo $anotherDog->get_name();   //Yang Wen-li

        //reference via full namespace
        $longPathDog = new \canine\dog\dog("Killer");
        echo $longPathDog->get_name();  //killler

        </code>
      </pre>
    </section>

    <section>
      <h2>Checkpoint</h2>
      <div class='plaintext' class='p-span'>
        <p>
          At my current job, the bulk of my work is adding procedural code to existing procedural code. Unfortunately, the codebase is very old, was built with very little design prior, and has very tight coupling and poor encapsulation, single responsibility, etc.. Also, the manager here is very resistant to re-factoring. While new code I write is more organized, with distinct seperation between front-end views and back end implementation, since this is not an OOP shop, my OO is a bit rusty, having not worked much with it since Java in 2014, and some with React and JavaScript last year &#40;before switching to functional programming for front-end shortly after&#41;.
        </p>
        <p>
          Last month, I was put in charge of the long term project of re-designing and re-building our existing primary customer and internal facing API, which is currently a hodge podge of procedural code written by many people over the years. Since I will be doing this OO, I want to brush up on my OO foundations and review design patterns, as well as SOLID principles, like dependency inversion and injection, first.</p>
        </p>
        <p>
          Thus, I started reading, "Clean Architecture," by Robert C. Martin. A third of the way into it, though, while I found the book to be an excellent quick overview of many design concepts and principles, it was too terse and quick moving for what I was looking for. Then, taking a break from reading this and looking more at PHP frameworks used in API design and implementation, I realized a lot of OO design patterns and principles are covered by frameworks from the get-go (ex. Laravel as an MVC framework, handling dependency injection, autoloading, etc. largely automatically by design).
        </p>
        <p>
          So, I started studying Laravel. But as I got further into it, again I found myself still wanting more brush-up and knowledge expansion on core OOP, OO design, and design patterns before continuing studying Laravel. Being someone who only knows how to use an implementation of knowledge instead of also holding that knowledge is not something I want to be as a dev, as I believe frameworks and libraries should never act as a substitute for core language and theory knowledge.
        </p>
        <p>
          Thus, finally, I ended up back at more core OO design and architecture studies as desired before using frameworks which implement them. Given this current path, here is what I'm planning for coming studies:
        </p>

        <ol class="no-margin" type="none">
          <li class="margin-li"><b>OOP & OOD</b> - foundations first</li>
          <li>
            <ol type="I">
              <li>"The Object-Oriented Thought Process" --> review of base OOP, why OOP?</li>
              <li>"Head First Design Patterns" --> more details and further into OOD</li>
            </ol>
          </li>
          <li class="margin-li"><b>Laravel & PHP</b> - implementation of foundations</li>
          <li>
            <ol type="I">
              <li>Laravel official docs</li>
              <li>Laracasts</li>
              <li>"Modern PHP: New Features and Good Practices"</li>
            </ol>
          </li>
          <li class="margin-li"><b>API Design</b> - the API itself</li>
          <li>
            <ol type="I">
              <li>Undetermined learning resource(s)</li>
            </ol>
          </li>
          <li class="margin-li"><b>Python</b> - in concurrence with above</li>
          <li>
            <ol type="I">
              <li>Python official docs</li>
              <li>"Python Crash Course"</li>
            </ol>
          </li>
          <p>
            That of course also means that Laravel goes on hold until I have an expanded understanding of the foundations that build the framework's patterns. This is not ideal for while also hunting a new dev job, as I'd like to learn more frameworks, languagues, and libraries immediatly, but I'd still rather go down the right path for full foundational learning, than the rushed path with only partial understanding.
          </p>
        </ul>
      </div>
    </section>

    <section>
      <h2>Object Oriented Foundations (Review)</h2>
      <div class='plaintext notes-block'>
          <a href="../notes/OO_Thought_Process-Notes.pdf">READ NOTES HERE</a>
      </div>
    </section>


    <section>
      <h2>Python & Object Oriented Foundations Review Notes</h2>
        <div class="pdf-container">
          <iframe src="../notes/Python.pdf" class="pdf"></iframe>
          <iframe src="../notes/OO_Thought_Process-Notes.pdf" class="pdf"></iframe>
        </div>
    </section>

    <br><br>

  </main>

</body>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="js/hide-option.js"></script>    <!---requires jQuery-->

</html>
