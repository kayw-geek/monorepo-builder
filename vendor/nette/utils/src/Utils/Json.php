<?php

/**
 * This file is part of the Nette Framework (https://nette.org)
 * Copyright (c) 2004 David Grudl (https://davidgrudl.com)
 */
declare (strict_types=1);
namespace MonorepoBuilder20211211\Nette\Utils;

use MonorepoBuilder20211211\Nette;
/**
 * JSON encoder and decoder.
 */
final class Json
{
    use Nette\StaticClass;
    public const FORCE_ARRAY = 0b1;
    public const PRETTY = 0b10;
    public const ESCAPE_UNICODE = 0b100;
    /**
     * Converts value to JSON format. The flag can be Json::PRETTY, which formats JSON for easier reading and clarity,
     * and Json::ESCAPE_UNICODE for ASCII output.
     * @param  mixed  $value
     * @throws JsonException
     */
    public static function encode($value, int $flags = 0) : string
    {
        $flags = ($flags & self::ESCAPE_UNICODE ? 0 : \JSON_UNESCAPED_UNICODE) | \JSON_UNESCAPED_SLASHES | ($flags & self::PRETTY ? \JSON_PRETTY_PRINT : 0) | (\defined('JSON_PRESERVE_ZERO_FRACTION') ? \JSON_PRESERVE_ZERO_FRACTION : 0);
        // since PHP 5.6.6 & PECL JSON-C 1.3.7
        $json = \json_encode($value, $flags);
        if ($error = \json_last_error()) {
            throw new \MonorepoBuilder20211211\Nette\Utils\JsonException(\json_last_error_msg(), $error);
        }
        return $json;
    }
    /**
     * Parses JSON to PHP value. The flag can be Json::FORCE_ARRAY, which forces an array instead of an object as the return value.
     * @return mixed
     * @throws JsonException
     */
    public static function decode(string $json, int $flags = 0)
    {
        $forceArray = (bool) ($flags & self::FORCE_ARRAY);
        $value = \json_decode($json, $forceArray, 512, \JSON_BIGINT_AS_STRING);
        if ($error = \json_last_error()) {
            throw new \MonorepoBuilder20211211\Nette\Utils\JsonException(\json_last_error_msg(), $error);
        }
        return $value;
    }
}
