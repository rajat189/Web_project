<?php
$settings['img_ext'] = array('.jpg','.gif','.png');
$settings['display_type'] = 1;
$settings['allow_otf'] = 1;
if ($settings['allow_otf'] && isset($_GET['type']))
{
	$type = intval($_GET['type']);
}
else
{
	$type = $settings['display_type'];
}
if ($settings['allow_otf'] && isset($_GET['folder']))
{
	$folder = htmlspecialchars(trim($_GET['folder']));
    if (!is_dir($folder))
    {
    	$folder = $settings['img_folder'];
    }
}
else{$folder = $settings['img_folder'];}

if (substr($folder,-1) != '/'){$folder.='/';}
$flist = array();
foreach($settings['img_ext'] as $ext)
{
    $tmp = glob($folder.'*'.$ext);
    if (is_array($tmp)){$flist = array_merge($flist,$tmp);}
}
if (count($flist)){$src = $flist[array_rand($flist)];}
else{$src = 'noimg.gif';}

if ($type){header('Location:'.$src);exit();}
else{echo $src;}
?>
