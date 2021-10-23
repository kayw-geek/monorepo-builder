<?php

declare (strict_types=1);
namespace MonorepoBuilder20211023\Symplify\PackageBuilder\Console\Input;

use MonorepoBuilder20211023\Symfony\Component\Console\Input\ArgvInput;
/**
 * @api
 */
final class StaticInputDetector
{
    public static function isDebug() : bool
    {
        $argvInput = new \MonorepoBuilder20211023\Symfony\Component\Console\Input\ArgvInput();
        return $argvInput->hasParameterOption(['--debug', '-v', '-vv', '-vvv']);
    }
}
