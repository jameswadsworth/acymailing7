<div id="acym__list__settings" class="acym__content <?php echo !empty($data['menuClass']) ? acym_escape($data['menuClass']) : ''; ?>">
	<form id="acym_form" action="<?php echo acym_completeLink(acym_getVar('cmd', 'ctrl')); ?>" method="post" name="acyForm" data-abide novalidate>
		<div class="cell grid-x text-right grid-margin-x margin-left-0 margin-right-0 align-right  margin-bottom-1">
            <?php include acym_getView('lists', 'settings_actions'); ?>
		</div>
		<div class="acym__content margin-top-1">
            <?php
            $workflow = $data['workflowHelper'];
            echo $workflow->displayTabs(
                $this->tabs,
                $data['currentTab'],
                [
                    'query' => '&listId='.acym_escape($data['listInformation']->id).'&task=settings&step=',
                    'disableTabs' => empty($data['listInformation']->id) ? $this->disableTabs : [],
                ]
            ); ?>
            <?php
            if ($data['currentTab'] === $data['tabs']['general']) { ?>
				<div class="grid-x margin-bottom-1 grid-margin-x">
					<div class="cell grid-x margin-bottom-1 xlarge-5 small-12 acym__content margin-y">
                        <?php include acym_getView('frontlists', 'settings_information'); ?>
					</div>
					<div class="cell grid-x margin-bottom-1 xlarge-7 small-12 text-center">
                        <?php include acym_getView('lists', 'settings_overview', true); ?>
					</div>
					<div class="cell grid-x align-middle text-center acym__list__settings__stats acym__content margin-0 margin-bottom-1">
                        <?php include acym_getView('lists', 'settings_statistics', true); ?>
					</div>
				</div>
                <?php acym_trigger('onListSetting', [$data]); ?>
            <?php } elseif ($data['currentTab'] === $data['tabs']['subscribers']) { ?>
                <?php include acym_getView('lists', 'settings_subscribers', true); ?>
            <?php } elseif ($data['currentTab'] === $data['tabs']['unsubscriptions']) { ?>
				<div class="cell grid-x align-middle text-center acym__list__settings__stats acym__content margin-top-1">
                    <?php include acym_getView('lists', 'unsubscribe_reasons', true); ?>
				</div>
            <?php }
            ?>
		</div>

		<input type="hidden" name="listId" value="<?php echo acym_escape($data['listInformation']->id); ?>">
		<input type="hidden" name="list[welcome_id]" value="<?php echo acym_escape($data['listInformation']->welcome_id); ?>">
		<input type="hidden" name="list[unsubscribe_id]" value="<?php echo acym_escape($data['listInformation']->unsubscribe_id); ?>">
		<input type="hidden" name="step" value="<?php echo acym_escape($data['currentTab']); ?>">
        <?php acym_formOptions(true, 'settings'); ?>
	</form>
</div>
