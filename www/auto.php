<?php
echo "Building docker images";
echo shell_exec("curl -X POST http://auto:11c2b82cd6caa3c9a53036d127ce5064c9@192.168.86.27:8083/job/dockerPreBuild/build?token=SKLDjflekjrtlk4j3lkjslkj4lk3PEKDG");
?>
<script type="text/javascript">
 function closeWindow() {
    setTimeout(function() {
    window.close();
    }, 2000);
    }
    window.onload = closeWindow();
    </script>
