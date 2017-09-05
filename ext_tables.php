<?php
use \TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
use \TYPO3\CMS\Core\Utility\GeneralUtility;

	if (!defined ('TYPO3_MODE')) die ('Access denied.');

	if (TYPO3_MODE == 'BE') {
		ExtensionManagementUtility::addModule('tools', 'txnawsinglesignonM1', '', ExtensionManagementUtility::extPath($_EXTKEY).'mod1/');
	}

	//GeneralUtility::loadTCA('tt_content');

	$TCA['tt_content']['types']['list']['subtypes_excludelist'][$_EXTKEY.'_pi1'] = 'layout,select_key,pages';
	$TCA['tt_content']['types']['list']['subtypes_addlist'][$_EXTKEY.'_pi1'] = 'pi_flexform';

	ExtensionManagementUtility::addPiFlexFormValue($_EXTKEY.'_pi1', 'FILE:EXT:naw_single_signon/flexform_ds.xml');
	ExtensionManagementUtility::addPlugin(Array('LLL:EXT:naw_single_signon/locallang_tca.php:naw_single_signon', 'naw_single_signon_pi1'));

	include_once(ExtensionManagementUtility::extPath('naw_single_signon') . 'class.tx_nawsinglesignon_usermapping.php');
	if (TYPO3_MODE == 'BE') $TBE_MODULES_EXT['xMOD_db_new_content_el']['addElClasses']['tx_nawsinglesignon_pi1_wizicon'] = ExtensionManagementUtility::extPath($_EXTKEY).'pi1/class.tx_nawsinglesignon_pi1_wizicon.php';
?>
