<?php
session_start();
session_destroy();

header("Location: ".ADDRESS_ADMIN); //ส่งไปยังหน้าที่ตอ้งการ  


?>