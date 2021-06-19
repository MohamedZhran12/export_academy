<?php
require_once($_SERVER['DOCUMENT_ROOT'] ."/includes/init.php");


$id = $_GET['id'];
$cat_id = $_GET['cat_id'];
?>



  <div class="padding-100">

    <div id=container-comingsoon>
      <img src="images/logo/Malaysia Export Academy Logo.png"" id="avatar" width="250" draggable="false"/>
      <div id="text">
        <h1>Building…</h1>
        <p title="(I guess)">(coming soon)</p>
      </div>
    </div>
  </div>

  <style>
      #avatar {
          padding: 35px 40px;
          box-shadow: none;
          /* box-shadow: 0px 2px 3px rgba(0,0,0,0.25); */
          /* transition: all 0.5s cubic-bezier(0.19,1.0,0.22,1.0); */
          /* border-radius: 50%; */
          animation: bounce cubic-bezier(0.19, 1.0, 0.22, 1.0) 1.5s alternate infinite;
          -webkit-animation: bounce cubic-bezier(0.19, 1.0, 0.22, 1.0) 1.5s alternate infinite;
          width: 320px;
          height: 170px;
      }

      @keyframes bounce {
          to {
              transform: translateY(-12px) scale(1.03);
              box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.15);
          }
      }

      @-webkit-keyframes bounce { /*maxthon duplicate*/
          to {
              -webkit-transform: translateY(-12px) scale(1.03);
              box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.15);
          }
      }

      /*#avatar:hover{
        transform: translateY(-7px) scale(1.05);
        -webkit-transform: translateY(-7px) scale(1.05); /*maxthon
        box-shadow: 0px 5px 10px rgba(0,0,0,0.15);
      }*/

      #text {
          margin-top: 7px;
      }

      h1, p {
          margin: 0;
          padding: 0;

          font-family: Segoe UI, sans-serif;
          font-weight: 100;
          font-style: normal;
          color: rgba(0, 0, 0, 1);
      }

      h1 {
          color: rgba(1, 106, 154, 0.75); /*#016A9A;*/
          text-shadow: 0px 1px 0px rgba(255, 255, 255, 1.0);
      }

      p {
          color: rgb(0 0 0 / 54%);
          text-shadow: 0px 1px 0px rgba(255, 255, 255, 0.75);
      }

      div#container-comingsoon {
          margin: 0 auto;
          width: 50%;
          text-align: center;
      }
  </style>

<?php
  require_once($includes . 'footer.php');
?>
