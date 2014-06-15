<?php
/**
* @version		$Id: user.php 11223 2008-10-29 03:10:37Z pasamio $
* @package		Joomla.Framework
* @subpackage	Table
* @copyright	Copyright (C) 2005 - 2008 Open Source Matters. All rights reserved.
* @license		GNU/GPL, see LICENSE.php
* Joomla! is free software. This version may have been modified pursuant
* to the GNU General Public License, and as distributed it includes or
* is derivative of works licensed under the GNU General Public License or
* other free or open source software licenses.
* See COPYRIGHT.php for copyright notices and details.
*/

// Check to ensure this file is within the rest of the framework
defined('JPATH_BASE') or die();

/**
 * Users table
 *
 * @package 	Joomla.Framework
 * @subpackage		Table
 * @since	1.0
 */
class JTableUser extends JTable
{
	/**
	 * Unique id
	 *
	 * @var int
	 */
	var $id				= null;

	/**
	 * The users real name (or nickname)
	 *
	 * @var string
	 */
	var $name			= null;

	/**
	 * The login name
	 *
	 * @var string
	 */
	var $Anuidade2010 = null;
	var $Anuidade2011 = null;
	var $Anuidade2012 = null;
	var $username		= null;

	/**
	 * The email
	 *
	 * @var string
	 */
	var $Passport		= null;

	/**
	 * The email
	 *
	 * @var string
	 */
	var $email			= null;

	/**
	 * MD5 encrypted password
	 *
	 * @var string
	 */
	var $password		= null;

	/**
	 * Description
	 *
	 * @var string
	 */
	var $usertype		= null;

	/**
	 * Description
	 *
	 * @var int
	 */
	var $block			= null;

	/**
	 * Description
	 *
	 * @var int
	 */
	var $sendEmail		= null;

	/**
	 * The group id number
	 *
	 * @var int
	 */
	var $gid			= null;

	/**
	 * Description
	 *
	 * @var datetime
	 */
	var $registerDate	= null;

	/**
	 * Description
	 *
	 * @var datetime
	 */
	var $lastvisitDate	= null;

	/**
	 * Description
	 *
	 * @var string activation hash
	 */
	var $activation		= null;

	/**
	 * Description
	 *
	 * @var string
	 */
	var $params			= null;

	var $cpf = null;
	var $rg = null;
	var $orgao_expedidor = null;
	var $sexo = null;
	var $data_nascimento = null;
	var $nacionalidade = null;
	var $titulacao_academica = null;
	var $sigla_instituicao = null;
	var $cargo = null;
	var $area_atuacao = null;
	
	var $instituicao_GR = null;
	var $curso_GR = null;
	var $cidade_GR = null;
	var $ano_conclusao_GR = null;
	
	var $instituicao_ES = null;
	var $curso_ES = null;
	var $cidade_ES = null;
	var $ano_conclusao_ES = null;
	
	var $instituicao_MT = null;
	var $curso_MT = null;
	var $cidade_MT = null;
	var $ano_conclusao_MT = null;
	
	var $instituicao_DR = null;
	var $curso_DR = null;
	var $cidade_DR = null;
	var $ano_conclusao_DR = null;
	
	var $endereco_res = null;
	var $complemento_res = null;
	var $bairro_res = null;
	var $cidade_res = null;
	var $estado_res = null;
	var $pais_res = null;
	var $cep_res = null;
	var $telefone_res = null;
	var $celular = null;
	
	var $instituicao_prof = null;
	var $departamento_prof = null;
	var $endereco_prof = null;
	var $complemento_prof = null;
	var $bairro_prof = null;
	var $cidade_prof = null;
	var $estado_prof = null;
	var $pais_prof = null;
	var $cep_prof = null;
	var $telefone_prof = null;

	var $tipo_anuidade = null;
	var $forma_pagamento = null;

	var $observacao = null;
	var $exibir_observacao = null;

	/**
	* @param database A database connector object
	*/
	function __construct( &$db )
	{
		parent::__construct( '#__users', 'id', $db );

		//initialise
		$this->id        = 0;
		$this->gid       = 0;
		$this->sendEmail = 0;
	}

	/**
	 * Validation and filtering
	 *
	 * @return boolean True is satisfactory
	 */
	function check()
	{
		jimport('joomla.mail.helper');

		// Validate user information
		if (trim( $this->name ) == '') {
			$this->setError( JText::_( 'Please enter your name.' ) );
			return false;
		}

		if (trim( $this->username ) == '') {
			$this->setError( JText::_( 'Please enter a user name.') );
			return false;
		}

		if (eregi( "[<>\"'%;()&]", $this->username) || strlen(utf8_decode($this->username )) < 2) {
			$this->setError( JText::sprintf( 'VALID_AZ09', JText::_( 'Username' ), 2 ) );
			return false;
		}

		if ((trim($this->email) == "") || ! JMailHelper::isEmailAddress($this->email) ) {
			$this->setError( JText::_( 'WARNREG_MAIL' ) );
			return false;
		}
		
		if (trim( $this->rg ) == '') {
			$this->setError( JText::_( 'Please enter a rg.') );
			return false;
		}
		if (trim( $this->orgao_expedidor ) == '') {
			$this->setError( JText::_( 'Infome o Orgao expedidor.') );
			return false;
		}
		if (trim( $this->data_nascimento ) == '') {
			$this->setError( JText::_( 'Informe a data de nascimento.') );
			return false;
		}
		if (trim( $this->nacionalidade ) == '') {
			$this->setError( JText::_( 'Informe a nacionalidade.') );
			return false;
		}
		if (trim( $this->titulacao_academica ) == '') {
			$this->setError( JText::_( 'Informe a titulacaoo academica.') );
			return false;
		}
		if (trim( $this->sigla_instituicao ) == '') {
			$this->setError( JText::_( 'Informe a Sigla da Instituicao.') );
			return false;
		}
		if (trim( $this->cargo ) == '') {
			$this->setError( JText::_( 'Informe o cargo.') );
			return false;
		}
		if (trim( $this->area_atuacao ) == '') {
			$this->setError( JText::_( 'Informe a area de atuacao.') );
			return false;
		}
		if (trim( $this->endereco_res ) == '') {
			$this->setError( JText::_( 'Informe o endereco residencial.') );
			return false;
		}
		if (trim( $this->bairro_res ) == '') {
			$this->setError( JText::_( 'Informe o bairro.') );
			return false;
		}
		if (trim( $this->cidade_res ) == '') {
			$this->setError( JText::_( 'Informe a cidade.') );
			return false;
		}
		if (trim( $this->estado_res ) == '') {
			$this->setError( JText::_( 'Informe o estado.') );
			return false;
		}
		if (trim( $this->pais_res ) == '') {
			$this->setError( JText::_( 'Informe o Pais.') );
			return false;
		}
		if (trim( $this->cep_res ) == '') {
			$this->setError( JText::_( 'Informe o CEP.') );
			return false;
		}
/*		if (trim( $this->instituicao_prof ) == '') {
			$this->setError( JText::_( 'Please enter a field.') );
			return false;
		}
		if (trim( $this->departamento_prof ) == '') {
			$this->setError( JText::_( 'Please enter a field.') );
			return false;
		}
		if (trim( $this->endereco_prof ) == '') {
			$this->setError( JText::_( 'Please enter a field.') );
			return false;
		}
		if (trim( $this->bairro_prof ) == '') {
			$this->setError( JText::_( 'Please enter a field.') );
			return false;
		}
		if (trim( $this->cidade_prof ) == '') {
			$this->setError( JText::_( 'Please enter a field.') );
			return false;
		}
		if (trim( $this->estado_prof ) == '') {
			$this->setError( JText::_( 'Please enter a field.') );
			return false;
		}
		if (trim( $this->pais_prof ) == '') {
			$this->setError( JText::_( 'Please enter a field.') );
			return false;
		}
		if (trim( $this->cep_prof ) == '') {
			$this->setError( JText::_( 'Please enter a field.') );
			return false;
		}*/
		

		if ($this->registerDate == null) {
			// Set the registration timestamp
			$now =& JFactory::getDate();
			$this->registerDate = $now->toMySQL();
		}


		// check for existing username
		$query = 'SELECT id'
		. ' FROM #__users '
		. ' WHERE username = ' . $this->_db->Quote($this->username)
		. ' AND id != '. (int) $this->id;
		;
		$this->_db->setQuery( $query );
		$xid = intval( $this->_db->loadResult() );
		if ($xid && $xid != intval( $this->id )) {
			$this->setError(  JText::_('WARNREG_INUSE'));
			return false;
		}


		// check for existing email
		$query = 'SELECT id'
			. ' FROM #__users '
			. ' WHERE email = '. $this->_db->Quote($this->email)
			. ' AND id != '. (int) $this->id
			;
		$this->_db->setQuery( $query );
		$xid = intval( $this->_db->loadResult() );
		if ($xid && $xid != intval( $this->id )) {
			$this->setError( JText::_( 'WARNREG_EMAIL_INUSE' ) );
			return false;
		}

		return true;
	}

	function store( $updateNulls=false )
	{
		$acl =& JFactory::getACL();

		$section_value = 'users';
		$k = $this->_tbl_key;
		$key =  $this->$k;

		if ($key)
		{
			// existing record
			$ret = $this->_db->updateObject( $this->_tbl, $this, $this->_tbl_key, $updateNulls );

			// syncronise ACL
			// single group handled at the moment
			// trivial to expand to multiple groups
			$object_id = $acl->get_object_id( $section_value, $this->$k, 'ARO' );

			$groups = $acl->get_object_groups( $object_id, 'ARO' );
			$acl->del_group_object( $groups[0], $section_value, $this->$k, 'ARO' );
			$acl->add_group_object( $this->gid, $section_value, $this->$k, 'ARO' );

			$acl->edit_object( $object_id, $section_value, $this->_db->getEscaped( $this->name ), $this->$k, 0, 0, 'ARO' );
		}
		else
		{
			// new record
			$ret = $this->_db->insertObject( $this->_tbl, $this, $this->_tbl_key );
			// syncronise ACL
			$acl->add_object( $section_value, $this->name, $this->$k, null, null, 'ARO' );
			$acl->add_group_object( $this->gid, $section_value, $this->$k, 'ARO' );
		}

		if( !$ret )
		{
			$this->setError( strtolower(get_class( $this ))."::". JText::_( 'store failed' ) ."<br />" . $this->_db->getErrorMsg() );
			return false;
		}
		else
		{
			return true;
		}
	}

	function delete( $oid=null )
	{
		$acl =& JFactory::getACL();

		$k = $this->_tbl_key;
		if ($oid) {
			$this->$k = intval( $oid );
		}
		$aro_id = $acl->get_object_id( 'users', $this->$k, 'ARO' );
		$acl->del_object( $aro_id, 'ARO', true );

		$query = 'DELETE FROM '. $this->_tbl
		. ' WHERE '. $this->_tbl_key .' = '. (int) $this->$k
		;
		$this->_db->setQuery( $query );

		if ($this->_db->query()) {
			// cleanup related data

			// private messaging
			$query = 'DELETE FROM #__messages_cfg'
			. ' WHERE user_id = '. (int) $this->$k
			;
			$this->_db->setQuery( $query );
			if (!$this->_db->query()) {
				$this->setError( $this->_db->getErrorMsg() );
				return false;
			}
			$query = 'DELETE FROM #__messages'
			. ' WHERE user_id_to = '. (int) $this->$k
			;
			$this->_db->setQuery( $query );
			if (!$this->_db->query()) {
				$this->setError( $this->_db->getErrorMsg() );
				return false;
			}

			return true;
		} else {
			$this->setError( $this->_db->getErrorMsg() );
			return false;
		}
	}

	/**
	 * Updates last visit time of user
	 *
	 * @param int The timestamp, defaults to 'now'
	 * @return boolean False if an error occurs
	 */
	function setLastVisit( $timeStamp=null, $id=null )
	{
		// check for User ID
		if (is_null( $id )) {
			if (isset( $this )) {
				$id = $this->id;
			} else {
				// do not translate
				jexit( 'WARNMOSUSER' );
			}
		}

		// if no timestamp value is passed to functon, than current time is used
		$date =& JFactory::getDate($timeStamp);

		// updates user lastvistdate field with date and time
		$query = 'UPDATE '. $this->_tbl
		. ' SET lastvisitDate = '.$this->_db->Quote($date->toMySQL())
		. ' WHERE id = '. (int) $id
		;
		$this->_db->setQuery( $query );
		if (!$this->_db->query()) {
			$this->setError( $this->_db->getErrorMsg() );
			return false;
		}

		return true;
	}

	/**
	* Overloaded bind function
	*
	* @access public
	* @param array $hash named array
	* @return null|string	null is operation was satisfactory, otherwise returns an error
	* @see JTable:bind
	* @since 1.5
	*/

	function bind($array, $ignore = '')
	{
		if (key_exists( 'params', $array ) && is_array( $array['params'] )) {
			$registry = new JRegistry();
			$registry->loadArray($array['params']);
			$array['params'] = $registry->toString();
		}

		return parent::bind($array, $ignore);
	}
}
