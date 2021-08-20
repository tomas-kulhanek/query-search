<?php declare(strict_types=1);

namespace TomasKulhanek\QuerySearch;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\UnprocessableEntityHttpException;
use TomasKulhanek\QuerySearch\Enum\OperationEnum;
use TomasKulhanek\QuerySearch\Params\Filter;
use TomasKulhanek\QuerySearch\Params\Pagination;
use TomasKulhanek\QuerySearch\Params\RequestParams;
use TomasKulhanek\QuerySearch\Params\RequestParamsInterface;
use TomasKulhanek\QuerySearch\Params\Sort;

class RequestQueryParser implements RequestQueryParserInterface
{
	const SEPARATOR = ',';

	protected RequestParams $requestParams;

	public function __construct(
		private string $filterQueryName = 'q'
	)
	{
		$this->requestParams = new RequestParams();
	}

	public function parse(Request $request): RequestParamsInterface
	{
		$this->parseFilters($request);
		$this->parseSort($request);
		$this->parsePagination($request);

		return $this->requestParams;
	}

	protected function parseFilters(Request $request): void
	{
		if(!$request->query->has($this->filterQueryName)){
			return;
		}
		/** @var string $filters */
		$filters = $request->query->get($this->filterQueryName, '');
		if (empty($filters)) {
			return;
		}
		if (preg_match_all("/{$this->getPattern()}/m", $filters, $matches, PREG_SET_ORDER) === false) {
			throw new UnprocessableEntityHttpException('Filter must contains field and value!');
		}
		foreach ($matches as $filterData) {
			[, $field, $operator, $prefix, $value, $suffix] = $filterData;

			$this->requestParams->addFilter(new Filter(
				$field,
				$operator,
				$value,
				str_contains($prefix, '*'),
				str_contains($suffix, '*'),
			));
		}
	}

	protected function parseSort(Request $request): void
	{
	    /** @var string $sorts */
		$sorts = $request->query->get('sort', '');
		if (empty($sorts)) {
			return;
		}
		if (preg_match_all("/{$this->getPattern()}/m", $sorts, $matches, PREG_SET_ORDER) === false) {
			throw new UnprocessableEntityHttpException('Filter must contains field and value!');
		}
		foreach ($matches as $sortData) {
			[, $field, , , $direction] = $sortData;

			$this->requestParams->addSort(new Sort($field, $direction));
		}
	}

	protected function parsePagination(Request $request): void
	{
		if (!$request->query->has('limit')) {
			return;
		}
		$this->requestParams->addPagination(new Pagination(
			(int) $request->query->get('limit', '1'),
			(int) $request->query->get('offset', '1')
		));
	}

	protected function getPattern(): string
	{
		$implodedAvailableValues = implode('|', (array) OperationEnum::getAvailableValues());

		return "(\\w+(?:\\.\\w+)*?)" .
			"(" . $implodedAvailableValues . ")" .
			"(\\*?)((?!" . $implodedAvailableValues . "|" . self::SEPARATOR . "|\\*).+?)(\\*?)(" . self::SEPARATOR . "|$)";
	}


}
