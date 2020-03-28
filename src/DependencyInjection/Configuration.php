<?php
/**
 * User: nemishkor
 * Date: 15.03.20
 * Time: 17:22
 */

namespace Nemishkor\Wayforpay\DependencyInjection;


use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface {

    /**
     * Generates the configuration tree builder.
     *
     * @return TreeBuilder The tree builder
     */
    public function getConfigTreeBuilder() {
        $treeBuilder = new TreeBuilder('wayforpay');

        $treeBuilder
            ->getRootNode()
            ->children()
            ->scalarNode('merchantSecretKey')
                ->isRequired()
            ->end()
            ->scalarNode('merchantAccount')
                ->isRequired()
                ->defaultValue('test_merch_n1')
            ->end()
            ->scalarNode('merchantDomainName')
                ->isRequired()
                ->defaultValue('flk3409refn54t54t*FNJRET')
            ->end();

        return $treeBuilder;
    }

}
