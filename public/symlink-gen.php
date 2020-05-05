<?php

$linkName	= '/home/storage/b/4e/bb/datainfo/public_html/assinaturas/public';

$target 	= '/home/storage/b/4e/bb/datainfo/public_html/assinaturas/storage/app/public';

symlink($target, $linkName);

?>