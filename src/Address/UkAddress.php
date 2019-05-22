<?php
/**
 * @file
 * UkAddress.php
 *
 * @author Josh Parkinson <joshua.parkinson@rchl.co.uk>
 */

namespace JParkinson1991\Common\Location\Address;

/**
 * Class UkAddress
 *
 * @package JParkinson1991\Common\Location\Address
 */
class UkAddress implements UkAddressInterface
{
    /**
     * Array access constants
     *
     * Using these avoids the use of 'hand typed strings' when access this
     * object in an array or json representation
     */
    public const LINE_ONE = 'lineOne';
    public const LINE_TWO = 'lineTwo';
    public const LINE_THREE = 'lineThree';
    public const TOWN_CITY = 'townCity';
    public const COUNTY = 'county';
    public const POSTCODE = 'postcode';
    public const COUNTRY = 'country';

    /**
     * Line one of the address
     *
     * @var string|null
     */
    protected $lineOne;

    /**
     * Line two of the address
     *
     * @var string|null
     */
    protected $lineTwo;

    /**
     * Line three of the address
     *
     * @var string|null
     */
    protected $lineThree;

    /**
     * Town/City of the address
     *
     * @var string|null
     */
    protected $townCity;

    /**
     * County of the address
     *
     * @var string|null
     */
    protected $county;

    /**
     * Postcode of the address
     *
     * @var string|null
     */
    protected $postcode;

    /**
     * Country of the address
     *
     * Defaults to 'United Kingdom' set in constructor
     *
     * @var string
     */
    protected $country;

    /**
     * UkAddress constructor.
     *
     * @param string|null $lineOne
     * @param string|null $lineTwo
     * @param string|null $lineThree
     * @param string|null $townCity
     * @param string|null $county
     * @param string|null $country
     * @param string|null $postcode
     */
    public function __construct(
        ?string $lineOne = null,
        ?string $lineTwo = null,
        ?string $lineThree = null,
        ?string $townCity = null,
        ?string $county = null,
        ?string $postcode = null,
        ?string $country = null
    ) {
        $this->lineOne = (!empty($lineOne)) ? trim($lineOne, ', ') : null;
        $this->lineTwo = (!empty($lineTwo)) ? trim($lineTwo, ', ') : null;
        $this->lineThree = (!empty($lineThree)) ? trim($lineThree, ', ') : null;
        $this->townCity = (!empty($townCity)) ? trim($townCity, ', ') : null;
        $this->county = (!empty($county)) ? trim($county, ', ') : null;
        $this->postcode = (!empty($postcode)) ? trim($postcode, ', ') : null;
        $this->country = (!empty($country)) ? trim($country, ', ') : 'United Kingdom';
    }

    /**
     * Returns the first line of the address
     *
     * @return string|null
     */
    public function getLineOne(): ?string
    {
        return $this->lineOne;
    }

    /**
     * Returns the second line of the address
     *
     * @return string|null
     */
    public function getLineTwo(): ?string
    {
        return $this->lineTwo;
    }

    /**
     * Returns the third line of the address
     *
     * @return string|null
     */
    public function getLineThree(): ?string
    {
        return $this->lineThree;
    }

    /**
     * Returns the town/city of the address
     *
     * @return string|null
     */
    public function getTownCity(): ?string
    {
        return $this->townCity;
    }

    /**
     * Returns the county of the address
     *
     * @return string|null
     */
    public function getCounty(): ?string
    {
        return $this->county;
    }

    /**
     * Returns the country of the address
     *
     * @return string|null
     */
    public function getCountry(): string
    {
        return $this->country;
    }

    /**
     * Returns the postcode of the address
     *
     * @return string|null
     */
    public function getPostcode(): ?string
    {
        return $this->postcode;
    }

    /**
     * Creates and returns an instance of this class using the data provided
     * in the array.
     *
     * @param array $parts
     *     An associative array of the address parts.
     *     Keys as defined in the public constants defined in this class.
     *
     * @return self
     */
    public static function fromArray(array $parts)
    {
        return new self(
            (!empty($parts[self::LINE_ONE])) ? $parts[self::LINE_ONE] : null,
            (!empty($parts[self::LINE_TWO])) ? $parts[self::LINE_TWO] : null,
            (!empty($parts[self::LINE_THREE])) ? $parts[self::LINE_THREE] : null,
            (!empty($parts[self::TOWN_CITY])) ? $parts[self::TOWN_CITY] : null,
            (!empty($parts[self::COUNTY])) ? $parts[self::COUNTY] : null,
            (!empty($parts[self::POSTCODE])) ? $parts[self::POSTCODE] : null,
            (!empty($parts[self::COUNTRY])) ? $parts[self::COUNTRY] : null
        );
    }
}
