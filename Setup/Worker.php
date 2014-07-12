<?php

//namespace Plugin\GridExample\Setup;
namespace Plugin\Redirect\Setup;

class Worker extends \Ip\SetupWorker
{

    public function activate()
    {
        $sql = '
        CREATE TABLE IF NOT EXISTS
           ' . ipTable('redirect') . '
        (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `ruleOrder` double,
        `source` varchar(255),
        `destination` varchar(255),
        `active` boolean,
        PRIMARY KEY (`id`)
        )';

        ipDb()->execute($sql);

    }

    public function deactivate()
    {

    }

    public function remove()
    {
        $sql = '
        DROP TABLE IF EXISTS ' . ipTable('redirect') . '';
        ipDb()->execute($sql);
    }

}
