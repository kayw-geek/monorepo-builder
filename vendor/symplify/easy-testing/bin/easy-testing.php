<?php

declare (strict_types=1);
namespace MonorepoBuilder20210915;

use MonorepoBuilder20210915\Symplify\EasyTesting\HttpKernel\EasyTestingKernel;
use MonorepoBuilder20210915\Symplify\SymplifyKernel\ValueObject\KernelBootAndApplicationRun;
$possibleAutoloadPaths = [
    // dependency
    __DIR__ . '/../../../autoload.php',
    // after split package
    __DIR__ . '/../vendor/autoload.php',
    // monorepo
    __DIR__ . '/../../../vendor/autoload.php',
];
foreach ($possibleAutoloadPaths as $possibleAutoloadPath) {
    if (\file_exists($possibleAutoloadPath)) {
        require_once $possibleAutoloadPath;
        break;
    }
}
$kernelBootAndApplicationRun = new \MonorepoBuilder20210915\Symplify\SymplifyKernel\ValueObject\KernelBootAndApplicationRun(\MonorepoBuilder20210915\Symplify\EasyTesting\HttpKernel\EasyTestingKernel::class);
$kernelBootAndApplicationRun->run();
