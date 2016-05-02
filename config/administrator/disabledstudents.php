<?php

  /**
   * Disabled students model config
   */


  return array(

      'title' => 'Disabled Students',
      'single' => 'disabled student',
      'model' => 'App\Models\User',

      'columns' => array(
          'name' => array(
              'title' => "Name",
          ),

          'email' => array(
              'title' => "Email",
          ),
      ),

      'edit_fields' => array(
          'name' => array(
              'title' => "Name",
              'type' => "text",
              'editable' => false,
          ),

          'email' => array(
              'title' => "Email",
              'type' => "text",
              'editable' => false,
          ),

      ),

      'query_filter'=> function($query)
      {
        $query->leftJoin('students', 'students.id', '=', 'users.userable_id')->where('userable_type','App\Models\Student')->where('force_disable',1);

      },

      'action_permissions'=> array(
          'delete' => function($model)
          {
              return false;
          },
          'create' => function($model)
          {
              return false;
          },
          'update' => function($model)
          {
              return false;
          }
      ),

      'actions' => array(
          'enable_profile' => array(
              'title' => 'Enable public profile',
              'confirmation' => 'Are you sure you want to enable this student profile? \' The student will receive a notification',
              'permission' => function($model)
              {
                  return true;
              },
              'messages' => array(
                  'active' => 'Enabling...',
                  'success' => 'Enabled',
                  'error' => 'There was an error while enabling the profile',
              ),
              'action' => function(&$model)
              {
                  $model->userable->force_disable = 0;
                  $model->userable->save();
                  return true;
              }
          ),
          'disable_profile' => array(
              'title' => 'Disable public profile',
              'confirmation' => 'Are you sure you want to disable this student profile? \' The student will receive a notification',
              'permission' => function($model)
              {
                  return true;
              },
              'messages' => array(
                  'active' => 'Disabling...',
                  'success' => 'Disabled',
                  'error' => 'There was an error while disabling the profile',
              ),
              'action' => function(&$model)
              {
                  $model->userable->force_disable = 1;
                  $model->userable->save();
                  return true;
              }
          ),
      ),
      'filters' => array(
          'name' => array(
              'title' => 'Name',
              'type' => 'text',
          ),
          'email' => array(
              'title' => 'Email',
              'type' => 'text',
          ),
      ),

  );