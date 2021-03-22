<?php declare(strict_types=1);

namespace TomasKulhanek\QuerySearch\Params;

class RequestParams implements RequestParamsInterface
{
	/** @var FilterInterface[] */
	protected array $filters = [];

	/** @var SortInterface[] */
	protected array $sorts = [];

	protected PaginationInterface $pagination;

	public function addFilter(FilterInterface $filter): void
	{
		$this->filters[] = $filter;
	}

	public function hasFilter(): bool
	{
		return (bool) count($this->filters);
	}

	public function getFilters(): array
	{
		return $this->filters;
	}

	public function addSort(SortInterface $sort): void
	{
		$this->sorts[] = $sort;
	}

	public function hasSort(): bool
	{
		return (bool) count($this->sorts);
	}

	public function getSorts(): array
	{
		return $this->sorts;
	}

	public function addPagination(PaginationInterface $pagination): void
	{
		$this->pagination = $pagination;
	}

	public function hasPagination(): bool
	{
		return $this->pagination !== null;
	}

	public function getPagination(): PaginationInterface
	{
		return $this->pagination;
	}

}
