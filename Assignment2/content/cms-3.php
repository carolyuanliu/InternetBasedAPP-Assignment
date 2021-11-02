<!DOCTYPE html>
<html lang="en">
  <head>
	 <title> UCC Computer Science Student </title>

   <link id="csslink" rel="stylesheet" href="styleSheets/light.css">

  </head>


<!--Navigation Bar-->
  <div class="nav">
      <table>
        <tr>
          <td>
            <a href="cms-3.php?cont=1"><img src="icons/home.svg"/> HOME</a>
            <div class="time">
            <?php
            $i= (int)((time()-filemtime('content/home.md'))/60/60/24);
            echo  '<p>File was last modified ' .$i.' days ago.</p>';
            ?>



           </div>
          </td>
       </tr>
         <tr>
           <td>
             <a href="cms-3.php?cont=2"><img src="icons/personal.svg"/> Personal</a>
             <div class="time">
             <?php
             $t=filemtime('content/personal.md');
             $i= (int)((time()-filemtime('content/personal.md'))/60/60/24);
             echo  '<p>File was last modified ' .$i.' days ago.</p>';
             ?>
            </div>
           </td>
         </tr>
        <tr>
          <td>
            <a href="cms-3.php?cont=3"><img src="icons/ucc.svg"/> UCC</a>
            <div class="time">
            <?php
            $t=filemtime('content/ucc.md');
            $i= (int)((time()-filemtime('content/ucc.md'))/60/60/24);
            echo  '<p>File was last modified ' .$i.' days ago.</p>';
            ?>
           </div>
          </td>
         </tr>
        <tr>
          <td>
            <a href="cms-3.php?cont=4"><img src="icons/contact.svg"/> Contact</a>
            <div class="time">
            <?php
            $t=filemtime('content/contact.md');
            $i= (int)((time()-filemtime('content/contact.md'))/60/60/24);
            echo  '<p>File was last modified ' .$i.' days ago.</p>';
            ?>
           </div>
          </td>
        </tr>
     </table>

<!--Theme Buttons-->
       <button class="button" onclick="switchTheme('styleSheets/light.css')">
         <img src="icons/light.svg"/> Light Theme
       </button>
       <br>
       <button class="button" onclick="switchTheme('styleSheets/dark.css')">
          <img src="icons/dark.svg"/> Dark Theme
       </button>
       <button class="button" onclick="switchTheme('styleSheets/large_fonts.css')">
         <img src="icons/large_fonts.svg"/> Large Fonts
    </div>

    <div id="cont">

    <?php
        function getCont($filename) {
          if (is_file($filename)){
            include('Parsedown.php');
            $contents = file_get_contents($filename);
            $Parsedown = new Parsedown();
            echo $Parsedown->text($contents);
          }
          else{

          echo "Error. Content file cannot be retrieved. ";
          }
        }
        if(isset($_GET['cont'])){
          switch ($_GET['cont']) {
              case "1":
              echo getCont('content/home.md');
                break;
              case "2":

              echo getCont('content/personal.md');

                break;
              case "3":

              echo getCont('content/ucc.md');

                break;
              case "4":

              echo getCont('content/contact.md');

                break;
              default:
              echo "Invalid parameter. No such content!";
             }
            }
        else{
          include('Parsedown.php');
          $contents = file_get_contents('content/home.md');
          $Parsedown = new Parsedown();
          echo $Parsedown->text($contents);
          //include 'home.md';
        }


    ?>

  <?php


   ?>
  </div>

<!--Message-->
  <div class="message">
   <p>Message:  </p>
   <a id="msg"> </a>

  </div>

    <script>



        function switchTheme(newcss) {
           var css = "styleSheets/light.css"
            document.getElementById('csslink').setAttribute("href",newcss);
            document.getElementById('msg').innerHTML='Theme changed to '+ newcss;
            css = document.getElementById('csslink').href;
          }

        document.getElementById('csslink').setAttribute("href",css);
        if(typeof swithTheme()!=='function'){

        }
        else{


        }





    </script>


 </body>
</html>
