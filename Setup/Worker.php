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

        //add title column if not exist
        $ceckSql = "
        SELECT
          *
        FROM
          information_schema.COLUMNS
        WHERE
            TABLE_SCHEMA = :database
            AND TABLE_NAME = :table
            AND COLUMN_NAME = :column
        ";
        $table = ipTable('redirect');
        $result = ipDb()->fetchAll($ceckSql, array('database' => ipConfig()->database(), 'table' => ipConfig()->tablePrefix() . 'redirect', 'column' => 'isCaseSensitive'));
        if (!$result) {
            $sql = "ALTER TABLE $table ADD `isCaseSensitive` TINYINT(1) NOT NULL DEFAULT 1;";
            ipDb()->execute($sql);
        }



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
