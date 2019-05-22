<?php
/**
 * @file
 * UkAddressDecorator.php
 *
 * @author Josh Parkinson <joshua.parkinson@rchl.co.uk>
 */

namespace JParkinson1991\Common\Location\Address;

/**
 * Class UkAddressDecorator
 *
 * @package JParkinson1991\Common\Location\Address
 */
class UkAddressDecorator implements UkAddressDecoratorInterface
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
    public function formatAddress(UkAddressInterface $address, string $separator = ', '): string
    {
        return implode($separator, array_filter([
            $address->getLineOne(),
            $address->getLineTwo(),
            $address->getLineThree(),
            $address->getTownCity(),
            $address->getCounty(),
            $address->getPostcode(), //todo: postcode formatter
            $address->getCountry()
        ]));
    }
}
