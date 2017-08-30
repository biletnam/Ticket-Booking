<?php
$to = 'gauravdhranga@yahoo.com';
$subject = 'Test Mail';
$message = 'Hello World!';
$headers = 'From: gauravdhranga15@gmail.com' . "\r\n" .
'Reply-To: support@activelab.dev' . "\r\n" .
'X-Mailer: PHP/' . phpversion();
mail($to, $subject, $message, $headers);
?>