<div class="side-bar-main">
  <div class="side-des">
    <div class="row">
      <div class="col-6">
        <a href="course_month.php?month=01">
          <div class="row">
            <p class="calendar">January</p> <span class="total-r">
	              <?php

                $result = $conn->prepare("select count(1) FROM sys_course WHERE sys_course_month= '01'");
                $result->execute();
                $row = $result->fetch();
                $total = $row[0];
                echo " $total ";
                ?>
	            </span>
          </div>
        </a>
      </div>

      <div class="col-6">
        <a href="course_month.php?month=02">
          <div class="row">
            <p class="calendar">February</p> <span class="total-l">
	              <?php
                $result = $conn->prepare("select count(1) FROM sys_course WHERE sys_course_month= '02'");
                $result->execute();
                $row = $result->fetch();
                $total = $row[0];
                echo " $total ";
                ?>
	            </span>
          </div>
        </a>
      </div>

      <div class="col-6">
        <a href="course_month.php?month=03">
          <div class="row">
            <p class="calendar">March</p><span class="total-r">
	              <?php
                $result = $conn->prepare("select count(1) FROM sys_course WHERE sys_course_month= '03'");
                $result->execute();
                $row = $result->fetch();
                $total = $row[0];
                echo " $total ";
                ?>
	            </span>
          </div>
        </a>
      </div>

      <div class="col-6">
        <a href="course_month.php?month=04">
          <div class="row">
            <p class="calendar">April</p><span class="total-l">
	              <?php
                $result = $conn->prepare("select count(1) FROM sys_course WHERE sys_course_month= '04'");
                $result->execute();
                $row = $result->fetch();
                $total = $row[0];
                echo " $total ";
                ?>
	            </span>
          </div>
        </a>
      </div>

      <div class="col-6">
        <a href="course_month.php?month=05">
          <div class="row">
            <p class="calendar">May</p><span class="total-r">
	              <?php
                $result = $conn->prepare("select count(1) FROM sys_course WHERE sys_course_month= '05'");
                $result->execute();
                $row = $result->fetch();
                $total = $row[0];
                echo " $total ";
                ?>
	            </span>
          </div>
        </a>
      </div>

      <div class="col-6">
        <a href="course_month.php?month=06">
          <div class="row">
            <p class="calendar">June</p><span class="total-l">
	              <?php
                $result = $conn->prepare("select count(1) FROM sys_course WHERE sys_course_month= '06'");
                $result->execute();
                $row = $result->fetch();
                $total = $row[0];
                echo " $total ";
                ?>
	            </span>
          </div>
        </a>
      </div>

      <div class="col-6">
        <a href="course_month.php?month=07">
          <div class="row">
            <p class="calendar">July</p><span class="total-r">
	              <?php
                $result = $conn->prepare("select count(1) FROM sys_course WHERE sys_course_month= '07'");
                $result->execute();
                $row = $result->fetch();
                $total = $row[0];
                echo " $total ";
                ?>
	            </span>
          </div>
        </a>
      </div>

      <div class="col-6">
        <a href="course_month.php?month=08">
          <div class="row">
            <p class="calendar">August</p><span class="total-l">
	              <?php
                $result = $conn->prepare("select count(1) FROM sys_course WHERE sys_course_month= '08'");
                $result->execute();
                $row = $result->fetch();
                $total = $row[0];
                echo " $total ";
                ?>
	            </span>
          </div>
        </a>
      </div>

      <div class="col-6">
        <a href="course_month.php?month=09">
          <div class="row">
            <p class="calendar">September</p><span class="total-r">
	              <?php
                $result = $conn->prepare("select count(1) FROM sys_course WHERE sys_course_month= '09'");
                $result->execute();
                $row = $result->fetch();
                $total = $row[0];
                echo " $total ";
                ?>
	            </span>
          </div>
        </a>
      </div>

      <div class="col-6">
        <a href="course_month.php?month=10">
          <div class="row">
            <p class="calendar">October</p><span class="total-l">
	              <?php
                $result = $conn->prepare("select count(1) FROM sys_course WHERE sys_course_month= '10'");
                $result->execute();
                $row = $result->fetch();
                $total = $row[0];
                echo " $total ";
                ?>
	            </span>
          </div>
        </a>
      </div>

      <div class="col-6">
        <a href="course_month.php?month=11">
          <div class="row">
            <p class="calendar-1">November</p><span class="total-r">
	              <?php
                $result = $conn->prepare("select count(1) FROM sys_course WHERE sys_course_month= '11'");
                $result->execute();
                $row = $result->fetch();
                $total = $row[0];
                echo " $total ";
                ?>
	            </span>
          </div>
        </a>
      </div>

      <div class="col-6">
        <a href="course_month.php?month=12">
          <div class="row">
            <p class="calendar-1">December</p><span class="total-l">
	              <?php
                $result = $conn->prepare("select count(1) FROM sys_course WHERE sys_course_month= '12'");
                $result->execute();
                $row = $result->fetch();
                $total = $row[0];
                echo " $total ";
                ?>
	            </span>
          </div>
        </a>
      </div>
    </div>
  </div>
</div>
