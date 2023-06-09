<?php

echo hash(sha512, md5(hash(sha256, crypt($enpass,$salt))));

?>
