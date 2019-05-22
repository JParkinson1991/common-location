<?php
/**
 * @file
 * UkAddressDecoratorInterface.php
 *
 * @author Josh Parkinson <joshua.parkinson@rchl.co.uk>
 */

namespace JParkinson1991\Common\Location\Address;

/**
 * Class UkAddressDecoratorInterface
 *
 * @package JParkinson1991\Common\Location\Address
 */
interface UkAddressDecoratorInterface
{
    /**
     * Formats the provided address as a string using the set separator
     *
     * @param UkAddressInterface $address
     *     The address to format
     * @param string $separator
     *     The separator to use between address parts
     *
     * @return string
     *     The formatted address string
     */
    public function formatAddress(UkAddressInterface $address, string $separator = ','): string;
}
