<form name="adminForm" action="<?php echo JURI::base(true) . '/?option=com_virtuemart_exportceneoxml';?>" method="post" id="virtuemart_exportcenoexml_config_form">
    <fieldset class="adminform">
        <legend>Konfiguracja Ceneo</legend>
        <ul class="adminformlist">
            <li>
                <label id="jform_active-lbl" for="jform_active">Aktywny</label>
                <input <?php if($this->config->active):?>checked="checked"<?php endif;?> type="checkbox" name="jform[active]" id="jform_active" value="1" class="inputbox">
            </li>
            <li>
                <label>Url</label>
                <input type="text" name="jform[url]" size="100" value="<?php echo JURI::root(false) . '?option=com_virtuemart_exportceneoxml';?>" class="readonly" readonly="readonly"> 
            </li>
        </ul>
    </fieldset>
    <input type="hidden" name="task" value="" />
</form>