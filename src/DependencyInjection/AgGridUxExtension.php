<?php
namespace Odb\AgGridUxBundle\DependencyInjection;

use Odb\AgGridUxBundle\Builder\AgGridBuilder;
use Odb\AgGridUxBundle\Builder\AgGridBuilderInterface;
use Odb\AgGridUxBundle\Twig\AgGridExtension;
use Symfony\Component\AssetMapper\AssetMapperInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Definition;
use Symfony\Component\DependencyInjection\Extension\PrependExtensionInterface;
use Symfony\Component\DependencyInjection\Reference;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;

class AgGridUxExtension extends Extension implements PrependExtensionInterface
{
    public function load(array $configs, ContainerBuilder $container): void
    {
        $container
            ->setDefinition('aggrid.builder', new Definition(AgGridBuilder::class))
            ->setPublic(false);

        $container
            ->setAlias(AgGridBuilderInterface::class, 'aggrid.builder')
            ->setPublic(false);

        $container
            ->setDefinition('aggrid.twig_extension', new Definition(AgGridExtension::class))
            ->addArgument(new Reference('stimulus.helper'))
            ->addTag('twig.extension')
            ->setPublic(false);
    }

    public function prepend(ContainerBuilder $container)
    {
        if (!$this->isAssetMapperAvailable($container)) {
            return;
        }

        $container->prependExtensionConfig('framework', [
            'asset_mapper' => [
                'paths' => [
                    __DIR__ . '/../../assets/dist' => '@odb/ag-grid-ux-bundle',
                ],
            ],
        ]);
    }

    private function isAssetMapperAvailable(ContainerBuilder $container): bool
    {
        if (!interface_exists(AssetMapperInterface::class)) {
            return false;
        }

        // check that FrameworkBundle 6.3 or higher is installed
        $bundlesMetadata = $container->getParameter('kernel.bundles_metadata');
        if (!isset($bundlesMetadata['FrameworkBundle'])) {
            return false;
        }

        return is_file($bundlesMetadata['FrameworkBundle']['path'] . '/Resources/config/asset_mapper.php');
    }
}