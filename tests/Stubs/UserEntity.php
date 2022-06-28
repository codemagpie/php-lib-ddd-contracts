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
namespace CodeMagpie\DDDContractsTest\Stubs;

use CodeMagpie\DDDContracts\AbstractEntity;

/**
 * @property int $id
 */
class UserEntity extends AbstractEntity
{
    public string $name;

    public string $age;
}
