<?php
/**
 * @file
 * UkPostcodeValidator.php
 *
 * @author Josh Parkinson <joshua.parkinson@rchl.co.uk>
 */

namespace JParkinson1991\Common\Location\Address\Postcode;

/**
 * Class UkPostcodeValidator
 *
 * @package JParkinson1991\Common\Location\Address\Postcode
 */
class UkPostcodeValidator implements UkPostcodeValidatorInterface
{
    /**
     * The regex pattern used in postcode format validation
     *
     * phpcs:disable Generic.Files.LineLength.TooLong
     */
    public const REGEX_VALIDATE = '/^([A-PR-UWYZ0-9][A-HK-Y0-9][AEHMNPRTVXY0-9]?[ABEHMNPRVWXY0-9]? ?[0-9][ABD-HJLN-UW-Z]{2}|GIR 0AA)$/i';
    //phpcs:enable Generic.Files.LineLength.TooLong

    /**
     * An array of handled postcodes received during the objects lifetime.
     *
     * @var array
     */
    protected static $handled = [];

    /**
     * Validates the provided postcode
     *
     * @param string $postcode
     *     The postcode to validate
     *
     * @return bool
     *     True if valid, false if not.
     */
    public function isValid(string $postcode): bool
    {
        if (array_key_exists($postcode, self::$handled) === false) {
            self::$handled[$postcode] = (bool)preg_match(self::REGEX_VALIDATE, $postcode);
        }

        return self::$handled[$postcode];
    }
}
