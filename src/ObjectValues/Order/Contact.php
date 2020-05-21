<?php
/**
 * User: nemishkor
 * Date: 22.03.20
 */

declare(strict_types=1);


namespace Nemishkor\Wayforpay\ObjectValues\Order;


class Contact implements ContactInterface {

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
    private $address;

    /**
     * @var string
     */
    private $city;

    /**
     * State/region
     *
     * @var string
     */
    private $state;

    /**
     * Postal code
     *
     * @var string
     */
    private $zipCode;

    /**
     * Country in digital ISO 3166-1-Alpha 3
     *
     * @var string
     */
    private $country;

    /**
     * @var string|null
     */
    private $email;

    /**
     * @var string|null
     */
    private $phone;

    public function __construct(
        string $firstName,
        string $lastName,
        string $address,
        string $city,
        string $state,
        string $zipCode,
        string $country,
        ?string $email,
        ?string $phone
    ) {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->address = $address;
        $this->city = $city;
        $this->state = $state;
        $this->zipCode = $zipCode;
        $this->country = $country;
        $this->email = $email;
        $this->phone = $phone;
    }

    /**
     * @return string
     */
    public function getFirstName(): string {
        return $this->firstName;
    }

    /**
     * @return string
     */
    public function getLastName(): string {
        return $this->lastName;
    }

    /**
     * @return string
     */
    public function getAddress(): string {
        return $this->address;
    }

    /**
     * @return string
     */
    public function getCity(): string {
        return $this->city;
    }

    /**
     * @return string
     */
    public function getState(): string {
        return $this->state;
    }

    /**
     * @return string
     */
    public function getZipCode(): string {
        return $this->zipCode;
    }

    /**
     * @return string
     */
    public function getCountry(): string {
        return $this->country;
    }

    /**
     * @return string|null
     */
    public function getEmail(): ?string {
        return $this->email;
    }

    /**
     * @return string|null
     */
    public function getPhone(): ?string {
        return $this->phone;
    }

}
