<?php

declare(strict_types=1);

namespace TomasKulhanek\QuerySearch\Enum;

enum OperationEnum: string
{
    case START_WITH = ':~';
    case END_BY = '~:';
    case LIKE = '~';
    case NOT_LIKE = '!~';
    case BIGGER_THAN = '<';
    case LOWER_THAN = '>';
    case BIGGER_OR_EQUAL = '<:';
    case LOWER_OR_EQUAL = '>:';
    case EQUAL = ':';
    case NOT_EQUAL = '!:';
}
