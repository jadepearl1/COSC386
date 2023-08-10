<!DOCTYPE html>
<html lang="en">
<head>
<title>Gull Code</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
  box-sizing: border-box;
}

body {
  font-family: Arial, Helvetica, sans-serif;
}

header {
  background-color: #840505;
  padding: 30px;
  text-align: center;
  font-size: 35px;
  color: white;
}


/* Container for flexboxes */
section {
  display: -webkit-flex;
  display: flex;
}

nav {
  -webkit-flex: 1;
  -ms-flex: 1;
  flex: 1;
  background: #ccc;
  padding: 20px;
}

/* Style the list inside the menu */
nav ul {
  list-style-type: none;
  padding: 0;
}

/* Style the content */
article {
  -webkit-flex: 3;
  -ms-flex: 3;
  flex: 3;
  background-color: #f1f1f1;
  padding: 10px;
}

footer {
  background-color: #840505;
  padding: 10px;
  text-align: center;
  color: white;
}

.sidebarlogin
{
    justify-content:center;
    align-items: center;

    width: 60%;
    height: fit-content;

    border: 3px solid white;
    background-color: #c18282;
    border-radius: 10px;
    padding: 2%;

    overflow: auto;
}

.sidebarlogin2
{
    justify-content:center;
    align-items: center;

    width: 60%;
    height: fit-content;

    border: 3px solid white;
    background-color: #c18282;
    border-radius: 10px;
    padding: 2%;

    display:block;

    overflow: auto;
}

.links
{
    width: 60%;
    height: fit-content;
    border: 3px solid white;
    padding: 2%;
    border-radius: 10px;
    background-color: #c18282;
}

img 
{
  width: 100%;
  height: 325px;
}

/* Responsive layout - makes the menu and the content (inside the section) sit on top of each other instead of next to each other */
@media (max-width: 600px) {
  section {
    -webkit-flex-direction: column;
    flex-direction: column;
  }
}
</style>
</head>
<body>

<header>
  <h2>Gull Code</h2>
</header>

<section>
  <nav>
         <div class="sidebarlogin" id = "logindiv">
            <h1>Login</h1>
                <!--this is where the sidebar content will go-->
                <form method= "POST">
                    <input type= "text" id= "usr" placeholder = "Username"><br></br>
                    <input type= "password" id= "pw" placeholder = "Password"><br></br>
                    <a href = " "> Forgot Password? </a> <br></br>
                    <a href = " "> First Time User? </a> <br></br>
                  </form>    
                  <input type= "submit" id= "login" value = "Login" onClick= "myFunction();myFunction1()"><br></br>
                </div> 
                
                <div class="sidebarlogin" id = "logindiv2">
                    <p> Welcome User </p>
                </div>
                
                <br></br>

            <div class="links">
              <h1>Navigation Links</h1>
                <ul> 
                    <l><a href = " " > Rules </a></li><br></br>
                    <l><a href = " " > Enrolled Teams </a></li><br></br>
                    <l><a href = " " > History </a></li><br></br>
                    <l><a href = " " > Previous Winners </a></li><br></br>
                    <l><a href = " " > Contact Info </a></li><br></br>
                    <l><a href = " " > Database Design </a></li><br></br>
                </ul>
            </div>
  </nav>
  <!-- this is where the page contents will be displayed-->
  <article>
    <img src = "codebackground.jpg">
    <h1>Welcome to Gull Code</h1>
    <p>This is where upcoming events will be displayed</p>
    <p>This is where any type of page content will be displayed</p>
  </article>
</section>

<footer>
  <p>Footer</p>
</footer>
</body>

<script>
function myFunction() {
  var x = document.getElementById("logindiv");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}

function myFunction1() {
  var x = document.getElementById("logindiv2");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }
}
</script>


<?php

  if(isset($_GET['usr']) && isset($_GET['pwd']))
  {

  }

?>
</html>