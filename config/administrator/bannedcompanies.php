<?php

  /**
   * Companies model config
   */


  return array(

      'title' => 'Banned companies',
      'single' => 'company',
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
        $query->where('userable_type','App\Models\Company');        
        $query->where('banned',true);        
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
          'ban' => array(
              'title' => 'Unban user',
              'confirmation' => 'Are you sure you want to unban this company?',
              'permission' => function($model)
              {
                  return true;
              },
              'messages' => array(
                  'active' => 'Unbanning...',
                  'success' => 'unbanned',
                  'error' => 'There was an error while unbanning the user',
              ),
              'action' => function(&$model)
              {
                  $model->banned = 0;
                  $model->save();
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
