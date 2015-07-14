<?php
/**
 * @package   ImpressPages
 */


/**
 * Created by PhpStorm.
 * User: mangirdas
 * Date: 14.7.12
 * Time: 22.58
 */

namespace Plugin\Redirect;


class Model
{
    public static function getActiveRedirects()
    {
        return ipDb()->selectAll('redirect', '*', array('active' => 1), ' ORDER BY `ruleOrder`');
    }

    public static function getAllRedirects()
    {
        return ipDb()->selectAll('redirect', '*', array(), ' ORDER BY `ruleOrder`');
    }

    public static function match($url = null)
    {
        $rules = self::getActiveRedirects();
        if (!$url) {
            $url = ipRequest()->getUrl();
        }
        if (substr($url, -1) == '/') {
            $url = substr($url, 0, -1);
        }

        foreach ($rules as $rule) {
            $source = $rule['source'];
            if (substr($source, -1) == '/') {
                $source = substr($source, 0, -1);
            }
            $flags = 0;
            if (empty($rule['isCaseSensitive']) || !$rule['isCaseSensitive']) {
                $flags = FNM_CASEFOLD;
            }
            if (fnmatch($source, $url, $flags)) {
                return $rule;
            }
        }


    }

}
