<form action="email_sent.php" method="post" autocomplete="on" name="frm_contact" class="contact">

  <div class="row">
    <div class="col-sm-12">

      <div class="row">
        <div class="col-sm-4">
          <p class="contact">Name</p>
          <input type="text" class="form-1" name="fname" placeholder="First Name"><br><br>
        </div>

        <div class="col-sm-4">
          <p class="contact">Email</p>
          <input type="text" class="form-1" name="email" placeholder="Email Address"><br><br>
        </div>

        <div class="col-sm-4">
          <p class="contact">Phone/Mobile</p>
          <input type="text" class="form-1" name="phone" placeholder="Phone / Mobile"><br><br>
        </div>


        <div class="col-sm-12">
          <p class="contact">Message</p>
          <textarea rows="4" cols="50" class="form-1" name="message"
                    placeholder="Write Us Your Question, Suggestions or Concern">
    </textarea>
        </div>
        <div class="center">
          <input type="submit" value="Send Message" onclick="return checking()" class="submit-form"/> <input
              type="hidden" name="send_message" value="frm_contact">
        </div>
      </div>
</form>