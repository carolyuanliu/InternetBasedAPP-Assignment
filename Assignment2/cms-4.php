<?php
require 'Carbon.php';
use Carbon\Carbon;
//updated time function
function updateTime($filename){
          $ts = filemtime($filename);  // create the time stamp
          $carb = Carbon::createFromTimestamp($ts); // create the Carbon object
          echo  '<p>Updated ' .$carb->diffForHumans().'</p>';// generate the text phrase
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
	 <title> UCC Computer Science Student </title>
   <meta http-equiv="content-type">

   <link id="csslink" rel="stylesheet" href="styleSheets/light.css">

  </head>

<body onload="loadContent('content/home.php')">
<!--Navigation Bar-->
  <div class="nav">

              <button onclick="loadContent('content/home.php')"><img src="icons/home.svg"/> HOME</button>
              <div class="time"><?php  echo updateTime('content/home.php');  ?></div>

              <button onclick="loadContent('content/personal.php')"><img src="icons/personal.svg"/> Personal</button>
              <div class="time"><?php  echo updateTime('content/personal.php');?></div>

              <button onclick="loadContent('content/ucc.php')"><img src="icons/ucc.svg"/> UCC</button>
              <div class="time"><?php echo updateTime('content/ucc.php');?></div>

              <button onclick="loadContent('content/contact.php')"><img src="icons/contact.svg"/> Contact</button>
              <div class="time"><?php echo updateTime('content/contact.php'); ?></div>

<!--Theme Buttons-->
          <button name="Light" onclick="switchTheme('styleSheets/light.css', this.name)"><img src="icons/light.svg"/> Light Theme</button>

          <button name="Dark" onclick="switchTheme('styleSheets/dark.css', this.name)"><img src="icons/dark.svg"/> Dark Theme</button>
          <button name="Large Fonts" onclick="switchTheme('styleSheets/large_fonts.css', this.name)"><img src="icons/large_fonts.svg"/> Large Fonts</button>

          <p class="time"><?php echo date('l jS \of F Y h:i:s A'); ?></p>

    </div>

<!--Content-->
  <div  class="cont" >
    <p id="content" > </p>
  </div>

<!--Message-->
  <div class="message">
   <p>Message:  </p>
   <a id="msg"></a>
  </div>

  <script src="marked.min.js"></script>

  <script>

    // swich theme function
    function switchTheme(newcss, name){
      document.getElementById('csslink').href = newcss;
      writeMsg('Theme switched to ' + name, 2);
    }


    //process function
    var current;
    function process(r) {
        if (r.ok) {
            current = r.text();
            writeMsg('Successfully  loaded.', 2);
            return current;
        }
        else {

          writeMsg('Could not load content. Reason: ' + r.statusText, 0);
          return current;   //remain previous content
      }
    }

    //get content function
    function loadContent(cont) {
        writeMsg('Loading, please wait...', 1);
        fetch(cont)
            .then(x => process(x), e => console.log('Fetch failed!!!', e))
            //.then(t => console.log(t))
            .then(t => document.getElementById('content').innerHTML = marked(t))
    }

    //get message function
    function writeMsg(txt, level){
      var txtColor;
      //switch the message level(color)
      switch(level){
        case 0:
            txtColor = "red";
            break;
        case 1:
            txtColor = "blue";
            break;
        case 2:
            txtColor = "green";
            break;
        default:
            txtColor = "white";
      }
        document.getElementById("msg").innerHTML = txt;
        document.getElementById("msg").style.color = txtColor;
    }

  </script>

 </body>
</html>
