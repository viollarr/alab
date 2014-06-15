.. raw:: html

    <h1>Attachments Extension Plugin Manual</h1>
    
By: Jonathan M. Cameron

Copyright (C) 2010 Jonathan M. Cameron, All Rights Reserved
   License: http://www.gnu.org/licenses/gpl-3.0.html GNU/GPL

.. contents:: Contents
   :depth: 2

.. sectnum::

Introduction
============

The Attachments extension for Joomla! lets users attach files to content items
such as articles.  The original purpose of the Attachments extension was to
add attachments to articles and it was not possible to add attachments to
anything else.  Attachments extension version 2.0 was upgraded and refactored
so that files can be attached to a variety of content items provided by
various Joomla! components.  The Attachments extension now accepts its own
plugins to make this possible for new types of content items.

Content items correspond to a component.  For instance, articles are part of
the ``com_content`` component.  Plugins for the Attachments extension provide the
necessary functions to allow attaching files to new types of content items.

The purpose of this manual is describe how to create new Attachments
plugins. There are several steps involved in the process.  First, you need to
create a set of files for the plugin.  A template is provided that includes
the necessary files.  The files need to be adapted to the new component
including adding appropriate functionality.  Then the plugin can be installed
and tested.

The Attachments plugins are a new type of Joomla! plugin that provide extra
functionality to the the Attachments extensions.  They are installed like
other Joomla! plugins and are visible in the plugin manager.


Terminology
===========

.. glossary::

    **Component** 
	The component that defines the content item of interest, 
	such as ``com_content``.

    **Content Item**
        Any item that can be displayed in the front end of a Joomla! website.
        Familiar examples include *articles*, *sections*, and *categories*
        supported by the built-in Joomla! component ``com_content``.  Other
        types of content items might include things like user profiles, event
        descriptions, product descriptions, *etc.*, that are provided by
        various Joomal! extension components.

    **Parent Type**
	This is the name of the component for the content item of interest
	(*e.g.* ``com_content``).  

    **Parent Entity**
	The name of the specific type of content items that you want to attach
	files to.  For instance, for regular Joomla!  content articles, this
	would be *article*.  In many cases in the rest of this document, we
	will just refer to this as the *Entity*.  It is possible for there to
	be more than one entity for a component.  In the ``com_content``
	component, there are three: *articles*, *sections*, and *categories*.
	Depending on the context, the term *entity* may be used in two ways:
	(1) the type of entity to which files may be attached, and (2) a
	specific entity to which a file is attached.  The distinction should
	be clear from the context.

    **Parent**
	The specific entity instance that a file is attached to is called the
	attachment's parent.  There is only one parent for any attachment.
	Most commonly, for an *article* entity, the *parent* would be the
	specific article that a file is attached to.

    **Attachments plugin**
        A Joomla! plugin for that adds extra functionality to the Attachments
        extension for attaching files to new types of content items.


Implementation Procedure
========================

.. _diagnostic-section:

Make sure an attachment plugin will work
----------------------------------------

In order to add attachments to a content item, the content item must invoke
the Joomla! content plugin 'onPrepareContent' when that item is rendered.  To
determine if this is the case, we need to do a little diagnostic work.
Install the Attachments extension and temporarily edit the main attachments
plugin file:

    ``plugins/content/attachments.php``

Edit this file and look for the `addAttachments()` function and look for the
line containing ``global $option;`` at the beginning of the function.  In
order to generate the necessary diagnostic output, insert the following line
after the line:

.. code-block:: php
    
    $row->text .= "<br/>PC: $option,  OBJ: " . get_class($row) . ", VIEW: " . JRequest::getString('view');
    return true;

where the 'PC' tag is for the *Parent Component*, 'OBJ' is the class of the
the content item, and 'VIEW' is the name of the view.

Refresh the frontpage (or whichever page contains the content item).  Look for
the diagnostic line beginning with 'PC' just after your content item.  Make a
note of what appears after the PC, OBJ, and VIEW tags.  You may need it when
you implement the ``getParentId()`` function (see section
:ref:`section-optional-function`).  It may be useful to insert a command to
dump the entire $row object (*e.g.* var_dump($row); ).  Note that the display
of any existing attachments will be superceded by this output; when these two
lines are removed the display of attachments will return to normal.

If you do not see any output after your item, it may not be possible to attach
files to your type of content items using the Attachemnts extension.  Note
that some components have settings that control whether the 'onPrepareContent'
is called by the component code during the rendering process.  Check the
extension's documentation.  Make sure the setting is enabled, if available.

.. warning::

    Once you have determined if the 'onPrepareContent' plugin is called for
    your content item, don't forget to restore the `addAttachment()` function
    to its normal operation!

   
Select the entity or entities to handle
---------------------------------------

The next step is to identify two things: (1) the parent type and (2) any
parent entities that you intend to handle in the new Attachments plugin.

From the diagnostic display you saw in the previous step, you can clearly
identify the parent type as the component name to the right of the 'PC:' just
after the item you want to attach files to.  It should look something like
``com_newcomp``. (Obviously, you would replace the 'newcomp' part with the
actual name of your component.)  This may not come as a surprise since this
should correspond to the type of content you are interested in.

If you are interested in only one type of content item for the new component,
then this phase is complete.  The parent type is ``com_newcomp``.  The entity
corresponds to the name of type of content item.  It will also be the default
one, called ``default``.

If there is more than one type of entity that you wish to handle for the
component, pay special attention to the other two items (OBJ and VIEW) for
each item from the diagnostic display.  More than likely the entities will
correspond to the primary types of content in the new component.

**Each entity name needs be alphanumeric token without spaces.** Entity names
will be used in the code and URLs and will be general to all languages.  You
can use the translation file to create alternate names that have spaces and
capitalization.

For instance, for the basic Joomla! content, the parent type is
``com_content`` and the entities are ``article`` (or ``default`` for
articles), and ``section`` and ``category``.  These are all basic Joomla!
content items that can have descriptions or textual content associated with
them.

.. warning::

   The entity names must be unique and not be the same as any other entity
   name in other components.

.. _fileset-section:

Create the set of files for the plugin
--------------------------------------

The next thing you need to do is create the basic set of files you need for
your new Attachments plugin.  First, create a directory for your files and
create a set of files like this inside that directory::

    attachments_for_newcomp.php
    attachments_for_newcomp.xml
    en-GB.plg_attachments_attachments_for_newcomp.ini
    plugins/com_newcomp.ini
    plugins/com_newcomp.php

where you should replace all occurrences of ``newcomp`` with the name of your
component (the part after the ``com_`` prefix) you are building the Attachments
plugin for.

.. index:: file; attachments_for_newcomp.xml

File: ``attachments_for_newcomp.xml``
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

Here is what the installation file **attachments_for_newcomp.xml** should contain:

.. code-block:: xml

    <?xml version="1.0" encoding="utf-8"?>
    <!DOCTYPE install SYSTEM "http://dev.joomla.org/xml/1.5/plugin-install.dtd">
    <install type="plugin" group="attachments" version="1.5" method="upgrade">
	<name>Attachments - For Newcomp</name>
	<creationDate>???</creationDate>
	<author>???</author>
	<authorEmail>???</authorEmail>
	<authorUrl>???</authorUrl>
	<copyright>???</copyright>
	<license>http://www.gnu.org/licenses/gpl-3.0.html GNU/GPL</license>
	<version>???</version>
	<description>ATTACHMENTS_FOR_NEWCOMP_PLUGIN_INSTALLED</description>
	<files>
	    <filename plugin="attachments_for_newcomp">attachments_for_newcomp.php</filename>
	    <filename>plugins/com_newcomp.php</filename> 
	    <filename>plugins/com_newcomp.ini</filename> 
	</files>
	<languages>
	    <language tag="en-GB">en-GB.plg_attachments_attachments_for_newcomp.ini</language>
	</languages>
	<params/>
    </install>

where you should fill in for all of the ``???`` items as well as change all
occurrences of 'newcomp' to the name of your new component.  Note that the
description field is a translation token and should include no spaces.

.. index:: file;attachments_for_newcomp.php

File: ``attachments_for_newcomp.php``
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

The second file is the **attachments_for_newcomp.php** file:

.. code-block:: php

    <?php

      // no direct access
      defined( '_JEXEC' ) or die( 'Restricted access' );

    ?>

This is basically a placeholder file needed for the installation.  The real
code for the attachment plugin is in the ``com_newcomp.php`` (shown later).

.. index:: file;en-GB.plg_attachments_attachments_for_newcomp.ini

File: ``en-GB.plg_attachments_attachments_for_newcomp.ini``
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

The translations ``.ini`` file should look like this:

.. code-block:: ini

    # en-GB.plg_attachments_for_newcomp.ini
    # Attachments for Joomla! newcomp extension 
    # Copyright (C) ??? ???, All rights reserved.
    # License http://www.gnu.org/licenses/gpl-3.0.html GNU/GPL
    # Note : All ini files need to be saved as UTF-8 - No BOM

    # English translation

    ATTACHMENTS_FOR_NEWCOMP_PLUGIN_INSTALLED=This plugin enables adding attachments to Newcomp 'Things'

    THING=Thing
    THINGS=Things

This file should define any translation item created in this plugin.  Note that
the item ``ATTACHMENTS_FOR_NEWCOMP_PLUGIN_INSTALLED`` must be exactly the same
as the one in the ``<description>`` item in the installation ``.xml`` file.
We have also added a translation item for "thing", the basic entity of
com_newcomp as well as its pluralized version.  Note that the pluralization in
the translation item on the left is always done by simply adding a 'S' on the
end of the translation item; the translation on the right can be spelled
appropriately.  All translation keys (on the left of the equals sign) must be
alphanumeric without spaces.

Each entity name supported should be given with an appropriate translation
that may include spaces, etc.

Don't forget to add translation items for any error messages you may include
in the code our write.

.. index:: file;plugin/com_newcomp.ini

File: ``plugin/com_newcomp.ini``
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

Next we look at the two files in the plugin directory.  First consider the
configuration file ``plugin/com_newcomp.ini``:

.. code-block:: ini
   :linenos:

    [default]
    alias = item
    entity = THING
    entity_table = newcomp_thing
    entity_id_field = id
    entity_title_field = title


This file should contain a series of blocks for each entity, separated by a
blank line.  The first line of each block must contain the name of the entity
in square brackets as shown.  In this example there is only one block, but the
file could contain as many blocks as needed.  There will be a separate block
like this for every entity that is supported by the component.  The 'default'
one, usually the main one, should be called *default* (as shown here) and
should appear first.

These files are standard configuration files.  All of the lines after the
first line of each block have assignments.  Only the part to the right of the
equals sign should be changed.

Now consider each of the lines above.  

  **Line 1**
     is the name of the parent entity type in lower case in square brackets.
     **This name must be a single alphanumeric token without spaces** (because
     it may be used in URLs).  Always use 'default' for the default entity for
     a component.  The first line for the rest of the blocks should contain
     the entity name in square brackets; [default] must appear only once per
     component.

  **Line 2**
     gives a comma-separated list of alternate names (or aliases) in lower
     case that can be used in the code for this entity.  If there are no
     aliases, this line can be omitted.  It is possible that several aliases
     will be needed for the same entity, as you should see from the diagnostic
     output (see section :ref:`diagnostic-section`).

  **Line 3**
     is the formal name of the entity in upper case; the the term to the right
     of the equals sign here is a translation item for this entity and must be
     translated in the translation file.  Note that the translation file must
     also translate a pluralized version of this name (the upper case name
     with an appended 'S').

  **Line 4**
     is the name of the database table in which the parent entity is found
     (without the leading ``#__`` prefix).  

  **Line 5**
     is the name of the id field for the parent entity in the database
     table ``entity_table``.  This line is optional; it may be ommited if the
     id field is 'id';

  **Line 6**
     is the name of the title field for the parent entity in the database
     table ``entity_table``.  

.. note::

   By default, the AttachmentsPlugin base class (which your code will extend)
   supports content items that appear in database tables, which usually means
   that they are defined in Joomla! components.  If your entity is not defined
   in a Joomla!  database table, you will have to override several of the base
   class functions, particularly the function to retrieve a content item's
   title.

You can refer to the the ``com_content`` component configuration file
``plugins/attachments/plugins/com_content.ini`` for a more involved example
with multiple blocks and aliases.  (Check after the Attachments extension is
installed).


.. index:: file;plugin/com_newcomp.php

File: ``plugin/com_newcomp.php``
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

Finally, the main code for the plugin is in ``plugin/com_newcomp.php``:

.. code-block:: php

    <?php

    // no direct access
    defined( '_JEXEC' ) or die( 'Restricted access' );

    class AttachmentsPlugin_com_newcomp extends AttachmentsPlugin
    {
	/**
	 * Constructor
	 */
	function __construct()
	{
	    parent::__construct('attachments_for_newcomp', 'com_newcomp', 'newcomp');
	}

        ... OTHER FUNCTIONS DESCRIBED IN SECTION APPENDEX A BELOW
    }

    ?>

where many functions have been omitted for clarity.  Each function that may
need implementing is described in :ref:`implement-functionality-appendix`.
Replace ``newcom`` with the appropriate component name for your component
throughout this code.

.. index:: class;AttachmentsPlugin

Your new class extends the AttachmentsPlugin class that can be found in the file: 

  * ``plugins/attachments/attachments_plugin.php``

in your Joomla! installation.


Create the plugin installation file
-----------------------------------

Once the files have been created (see :ref:`fileset-section`) and edited to
provide the necessary functionality, you will need to create a zip file for
installation.  Use your favorite zip tool to create a zip file with the 5
files.  Note that top level files and hierarchy of the zip file should look
like this::

    .
    |-- en-GB.plg_attachments_attachments_for_newcomp.ini
    |
    |-- attachments_for_newcomp.php 
    |-- attachments_for_newcomp.xml
    `-- plugins
	|-- com_newcomp.ini
	`-- com_newcomp.php

These files should appear in the zip file directly as shown and not in a
nested directory.


Install and test
----------------

Once you have created your zip file, you should be able to install it into
Joomla! using the regular installer (under the Extensions > Install/Uninstall
menu item in the administrative back end).  You will then need to enable the
plugin.

          **DO NOT FORGET TO ENABLE YOUR NEW PLUGIN!**

Once the new attachments plugin is installed and enabled, you should be able
to test it.  

Go to the front end and log in as a user with adequate permissions to edit the
content item you are interested in.  You should see a red **Add Attachment**
link just below the item.  Click on it to add an attachment to make sure it
works.  

You should also try adding an attachment to a content item in the
administrative back end.  Click on the 'Attachments' item under the Components
menu.  Then click on the [New] button on the task bar.  Near the bottom of the
form, you will see a row of buttons corresponding to the supported types of
content entities.  Click on the one corresponding to your new content entity.
Then click on the [Select] entity button at the right end of the first field
in the form.  You should see a list of the entities.  Select one and try
adding the attachment to it.

Once an attachment has been added to a content item, the usual functions to
edit, delete, download, *etc.*, should work properly.

If your new code does not work properly, you will need to review the functions
described in section :ref:`implement-functionality-appendix`.  You may need to
fix the code or add functions that you may have omitted.

You may wish to implement simplified versions of the permission checking
functions first (*e.g.*, ``userMayAddAttachment()``,
``userMayEditAttachment()``, and ``userMayAccessAttachment()``) first.  It may
be more productive to get the rest of the functionality working, then
implement the permissions functions afterwards.

.. raw:: pdf

    PageBreak


.. _implement-functionality-appendix:

Appendix A - Implement the plugin functionality
===============================================

Functions you probably will need to implement
---------------------------------------------

In your attachments plugin file ``com_newcomp.php``, you will probably need to
implement some or all of the following functions.


.. index:: function;getEntityViewURL

function getEntityViewURL()
~~~~~~~~~~~~~~~~~~~~~~~~~~~

.. code-block:: php

    /**
     * Get a URL to view the entity
     *
     * @param int $parent_id the ID for this parent object
     * @param string $parent_entity the type of entity for this parent type
     *
     * @return a URL to view the entity (non-SEF form)
     */
    function getEntityViewURL($id, $parent_entity='default')
    {
      ...
    }

This function constructs and returns a URL that will view or visit a specific
entity.  This is specific to each type of component and each implemented type
of entity.  In your component, find the URL for a view for each entity
supported and implement them here.  Try to trim anything extra from the URL;
often extra fields can be eliminated from the URL without affecting its
operation (eg, dates, category IDs, etc).

**You will need to implement this function.**

.. index:: function;checkAttachmentsListTitle

function checkAttachmentsListTitle()
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

.. code-block:: php

    /**
     * Check to see if a custom title applies to this parent
     *
     * Note: this function assumes that the parent_id's match
     *
     * @param string $parent_entity parent entity for the parent of the list
     * @param string $rtitle_parent_entity the entity of the candidate attachment list title (from params)
     *
     * @return true if the custom title should be used
     */
    function checkAttachmentsListTitle($parent_entity, $rtitle_parent_entity)
    {
	if ( $rtitle_parent_entity == 'newcomp' ) {
	    return true;
	    }

	return false;
    }

This function checks to see if custom titles for attachments list might apply to
this parent.  In the options, there is a 'custom titles for attachments lists'
option that allows the admin to define custom titles for attachments lists on
a system wide level or on a entity by entity basis (eg, for a specific article
with 'article:23').  When this function is called, rtitle_parent_entity will
be 'article' (or an what ever entity name you specify to the left of the colon
in the custom title list).

If you wish this functionality to be available for your new content type, you
should implement this function. If this function is not re-implemented, custom
titles for specific component entities will never be applied to your new
component attachments.

The code shown above is typical if only one type of parent entity is supported
for the new content type.  If more are supported, your function will need to
be more sophisticated; see the attachments ``com_content.php`` plugin file for
an example.

**You should implement this function.**


.. index:: function;isParentPublished

function isParentPublished()
~~~~~~~~~~~~~~~~~~~~~~~~~~~~

.. code-block:: php

    /**
     * Check to see if the parent is published
     *
     * @param int $parent_id the ID for this parent object
     * @param string $parent_entity the type of entity for this parent type
     *
     * @return true if the parent is published
     */
    function isParentPublished($id, $parent_entity='default')
    {
      ...
    }

This function checks to see if the parent entity should be published.  Your
code will need to check the component tables for the parent entity to see if
it is published.

**You will need to implement this function.**


.. index:: function;userMayViewparent

function userMayViewparent()
~~~~~~~~~~~~~~~~~~~~~~~~~~~~

.. code-block:: php

    /**
     * May the parent be viewed by the user?
     *
     * @param int $parent_id the ID for this parent object
     * @param string $parent_entity the type of entity for this parent type
     *
     * @return true if the parent may be viewed by the user
     */
    function userMayViewParent($parent_id, $parent_entity='default')
    {
      ...
    }

This function checks to see if the parent may be viewed by the current user.
This function defaults to true (meaning anyone can see the parent).  In most
cases, each parent object will have its own access rules controlling whether
the user has adequate privileges to view the parent.  You will need to use the
authorization functions provided by the parents extension/class to implement
this function.

**You will probably want to implement this function.**


.. index:: function;attachmentsHiddenForParent

function attachmentsHiddenForParent()
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

.. code-block:: php

    /** Return true if the attachments should be hidden for this parent
     *
     * @param &object &$parent The object for the parent that onPrepareContent gives
     * @param int $parent_id The ID of the parent the attachment is attached to
     * @param string $parent_entity the type of entity for this parent type
     * @param &object &$params The Attachments component parameters object
     *
     * Note: this generic version only implements the 'frontpage' option.  All
     *       other options should be handled by the derived classes for other
     *       content types.
     *
     * @return true if the attachments should be hidden for this parent
     */
    function attachmentsHiddenForParent(&$parent, $parent_id, $parent_entity, &$params)
    {
    	// Check for generic options
	if ( parent::attachmentsHiddenForParent($parent, $parent_id, $parent_entity, $params) ) {
	    return true;
	    }

        ...
    }

This function checks to see if all the attachments should be hidden for the
specified parent entity.  Note that the 'Check for generic options' above
should be implemented as shown before checks related to your new content type.
This function call implements the global 'frontpage' option and should be
honored by all attachments lists.

**You will need to implement this function.**


.. index:: function;userMayAddAttachment

function userMayAddAttachment()
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

.. code-block:: php

    /**
     * Return true if the user may add an attachment to this parent
     *
     * (Note that all of the arguments are assumed to be valid; no sanity checking is done.
     *	It is up to the caller to validate these objects before calling this function.)
     *
     * @param int $parent_id The ID of the parent the attachment is attached to
     * @param string $parent_entity the type of entity for this parent type
     * @param bool $new_parent If true, the parent is being created and does not exist yet
     *
     * @return true if this user add attachments to this parent
     */
    function userMayAddAttachment($parent_id, $parent_entity, $new_parent=false)
    {
      ...
    }

Checks to see if the current user may add attachments to this entity.

The simplest implementation would be to always return **true**.  This would
mean than anyone can add an attachment to your new component.  This is
obviously not recommended for production but would make it easier to get your
attachments plugin working quickly for testing purposes.

If this function is not re-implemented, the default is that no users may add
attachments for the specified type of parent.  Effectively, this means that
only admin/superadmin should be able to add attachments (since the code
assumes they always can).

**You will need to implement this function.**


.. index:: function;userMayEditAttachment

function userMayEditAttachment()
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

.. code-block:: php

    /* Return true if this user may edit (modify/update/delete) this attachment for this parent
     *
     * (Note that all of the arguments are assumed to be valid; no sanity checking is done.
     *	It is up to the caller to validate the arguments before calling this function.)
     *
     * @param record $attachment database record for the attachment
     * @param int $parent_id The ID of the parent the attachment is attached to
     * @param $params The Attachments component parameters object
     *
     * @return true if this user may edit this attachment
     */
    function userMayEditAttachment(&$attachment, $parent_id, &$params)
    {
      ...
    }

Check the attachment and see if the current user may edit it.  For
attachments, 'Edit' means edit/modify or delete.

The simplest implementation would be to always return **true**.  This would
mean than anyone can edit all attachments to your new component.  This is
obviously not recommended for production but would make it easier to get your
attachments plugin working quickly for testing purposes.

If this function is not re-implemented, the default is that no users may edit
attachments for the specified type of parent.  Effectively, this means that
only admin/superadmin should be able to edit attachments (since the code
assumes they always can).

**You will need to implement this function.**


.. index:: function;userMayAccessAttachment

function userMayAccessAttachment()
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

.. code-block:: php

    /** Check to see if the user may access (see/download) the attachments
     *
     * @param &record &$attachment database record for the attachment
     *
     * @return true if access is okay (false if not)
     */
    function userMayAccessAttachment( &$attachment )
    {
      ...
    }

Check the attachment and see if the current user may access the attachment.
By 'access', we mean to see the attachments in attachments list and to be able
to download it.

The simplest implementation would be to always return **true**.  This would
mean than anyone can access (see/download) an attachment to your new
component.  This is obviously not recommended for production but would make it
easier to get your attachments plugin working quickly for testing purposes.

Currently, this is only checked in searches.  But it is likely that it will be
used elsewhere in the Attachments plugin in the future.

**You will need to implement this function.**



.. index:: function;determineParentEntity

function determineParentEntity()
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

.. code-block:: php

    /**
     * Determine the parent entity
     *
     * From the view and the class of the parent (row of onPrepareContent plugin),
     * determine what the entity type is for this entity.
     *
     * Derived classes must overrride this if they support more than 'default' entities.
     *
     * @param &object &$parent The object for the parent (row) that onPrepareContent gets
     *
     * @return the correct entity (eg, 'default', 'section', etc) or false if this entity should not be displayed.
     */
    function determineParentEntity(&$parent)
    {
      ...
    }

If the component does not have more than one type of entity, you will not need
to define this function; the one in the AttachmentsPlugin base class will be
fine.

**If there is more than one type of entity**, you will need to write code here to
distinguish them based on the OBJ and VIEW values you determined for each
entity in the diagnostic section :ref:`diagnostic-section`.  See the
attachments ``com_content.php`` plugin file for an example.

.. _section-optional-function:

Functions you may not need to implement
---------------------------------------

In your attachments plugin file ``com_newcomp.php``, you may not need to
implement the following functions:

.. index:: function;getParentId

function getParentId()
~~~~~~~~~~~~~~~~~~~~~~

.. code-block:: php

    /**
     * Return the parent entity / row ID
     *
     * This will only be called by the main attachments 'onPrepareContent'
     * plugin if $row does not have an id
     * 
     * @param object &row the article or content item (potential attachment parent)
     *
     * @return id if found, false if this is not a valid parent
     */
    function getParentId(&$row)
    {
	...
    }

When the regular attachments plugin is called from the front end when the
'onPrepareContent' plugin function is invoked, an object for the article or
content item is passed in as $row.  Normally $row has an ID field $row->id.
If your component has the field $row->id, then you will probably not need to
implement this function.  If $row does not have an $row->id field, the ID
should be some field of the $row object.  This function should extract the
entity ID and return it.  Note that the `onPrepareContent` call back function
may be invoked several times for each entity on the page.  You may need to
examine the other data about the entity (retrieved in the diagnostic section
:ref:`diagnostic-section`) to determine which call you want to process and
which ones you want to ignore. Return ``false`` for the ones you want to
ignore.


.. index:: function;parentExists

function parentExists()
~~~~~~~~~~~~~~~~~~~~~~~

.. code-block:: php

    /**
     * Does the parent exist?
     *
     * @param int $parent_id the ID for this parent object
     * @param string $parent_entity the type of entity for this parent type
     *
     * @return true if the parent exists
     */
    function parentExists($id, $parent_entity='default')
    {
      ...
    }

This function checks to see if the parent entity exists.  If you have defined
a table for the entity in the configuration file, you probably will not need
to redefine this function.


.. index:: function;getEntityAddUrl

function getEntityAddUrl()
~~~~~~~~~~~~~~~~~~~~~~~~~~

.. code-block:: php

    /**
     * Get a URL to add an attachment to a specific entity
     *
     * @param int $parent_id the ID for the parent entity object (null if the parent does not exist)
     * @param string $parent_entity the type of entity for this parent type
     * @param string $from where the call should return to
     *
     * @return the url to add a new attachments to the specified entity
     */
    function getEntityAddUrl($id, $parent_entity='default', $from='closeme')
    {
      ...
    }

This function constructs and returns a URL to add an attachment to a specific
entity.  You probably will not need to redefine it.


.. index:: function;getAttachmentPath

function getAttachmentPath()
~~~~~~~~~~~~~~~~~~~~~~~~~~~~

.. code-block:: php

    /**
     * Get the path for the uploaded file (on the server file system)
     *
     * Note that this does not include the base directory for attachments.
     *
     * @param string $parent_entity the type of entity for this parent type
     * @param int $parent_id the ID for the parent object
     * @param int $attachment_id the ID for the attachment
     *
     * @return string the directory name for this entity (with trailing DS!)
     */
    function getAttachmentPath($parent_entity, $parent_id, $attachment_id)
    {
      ...
    }

This function constructs the path for a newly uploaded attachment file.

You probably will not need to define this function.  If you are satisfied with
the default attachment file path scheme (see :ref:`attachment-paths-appendix`
for details), then you can use the version already defined in the
AttachmentsPlugin base class.


.. index:: function;getSelectEntityURL

function getSelectEntityURL()
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

.. code-block:: php

    /**
     * Return the URL that can be called to select a specific content item.
     *
     * @param string $parent_entity the type of entity to select from
     *
     * @return the URL that can be called to select a specific content item
     */
    function getSelectEntityURL($parent_entity='default')
    {
      ...
    }

This function builds and returns URL that will construct a list of a
particular type of entity and allow the user to select a specific one from the
list.  For example, in the Joomla! base component com_content, this is the
function that allows users to select an article.  

You probably will not need to implement this function.


.. index:: function;addPermissions

function addPermissions()
~~~~~~~~~~~~~~~~~~~~~~~~~

.. code-block:: php

    /**
     * Add the permissions to the array of attachments data
     *
     * @param &array &$attachments An array of attachments for an parent from a DB query.
     * @param int $parent_id the id of the parent
     *
     * @return true if some attachments should be visible, false if none should be visible
     *
     * This function adds the following boolean fields to each attachment row:
     *	   - 'user_may_see'
     *	   - 'user_may_edit'
     */
    function addPermissions( &$attachments, $parent_id )
    {
      ...
    }

Add the see/edit permissions to each row (attachment) of the array of
attachments.  This function makes use of the permissions functions and should
need reimplementation.

You probably will not need to implement this function.


Appendix B - Where the plugin files go when installed in Joomla!
================================================================

Once these files are installed in your Joomla! installation, they will go into
the following locations::

    .
    |-- administrator/language/en-GB/en-GB.plg_attachments_attachments_for_newcomp.ini
    |
    '-- plugins
        `-- attachments
            |-- attachments_for_newcomp.php 
            |-- attachments_for_newcomp.xml
            `-- plugins
                |-- com_newcomp.ini
                `-- com_newcomp.php


.. _attachment-paths-appendix:

Appendix C - Where are attachment files saved?
==============================================

When the attachment files are uploaded, they are stored in paths with the
following form ::

   <joomla>/attachments/<entity-name>/<entity-ID>/<filename>

where:

   <joomla>
      is the top directory in which your Joomla! installation is installed

   <entity-name>
      is the name of the entity type (*e.g.*, *article*).  Note that
      'default' is never used here since all entity names must be unique.

   <entity-ID> 
      is the ID of the specific entity to which the files are attached

   <filename>
      is the name of the file (without any associated path)

So for an article, the path might look like this::

   <joomla>/attachments/article/23/attachmentFile.txt

.. footer::

      Page  ###Page###


.. comment

   Local Variables:
   mode: rst
   End:
