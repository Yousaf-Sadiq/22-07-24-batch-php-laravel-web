<?php
require_once dirname(__DIR__) . "/layouts/user/header.php";

session_destroy();

success_msg("logout Successfull");

refresh_url(2, LOGIN);

?>



<?php
require_once dirname(__DIR__) . "/layouts/user/footer.php";
;
?>