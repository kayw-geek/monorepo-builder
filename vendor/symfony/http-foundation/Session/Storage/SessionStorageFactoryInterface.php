<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace MonorepoBuilder20211023\Symfony\Component\HttpFoundation\Session\Storage;

use MonorepoBuilder20211023\Symfony\Component\HttpFoundation\Request;
/**
 * @author Jérémy Derussé <jeremy@derusse.com>
 */
interface SessionStorageFactoryInterface
{
    /**
     * Creates a new instance of SessionStorageInterface.
     * @param \Symfony\Component\HttpFoundation\Request|null $request
     */
    public function createStorage($request) : \MonorepoBuilder20211023\Symfony\Component\HttpFoundation\Session\Storage\SessionStorageInterface;
}
