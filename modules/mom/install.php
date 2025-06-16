<?php
defined('BASEPATH') or exit('No direct script access allowed');
if (!$CI->db->table_exists(db_prefix() . 'mom_notes')) {
    $CI->db->query('CREATE TABLE `' . db_prefix() . "mom_notes" . '` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `project_id` int(11) NOT NULL,
        `meeting_date` date NULL,
        `description` text NULL,
        `hash` varchar(32) DEFAULT NULL,
        PRIMARY KEY (`id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8;');
}
