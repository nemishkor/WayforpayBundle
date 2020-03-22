<?php
/**
 * User: nemishkor
 * Date: 22.03.20
 */

declare(strict_types=1);


namespace Nemishkor\Wayforpay\Validator\Order;


use Symfony\Component\Validator\Constraint;

/**
 * Class HoldTimeout
 * @package Nemishkor\Wayforpay\Validator\Order
 * @Annotation()
 */
class HoldTimeout extends Constraint {

    public $notInRangeMessage = 'This value should be between {{ min }} and {{ max }}.';

}
