<?php
declare(strict_types=1);

namespace TomasKulhanek\QuerySearch\Params;

interface SortInterface
{
    public function getField(): string;

    public function getDirection(): string;
}
