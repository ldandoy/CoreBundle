<?php

<<<<<<< HEAD
namespace StartPack\FrontBundle\DependencyInjection;
=======
namespace StartPack\CoreBundle\DependencyInjection;
>>>>>>> 6d4e0cf813f45af83d5553f0a2067935f11eb189

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html#cookbook-bundles-extension-config-class}
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritDoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
<<<<<<< HEAD
        $rootNode = $treeBuilder->root('front');
=======
        $rootNode = $treeBuilder->root('core');
>>>>>>> 6d4e0cf813f45af83d5553f0a2067935f11eb189

        // Here you should define the parameters that are allowed to
        // configure your bundle. See the documentation linked above for
        // more information on that topic.

        return $treeBuilder;
    }
}
