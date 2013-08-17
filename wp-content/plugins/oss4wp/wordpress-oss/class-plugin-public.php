<?php
/*
$Date: 2012-09-07 12:40:03 +0800 $
$Author: enj0y $
*/
class Enj0yWordPressossPluginPublic {
    var $options;
    var $oss;
	var $meta;

	function Enj0yWordPressossPluginPublic() {
		$this->options = array();
		if (file_exists(dirname(__FILE__).'/config.php')) {
			require_once(dirname(__FILE__).'/config.php');
			if ($Enj0yWordPressossConfig) $this->options = $Enj0yWordPressossConfig;
		}else{
			$this->options = get_option('enj0y_wordpress_oss');
		}
		add_action('plugins_loaded', array(&$this, 'addhooks'));
	}
    function addhooks() {
		add_filter('wp_get_attachment_url', array(&$this, 'wp_get_attachment_url'), 9, 2);
	}

	function wp_get_attachment_url($url, $postID) {

		/*$x=split ("/", $url);
		$max=count($x)-1;
		$p=$x[($max-2)]."/".$x[($max-1)]."/";

		if (!$this->options) $this->options = get_option('enj0y_wordpress_oss');
        
        if ($this->options['wp-uploads'] && ($alioss = get_post_meta($postID, 'aliyunoss_info', true))) {
            $accessDomain=$this->options['cname']?$this->options['cname']:'oss.aliyuncs.com';
            return 'http://'.$accessDomain.'/'.$alioss['bucket'].'/'.$p.basename($alioss['key']);
        } else {
            return $url;
        }*/
		//print_r($this->options);die();
		$alioss = get_post_meta($postID, 'aliyunoss_info', true);
		$accessDomain=$this->options['cname']?$this->options['cname']:'oss.aliyuncs.com';
		$a=explode('wp-content/uploads/',$url);
		return "http://".$accessDomain."/".$this->options['bucket']."/".$a[1];
		//return str_replace(,$accessDomain,$url);
    }
}
?>