<?php
/**
 * User: nemishkor
 * Date: 15.03.20
 * Time: 17:28
 */

namespace Nemishkor\Wayforpay\DependencyInjection;


use Exception;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;
use Symfony\Component\Config\FileLocator;

class WayforpayExtension extends Extension{

    /**
     * Loads a specific configuration.
     *
     * @param array $configs
     * @param ContainerBuilder $container
     * @throws Exception
     */
    public function load(array $configs, ContainerBuilder $container) {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);
        $container->setParameter('wayforpay.merchantSecretKey', $config['merchantSecretKey']);
        $container->setParameter('wayforpay.merchantAccount', $config['merchantAccount']);
        $container->setParameter('wayforpay.merchantDomainName', $config['merchantDomainName']);

        $loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__ . '/../Resources/config'));
        $loader->load('services.yaml');
    }
}
