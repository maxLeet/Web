<?php
namespace Application\Web;

define('DEFAULT_URL', 'google.com');
define('DEFAULT_TAG', 'img');

require (__DIR__ . '/../../Autoload/Loader.php');


class Deep
{
	protected $domain;

	public function scan($url, $tag)
	{
		$vac = new Hoover();
		$scan = $vac->getAttribute($url, 'href', $result = array());
		
		foreach($scan as $subSite){
			yield from $vac->getTags($subSite, $tag);
		}
		return count($scan);
	}

	public function getDomain($url)
	{
		if($this->domain){
			$this->domain = parse_url($url, PHP_URL_HOST);
		}
		return $this->domain;
	}

}


