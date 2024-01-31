<?php

declare(strict_types=1);

namespace TomasKulhanek\QuerySearch\Params;

use TomasKulhanek\QuerySearch\Enum\OperationEnum;

interface FilterInterface
{
    public function getField(): string;

    public function getOperator(): OperationEnum;

    public function getValue(): string;

    public function isStartWithAsterisk(): bool;

    public function isEndWithAsterisk(): bool;
}
