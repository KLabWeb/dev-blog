<?php
  require_once('week-20-php/check_pass.php');
  require_once('week-20-php/auth.php');

  auth();

  require_once('week-19-php/tableBuilder.php');
  require_once('week-19-php/dbConn.class.php');

  $conn = dbConn::getInstance();

  $customers = $conn->query('SELECT * FROM customers');
  if(!$customers){
    echo "Error: no customers";
    die();
  }

  $cust_head = array_keys($customers->fetch_assoc());
  $cust_rows = $customers->fetch_all();

  //set user cookie...domain set false for localhostx
  if(!isset($_COOKIE['userInfo'])){
    $user_ip = $_SERVER['REMOTE_ADDR'];
    setcookie('userInfo', json_encode(['userID' => 'demo', 'lastLogin' => date("m-d-Y H:i:s"), 'visits' => 1, 'ip' => $user_ip]), time() + 60 * 60 * 24 * 365);
  }
?>

<!DOCTYPE html>
<html lang="en-US">

<head>
  <meta charset="utf-8">
  <meta name="author" content="KMiskell">
  <meta name="description" content="Week 20 General Practice">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="shortcut icon" href="../root-assets/favicon/python.svg" type="image/x-icon">

  <link rel="stylesheet" href="css/html-body-main.css">
  <link rel="stylesheet" href="css/code.css">
  <link rel="stylesheet" href="css/form.css">
  <link rel="stylesheet" href="css/headers.css">
  <link rel="stylesheet" href="css/img-p.css">
  <link rel="stylesheet" href="css/lists-a.css">
  <link rel="stylesheet" href="css/pdf.css">
  <link rel="stylesheet" href="css/plaintext.css">
  <link rel="stylesheet" href="css/section-span-div-article.css">
  <link rel="stylesheet" href="css/datatable.css">

  <link rel="stylesheet" href="../root-css/header.css">
  <link rel="stylesheet" href="../root-css/nav-buttons.css">

  <link rel="stylesheet" href='https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css'>

  <link rel="stylesheet" href="../Higlightjs/styles/tomorrow-night-bright.css">
  <script src="../Higlightjs/highlight.pack.js"></script>
  <script>hljs.initHighlightingOnLoad();</script>

  <title>Week 20 Sandbox</title>
</head>

<body>
  <div>
    <header class="header-v2">
      <h1>Week 20 Sandbox</h1>
    </header>

    <nav class="nav-v2">
      <ul>
        <li><a href="../index.html" title="Home">Home</a></li>
        <li><a href="../practice-weeks/week19-practice.php" title="Previous Work">Previous Work</a></li>
        <li><a href="../study-weeks/week20.html" title="Week Log">Week Log</a></li>
        <li><a href="../practice-weeks/week21-practice.php" title="Next Work">Next Work</a></li>
        <li><a href="../roadmap.html" title="Roadmap">Roadmap</a></li>
        <li><select class="hide-select" onchange="location = this.value;" target="_blank">
              <option class="hide-option" value="">Notes</option>
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
    <?php if(isset($_COOKIE['userInfo'])){
        $user_cookie = json_decode($_COOKIE['userInfo'], true);
        $user_cookie['visits']++;
        setcookie('userInfo', json_encode($user_cookie), time() + 60 * 60 * 24 * 365);
    ?>
        <section>
          <h2>Hello ip <?= $user_cookie['ip'] ?>. Your first visit here was <?= $user_cookie['lastLogin']?>. You have visited this page <?= $user_cookie['visits'] ?> times. <br>To help avoid tracking, install a cookie auto-delete extension.</h2>
        </section>
    <?php } ?>

    <section>
      <h2>PHP Form Sanitzation</h2>
        <pre class="basic-pre"><code class='php basic-code'>

      //Use proper semantic hmtl to limit input first &#40;ex. &lt;input type='number'&gt; instead of &lt;input type='text'&gt;
      //Still need to do proper sanitizing via PHP before submitting, though:

      //string sanitization
      function sanitizeString($string){
        $string = stripslashes($string);  //removes slashes
        $string = htmlentities($string);  //replaces html tags with proper &lt;, etc.
        $string = strip_tags($string);   //removes angle brackets fully

        return $string;
      }

      //SQL sanitization
      function sanitizeSQL($string, $conn){
        $string = $conn->real_escape_string($string);   //escapes special chars
        return sanitizeString($string);
      }
        </code>
      </pre>
    </section>

    <div class="table-container">
      <h5>DB connection status: <?= $conn->testConnection() ?></h5>
      <h4>Customers</h4>
      <table class="wide-table" id="wide-tableA" class="display">
          <thead>
              <?php add_head_row($cust_head); ?>
          </thead>
          <tbody>
              <?php get_row_group($cust_rows); ?>
          </tbody>
      </table>
    </div>

    <section>
      <h2>PHP Form GET w/ Ajax & Response View Update</h2>
        <pre class="basic-pre"><code class='php basic-code'>
          //get_customer.php

          header('Content-type: application/json');
          require_once 'dbConn.class.php';

          $conn = dbConn::getInstance();
          if(!$conn){
            echo 'connection failed';
          }

          $custID = $_GET['custID'];
          if(!isset($custID)){
            echo 'Cannot query without pkey custID';
          }

          $result = $conn->query("SELECT * FROM customers WHERE custID = '$custID'");
          if(!$result){
            echo 'No customer exists with specified ID.';
          }

          $customer = $result->fetch_assoc();
          if(!$customer){
            echo 'No result';
          }

          echo json_encode($customer);
          </code>
        </pre>

        <pre class="basic-pre"><code class='js basic-code'>
          //form submission handling function in this page

          $('#cust_pop').submit(function(event){
            event.preventDefault();

            $.ajax({
              url: 'week-20-php/get_customer.php',
              type: 'GET',
              data: $('#cust_pop').serialize(),
              dataType: 'json',
              success: function(response){
                if(response == null){
                  alert("No customer found with this ID");
                }
                for(key in response){
                  $(`input[name="${key}"]`).val(response[key]);
                }
              },
              error: function(response){
                alert('Request failed');
              }
            });
          });
        </code>
      </pre>
    </section>

    <section class='formSection'>
      <form id="cust_pop" action="index.php" method="post">
        <h4>Enter customer ID to populate Update Form</h4>
        <input id='sendID' type='text' name='custID'>
        <input type='submit' value='Populate Customer Edit'>
      </form>
    </section>

    <section class='formSection'>
      <h4>Update Customer Info</h4>
      <form class='rows-form' action="update" method="post">
        <label>
          Title:<br>
          <input type='text' name='title'>
        </label>
        <label>
          Last Name:<br>
          <input type='text' name='last'>
        </label>
        <label>
          First Name:<br>
          <input type='text' name='first'>
        </label>
        <label>
          Phone:<br>
          <input type='text' name='phone'>
        </label>
        <label>
          Unit:<br>
          <input type='text' name='unit'>
        </label>
        <label>
          City:<br>
          <input type='text' name='city'>
        </label>
        <label>
          State:<br>
          <input type='text' name='state'>
        </label>
        <label>
          Zip:<br>
          <input type='text' name='zip'>
        </label>
        <label>
          Country:<br>
          <input type='text' name='country'>
        </label>
        <label>
          Employee Num:<br>
          <input type='text' name='employee num'>
        </label>
        <label>
          Credit Limit:<br>
          <input type='text' name='credit limit'>
        </label>
        <br>
        <input class='submit' type="submit" value="Update Customer">
      </form>
    </section>

    <section>
      <h2>PHP Cookies</h2>
          <pre class="basic-pre"><code class='php basic-code'>
            //set user cookie...domain set false for localhostx
            if(!isset($_COOKIE['userInfo'])){
              $user_ip = $_SERVER['REMOTE_ADDR'];
              setcookie('userInfo', json_encode(['ip' => $user_ip, 'lastLogin' => date("m-d-Y H:i:s"),
               'visits' => 1]), time() + 60 * 60 * 24 * 365, '/', false);
            }

            //if cookie is set, show message
            &lt;?php if(isset($_COOKIE['userInfo'])){
                $user_cookie = json_decode($_COOKIE['userInfo'], true);
                $user_cookie['visits']++;
                setcookie('userInfo', json_encode($user_cookie), time() + 60 * 60 * 24 * 365, '/', false);
            ?&gt;
              &lt;section&gt;
                &lt;h2&gt;Hello ip &lt;?= $user_cookie['ip'] ?>. Your first login was &lt;?= $user_cookie['lastLogin']?>.
                You have visited this page &lt;?= $user_cookie['visits'] ?&gt; times.
                To help avoid tracking, install a cookie auto-delete extension.&lt;/h2&gt;
              &lt;/section&gt;
            &lt;?php } ?&gt;
          </code>
        </pre>
      </section>

      <section>
        <h2>User Creation and Login Auth for Page Access w/ Login Cookies for 12H</h2>
          <pre class="basic-pre"><code class='jsx basic-code'>
            //register.php
            //Registration page w/ form to input reg info, then fetch call to createuser.php
            //Upon successful registration, creates user login info cookie
            //Includes 'Continue' option to continue to latest work page for already registered users.

            &lt;main&gt;
              &lt;div class=""&gt;
                &lt;h4 style="display: none;" id="error"&gt;Database error. Could not register&lt;/h4&gt;
                &lt;h4&gt;Please Register before accessing this page. If already registered, click 'Continue' to log in.&lt;/h4&gt;
                &lt;form id="regform" style="display: flex; flex-flow: column; width: 300px"&gt;
                  &lt;label&gt;
                    Username:
                    &lt;input type="text" name="username" required&gt;
                  &lt;/label&gt;
                  &lt;label&gt;
                    Password:
                    &lt;input type="password" minlength="8" maxlength="50" name="pass" required&gt;
                  &lt;/label&gt;
                  &lt;label&gt;
                    Email:
                    &lt;input type="email" maxlength="100" name="email"&gt;
                  &lt;/label&gt;
                  &lt;input type="submit" value="Register"&gt;
                &lt;/form&gt;
                &lt;button id="continue"&gt;Continue&lt;/button&gt;
              &lt;/div&gt;
            &lt;/main&gt;
            &lt;/body&gt;
            &lt;/html&gt;

            &lt;script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"&gt;&lt;/script&gt;

            &lt;script&gt;
            $('#regform').submit(event =&gt; {
              event.preventDefault();
              let formData = new FormData(event.target);

              fetch('createuser.php',
                    {
                     method: 'POST',
                     body: formData,
                     credentials: 'same-origin'
                    }
                  ).then(response =&gt; response.text())
                  .then(result =&gt;
                  {
                      if(result === "success"){
                        window.location = "../week20-practice.php";

                        let date = new Date();
                        date = date.setTime(date.getTime() + 12 * 60 * 60 * 1000);

                        let user = $('input[name="username"]').val();
                        let pass = $('input[name="pass"]').val();

                        let cookieJson = JSON.stringify({
                          'user': `${user}`,
                          'pass': `${pass}`
                        });

                        document.cookie = `login=${cookieJson}; expires=${date}; path=/;`;
                      }
                      else{
                        // console.log(result.headers.get('set-cookie'));
                        // console.log(document.cookie);
                        $("#error").show();
                      }
                  });
            });

            $("#continue").click(() =&gt; window.location = '../week20-practice.php');

            &lt;/script&gt;
          </code>
        </pre>

        <pre class="basic-pre"><code class='jsx basic-code'>
          //createuser.php
          //Reads in user and pass, hashes pass, then submits to DB in user table

          &lt;?php

          header('Content-type: application/json');
          require_once '../week-19-php/dbConn.class.php';

          $conn = dbConn::getInstance();
          $name = $_POST['username'];
          $pass = password_hash($_POST['pass'], PASSWORD_DEFAULT);

          $email = isset($_POST['email']) ? $_POST['email'] : NULL;

          $query = "INSERT INTO users (user_name, pass_hash, email) VALUES ('$name', '$pass', '$email')";

          $result = $conn-&gt;query($query);

          echo !$result ? "fail" : "success";
        </code>
      </pre>

      <pre class="basic-pre"><code class='jsx basic-code'>
        //auth.php
        //Request users auth details via HTTP auth, and redirects if auth fails
        //Creates user login cookie on successful auth
        //Can be included in any page requiring auth

        &lt;?php

        function request_login(){
          header('WWW-Authenticate: Basic realm="Must login to access. If not registered, register at
            https://lainislove.com/practice-weeks/week-20-php/register.php');
          header('HTTP/1.0 401 Unauthorized');
        }

        function auth(){
          //if login cookie set, check cookie for auth confirmation and request login if bad
          if(isset($_COOKIE['login'])){
            $cookie = json_decode($_COOKIE['login'], true);

            if(!check_pass($cookie['user'], $cookie['pass'])){
              //bad cookie...destroy it
              setcookie('login', '', time() - 10000000, '/');

              request_login();
              die("Bad login info. Please reload page and try again.");
            }
          }
          //checks auth details correct after HTTP auth login
          else if(check_pass($_SERVER['PHP_AUTH_USER'], $_SERVER['PHP_AUTH_PW'])){
            if(check_pass($_SERVER['PHP_AUTH_USER'], $_SERVER['PHP_AUTH_PW'])){
              setcookie('login',
                        json_encode(['user' =&gt; $_SERVER['PHP_AUTH_USER'], 'pass' =&gt; $_SERVER['PHP_AUTH_PW']]),
                        time() * 12 * 60 * 60,
                        '/');
            }
          }
          //if no cookie or auth login
          else{
            request_login();
            die("Must login to access. If not registered, register at https://lainislove.com/practice-weeks/week-20-php/register.php");
          }
        }

        ?&gt;
      </code>
    </pre>
  </section>

  <section>
    <h2>Python - Lists Continued</h2>
    <pre class="basic-pre"><code class="python basic-code">
      #Sort methods called on list called on and change their state:
      &gt;&gt;&gt; countries = ['France', 'Germany', 'Poland', 'Peru', 'Sweden']
      &gt;&gt;&gt; print(countries)
      &gt;&gt;&gt; print(sorted(countries))
      &gt;&gt;&gt; print(countries)
      ['France', 'Germany', 'Poland', 'Peru', 'Sweden']
      ['France', 'Germany', 'Peru', 'Poland', 'Sweden']
      ['France', 'Germany', 'Poland', 'Peru', 'Sweden']


      #Methods where the list is passed in as an arg generally sort and return a copy of the list
      #Such methods do not change the state of the original list:
      &gt;&gt;&gt; countries.sort()
      &gt;&gt;&gt; print(countries)
      ['France', 'Germany', 'Peru', 'Poland', 'Sweden']


      #Reverse list by calling reverse() on it:
      &gt;&gt;&gt; countries.reverse()
      &gt;&gt;&gt; print(countries)


      #pass in arg/val reverse=True to .sort() to sort in reverse alpha:
      &gt;&gt;&gt; countries.sort(reverse=True)
      &gt;&gt;&gt; print(countries)
      ['Sweden', 'Poland', 'Peru', 'Germany', 'France']


      #List comprehension allows you to make a list with a for loop
      #logic is similar for a map function with left hand acting as expression to set value for each item in iterable:
      &gt;&gt;&gt; num_list = [num + num for num in range(1,11)]
      &gt;&gt;&gt; print(num_list)
      [2, 4, 6, 8, 10, 12, 14, 16, 18, 20]


      #list of nums divisible by 3 via list comprehension:
      &gt;&gt;&gt; num_list = [num for num in range(3, 31, 3)]
      &gt;&gt;&gt; print(num_list)
      [3, 6, 9, 12, 15, 18, 21, 24, 27, 30]


      #can loop through slice, as slicing just returns a list:
      &gt;&gt;&gt; for num in num_list[4:8]:
      &gt;&gt;&gt;     print(num)
      15
      18
      21
      24


      #some list functions useful for numerical lists:
      &gt;&gt;&gt; print(min(num_list))
      &gt;&gt;&gt; print(max(num_list))
      &gt;&gt;&gt; print(sum(num_list))
      3
      30
      165


      #A tuple is a list, but immutable. Note the () instead of []
      #Trying to change the value of a tuple index/value will throw an error:
      &gt;&gt;&gt; tuple = (1, 2, 3, 4, 5)


      #since no constant vars in python, can change val of var referencing tuple:
      &gt;&gt;&gt; tuple = (5, 4, 3, 2, 1)
      &gt;&gt;&gt; print(tuple)
      (5, 4, 3, 2, 1)
    </code>
    </pre>

    <h2>Python - if, elif, else & Comparison/Inclusion Operators</h2>
    <pre class="basic-pre"><code class="python basic-code">
      #if uses 'if ... :', 'elif ... :', 'else:' with no ( ).
      #Python indentation (equal spaces or tabbed) based blocks instead of {} based:
      &gt;&gt;&gt; x, y = 0, 1
      &gt;&gt;&gt; if x &gt; y:
      &gt;&gt;&gt;    print('x &gt; y')
      &gt;&gt;&gt;    print('check the indentation')
      &gt;&gt;&gt; elif x &lt; y:
      &gt;&gt;&gt;    print('x &lt; y')
      &gt;&gt;&gt; else:
      &gt;&gt;&gt;    print('x == y')
      x &lt; y


      #for AND and OR operators, Python uses and, or:
      &gt;&gt;&gt; if(3 &gt;= 2 and 'test' != 'Test'):
      &gt;&gt;&gt;     print('and conditions satisfied')
      and conditions satisfied

      &gt;&gt;&gt; if(3 &gt;= 4 or 'test' == 'test'):
      &gt;&gt;&gt;     print('one or both or conditions satisfied')
      one or both or conditions satisfied


      #in operator checks for inclusion in collection with a boolean return:
      &gt;&gt;&gt; print(3 in num_list)
      True


      #calling 'if' on a list will return False if empty list, True if not empty:
      &gt;&gt;&gt; empty_list = []
      &gt;&gt;&gt; if empty_list:
      &gt;&gt;&gt;     print('List is not empty')
      &gt;&gt;&gt; else:
      &gt;&gt;&gt;     print('List is empty')
      List is empty

      &gt;&gt;&gt; if tuple:
      &gt;&gt;&gt;     print('Tuple is not empty')
      &gt;&gt;&gt; else:
      &gt;&gt;&gt;     print('Tuple is empty')
      Tuple is not empty
      </code>
    </pre>

    <h2>Python - for Loop &amp; range() + continue, break, pass</h2>
    <pre class="basic-pre"><code class="python basic-code">
      #loop using 'for index in iterable:'
      #index is current index, and loop ends when iterable ends:
      &gt;&gt;&gt; ints = [1, 2, 5, 9]
      &gt;&gt;&gt; for int in ints:
      &gt;&gt;&gt;     print(int)
      1
      2
      5
      9


      #can loop n times with range(n) and for:
      &gt;&gt;&gt; for i in range(4):
      &gt;&gt;&gt;   print(i)
      0
      1
      2
      3
      0
      1
      2
      3


      #range() also takes end and step params to produce x to y range, via z steps
      #note that end in range is exclusive by 1 step from specified end (zero oriented):
      &gt;&gt;&gt; for i in range(-20, 40, 10):
      &gt;&gt;&gt;    print(i)
      -20
      -10
      0
      10
      20
      30


      #for loops can run with an else clauses that executes on loop completion
      #if loop executes due to break, then else will not run...loop just breaks and exits:
      &gt;&gt;&gt; for i in range(3):
      &gt;&gt;&gt;     print("feels")
      &gt;&gt;&gt;     if(i == 2):
      &gt;&gt;&gt;         break
      &gt;&gt;&gt; else:
      &gt;&gt;&gt;     print("badman")
      feels
      feels
      feels       //break hit, loop exits

      &gt;&gt;&gt; for i in range(3):
      &gt;&gt;&gt;     print("feels")
      &gt;&gt;&gt;     if(i == 100):
      &gt;&gt;&gt;         break
      &gt;&gt;&gt; else:
      &gt;&gt;&gt;     print("badman")
      feels
      feels
      feels       //loop completes
      badman      //else runs


      #standard use for continue...if hit, jump to next iteration:
      &gt;&gt;&gt; for i in range(4):
      &gt;&gt;&gt;     if(i == 2):
      &gt;&gt;&gt;         continue
      &gt;&gt;&gt;     print(i)
      0
      1
      3


      #pass allows for a placeholder where any required logic is needed
      &gt;&gt;&gt; for index in my_list:
      &gt;&gt;&gt;     if index == 4 or index == 'A':
      &gt;&gt;&gt;         print(index)
      &gt;&gt;&gt;     else:
      &gt;&gt;&gt;         pass    #placeholder for further logic
      A
      8
    </code>
    </pre>

    <h2>Python - Functions & Arg Types</h2>
    <pre class="basic-pre"><code class="python basic-code">
      #Function def with doc string
      #docstring should be quick explanation of function purpose:
      &gt;&gt;&gt; def print_word(word):
      &gt;&gt;&gt;     '''Prints a word'''
      &gt;&gt;&gt;     print("Printing word: " + word)

      &gt;&gt;&gt; print_word("test")
      Printing word: test


      #Can get doc string via:
      &gt;&gt;&gt; print(print_word.__doc__)
      Prints a word


      #Error thrown if no value for positional arg
      &gt;&gt;&gt; def positional_add(one, two):
      &gt;&gt;&gt;     print(one + two)

      &gt;&gt;&gt; positional_add(1)   //throws error as missing arg


      #Positional args are standard order based args
      #keyword args are defined and passed in with key='value' pairs, allowing any pass in order
      #default values can also be set

      &gt;&gt;&gt; def multi_args(postionalA, positionalB, default='default', keyA='keyA', keyB='keyB'):
      &gt;&gt;&gt;     print(f'''postionalA: {postionalA}
      &gt;&gt;&gt;     positionalB: {positionalB}
      &gt;&gt;&gt;     default: {default}
      &gt;&gt;&gt;     keyA: {keyA}
      &gt;&gt;&gt;     keyB: {keyB}''')

      &gt;&gt;&gt; multi_args("first", "second", keyB='B', keyA='A')

          positionalA: first
          positionalB: second
          default: default
          keyA: A
          keyB: B


      #Arbitrary args allow to pass in any num of args similar to rest param in JS
      #if define positional args, following args should be keyword, to allow proper reference
      &gt;&gt;&gt; def arb_arg_print(*args, positional_num=0 ):
      &gt;&gt;&gt;     print(f'''
      &gt;&gt;&gt;     positional num arg is {positional_num}
      &gt;&gt;&gt;     arbitrary args are {args}''')

      &gt;&gt;&gt; arb_arg_print(15, 'arg_a', 2, 'another_arg')

          positional num arg is 15
          arbitrary args are in tuple ('arg_a', 2, 'another_arg')
          first arbitrary arg is arg_a


      #lambda functions allow to define a simple expression, which can be returned, stored in a variable, etc.
      #as Python has closure, useful for partial application, currying, etc.
      &gt;&gt;&gt; def lambda_funct(x):
      &gt;&gt;&gt;     return lambda y : x * y

      &gt;&gt;&gt; partial = lambda_funct(10)      #returns lamba function a : a * 2
      &gt;&gt;&gt; print(partial(2))               #calls 10: 10 * 2
      20
    </code>
    </pre>

    <h2>Python - Dictionaries</h2>
    <pre class="basic-pre"><code class="python basic-code">
      #Dictionaries are Pythons key=value data structure
      &gt;&gt;&gt; my_dict = {'name': 'Kyle', 'place': 'The Moon', 'days': '365'}
      &gt;&gt;&gt;
      &gt;&gt;&gt; def print_dict(my_dict):
      &gt;&gt;&gt;     print(f"My name is {my_dict['name']}. I live on {my_dict['place']} {my_dict['days']} days a year.")

      &gt;&gt;&gt; print_dict(my_dict)
      My name is Kyle. I live on The Moon 365 days a year.


      #Change of dictionary value
      &gt;&gt;&gt; my_dict['name'] = 'Major Tom'
      &gt;&gt;&gt; print_dict(my_dict)
      My name is Kyle. I live on The Moon 365 days a year.


      #Can also access key via get() which takes in optional 2nd arg to be return if first arg key !exist
      &gt;&gt;&gt; print(f"value is {my_dict.get('bad_key', '--error: key does not exist--')}")
      value is --error: key does not exist--


      #Dictionaries of both key/value not iterable, but can call .items() on dict to return a list of (key, value) indexes for looping
      &gt;&gt;&gt; for key, value in my_dict.items():
      &gt;&gt;&gt;     print(f'''key: {key} \nvalue: {value}''')

      key: name
      value: Kyle

      key: place
      value: The Moon

      key: days
      value: 365


      #Can loop through keys only by looping through call of .keys() on dictionary which returns list of keys
      &gt;&gt;&gt; for key in my_dict.keys():
      &gt;&gt;&gt;     print(f'''key: {key}''')
      key: name
      key: place
      key: days


      #Can also loop through keys by just looping through dict w/ just key arg for 'for' loop)
      &gt;&gt;&gt; for key in my_dict:
      &gt;&gt;&gt;     print(f'''key: {key}''')
      key: name
      key: place
      key: days


      #As keys() returns list, can pass into use for list methods as sorted() arg, call .reverse() on, etc.
      &gt;&gt;&gt; for key in sorted(my_dict.keys()):
      &gt;&gt;&gt;     print(key)
      days
      name
      place


      #Python sets are iterable, ordered data collections allowing only unique values
      #Sets can be created from iterables, such as lists, from calls such as keys() or values() on dictionaries
      &gt;&gt;&gt; my_dict['home'] = 'The Moon'     #duplicate value that also exists in 'place' key
      &gt;&gt;&gt; print(set(my_dict.values()))
      {'The Moon', 'Kyle', '365'}


      #Lists inside dictionaries useful for when want a key to have multi values, but single key reference
      &gt;&gt;&gt; order = {'name': 'rei ayanami', 'order': 'pizza', 'size': 'large', 'toppings': ['sardines', 'eggplant', 'pineapple']}
      &gt;&gt;&gt; print(f'''
      {order["name"].title()} has ordered a {order["size"]} {order["order"]} with toppings:''')
      &gt;&gt;&gt; for topping in order["toppings"]:
              print(topping)

      Rei Ayanami has ordered a large pizza with toppings:
      sardines
      eggplant
      pineapple


      #Dictionaries inside lists useful for collection of key-value models
      &gt;&gt;&gt; my_users = [{'username': 'ANBU', 'age': 32, 'location': 'Denver'},
      &gt;&gt;&gt;             {'username': 'saizen', 'age': 23, 'location': 'Chicago'},
      &gt;&gt;&gt;             {'username': 'soldats', 'age': 47, 'location': 'Portland'}]
      &gt;&gt;&gt; for user in my_users:
      &gt;&gt;&gt;     if(user['location'].lower().strip() == 'chicago'):
      &gt;&gt;&gt;         print(f"{user['username']} is {user['age']} years old and lives in Chicago")
      &gt;&gt;&gt;     else:
      &gt;&gt;&gt;         print(f"{user['username']} is {user['age']} years old and does not live in Chicago")

      ANBU is 32 years old and does not live in Chicago
      saizen is 23 years old and lives in Chicago
      soldats is 47 years old and does not live in Chicago

      #Dictionaries inside dictionaries are useful for when want a collection of key-value models accessible by unique key
      &gt;&gt;&gt; my_users_dict = {'admin': {'username': 'ANBU', 'age': 32, 'location': 'Denver'},
      &gt;&gt;&gt;                  'mod': {'username': 'saizen', 'age': 23, 'location': 'Chicago'},
      &gt;&gt;&gt;                  'user': {'username': 'soldats', 'age': 47, 'location': 'Portland'}}
      &gt;&gt;&gt; print('Admin details are:')
      &gt;&gt;&gt; for key, value in my_users_dict['admin'].items():
      &gt;&gt;&gt;     print(f"   {key}: {value}")

      Admin details are:
         username: ANBU
         age: 32
         location: Denver
    </code>
    </pre>
  </section>

  <section>
    <h2>Python &amp; PHP Notes</h2>
    <div class="pdf-container">
      <iframe src="../notes/Python.pdf" class="pdf-double"></iframe>
      <iframe src="../notes/PHP7.pdf" class="pdf-double"></iframe>
    </div>
  </section>

  <br><br>
  </main>

</body>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="js/hide-option.js"></script>    <!---requires jQuery-->
<script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
<script type="text/javascript" src="js/week20-practice.js"></script>

</html>

<?php
  $conn->close();
  $customers->close();
?>
