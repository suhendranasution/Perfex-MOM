<?php
defined('BASEPATH') or exit('No direct script access allowed');
$CI->db->query('DROP TABLE IF EXISTS `' . db_prefix() . 'mom_notes`');
