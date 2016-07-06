<?php

require_once INCLUDE_DIR . 'class.plugin.php';
require_once INCLUDE_DIR . 'class.dept.php';


class SlackPluginConfig extends PluginConfig {
    function getOptions() {  

        $return_array = array(
            'slack' => new SectionBreakField(array(
                'label' => 'Slack notifier',
            )),
            'slack-webhook-url' => new TextboxField(array(
                'label' => 'Webhook URL',
                'configuration' => array('size'=>100, 'length'=>200),
            )),
			'slack-bot-name' => new TextboxField(array(
                'label' => 'Name for slack bot',
                'configuration' => array('size'=>100, 'length'=>200),
            )),
            'slack-icon' => new TextboxField(array(
                'label' => 'URL for slack bot avatar',
				'configuration' => array('size'=>100, 'length'=>200),
            )),
            'slack-channel' => new SectionBreakField(array(
                'label' => 'Send message to Slack channel / user',
            ))
        );

        $depts = Dept::getDepartments();        
        
        foreach ($depts as $key => $value) {
            $return_array['channel-'.$key] = new TextboxField(array(
                    'label' => $value,
                    'configuration' => array('size'=>100, 'length'=>200),
            ));
        }
        
        return $return_array;
    }	
}
