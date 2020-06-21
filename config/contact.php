<!DOCTYPE html>
<html class="no-js">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>KayzMark - Official Website</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <meta http-equiv="refresh" content="5;url=http://www.kayzmark.github.io/" />

    <link rel="stylesheet" href="css/uikit.min.css" />
    <link rel="stylesheet" href="css/custom.css" />
    <link rel="shortcut icon" href="img/logo.jpg">
    <script src="js/uikit.min.js"></script>
    <script src="js/uikit-icons.min.js"></script>
    <link rel="shortcut icon" href="/img/logo.jpg">
  </head>
  <body>
    <style media="screen" type="text/css">
      body {
        height: 300px;
        width: 600px;

        position: fixed;
        top: 50%;
        left: 50%;
        margin-top: -100px;
        margin-left: -200px;
    }
      }
    </style>
    <?php
      $from = 'A Visitor<contact@kayzmark.com>';
      $sendTo = 'Kukorimam Markus<kukorimam@live.com>';
      $subject = 'Website Contact Form';
      $fields = array('name' => 'Name', 'email' => 'Email', 'message' => 'Message'); // array variable name => Text to appear in email
      $okMessage = '<h3>Contact form successfully submitted. Thank you, I will get back to you soon!</h3><br/><p>Page will redirect in 5 secs...</p>';
      $errorMessage = '<h3>There was an error while submitting the form. Please try again later</h3><br/><p>Page will redirect in 5 secs...</p>';

      try
      {
        $emailText = "";
        foreach ($_POST as $key => $value) {
          if (isset($fields[$key])) {
            $emailText .= "$fields[$key]: $value\n";
          }
        }

        mail($sendTo, $subject, $emailText, "From: " . $from);

        $responseArray = array('type' => 'success', 'message' => $okMessage);
      }
      catch (\Exception $e)
      {
        $responseArray = array('type' => 'danger', 'message' => $errorMessage);
      }

      if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
        $encoded = json_encode($responseArray);

        header('Content-Type: application/json');

        echo $encoded;
      }
      else {
        echo $responseArray['message'];
      }
    ?>
  </body>
</html>
