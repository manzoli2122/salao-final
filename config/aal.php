<?php


return [

    //CLASSES
    'usuario' => 'App\User',

    'perfil' => 'Manzoli2122\AAL\Models\Perfil',
  
    'permissao' => 'Manzoli2122\AAL\Models\Permissao',


    //TABELAS  
    'usuarios_table' => 'users',

        'perfil_usuario_table' => 'perfils_users',

    'perfis_table' => 'perfils',

        'permissoen_perfil_table' => 'permissao_perfils',

    'permissoes_table' => 'permissoes',




   
    'perfil_foreign_key' => 'perfil_id',

    
    //'usuario_foreign_key' => 'user_id',

    
    'permissao_foreign_key' => 'permissao_id',



    //TAMPLATES
    'templateMaster' => 'templates.templateMaster',
    
        'templateMasterContent' => 'contentMaster',
    
        'templateMasterContentTitulo' => 'titulo-page' ,
    
        'templateMasterMenuLateral' => 'menuLateral' , 
    
        'templateMasterScript' => 'script' ,
    
        'templateMasterCss' => 'css' ,



];
