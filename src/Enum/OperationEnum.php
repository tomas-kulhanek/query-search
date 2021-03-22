<?php declare(strict_types=1);

namespace TomasKulhanek\QuerySearch\Enum;

use Consistence\Enum\Enum;

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

}
