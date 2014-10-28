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

/**
 * Selectors
 */
$GLOBALS['TL_DCA']['tl_nc_gateway']['palettes']['__selector__'][] = 'form_pdf_save';

/**
 * Palettes
 */
$GLOBALS['TL_DCA']['tl_nc_gateway']['palettes']['form_pdf'] = $GLOBALS['TL_DCA']['tl_nc_gateway']['palettes']['default'].';{gateway_legend},file_name,form_pdf_save;{form_pdf_legend},form_pdf_plugin,form_pdf_template';

/**
 * Subpalettes
 */
$GLOBALS['TL_DCA']['tl_nc_gateway']['subpalettes']['form_pdf_save'] = 'file_path';

/**
 * Fields
 */
$GLOBALS['TL_DCA']['tl_nc_gateway']['fields']['form_pdf_template'] = array
(
	'label'					  => &$GLOBALS['TL_LANG']['tl_form']['form_pdf_template'],
	'exclude'                 => true,
	'inputType'               => 'select',
	'options_callback'        => array('TableFormFormPDF', 'getPdfTemplates'),
	'eval'                    => array(),
	'sql'					  => "varchar(64) NOT NULL default ''",
);

$GLOBALS['TL_DCA']['tl_nc_gateway']['fields']['form_pdf_plugin'] = array
(
	'label'					  => &$GLOBALS['TL_LANG']['tl_form']['form_pdf_plugin'],
	'exclude'                 => true,
	'inputType'               => 'select',
	'options'				  => array('tcpdf','dompdf'),
	'reference'               => &$GLOBALS['TL_LANG']['tl_form']['form_pdf_plugin'],
	'eval'                    => array('tl_class'=>'w50 clr'),
	'sql'					  => "varchar(32) NOT NULL default ''",
);

$GLOBALS['TL_DCA']['tl_nc_gateway']['fields']['form_pdf_save'] = array
(
	'label'					  => &$GLOBALS['TL_LANG']['tl_nc_gateway']['form_pdf_save'],
	'exclude'                 => true,
	'inputType'               => 'checkbox',
	'eval'                    => array('tl_class'=>'w50 clr','submitOnChange'=>true),
	'sql'					  => "char(1) NOT NULL default ''",
);

if(!is_array($GLOBALS['TL_DCA']['tl_nc_gateway']['fields']['file_name']))
{
	$GLOBALS['TL_DCA']['tl_nc_gateway']['fields']['file_name'] = array
	(
		'label'					  => &$GLOBALS['TL_LANG']['tl_nc_gateway']['file_name'],
		'exclude'                 => true,
		'inputType'               => 'text',
		'eval'                    => array('tl_class'=>''),
		'sql'					  => "varchar(255) NOT NULL default ''",
	);
}