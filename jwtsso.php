// Using JWT from PHP requires you to first either install the JWT PEAR package from
// http://pear.php.net/pepr/pepr-proposal-show.php?id=688 or get the JWT project
// from https://github.com/firebase/php-jwt on GitHub.

<?php
include_once "Authentication/JWT.php";
// Log your user in.
$key       = "b671e3c582490fece499aa947c593abcf8388ec6b999073a";
$subdomain = "wearesolution";
$now       = time();
$token = array(
  "jti"   => md5($now . rand()),
  "iat"   => $now,
  "name"  => $user->name,
  "email" => $user->email
);
$jwt = JWT::encode($token, $key);
$location = "https://" . $subdomain . ".zendesk.com/access/jwt?jwt=" . $jwt;
if(isset($_GET["return_to"])) {
  $location .= "&return_to=" . urlencode($_GET["return_to"]);
}
// Redirect
header("Location: " . $location);
?>