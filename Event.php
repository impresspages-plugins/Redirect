<?php
/**
 * @package   ImpressPages
 */


/**
 * Created by PhpStorm.
 * User: mangirdas
 * Date: 14.7.12
 * Time: 22.50
 */

namespace Plugin\Redirect;


class Event
{
    public static function ipInitFinished($info)
    {

        try {
            $matchedRedirectRule = Model::match();
        } catch (\Exception $e) {
            //just to not break the website
            return null;
        }
        if ($matchedRedirectRule) {
            $destination = $matchedRedirectRule['destination'];
            if (substr($destination, 0, 4) != 'http') {
                $destination = 'http://' . $destination;
            }
            header('location: ' . $destination);
            ipDb()->disconnect();
            exit;
        }

        return null;
    }

}
