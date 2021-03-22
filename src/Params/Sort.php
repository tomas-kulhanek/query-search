<?php declare(strict_types=1);

namespace TomasKulhanek\QuerySearch\Params;

class Sort implements SortInterface
{

	public function __construct(protected string $field, protected string $direction = 'ASC')
	{
	}

	public function setField(string $field): void
	{
		$this->field = $field;
	}

	public function getField(): string
	{
		return $this->field;
	}

	public function setDirection(string $direction): void
	{
		$this->direction = $direction;
	}

	public function getDirection(): string
	{
		return strtoupper($this->direction);
	}
}
