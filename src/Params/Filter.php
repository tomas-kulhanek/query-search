<?php
declare(strict_types=1);

namespace TomasKulhanek\QuerySearch\Params;

use TomasKulhanek\QuerySearch\Enum\OperationEnum;

class Filter implements FilterInterface
{

    public function __construct(
        protected string $field,
        protected OperationEnum $operator,
        protected string $value,
        protected bool $startWithAsterisk = false,
        protected bool $endWithAsterisk = false
    ) {
    }

    public function setField(string $field): void
    {
        $this->field = $field;
    }

    public function getField(): string
    {
        return $this->field;
    }

    public function setOperator(OperationEnum $operator): void
    {
        $this->operator = $operator;
    }

    public function getOperator(): OperationEnum
    {
        return $this->operator;
    }

    public function setValue(string $value): void
    {
        $this->value = $value;
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function isStartWithAsterisk(): bool
    {
        return $this->startWithAsterisk;
    }

    public function isEndWithAsterisk(): bool
    {
        return $this->endWithAsterisk;
    }
}
