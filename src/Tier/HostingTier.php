<?php
declare(strict_types=1);

namespace Torr\Hosting\Tier;

final class HostingTier
{
	private const TIER_DEVELOPMENT = "development";
	private const TIER_STAGING = "staging";
	private const TIER_PRODUCTION = "production";
	private string $currentTier;

	/**
	 */
	public function __construct (string $currentTier)
	{
		$this->currentTier = $currentTier;
	}

	/**
	 * @return string[]
	 */
	public static function getAllowedTiers () : array
	{
		return [
			self::TIER_DEVELOPMENT,
			self::TIER_STAGING,
			self::TIER_PRODUCTION,
		];
	}

	/**
	 */
	public function isDevelopment () : bool
	{
		return self::TIER_DEVELOPMENT === $this->currentTier;
	}

	/**
	 */
	public function isStaging () : bool
	{
		return self::TIER_STAGING === $this->currentTier;
	}


	/**
	 */
	public function isProduction () : bool
	{
		return self::TIER_PRODUCTION === $this->currentTier;
	}
}
