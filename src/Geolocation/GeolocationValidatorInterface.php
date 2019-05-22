<?php
/**
 * @file
 * GeolocationValidatorInterface.php
 *
 * @author Josh Parkinson <joshua.parkinson@rchl.co.uk>
 */

namespace JParkinson1991\Common\Location\Geolocation;

/**
 * Class GeolocationValidatorInterface
 *
 * @package JParkinson1991\Common\Location\Geolocation
 */
interface GeolocationValidatorInterface
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
    public function isValidLatitude(string $latitude): bool;

    /**
     * Determines if a received longitude is valid
     *
     * @param string $longitude
     *     The longitude to validate
     *
     * @return bool
     *     TRUE if valid FALSE if not
     */
    public function isValidLongitude(string $longitude): bool;
}
