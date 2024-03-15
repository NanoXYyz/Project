<?php
session_start();
session_unset();
session_destroy();

?>

<script type="text/javascript">
    alert('Selamat, anda berhasil Logout.')
    location.href = "index.php"
</script>