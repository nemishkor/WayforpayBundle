<?php
/**
 * User: nemishkor
 * Date: 22.05.20
 */

namespace Nemishkor\Wayforpay\ObjectValues\Order;


interface ContactInterface {

    /**
     * @return string
     */
    public function getFirstName(): string;

    /**
     * @return string
     */
    public function getLastName(): string;

    /**
     * @return string
     */
    public function getAddress(): string;

    /**
     * @return string
     */
    public function getCity(): string;

    /**
     * @return string
     */
    public function getState(): string;

    /**
     * @return string
     */
    public function getZipCode(): string;

    /**
     * @return string
     */
    public function getCountry(): string;

    /**
     * @return string|null
     */
    public function getEmail(): ?string;

    /**
     * @return string|null
     */
    public function getPhone(): ?string;

}
