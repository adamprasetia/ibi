<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
function tbl_tmp(){
    $data = array(
        'table_open'=>'<table border="0" cellpadding="4" cellspacing="0" class="table table-hover table-bordered">'
    );
    return $data;
}
function tbl_tmp_servis(){
	$data = array(
		'table_open'=>'<table id="tbl-servis" border="0" cellpadding="4" cellspacing="0" class="table table-striped table-bordered table-servis">'
	);
	return $data;
}
function pag_tmp(){
	$data = array(
		'page_query_string' => TRUE
		,'query_string_segment' => 'offset'
		,'full_tag_open' => '<ul class="pagination">'
		,'full_tag_close' => '</ul>'	
		,'first_tag_open' => '<li>'
		,'first_tag_close' => '</li>'	
		,'last_tag_open' => '<li>'
		,'last_tag_close' => '</li>'
		,'next_tag_open' => '<li>'
		,'next_tag_close' => '</li>'		
		,'prev_tag_open' => '<li>'
		,'prev_tag_close' => '</li>'	
		,'cur_tag_open' => '<li class="active"><span>'
		,'cur_tag_close' => '</span></li>'
		,'num_tag_open' => '<li>'
		,'num_tag_close' => '</li>'				
	);
	return $data;
}
function owner($id){
    $ci =& get_instance();
    $user_create = $ci->general_model->get_from_field_row('users','id',$id->user_create);
    if($user_create){
        $user_create = $user_create->name;
    }
    $user_update = $ci->general_model->get_from_field_row('users','id',$id->user_update);
    if($user_update){
        $user_update = $user_update->name;
    }

    $data = '';
    if($id->user_create <> '' && $id->date_create <> '0000-00-00 00:00:00'){
        $data .= $ci->lang->line('created_by').' : <strong>'.$user_create.'</strong> '.$id->date_create;
    }else{
        $data .= $ci->lang->line('created_by').' : <strong>System</strong>';
    }
    if($id->user_update <> '' && $id->date_update <> '0000-00-00 00:00:00'){
        $data .= ' | '.$ci->lang->line('updated_by').' : <strong>'.$user_update.'</strong> '.$id->date_update;
    }
    return $data;
}
function page_total($offset,$limit,$total){
    $ci =& get_instance();
    if($total > 0){
        return $ci->lang->line('showing').' '.number_format(($total>0?$offset+1:'0')).' '.$ci->lang->line('to').' '.number_format(($total>$limit?(($offset+$limit)>$total?$total:$offset+$limit):$total)).' '.$ci->lang->line('from').' '.number_format($total).' '.$ci->lang->line('entry');
    }else{
        return $ci->lang->line('no_data');
    }
}
function get_browsers($agent = null){
    $u_agent = ($agent!=null)? $agent : $_SERVER['HTTP_USER_AGENT']; 
    $bname = 'Unknown';
    $platform = 'Unknown';
    $version= "";

	$os_array = array(
        '/windows nt 10/i'     =>  'Windows 10',
        '/windows nt 6.3/i'     =>  'Windows 8.1',
        '/windows nt 6.2/i'     =>  'Windows 8',
        '/windows nt 6.1/i'     =>  'Windows 7',
        '/windows nt 6.0/i'     =>  'Windows Vista',
        '/windows nt 5.2/i'     =>  'Windows Server 2003/XP x64',
        '/windows nt 5.1/i'     =>  'Windows XP',
        '/windows xp/i'         =>  'Windows XP',
        '/windows nt 5.0/i'     =>  'Windows 2000',
        '/windows me/i'         =>  'Windows ME',
        '/win98/i'              =>  'Windows 98',
        '/win95/i'              =>  'Windows 95',
        '/win16/i'              =>  'Windows 3.11',
        '/macintosh|mac os x/i' =>  'Mac OS X',
        '/mac_powerpc/i'        =>  'Mac OS 9',
        '/linux/i'              =>  'Linux',
        '/ubuntu/i'             =>  'Ubuntu',
        '/iphone/i'             =>  'iPhone',
        '/ipod/i'               =>  'iPod',
        '/ipad/i'               =>  'iPad',
        '/android/i'            =>  'Android',
        '/blackberry/i'         =>  'BlackBerry',
        '/webos/i'              =>  'Mobile'
    );
    foreach ($os_array as $regex => $value) { 
        if (preg_match($regex, $u_agent)) {
            $platform = $value;
        }

    }   

    // Next get the name of the useragent yes seperately and for good reason
    if(preg_match('/MSIE/i',$u_agent) && !preg_match('/Opera/i',$u_agent)) 
    { 
        $bname = 'Internet Explorer'; 
        $ub = "MSIE"; 
    } 
    elseif(preg_match('/Firefox/i',$u_agent)) 
    { 
        $bname = 'Mozilla Firefox'; 
        $ub = "Firefox"; 
    } 
    elseif(preg_match('/Chrome/i',$u_agent)) 
    { 
        $bname = 'Google Chrome'; 
        $ub = "Chrome"; 
    } 
    elseif(preg_match('/Safari/i',$u_agent)) 
    { 
        $bname = 'Apple Safari'; 
        $ub = "Safari"; 
    } 
    elseif(preg_match('/Opera/i',$u_agent)) 
    { 
        $bname = 'Opera'; 
        $ub = "Opera"; 
    } 
    elseif(preg_match('/Netscape/i',$u_agent)) 
    { 
        $bname = 'Netscape'; 
        $ub = "Netscape"; 
    } 

    // finally get the correct version number
    $known = array('Version', $ub, 'other');
    $pattern = '#(?<browser>' . join('|', $known) .
    ')[/ ]+(?<version>[0-9.|a-zA-Z.]*)#';
    if (!preg_match_all($pattern, $u_agent, $matches)) {
        // we have no matching number just continue
    }

    // see how many we have
    $i = count($matches['browser']);
    if ($i != 1) {
        //we will have two since we are not using 'other' argument yet
        //see if version is before or after the name
        if (strripos($u_agent,"Version") < strripos($u_agent,$ub)){
            $version= $matches['version'][0];
        }
        else {
            $version= $matches['version'][1];
        }
    }
    else {
        $version= $matches['version'][0];
    }

    // check if we have a number
    if ($version==null || $version=="") {$version="?";}

    return array(
        'userAgent' => $u_agent,
        'name'      => $bname,
        'version'   => $version,
        'platform'  => $platform,
        'pattern'    => $pattern
    );
} 
function format_ymd($date){
    if($date <> '' && $date <> null){
        $x = explode("/",$date);
        return $x[2]."-".$x[1]."-".$x[0];
    }else{
        return "0000-00-00";
    }
}
function format_y($date){
    if($date <> '' && $date <> null){
        $x = explode("/",$date);
        return $x[2];
    }else{
        return "0000";
    }
}
function format_dmy($date){
    if($date <> '' && $date <> null){
        $x = explode("-",$date);
        return $x[2]."/".$x[1]."/".$x[0];
    }else{
        return "00/00/0000";
    }
}
function timeago($waktu){
    $selisih = time() - $waktu;

    if( $selisih < (24 * 60 * 60) ) {
        return 'hari ini';
    }

    $kondisi = array(
        12 * 30 * 24 * 60 * 60 => 'tahun',
             30 * 24 * 60 * 60 => 'bulan',
              7 * 24 * 60 * 60 => 'minggu',
                  24 * 60 * 60 => 'hari',
    );

    foreach( $kondisi as $detik => $satuan ) {
        $d = $selisih / $detik;
        if( $d >= 1 ) {
            $r = round( $d );
            if($r==1&&$satuan=='hari'){
                return "kemarin";
            }else{
                return $r . ' ' . $satuan . ' lalu';
            }
        }
    }
}
function get_query_string($add = array(),$remove = ''){
    $get = $_GET;
    if(is_array($add)){
        $get = array_merge($get, $add);
    }
    unset($get[$remove]);
    if(count($get) > 0){
        return '?'.http_build_query($get);
    }
    return '';
}   
function active_menu($param1,$param2 = 'undefined',$param3 = 'undefined'){
    $ci = &get_instance();
    if($ci->uri->segment(1) == $param1 && $param2 && $ci->uri->segment(3) == $param3){
        return 'active';
    }else if($ci->uri->segment(1) == $param1 && $ci->uri->segment(2) == $param2 && $param3 == 'undefined'){
        return 'active';
    }else if($ci->uri->segment(1) == $param1 && $param2 == 'undefined' && $param3 == 'undefined'){
        return 'active';
    }
    return '';
}
function get_day($id){
    switch ($id) {
        case '1':
            return 'Senin';
            break;
        case '2':
            return 'Selasa';
            break;
        case '3':
            return 'Rabu';
            break;
        case '4':
            return 'Kamis';
            break;
        case '5':
            return 'Jumat';
            break;
        case '6':
            return 'Sabtu';
            break;
        case '7':
            return 'Minggu';
            break;        
        default:
            return '';
            break;
    }
}
function get_day_kode($id){
    switch ($id) {
        case '1':
            return 'S';
            break;
        case '2':
            return 'S';
            break;
        case '3':
            return 'R';
            break;
        case '4':
            return 'K';
            break;
        case '5':
            return 'J';
            break;
        case '6':
            return 'S';
            break;
        case '7':
            return 'M';
            break;        
        default:
            return '';
            break;
    }
}
function excel_to_date($id){
    $value = $id->getValue();
    if($value<>''){
        if(PHPExcel_Shared_Date::isDateTime($id)){
            $data = PHPExcel_Shared_Date::ExcelToPHP($value);
            $date = date('Y-m-d',$data);            
        }else if(date_create($value)){
            $date = date_format(date_create($value),'Y-m-d');
        }else{
            $date = '0000-00-00';
        }
    }else{
        $date = '0000-00-00';
    }
    return $date;
}
function date_to_excel($id){
    if($id<>'0000-00-00'){
        $a = date_create($id);
        $d = date_format($a,'d');
        $m = date_format($a,'m');
        $y = date_format($a,'Y');
        $date = gmmktime(0,0,0,$m,$d,$y); 
    }else{
        $date = '';
    }
    return $date;
}
function candidate_status(){
    $data = array(
        ''=>' - Status - ',
        'Connect'=>array(
            '11'=>'Connect to Candidate',
            '12'=>'Connect to Receptionist',
            '13'=>'Disconnected'
        ),
        'Not Connect'=>array(
            '21'=>'No Answer',
            '22'=>'Busy',
            '23'=>'Tulalit'
        )
    );
    return $data;
}
function get_dd(){
    $i = 1;
    $data[''] = '- Tanggal -';
    for($i=1;$i<=31;$i++){
        $data[$i] = $i;
    }
    return $data;
}
function get_mm(){    
    $data = array(
        ''=>'- Bulan -',
        '1'=>'Januari',
        '2'=>'Februari',
        '3'=>'Maret',
        '4'=>'April',
        '5'=>'Mei',
        '6'=>'Juni',
        '7'=>'Juli',
        '8'=>'Agustus',
        '9'=>'September',
        '10'=>'Oktober',
        '11'=>'November',
        '12'=>'Desember'
    );
    return $data;
}
function calcutate_age($dob){
    $dob = date("Y-m-d",strtotime($dob));

    $dobObject = new DateTime($dob);
    $nowObject = new DateTime();

    $diff = $dobObject->diff($nowObject);

    return $diff->y;
}
function format_uang($str)
{
    return str_replace(',', '', $str);
}
function opt_year()
{
    $return[''] = '- Tahun -';
    for($i=date('Y');$i>=date('Y')-5;$i--){
        $return[$i] = $i;  
    }
    return $return;
}