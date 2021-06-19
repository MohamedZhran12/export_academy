<style>
  .dashboard-sidebar {
    position: fixed;
    overflow-y: scroll;
    height: 100%;
    overflow-x: hidden;
  }
</style>

<div style="margin-right: 24.7vw;"></div>
<div class="col-3 p-0 dashboard-sidebar">
  <div class="background-gradient">
    <div class="side-bar-menu">
      <p class="menu-topic-side"><i class="fas fa-bars"></i> Menu</p>
      <ul class='list-unstyled'>
        <li>
          <a href="/admin/admin-main.php" class="side-menu-link">Admin Dashboard</a>
        </li>
        <li>
          <a href="/admin/admin-all-courses.php?t=sys_course" class="side-menu-link">All Courses</a>
        </li>
        <li>
          <a href="/admin/admin-all-courses.php?t=sys_seminars" class="side-menu-link">All Seminar & Conferences</a>
        </li>
        <li>
          <a href="/admin/admin-all-courses.php?t=sys_professional_cert" class="side-menu-link">All Professional
            Certification</a>
        </li>
        <li>
          <a href="/admin/admin-all-courses.php?t=sys_special_programmes" class="side-menu-link">All Special Programmes</a>
        </li>
        <li>
          <a href="/admin/admin-all-courses.php?t=sys_trade_missions" class="side-menu-link">All Trade Missions</a>
        </li>

        <li id='all-csr-events-btn' style='cursor:pointer'><a class='side-menu-link'>All CSR Events</a></li>
        <div id='all-csr-events' style='display:none;'>
          <li class='ml-5'><a href="admin-edit-csr-text.php" class="side-menu-link">Edit CSR Page Header</a></li>
          <li class='ml-5'><a href="admin-edit-csr-category.php" class="side-menu-link">Edit CSR Event</a></li>
          <li class='ml-5'><a href="admin-delete-csr-category.php" class="side-menu-link">Delete CSR Event</a></li>
          <li class='ml-5'><a href="admin-delete-csr-images.php" class="side-menu-link">Delete CSR Image</a></li>
        </div>

        <li id='all-gallery-events-btn' style='cursor:pointer'><a class='side-menu-link'>All Gallery Events</a></li>
        <div id='all-gallery-events' style='display:none;'>
          <li class='ml-5'><a href="admin-edit-gallery-category.php" class="side-menu-link">Edit Gallery Event</a></li>
          <li class='ml-5'><a href="admin-delete-gallery-category.php" class="side-menu-link">Delete Gallery Event</a>
          </li>
          <li class='ml-5'><a href="admin-delete-gallery-images.php" class="side-menu-link">Delete Gallery Image</a>
          </li>
        </div>

        <li id='all-our-achievements-btn' style='cursor:pointer'><a class='side-menu-link'>All Our Achievements</a></li>
        <div id='all-our-achievements' style='display:none;'>
          <li class='ml-5'><a href="admin-edit-our-achievements-category.php" class="side-menu-link">Edit Our
              Achievements Category</a></li>
          <li class='ml-5'><a href="admin-delete-our-achievements-category.php" class="side-menu-link">Delete Our
              Achievements Category</a></li>
          <li class='ml-5'><a href="admin-delete-our-achievements-images.php" class="side-menu-link">Delete Our
              Achievements Images</a></li>
        </div>

        <li id='all-our-management-btn' style='cursor:pointer'><a class='side-menu-link'>All Our Management</a></li>
        <div id='all-our-management' style='display:none;'>
          <li class='ml-5'><a href="admin-edit-our-management-category.php" class="side-menu-link">Edit Our Management
              Category</a></li>
          <li class='ml-5'><a href="admin-delete-our-management-category.php" class="side-menu-link">Delete Our
              Management Category</a></li>
          <li class='ml-5'><a href="admin-delete-our-management-images.php" class="side-menu-link">Delete Our Management
              Images</a></li>
        </div>

        <li id='all-mexa-tv-btn' style='cursor:pointer'><a class='side-menu-link'>All MEXA TV</a></li>
        <div id='all-mexa-tv' style='display:none;'>
          <li class='ml-5'><a href="admin-edit-mexa-tv-category.php" class="side-menu-link">Edit MEXA TV Category</a>
          </li>
          <li class='ml-5'><a href="admin-delete-mexa-tv-category.php" class="side-menu-link">Delete MEXA TV
              Category</a></li>
          <li class='ml-5'><a href="admin-delete-mexa-tv-videos.php" class="side-menu-link">Delete MEXA TV videos</a>
          </li>
        </div>


        <li>
          <a href="admin-all-articles.php" class="side-menu-link">All Articles</a>
        </li>
      </ul>
    </div>
    <div class="side-bar-menu">
      <p class="menu-topic-side mt-0"><i class="fas fa-cloud-upload-alt"></i> Uploads</p>
      <ul class='list-unstyled'>

        <li id='homepage-slider-btn' style='cursor:pointer'><a class='side-menu-link'>Homepage Images</a></li>
        <div id='homepage' style='display:none;'>
          <li class='ml-5'>
            <a href="admin-upload-homepage-images.php" class="side-menu-link">Upload Homepage Images</a>
          </li>
          <li class='ml-5'>
            <a href="admin-delete-homepage-images.php" class="side-menu-link">Delete Homepage Images</a>
          </li>
        </div>

        <li id='partners-logo-btn' style='cursor:pointer'><a class='side-menu-link'>Partners Logo Images</a></li>
        <div id='partners-logos' style='display:none;'>
          <li class='ml-5'>
            <a href="admin-upload-logos-images.php" class="side-menu-link">Upload Partner Images</a>
          </li>
          <li class='ml-5'>
            <a href="admin-delete-logos-images.php" class="side-menu-link">Delete Partner Images</a>
          </li>
        </div>

        <li>
          <a href="/admin/upload_courses/upload-course.php?t=sys_course" class="side-menu-link">Upload Course</a>
        </li>
        <li><a href="/admin/upload_courses/upload-course.php?t=sys_seminars" class="side-menu-link">Upload Seminar &
            Conferences</a>
        </li>
        <li>
          <a href="/admin/upload_courses/upload-course.php?t=sys_professional_cert" class="side-menu-link">Upload Professional
            Certification</a>
        </li>
        <li>
          <a href="/admin/upload_courses/upload-course.php?t=sys_special_programmes" class="side-menu-link">Upload Special
            Programmes</a>
        </li>
        <li>
          <a href="/admin/upload_courses/upload-course.php?t=sys_trade_missions" class="side-menu-link">Upload trade
            missions</a>
        </li>

        <li id='csr-events-btn' style='cursor:pointer'><a class='side-menu-link'>Upload CSR Events</a></li>
        <div id='csr-events' style='display:none;'>
          <li class='ml-5'>
            <a href="admin-add-csr-category.php" class="side-menu-link">Add CSR Event</a>
          </li>
          <li class='ml-5'>
            <a href="admin-upload-csr-images.php" class="side-menu-link">Add CSR images to Event</a>
          </li>
        </div>

        <li id='gallery-events-btn' style='cursor:pointer'><a class='side-menu-link'>Upload Gallery Events</a></li>
        <div id='gallery-events' style='display:none;'>
          <li class='ml-5'>
            <a href="admin-add-gallery-category.php" class="side-menu-link">Add Gallery Event</a>
          </li>
          <li class='ml-5'>
            <a href="admin-upload-gallery-images.php" class="side-menu-link">Add Gallery images to Event</a>
          </li>
        </div>

        <li id='our-achievements-events-btn' style='cursor:pointer'><a class='side-menu-link'>Upload Our
            Achievements</a></li>
        <div id='our-achievements-events' style='display:none;'>
          <li class='ml-5'>
            <a href="admin-add-our-achievements-category.php" class="side-menu-link">Add Our Achievements Event</a>
          </li>
          <li class='ml-5'>
            <a href="admin-upload-our-achievements-images.php" class="side-menu-link">Add Our Achievements images to
              Event</a>
          </li>
        </div>

        <li id='our-management-events-btn' style='cursor:pointer'><a class='side-menu-link'>Upload Our Management</a>
        </li>
        <div id='our-management-events' style='display:none;'>
          <li class='ml-5'>
            <a href="admin-add-our-management-category.php" class="side-menu-link">Add Our Management</a>
          </li>
          <li class='ml-5'>
            <a href="admin-upload-our-management-images.php" class="side-menu-link">Add Our Management images</a>
          </li>
        </div>

        <li id='mexa-tv-events-btn' style='cursor:pointer'><a class='side-menu-link'>Upload MEXA TV Events</a></li>
        <div id='mexa-tv-events' style='display:none;'>
          <li class='ml-5 active'>
            <a href="admin-add-mexa-tv-category.php" class="side-menu-link">Add MEXA TV Event</a>
          </li>
          <li class='ml-5'>
            <a href="admin-upload-mexa-tv-videos.php" class="side-menu-link">Add MEXA TV Videos to Event</a>
          </li>
        </div>

        <li>
          <a href="admin-add-courses-groups.php" class="side-menu-link">Add group</a>
        </li>

        <li>
          <a href="admin-edit-courses-groups.php" class="side-menu-link">Edit group</a>
        </li>

        <li>
          <a href="admin-delete-courses-groups.php" class="side-menu-link">Delete group</a>
        </li>

        <li>
          <a href="admin-upload-article.php" class="side-menu-link">Upload Articles</a>
        </li>
        <li>
          <a href="admin-upload-album.php" class="side-menu-link">Upload Galleries</a>
        </li>
      </ul>
    </div>
  </div>
</div>
<script>
  document.querySelectorAll('a').forEach((item) => {
    if (item.getAttribute('href') == window.location.pathname.replace('/', '')) {
      item.parentElement.classList.add('active');
    }
  });
  document.getElementById('csr-events-btn').addEventListener('click', function() {
    if (document.getElementById('csr-events').style.display == 'block') {
      document.getElementById('csr-events').style.display = 'none';
    } else {
      document.getElementById('csr-events').style.display = 'block';
    }
  })

  document.getElementById('all-csr-events-btn').addEventListener('click', function() {
    if (document.getElementById('all-csr-events').style.display == 'block') {
      document.getElementById('all-csr-events').style.display = 'none';
    } else {
      document.getElementById('all-csr-events').style.display = 'block';
    }
  })

  document.getElementById('homepage-slider-btn').addEventListener('click', function() {
    if (document.getElementById('homepage').style.display == 'block') {
      document.getElementById('homepage').style.display = 'none';
    } else {
      document.getElementById('homepage').style.display = 'block';
    }
  })

  document.getElementById('partners-logo-btn').addEventListener('click', function() {
    if (document.getElementById('partners-logos').style.display == 'block') {
      document.getElementById('partners-logos').style.display = 'none';
    } else {
      document.getElementById('partners-logos').style.display = 'block';
    }
  })

  document.getElementById('all-gallery-events-btn').addEventListener('click', function() {
    if (document.getElementById('all-gallery-events').style.display == 'block') {
      document.getElementById('all-gallery-events').style.display = 'none';
    } else {
      document.getElementById('all-gallery-events').style.display = 'block';
    }
  })

  document.getElementById('gallery-events-btn').addEventListener('click', function() {
    if (document.getElementById('gallery-events').style.display == 'block') {
      document.getElementById('gallery-events').style.display = 'none';
    } else {
      document.getElementById('gallery-events').style.display = 'block';
    }
  })

  document.getElementById('all-our-achievements-btn').addEventListener('click', function() {
    if (document.getElementById('all-our-achievements').style.display == 'block') {
      document.getElementById('all-our-achievements').style.display = 'none';
    } else {
      document.getElementById('all-our-achievements').style.display = 'block';
    }
  })

  document.getElementById('our-achievements-events-btn').addEventListener('click', function() {
    if (document.getElementById('our-achievements-events').style.display == 'block') {
      document.getElementById('our-achievements-events').style.display = 'none';
    } else {
      document.getElementById('our-achievements-events').style.display = 'block';
    }
  })

  document.getElementById('all-our-management-btn').addEventListener('click', function() {
    if (document.getElementById('all-our-management').style.display == 'block') {
      document.getElementById('all-our-management').style.display = 'none';
    } else {
      document.getElementById('all-our-management').style.display = 'block';
    }
  })

  document.getElementById('our-management-events-btn').addEventListener('click', function() {
    if (document.getElementById('our-management-events').style.display == 'block') {
      document.getElementById('our-management-events').style.display = 'none';
    } else {
      document.getElementById('our-management-events').style.display = 'block';
    }
  })

  document.getElementById('all-mexa-tv-btn').addEventListener('click', function() {
    if (document.getElementById('all-mexa-tv').style.display == 'block') {
      document.getElementById('all-mexa-tv').style.display = 'none';
    } else {
      document.getElementById('all-mexa-tv').style.display = 'block';
    }
  })

  document.getElementById('mexa-tv-events-btn').addEventListener('click', function() {
    if (document.getElementById('mexa-tv-events').style.display == 'block') {
      document.getElementById('mexa-tv-events').style.display = 'none';
    } else {
      document.getElementById('mexa-tv-events').style.display = 'block';
    }
  })
</script>
