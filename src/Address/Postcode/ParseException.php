<?php
/**
 * @file
 * ParseException.php
 *
 * @author Josh Parkinson <joshua.parkinson@rchl.co.uk>
 */

namespace JParkinson1991\Common\Location\Address\Postcode;

/**
 * Class ParseException
 *
 * @package JParkinson1991\Common\Location\Address\Postcode
 */
class ParseException extends \Exception
{
    /**
     * The name of the parse method that triggered the exception
     *
     * @var string
     */
    private $method;

    /**
     * Return
     *
     * @return string
     */
    public function getCausingMethod(): string
    {
        return $this->method;
    }

    /**
     * Returns an instance of this exception int he context of a parse failure
     *
     * @param string $postcode
     *     The postcode (or not) that triggered the parse failure
     * @param string $methodName
     *     The name of the method that triggered the exception
     *
     * @return ParseException
     */
    public static function parseFailure(string $postcode, string $methodName)
    {
        $exception = new self(strtr(
            'Failed to parse postcode \':postcode\'. Ensure provided postcode is valid.',
            [
                ':postcode' => $postcode
            ]
        ));

        $exception->method = $methodName;

        return $exception;
    }
}
