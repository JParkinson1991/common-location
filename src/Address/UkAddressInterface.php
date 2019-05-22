<?php
/**
 * @file
 * UkAddressInterface.php
 *
 * @author Josh Parkinson <joshua.parkinson@rchl.co.uk>
 */

namespace JParkinson1991\Common\Location\Address;

/**
 * Class UkAddressInterface
 *
 * @package JParkinson1991\Common\Location\Address
 */
interface UkAddressInterface
{
    /**
     * Returns the first line of the address
     *
     * @return string|null
     */
    public function getLineOne(): ?string;

    /**
     * Returns the second line of the address
     *
     * @return string|null
     */
    public function getLineTwo(): ?string;

    /**
     * Returns the third line of the address
     *
     * @return string|null
     */
    public function getLineThree(): ?string;

    /**
     * Returns the town/city of the address
     *
     * @return string|null
     */
    public function getTownCity(): ?string;

    /**
     * Returns the county of the address
     *
     * @return string|null
     */
    public function getCounty(): ?string;

    /**
     * Returns the postcode of the address
     *
     * @return string|null
     */
    public function getPostcode(): ?string;

    /**
     * Returns the country of the address
     *
     * @return string|null
     */
    public function getCountry(): ?string;
}
