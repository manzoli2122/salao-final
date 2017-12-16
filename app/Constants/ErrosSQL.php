<?php
/**
 * Essa classe faz o mapeamento dos códigos de erros do banco de dados utilizado.
 * 
 */

 namespace App\Constants;

 class ErrosSQL {
     const DELETE_OR_UPDATE_A_PARENT_ROW = 1451; // Integrity constraint violation: 1451 Cannot delete or update a parent row: a foreign key constraint fails
 }