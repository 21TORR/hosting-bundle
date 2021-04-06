<?php
declare(strict_types=1);

namespace Tests\Torr\Hosting\Git\Data;

use PHPUnit\Framework\TestCase;
use Torr\Hosting\Git\Data\InstalledGitCommit;

final class InstalledGitCommitTest extends TestCase
{
	public function provideFromArray () : iterable
	{
		yield [["commit" => "test", "tag" => "1.0.0"], new InstalledGitCommit("test", "1.0.0")];
		yield [["commit" => "test", "tag" => null], new InstalledGitCommit("test", null)];
		yield [["commit" => "test", "tag" => "1.0.0", "additional_entries" => "allowed"], new InstalledGitCommit("test", "1.0.0")];
		yield [[], null];
	}

	/**
	 * @dataProvider provideFromArray
	 */
	public function testFromArray (array $data, ?InstalledGitCommit $expected) : void
	{
		$actual = InstalledGitCommit::fromArray($data);
		self::assertEquals($expected, $actual);
	}
}
