<?php
/**
 * User: nemishkor
 * Date: 22.03.20
 */

declare(strict_types=1);


namespace Nemishkor\Wayforpay\Validator\Order;


use DateInterval;
use DateTimeImmutable;
use Exception;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Symfony\Component\Validator\Exception\UnexpectedTypeException;
use Symfony\Component\Validator\Exception\UnexpectedValueException;

class HoldTimeoutValidator extends ConstraintValidator {

    /**
     * Checks if the passed value is valid.
     *
     * @param mixed $value The value that should be validated
     * @param Constraint $constraint
     * @throws Exception
     */
    public function validate($value, Constraint $constraint) {

        if (empty($value)) {
            return;
        }

        if (!($value instanceof DateInterval)) {
            throw new UnexpectedValueException($value, DateInterval::class);
        }

        if(!($constraint instanceof HoldTimeout)){
            throw new UnexpectedTypeException($constraint, HoldTimeout::class);
        }

        $datetime = new DateTimeImmutable();
        $seconds = abs($datetime->getTimestamp() - $datetime->add($value)->getTimestamp());
        $max = 1728000; // 20 days
        $min = 60; // 1 minute

        if($seconds > $max || $seconds < $min){
            $this->context->buildViolation($constraint->notInRangeMessage);
        }

    }

}
