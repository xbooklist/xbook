<?php
// ========================== �ļ�˵�� ==========================//
// ���ļ�˵����ǰ̨����
// =============================================================//
error_reporting(7);
$mtime = explode(' ', microtime());
$starttime = $mtime[1] + $mtime[0];
// �������ݿ�������Ϣ
require_once ("./admin/config.php");
// �������ݿ���
require_once ("./admin/class/mysql.php");
// ���س���ѡ����Ϣ
require_once ("./admin/settings.php");
// ����ģ����
require_once ("./admin/class/template.php");   
// ��ʼ�����ݿ���
$DB = new DB_MySQL;
$DB->servername=$servername;
$DB->dbname=$dbname;
$DB->dbusername=$dbusername;
$DB->dbpassword=$dbpassword;
$DB->connect();
$DB->selectdb();

// ��ʼ��ģ����
$t=new template("./templates/".$configuration[template]); 

// ��������� register_globals = off �Ļ����¹���
if ( function_exists('ini_get') ) {
	$onoff = ini_get('register_globals');
} else {
	$onoff = get_cfg_var('register_globals');
}
if ($onoff != 1) {
	@extract($_POST, EXTR_SKIP);
	@extract($_GET, EXTR_SKIP);
}

// ȥ��ת���ַ�
function stripslashes_array(&$array) {
	while(list($key,$var) = each($array)) {
		if ($key != 'argc' && $key != 'argv' && (strtoupper($key) != $key || ''.intval($key) == "$key")) {
			if (is_string($var)) {
				$array[$key] = stripslashes($var);
			}
			if (is_array($var))  {
				$array[$key] = stripslashes_array($var);
			}
		}
	}
	return $array;
}

// �ж� magic_quotes_gpc ״̬
if (get_magic_quotes_gpc()) {
    $_GET = stripslashes_array($_GET);
    $_POST = stripslashes_array($_POST);
    $_COOKIE = stripslashes_array($_COOKIE);
}
set_magic_quotes_runtime(0);

// ��Ϣ��ʾҳ��
function message($Msg,$ReturnUrl)
{
	global $t;
	$t->set_file("Message", "message.html");
	$t->set_var(array("Msg"=>$Msg,
			          "ReturnUrl"=>htmlspecialchars($ReturnUrl)));
	$t->parse("OUT","Message");
	$t->p("OUT");
	exit;
}

// ��ҳ����
function multi($num, $perpage, $curr_page, $mpurl) {
	$multipage = '';
	if($num > $perpage) {
		$page = 10;
		$offset = 2;

		$pages = ceil($num / $perpage);
		$from = $curr_page - $offset;
		$to = $curr_page + $page - $offset - 1;
			if($page > $pages) {
				$from = 1;
				$to = $pages;
			} else {
				if($from < 1) {
					$to = $curr_page + 1 - $from;
					$from = 1;
					if(($to - $from) < $page && ($to - $from) < $pages) {
						$to = $page;
					}
				} elseif($to > $pages) {
					$from = $curr_page - $pages + $to;
					$to = $pages;
						if(($to - $from) < $page && ($to - $from) < $pages) {
							$from = $pages - $page + 1;
						}
				}
			}
			$multipage .= "<a href=\"$mpurl&page=1\"><font face=webdings>9</font></a>  ";
			for($i = $from; $i <= $to; $i++) {
				if($i != $curr_page) {
					$multipage .= "<a href=\"$mpurl&page=$i\">$i</a> ";
				} else {
					$multipage .= '<u><b>'.$i.'</b></u> ';
				}
			}
			$multipage .= $pages > $page ? " ... <a href=\"$mpurl&page=$pages\"> $pages <Font face=webdings>:</font></a>" : " <a href=\"$mpurl&page=$pages\"><Font face=webdings>:</font></a>";
	}
	return $multipage;
}

// ####################### ���HTML���� #######################
function html_clean($content){
	$content = htmlspecialchars($content);
	$content = str_replace("\n", "<br>", $content);
	$content = str_replace("  ", "&nbsp;&nbsp;", $content);
	$content = str_replace("\t", '&nbsp;&nbsp;&nbsp;&nbsp;', $content);
	return $content;
}
// ####################### ���������Ϣ #######################
function checkcomment($msg)
{
	if(trim($msg) == "")
	{
		$result="���ݲ���Ϊ��<br>";
		return $result;
	}
	if(strlen($msg) > 400)
	{
		$result="���ݲ��ܳ���400���ַ�<br>";
		return $result;
	}
}
function checkguest($guest)
{
	if(!empty($guest))
	{
		if(strlen($guest)>16)
		{
			$result.="���ֲ��ܳ���16���ֽڣ�";
			return $result;
		}
	}
}
// ####################### ��ȡ�ͻ���IP #######################
function getip() {
	if (isset($_SERVER)) {
		if (isset($_SERVER[HTTP_X_FORWARDED_FOR])) {
			$realip = $_SERVER[HTTP_X_FORWARDED_FOR];
		} elseif (isset($_SERVER[HTTP_CLIENT_IP])) {
			$realip = $_SERVER[HTTP_CLIENT_IP];
		} else {
			$realip = $_SERVER[REMOTE_ADDR];
		}
	} else {
		if (getenv("HTTP_X_FORWARDED_FOR")) {
			$realip = getenv( "HTTP_X_FORWARDED_FOR");
		} elseif (getenv("HTTP_CLIENT_IP")) {
			$realip = getenv("HTTP_CLIENT_IP");
		} else {
			$realip = getenv("REMOTE_ADDR");
		}
	}
	return $realip;
}
?> 
