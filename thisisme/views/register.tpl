<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Register form</title>
  <meta name="viewport" content="user-scalable=0, width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <link rel="icon" href="http://www.favicon.cc/logo3d/550296.png">
  <link rel="stylesheet" href="./assets/css/register.css">
</head>

<body>
<form id="msform" action='./processes/registratie-process.php' method='post'>
  <!-- fieldsets -->
  <fieldset>
    <h2 class="fs-title">Create your account</h2>
    <input type="text" name="username" placeholder="Username" data-validation="length" data-validation-length="4-50"/>
    <input type="text" name="email" placeholder="Email" data-validation="email"/>
    <input type="text" name="voornaam" placeholder="Firstname" data-validation="length alphanumeric" data-validation-length="2-50" data-validation-allowing=" .'"/>
    <input type="text" name="achternaam" placeholder="Lastname" data-validation="length alphanumeric" data-validation-length="2-50" data-validation-allowing=" .'"/>
    <input type="password" name="password" placeholder="Password" data-validation="length" data-validation-length="6-50" />
    <input type="password" name="cpass" placeholder="Confirm Password" data-validation="confirmation" data-validation-confirm="password"/>
    <input type="submit" name="submit" class="submit action-button" value="Submit" />
    <p class="fs-subtitle">Already have an account? <a href="./login.php">Login</a></p>
    <p class="fs-subtitle"><a href="./index.php">Back home</a></p>
  </fieldset>
</form>
</body>
  <script src="./assets/js/js/3.1.1.jquery.min.js"></script>
  <script src="./assets/js/js/jquery.easing.min.js"></script>
  <script src='./assets/js/login.js'></script>
  <script src="./assets/js/js/validation.js"></script>
  <script>
  $.validate({
    lang: 'en',
    modules : 'security'
  });
</script>
</html>
