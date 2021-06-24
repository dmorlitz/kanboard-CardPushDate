<?php
namespace Kanboard\Plugin\CardPushDate\Controller;
use Kanboard\Controller\BaseController;

/**
 *
 * @author   Max Eisel
 */
class CardPushSettingsController extends BaseController
{
    /**
     * Card Push Action Settings
     *
     * @access public
     * @param array $values
     * @param array $errors
     */
    public function show(array $values = array(), array $errors = array())
    {
	    $project = $this->getProject();
	    $columnList =  $this->columnModel->getList($project['id']);
	    $colorList =  $this->colorModel->getList($project['id']);
	    $tagList =  $this->tagModel->getAll($project['id']);

	$this->response->html($this->helper->layout->project('CardPushDate:settings', array(
	//$this->response->html($this->helper->layout->project('project_edit/show', array(
            'owners' => $this->projectUserRoleModel->getAssignableUsersList($project['id'], true),
	    'values' => array(
                'CardPushDate_interval_1'   => $this->projectMetadataModel->get($project['id'], 'CardPushDate_interval_1'),
                'CardPushDate_interval_2'   => $this->projectMetadataModel->get($project['id'], 'CardPushDate_interval_2'),
                'CardPushDate_interval_3'   => $this->projectMetadataModel->get($project['id'], 'CardPushDate_interval_3'),
                'CardPushDate_push_time'   => $this->projectMetadataModel->get($project['id'], 'CardPushDate_push_time'),
                'CardPushDate_interval_1_randomize'   => $this->projectMetadataModel->get($project['id'], 'CardPushDate_interval_1_randomize'),
                'CardPushDate_interval_2_randomize'   => $this->projectMetadataModel->get($project['id'], 'CardPushDate_interval_2_randomize'),
                'CardPushDate_interval_3_randomize'   => $this->projectMetadataModel->get($project['id'], 'CardPushDate_interval_3_randomize'),
                'CardPushDate_interval_Monday'   => $this->projectMetadataModel->get($project['id'], 'CardPushDate_interval_Monday'),
                'CardPushDate_show_add_comment'   => $this->projectMetadataModel->get($project['id'], 'CardPushDate_show_add_comment'),
                'CardPushDate_show_comment'   => $this->projectMetadataModel->get($project['id'], 'CardPushDate_show_comment'),
                'CardPushDate_show_edit'   => $this->projectMetadataModel->get($project['id'], 'CardPushDate_show_edit'),
                'CardPushDate_show_close'   => $this->projectMetadataModel->get($project['id'], 'CardPushDate_show_close'),
                'CardPushDate_show_move'   => $this->projectMetadataModel->get($project['id'], 'CardPushDate_show_move'),
                'project_id' => $_REQUEST['project_id'],
		),
            'errors' => $errors,
            'columns_list' => $columnList,
	    'destination' => $destinationColumn,
            'project' => $project,
            'title' => t('Edit project')
        )));
    }

    public function save()
    {

	    $values = $this->request->getValues();
	    $errors = array();
	    $project = $this->getProject();
	    $columnList =  $this->columnModel->getList($project['id']);

            // validate the 24hour format of time before saving
            $time_check = preg_match('#^([01]?[0-9]|2[0-3]):[0-5][0-9]$#', $values["CardPushDate_push_time"]);
            if ( $time_check !== 1 ) { $values["CardPushDate_push_time"] = "00:01"; }

	    $this->projectMetadataModel->save($project['id'], array('CardPushDate_interval_1' => $values["CardPushDate_interval_1"]));
	    $this->projectMetadataModel->save($project['id'], array('CardPushDate_interval_2' => $values["CardPushDate_interval_2"]));
	    $this->projectMetadataModel->save($project['id'], array('CardPushDate_interval_3' => $values["CardPushDate_interval_3"]));
	    $this->projectMetadataModel->save($project['id'], array('CardPushDate_push_time' => $values["CardPushDate_push_time"]));
	    $this->projectMetadataModel->save($project['id'], array('CardPushDate_interval_1_randomize' => $values["CardPushDate_interval_1_randomize"]));
	    $this->projectMetadataModel->save($project['id'], array('CardPushDate_interval_2_randomize' => $values["CardPushDate_interval_2_randomize"]));
	    $this->projectMetadataModel->save($project['id'], array('CardPushDate_interval_3_randomize' => $values["CardPushDate_interval_3_randomize"]));
	    $this->projectMetadataModel->save($project['id'], array('CardPushDate_interval_Monday' => $values["CardPushDate_interval_Monday"]));
	    $this->projectMetadataModel->save($project['id'], array('CardPushDate_show_add_comment' => $values["CardPushDate_show_add_comment"]));
	    $this->projectMetadataModel->save($project['id'], array('CardPushDate_show_comment' => $values["CardPushDate_show_comment"]));
	    $this->projectMetadataModel->save($project['id'], array('CardPushDate_show_edit' => $values["CardPushDate_show_edit"]));
	    $this->projectMetadataModel->save($project['id'], array('CardPushDate_show_close' => $values["CardPushDate_show_close"]));
	    $this->projectMetadataModel->save($project['id'], array('CardPushDate_show_move' => $values["CardPushDate_show_move"]));

            //DMM: Settings panels seem to remain on the panel after saving - so I disabled this redirect back to the board
            //$this->response->redirect($this->helper->url->to('BoardViewController', 'show', array('project_id' => $project['id'])), true);
	    return $this->show($values, $errors);
    }

}

?>

