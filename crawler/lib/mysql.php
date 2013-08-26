<?php
/**
 *  mysql.class.php ��ݿ�ʵ����
 *
 * @copyright			(C) 2005-2010 PHPCMS
 * @license				http://www.phpcms.cn/license/
 * @lastmodify			2010-6-1
 */

final class mysql {
	
	/**
	 * ��ݿ�������Ϣ
	 */
	private $config = null;
	
	/**
	 * ��ݿ�������Դ���
	 */
	public $link = null;
	
	/**
	 * ���һ�β�ѯ��Դ���
	 */
	public $lastqueryid = null;
	
	/**
	 *  ͳ����ݿ��ѯ����
	 */
	public $querycount = 0;
	
	public function __construct() {

	}
	
	/**
	 * ����ݿ�����,�п��ܲ���ʵ������ݿ�
	 * @param $config	��ݿ����Ӳ���
	 * 			
	 * @return void
	 */
	public function open($config) {
		$this->config = $config;
		if($config['autoconnect'] == 1) {
			$this->connect();
		}
	}

	/**
	 * ��������ݿ�����
	 * 			
	 * @return void
	 */
	public function connect() {
		$func = $this->config['pconnect'] == 1 ? 'mysql_pconnect' : 'mysql_connect';
		if(!$this->link = @$func($this->config['hostname'], $this->config['username'], $this->config['password'], 1)) {
			$this->halt('Can not connect to MySQL server');
			return false;
		}

		if($this->version() > '4.1') {
			$charset = isset($this->config['charset']) ? $this->config['charset'] : '';
			$serverset = $charset ? "character_set_connection='$charset',character_set_results='$charset',character_set_client=binary" : '';
			$serverset .= $this->version() > '5.0.1' ? ((empty($serverset) ? '' : ',')." sql_mode='' ") : '';
			$serverset && mysql_query("SET $serverset", $this->link);		
		}

		if($this->config['database'] && !@mysql_select_db($this->config['database'], $this->link)) {
			$this->halt('Cannot use database '.$this->config['database']);
			return false;
		}
		$this->database = $this->config['database'];
		return $this->link;
	}

	/**
	 * ��ݿ��ѯִ�з���
	 * @param $sql Ҫִ�е�sql���
	 * @return ��ѯ��Դ���
	 */
	private function execute($sql) {
		if(!is_resource($this->link)) {
			$this->connect();
		}
		
		$this->lastqueryid = mysql_query($sql, $this->link) or $this->halt(mysql_error(), $sql);

		$this->querycount++;
		return $this->lastqueryid;
	}

	/**
	 * ִ��sql��ѯ
	 * @param $data 		��Ҫ��ѯ���ֶ�ֵ[��`name`,`gender`,`birthday`]
	 * @param $table 		��ݱ�
	 * @param $where 		��ѯ����[��`name`='$name']
	 * @param $limit 		���ؽ��Χ[��10��10,10 Ĭ��Ϊ��]
	 * @param $order 		����ʽ	[Ĭ�ϰ���ݿ�Ĭ�Ϸ�ʽ����]
	 * @param $group 		���鷽ʽ	[Ĭ��Ϊ��]
	 * @param $key 			�������鰴��������
	 * @return array		��ѯ�������
	 */
	public function select($data, $table, $where = '', $limit = '', $order = '', $group = '', $key = '') {
		$where = $where == '' ? '' : ' WHERE '.$where;
		$order = $order == '' ? '' : ' ORDER BY '.$order;
		$group = $group == '' ? '' : ' GROUP BY '.$group;
		$limit = $limit == '' ? '' : ' LIMIT '.$limit;
		$field = explode(',', $data);
		array_walk($field, array($this, 'add_special_char'));
		$data = implode(',', $field);

		$sql = 'SELECT '.$data.' FROM `'.$this->config['database'].'`.`'.$table.'`'.$where.$group.$order.$limit;
		$this->execute($sql);
		if(!is_resource($this->lastqueryid)) {
			return $this->lastqueryid;
		}

		$datalist = array();
		while(($rs = $this->fetch_next()) != false) {
			if($key) {
				$datalist[$rs[$key]] = $rs;
			} else {
				$datalist[] = $rs;
			}
		}
		$this->free_result();
		return $datalist;
	}

	/**
	 * ��ȡ������¼��ѯ
	 * @param $data 		��Ҫ��ѯ���ֶ�ֵ[��`name`,`gender`,`birthday`]
	 * @param $table 		��ݱ�
	 * @param $where 		��ѯ����
	 * @param $order 		����ʽ	[Ĭ�ϰ���ݿ�Ĭ�Ϸ�ʽ����]
	 * @param $group 		���鷽ʽ	[Ĭ��Ϊ��]
	 * @return array/null	��ݲ�ѯ���,�����ڣ��򷵻ؿ�
	 */
	public function get_one($data, $table, $where = '', $order = '', $group = '') {
		$where = $where == '' ? '' : ' WHERE '.$where;
		$order = $order == '' ? '' : ' ORDER BY '.$order;
		$group = $group == '' ? '' : ' GROUP BY '.$group;
		$limit = ' LIMIT 1';
		$field = explode( ',', $data);
		array_walk($field, array($this, 'add_special_char'));
		$data = implode(',', $field);

		$sql = 'SELECT '.$data.' FROM `'.$this->config['database'].'`.`'.$table.'`'.$where.$group.$order.$limit;
		$this->execute($sql);
		$res = $this->fetch_next();
		$this->free_result();
		return $res;
	}
	
	/**
	 * �����ѯ���
	 * @param $type		���ؽ������	
	 * 					MYSQL_ASSOC��MYSQL_NUM �� MYSQL_BOTH
	 * @return array
	 */
	public function fetch_next($type=MYSQL_ASSOC) {
		$res = mysql_fetch_array($this->lastqueryid, $type);
		if(!$res) {
			$this->free_result();
		}
		return $res;
	}
	
	/**
	 * �ͷŲ�ѯ��Դ
	 * @return void
	 */
	public function free_result() {
		if(is_resource($this->lastqueryid)) {
			mysql_free_result($this->lastqueryid);
			$this->lastqueryid = null;
		}
	}
	
	/**
	 * ֱ��ִ��sql��ѯ
	 * @param $sql							��ѯsql���
	 * @return	boolean/query resource		���Ϊ��ѯ��䣬������Դ�����򷵻�true/false
	 */
	public function query($sql) {
		return $this->execute($sql);
	}
	
	/**
	 * ִ����Ӽ�¼����
	 * @param $data 		Ҫ���ӵ���ݣ�����Ϊ���顣����keyΪ�ֶ�ֵ������ֵΪ���ȡֵ
	 * @param $table 		��ݱ�
	 * @return boolean
	 */
	public function insert($data, $table, $return_insert_id = false, $replace = false) {
		if(!is_array( $data ) || $table == '' || count($data) == 0) {
			return false;
		}
		
		$fielddata = array_keys($data);
		$valuedata = array_values($data);
		array_walk($fielddata, array($this, 'add_special_char'));
		array_walk($valuedata, array($this, 'escape_string'));
		
		$field = implode (',', $fielddata);
		$value = implode (',', $valuedata);

		$cmd = $replace ? 'REPLACE INTO' : 'INSERT INTO';
		$sql = $cmd.' `'.$this->config['database'].'`.`'.$table.'`('.$field.') VALUES ('.$value.')';
		$return = $this->execute($sql);
		return $return_insert_id ? $this->insert_id() : $return;
	}
	
	/**
	 * ��ȡ���һ����Ӽ�¼�������
	 * @return int 
	 */
	public function insert_id() {
		return mysql_insert_id($this->link);
	}
	
	/**
	 * ִ�и��¼�¼����
	 * @param $data 		Ҫ���µ�������ݣ��������Ϊ����Ҳ����Ϊ�ַ��������顣
	 * 						Ϊ����ʱ����keyΪ�ֶ�ֵ������ֵΪ���ȡֵ
	 * 						Ϊ�ַ�ʱ[��`name`='phpcms',`hits`=`hits`+1]��
	 *						Ϊ����ʱ[��: array('name'=>'phpcms','password'=>'123456')]
	 *						�����ʹ��array('name'=>'+=1', 'base'=>'-=1');������Զ�����Ϊ`name` = `name` + 1, `base` = `base` - 1
	 * @param $table 		��ݱ�
	 * @param $where 		�������ʱ������
	 * @return boolean
	 */
	public function update($data, $table, $where = '') {
		if($table == '' or $where == '') {
			return false;
		}

		$where = ' WHERE '.$where;
		$field = '';
		if(is_string($data) && $data != '') {
			$field = $data;
		} elseif (is_array($data) && count($data) > 0) {
			$fields = array();
			foreach($data as $k=>$v) {
				switch (substr($v, 0, 2)) {
					case '+=':
						$v = substr($v,2);
						if (is_numeric($v)) {
							$fields[] = $this->add_special_char($k).'='.$this->add_special_char($k).'+'.$this->escape_string($v, '', false);
						} else {
							continue;
						}
						
						break;
					case '-=':
						$v = substr($v,2);
						if (is_numeric($v)) {
							$fields[] = $this->add_special_char($k).'='.$this->add_special_char($k).'-'.$this->escape_string($v, '', false);
						} else {
							continue;
						}
						break;
					default:
						$fields[] = $this->add_special_char($k).'='.$this->escape_string($v);
				}
			}
			$field = implode(',', $fields);
		} else {
			return false;
		}

		$sql = 'UPDATE `'.$this->config['database'].'`.`'.$table.'` SET '.$field.$where;
		return $this->execute($sql);
	}
	
	/**
	 * ִ��ɾ���¼����
	 * @param $table 		��ݱ�
	 * @param $where 		ɾ���������,������Ϊ�ա�
	 * 						���Ҫ��ձ?ʹ��empty����
	 * @return boolean
	 */
	public function delete($table, $where) {
		if ($table == '' || $where == '') {
			return false;
		}
		$where = ' WHERE '.$where;
		$sql = 'DELETE FROM `'.$this->config['database'].'`.`'.$table.'`'.$where;
		return $this->execute($sql);
	}
	
	/**
	 * ��ȡ�����ݿ����Ӱ�쵽������
	 * @return int
	 */
	public function affected_rows() {
		return mysql_affected_rows($this->link);
	}
	
	/**
	 * ��ȡ��ݱ�����
	 * @param $table 		��ݱ�
	 * @return array
	 */
	public function get_primary($table) {
		$this->execute("SHOW COLUMNS FROM $table");
		while($r = $this->fetch_next()) {
			if($r['Key'] == 'PRI') break;
		}
		return $r['Field'];
	}

	/**
	 * ��ȡ���ֶ�
	 * @param $table 		��ݱ�
	 * @return array
	 */
	public function get_fields($table) {
		$fields = array();
		$this->execute("SHOW COLUMNS FROM $table");
		while($r = $this->fetch_next()) {
			$fields[$r['Field']] = $r['Type'];
		}
		return $fields;
	}

	/**
	 * ��鲻���ڵ��ֶ�
	 * @param $table ����
	 * @return array
	 */
	public function check_fields($table, $array) {
		$fields = $this->get_fields($table);
		$nofields = array();
		foreach($array as $v) {
			if(!array_key_exists($v, $fields)) {
				$nofields[] = $v;
			}
		}
		return $nofields;
	}

	/**
	 * �����Ƿ����
	 * @param $table ����
	 * @return boolean
	 */
	public function table_exists($table) {
		$tables = $this->list_tables();
		return in_array($table, $tables) ? 1 : 0;
	}
	
	public function list_tables() {
		$tables = array();
		$this->execute("SHOW TABLES");
		while($r = $this->fetch_next()) {
			$tables[] = $r['Tables_in_'.$this->config['database']];
		}
		return $tables;
	}

	/**
	 * ����ֶ��Ƿ����
	 * @param $table ����
	 * @return boolean
	 */
	public function field_exists($table, $field) {
		$fields = $this->get_fields($table);
		return array_key_exists($field, $fields);
	}

	public function num_rows($sql) {
		$this->lastqueryid = $this->execute($sql);
		return mysql_num_rows($this->lastqueryid);
	}

	public function num_fields($sql) {
		$this->lastqueryid = $this->execute($sql);
		return mysql_num_fields($this->lastqueryid);
	}

	public function result($sql, $row) {
		$this->lastqueryid = $this->execute($sql);
		return @mysql_result($this->lastqueryid, $row);
	}

	public function error() {
		return @mysql_error($this->link);
	}

	public function errno() {
		return intval(@mysql_errno($this->link)) ;
	}

	public function version() {
		if(!is_resource($this->link)) {
			$this->connect();
		}
		return mysql_get_server_info($this->link);
	}

	public function close() {
		if (is_resource($this->link)) {
			@mysql_close($this->link);
		}
	}
	
	public function halt($message = '', $sql = '') {
		if($this->config['debug']) {
			$this->errormsg = "<b>MySQL Query : </b> $sql <br /><b> MySQL Error : </b>".$this->error()." <br /> <b>MySQL Errno : </b>".$this->errno()." <br /><b> Message : </b> $message <br /><a href='http://faq.phpcms.cn/?errno=".$this->errno()."&msg=".urlencode($this->error())."' target='_blank' style='color:red'>Need Help?</a>";
			$msg = $this->errormsg;
			echo '<div style="font-size:12px;text-align:left; border:1px solid #9cc9e0; padding:1px 4px;color:#000000;font-family:Arial, Helvetica,sans-serif;"><span>'.$msg.'</span></div>';
			exit;
		} else {
			return false;
		}
	}

	/**
	 * ���ֶ����߼ӷ���ţ��Ա�֤��ݿⰲȫ
	 * @param $value ����ֵ
	 */
	public function add_special_char(&$value) {
		if('*' == $value || false !== strpos($value, '(') || false !== strpos($value, '.') || false !== strpos ( $value, '`')) {
			//�������* ���� ʹ����sql������
		} else {
			$value = '`'.trim($value).'`';
		}
		if (preg_match("/\b(select|insert|update|delete)\b/i", $value)) {
			$value = preg_replace("/\b(select|insert|update|delete)\b/i", '', $value);
		}
		return $value;
	}
	
	/**
	 * ���ֶ�ֵ���߼���ţ��Ա�֤��ݿⰲȫ
	 * @param $value ����ֵ
	 * @param $key ����key
	 * @param $quotation 
	 */
	public function escape_string(&$value, $key='', $quotation = 1) {
		if ($quotation) {
			$q = '\'';
		} else {
			$q = '';
		}
		$value = $q.$value.$q;
		return $value;
	}
	
	public function autocommit($pre = 0)
	{
		mysql_query('SET autocommit='.$pre);
	}
	
	public function commit()
	{
		mysql_query('commit');
	}
}
?>