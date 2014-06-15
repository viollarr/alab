<?php

// no direct access
defined( '_VALID_MOS' ) or die( 'Restricted access' );

/**
* @package joomleto
*/
class TOOLBAR_joomleto {
	function _EDIT_CUST() {
		global $id;

		mosMenuBar::startTable();
		mosMenuBar::save('saveCliente');
		mosMenuBar::spacer();
		mosMenuBar::cancel();
		mosMenuBar::spacer();
		mosMenuBar::help( 'screen.joomleto.html#cust',true );
		mosMenuBar::spacer();
		mosMenuBar::endTable();
	}
	function _SHOW_CLIENTES() {
		global $id;

		mosMenuBar::startTable();
  		mosMenuBar::addNewX('editar_clientes');
		mosMenuBar::spacer();
		mosMenuBar::help( 'screen.joomleto.html#cust',true );
		mosMenuBar::spacer();
		mosMenuBar::endTable();
	}
	function _EDIT_BANK() {
		mosMenuBar::startTable();
		mosMenuBar::save('saveBank');
		mosMenuBar::spacer();
        mosMenuBar::cancel('clientes');
        mosMenuBar::spacer();
		mosMenuBar::help( 'screen.joomleto.html#banks',true );
		mosMenuBar::spacer();
		mosMenuBar::endTable();
	}
	function _SHOW_BANKS() {
		mosMenuBar::startTable();
		mosMenuBar::spacer();
		mosMenuBar::publish();
		mosMenuBar::spacer();
		mosMenuBar::unpublish();
		mosMenuBar::spacer();
        mosMenuBar::addNewX('editar_banco');
        mosMenuBar::spacer();
        mosMenuBar::editListX('editar_banco');
        mosMenuBar::spacer();
        mosMenuBar::deleteList();
        mosMenuBar::spacer();
		mosMenuBar::help( 'screen.joomleto.html#banks',true );
		mosMenuBar::spacer();
		mosMenuBar::endTable();
	}
    function _EDIT_BOLETO() {
		mosMenuBar::startTable();
		mosMenuBar::save('saveBoleto','Salvar');
		mosMenuBar::spacer();
        mosMenuBar::cancel();
		mosMenuBar::spacer();
		mosMenuBar::help( 'screen.joomleto.html#boletos',true );
		mosMenuBar::spacer();
		mosMenuBar::endTable();
	}
	function _SHOW_BOLETOS() {
		mosMenuBar::startTable();
		mosMenuBar::spacer();
        mosMenuBar::addNewX('editar_boleto');
        mosMenuBar::spacer();
        mosMenuBar::editListX('editar_boleto');
        mosMenuBar::spacer();
        mosMenuBar::custom( 'deleteBoleto', 'delete.png', 'delete_f2.png', 'Excluir Boleto(s)', false );
        mosMenuBar::spacer();
        mosMenuBar::help( 'screen.joomleto.html#boletos',true );
		mosMenuBar::spacer();
		mosMenuBar::endTable();
	}
	function _DEFAULT() {
		mosMenuBar::startTable();
		mosMenuBar::spacer();
		mosMenuBar::help( 'screen.joomleto.html',true );
		mosMenuBar::endTable();
	}
}
?>
