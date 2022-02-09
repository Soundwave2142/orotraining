<?php

namespace Training\Bundle\UserNamingBundle\DependencyInjection;

use Exception;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;

/**
 * @author Soundwave2142
 */
class TrainingUserNamingExtension extends Extension
{
    /** @var array */
    private array $loadYml = [
        'services.yml', 'controllers.yml', 'import_export.yml', 'processors.yml', 'integration.yml'
    ];

    /**
     * {@inheritDoc}
     * @throws Exception
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__ . '/../Resources/config'));

        foreach ($this->loadYml as $file) {
            $loader->load($file);
        }
    }
}
