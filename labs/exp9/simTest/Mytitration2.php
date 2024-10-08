<!DOCTYPE html>
<html lang="en">
<?php
session_start();

// Access the value stored in the session variable from page1.php
$data1 = $_SESSION['Normality_titrate'];
$data2 = $_SESSION['volume_titrate'];
$data3 = $_SESSION['Vadded'];
$data4 = $_SESSION['Result1'];


// Echo the value back to the client

?>

<head>
  <title>Removal of Hardness of Water by Ion Exchange Column</title>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/p5.js/1.4.0/p5.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
    integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="mainstyle.css">
  <link rel="stylesheet" href="button.css">
  <link rel="stylesheet" href="slider.css">
  <link rel="stylesheet" href="Other.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
    integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>
  <?php
  // Your PHP variables
  $phpVariable = "Hello from PHP!";

  // Echo the HTML with the data attribute
  echo '<div id="data1" data-php-variable="' . htmlspecialchars($data1) . '"></div>';
  echo '<div id="data2" data-php-variable="' . htmlspecialchars($data2) . '"></div>';
  echo '<div id="data3" data-php-variable="' . htmlspecialchars($data3) . '"></div>';
  echo '<div id="data4" data-php-variable="' . htmlspecialchars($data4) . '"></div>';
  // echo $data4;


  ?>

  <H1>Removal of Hardness of Water by Ion Exchange Column </H1>
  <!-- <h3>Titrating to determine permanent hardness.</h3> -->
  <div id="flexbox">

  </div>

  <div id="container1">

    <div id='textbox' class="rectangle">
      <span id="displayText">Click start button.</span>
      <button class="button1" onclick="changeText()"><i class="fa-solid fa-forward fa-xl"></i></button>

    </div>
  </div>

  <div class="box">
    <button class="btn btn-primary btn-sm" id="runsetup" onclick="toggleFullScreen()"><i
        class=" fa-solid fa-xl fa-maximize" style="color: #70a9a1;"></i></button>
    <button class="help-button" onclick="showHelp()"><i class="fa-solid fa-circle-info fa-xl"></i></button>
    <div class="canvasflex">

      <div id="canvasContainer">
        <script src="Mainfile2.js"></script>
      </div>

      <div class="form-group">
        <div class="button-container">
          <div>
            <button class="button primary" id="Reset" disabled>Reset</button>
          </div>
          <div>
            <button class="button tert" id="Shake" style="margin-right: 2vw; margin-left: 2vw;">Shake</button>
          </div>

          <div>
            <button class="button secondary" id="Start">Start</button>
          </div>
        </div>
        <div class="slider-container">
          <div class="slider-box"><label for="speed_change">Nozzle Open: <span class="slider-value" id="speed">2
                <span></span></label>
            <input type="range" class="slider" id="speed_change" min="1" max="5" value="2" step="1">
          </div>
          <!-- <div class="slider-box"><label for="Normality_titrate">Normality of titrate: <span class="slider-value"
              id="Normality">1 N<span></span></label>
          <input type="range" class="slider" id="Normality_titrate" min="1" max="4" value="2" step="1">
        </div>
        <div class="slider-box"><label for="Volume_titrate">Volume of titrate: <span class="slider-value" id="Volume">1
              ml<span></span></label>
          <input type="range" class="slider" id="Volume_titrate" min="1" max="15" value="1" step="1">
        </div> -->
          <div class="result-container">
            <h5>Past Titration Reading: </h5>
            <div id="OldDisplay" style="margin-left: 10px;" class="result"><?php echo '$data4'?>
            </div>
            <div class="result-container">
              <h5>Volume added(H2SO4): </h5>
              <div id="valueDisplay" style="margin-left: 10px;" class="result">
              </div>
            </div>
          </div>






        </div>
      </div>
    </div>


   




    <!-- // Your JavaScript code here...
    // (Add any custom scripts you have in "Mainfile.js" here)-->
    <script>
      const textArray = ["Click start button.", "Fix the nozzle opening size by nozzle open slider.Shake the flask while Titrating.", "Titrate the solution till it turn to orange-red.", ""]; // Add more texts as needed
      let currentIndex = 0;
      const displayText = document.getElementById("displayText");
      const box = document.getElementById('textbox');

      function changeText() {


        currentIndex = (currentIndex + 1) % textArray.length;
        displayText.textContent = textArray[currentIndex];
        if (currentIndex == textArray.length - 1) {
          box.style.display = 'none';
        }
      }
      function showHelp() {
        box.style.display = 'block';

      }

    </script>
    <script>

$(document).ready(function () {
        // Get the slider and displayed value elements
        var slider = $('#speed_change');
        var sliderValue = $('#speed');

        var slider2 = $('#Normality_titrate');
        var slider2Value = $('#Normality');

        var slider3 = $('#Volume_titrate');
        var slider3Value = $('#Volume');

        // Update the displayed value when the slider changes
        slider.on('input', function () {
          var value = slider.val();
          sliderValue.text(value);
        });

        slider2.on('input', function () {
          var value = slider2.val();
          slider2Value.text(value / 2 + ' N');
        });

        slider3.on('input', function () {
          var value = slider3.val();
          slider3Value.text(value + ' ml');
        });
      });


      function toggleFullScreen() {
        if (!document.fullscreenElement) {
          if (document.documentElement.requestFullscreen) {
            document.documentElement.requestFullscreen();
          } else if (document.documentElement.mozRequestFullScreen) { /* Firefox */
            document.documentElement.mozRequestFullScreen();
          } else if (document.documentElement.webkitRequestFullscreen) { /* Chrome, Safari & Opera */
            document.documentElement.webkitRequestFullscreen();
          } else if (document.documentElement.msRequestFullscreen) { /* IE/Edge */
            document.documentElement.msRequestFullscreen();
          }
          // toggleDiv.classList.add('custom-fullscreen');
        } else {
          if (document.exitFullscreen) {
            document.exitFullscreen();
          } else if (document.mozCancelFullScreen) { /* Firefox */
            document.mozCancelFullScreen();
          } else if (document.webkitExitFullscreen) { /* Chrome, Safari & Opera */
            document.webkitExitFullscreen();
          } else if (document.msExitFullscreen) { /* IE/Edge */
            document.msExitFullscreen();
          }
          // toggleDiv.classList.remove('custom-fullscreen');
        }
      }

    </script>
    <script>
      const clickMeButton = document.getElementById("Reset");
      const submitButton = document.getElementById("Start");

      clickMeButton.addEventListener("click", () => {
        if (!submitButton.classList.contains("pushed")) {
          // Your click me button action here
          console.log("Click Me button clicked!");
        }
      });

      submitButton.addEventListener("click", () => {
        submitButton.classList.toggle("pushed");
        clickMeButton.disabled = submitButton.classList.contains("pushed");
      });

      clickMeButton.addEventListener("click", () => {
        // Add the 'clicked' class to apply the click effect
        clickMeButton.classList.add("clicked");

        // After a short delay, remove the 'clicked' class to revert the button
        setTimeout(() => {
          clickMeButton.classList.remove("clicked");
        }, 200); // Adjust the delay (in milliseconds) to control the duration of the effect
      });

    </script>
    </div>
 <h1 class="end"></h1>
</body>

</html>