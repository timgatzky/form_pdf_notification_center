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
	 * Print the pdf and either save it or send it directly to the browser
	 * @param object
	 * @param array
	 * @param string
	 * @return boolean
	 */
	public function send(Message $objMessage, array $arrTokens, $strLanguage = '')
	{
		$objGateway = $this->getModel();
		
		$strPath = $GLOBALS['FORM_PDF']['path'];
		if(strlen($this->file_path) > 0)
		{
		   $strPath = TL_ROOT.'/'.$this->file_path;
		}
		
		$objFormPDF = new FormPDFHelper();
		$objFormPDF->strPlugin = $objGateway->form_pdf_plugin ?: 'dompdf';
		$objFormPDF->strTemplate = $objGateway->form_pdf_template ?: 'pdf_example_html';
		
		// output template
		$objTemplate = new \FrontendTemplate($this->form_pdf_template);
		$objTemplate->setData($this->arrData);
		$objTemplate->fields = $arrTokens;

		$strHtml = $objTemplate->parse();

		// print pdf and save it
		if($objGateway->form_pdf_save)
		{
			$strPdf = $objFormPDF->printPDFtoFile($strHtml,$strPath,$this->fileTitle,false);
			return true;
		}
		// print pdf and send to browser
		else
		{
			$strPdf = $objFormPDF->printPDFtoBrowser($strHtml,$this->file_name);
			return true;
		}
		
		return false;
	}
}