<style>
  .dashboard-sidebar {
    position: fixed;
    overflow-y: scroll;
    height: 100%;
    overflow-x: hidden;
  }
</style>

<div style="margin-right: 24.7%;"></div>
<div class="col-3 p-0 dashboard-sidebar">
  <div class="background-gradient">
    <div class="side-bar-menu">
      <p class="menu-topic-side"><i class="fas fa-bars"></i> Menu</p>
      <ul class='list-unstyled'>
        <li>
          <a href="/admin/admin-main.php" class="side-menu-link">Admin Dashboard</a>
        </li>

        <li id='all-courses-btn' style='cursor:pointer'><a class='side-menu-link'>Courses List</a></li>
        <div id='all-courses' class='d-none ml-4'>
          <li>
            <a href="/admin/admin-all-courses.php?course=sys_course" class="side-menu-link">All Courses</a>
          </li>
          <li>
            <a href="/admin/admin-all-courses.php?course=sys_seminars" class="side-menu-link">All Seminar & Conferences</a>
          </li>
          <li>
            <a href="/admin/admin-all-courses.php?course=sys_professional_cert" class="side-menu-link">All Professional
              Certification</a>
          </li>
          <li>
            <a href="/admin/admin-all-courses.php?course=sys_special_programmes" class="side-menu-link">All Special Programmes</a>
          </li>
          <li>
            <a href="/admin/admin-all-courses.php?course=in_house" class="side-menu-link">All In House</a>
          </li>
          <li>
            <a href="/admin/admin-all-courses.php?course=sys_trade_missions" class="side-menu-link">All Trade Missions</a>
          </li>
          <li>
            <a href="/admin/admin-all-courses.php?course=export_coaching" class="side-menu-link">All Export Coaching</a>
          </li>
          <li>
            <a href="/admin/admin-all-courses.php?course=trade_shows" class="side-menu-link">All Trade Shows</a>
          </li>
          <li>
            <a href="/admin/admin-all-courses.php?course=products" class="side-menu-link">All List of Product</a>
          </li>
          <li>
            <a href="/admin/admin-all-courses.php?course=consulting_services" class="side-menu-link">All Consulting Services</a>
          </li>
          <li>
            <a href="/admin/admin-all-courses.php?course=global_network" class="side-menu-link">All Global Network</a>
          </li>
          <li>
            <a href="admin-all-articles.php" class="side-menu-link">All Articles</a>
          </li>
        </div>

        <li id='all-csr-events-btn' style='cursor:pointer'><a class='side-menu-link'>All CSR Events</a></li>
        <div id='all-csr-events' class='d-none ml-4'>
          <li><a href="admin-edit-csr-text.php" class="side-menu-link">Edit CSR Page Header</a></li>
          <li><a href="admin-edit-csr-category.php" class="side-menu-link">Edit CSR Event</a></li>
          <li><a href="admin-delete-csr-category.php" class="side-menu-link">Delete CSR Event</a></li>
          <li><a href="admin-delete-csr-images.php" class="side-menu-link">Delete CSR Image</a></li>
        </div>

        <li id='all-gallery-events-btn' style='cursor:pointer'><a class='side-menu-link'>All Gallery Events</a></li>
        <div id='all-gallery-events' class='d-none ml-4'>
          <li><a href="admin-edit-gallery-category.php" class="side-menu-link">Edit Gallery Event</a></li>
          <li><a href="admin-delete-gallery-category.php" class="side-menu-link">Delete Gallery Event</a>
          </li>
          <li><a href="admin-delete-gallery-images.php" class="side-menu-link">Delete Gallery Image</a>
          </li>
        </div>

        <li id='all-our-achievements-btn' style='cursor:pointer'><a class='side-menu-link'>All Our Achievements</a></li>
        <div id='all-our-achievements' class='d-none ml-4'>
          <li><a href="admin-edit-our-achievements-category.php" class="side-menu-link">Edit Our
              Achievements Category</a></li>
          <li><a href="admin-delete-our-achievements-category.php" class="side-menu-link">Delete Our
              Achievements Category</a></li>
          <li><a href="admin-delete-our-achievements-images.php" class="side-menu-link">Delete Our
              Achievements Images</a></li>
        </div>

        <li id='all-our-management-btn' style='cursor:pointer'><a class='side-menu-link'>All Our Management</a></li>
        <div id='all-our-management' class='d-none ml-4'>
          <li><a href="admin-edit-our-management-category.php" class="side-menu-link">Edit Our Management
              Category</a></li>
          <li><a href="admin-delete-our-management-category.php" class="side-menu-link">Delete Our
              Management Category</a></li>
          <li><a href="admin-delete-our-management-images.php" class="side-menu-link">Delete Our Management
              Images</a></li>
        </div>

        <li id='all-mexa-tv-btn' style='cursor:pointer'><a class='side-menu-link'>All MEXA TV</a></li>
        <div id='all-mexa-tv' class='d-none ml-4'>
          <li><a href="admin-edit-mexa-tv-category.php" class="side-menu-link">Edit MEXA TV Category</a>
          </li>
          <li><a href="admin-delete-mexa-tv-category.php" class="side-menu-link">Delete MEXA TV
              Category</a></li>
          <li><a href="admin-delete-mexa-tv-videos.php" class="side-menu-link">Delete MEXA TV videos</a>
          </li>
        </div>
      </ul>
    </div>

    <div class="side-bar-menu">
      <p class="menu-topic-side mt-0"><i class="fas fa-cloud-upload-alt"></i> Uploads</p>
      <ul class='list-unstyled'>

        <li id='homepage-slider-btn' style='cursor:pointer'><a class='side-menu-link'>Homepage Images</a></li>
        <div id='homepage-slider' class='d-none ml-4'>
          <li>
            <a href="admin-upload-homepage-images.php" class="side-menu-link">Upload Homepage Images</a>
          </li>
          <li>
            <a href="admin-delete-homepage-images.php" class="side-menu-link">Delete Homepage Images</a>
          </li>
        </div>

        <li id='partners-logos-btn' style='cursor:pointer'><a class='side-menu-link'>Partners Logo Images</a></li>
        <div id='partners-logos' class='d-none ml-4'>
          <li>
            <a href="admin-upload-logos-images.php" class="side-menu-link">Upload Partner Images</a>
          </li>
          <li>
            <a href="admin-delete-logos-images.php" class="side-menu-link">Delete Partner Images</a>
          </li>
        </div>

        <li id='upload-courses-btn' style='cursor:pointer'><a class='side-menu-link'>Upload Courses</a></li>
        <div id="upload-courses" class="d-none ml-4">
          <li>
            <a href="/admin/control_courses/upload-course.php?course=sys_course" class="side-menu-link">Upload Course</a>
          </li>
          <li><a href="/admin/control_courses/upload-course.php?course=sys_seminars" class="side-menu-link">Upload Seminar & Conferences</a>
          </li>
          <li>
            <a href="/admin/control_courses/upload-course.php?course=sys_professional_cert" class="side-menu-link">Upload Professional Certification</a>
          </li>
          <li>
            <a href="/admin/control_courses/upload-course.php?course=sys_special_programmes" class="side-menu-link">Upload Special Programmes</a>
          </li>
          <li>
            <a href="/admin/control_courses/upload-course.php?course=sys_trade_missions" class="side-menu-link">Upload Trade Missions</a>
          </li>
          <li>
            <a href="/admin/control_courses/upload-course.php?course=consulting_services" class="side-menu-link">Upload Consulting Services</a>
          </li>
          <li>
            <a href="/admin/control_courses/upload-course.php?course=trade_shows" class="side-menu-link">Upload Trade Shows</a>
          </li>
          <li>
            <a href="/admin/control_courses/upload-course.php?course=global_network" class="side-menu-link">Upload Global Network</a>
          </li>
          <li>
            <a href="/admin/control_courses/upload-course.php?course=products" class="side-menu-link">Upload Products</a>
          </li>
          <li>
            <a href="/admin/control_courses/upload-course.php?course=in_house" class="side-menu-link">Upload In House</a>
          </li>
          <li>
            <a href="/admin/control_courses/upload-course.php?course=export_coaching" class="side-menu-link">Upload Export Coaching</a>
          </li>
        </div>

        <li id='csr-events-btn' style='cursor:pointer'><a class='side-menu-link'>Upload CSR Events</a></li>
        <div id='csr-events' class='d-none ml-4'>
          <li>
            <a href="admin-add-csr-category.php" class="side-menu-link">Add CSR Event</a>
          </li>
          <li>
            <a href="admin-upload-csr-images.php" class="side-menu-link">Add CSR images to Event</a>
          </li>
        </div>

        <li id='gallery-events-btn' style='cursor:pointer'><a class='side-menu-link'>Upload Gallery Events</a></li>
        <div id='gallery-events' class='d-none ml-4'>
          <li>
            <a href="admin-add-gallery-category.php" class="side-menu-link">Add Gallery Event</a>
          </li>
          <li>
            <a href="admin-upload-gallery-images.php" class="side-menu-link">Add Gallery images to Event</a>
          </li>
        </div>

        <li id='our-achievements-events-btn' style='cursor:pointer'><a class='side-menu-link'>Upload Our
            Achievements</a></li>
        <div id='our-achievements-events' class='d-none ml-4'>
          <li>
            <a href="admin-add-our-achievements-category.php" class="side-menu-link">Add Our Achievements Event</a>
          </li>
          <li>
            <a href="admin-upload-our-achievements-images.php" class="side-menu-link">Add Our Achievements images to
              Event</a>
          </li>
        </div>

        <li id='our-management-events-btn' style='cursor:pointer'><a class='side-menu-link'>Upload Our Management</a>
        </li>
        <div id='our-management-events' class='d-none ml-4'>
          <li>
            <a href="admin-add-our-management-category.php" class="side-menu-link">Add Our Management</a>
          </li>
          <li>
            <a href="admin-upload-our-management-images.php" class="side-menu-link">Add Our Management images</a>
          </li>
        </div>

        <li id='mexa-tv-events-btn' style='cursor:pointer'><a class='side-menu-link'>Upload MEXA TV Events</a></li>
        <div id='mexa-tv-events' class='d-none ml-4'>
          <li>
            <a href="admin-add-mexa-tv-category.php" class="side-menu-link">Add MEXA TV Event</a>
          </li>
          <li>
            <a href="admin-upload-mexa-tv-videos.php" class="side-menu-link">Add MEXA TV Videos to Event</a>
          </li>
        </div>

        <li id='courses-groups-btn' style='cursor:pointer'><a class='side-menu-link'>Control Groups</a></li>
        <div id='courses-groups' class="d-none ml-4">
          <li>
            <a href="/admin/groups/add-courses-groups.php" class="side-menu-link">Add group</a>
          </li>

          <li>
            <a href="/admin/groups/edit-courses-groups.php" class="side-menu-link">Edit group</a>
          </li>

          <li>
            <a href="/admin/groups/delete-courses-groups.php" class="side-menu-link">Delete group</a>
          </li>
        </div>

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
  const dropDownIDs = ['upload-courses', 'csr-events', 'all-csr-events',
    'homepage-slider', 'partners-logos', 'all-gallery-events',
    'gallery-events', 'all-our-achievements', 'our-achievements-events',
    'all-mexa-tv', 'mexa-tv-events', 'our-management-events', 'all-our-management', 'courses-groups', 'all-courses'
  ];

  dropDownIDs.forEach((item) => {
    document.getElementById(item + '-btn').addEventListener('click', function() {
      document.getElementById(item).classList.toggle('d-none');
    })
  })
</script>
