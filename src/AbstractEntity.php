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

use CodeMagpie\ArrayToObject\AbstractBaseObject;

abstract class AbstractEntity extends AbstractBaseObject
{
    /**
     * @var mixed
     */
    public $id;

    protected array $_originalData = [];

    public function __construct(array $data, array $originalData = [])
    {
        $this->_originalData = $originalData;
        parent::__construct($data);
    }

    public function getSaveData(array $keepKeys = [], array $filterKeys = []): array
    {
        $currentData = $this->toArray();
        unset($currentData['_originalData']);
        foreach ($filterKeys as $filterKey) {
            unset($currentData[$filterKey]);
        }
        $keepData = [];
        foreach ($keepKeys as $keepKey) {
            if (array_key_exists($keepKey, $currentData)) {
                $keepData[$keepKey] = $currentData[$keepKey];
                unset($currentData[$keepKey]);
            }
        }
        return array_merge(array_diff_assoc($currentData, $this->_originalData), $keepData);
    }
}
