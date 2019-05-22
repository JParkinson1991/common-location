<?php
/**
 * @file
 * UkPostcodeParser.php
 *
 * @author Josh Parkinson <joshua.parkinson@rchl.co.uk>
 */

namespace JParkinson1991\Common\Location\Address\Postcode;

/**
 * Class UkPostcodeParser
 *
 * @package JParkinson1991\Common\Location\Address\Postcode
 */
final class UkPostcodeParser implements UkPostcodeParserInterface
{
    /**
     * The regex pattern used to parse the postcode.
     *
     * The following pattern is able to parse (or split) valid postcodes into the following sections:
     *     - area
     *     - district
     *     - sector
     *     - walk
     */
    public const REGEX_PARSE = '/^([A-Z]{1,2})([0-9][0-9A-Z]?)\s*([0-9])([A-Z]{2})$/';

    /**
     * Contains parsed postcode data handled during the object instance's lifecycle
     *
     * @var array
     *     Parsed postcode data stored under it's postcode key
     */
    private static $parsed = [];

    /**
     * A flat array of invalid postcodes
     *
     * @var array
     */
    private static $invalid = [];

    /**
     * Get the area from a provided postcode.
     *
     * @param string $postcode
     *     The postcode to get the area from
     *
     * @return string
     *     The area from the postcode
     *
     * @throws ParseException
     *     On invalid $postcode argument
     */
    public function getArea(string $postcode): string
    {
        return $this->parsePostcode($postcode)[1];
    }

    /**
     * Get the district from a provided postcode.
     *
     * @param string $postcode
     *     The postcode to get the district from
     *
     * @return string
     *     The district from the postcode
     *
     * @throws ParseException
     *     On invalid $postcode argument
     */
    public function getDistrict(string $postcode): string
    {
        return $this->parsePostcode($postcode)[2];
    }

    /**
     * Get the sector from a provided postcode.
     *
     * @param string $postcode
     *     The postcode to get the sector from
     *
     * @return string
     *     The sector from the postcode
     *
     * @throws ParseException
     *     On invalid $postcode argument
     */
    public function getSector(string $postcode): string
    {
        return $this->parsePostcode($postcode)[3];
    }

    /**
     * Get the walk from a provided postcode.
     *
     * @param string $postcode
     *     The postcode to get the walk from
     *
     * @return string
     *     The walk from the postcode
     *
     * @throws ParseException
     *     On invalid $postcode
     */
    public function getWalk(string $postcode): string
    {
        return $this->parsePostcode($postcode)[4];
    }

    /**
     * Get the outer section from a provided postcode.
     *
     * @param string $postcode
     *     The postcode to get the outer from
     *
     * @return string
     *     The outer section from the postcode
     *
     * @throws ParseException
     *     On invalid $postcode argument
     */
    public function getOuter(string $postcode): string
    {
        $parsed = $this->parsePostcode($postcode);

        return $parsed[1].$parsed[2];
    }

    /**
     * Get the inner section from a provided postcode.
     *
     * @param string $postcode
     *     The postcode to get the inner from
     *
     * @return string
     *     The inner section from the postcode
     *
     * @throws ParseException
     *     On invalid $postcode argument
     */
    public function getInner(string $postcode): string
    {
        $parsed = $this->parsePostcode($postcode);

        return $parsed[3].$parsed[4];
    }

    /**
     * Get the full formatted postcode from a raw string
     *
     * @param string $postcode
     *     The postcode to get the full formatted string from
     *
     * @return string
     *     The full formatted version of the postcode
     *
     * @throws ParseException
     *     On invalid $postcode argument
     */
    public function getFullFormatted(string $postcode): string
    {
        $parsed = $this->parsePostcode($postcode);

        return $parsed[1].$parsed[2].' '.$parsed[3].$parsed[4];
    }

    /**
     * Internal parses used to split the postcode into relevant chunks.
     *
     * @param string $postcode
     *     The postcode to parse
     *
     * @return array
     *     An array of postcode chunks/sections
     *
     * @throws ParseException
     */
    private function parsePostcode(string $postcode): array
    {
        //Strip postcode formatting from argument
        $postcode = strtoupper(preg_replace("[^A-Za-z0-9]", "", $postcode));

        //If previously deemed invalid, throw exception
        if (array_key_exists($postcode, self::$invalid) !== false) {
            throw ParseException::parseFailure($postcode, debug_backtrace()[1]['function']);
        }

        //If not already parsed, parse the postcode for use
        if (array_key_exists($postcode, self::$parsed) === false) {
            preg_match(self::REGEX_PARSE, $postcode, $parsedPostcode);

            if (empty($parsedPostcode)) {
                self::$invalid[$postcode] = true; //use keys to avoid every growing arrays
                throw ParseException::parseFailure($postcode, debug_backtrace()[1]['function']);
            }

            self::$parsed[$postcode] = $parsedPostcode;
        }

        return self::$parsed[$postcode];
    }
}
