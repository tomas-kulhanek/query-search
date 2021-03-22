<?php declare(strict_types=1);

namespace TomasKulhanek\QuerySearch\Params;

interface PaginationInterface
{
    public function getOffset(): ?int;

    public function getLimit(): ?int;
}
