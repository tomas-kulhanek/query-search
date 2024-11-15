<?php
declare(strict_types=1);

namespace TomasKulhanek\QuerySearch\Params;

class RequestParams implements RequestParamsInterface
{
    /** @var list<FilterInterface> */
    protected array $filters = [];

    /** @var list<SortInterface> */
    protected array $sorts = [];

    protected PaginationInterface $pagination;

    public function addFilter(FilterInterface $filter): void
    {
        $this->filters[] = $filter;
    }

    public function hasFilter(): bool
    {
        return $this->filters !== [];
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
        return $this->sorts !== [];
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
        return $this->pagination->getLimit() !== null || $this->pagination->getOffset() !== null;
    }

    public function getPagination(): PaginationInterface
    {
        return $this->pagination;
    }
}
