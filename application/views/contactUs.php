<div class="about-us" id="contact">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="post_outer ">
        <span class="post_loader show"></span>
      </div>
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Contact Us</h5>
      </div>
      <div class="modal-body">
        <p>Contact us here.</p>
        <form class="newsletter_form">
          <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" id="email_contact" class="form-control" placeholder="Enter email address">
            <span id="email_contacterror" style="color:red;"></span>
          </div>
          <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" id="name" class="form-control" placeholder="Enter Name">
            <span id="nameerror" style="color:red;"></span>
          </div>
          <div class="form-group">
            <label>Phone</label>
            <input type="text" name="phone" id="phone" class="form-control" placeholder="Enter Phone Number">
            <span id="phoneerror" style="color:red;"></span>
          </div>
          <div class="form-group">
            <label>Contact Type</label>
            <input type="text" name="contact_type" id="contact_type" class="form-control" value="Contact" readonly>
            <span id="contact_typeerror" style="color:red;"></span>
          </div>
          <div class="form-group">
            <label>Description</label>
            <textarea class="form-control" name="description" id="description"></textarea>
          </div>
          <button type="button" onclick="submitContactUs()">Send</button>
        </form>
        <script type="application/ld+json">
          {
            "@context": "http://schema.org",
            "@type": "WebPage",
            "name": "Contact Us",
            "description": "Contact us here.",
            "url": "",
            "speakable": {
              "@type": "SpeakableSpecification",
              "xpath": [
                "/html/head/title",
                "/html/head/meta[@name='description']/@content"
              ]
            }
          }
        </script>
      </div>
    </div>
  </div>
</div>
