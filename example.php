<?php

require_once 'class.Encryption.php';

$privateKey = 'bZKn8iklVOQr7eC8ONvnCeRFBJwWo1PG';
$encryption = new Encryption($privateKey);

// Encrypt a string
$encrypted = $encryption->encrypt('Today is a good day!');

echo 'Encrypted: '.$encrypted.'<br />';

// Decrypt a chiper
$decrypted = $encryption->decrypt('tbXFhMQU2z+E/LdSy/8nd9r3I5eXzm5sm4bsNecTYL0JHZytlU9B3POXFlW+exnf');

echo 'Decrypted: '.$decrypted.'<br />';
