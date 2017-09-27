# Encryption

This is a very simple PHP encryption library. You can use this library to encrypt or decrypt string with a 16, 24, 32 characters private key.



## Usage

### Getting Started

> \$encryption = new Encryption( **string** \$key );

```php
// Include core encryption library
require_once 'class.Encryption.php';

// Initialize encryption object
$encryption = new Encryption('bZKn8iklVOQr7eC8ONvnCeRFBJwWo1PG');
```



### Encrypt

Encrypts a string to secure it.

> \$encryption->encrypt( **string** $text );

```php
// Encrypt a string
$encrypted = $encryption->encrypt('Today is a good day!');

echo $encrypted;
```

**Result:**

```
xGTEyeluH9BqZtl4bBV+t1yXZPMUwrrTvKSN0b9/0uDiB1F6qkSShGfC9tUJDc9u
```



### Decrypt

Decrypts an encrypted chiper.

> **string** \$encryption->decrypt( **string** $chiper );

```php
$decrypted = $encryption->decrypt('xGTEyeluH9BqZtl4bBV+t1yXZPMUwrrTvKSN0b9/0uDiB1F6qkSShGfC9tUJDc9u');

echo $decrypted;
```

**Result:**

```
Today is a good day!
```

