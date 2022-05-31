<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace MonorepoBuilder20220531\Symfony\Component\DependencyInjection\Loader\Configurator;

use MonorepoBuilder20220531\Symfony\Component\DependencyInjection\Definition;
/**
 * @author Nicolas Grekas <p@tchwork.com>
 */
class InlineServiceConfigurator extends \MonorepoBuilder20220531\Symfony\Component\DependencyInjection\Loader\Configurator\AbstractConfigurator
{
    use Traits\ArgumentTrait;
    use Traits\AutowireTrait;
    use Traits\BindTrait;
    use Traits\CallTrait;
    use Traits\ConfiguratorTrait;
    use Traits\FactoryTrait;
    use Traits\FileTrait;
    use Traits\LazyTrait;
    use Traits\ParentTrait;
    use Traits\PropertyTrait;
    use Traits\TagTrait;
    public const FACTORY = 'service';
    /**
     * @var string
     */
    private $id = '[inline]';
    /**
     * @var bool
     */
    private $allowParent = \true;
    /**
     * @var string|null
     */
    private $path;
    public function __construct(\MonorepoBuilder20220531\Symfony\Component\DependencyInjection\Definition $definition)
    {
        $this->definition = $definition;
    }
}
