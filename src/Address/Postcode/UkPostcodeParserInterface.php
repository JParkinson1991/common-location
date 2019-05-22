<?php
/**
 * @file
 * UkPostcodeParserInterface.php
 *
 * @author Josh Parkinson <joshua.parkinson@rchl.co.uk>
 */

namespace JParkinson1991\Common\Location\Address\Postcode;

/**
 * Class UkPostcodeParserInterface
 *
 * @package JParkinson1991\Common\Location\Address\Postcode
 */
interface UkPostcodeParserInterface
{
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
    public function getArea(string $postcode): string;

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
    public function getDistrict(string $postcode): string;

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
    public function getSector(string $postcode): string;

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
     *     On invalid $postcode argument
     */
    public function getWalk(string $postcode): string;

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
    public function getOuter(string $postcode): string;

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
    public function getInner(string $postcode): string;

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
    public function getFullFormatted(string $postcode): string;
}
