<?php

declare(strict_types=1);
/**
 * This file is part of the codemagpie/ddd-contracts package.
 *
 * (c) CodeMagpie Lyf <https://github.com/codemagpie>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace CodeMagpie\DDDContractsTest;

use CodeMagpie\DDDContractsTest\Stubs\UserEntity;
use PHPUnit\Framework\TestCase;

/**
 * @internal
 * @coversNothing
 */
class TestAbstractEntity extends TestCase
{
    public function testGetSaveData(): void
    {
        $originData = ['id' => 1, 'name' => 'test', 'age' => 2];
        $user = new UserEntity(['id' => 1, 'name' => 'test', 'age' => 2], $originData);
        self::assertEquals([], $user->getSaveData());
        self::assertEquals(['id' => 1], $user->getSaveData(['id']));
        $user = new UserEntity(['id' => 1, 'name' => 'new', 'age' => 3], $originData);
        self::assertEquals(['name' => 'new', 'age' => 3], $user->getSaveData());
        self::assertEquals(['name' => 'new'], $user->getSaveData([], ['age']));
    }
}
