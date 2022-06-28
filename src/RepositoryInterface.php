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
namespace CodeMagpie\DDDContracts;

use CodeMagpie\SimpleQueryBuilder\AbstractSimpleQuery;

interface RepositoryInterface
{
    /**
     * @return AbstractAggregateRoot[]
     */
    public function findAll(AbstractSimpleQuery $query): array;

    public function find(AbstractSimpleQuery $query): ?AbstractAggregateRoot;

    /**
     * @throws RepositoryException
     */
    public function findOrFail(AbstractSimpleQuery $query): AbstractAggregateRoot;

    public function save(AbstractAggregateRoot $aggregateRoot);

    /**
     * @param AbstractAggregateRoot[] $aggregateRoots
     */
    public function batchSave(array $aggregateRoots);

    public function delete($id);

    public function deleteAll(array $ids);
}
