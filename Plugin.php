<?php

namespace Kanboard\Plugin\CardPushDate;

use Kanboard\Core\Plugin\Base;

class Plugin extends Base
{
    public function initialize()
    {
        $this->template->hook->attach('template:search:task:footer', 'CardPushDate:layout/footer');
        $this->template->hook->attach('template:dashboard:task:footer', 'CardPushDate:layout/footer');
        $this->template->hook->attach('template:board:task:footer', 'CardPushDate:layout/footer');
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
        return 'https://github.com/dmorlitz/CardPushDate';
    }
}
?>
