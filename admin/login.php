<?php
require_once($_SERVER['DOCUMENT_ROOT'] ."/includes/init.php");
?>

<div class="background-image-login">

  <div class="container">
    <div class="row">
      <div class="col-sm-4"></div>

      <div class="col-sm-4">
        <div class="login-border">
          <form action="verify.php" method="post" autocomplete="on" name="frm_login">
            <h2 class="form-signin-heading">Login to your account</h2>
            <p class="login">Only for MEA Staff</p>

            <input id="email" class="form-control" name="txt_email" placeholder="Email Address" required="" autofocus />

            <div>
              <input type="password" class="form-control" id="pwd" name="txt_password" placeholder="Password" required="" />
            </div>
            <div class="show">
              <input type="checkbox" id="show-hide" name="show-hide" value="" />
              <label for="show-hide">Show password</label>
            </div>

            <input type="checkbox" value="remember-me" id="rememberMe" name="rememberMe"> Remember me
            </label>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
          </form>
        </div>
      </div>


      <div class="col-sm-4"></div>
    </div>
  </div>
</div>
</div>
</div>
</div>
</div>
</div>

<video playsinline autoplay muted loop poster="polina.jpg" id="bgvid">
  <source src="video.mp4" type="video/mp4">
</video>


<script>
  (function() {

    var PasswordToggler = function(element, field) {
      this.element = element;
      this.field = field;

      this.toggle();
    };

    PasswordToggler.prototype = {
      toggle: function() {
        var self = this;
        self.element.addEventListener("change", function() {
          if (self.element.checked) {
            self.field.setAttribute("type", "text");
          } else {
            self.field.setAttribute("type", "password");
          }
        }, false);
      }
    };

    document.addEventListener("DOMContentLoaded", function() {
      var checkbox = document.querySelector("#show-hide"),
        pwd = document.querySelector("#pwd"),
        form = document.querySelector(".show");

      form.addEventListener("submit", function(e) {
        e.preventDefault();
      }, false);

      var toggler = new PasswordToggler(checkbox, pwd);

    });

  })();
</script>

<?php
require_once($includes . 'footer.php');
?>
