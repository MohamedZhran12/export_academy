<div class="side-bar-fixed">
  <div class="side-bar-main">
    <div class="background-white">
      <div class="side-topic">
        <p><b>Calendar <?php echo date("Y"); ?></b></p>
      </div>
      <div class="side-des">
        <div class="row">
          <div class="col-6">
            <div class="row">
              <div class="month">
                <div class="month-set-l">
                  <a href="admin-course-month.php?month=01">
                    <p class="calendar">January</p> <span class="total-r">
	                      <?php
                        $table = isset($_GET['t']) ? $_GET['t'] : 'sys_course';
                        global $conn;
                        $sql = $conn->prepare("select count(1) FROM $table WHERE sys_course_month= '01'");
                        $sql->execute();
                        $row = $sql->fetch();
                        $total = $row[0];
                        echo " $total ";
                        ?>
	                    </span>
                  </a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-6">
            <div class="row">
              <div class="month">
                <div class="month-set-r">
                  <a href="admin-course-month.php?month=02">
                    <p class="calendar">February</p> <span class="total-l">
	                      <?php
                        $sql = $conn->prepare("select count(1) FROM $table WHERE sys_course_month= '02'");
                        $sql->execute();
                        $row = $sql->fetch();
                        $total = $row[0];
                        echo " $total ";
                        ?>
	                    </span>
                  </a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-6">
            <div class="row">
              <div class="month">
                <div class="month-set-l">
                  <a href="admin-course-month.php?month=03">
                    <p class="calendar">March</p><span class="total-r">
	                      <?php
                        $sql = $conn->prepare("select count(1) FROM $table WHERE sys_course_month= '03'");
                        $sql->execute();
                        $row = $sql->fetch();
                        $total = $row[0];
                        echo " $total ";
                        ?>
	                    </span>
                  </a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-6">
            <div class="row">
              <div class="month">
                <div class="month-set-r">
                  <a href="admin-course-month.php?month=04">
                    <p class="calendar">April</p><span class="total-l">
	                      <?php
                        $sql = $conn->prepare("select count(1) FROM $table WHERE sys_course_month= '04'");
                        $sql->execute();
                        $row = $sql->fetch();
                        $total = $row[0];
                        echo " $total ";
                        ?>
	                    </span>
                  </a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-6">
            <div class="row">
              <div class="month">
                <div class="month-set-l">
                  <a href="admin-course-month.php?month=05">
                    <p class="calendar">May</p><span class="total-r">
	                      <?php
                        $sql = $conn->prepare("select count(1) FROM $table WHERE sys_course_month= '05'");
                        $sql->execute();
                        $row = $sql->fetch();
                        $total = $row[0];
                        echo " $total ";
                        ?>
	                    </span>
                  </a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-6">
            <div class="row">
              <div class="month">
                <div class="month-set-r">
                  <a href="admin-course-month.php?month=06">
                    <p class="calendar">June</p><span class="total-l">
	                      <?php
                        $sql = $conn->prepare("select count(1) FROM $table WHERE sys_course_month= '06'");
                        $sql->execute();
                        $row = $sql->fetch();
                        $total = $row[0];
                        echo " $total ";
                        ?>
	                    </span>
                  </a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-6">
            <div class="row">
              <div class="month">
                <div class="month-set-l">
                  <a href="admin-course-month.php?month=07">
                    <p class="calendar">July</p><span class="total-r">
	                      <?php
                        $sql = $conn->prepare("select count(1) FROM $table WHERE sys_course_month= '07'");
                        $sql->execute();
                        $row = $sql->fetch();
                        $total = $row[0];
                        echo " $total ";
                        ?>
	                    </span>
                  </a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-6">
            <div class="row">
              <div class="month">
                <div class="month-set-r">
                  <a href="admin-course-month.php?month=08">
                    <p class="calendar">August</p><span class="total-l">
	                      <?php
                        $sql = $conn->prepare("select count(1) FROM $table WHERE sys_course_month= '08'");
                        $sql->execute();
                        $row = $sql->fetch();
                        $total = $row[0];
                        echo " $total ";
                        ?>
	                    </span>
                  </a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-6">
            <div class="row">
              <div class="month">
                <div class="month-set-l">
                  <a href="admin-course-month.php?month=09">
                    <p class="calendar">September</p><span class="total-r">
	                      <?php
                        $sql = $conn->prepare("select count(1) FROM $table WHERE sys_course_month= '09'");
                        $sql->execute();
                        $row = $sql->fetch();
                        $total = $row[0];
                        echo " $total ";
                        ?>
	                    </span>
                  </a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-6">
            <div class="row">
              <div class="month">
                <div class="month-set-r">
                  <a href="admin-course-month.php?month=10">
                    <p class="calendar">October</p><span class="total-l">
	                      <?php
                        $sql = $conn->prepare("select count(1) FROM $table WHERE sys_course_month= '10'");
                        $sql->execute();
                        $row = $sql->fetch();
                        $total = $row[0];
                        echo " $total ";
                        ?>
	                    </span>
                  </a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-6">
            <div class="row">
              <div class="month">
                <div class="month-set-l">
                  <a href="admin-course-month.php?month=11">
                    <p class="calendar">November</p><span class="total-r">
	                      <?php
                        $sql = $conn->prepare("select count(1) FROM $table WHERE sys_course_month= '11'");
                        $sql->execute();
                        $row = $sql->fetch();
                        $total = $row[0];
                        echo " $total ";
                        ?>
	                    </span>
                  </a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-6">
            <div class="row">
              <div class="month">
                <div class="month-set-r">
                  <a href="admin-course-month.php?month=12">
                    <p class="calendar">December</p><span class="total-l">
	                      <?php
                        $sql = $conn->prepare("select count(1) FROM $table WHERE sys_course_month= '12'");
                        $sql->execute();
                        $row = $sql->fetch();
                        $total = $row[0];
                        echo " $total ";
                        ?>
	                    </span>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
