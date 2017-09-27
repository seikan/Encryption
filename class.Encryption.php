<?php

/**
 * Session: A very simple PHP encryption library.
 *
 * Copyright (c) 2017 Sei Kan
 *
 * Distributed under the terms of the MIT License.
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright  2017 Sei Kan <seikan.dev@gmail.com>
 * @license    http://www.opensource.org/licenses/mit-license.php The MIT License
 *
 * @see       https://github.com/seikan/Encryption
 */
class Encryption
{
	const CIPHER = MCRYPT_RIJNDAEL_128;
	const MODE = MCRYPT_MODE_CBC;

	/**
	 * Cryptographic key of length 16, 24 or 32.
	 *
	 * @var string
	 */
	private $key;

	/**
	 * Initialize encryption object.
	 *
	 * @param string $key
	 */
	public function __construct($key)
	{
		if (!in_array(strlen($key), [16, 24, 32])) {
			throw new Exception('Cryptographic key must be 16, 24, or 32 characters in length.');
		}
		$this->key = $key;
	}

	/**
	 * Encrypt a string.
	 *
	 * @param string $text
	 *
	 * @return string
	 */
	public function encrypt($text)
	{
		$iv = mcrypt_create_iv(mcrypt_get_iv_size(self::CIPHER, self::MODE), MCRYPT_DEV_RANDOM);
		$cipher = mcrypt_encrypt(self::CIPHER, $this->key, $text, self::MODE, $iv);

		return base64_encode($iv.$cipher);
	}

	/**
	 * Decrypt an encrypted string.
	 *
	 * @param string $chiper
	 *
	 * @return string
	 */
	public function decrypt($cipher)
	{
		$cipher = base64_decode($cipher);

		$ivSize = mcrypt_get_iv_size(self::CIPHER, self::MODE);

		if (strlen($cipher) < $ivSize) {
			throw new Exception('Missing initialization vector.');
		}

		return rtrim(mcrypt_decrypt(self::CIPHER, $this->key, substr($cipher, $ivSize), self::MODE, substr($cipher, 0, $ivSize)), "\0");
	}
}
