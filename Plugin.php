<?php

namespace Kanboard\Plugin\CardPushDate;

use Kanboard\Core\Plugin\Base;

class Plugin extends Base
{
    public function initialize()
    {
        $CardPushDate_interval_1_randomize = "0";
        if (!empty($this->projectMetadataModel->get($_REQUEST['project_id'], 'CardPushDate_interval_1_randomize'))) {
           $CardPushDate_interval_1_randomize = $this->projectMetadataModel->get($_REQUEST['project_id'], 'CardPushDate_interval_1_randomize');
        }

        $CardPushDate_interval_2_randomize = "0";
        if (!empty($this->projectMetadataModel->get($_REQUEST['project_id'], 'CardPushDate_interval_2_randomize'))) {
           $CardPushDate_interval_2_randomize = $this->projectMetadataModel->get($_REQUEST['project_id'], 'CardPushDate_interval_2_randomize');
        }

        $CardPushDate_interval_3_randomize = "0";
        if (!empty($this->projectMetadataModel->get($_REQUEST['project_id'], 'CardPushDate_interval_3_randomize'))) {
           $CardPushDate_interval_3_randomize = $this->projectMetadataModel->get($_REQUEST['project_id'], 'CardPushDate_interval_3_randomize');
        }

        $CardPushDate_interval_1 = "0";
        if (!empty($this->projectMetadataModel->get($_REQUEST['project_id'], 'CardPushDate_interval_1'))) {
           $CardPushDate_interval_1 = $this->projectMetadataModel->get($_REQUEST['project_id'], 'CardPushDate_interval_1');
        }

        $CardPushDate_interval_2 = "0";
        if (!empty($this->projectMetadataModel->get($_REQUEST['project_id'], 'CardPushDate_interval_2'))) {
           $CardPushDate_interval_2 = $this->projectMetadataModel->get($_REQUEST['project_id'], 'CardPushDate_interval_2');
        }

        $CardPushDate_interval_3 = "0";
        if (!empty($this->projectMetadataModel->get($_REQUEST['project_id'], 'CardPushDate_interval_3'))) {
           $CardPushDate_interval_3 = $this->projectMetadataModel->get($_REQUEST['project_id'], 'CardPushDate_interval_3');
        }

        $this->template->hook->attach('template:board:task:footer', 'CardPushDate:layout/footer',
           array(
                  'CardPushDate_interval_1' => $CardPushDate_interval_1,
                  'CardPushDate_interval_2' => $CardPushDate_interval_2,
                  'CardPushDate_interval_3' => $CardPushDate_interval_3,
                  'CardPushDate_interval_1_randomize' => $CardPushDate_interval_1_randomize,
                  'CardPushDate_interval_2_randomize' => $CardPushDate_interval_2_randomize,
                  'CardPushDate_interval_3_randomize' => $CardPushDate_interval_3_randomize,
                )
        );

        $this->template->hook->attach('template:project:sidebar', 'CardPushDate:layout/sidebar');
        $this->template->hook->attach('template:task:dropdown', 'CardPushDate:layout/task/dropdown');
    }

    public function getPluginName()
    {
        return 'CardPushDate';
    }

    public function getPluginDescription()
    {
        return t('This plugin adds instant due date push actions to tasks in the board view.');
    }

    public function getPluginAuthor()
    {
        return 'David Morlitz';
    }

    public function getPluginVersion()
    {
        return '0.0.1';
    }

    public function getPluginHomepage()
    {
        return 'https://github.com/dmorlitz/CardPush';
    }
}
?>
