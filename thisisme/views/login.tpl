<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="user-scalable=0, width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <title>Login form</title>
  <link rel="icon" href="http://www.favicon.cc/logo3d/550296.png">
      <link rel="stylesheet" href="./assets/css/register.css">

  
</head>

<body>
<form id="msform" action='./processes/login-process.php' method='post'>
  <fieldset>
    <h2 class="fs-title">Login</h2>
    <h3 class="fs-subtitle">Pease login</h3>
    <input type="text" name="username" placeholder="Username" data-validation="length" data-validation-length="2-50">
    <input type="password" name="password" placeholder="Password" data-validation="length" data-validation-length="4-50">
    <input type="submit" name="submit" class="submit action-button" value="Submit" />
    <p class="fs-subtitle">Need a account? <a href="./register.php">Register</a></p>
    <p class="fs-subtitle"><a href="./index.php">Back home</a></p>
  </fieldset>
</form>
  <script src="./assets/js/js/3.1.1.jquery.min.js"></script>
  <script src="./assets/js/js/validation.js"></script>
  <script>
  $.validate({
    lang: 'en',
    modules : 'security'
  });
</script>
</body>
</html>
