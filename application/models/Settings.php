<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Settings extends CI_Model{

	public static function load_main_settings(){
		$CI = & get_instance();
		$sql = 'SELECT * FROM `main_settings`';
		$query = $CI->db->query($sql);
		$result = $query->row_array();
		
		return $result;
	}

	public static function update_main_settings($logo, $favicon, $title, $main_name){
		$CI = & get_instance();
		$sql = 'UPDATE `main_settings` SET `logo` = ?, `favicon` = ?, `title` = ?, `main_name` = ?';
		$CI->db->query($sql, array($logo, $favicon, $title, $main_name));
	}

	public static function load_admin_settings(){
		$CI = & get_instance();
		$sql = 'SELECT * FROM `admin_info`';
		$query = $CI->db->query($sql);
		$result = $query->row_array();
		
		return $result;
	}

	public static function update_admin_creds($new_login, $new_pass){
		$CI = & get_instance();
		$sql = 'UPDATE `admin_info` SET `login` = ?, `password` = ?';
		$CI->db->query($sql, array($new_login, $new_pass));
	}

	public static function update_contact_settings($vk, $ok, $yt, $facebook, $twitter, $linkedin, $google_plus, $instagram, $main_email, $tel_1, $tel_2, $address, $geodata){
		$CI = & get_instance();
		$sql = 'UPDATE `contact_settings` SET `vk` = ?, `ok` = ? , `youtube` = ?, `facebook` = ?, `twitter` = ?, `linkedin` = ?, `google_plus` = ?, `instagram` = ?, `main_email` = ?, `tel_1` = ?, `tel_2` = ?, `address` = ?, `geodata` = ?';
		$CI->db->query($sql, array($vk, $ok, $yt, $facebook, $twitter, $linkedin, $google_plus, $instagram, $main_email, $tel_1, $tel_2, $address, $geodata));
	}

	public static function load_contact_settings(){
		$CI = & get_instance();
		$sql = 'SELECT * FROM `contact_settings`';
		$query = $CI->db->query($sql);
		$result = $query->row_array();
		
		return $result;
	}
}