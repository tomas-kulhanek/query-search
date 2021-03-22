<?php declare(strict_types=1);

namespace TomasKulhanek\QuerySearch\Params;

interface RequestParamsInterface
{
	public function hasFilter(): bool;

	/**
	 * @return FilterInterface[]
	 */
	public function getFilters(): array;

	public function hasSort(): bool;

	/**
	 * @return SortInterface[]
	 */
	public function getSorts(): array;

	public function hasPagination(): bool;

	public function getPagination(): PaginationInterface;

}
