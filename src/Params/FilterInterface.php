<?php declare(strict_types=1);

namespace TomasKulhanek\QuerySearch\Params;

interface FilterInterface
{
	public function getField(): string;

	public function getOperator(): string;

	public function getValue(): string;

	public function isStartWithAsterisk(): bool;

	public function isEndWithAsterisk(): bool;
}
