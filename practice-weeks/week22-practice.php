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
  <link rel="shortcut icon" href="../root-assets/favicon/javascript-original.svg" type="image/x-icon">
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
        <!-- <li><a href="../practice-weeks/week23-practice.php" title="Next Work">Next Work</a></li> -->
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

    <!-- <section>
      <h2></h2>
    </section> -->

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
      <h2>Python - Modules</h2>
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

</html
