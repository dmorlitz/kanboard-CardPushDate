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

/*
	    if ( $this->projectMetadataModel->exists($project['id'], 'cancelColumn'))
	    {
		    if( empty($this->projectMetadataModel->get($project['id'], 'cancelColumn')))
		    {
                // cancelColumn does not exist
			    $this->projectMetadataModel->save($project['id'], 
				    array('cancelColumn' => $this->columnModel->getLastColumnID($project['id'])));
		    }
	    }else{
		    // cancelColum does not exist
		    $this->projectMetadataModel->save($project['id'], 
			    array('cancelColumn' => $this->columnModel->getLastColumnID($project['id'])));
	    }
	    if ( $this->projectMetadataModel->exists($project['id'], 'cancelColor'))
	    {
		    if ( empty($this->projectMetadataModel->get($project['id'], 'cancelColor')))
		    {
                // cancelColor does not exist
                $this->projectMetadataModel->save($project['id'],
				    array('cancelColor' => $this->colorModel->find( $this->colorModel->getDefaultColor()))); 
		    }
	    }else{
		    // cancelColor does not exist
		    $this->projectMetadataModel->save($project['id'],
			    array('cancelColor' => $this->colorModel->find( $this->colorModel->getDefaultColor()))); 
	    }

	    $destinationColumn 	= $this->projectMetadataModel->get($project['id'], 'cancelColumn');
	    $cancelColor 	= $this->projectMetadataModel->get($project['id'], 'cancelColor');
	    $cancelTags  	= $this->projectMetadataModel->get($project['id'], 'cancelTags');
		    

	
*/

        $this->response->html($this->helper->layout->project('CardPushDate:settings', array(
	//$this->response->html($this->helper->layout->project('project_edit/show', array(
            'owners' => $this->projectUserRoleModel->getAssignableUsersList($project['id'], true),
	    'values' => array(
                'CardPushDate_interval_1'   => $this->projectMetadataModel->get($project['id'], 'CardPushDate_interval_1'),
                'CardPushDate_interval_2'   => $this->projectMetadataModel->get($project['id'], 'CardPushDate_interval_2'),
                'CardPushDate_interval_3'   => $this->projectMetadataModel->get($project['id'], 'CardPushDate_interval_3'),
                'CardPushDate_interval_1_randomize'   => $this->projectMetadataModel->get($project['id'], 'CardPushDate_interval_1_randomize'),
                'CardPushDate_interval_2_randomize'   => $this->projectMetadataModel->get($project['id'], 'CardPushDate_interval_2_randomize'),
                'CardPushDate_interval_3_randomize'   => $this->projectMetadataModel->get($project['id'], 'CardPushDate_interval_3_randomize'),
                'CardPushDate_show_add_comment'   => $this->projectMetadataModel->get($project['id'], 'CardPushDate_show_add_comment'),
                'CardPushDate_show_comment'   => $this->projectMetadataModel->get($project['id'], 'CardPushDate_show_comment'),
                'CardPushDate_show_comment_in_dropdown'   => $this->projectMetadataModel->get($project['id'], 'CardPushDate_show_comment_in_dropdown'),
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

	    $this->projectMetadataModel->save($project['id'], array('CardPushDate_interval_1' => $values["CardPushDate_interval_1"]));
	    $this->projectMetadataModel->save($project['id'], array('CardPushDate_interval_2' => $values["CardPushDate_interval_2"]));
	    $this->projectMetadataModel->save($project['id'], array('CardPushDate_interval_3' => $values["CardPushDate_interval_3"]));
	    $this->projectMetadataModel->save($project['id'], array('CardPushDate_interval_1_randomize' => $values["CardPushDate_interval_1_randomize"]));
	    $this->projectMetadataModel->save($project['id'], array('CardPushDate_interval_2_randomize' => $values["CardPushDate_interval_2_randomize"]));
	    $this->projectMetadataModel->save($project['id'], array('CardPushDate_interval_3_randomize' => $values["CardPushDate_interval_3_randomize"]));
	    $this->projectMetadataModel->save($project['id'], array('CardPushDate_show_add_comment' => $values["CardPushDate_show_add_comment"]));
	    $this->projectMetadataModel->save($project['id'], array('CardPushDate_show_comment' => $values["CardPushDate_show_comment"]));
	    $this->projectMetadataModel->save($project['id'], array('CardPushDate_show_comment_in_dropdown' => $values["CardPushDate_show_comment_in_dropdown"]));
	    $this->projectMetadataModel->save($project['id'], array('CardPushDate_show_edit' => $values["CardPushDate_show_edit"]));
	    $this->projectMetadataModel->save($project['id'], array('CardPushDate_show_close' => $values["CardPushDate_show_close"]));
	    $this->projectMetadataModel->save($project['id'], array('CardPushDate_show_move' => $values["CardPushDate_show_move"]));

            //DMM: Settings panels seem to remain on the panel after saving - so I disabled this redirect back to the board
            //$this->response->redirect($this->helper->url->to('BoardViewController', 'show', array('project_id' => $project['id'])), true);
	    return $this->show($values, $errors);
    }

}

?>

