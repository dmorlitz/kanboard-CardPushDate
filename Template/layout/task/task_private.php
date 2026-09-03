<?php
    $CardPushDate_show_comment = $this->task->projectMetadataModel->get($task['project_id'], "CardPushDate_show_comment");
    $CardPushDate_show_comment = ( intval($CardPushDate_show_comment) > 0 ) ? intval($CardPushDate_show_comment) : 0;

    $CardPushDate_show_comment_in_collapsed = $this->task->projectMetadataModel->get($task['project_id'], "CardPushDate_show_comment_in_collapsed");
    $CardPushDate_show_close_in_collapsed = $this->task->projectMetadataModel->get($task['project_id'], "CardPushDate_show_close_in_collapsed");

    $CardPushDate_show_subtask = $this->task->projectMetadataModel->get($task['project_id'], "CardPushDate_show_subtask");
    $CardPushDate_show_subtask = ( intval($CardPushDate_show_subtask) > 0 ) ? 1 : 0;

    $CardPushDate_show_age = $this->task->projectMetadataModel->get($task['project_id'], "CardPushDate_show_age");
    $CardPushDate_show_age = ( intval($CardPushDate_show_age) > 0 ) ? 1 : 0;
?>

<div class="
        task-board
        <?= $task['is_draggable'] ? 'draggable-item ' : '' ?>
        <?= $task['is_active'] == 1 ? 'task-board-status-open ' . ($task['date_modification'] > (time() - $board_highlight_period) ? 'task-board-recent' : '') : 'task-board-status-closed' ?>
        color-<?= $task['color_id'] ?>"
     data-task-id="<?= $task['id'] ?>"
     data-column-id="<?= $task['column_id'] ?>"
     data-swimlane-id="<?= $task['swimlane_id'] ?>"
     data-position="<?= $task['position'] ?>"
     data-owner-id="<?= $task['owner_id'] ?>"
     data-category-id="<?= $task['category_id'] ?>"
     data-due-date="<?= $task['date_due'] ?>"
     data-task-url="<?= $this->url->href('TaskViewController', 'show', array('task_id' => $task['id'], 'project_id' => $task['project_id'])) ?>">

    <div class="task-board-sort-handle" style="display: none;"><i class="fa fa-arrows-alt"></i></div>

    <?php if ($this->board->isCollapsed($task['project_id'])) : ?>
        <!--Switch to expanded to allow titles to wrap <div class="task-board-collapsed">-->
        <div class="task-board-expanded">
            <div class="task-board-saving-icon" style="display: none;"><i class="fa fa-spinner fa-pulse"></i></div>
            <?php if ($this->user->hasProjectAccess('TaskModificationController', 'edit', $task['project_id'])) : ?>
                <?= $this->render('task/dropdown', array('task' => $task, 'redirect' => 'board')) ?>
                <?= $this->modal->large('edit', '', 'TaskModificationController', 'edit', array('task_id' => $task['id'], 'project_id' => $task['project_id'])) ?>
            <?php else : ?>
                <strong><?= '#' . $task['id'] ?></strong>
            <?php endif ?>

            <?php if (! empty($task['assignee_username'])) : ?>
                <span title="<?= $this->text->e($task['assignee_name'] ?: $task['assignee_username']) ?>">
                    <?= $this->text->e($this->user->getInitials($task['assignee_name'] ?: $task['assignee_username'])) ?>
                </span> -
            <?php endif ?>

            <strong><?= $this->url->link($this->text->e($task['title']), 'TaskViewController', 'show', array('task_id' => $task['id'], 'project_id' => $task['project_id']), false, '', $this->text->e($task['title'])) ?></strong>
        </div>

        <?php //Display the last comment on the card - if requested by settings ?>

        <?php if ($this->user->hasProjectAccess('TaskModificationController', 'edit', $task['project_id'])) : ?>
            <?php if (! empty($task['date_due'])) : ?>
                <?php if ($task['recurrence_status'] == \Kanboard\Model\TaskModel::RECURRING_STATUS_PENDING) : ?>
                    <?= $this->app->tooltipLink('<i class="fa fa-refresh fa-rotate-90"></i>', $this->url->href('BoardTooltipController', 'recurrence', array('task_id' => $task['id'], 'project_id' => $task['project_id']))) ?>
                <?php endif ?>

                <span class="task-date
                    <?php if (time() > $task['date_due']) : ?>
                         task-date-overdue
                    <?php elseif (date('Y-m-d') == date('Y-m-d', $task['date_due'])) : ?>
                         task-date-today
                    <?php endif ?>
                    ">
                    <i class="fa fa-calendar"></i>
                    <?= $this->dt->datetime($task['date_due']) ?>
                </span>

                <?php if ($CardPushDate_show_age) : ?>
                    <span title="<?= t('Days since last modification')?>" class="task-icon-age-total"><span class="ui-helper-hidden-accessible"><?= t('Days since last modification') ?> </span><?= $this->dt->age($task['date_modification']) ?></span>
                <?php endif ?>
            <?php endif ?>

<!--"DMM DMM"-->
            <?php if ($this->user->hasProjectAccess('TaskModificationController', 'edit', $task['project_id'])) : ?>
                <?php
                 $CardPushDate_interval_1 = $this->task->projectMetadataModel->get($task['project_id'], "CardPushDate_interval_1");
                 $CardPushDate_interval_2 = $this->task->projectMetadataModel->get($task['project_id'], "CardPushDate_interval_2");
                 $CardPushDate_interval_3 = $this->task->projectMetadataModel->get($task['project_id'], "CardPushDate_interval_3");

                 $CardPushDate_push_time = $this->task->projectMetadataModel->get($task['project_id'], "CardPushDate_push_time");

                 $CardPushDate_interval_1 = ( intval($CardPushDate_interval_1) > 0 ) ? intval($CardPushDate_interval_1) : 0;
                 $CardPushDate_interval_2 = ( intval($CardPushDate_interval_2) > 0 ) ? intval($CardPushDate_interval_2) : 0;
                 $CardPushDate_interval_3 = ( intval($CardPushDate_interval_3) > 0 ) ? intval($CardPushDate_interval_3) : 0;

                 $CardPushDate_interval_1_randomize = $this->task->projectMetadataModel->get($task['project_id'], "CardPushDate_interval_1_randomize");
                 $CardPushDate_interval_2_randomize = $this->task->projectMetadataModel->get($task['project_id'], "CardPushDate_interval_2_randomize");
                 $CardPushDate_interval_3_randomize = $this->task->projectMetadataModel->get($task['project_id'], "CardPushDate_interval_3_randomize");

                 $CardPushDate_interval_1_randomize = ( intval($CardPushDate_interval_1_randomize) > 0 ) ? 1 : 0;
                 $CardPushDate_interval_2_randomize = ( intval($CardPushDate_interval_2_randomize) > 0 ) ? 1 : 0;
                 $CardPushDate_interval_3_randomize = ( intval($CardPushDate_interval_3_randomize) > 0 ) ? 1 : 0;

                 $CardPushDate_interval_Monday = $this->task->projectMetadataModel->get($task['project_id'], "CardPushDate_interval_Monday");
                 $CardPushDate_interval_PushDaysOnCard = $this->task->projectMetadataModel->get($task['project_id'], "CardPushDate_interval_PushDaysOnCard");
                 $CardPushDate_show_add_comment = $this->task->projectMetadataModel->get($task['project_id'], "CardPushDate_show_add_comment");
                 $CardPushDate_show_comment = $this->task->projectMetadataModel->get($task['project_id'], "CardPushDate_show_comment");
                 $CardPushDate_show_edit = $this->task->projectMetadataModel->get($task['project_id'], "CardPushDate_show_edit");
                 $CardPushDate_show_close = $this->task->projectMetadataModel->get($task['project_id'], "CardPushDate_show_close");
                 $CardPushDate_show_remove = $this->task->projectMetadataModel->get($task['project_id'], "CardPushDate_show_remove");
                 $CardPushDate_show_move = $this->task->projectMetadataModel->get($task['project_id'], "CardPushDate_show_move");
                 $CardPushDate_show_subtask = $this->task->projectMetadataModel->get($task['project_id'], "CardPushDate_show_subtask");

                 $CardPushDate_interval_Monday = ( intval($CardPushDate_interval_Monday) > 0 ) ? 1 : 0;
                 $CardPushDate_interval_PushDaysOnCard = ( intval($CardPushDate_interval_PushDaysOnCard) > 0 ) ? 1 : 0;
                 $CardPushDate_show_add_comment = ( intval($CardPushDate_show_add_comment) > 0 ) ? 1 : 0;
                 $CardPushDate_show_comment = ( intval($CardPushDate_show_comment) > 0 ) ? 1 : 0;
                 $CardPushDate_show_edit = ( intval($CardPushDate_show_edit) > 0 ) ? 1 : 0;
                 $CardPushDate_show_close = ( intval($CardPushDate_show_close) > 0 ) ? 1 : 0;
                 $CardPushDate_show_remove = ( intval($CardPushDate_show_remove) > 0 ) ? 1 : 0;
                 $CardPushDate_show_move = ( intval($CardPushDate_show_move) > 0 ) ? 1 : 0;
                 $CardPushDate_show_subtask = ( intval($CardPushDate_show_subtask) > 0 ) ? 1 : 0;

                if ($CardPushDate_interval_1_randomize == "1") {
                    $CardPushDate_interval_1 = rand(1, $CardPushDate_interval_1);
                }
                if ($CardPushDate_interval_2_randomize == "1") {
                    $CardPushDate_interval_2 = rand($CardPushDate_interval_1 + 1, $CardPushDate_interval_2);
                }
                if ($CardPushDate_interval_3_randomize == "1") {
                    $CardPushDate_interval_3 = rand($CardPushDate_interval_2 + 1, $CardPushDate_interval_3);
                }

                if ($CardPushDate_push_time == "") {
                    $CardPushDate_push_time = "00:00";
                }
                ?>

                 <?php //Add a line break if a due date is set and we are displaying any push buttons
                    if (
                        ($CardPushDate_interval_Monday +
                             $CardPushDate_interval_1 +
                             $CardPushDate_interval_2 +
                             $CardPushDate_interval_3 > 0) && (! empty($task['date_due']))
                    ) {
                             echo "<br>";
                    }
                    ?>

                <?php if ($CardPushDate_interval_Monday > 0) : ?>
                      <?=
                           $this->modal->confirmLink(
                               '+Mon',
                               'CardPushDateController',
                               'push',
                               array(
                               'plugin' => 'CardPushDate',
                               'task_id' => $task['id'],
                               'project_id' => $task['project_id'],
                                   'push_days' => strval(((8 - intval(date('w')))) % 8),
                                   'push_time' => $CardPushDate_push_time,
                               )
                           ) ?>
                <?php endif ?>

                <?php if ($CardPushDate_interval_PushDaysOnCard > 0) : ?>
                    <?php if ($CardPushDate_interval_1 > 0) : ?>
                        <?=
                           $this->modal->confirmLink(
                               '+' . $CardPushDate_interval_1,
                               'CardPushDateController',
                               'push',
                               array(
                               'plugin' => 'CardPushDate',
                               'task_id' => $task['id'],
                               'project_id' => $task['project_id'],
                                   'push_days' => $CardPushDate_interval_1,
                                   'push_time' => $CardPushDate_push_time,
                               )
                           ) ?>
                    <?php endif ?>

                    <?php if ($CardPushDate_interval_2 > 0) : ?>
                        <?= $this->modal->confirmLink(
                            '+' . $CardPushDate_interval_2,
                            'CardPushDateController',
                            'push',
                            array(
                            'plugin' => 'CardPushDate',
                            'task_id' => $task['id'],
                            'project_id' => $task['project_id'],
                                    'push_days' => $CardPushDate_interval_2,
                                    'push_time' => $CardPushDate_push_time,
                            )
                        ) ?>

                    <?php endif ?>

                    <?php if ($CardPushDate_interval_3 > 0) : ?>
                        <?= $this->modal->confirmLink(
                            '+' . $CardPushDate_interval_3,
                            'CardPushDateController',
                            'push',
                            array(
                            'plugin' => 'CardPushDate',
                            'task_id' => $task['id'],
                            'project_id' => $task['project_id'],
                                    'push_days' => $CardPushDate_interval_3,
                                    'push_time' => $CardPushDate_push_time,
                            )
                        ) ?>

                    <?php endif ?>

                    <?php if ($CardPushDate_interval_1 + $CardPushDate_interval_2 + $CardPushDate_interval_3 > 0) {
                        echo " days | ";
                    } ?>
                <?php endif ?>

            <?php endif //Push Days on card ?>

      /* DMM: CSS required for the tooltip popup - for the external link icon that this plugin makes available /*
      <style>
      /* Container positioning */
      .custom-external-link-container {
          position: relative;
          display: inline-block;
          cursor: pointer;
      }

      .custom-external-link-badge {
          font-weight: bold;
      }

      /* Light Theme Tooltip Popup Box */
      .custom-external-link-tooltip {
          display: none;
          position: absolute;
          bottom: 130%;
          left: 50%;
          transform: translateX(-50%);
          width: max-content;
          min-width: 180px;
          max-width: 280px;
          background-color: #ffffff;
          color: #24292e;
          padding: 8px 12px;
          border: 1px solid #d1d5da;
          border-radius: 6px;
          box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.12);
          z-index: 9999;
          font-size: 11px;
          line-height: 1.4;
          text-align: left;
          white-space: normal;
          word-break: break-word;
      }

      /* Tooltip Bottom Arrow (White) */
      .custom-external-link-tooltip::after {
          content: "";
          position: absolute;
          top: 100%;
          left: 50%;
          margin-left: -5px;
          border-width: 5px;
          border-style: solid;
          border-color: #ffffff transparent transparent transparent;
      }

      /* Reveal Tooltip on Hover */
      .custom-external-link-container:hover .custom-external-link-tooltip {
          display: block !important;
      }

      /* Tooltip Content Formatting (Light Theme) */
      .custom-external-link-tooltip .tooltip-header {
          font-weight: bold;
          color: #1a1a1a;
          border-bottom: 1px solid #e1e4e8;
          padding-bottom: 4px;
          margin-bottom: 6px;
      }

      .custom-external-link-tooltip .tooltip-list {
          list-style: none !important;
          margin: 0 !important;
          padding: 0 !important;
      }

      .custom-external-link-tooltip .tooltip-list li {
          margin: 4px 0 !important;
          display: flex;
          align-items: center;
          gap: 5px;
          color: #586069;
      }

      .custom-external-link-tooltip .tooltip-list a {
          color: #0366d6 !important;
          text-decoration: none !important;
      }

      .custom-external-link-tooltip .tooltip-list a:hover {
          text-decoration: underline !important;
          color: #004499 !important;
      }

      /* Ensure parent card containers don't clip the popup */
      .task-board-card, 
      .task-board-collapsed {
          overflow: visible !important;
      }
      </style>

            <?php
      // Query task external links using the 'text' helper bridge
            $external_links = $this->text->db->table('task_has_external_links')
            ->eq('task_id', $task['id'])
            ->findAll();

            if (! empty($external_links)) :
                $link_count = count($external_links);
                ?>
          <span class="task-board-icons custom-external-link-container">
              <span class="custom-external-link-badge">
                  <i class="fa fa-external-link" aria-hidden="true"></i> <?= $link_count ?>
              </span>
        
              <div class="custom-external-link-tooltip">
                  <div class="tooltip-header">
                      External Links (<?= $link_count ?>)
                  </div>
                  <ul class="tooltip-list">
                      <?php foreach ($external_links as $link) : ?>
                            <?php if (! empty($link['url'])) : ?>
                              <li>
                                  <i class="fa fa-angle-right" aria-hidden="true"></i>
                                  <a href="<?= $this->text->e($link['url']) ?>" 
                                     target="_blank" 
                                     rel="noopener noreferrer" 
                                     onclick="event.stopPropagation();"
                                     title="<?= $this->text->e($link['url']) ?>">
                                      <?= $this->text->e(! empty($link['title']) ? $link['title'] : $link['url']) ?>
                                  </a>
                              </li>
                            <?php endif ?>
                      <?php endforeach ?>
                  </ul>
              </div>
          </span>
            <?php endif ?>


            <?php if ($this->user->hasProjectAccess('TaskModificationController', 'edit', $task['project_id'])) : ?>
                <?php if ($CardPushDate_show_add_comment == 1) : ?>
                    <?= $this->modal->small('comment-o', t(''), 'CommentController', 'create', array('task_id' => $task['id'], 'project_id' => $task['project_id'])) ?>
                <?php endif ?>
            <?php endif ?>

            <?php if ($this->user->hasProjectAccess('TaskModificationController', 'edit', $task['project_id'])) : ?>
                <?php if ($CardPushDate_show_edit == 1) : ?>
                    <?= $this->modal->large('edit', t(''), 'TaskModificationController', 'edit', array('task_id' => $task['id'], 'project_id' => $task['project_id'])) ?>
                <?php endif ?>
            <?php endif ?>

            <?php if ($CardPushDate_show_subtask == 1) : ?>
                <?php if (! empty($task['nb_subtasks'])) : ?>
                    <?= $this->app->tooltipLink('<i class="fa fa-bars fa-fw"></i>' . round($task['nb_completed_subtasks'] / $task['nb_subtasks'] * 100, 0) . '%', $this->url->href('BoardTooltipController', 'subtasks', array('task_id' => $task['id'], 'project_id' => $task['project_id']))) ?>
                <?php endif ?>
            <?php endif ?>

            <?php if ($this->user->hasProjectAccess('TaskModificationController', 'edit', $task['project_id'])) : ?>
                <?php if ($CardPushDate_show_close == 1) : ?>
                    <?= $this->modal->confirm('times', t(''), 'TaskStatusController', 'close', array('task_id' => $task['id'], 'project_id' => $task['project_id'])) ?>
                <?php endif ?>
            <?php endif ?>

            <?php if ($this->user->hasProjectAccess('TaskModificationController', 'edit', $task['project_id'])) : ?>
                <?php if ($CardPushDate_show_remove == 1) : ?>
                           <?= $this->modal->confirm('trash-o', t(''), 'TaskSuppressionController', 'confirm', array('task_id' => $task['id'])) ?>
                <?php endif ?>
            <?php endif ?>

            <?php if ($this->user->hasProjectAccess('TaskModificationController', 'edit', $task['project_id'])) : ?>
                <?php if ($CardPushDate_show_move == 1) : ?>
                    <?= $this->modal->confirm(
                        'arrows-h',
                        '',
                        'TaskDuplicationController',
                        'move',
                        array(
                        'task_id' => $task['id'],
                        'project_id' => $task['project_id'],
                        'dst_project_id' => $task['project_id'],
                        )
                    ) ?>
                <?php endif ?>
            <?php endif ?>
<!--"DMM DMM"-->
            <?php
            if ($CardPushDate_show_comment == "1") {
                $comments = $this->task->commentModel->getAll($task['id'], 'ASC');
                foreach ($comments as $comment) :
                    $display_comment = date("m/d/Y", $comment['date_creation']) . ': ' . $comment['comment']; //Keep overwriting the displayed comment until we reach the last one
                endforeach;
                if (isset($display_comment)) {
                    echo "<hr>" . $display_comment;
                }
            }
            ?>

            <?php //DMM: Showing tags in the compact view ?>
            <?php foreach ($task['tags'] as $tag) : ?>
                <span class="table-list-category task-list-tag <?= $tag['color_id'] ? "color-{$tag['color_id']}" : '' ?>">
                    <?= $this->text->e($tag['name']) ?>
                </span>
            <?php endforeach ?>

        <?php endif; ?>
    <?php else : ?>
        <div class="task-board-expanded">
            <div class="task-board-saving-icon" style="display: none;"><i class="fa fa-spinner fa-pulse fa-2x"></i></div>
            <div class="task-board-header">
                <?php if ($this->user->hasProjectAccess('TaskModificationController', 'edit', $task['project_id'])) : ?>
                    <?= $this->render('task/dropdown', array('task' => $task, 'redirect' => 'board')) ?>
                    <?= $this->modal->large('edit', '', 'TaskModificationController', 'edit', array('task_id' => $task['id'], 'project_id' => $task['project_id'])) ?>
                <?php else : ?>
                    <strong><?= '#' . $task['id'] ?></strong>
                <?php endif ?>

                <?php if (! empty($task['owner_id'])) : ?>
                    <span class="task-board-assignee">
                        <?= $this->text->e($task['assignee_name'] ?: $task['assignee_username']) ?>
                    </span>
                <?php endif ?>

                <?= $this->render('board/task_avatar', array('task' => $task)) ?>
            </div>

            <?= $this->hook->render('template:board:private:task:before-title', array('task' => $task)) ?>
            <div class="task-board-title">
                <strong><?= $this->url->link($this->text->e($task['title']), 'TaskViewController', 'show', array('task_id' => $task['id'], 'project_id' => $task['project_id'])) ?></strong>
            </div>
            <?= $this->hook->render('template:board:private:task:after-title', array('task' => $task)) ?>

            <?php // Display the last comment
               // This section will find all of the comments, get the last one and display it on a card
            if ($CardPushDate_show_comment == 1) {
                $comments = $this->task->commentModel->getAll($task['id'], 'ASC');
                foreach ($comments as $comment) :
                     $display_comment = date("m/d/Y", $comment['date_creation']) . ': ' . $comment['comment']; //Keep overwriting the displayed comment until we reach the last one
                endforeach;
                if (isset($display_comment)) {
                    echo "<hr>" . $display_comment;
                }
            } // END show comment
            ?>

            <?= $this->render('board/task_footer', array(
                'task' => $task,
                'not_editable' => $not_editable,
                'project' => $project,
            )) ?>
        </div>
    <?php endif ?>
</div>
