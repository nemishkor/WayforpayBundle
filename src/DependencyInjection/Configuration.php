<?php
/**
 * User: nemishkor
 * Date: 15.03.20
 * Time: 17:22
 */

namespace nemishkor\WayForPay\DependencyInjection;


use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface {

    /**
     * Generates the configuration tree builder.
     *
     * @return TreeBuilder The tree builder
     */
    public function getConfigTreeBuilder() {
        return new TreeBuilder('wayforpay');
    }

}
