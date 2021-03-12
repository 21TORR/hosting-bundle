<?php
declare(strict_types=1);

namespace Torr\Hosting;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\ExtensionInterface;
use Symfony\Component\HttpKernel\Bundle\Bundle;
use Torr\BundleHelpers\Bundle\ConfigurableBundleExtension;
use Torr\Hosting\DependencyInjection\HostingBundleConfiguration;
use Torr\Hosting\Tier\HostingTier;

final class HostingBundle extends Bundle
{
	/**
	 * @inheritDoc
	 */
	public function getContainerExtension() : ExtensionInterface
	{
		return new ConfigurableBundleExtension(
			$this,
			new HostingBundleConfiguration(),
			static function (array $config, ContainerBuilder $container) : void
			{
				$container->getDefinition(HostingTier::class)
					->setArgument('$currentTier', $config["tier"]);
			}
		);
	}

	/**
	 * @inheritDoc
	 */
	public function getPath()
	{
		return \dirname(__DIR__);
	}
}
