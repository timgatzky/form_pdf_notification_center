<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @copyright	Tim Gatzky 2014
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package		form_pdf_isotope
 * @link		http://contao.org
 * @license		http://www.gnu.org/licenses/lgpl-3.0.html LGPL
 */

/**
 * Namespace
 */
namespace FormPDF;

class FormPDFHelper extends \FormPDF
{
	/**
	 * Make form_pdf protected variables accessible
	 */
	public $strPlugin = 'dompdf';
	public $strTemplate = 'form_pdf_example';
	
	public function __construct() {parent::__construct();}
}