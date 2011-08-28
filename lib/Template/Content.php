<?php

include_once dirname(__FILE__) . '/../Path.php';
include_once dirname(__FILE__) . '/../Vendor/markdown.class.php';

class Template_Content {

	protected $_folder;
	protected $_config;
	protected $_pageslookup;

	public function __construct($folder, $config){
		$this->_folder = $folder;
		$this->_config = $config;
		$this->_flattenPagesLookup($config['pages']);
	}

	protected function _flattenPagesLookup($pages, $base = ''){
		foreach ($pages as $slug => $page){
			$slug = ($base ? ($base . '/') : '') . $slug;
			$this->_pageslookup[$slug] = $page;
			if (!empty($page['children'])) $this->_flattenPagesLookup($page['children'], $slug);
		}
	}

	public function chapter($path){
		if (!isset($this->_pageslookup[$path])) return false;
		$page = $this->_pageslookup[$path];
		$children = !empty($page['children']) ? $page['children'] : array();
		array_unshift($children, array(
			'name' => $page['name'],
			'filename' => $page['filename']
		));
		if (!count($children)) return false;
		$html = '';
		foreach ($children as $slug => $child){
			$_page = $this->section($path . '/' . $slug);
			$html .= $_page['content'];
		}
		$page['content'] = $html;
		return $page;
	}

	public function section($section){
		if (empty($this->_pageslookup[$section])) return false;
		$page = $this->_pageslookup[$section];
		$file = Path::resolve($this->_folder, $page['filename']);
		$md = file_get_contents($file);

		$parser = new MarkdownExtra_Parser();
		$parser->no_markup = true;
		$page['content'] = $parser->transform($md);

		return $page;
	}

}