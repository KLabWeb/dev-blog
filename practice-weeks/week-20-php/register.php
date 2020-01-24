<!DOCTYPE html>
<html lang="en-US" class="index">
<head>
    <meta charset="utf-8">
    <meta name="author" content="KMiskell">
    <meta name="description" content="MYSQLi Practice">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href='https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css'>
    <link rel="stylesheet" href="../css/practice-stylesheet.css">
    <link rel="stylesheet" href="../css/stylesheet-register.css">
    <link rel="stylesheet" href="../../root-css/header.css">
    <link rel="stylesheet" href="../../root-css/nav-buttons.css">
    <link rel="shortcut icon" href="../../root-assets/favicon/javascript-original.svg" type="image/x-icon">
    <title>Please Register</title>
</head>
<body>

  <div>
    <header class="header-v2">
      <h1>You must submit your data</h1>
    </header>

    <nav class="nav-v2">
        <ul class="nav-list">
            <li><a href="../../index.html">Home</a></li>
            <li><a href="../../study-weeks/week20.html" title="Current Log">Current Log</a></li>
            <li><a href="../week-20-php/register.php" title="Current Work">Current Work</a></li>
            <li><a href="../../notes/HTML-I.pdf" title="HTML Notes">HTML</a></li>
            <li><a href="../../notes/CSS3-I.pdf" title="CSS Notes">CSS</a></li>
            <li><a href="../../notes/Git.pdf" title="Git Notes">Git</a></li>
            <li><a href="../../notes/JS-I.pdf" title="CSS Notes">JS</a></li>
            <li><a href="../../notes/React-I.pdf" title="React Notes">React</a></li>
            <li><a href="../../notes/PHP7.pdf" title="React Notes">PHP</a></li>
            <li><a href="../../notes/MySQL.pdf" title="React Notes">MySQL</a></li>
            <li><a href="../../notes/PHP7.pdf" title="React Notes">REACT II</a></li>
            <li><a href="../../notes/Python.pdf" title="React Notes">Python</a></li>
        </ul>
    </nav>
  </div>

  <main>
    <div class="">
      <h4 style="display: none;" id="error">Database error. Could not register</h4>
      <h4>Please Register before accessing this page. If already registered, click 'Continue' to log in.</h4>
      <form id="regform" style="display: flex; flex-flow: column; width: 300px">
        <label>
          Username:
          <input type="text" name="username" required>
        </label>
        <label>
          Password:
          <input type="password" minlength="8" maxlength="50" name="pass" required>
        </label>
        <label>
          Email:
          <input type="email" maxlength="100" name="email">
        </label>
        <input type="submit" value="Register">
      </form>
      <button id="continue">Continue</button>
    </div>
  </main>
</body>
</html>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

<script>
  $('#regform').submit(event => {
    event.preventDefault();
    let formData = new FormData(event.target);

    fetch('createuser.php',
          {
           method: 'POST',
           body: formData,
           credentials: 'same-origin'
          }
        ).then(response => response.text())
        .then(result =>
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

  $("#continue").click(() => window.location = '../week20-practice.php');

</script>
