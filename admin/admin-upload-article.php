<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/includes/init_admin.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  move_uploaded_file($_FILES['image']['tmp_name'], $_SERVER['DOCUMENT_ROOT'] . "/images/articles/" . $_FILES['image']['name']);

  $topic = $_POST['topic'];
  $date = $_POST['date'];
  $month = $_POST['month'];
  $year = $_POST['year'];
  $desc = $_POST['desc'];
  $path = $_FILES['image']['name'];

  $sql = $conn->prepare("INSERT INTO sys_article
(sys_image, sys_topic, sys_dec, sys_date, sys_month, sys_year, sys_view)

VALUES (?, ?, ?, ?, ?, ?, 0)");
  $sql->execute([$path, $topic, $desc, $date, $month, $year]);

  echo '
	<script>alert("Article Successfully Uploaded!");
	</script>';
}
?>

<div class="container-fluid">
  <div class="row">
    <?php
    require_once($includes . 'admin-sidebar.php');
    ?>

    <div class="col-9">
      <div class="row">
        <div class="background-white-in">
          <div class="padding-30-15">
            <div class="breadcrumb-main">
              <p class="current-link">Admin Dashboard</p>
              <i class="fas fa-chevron-right"></i>
              <p class="current-link">Upload Articles</p>
            </div>



            <div class="row">
              <div class="col-12">
                <div class="margin-bottom-30">
                  <div class="background-white">
                    <div class="padding-topic">
                      <p class="menu-topic">Upload Article</p>
                    </div>
                    <hr>

                    <div class="col-sm-12">
                      <div class="padding-30">
                        <div class="row">
                          <form method="post" enctype="multipart/form-data">
                            <div class="row">
                              <div class="col-sm-6">
                                <p class="form-text">Course Image</p>
                                <span class="image-size d-inline-block mb-3">(<strong>Width :</strong> 600px) x (<strong>Height :</strong> 300px)</span>
                                <input type="file" class="d-inline-block mb-3" name="image" id="image" onchange="showPreview(this)" accept="/images/course" />
                                <img src="../images/statics/upload.jpg" id="imgAvatar" alt="Course Image" class='mb-3' />
                              </div>

                              <div class="col-sm-6">
                                <div class="row">
                                  <div class="col-sm-12">
                                    <p class="form-text">Topic</p>
                                    <input type="text" class="form mb-3" name="topic" placeholder="eg: Accounts" size="30" />
                                  </div>


                                  <div class="col-sm-4">
                                    <p class="form-text">Date</p>
                                    <select class="form" name="date">
                                      <option value="1">1</option>
                                      <option value="2">2</option>
                                      <option value="3">3</option>
                                      <option value="4">4</option>
                                      <option value="5">5</option>
                                      <option value="6">6</option>
                                      <option value="7">7</option>
                                      <option value="8">8</option>
                                      <option value="9">9</option>
                                      <option value="10">10</option>
                                      <option value="11">11</option>
                                      <option value="12">12</option>
                                      <option value="13">13</option>
                                      <option value="14">14</option>
                                      <option value="15">15</option>
                                      <option value="16">16</option>
                                      <option value="17">17</option>
                                      <option value="18">18</option>
                                      <option value="19">19</option>
                                      <option value="20">20</option>
                                      <option value="21">21</option>
                                      <option value="22">22</option>
                                      <option value="23">23</option>
                                      <option value="24">24</option>
                                      <option value="25">25</option>
                                      <option value="26">26</option>
                                      <option value="27">27</option>
                                      <option value="28">28</option>
                                      <option value="29">29</option>
                                      <option value="30">30</option>
                                      <option value="31">31</option>
                                    </select>
                                  </div>


                                  <div class="col-sm-4">
                                    <p class="form-text">Month</p>
                                    <select class="form" name="month">
                                      <option value="01">January</option>
                                      <option value="02">February</option>
                                      <option value="03">March</option>
                                      <option value="04">April</option>
                                      <option value="05">May</option>
                                      <option value="06">June</option>
                                      <option value="07">July</option>
                                      <option value="08">August</option>
                                      <option value="09">September</option>
                                      <option value="10">October</option>
                                      <option value="11">November</option>
                                      <option value="12">December</option>
                                    </select>
                                  </div>


                                  <div class="col-sm-4">
                                    <p class="form-text">Year</p>
                                    <input type="number" value="2020" class="form" name="year">
                                  </div>
                                </div>
                              </div>


                              <div class="col-sm-12 mb-3">
                                <p class="form-text">Decription</p>
                                <textarea id="editor1" name="desc"></textarea>
                              </div>
                              <div class="col-sm-12">
                                <input type="submit" class="button" value="Add Article" />
                              </div>
                            </div>
                          </form>
                        </div>

                      </div>
                    </div>
                  </div>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>


    </div>
  </div>
</div>

<script src="https://cdn.ckeditor.com/4.15.0/full/ckeditor.js"></script>
<script src="<? echo $js; ?>jquery.min.js"></script>
<script>
  CKEDITOR.replace('editor1');

  function showPreview(ele) {
    $('#imgAvatar').attr('src', ele.value); // for IE
    if (ele.files && ele.files[0]) {
      var reader = new FileReader();
      reader.onload = function(e) {
        $('#imgAvatar').attr('src', e.target.result);
      }
      reader.readAsDataURL(ele.files[0]);
    }
  }
</script>
<script>

</script>
