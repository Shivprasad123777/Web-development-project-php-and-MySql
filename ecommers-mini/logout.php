<?php
session_start(); // सेशन सुरू करा

// सर्व सेशन व्हेरिएबल्स काढून टाका
session_unset();

// सेशन पूर्णपणे नष्ट करा
session_destroy();

// युजरला लॉगिन पेजवर परत पाठवा
header("Location: login.php");
exit();
?>