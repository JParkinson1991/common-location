<?php
/**
 * @file
 * UkPostcodeValidatorInterface.php
 *
 * @author Josh Parkinson <joshua.parkinson@rchl.co.uk>
 */

namespace JParkinson1991\Common\Location\Address\Postcode;

/**
 * Class UkPostcodeValidatorInterface
 *
 * @package JParkinson1991\Common\Location\Address\Postcode
 */
interface UkPostcodeValidatorInterface
{
    /**
     * Validates the provided postcode
     *
     * @param string $postcode
     *     The postcode to validate
     *
     * @return bool
     *     True if valid, false if not.
     */
    public function isValid(string $postcode): bool;
}
