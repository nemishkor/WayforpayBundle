<?php
/**
 * User: nemishkor
 * Date: 22.03.20
 */

declare(strict_types=1);


namespace Nemishkor\Wayforpay\ObjectValues\Order;


use DateTime;

class Avia {

    /**
     * @var DateTime
     */
    private $departureDate;

    /**
     * Number of points of transfer
     *
     * @var int
     */
    private $locationNumber;

    /**
     * Airport codes
     *
     * @var string
     */
    private $locationCodes;

    /**
     * @var string
     */
    private $firstName;

    /**
     * @var string
     */
    private $lastName;

    /**
     * @var string
     */
    private $reservationCode;

    public function __construct(
        DateTime $departureDate,
        int $locationNumber,
        string $locationCodes,
        string $firstName,
        string $lastName,
        string $reservationCode
    ) {
        $this->departureDate = $departureDate;
        $this->locationNumber = $locationNumber;
        $this->locationCodes = $locationCodes;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->reservationCode = $reservationCode;
    }

}
