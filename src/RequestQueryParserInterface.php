<?php
declare(strict_types=1);

namespace TomasKulhanek\QuerySearch;

use Symfony\Component\HttpFoundation\Request;
use TomasKulhanek\QuerySearch\Params\RequestParamsInterface;

interface RequestQueryParserInterface
{
    public function parse(Request $request): RequestParamsInterface;
}
