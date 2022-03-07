<?php 
    print <<<_HTML_
        <form method="post" action="$_SERVER[PHP_SELF]">
        이름: <input type="text" name="user" />
    _HTML_;
?>