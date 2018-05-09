<?php
namespace Kanboard\Plugin\CardPushDate\Controller;
use Kanboard\Controller\BaseController;
use Kanboard\Core\Controller\AccessForbiddenException;
use Kanboard\Model\TaskModel;
use Kanboard\Formatter\BoardFormatter;

class CardPushDateController extends BaseController
{
    //public function cancel(array $values = array(), array $errors = array())
    public function push()
    {
	$method = "asd";
	$template = 'CardPushDate:push_due_date';
	$success_message = 'Task pushed successfully.';
	$failure_message = 'Unable to push this task.';

	$project = $this->getProject();
	$task = $this->getTask();

	if ($this->request->getStringParam('confirmation') === 'yes') {
            $this->checkCSRFParam();

		$values = array();
		$valuesx = $task;
		$tagsx = $this->taskTagModel->getTagsByTask($task['id']);
		$values['id'] = $valuesx['id'];
		$values['title'] = $valuesx['title'];

	if (true){
//DMM
		$values['date_due'] = date('Y-m-d', strtotime("+" . $this->request->getStringParam('push_days') . " days"));
//DMM
		$this->taskModificationModel->update($values);
                $this->flash->success($success_message);
            } else {
                $this->flash->failure($failure_message);
            }

            $this->response->redirect($this->helper->url->to('BoardViewController', 'show', array('task_id' => $task['id'], 'project_id' => $task['project_id'])), true);
        } else {
            $this->response->html($this->template->render($template, array(
                'task' => $task,
            )));
        }
    }
}
