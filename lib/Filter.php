<?php
/**
 * PrivateBin
 *
 * a zero-knowledge paste bin
 *
 * @link      https://github.com/PrivateBin/PrivateBin
 * @copyright 2012 Sébastien SAUVAGE (sebsauvage.net)
 * @license   https://www.opensource.org/licenses/zlib-license.php The zlib/libpng License
 * @version   1.5.1
 */

namespace PrivateBin;

use Exception;

/**
 * Filter
 *
 * Provides data filtering functions.
 */
class Filter
{
    /**
     * format a given time string into a human readable label (localized)
     *
     * accepts times in the format "[integer][time unit]"
     * 
     * modfication exo 1 seance 4
     *
     * @access public
     * @static
     * @param  string $time
     * @throws Exception
     * @return string
     */
    public static function formatHumanReadableTime($time)
    {
        if (preg_match('/^(\d+) *(\w+)$/', $time, $matches) !== 1) {
            throw new Exception("Error parsing time format '$time'", 30);
        }
        switch ($matches[2]) {
            case 'sec':
                $unit = 'second';
                break;
            case 'min':
                $unit = 'minute';
                break;
            default:
                $unit = rtrim($matches[2], 's');
        }
        return I18n::_(array('%d ' . $unit, '%d ' . $unit . 's'), (int) $matches[1]);
    }

    /**
     * format a given number of bytes in IEC 80000-13:2008 notation (localized)
     * 
     * modfication exo 1 seance 4
     *
     * @access public
     * @static
     * @param  int $size
     * @return string
     */
    public static function formatHumanReadableSize($size)
    {
        $iec = array('B', 'KiB', 'MiB', 'GiB', 'TiB', 'PiB', 'EiB', 'ZiB', 'YiB');
        $i   = 0;
        while (($size / 1024) >= 1) {
            $size = $size / 1024;
            ++$i;
        }
        return number_format($size, ($i ? 2 : 0), '.', ' ') . ' ' . I18n::_($iec[$i]);
    }


    //Réecrivez la méthode formatHumanReadableTime du fichier lib/Filter.php à l'aide de Copilot. Cette fois-ci, la méthode prendra 2 arguments : une valeur entière et une unité en chaîne de caractères.
    public static function formatHumanReadableTime2(int $value, string $unit): string
    {
        $unit = rtrim($unit, 's');
        if ($value > 1) {
            $unit .= 's';
        }
        return $value . ' ' . $unit;
    }
}
