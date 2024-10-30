<?php
/*
Plugin Name: MagpieRSS Simplified
Plugin URI: http://www.vizioninteractive.com/
Description: MagpieRSS is already integrated with WordPress, this plugin will allow you to implement it easily within your theme.
Author: Vizion Interactive, Inc.
Version: 1.2.4
Author URI: http://www.vizioninteractive.com/
*/
function ms_magpierss($url,$args='',$empty='No articles available')
	{
		if(!is_array($args)){parse_str($args,$args);}
		if(!isset($args['title'])){$args['title']=1;}
		if(!isset($args['summary'])){$args['summary']=1;}
		if(!isset($args['p_limit'])){$args['p_limit']=1;}
		if(!isset($args['word_limit'])){$args['word_limit']=25;}
		if(!isset($args['count'])){$args['count']=5;}
		if(!isset($args['wrapper'])){$args['wrapper']=0;}
		if(!isset($args['list'])){$args['list']='li';}
		if(!isset($args['html'])){$args['html']=0;}
		if(!isset($args['target'])){$args['target']='_blank';}
		if($args['target']==0){$target='';}
		else{$target=" target=\"".$args['target']."\"";}
		if(!isset($args['action'])){$args['action']='&raquo';}
		if($args['action']==0){$action='';}
		else{$action=" ".$args['action'];}
		$ret = "";
		include_once(ABSPATH.WPINC.'/rss.php');
		$rss = fetch_rss($url);
		if($args['wrapper']!=0)
			{
				$ret .= "<".$args['wrapper'].">\n";
			}
		if($rss)
			{
				$x=0;
				foreach($rss->items as $item)
					{
						if($x<$args['count']||$args['count']==0)
							{
								$title = $item['title'];
								$url = $item['link'];
								$t = '';
								if($args['html']==0){$description = strip_tags($item['description']);}
								if($args['summary']==1){$description = ms_magpierss_summarize($description,$args);}
								if($args['title']==1){$t = ' title="'.$title.'"';}
								$ret .= "\t\t<".$args['list']."><a href=\"".$url."\"".$target.$t.">".$title.$action."</a>";
								if($args['summary']!=0){$ret .= "\n<br /><small>".str_replace("\n","<br />",$description)."</small>\n\t";}
								$ret .= "</".$args['list'].">\n";
								$x++;
							}
						else{break;}
					}
			}
		else
			{
				if($empty!=0)
					{
						$ret .= "\t<".$args['list'].">".$empty."</".$args['list'].">\n";
					}
			}
		if($args['wrapper']!=0)
			{
				$ret .= "</".$args['wrapper'].">\n";
			}
		return $ret;
	}
function ms_magpierss_summarize($text,$args='')
	{
		if(!is_array($args)){parse_str($args,$args);}
		if(!isset($args['summary'])){$args['summary']=1;}
		if(!isset($args['p_limit'])){$args['p_limit']=1;}
		if(!isset($args['word_limit'])){$args['word_limit']=25;}
		$ret = "";
		$paragraph = explode("\n",$text);
		for($x=0;$x<$limit;$x++)
			{
				$ret .= $paragraph[$x];
			}
		if($args['word_limit']>0&&$args['summary']==1)
			{
				$ret = ms_magpierss_summarize_paragraph($ret,$args);
			}
		return $ret."...";
	}
function ms_magpierss_summarize_paragraph($paragraph,$args='')
	{
		if(!is_array($args)){parse_str($args,$args);}
		if(!isset($args['word_limit'])){$args['word_limit']=25;}
		$text = "";
		$words=0;
		$textfield = strtok($paragraph," ");
		while($textfield)
			{
				$text .= " ".$textfield;
				$words++;
				if(($words>=$args['word_limit'])&&((substr($textfield,-1)=="!")||(substr($textfield,-1)=="."))){break;}
				$textfield = strtok(" ");
			}
		return trim($text);
	}
?>