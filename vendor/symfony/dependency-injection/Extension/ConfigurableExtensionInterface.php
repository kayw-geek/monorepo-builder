<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace MonorepoBuilder202210\Symfony\Component\DependencyInjection\Extension;

use MonorepoBuilder202210\Symfony\Component\Config\Definition\ConfigurableInterface;
use MonorepoBuilder202210\Symfony\Component\DependencyInjection\ContainerBuilder;
use MonorepoBuilder202210\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
/**
 * @author Yonel Ceruto <yonelceruto@gmail.com>
 */
interface ConfigurableExtensionInterface extends ConfigurableInterface
{
    /**
     * Allows an extension to prepend the extension configurations.
     */
    public function prependExtension(ContainerConfigurator $container, ContainerBuilder $builder) : void;
    /**
     * Loads a specific configuration.
     */
    public function loadExtension(array $config, ContainerConfigurator $container, ContainerBuilder $builder) : void;
}
