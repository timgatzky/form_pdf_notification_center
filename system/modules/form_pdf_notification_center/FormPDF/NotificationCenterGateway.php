<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (C) 2005-2013 Leo Feyer
 *
 * @copyright Tim Gatzky 2014
 * @author  Tim Gatzky <info@tim-gatzky.de>
 * @package  form_pdf_notification_center
 * @link  http://contao.org
 * @license  http://www.gnu.org/licenses/lgpl-3.0.html LGPL
 */

/**
 * Namespace
 */
namespace FormPDF;

/**
 * Imports
 */
use NotificationCenter\Model\Language;
use NotificationCenter\Model\Message;
use FormPDF\FormPDFHelper;

/**
 * Class file
 * NotificationCenterGateway
 */
class NotificationCenterGateway extends \NotificationCenter\Gateway\Base implements \NotificationCenter\Gateway\GatewayInterface
{
	/**
	 * Print the pdf
	 * @param object
	 * @param array
	 * @param string
	 * @return boolean
	 */
	public function send(Message $objMessage, array $arrTokens, $strLanguage = '')
	{
		$objGateway = $this->getModel();
		
		if(strlen($this->file_name) > 0)
		{
			$GLOBALS['FORM_PDF']['filename'] = $this->file_name;
		}
		
		if(strlen($this->file_path) > 0)
		{
			$GLOBALS['FORM_PDF']['path'] = TL_ROOT.'/'.$this->file_path;
		}
		
		$arrTokens['form_pdf'] = true;
		$arrTokens['form_pdf_plugin'] = $objGateway->form_pdf_plugin ?: 'dompdf';
		$arrTokens['form_pdf_template'] = $objGateway->form_pdf_template ?: 'pdf_example_html';
		$arrTokens['form_pdf_attachment'] = $objGateway->form_pdf_save;
		
		$objFormPDF = new FormPDFHelper();
		$objFormPDF->processFormData($arrTokens,$arrTokens,$arrFiles);
	}


	/**
	 * Strip array keys
	 * @param array
	 * @param string
	 * @return array
	 */
	protected function stripNcKeys($arrInput, $strPrefix)
	{
		if(count($arrInput) < 1)
		{
			return array();
		}

		$arrReturn = array();
		foreach($arrInput as $k => $v)
		{
			// strip only first appearance
			$n = implode('',explode($strPrefix, $k, 2)); #str_replace($strPrefix,'',$k);
			$arrReturn[$n] = $v;
		}

		return $arrReturn;
	}
}