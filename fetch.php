<textarea style="position: absolute; top: 0; left: 0;width: 100%; min-height: 100%; resize: none; border: 0; background-color: #eee; font: 16px monospace; padding: 16px;" disabled="disabled">
<?php
$uid = substr(escapeshellcmd((string) $_GET["uid"]), 0, 8);
$res = shell_exec("sh /var/www/script.sh " . $uid . " 2>&1");
echo $res;
?>
</textarea>