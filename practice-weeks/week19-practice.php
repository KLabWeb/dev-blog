<?php
  error_reporting(E_ALL);
  require_once 'week-19-php/tableBuilder.php';
  require_once 'week-19-php/dbConn.class.php';
  require_once 'week-19-php/facade/ordersFacade.class.php';

  $conn = dbConn::getInstance();
  $orders_facade = new ordersFacade($conn);

  $customers = $conn->query('SELECT * FROM customers');
  if(!$customers){
    echo "Error: no customers";
    die();
  }

  $cust_head = array_keys($customers->fetch_assoc());
  $cust_rows = $customers->fetch_all();

  $orders = $conn->query('SELECT * FROM orders');
  if(!$orders){
    echo "Error: no orders";
    die();
  }

  $orders_head = array_keys($orders->fetch_assoc());
  $orders_rows = $orders->fetch_all();
?>

<!DOCTYPE html>
<html lang="en-US">

<head>
  <meta charset="utf-8">
  <meta name="author" content="KMiskell">
  <meta name="description" content="Week 19 General Practice">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="../root-assets/favicon/javascript-original.svg" type="image/x-icon">
  <link rel="stylesheet" href="css/practice-stylesheet.css">
  <link rel="stylesheet" href="css/stylesheet-w19-practice.css">
  <link rel="stylesheet" href="../root-css/header.css">
  <link rel="stylesheet" href="../root-css/nav-buttons.css">
  <link rel="stylesheet" href="../Higlightjs/styles/tomorrow-night-bright.css">
  <link rel="stylesheet" href='https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css'>
  <script src="../Higlightjs/highlight.pack.js"></script>
  <script>hljs.initHighlightingOnLoad();</script>
  <title>Week 19 Sandbox</title>
</head>

<body>
  <div>
    <header class="header-v2">
      <h1>Week 19 Sandbox</h1>
    </header>

    <nav class="nav-v2">
      <ul>
        <li><a href="../index.html" title="Home">Home</a></li>
        <li><a href="../practice-weeks/week18-practice.php" title="Previous Work">Previous Work</a></li>
        <li><a href="../study-weeks/week19.html" title="Week Log">Week Log</a></li>
        <li><a href="../practice-weeks/week20-practice.php" title="Next Work">Next Work</a></li>
        <li><a href="../roadmap.html" title="Roadmap">Roadmap</a></li>
        <li><select onchange="location = this.value;" target="_blank" onclick"hideFirst">
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
        <li><select onchange="location = this.value;" onclick"hideFirst">
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
      <h2>Basic PHP Back-End with MYSQLi</h2>
      <pre><code class="php">
        //Singleton class
        class dbConn extends mysqli {
          private $user = 'demo';
          private $host = 'localhost';
          private $pass = '[omitted]';
          private $db = 'demo';
          private static $instance;

          private function __construct(){
            parent::__construct($this->host, $this->user, $this->pass, $this->db);
          }

          public static function getInstance(){
            if(is_null(self::$instance)){
              self::$instance = new self();
            }
            return self::$instance;
          }

          public function testConnection(){
            return is_null(self::$instance) ? "Connection failed" : "Connection sucessful to DB $this->db via user $this->user";
          }
        }
        </code>
      </pre>
      <pre><code class="php">
        //week19-practice.php

        $conn = dbConn::getInstance();

        $customers = $conn->query('SELECT * FROM customers');
        if(!$customers){
          echo "Error: no customers";
          die();
        }
        $cust_head = array_keys($customers->fetch_assoc());
        $cust_rows = $customers->fetch_all();

        $orders = $conn->query('SELECT * FROM orders');
        if(!$orders){
          echo "Error: no orders";
          die();
        }
        $orders_head = array_keys($orders->fetch_assoc());
        $orders_rows = $orders->fetch_all();

        $orders_facade = new ordersFacade($conn);
        </code>
      </pre>

      <div class="table-container">
        <h5>DB connection status: <?= $conn->testConnection() ?></h5>
        <h4>Customers</h4>
        <table class="practice_table" id="practice_tableA" class="display" style="width: 100%">
            <thead style="font-weight: bold;">
                <?php add_head_row($cust_head); ?>
            </thead>
            <tbody>
                <?php get_row_group($cust_rows); ?>
            </tbody>
        </table>
      </div>

      <br><br><br>

      <div class="table-container">
        <h4>Orders</h4>
        <table class="practice_table" id="practice_tableB" class="display" style="width: 100%">
            <thead style="font-weight: bold;">
                <?php add_head_row($orders_head); ?>
            </thead>
            <tbody>
                <?php get_row_group($orders_rows); ?>
            </tbody>
        </table>
      </div>
    </section>

    <section>
      <h2>Single Responsibility Principle</h2>
      <p>Problem: Three actors seeking info on shipments. Owner wants to calculate number of all orders shipped &#40;actor 1&#41;. Shipping wants to have an alert message if greater than 30% orders not shipped &#40;actor 2&#41;. Order support wants list of all orders from current day &#40;actor 3&#41;. Client wants a single interface for all three parties. How to implement without coupling actors together?</p>
      <p>Bad design: Handle all responsibilities for all three actors in a single <i>orderDetails</i> class.</p>
      <p>Better Design: seperate each actor and responsibility into a seperate module and create an single point off access through one interface class &#40;facade pattern&#41;, thus providing the desired single access point for all three actors, while also adhearing to single responsibility principle</p>
      <h3>Responsibility 1: Owner</h2>
      <pre><code class="php">
          class shippedCounter{
            private $db;

            public function __construct(){
              require_once 'week-19-php/dbConn.class.php';
              $this->db = dbConn::getInstance();
            }

            public function getNumShipped(){
              //return $this->db->testConnection();
              $result = $this->db->query('SELECT COUNT(*) FROM orders WHERE status = "Shipped";');
              return "Total items shipped: " . $result->fetch_row()[0];
            }
          }
        </code>
      </pre>
      <h3>Responsibility 2: Shipping Dept</h2>
      <pre><code class="php">
          class unshippedAlterter{
            private $db;

            public function __construct(){
              require_once 'week-19-php/dbConn.class.php';
              $this->db = dbConn::getInstance();
            }

            public function checkUnshippedWarning(){
              $all = $this->db->query('SELECT COUNT(*) FROM orders');
              $shipped = $this->db->query('SELECT COUNT(*) FROM orders WHERE status != "Shipped";');
              $unshipped = number_format((($shipped->fetch_row()[0] / $all->fetch_row()[0]) * 100), 2);

              return $unshipped > 30 ? "Warning: $unshipped% not shipped" : "Okay: only $unshipped% not shipped";
            }
          }
        </code>
      </pre>
      <h3>Responsibility 3: Order Support</h2>
      <pre><code class="php">
          class dailyShipCheck{
            private $db;

            public function __construct(){
              require_once 'week-19-php/dbConn.class.php';
              $this->db = dbConn::getInstance();
            }

            public function getShippedToday(){
              $result = $this->db->query('SELECT * FROM orders WHERE orderDate = "2005-05-31";')->fetch_all(MYSQLI_ASSOC);
              return print_r($result);
            }
          }
        </code>
      </pre>
      <h3>Facade Class</h2>
      <pre><code class="php">
          class ordersFacade{
              private $shippedCounter;
              private $unshippedAlterter;
              private $dailyShipCheck;

              public function __construct(){
                require 'shippedCounter.class.php';
                require 'unshippedAlerter.class.php';
                require 'dailyShipCheck.class.php';
                $this->shippedCounter = new shippedCounter();
                $this->unshippedAlterter = new unshippedAlterter();
                $this->dailyShipCheck = new dailyShipCheck();
              }

              public function getNumShipped(){
                return $this->shippedCounter->getNumShipped();
              }

              public function checkUnshippedWarning(){
                return $this->unshippedAlterter->checkUnshippedWarning();
              }

              public function getShippedToday(){
                return $this->dailyShipCheck->getShippedToday();
              }
            }
        </code>
      </pre>
      <h3>Access of Facade from this page</h2>
      <pre><code class="php">
          echo $orders_facade->getNumShipped();
          echo $orders_facade->checkUnshippedWarning();
          echo $orders_facade->getShippedToday();
        </code>
      </pre>

      <h3>Output</h3>
      <pre><code class="php">
          <?php echo $orders_facade->getNumShipped(); ?>
          <br>
          <?php echo $orders_facade->checkUnshippedWarning();?>
          <br>
          <?php echo $orders_facade->getShippedToday();?>
        </code>
      </pre>
    </section>

    <section>
      <h2>Python Begins</h2>
      <pre><code class="python">
>>> message = "hello python variable"

#print using print():
print("printing variable: " + message)
printing variable: hello python variable

#Division returns float 10 / 1 =
10.0

#Drop decimal in division with \\. 5 \ 2 =
2

#Powers with **. 2**3 =
8

#Mixed operands result in float: 2.5 * 2 =
5.0

#Rounding 126.18273 to second decimal with round():
>>> print(round(126.18273, 2)
126.18
</code></pre><br>
<h2>Python Strings</h2>
<pre><code class="python">
Unpaired qoute prints as part of string:
Tom's books

"Quote pairs wrapped in opposite type quote pairs (single vs double) will print"

#Strings wrapped in triple quotes (''', etc.)
can span multiple lines
    and preserve indentation

#String concatenation with +
>>> print('The' + ' ' + 'String')
The String

#Using * on string will print multi times.
>>> print(3 * 'string' == )
stringstringstring

#String literals next to each other auto concat: >>> print('the' ' string'
>>>                                            ' is auto concated')
the string is auto concated

#Can concat string to vars, expression result strings, etc. with + :
>>> fruit = 'apple'
>>> print('   the ' + fruit)
   the apple

#Can read (only) chars in string by referencing index as if array of chars
>>> print(fruit[0])
a

#Access from end index back via negative nums
>>> print(fruit[-1]):
e

#Can copy out substring (exclusive end char) as if pulling range from char array:
>>> print(fruit[2:4]):
pl

#If leave end off of slice (still using :), will count missing side as start or end automatically
>>> print(fruit[:4]):)
appl

#Can also slice using negative index:
>>> print(fruit[-4:0])):
pple

#Index end out of bound uses default start/end instead of error:
>>> print(fruit[0:100]):)
apple

#String length via len(my_string):
>>> print(len(fruit)):
5

#Uppercase words with title():
>>> my_string = '   this is my string   '
>>> print(my_string.title())
   This Is My String

#Upper or lower case whole string with upper() and lower():
>>> print(my_string.upper())
>>> print(my_string.lower()):
   THIS IS MY STRING
   this is my string

#f-strings are python ver of template literals in JS:
>>> print(f"The fruit is: {fruit}")
The fruit is: apple

#f-string holding function output:
>>> print(f'The fruit is {fruit.upper()}')
The fruit is APPLE

#If using Python under v3.6, use format() instead of f-strings
>>> print("My name is {}. This {} tale.".format("Ishmael", "is my"))
My name is Ishmael. This is my tale.

#Add tabs to string with \t special char:
>>> Nested
>>> \tlist
>>> \t\twith tabs
Nested
	list
		with tabs

#Can remove whitespace on right, left, or both sides of string with rstrip(), lstrip(), and strip():
>>> print(f'{'   whitespace   '.rstrip()}
>>> {'   whitespace   '.lstrip()}
>>> {'   whitespace   '.strip()}')
   whitespace
whitespace
whitespace

#Multiple assignment with syntax: a, b, c = 1, 2, 3:
>>> x, y, z = 'dog', 123, 1.8
>>> print(f'x: {x}, y: {y}, z: {z}')
x: dog, y: 123, z: 1.8

#Indexing and slicing works the same as strings:
>>> my_list = [1, 2, 'string', 'word'.upper()]
</code></pre>
<h2>Python Lists</h2>
<pre><code class="python">
>>> print(my_list)
[1, 2, 'string', 'WORD', 'fish', 1234]

>>> print(my_list[-1])
1234

>>> print(my_list[1:100])
[2, 'string', 'WORD', 'fish', 1234]

>>> my_list[2:4] = []
>>> print(my_list)
[1, 2, 'fish', 1234]

#Nested list:
>>> my_nested = [[1, 8, 12], [ ‘a’, ‘b’, ‘c’]]
>>> print(my_nested[1][2])
c

#Remove from list using del keyword:
>>> del my_list[2]
>>> print(my_list)
[1, 2, 1234]

#Can pop off end with my_list.pop():
>>> my_list = [0, 1, 2, 3, 4, 5]
>>> my_list.pop()
>>> my_list.pop()
>>> print(my_list)
>>> print(popped)
[0, 1, 2, 3]
4

#remove() an index, append() to end, insert() in index
>>> my_list = [0, 1, 2, 4, 2, 1, 9, 2, 4, 2, 8]
>>> my_list.remove(2)
>>> my_list.append('B')
>>> my_list.insert(2, 'A')
>>> print(my_list)
[0, 1, 'A', 4, 2, 1, 9, 2, 4, 2, 8, 'B']

#if uses 'if ... :', 'elif ... :', 'else:' with no ( ).
#Python indentation (equal spaces or tabbed) based blocks instead of {} based
x < y

#loop using 'for index in iterable:'
#index is current index, and loop ends when iterable ends
>>> ints = [1, 2, 5, 9]
>>> for int in ints:
>>>     print(int)
1
2
5
9
        </code>
      </pre>
    </section>
  </main>

</body>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>

<script>
$(document).ready( function () {
  $('#practice_tableA').DataTable({
      'autowidth': false
  });
  $('#practice_tableB').DataTable({
      'autowidth': false
  });
});
</script>

</html>

<?php
  $conn->close;
  $customers->close;
?>
