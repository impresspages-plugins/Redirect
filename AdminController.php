<?php
/**
 * Created by PhpStorm.
 * User: Marijus
 * Date: 3/20/14
 * Time: 11:22 AM
 */

namespace Plugin\Redirect;


class AdminController extends \Ip\GridController
{
    protected  function config(){
        return array(
            'title' => __('Redirect rules', 'Redirect', false),
            'table' => 'redirect',
            'sortField' => 'ruleOrder',
            'createPosition' => 'top',
            'fields' => array(
                array(
                    'label' => __('From', 'Redirect', false),
                    'field' => 'source',
                    'note' => __('URL which has to be redirected. Use * to match any number of any symbols. Eg. *products*.', 'Redirect', false),
                    'validators' => array('Required')
                ),
                array(
                    'label' => __('Case sensitive', 'Redirect', false),
                    'type' => 'Checkbox',
                    'field' => 'isCaseSensitive',
                    'default' => 1
                ),
                array(
                    'label' => __('To', 'Redirect', false),
                    'field' => 'destination',
                    'note' => __('URL where to redirect', 'Redirect', false),
                    'validators' => array('Required')
                ),
                array(
                    'label' => __('Active', 'Redirect', false),
                    'field' => 'active',
                    'type' => 'Checkbox',
                    'defaultValue' => 1
                )

            )
        );
    }

}
