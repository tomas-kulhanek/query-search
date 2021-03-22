<?php declare(strict_types=1);

namespace TomasKulhanek\QuerySearch\Enum;

use Consistence\Enum\Enum;
use TomasKulhanek\QuerySearch\Exception\UnknownOperatorException;

class OperationEnum extends Enum
{

	public const START_WITH = ':~';
	public const END_BY = '~:';
	public const LIKE = '~';
	public const NOT_LIKE = '!~';
	public const BIGGER_THAN = '<';
	public const LOWER_THAN = '>';
	public const BIGGER_OR_EQUAL = '<:';
	public const LOWER_OR_EQUAL = '>:';
	public const EQUAL = ':';
	public const NOT_EQUAL = '!:';

	/**
	 * @return string
	 * @throws UnknownOperatorException
	 */
	public function getDatabaseOperator(): string
	{
		switch ($this->getValue()) {
			case self::START_WITH:
			case self::END_BY:
			case self::LIKE:
				return 'LIKE';
			case self::NOT_LIKE:
				return 'NOT LIKE';
			case self::BIGGER_THAN:
				return '<';
			case self::LOWER_THAN:
				return '>';
			case self::BIGGER_OR_EQUAL:
				return '<=';
			case self::LOWER_OR_EQUAL:
				return '>=';
			case self::EQUAL:
				return '=';
			case self::NOT_EQUAL:
				return '!=';
		}

		throw new UnknownOperatorException(sprintf(
			'Unknown %s filter operator. Possible are "%s"',
			$this->getValue(),
			implode('", "', (array) self::getAvailableValues())
		));
	}

}
