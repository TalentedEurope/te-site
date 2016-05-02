<?php

  /**
   * Personal Skills model config
   */

  return array(

      'title' => 'Personal Skills',
      'single' => 'personal skill',
      'model' => 'App\Models\PersonalSkill',

      'columns' => array(
          'name_en' => array(
              'title' => 'Name (English)',
          ),
          'name_sp' => array(
              'title' => 'Name (Spanish)',
          ),
          'name_it' => array(
              'title' => 'Name (Italian)',
          ),
          'name_de' => array(
              'title' => 'Name (German)',
          ),
          'name_fr' => array(
              'title' => 'Name (French)',
          ),
      ),

      'edit_fields' => array(
          'name_en' => array(
              'title' => 'Name (English)',
              'type' => 'text',
          ),
          'name_sp' => array(
              'title' => 'Name (Spanish)',
              'type' => 'text',
          ),
          'name_it' => array(
              'title' => 'Name (Italian)',
              'type' => 'text',
          ),
          'name_de' => array(
              'title' => 'Name (German)',
              'type' => 'text',
          ),
          'name_fr' => array(
              'title' => 'Name (French)',
              'type' => 'text',
          ),
      ),

      'filters' => array(
          'name_en' => array(
              'title' => 'Name (English)',
              'type' => 'text',
          ),
          'name_sp' => array(
              'title' => 'Name (Spanish)',
              'type' => 'text',
          ),
          'name_it' => array(
              'title' => 'Name (Italian)',
              'type' => 'text',
          ),
          'name_de' => array(
              'title' => 'Name (German)',
              'type' => 'text',
          ),
          'name_fr' => array(
              'title' => 'Name (French)',
              'type' => 'text',
          ),
      ),


  );