<?php

  /**
   * Users model config
   */

  return array(

      'title' => 'Users',
      'single' => 'user',
      'model' => 'App\Models\User',

      'columns' => array(
          'email' => array(
              'title' => 'Email',
          ),
          'is_admin' => array(
              'title' => 'Is admin',
          ),
      ),

      'edit_fields' => array(
          'email' => array(
              'title' => 'Email',
              'type' => 'text',
          ),
          'password' => array(
              'title' => 'Password',
              'type' => 'password',
          ),
      ),
  );