<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="style3.css?v=<?php echo time(); ?>">
</head>
<body>
    <form action="#" method="post">
        <h1>Contact With GRIP Bank
        
        </h1>
        <p>Please take a moment to get in touch, we will get back to you shortly.<br><strong>Supported by spark foundation</strong></p>
      
        <div class="column">
          <label for="the-name">Your Name</label>
          <input type="text" name="name" id="the-name">
      
          <label for="the-email">Email Address</label>
          <input type="email" name="email" id="the-email">
      
          <label for="the-phone">Phone Number</label>
          <input type="tel" name="phone" id="the-phone">
      
          <label for="the-reason">How can we help you?</label>
          <select name="reason" id="the-reason">
          <option value="">Choose one</option>
          <option value="web">Money transfer failed services</option>
          <option value="video">Account create</option>
          <option value="3d">other reason</option>
        </select>
        </div>
        <div class="column">
          <label for="the-message">Message</label>
          <textarea name="message" id="the-message"></textarea>
          <label>
          <input type="checkbox" name="newsletter" value="yes"> Join our mailing list?
          </label>
          <input type="submit" value="Send Message">
        </div>
      </form>
      <p class="back"><a href="index.html">Back to Home page</a></p>
</body>
</html>