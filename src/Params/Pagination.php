<?php declare(strict_types=1);

namespace TomasKulhanek\QuerySearch\Params;

class Pagination implements PaginationInterface
{
	public function __construct(protected ?int $limit = null, protected ?int $offset = null)
	{
	}

	public function setLimit(int $limit): void
	{
		$this->limit = $limit;
	}

	public function getLimit(): ?int
	{
		return $this->limit;
	}

	public function setOffset(int $offset): void
	{
		$this->offset = $offset;
	}

	public function getOffset(): ?int
	{
		return $this->offset;
	}
}
