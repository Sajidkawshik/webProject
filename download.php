<?php
$url='http://localhost/webProject/myqrcode/temporary.php?fname=kaw&lname=shik&con_add=&blood=m&contact=jnf&license=kfn&car=ekrfn';
$path="E:/save_qrcode/faltu1.jpg";
file_put_contents($path, file_get_contents($url));
?>