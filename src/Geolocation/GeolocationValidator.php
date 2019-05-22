<?php
/**
 * @file
 * GeolocationValidator.php
 *
 * @author Josh Parkinson <joshua.parkinson@rchl.co.uk>
 */

namespace JParkinson1991\Common\Location\Geolocation;

/**
 * Class GeolocationValidator
 *
 * @package JParkinson1991\Common\Location\Geolocation
 */
class GeolocationValidator implements GeolocationValidatorInterface
{
    /**
     * Determines if a received latitude is valid
     *
     * @param string $latitude
     *     The latitude to validate
     *
     * @return boolean
     *     TRUE if valid FALSE if not
     */
    public function isValidLatitude(string $latitude): bool
    {
        return (bool)preg_match(
            '/^[-]?(([0-8]?[0-9])\.(\d+))|(90(\.0+)?)$/',
            $latitude
        );
    }

    /**
     * Determines if a received longitude is valid
     *
     * @param string $longitude
     *     The longitude to validate
     *
     * @return bool
     *     TRUE if valid FALSE if not
     */
    public function isValidLongitude(string $longitude): bool
    {
        return (bool)preg_match(
            '/^[-]?((((1[0-7][0-9])|([0-9]?[0-9]))\.(\d+))|180(\.0+)?)$/',
            $longitude
        );
    }
}
