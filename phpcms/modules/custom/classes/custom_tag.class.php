<?php
defined('IN_PHPCMS') or exit('No permission resources.');

class custom_tag {
	private $db;
	
	public function __construct() {
		$this->db = pc_base::load_model('custom_news_model');
	}
	
	/**
	 * 公告列表方法
	 * @param array $data 传递过来的参数
	 * @param return array 数据库中取出的数据数组
	 */
	public function lists($data) {
		$where = '1';
		$siteid = isset($data['siteid']) ? intval($data['siteid']) : get_siteid();
		if ($siteid) $where .= " AND `siteid`='".$siteid."'";
		$where .= ' AND (`endtime` >= \''.date('Y-m-d').'\' or `endtime`=\'0000-00-00\') AND (`starttime` <= \'' . date('Y-m-d') . '\')';
		return $this->db->select($where, '*', $data['limit'], 'id DESC');
	}
}
