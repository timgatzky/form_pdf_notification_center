<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2013 Leo Feyer
 *
 * @package form_pdf_notification_center
 * @link    https://contao.org
 * @license http://www.gnu.org/licenses/lgpl-3.0.html LGPL
 */

/**
 * Register the namespaces
 */
ClassLoader::addNamespaces(array
(
	'FormPDF',
));

/**
 * Register the classes
 */
ClassLoader::addClasses(array
(
	'FormPDF\FormPDFHelper' 	=> 'system/modules/form_pdf_notification_center/FormPDF/FormPDFHelper.php',
	'FormPDF\NotificationCenterGateway' 	=> 'system/modules/form_pdf_notification_center/FormPDF/NotificationCenterGateway.php',
));


#/**
# * Register the templates
# */
#TemplateLoader::addFiles(array
#(
#	'pdf_example_html'  	=> 'system/modules/form_pdf/templates',
#	'pdf_example_plain' 	=> 'system/modules/form_pdf/templates',
#));
