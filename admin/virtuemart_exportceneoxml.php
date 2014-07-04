<?php


defined('_JEXEC') or die;


if (!class_exists( 'VmConfig' )){
    require(JPATH_ADMINISTRATOR . DS . 'components' . DS . 'com_virtuemart' . DS . 'helpers' . DS . 'config.php');
}

VmConfig::loadConfig();



// Launch the controller.
$controller = JControllerLegacy::getInstance('Virtuemartexportceneoxml');
$controller->execute(JRequest::getCmd('task', 'display'));
$controller->redirect();

