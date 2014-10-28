<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @copyright	Tim Gatzky 2014
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package		form_pdf_notification_center
 * @link		http://contao.org
 * @license		http://www.gnu.org/licenses/lgpl-3.0.html LGPL
 */

/**
 * Load language files
 */
\System::loadLanguageFile('tl_form');
\System::loadLanguageFile('tl_nc_gateway');


/**
 * Selectors
 */
$GLOBALS['TL_DCA']['tl_nc_language']['palettes']['__selector__'][] = 'form_pdf';


/**
 * Palettes
 */
$GLOBALS['TL_DCA']['tl_nc_language']['palettes']['email'] = str_replace
(
	'attachment_tokens',	
	'attachment_tokens,form_pdf',
	$GLOBALS['TL_DCA']['tl_nc_language']['palettes']['email']
);


/**
 * Subpalettes
 */
$GLOBALS['TL_DCA']['tl_nc_language']['subpalettes']['form_pdf'] = 'form_pdf_plugin,form_pdf_template';


/**
 * Fields
 */
$GLOBALS['TL_DCA']['tl_nc_language']['fields']['form_pdf'] = array
(
	'label'					  => &$GLOBALS['TL_LANG']['tl_nc_language']['form_pdf'],
	'exclude'                 => true,
	'inputType'               => 'checkbox',
	'eval'                    => array('tl_class'=>'clr','submitOnChange'=>true),
	'sql'					  => "char(1) NOT NULL default ''",
);

$GLOBALS['TL_DCA']['tl_nc_language']['fields']['form_pdf_template'] = array
(
	'label'					  => &$GLOBALS['TL_LANG']['tl_form']['form_pdf_template'],
	'exclude'                 => true,
	'inputType'               => 'select',
	'options_callback'        => array('TableFormFormPDF', 'getPdfTemplates'),
	'eval'                    => array('tl_class'=>'w50'),
	'sql'					  => "varchar(64) NOT NULL default ''",
);

$GLOBALS['TL_DCA']['tl_nc_language']['fields']['form_pdf_plugin'] = array
(
	'label'					  => &$GLOBALS['TL_LANG']['tl_form']['form_pdf_plugin'],
	'exclude'                 => true,
	'inputType'               => 'select',
	'options'				  => array('tcpdf','dompdf'),
	'reference'               => &$GLOBALS['TL_LANG']['tl_form']['form_pdf_plugin'],
	'eval'                    => array('tl_class'=>'w50'),
	'sql'					  => "varchar(32) NOT NULL default ''",
);