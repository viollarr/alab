<?php 
/******************************************************************/
/* Title........: Patch Component for Joomla!/Mambo
/* Description..: Patch Component Make your Joomla!/Mambo Patch Easy
/* Author.......: Vincent Cheah
/* Version......: 1.1.0
/* Created......: 02/27/2008
/* Contact......: com_patch@byostech.com
/* Copyright....: (C) 2008 Vincent Cheah, ByOS Technologies. All rights reserved.
/* Note.........: This script is a part of Patch Component package.
/* License......: Released under GNU/GPL http://www.gnu.org/copyleft/gpl.html
/******************************************************************/
###################################################################
//Patch Component for Joomla!/Mambo
//Copyright (C) 2008  Vincent Cheah, ByOS Technologies. All rights reserved.
//
//This program is free software; you can redistribute it and/or
//modify it under the terms of the GNU General Public License
//as published by the Free Software Foundation; either version 2
//of the License, or (at your option) any later version.
//
//This program is distributed in the hope that it will be useful,
//but WITHOUT ANY WARRANTY; without even the implied warranty of
//MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
//GNU General Public License for more details.
//
//You should have received a copy of the GNU General Public License
//along with this program; if not, write to the Free Software
//Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
###################################################################

// Dont allow direct linking
defined( '_VALID_MOS' ) or die( 'Direct Access to this location is not allowed. [ <a href="http://www.byostech.com">Patch Component for Joomla!/Mambo</a> ]' );

// Your Title
$title = "Patch Component For Upgrading Joomla! to 1.0.15 and JACLPlus to v1.0.15a";

// Your Message to users
$message = "<p>Patch Component For Upgrading Joomla! to 1.0.15 and JACLPlus to v1.0.15a</p>";

// If your replaced file need to back up, what should we add extansion to filename
$backupext = ".jaclplus.bak";

// SQL Queries that you need Patch Component to do upon installation
$Install_SQL_Queries = array(
	// SQL Query, Error Message
	);

// Files that you need Patch Component to replace
$Replace_Files = array( 
	// File to be replaced, Replacement file, Create bak?
	// Will automatically create dir if non exist (One Level Only!)
	// If you want to replace a xml file, you must use other extension for the xml replacement file to avoid com_installer process your xml file
	// E.g. file to replace 'jaclplus.xml', replacement file better be 'jaclplus.lmx' or else (can not be 'jaclplus.xml')
	array("/CHANGELOG.php", "/patch/CHANGELOG.php", false),
	array("/configuration.php-dist", "/patch/configuration.php-dist", false),
	array("/globals.php", "/patch/globals.php", false),
	array("/index.php", "/patch/index.php", false),
	array("/index2.php", "/patch/index2.php", false),
	array("/administrator/index.php", "/patch/administrator/index.php", false),
	array("/administrator/index2.php", "/patch/administrator/index2.php", false),
	array("/administrator/index3.php", "/patch/administrator/index3.php", false),
	array("/help/joomla.credits.html", "/patch/help/joomla.credits.html", false),
	array("/help/joomla.glossary.html", "/patch/help/joomla.glossary.html", false),
	array("/help/joomla.support.html", "/patch/help/joomla.support.html", false),
	array("/help/joomla.whatsnew100.html", "/patch/help/joomla.whatsnew100.html", false),
	array("/help/screen.banners.client.edit.html", "/patch/help/screen.banners.client.edit.html", false),
	array("/help/screen.banners.client.html", "/patch/help/screen.banners.client.html", false),
	array("/help/screen.banners.edit.html", "/patch/help/screen.banners.edit.html", false),
	array("/help/screen.banners.html", "/patch/help/screen.banners.html", false),
	array("/help/screen.banners.what.html", "/patch/help/screen.banners.what.html", false),
	array("/help/screen.categories.contact.edit.html", "/patch/help/screen.categories.contact.edit.html", false),
	array("/help/screen.categories.contact.html", "/patch/help/screen.categories.contact.html", false),
	array("/help/screen.categories.copy.html", "/patch/help/screen.categories.copy.html", false),
	array("/help/screen.categories.edit.html", "/patch/help/screen.categories.edit.html", false),
	array("/help/screen.categories.html", "/patch/help/screen.categories.html", false),
	array("/help/screen.categories.move.html", "/patch/help/screen.categories.move.html", false),
	array("/help/screen.categories.newsfeeds.edit.html", "/patch/help/screen.categories.newsfeeds.edit.html", false),
	array("/help/screen.categories.newsfeeds.html", "/patch/help/screen.categories.newsfeeds.html", false),
	array("/help/screen.categories.weblinks.edit.html", "/patch/help/screen.categories.weblinks.edit.html", false),
	array("/help/screen.categories.weblinks.html", "/patch/help/screen.categories.weblinks.html", false),
	array("/help/screen.checkin.html", "/patch/help/screen.checkin.html", false),
	array("/help/screen.component.what.html", "/patch/help/screen.component.what.html", false),
	array("/help/screen.config.html", "/patch/help/screen.config.html", false),
	array("/help/screen.contact.what.html", "/patch/help/screen.contact.what.html", false),
	array("/help/screen.contactmanager.edit.html", "/patch/help/screen.contactmanager.edit.html", false),
	array("/help/screen.contactmanager.html", "/patch/help/screen.contactmanager.html", false),
	array("/help/screen.content..item.bysection.html", "/patch/help/screen.content..item.bysection.html", false),
	array("/help/screen.content.archive.html", "/patch/help/screen.content.archive.html", false),
	array("/help/screen.content.edit.html", "/patch/help/screen.content.edit.html", false),
	array("/help/screen.content.html", "/patch/help/screen.content.html", false),
	array("/help/screen.content.impressions.html", "/patch/help/screen.content.impressions.html", false),
	array("/help/screen.content.item.copy.html", "/patch/help/screen.content.item.copy.html", false),
	array("/help/screen.content.item.move.html", "/patch/help/screen.content.item.move.html", false),
	array("/help/screen.content.what.html", "/patch/help/screen.content.what.html", false),
	array("/help/screen.cpanel.html", "/patch/help/screen.cpanel.html", false),
	array("/help/screen.frontpage.html", "/patch/help/screen.frontpage.html", false),
	array("/help/screen.installer.components.html", "/patch/help/screen.installer.components.html", false),
	array("/help/screen.installer.html", "/patch/help/screen.installer.html", false),
	array("/help/screen.installer.mambots.html", "/patch/help/screen.installer.mambots.html", false),
	array("/help/screen.installer.modules.html", "/patch/help/screen.installer.modules.html", false),
	array("/help/screen.installer.template.admin.html", "/patch/help/screen.installer.template.admin.html", false),
	array("/help/screen.installer.template.site.html", "/patch/help/screen.installer.template.site.html", false),
	array("/help/screen.installer2.html", "/patch/help/screen.installer2.html", false),
	array("/help/screen.languages.edit.html", "/patch/help/screen.languages.edit.html", false),
	array("/help/screen.languages.html", "/patch/help/screen.languages.html", false),
	array("/help/screen.mambots.edit.cloaking.html", "/patch/help/screen.mambots.edit.cloaking.html", false),
	array("/help/screen.mambots.edit.codesupp.html", "/patch/help/screen.mambots.edit.codesupp.html", false),
	array("/help/screen.mambots.edit.geshi.html", "/patch/help/screen.mambots.edit.geshi.html", false),
	array("/help/screen.mambots.edit.html", "/patch/help/screen.mambots.edit.html", false),
	array("/help/screen.mambots.edit.img.button.html", "/patch/help/screen.mambots.edit.img.button.html", false),
	array("/help/screen.mambots.edit.legacy.html", "/patch/help/screen.mambots.edit.legacy.html", false),
	array("/help/screen.mambots.edit.modpos.html", "/patch/help/screen.mambots.edit.modpos.html", false),
	array("/help/screen.mambots.edit.mosimage.html", "/patch/help/screen.mambots.edit.mosimage.html", false),
	array("/help/screen.mambots.edit.mosrating.html", "/patch/help/screen.mambots.edit.mosrating.html", false),
	array("/help/screen.mambots.edit.nowysiwyg.html", "/patch/help/screen.mambots.edit.nowysiwyg.html", false),
	array("/help/screen.mambots.edit.page.button.html", "/patch/help/screen.mambots.edit.page.button.html", false),
	array("/help/screen.mambots.edit.sef.html", "/patch/help/screen.mambots.edit.sef.html", false),
	array("/help/screen.mambots.edit.tinymce.html", "/patch/help/screen.mambots.edit.tinymce.html", false),
	array("/help/screen.mambots.html", "/patch/help/screen.mambots.html", false),
	array("/help/screen.mambots.search.categories.html", "/patch/help/screen.mambots.search.categories.html", false),
	array("/help/screen.mambots.search.content.html", "/patch/help/screen.mambots.search.content.html", false),
	array("/help/screen.mambots.search.newsfeeds.html", "/patch/help/screen.mambots.search.newsfeeds.html", false),
	array("/help/screen.mambots.search.sections.html", "/patch/help/screen.mambots.search.sections.html", false),
	array("/help/screen.mambots.search.weblinks.html", "/patch/help/screen.mambots.search.weblinks.html", false),
	array("/help/screen.mambots.what.html", "/patch/help/screen.mambots.what.html", false),
	array("/help/screen.mediamanager.html", "/patch/help/screen.mediamanager.html", false),
	array("/help/screen.menumanager.copy.html", "/patch/help/screen.menumanager.copy.html", false),
	array("/help/screen.menumanager.html", "/patch/help/screen.menumanager.html", false),
	array("/help/screen.menumanager.new.html", "/patch/help/screen.menumanager.new.html", false),
	array("/help/screen.menus.blog.content.cat.arch.html", "/patch/help/screen.menus.blog.content.cat.arch.html", false),
	array("/help/screen.menus.blog.content.cat.html", "/patch/help/screen.menus.blog.content.cat.html", false),
	array("/help/screen.menus.blog.content.sec.arch.html", "/patch/help/screen.menus.blog.content.sec.arch.html", false),
	array("/help/screen.menus.blog.content.sec.html", "/patch/help/screen.menus.blog.content.sec.html", false),
	array("/help/screen.menus.comp.contact.html", "/patch/help/screen.menus.comp.contact.html", false),
	array("/help/screen.menus.comp.front.html", "/patch/help/screen.menus.comp.front.html", false),
	array("/help/screen.menus.comp.html", "/patch/help/screen.menus.comp.html", false),
	array("/help/screen.menus.comp.login.html", "/patch/help/screen.menus.comp.login.html", false),
	array("/help/screen.menus.comp.news.html", "/patch/help/screen.menus.comp.news.html", false),
	array("/help/screen.menus.comp.polls.html", "/patch/help/screen.menus.comp.polls.html", false),
	array("/help/screen.menus.comp.search.html", "/patch/help/screen.menus.comp.search.html", false),
	array("/help/screen.menus.comp.wl.html", "/patch/help/screen.menus.comp.wl.html", false),
	array("/help/screen.menus.copy.html", "/patch/help/screen.menus.copy.html", false),
	array("/help/screen.menus.edit.html", "/patch/help/screen.menus.edit.html", false),
	array("/help/screen.menus.html", "/patch/help/screen.menus.html", false),
	array("/help/screen.menus.link.componentitem.html", "/patch/help/screen.menus.link.componentitem.html", false),
	array("/help/screen.menus.link.contactitem.html", "/patch/help/screen.menus.link.contactitem.html", false),
	array("/help/screen.menus.link.contentitem.html", "/patch/help/screen.menus.link.contentitem.html", false),
	array("/help/screen.menus.link.newsfeed.html", "/patch/help/screen.menus.link.newsfeed.html", false),
	array("/help/screen.menus.link.staticitem.html", "/patch/help/screen.menus.link.staticitem.html", false),
	array("/help/screen.menus.link.url.html", "/patch/help/screen.menus.link.url.html", false),
	array("/help/screen.menus.list.content.sec.html", "/patch/help/screen.menus.list.content.sec.html", false),
	array("/help/screen.menus.move.html", "/patch/help/screen.menus.move.html", false),
	array("/help/screen.menus.new.html", "/patch/help/screen.menus.new.html", false),
	array("/help/screen.menus.other.html", "/patch/help/screen.menus.other.html", false),
	array("/help/screen.menus.place.html", "/patch/help/screen.menus.place.html", false),
	array("/help/screen.menus.submit.content.html", "/patch/help/screen.menus.submit.content.html", false),
	array("/help/screen.menus.table.contact.cat.html", "/patch/help/screen.menus.table.contact.cat.html", false),
	array("/help/screen.menus.table.content.cat.html", "/patch/help/screen.menus.table.content.cat.html", false),
	array("/help/screen.menus.table.news.cat.html", "/patch/help/screen.menus.table.news.cat.html", false),
	array("/help/screen.menus.table.weblink.cat.html", "/patch/help/screen.menus.table.weblink.cat.html", false),
	array("/help/screen.menus.top.html", "/patch/help/screen.menus.top.html", false),
	array("/help/screen.menus.user.html", "/patch/help/screen.menus.user.html", false),
	array("/help/screen.menus.what.html", "/patch/help/screen.menus.what.html", false),
	array("/help/screen.menus.wrapper.html", "/patch/help/screen.menus.wrapper.html", false),
	array("/help/screen.messages.conf.html", "/patch/help/screen.messages.conf.html", false),
	array("/help/screen.messages.inbox.html", "/patch/help/screen.messages.inbox.html", false),
	array("/help/screen.modadmin.edit.components.html", "/patch/help/screen.modadmin.edit.components.html", false),
	array("/help/screen.modadmin.edit.fullmenu.html", "/patch/help/screen.modadmin.edit.fullmenu.html", false),
	array("/help/screen.modadmin.edit.latest.html", "/patch/help/screen.modadmin.edit.latest.html", false),
	array("/help/screen.modadmin.edit.logged.html", "/patch/help/screen.modadmin.edit.logged.html", false),
	array("/help/screen.modadmin.edit.menustats.html", "/patch/help/screen.modadmin.edit.menustats.html", false),
	array("/help/screen.modadmin.edit.online.html", "/patch/help/screen.modadmin.edit.online.html", false),
	array("/help/screen.modadmin.edit.path.html", "/patch/help/screen.modadmin.edit.path.html", false),
	array("/help/screen.modadmin.edit.popular.html", "/patch/help/screen.modadmin.edit.popular.html", false),
	array("/help/screen.modadmin.edit.quickicons.html", "/patch/help/screen.modadmin.edit.quickicons.html", false),
	array("/help/screen.modadmin.edit.sysmess.html", "/patch/help/screen.modadmin.edit.sysmess.html", false),
	array("/help/screen.modadmin.edit.toolbar.html", "/patch/help/screen.modadmin.edit.toolbar.html", false),
	array("/help/screen.modadmin.edit.unread.html", "/patch/help/screen.modadmin.edit.unread.html", false),
	array("/help/screen.modadmin.html", "/patch/help/screen.modadmin.html", false),
	array("/help/screen.modadmin.new.html", "/patch/help/screen.modadmin.new.html", false),
	array("/help/screen.modules.edit.archive.html", "/patch/help/screen.modules.edit.archive.html", false),
	array("/help/screen.modules.edit.banners.html", "/patch/help/screen.modules.edit.banners.html", false),
	array("/help/screen.modules.edit.chooser.html", "/patch/help/screen.modules.edit.chooser.html", false),
	array("/help/screen.modules.edit.html", "/patch/help/screen.modules.edit.html", false),
	array("/help/screen.modules.edit.latest.html", "/patch/help/screen.modules.edit.latest.html", false),
	array("/help/screen.modules.edit.login.html", "/patch/help/screen.modules.edit.login.html", false),
	array("/help/screen.modules.edit.main.html", "/patch/help/screen.modules.edit.main.html", false),
	array("/help/screen.modules.edit.newsflash.html", "/patch/help/screen.modules.edit.newsflash.html", false),
	array("/help/screen.modules.edit.other.html", "/patch/help/screen.modules.edit.other.html", false),
	array("/help/screen.modules.edit.polls.html", "/patch/help/screen.modules.edit.polls.html", false),
	array("/help/screen.modules.edit.popular.html", "/patch/help/screen.modules.edit.popular.html", false),
	array("/help/screen.modules.edit.randimage.html", "/patch/help/screen.modules.edit.randimage.html", false),
	array("/help/screen.modules.edit.related.html", "/patch/help/screen.modules.edit.related.html", false),
	array("/help/screen.modules.edit.search.html", "/patch/help/screen.modules.edit.search.html", false),
	array("/help/screen.modules.edit.sections.html", "/patch/help/screen.modules.edit.sections.html", false),
	array("/help/screen.modules.edit.statistics.html", "/patch/help/screen.modules.edit.statistics.html", false),
	array("/help/screen.modules.edit.syndicate.html", "/patch/help/screen.modules.edit.syndicate.html", false),
	array("/help/screen.modules.edit.top.html", "/patch/help/screen.modules.edit.top.html", false),
	array("/help/screen.modules.edit.user.html", "/patch/help/screen.modules.edit.user.html", false),
	array("/help/screen.modules.edit.whosonline.html", "/patch/help/screen.modules.edit.whosonline.html", false),
	array("/help/screen.modules.edit.wrapper.html", "/patch/help/screen.modules.edit.wrapper.html", false),
	array("/help/screen.modules.html", "/patch/help/screen.modules.html", false),
	array("/help/screen.modules.new.html", "/patch/help/screen.modules.new.html", false),
	array("/help/screen.modules.what.html", "/patch/help/screen.modules.what.html", false),
	array("/help/screen.newsfeed.what.html", "/patch/help/screen.newsfeed.what.html", false),
	array("/help/screen.newsfeeds.edit.html", "/patch/help/screen.newsfeeds.edit.html", false),
	array("/help/screen.newsfeeds.html", "/patch/help/screen.newsfeeds.html", false),
	array("/help/screen.polls.edit.html", "/patch/help/screen.polls.edit.html", false),
	array("/help/screen.polls.html", "/patch/help/screen.polls.html", false),
	array("/help/screen.polls.what.html", "/patch/help/screen.polls.what.html", false),
	array("/help/screen.preview.html", "/patch/help/screen.preview.html", false),
	array("/help/screen.section.copy.html", "/patch/help/screen.section.copy.html", false),
	array("/help/screen.sections.edit.html", "/patch/help/screen.sections.edit.html", false),
	array("/help/screen.sections.html", "/patch/help/screen.sections.html", false),
	array("/help/screen.staticcontent.edit.html", "/patch/help/screen.staticcontent.edit.html", false),
	array("/help/screen.staticcontent.html", "/patch/help/screen.staticcontent.html", false),
	array("/help/screen.stats.searches.html", "/patch/help/screen.stats.searches.html", false),
	array("/help/screen.stats.statistics.html", "/patch/help/screen.stats.statistics.html", false),
	array("/help/screen.syndicate.html", "/patch/help/screen.syndicate.html", false),
	array("/help/screen.system.info.html", "/patch/help/screen.system.info.html", false),
	array("/help/screen.templates.admin.html", "/patch/help/screen.templates.admin.html", false),
	array("/help/screen.templates.assign.html", "/patch/help/screen.templates.assign.html", false),
	array("/help/screen.templates.css.html", "/patch/help/screen.templates.css.html", false),
	array("/help/screen.templates.html", "/patch/help/screen.templates.html", false),
	array("/help/screen.templates.html.html", "/patch/help/screen.templates.html.html", false),
	array("/help/screen.templates.modules.html", "/patch/help/screen.templates.modules.html", false),
	array("/help/screen.trashmanager.html", "/patch/help/screen.trashmanager.html", false),
	array("/help/screen.users.acl.html", "/patch/help/screen.users.acl.html", false),
	array("/help/screen.users.edit.html", "/patch/help/screen.users.edit.html", false),
	array("/help/screen.users.html", "/patch/help/screen.users.html", false),
	array("/help/screen.users.massmail.html", "/patch/help/screen.users.massmail.html", false),
	array("/help/screen.users.new.html", "/patch/help/screen.users.new.html", false),
	array("/help/screen.weblink.edit.html", "/patch/help/screen.weblink.edit.html", false),
	array("/help/screen.weblink.html", "/patch/help/screen.weblink.html", false),
	array("/help/screen.weblink.what.html", "/patch/help/screen.weblink.what.html", false),
	array("/includes/database.mysql5.php", "/patch/includes/database.mysql5.php", false),
	array("/includes/database.mysqli.php", "/patch/includes/database.mysqli.php", false),
	array("/includes/database.php", "/patch/includes/database.php", false),
	array("/includes/frontend.php", "/patch/includes/frontend.php", false),
	array("/includes/gacl.class.php", "/patch/includes/gacl.class.php", false),
	array("/includes/gacl_api.class.php", "/patch/includes/gacl_api.class.php", false),
	array("/includes/gacl_api.class.php.jaclplus.bak", "/patch/includes/gacl_api.class.php.jaclplus.bak", false),
	array("/includes/joomla.cache.php", "/patch/includes/joomla.cache.php", false),
	array("/includes/joomla.php", "/patch/includes/joomla.php", false),
	array("/includes/joomla.php.jaclplus.bak", "/patch/includes/joomla.php.jaclplus.bak", false),
	array("/includes/pageNavigation.php", "/patch/includes/pageNavigation.php", false),
	array("/includes/pathway.php", "/patch/includes/pathway.php", false),
	array("/includes/pdf.php", "/patch/includes/pdf.php", false),
	array("/includes/version.php", "/patch/includes/version.php", false),
	array("/modules/custom.xml", "/patch/modules/custom.lmx", false),
	array("/modules/mod_archive.xml", "/patch/modules/mod_archive.lmx", false),
	array("/modules/mod_banners.xml", "/patch/modules/mod_banners.lmx", false),
	array("/modules/mod_latestnews.php", "/patch/modules/mod_latestnews.php", false),
	array("/modules/mod_latestnews.xml", "/patch/modules/mod_latestnews.lmx", false),
	array("/modules/mod_login.php", "/patch/modules/mod_login.php", false),
	array("/modules/mod_login.xml", "/patch/modules/mod_login.lmx", false),
	array("/modules/mod_mainmenu.php", "/patch/modules/mod_mainmenu.php", false),
	array("/modules/mod_mainmenu.xml", "/patch/modules/mod_mainmenu.lmx", false),
	array("/modules/mod_mostread.php", "/patch/modules/mod_mostread.php", false),
	array("/modules/mod_mostread.xml", "/patch/modules/mod_mostread.lmx", false),
	array("/modules/mod_newsflash.php", "/patch/modules/mod_newsflash.php", false),
	array("/modules/mod_newsflash.xml", "/patch/modules/mod_newsflash.lmx", false),
	array("/modules/mod_poll.xml", "/patch/modules/mod_poll.lmx", false),
	array("/modules/mod_random_image.xml", "/patch/modules/mod_random_image.lmx", false),
	array("/modules/mod_related_items.php", "/patch/modules/mod_related_items.php", false),
	array("/modules/mod_related_items.xml", "/patch/modules/mod_related_items.lmx", false),
	array("/modules/mod_rssfeed.xml", "/patch/modules/mod_rssfeed.lmx", false),
	array("/modules/mod_search.xml", "/patch/modules/mod_search.lmx", false),
	array("/modules/mod_sections.php", "/patch/modules/mod_sections.php", false),
	array("/modules/mod_sections.xml", "/patch/modules/mod_sections.lmx", false),
	array("/modules/mod_stats.xml", "/patch/modules/mod_stats.lmx", false),
	array("/modules/mod_templatechooser.xml", "/patch/modules/mod_templatechooser.lmx", false),
	array("/modules/mod_whosonline.xml", "/patch/modules/mod_whosonline.lmx", false),
	array("/modules/mod_wrapper.xml", "/patch/modules/mod_wrapper.lmx", false),
	array("/templates/404.php", "/patch/templates/404.php", false),
	array("/administrator/includes/admin.php", "/patch/administrator/includes/admin.php", false),
	array("/administrator/includes/auth.php", "/patch/administrator/includes/auth.php", false),
	array("/administrator/modules/custom.xml", "/patch/administrator/modules/custom.lmx", false),
	array("/administrator/modules/mod_components.php", "/patch/administrator/modules/mod_components.php", false),
	array("/administrator/modules/mod_components.xml", "/patch/administrator/modules/mod_components.lmx", false),
	array("/administrator/modules/mod_fullmenu.php", "/patch/administrator/modules/mod_fullmenu.php", false),
	array("/administrator/modules/mod_latest.xml", "/patch/administrator/modules/mod_latest.lmx", false),
	array("/administrator/modules/mod_logged.php", "/patch/administrator/modules/mod_logged.php", false),
	array("/administrator/modules/mod_logged.xml", "/patch/administrator/modules/mod_logged.lmx", false),
	array("/administrator/modules/mod_popular.xml", "/patch/administrator/modules/mod_popular.lmx", false),
	array("/administrator/modules/mod_quickicon.php", "/patch/administrator/modules/mod_quickicon.php", false),
	array("/administrator/modules/mod_quickicon.xml", "/patch/administrator/modules/mod_quickicon.lmx", false),
	array("/administrator/modules/mod_stats.xml", "/patch/administrator/modules/mod_stats.lmx", false),
	array("/administrator/popups/pollwindow.php", "/patch/administrator/popups/pollwindow.php", false),
	array("/administrator/popups/uploadimage.php", "/patch/administrator/popups/uploadimage.php", false),
	array("/components/com_banners/banners.class.php", "/patch/components/com_banners/banners.class.php", false),
	array("/components/com_banners/banners.php", "/patch/components/com_banners/banners.php", false),
	array("/components/com_contact/contact.class.php", "/patch/components/com_contact/contact.class.php", false),
	array("/components/com_contact/contact.html.php", "/patch/components/com_contact/contact.html.php", false),
	array("/components/com_contact/contact.php", "/patch/components/com_contact/contact.php", false),
	array("/components/com_content/content.html.php", "/patch/components/com_content/content.html.php", false),
	array("/components/com_content/content.html.php.jaclplus.bak", "/patch/components/com_content/content.html.php.jaclplus.bak", false),
	array("/components/com_content/content.php", "/patch/components/com_content/content.php", false),
	array("/components/com_content/content.php.jaclplus.bak", "/patch/components/com_content/content.php.jaclplus.bak", false),
	array("/components/com_frontpage/frontpage.class.php", "/patch/components/com_frontpage/frontpage.class.php", false),
	array("/components/com_frontpage/frontpage.php", "/patch/components/com_frontpage/frontpage.php", false),
	array("/components/com_login/login.html.php", "/patch/components/com_login/login.html.php", false),
	array("/components/com_login/login.php", "/patch/components/com_login/login.php", false),
	array("/components/com_messages/messages.class.php", "/patch/components/com_messages/messages.class.php", false),
	array("/components/com_newsfeeds/newsfeeds.html.php", "/patch/components/com_newsfeeds/newsfeeds.html.php", false),
	array("/components/com_newsfeeds/newsfeeds.php", "/patch/components/com_newsfeeds/newsfeeds.php", false),
	array("/components/com_poll/poll.class.php", "/patch/components/com_poll/poll.class.php", false),
	array("/components/com_poll/poll.html.php", "/patch/components/com_poll/poll.html.php", false),
	array("/components/com_poll/poll.php", "/patch/components/com_poll/poll.php", false),
	array("/components/com_registration/registration.html.php", "/patch/components/com_registration/registration.html.php", false),
	array("/components/com_registration/registration.php", "/patch/components/com_registration/registration.php", false),
	array("/components/com_rss/rss.php", "/patch/components/com_rss/rss.php", false),
	array("/components/com_search/search.html.php", "/patch/components/com_search/search.html.php", false),
	array("/components/com_search/search.php", "/patch/components/com_search/search.php", false),
	array("/components/com_user/user.html.php", "/patch/components/com_user/user.html.php", false),
	array("/components/com_user/user.php", "/patch/components/com_user/user.php", false),
	array("/components/com_weblinks/weblinks.class.php", "/patch/components/com_weblinks/weblinks.class.php", false),
	array("/components/com_weblinks/weblinks.html.php", "/patch/components/com_weblinks/weblinks.html.php", false),
	array("/components/com_weblinks/weblinks.php", "/patch/components/com_weblinks/weblinks.php", false),
	array("/components/com_wrapper/wrapper.html.php", "/patch/components/com_wrapper/wrapper.html.php", false),
	array("/components/com_wrapper/wrapper.php", "/patch/components/com_wrapper/wrapper.php", false),
	array("/includes/domit/dom_xmlrpc_datetime_iso8601.php", "/patch/includes/domit/dom_lmxrpc_datetime_iso8601.php", false),
	array("/includes/domit/dom_xmlrpc_object.php", "/patch/includes/domit/dom_lmxrpc_object.php", false),
	array("/includes/domit/php_http_server_generic.php", "/patch/includes/domit/php_http_server_generic.php", false),
	array("/includes/domit/php_http_status_codes.php", "/patch/includes/domit/php_http_status_codes.php", false),
	array("/includes/phpInputFilter/class.inputfilter.php", "/patch/includes/phpInputFilter/class.inputfilter.php", false),
	array("/mambots/content/geshi.xml", "/patch/mambots/content/geshi.lmx", false),
	array("/mambots/content/legacybots.xml", "/patch/mambots/content/legacybots.lmx", false),
	array("/mambots/content/moscode.xml", "/patch/mambots/content/moscode.lmx", false),
	array("/mambots/content/mosemailcloak.xml", "/patch/mambots/content/mosemailcloak.lmx", false),
	array("/mambots/content/mosimage.xml", "/patch/mambots/content/mosimage.lmx", false),
	array("/mambots/content/mosloadposition.xml", "/patch/mambots/content/mosloadposition.lmx", false),
	array("/mambots/content/mospaging.xml", "/patch/mambots/content/mospaging.lmx", false),
	array("/mambots/content/mossef.xml", "/patch/mambots/content/mossef.lmx", false),
	array("/mambots/content/mosvote.xml", "/patch/mambots/content/mosvote.lmx", false),
	array("/mambots/editors/none.xml", "/patch/mambots/editors/none.lmx", false),
	array("/mambots/editors-xtd/mosimage.btn.xml", "/patch/mambots/editors-xtd/mosimage.btn.lmx", false),
	array("/mambots/editors-xtd/mospage.btn.xml", "/patch/mambots/editors-xtd/mospage.btn.lmx", false),
	array("/mambots/search/categories.searchbot.php", "/patch/mambots/search/categories.searchbot.php", false),
	array("/mambots/search/categories.searchbot.xml", "/patch/mambots/search/categories.searchbot.lmx", false),
	array("/mambots/search/contacts.searchbot.php", "/patch/mambots/search/contacts.searchbot.php", false),
	array("/mambots/search/contacts.searchbot.xml", "/patch/mambots/search/contacts.searchbot.lmx", false),
	array("/mambots/search/content.searchbot.php", "/patch/mambots/search/content.searchbot.php", false),
	array("/mambots/search/content.searchbot.xml", "/patch/mambots/search/content.searchbot.lmx", false),
	array("/mambots/search/newsfeeds.searchbot.php", "/patch/mambots/search/newsfeeds.searchbot.php", false),
	array("/mambots/search/newsfeeds.searchbot.xml", "/patch/mambots/search/newsfeeds.searchbot.lmx", false),
	array("/mambots/search/sections.searchbot.php", "/patch/mambots/search/sections.searchbot.php", false),
	array("/mambots/search/sections.searchbot.xml", "/patch/mambots/search/sections.searchbot.lmx", false),
	array("/mambots/search/weblinks.searchbot.php", "/patch/mambots/search/weblinks.searchbot.php", false),
	array("/mambots/search/weblinks.searchbot.xml", "/patch/mambots/search/weblinks.searchbot.lmx", false),
	array("/administrator/components/com_admin/admin.admin.html.php", "/patch/administrator/components/com_admin/admin.admin.html.php", false),
	array("/administrator/components/com_admin/admin.admin.php", "/patch/administrator/components/com_admin/admin.admin.php", false),
	array("/administrator/components/com_admin/toolbar.admin.html.php", "/patch/administrator/components/com_admin/toolbar.admin.html.php", false),
	array("/administrator/components/com_admin/toolbar.admin.php", "/patch/administrator/components/com_admin/toolbar.admin.php", false),
	array("/administrator/components/com_banners/admin.banners.html.php", "/patch/administrator/components/com_banners/admin.banners.html.php", false),
	array("/administrator/components/com_banners/admin.banners.php", "/patch/administrator/components/com_banners/admin.banners.php", false),
	array("/administrator/components/com_banners/banners.xml", "/patch/administrator/components/com_banners/banners.lmx", false),
	array("/administrator/components/com_banners/toolbar.banners.html.php", "/patch/administrator/components/com_banners/toolbar.banners.html.php", false),
	array("/administrator/components/com_banners/toolbar.banners.php", "/patch/administrator/components/com_banners/toolbar.banners.php", false),
	array("/administrator/components/com_categories/admin.categories.html.php", "/patch/administrator/components/com_categories/admin.categories.html.php", false),
	array("/administrator/components/com_categories/admin.categories.php", "/patch/administrator/components/com_categories/admin.categories.php", false),
	array("/administrator/components/com_categories/toolbar.categories.html.php", "/patch/administrator/components/com_categories/toolbar.categories.html.php", false),
	array("/administrator/components/com_categories/toolbar.categories.php", "/patch/administrator/components/com_categories/toolbar.categories.php", false),
	array("/administrator/components/com_checkin/admin.checkin.php", "/patch/administrator/components/com_checkin/admin.checkin.php", false),
	array("/administrator/components/com_checkin/toolbar.checkin.html.php", "/patch/administrator/components/com_checkin/toolbar.checkin.html.php", false),
	array("/administrator/components/com_checkin/toolbar.checkin.php", "/patch/administrator/components/com_checkin/toolbar.checkin.php", false),
	array("/administrator/components/com_config/admin.config.html.php", "/patch/administrator/components/com_config/admin.config.html.php", false),
	array("/administrator/components/com_config/admin.config.php", "/patch/administrator/components/com_config/admin.config.php", false),
	array("/administrator/components/com_config/config.class.php", "/patch/administrator/components/com_config/config.class.php", false),
	array("/administrator/components/com_config/toolbar.config.html.php", "/patch/administrator/components/com_config/toolbar.config.html.php", false),
	array("/administrator/components/com_config/toolbar.config.php", "/patch/administrator/components/com_config/toolbar.config.php", false),
	array("/administrator/components/com_contact/admin.contact.html.php", "/patch/administrator/components/com_contact/admin.contact.html.php", false),
	array("/administrator/components/com_contact/admin.contact.php", "/patch/administrator/components/com_contact/admin.contact.php", false),
	array("/administrator/components/com_contact/contact.xml", "/patch/administrator/components/com_contact/contact.lmx", false),
	array("/administrator/components/com_contact/contact_items.xml", "/patch/administrator/components/com_contact/contact_items.lmx", false),
	array("/administrator/components/com_contact/toolbar.contact.html.php", "/patch/administrator/components/com_contact/toolbar.contact.html.php", false),
	array("/administrator/components/com_contact/toolbar.contact.php", "/patch/administrator/components/com_contact/toolbar.contact.php", false),
	array("/administrator/components/com_content/admin.content.html.php", "/patch/administrator/components/com_content/admin.content.html.php", false),
	array("/administrator/components/com_content/admin.content.php", "/patch/administrator/components/com_content/admin.content.php", false),
	array("/administrator/components/com_content/content.xml", "/patch/administrator/components/com_content/content.lmx", false),
	array("/administrator/components/com_content/toolbar.content.html.php", "/patch/administrator/components/com_content/toolbar.content.html.php", false),
	array("/administrator/components/com_content/toolbar.content.php", "/patch/administrator/components/com_content/toolbar.content.php", false),
	array("/administrator/components/com_frontpage/admin.frontpage.html.php", "/patch/administrator/components/com_frontpage/admin.frontpage.html.php", false),
	array("/administrator/components/com_frontpage/admin.frontpage.php", "/patch/administrator/components/com_frontpage/admin.frontpage.php", false),
	array("/administrator/components/com_frontpage/frontpage.xml", "/patch/administrator/components/com_frontpage/frontpage.lmx", false),
	array("/administrator/components/com_frontpage/toolbar.frontpage.html.php", "/patch/administrator/components/com_frontpage/toolbar.frontpage.html.php", false),
	array("/administrator/components/com_frontpage/toolbar.frontpage.php", "/patch/administrator/components/com_frontpage/toolbar.frontpage.php", false),
	array("/administrator/components/com_installer/admin.installer.html.php", "/patch/administrator/components/com_installer/admin.installer.html.php", false),
	array("/administrator/components/com_installer/admin.installer.php", "/patch/administrator/components/com_installer/admin.installer.php", false),
	array("/administrator/components/com_installer/installer.class.php", "/patch/administrator/components/com_installer/installer.class.php", false),
	array("/administrator/components/com_installer/toolbar.installer.html.php", "/patch/administrator/components/com_installer/toolbar.installer.html.php", false),
	array("/administrator/components/com_installer/toolbar.installer.php", "/patch/administrator/components/com_installer/toolbar.installer.php", false),
	array("/administrator/components/com_jaclplus/admin.jaclplus.html.php", "/patch/administrator/components/com_jaclplus/admin.jaclplus.html.php", false),
	array("/administrator/components/com_jaclplus/admin.jaclplus.php", "/patch/administrator/components/com_jaclplus/admin.jaclplus.php", false),
	array("/administrator/components/com_jaclplus/config.jaclplus.php", "/patch/administrator/components/com_jaclplus/config.jaclplus.php", false),
	array("/administrator/components/com_jaclplus/index.html", "/patch/administrator/components/com_jaclplus/index.html", false),
	array("/administrator/components/com_jaclplus/install.jaclplus.php", "/patch/administrator/components/com_jaclplus/install.jaclplus.php", false),
	array("/administrator/components/com_jaclplus/jaclplus.class.php", "/patch/administrator/components/com_jaclplus/jaclplus.class.php", false),
	array("/administrator/components/com_jaclplus/jaclplus.config.php.jaclplus.bak", "/patch/administrator/components/com_jaclplus/jaclplus.config.php.jaclplus.bak", false),
	array("/administrator/components/com_jaclplus/jaclplus.xml", "/patch/administrator/components/com_jaclplus/jaclplus.lmx", false),
	array("/administrator/components/com_jaclplus/README.txt", "/patch/administrator/components/com_jaclplus/README.txt", false),
	array("/administrator/components/com_jaclplus/toolbar.jaclplus.html.php", "/patch/administrator/components/com_jaclplus/toolbar.jaclplus.html.php", false),
	array("/administrator/components/com_jaclplus/toolbar.jaclplus.php", "/patch/administrator/components/com_jaclplus/toolbar.jaclplus.php", false),
	array("/administrator/components/com_jaclplus/uninstall.jaclplus.php", "/patch/administrator/components/com_jaclplus/uninstall.jaclplus.php", false),
	array("/administrator/components/com_languages/admin.languages.html.php", "/patch/administrator/components/com_languages/admin.languages.html.php", false),
	array("/administrator/components/com_languages/admin.languages.php", "/patch/administrator/components/com_languages/admin.languages.php", false),
	array("/administrator/components/com_languages/toolbar.languages.html.php", "/patch/administrator/components/com_languages/toolbar.languages.html.php", false),
	array("/administrator/components/com_languages/toolbar.languages.php", "/patch/administrator/components/com_languages/toolbar.languages.php", false),
	array("/administrator/components/com_login/login.xml", "/patch/administrator/components/com_login/login.lmx", false),
	array("/administrator/components/com_mambots/admin.mambots.html.php", "/patch/administrator/components/com_mambots/admin.mambots.html.php", false),
	array("/administrator/components/com_mambots/admin.mambots.php", "/patch/administrator/components/com_mambots/admin.mambots.php", false),
	array("/administrator/components/com_mambots/toolbar.mambots.html.php", "/patch/administrator/components/com_mambots/toolbar.mambots.html.php", false),
	array("/administrator/components/com_mambots/toolbar.mambots.php", "/patch/administrator/components/com_mambots/toolbar.mambots.php", false),
	array("/administrator/components/com_massmail/admin.massmail.html.php", "/patch/administrator/components/com_massmail/admin.massmail.html.php", false),
	array("/administrator/components/com_massmail/admin.massmail.php", "/patch/administrator/components/com_massmail/admin.massmail.php", false),
	array("/administrator/components/com_massmail/massmail.xml", "/patch/administrator/components/com_massmail/massmail.lmx", false),
	array("/administrator/components/com_massmail/toolbar.massmail.html.php", "/patch/administrator/components/com_massmail/toolbar.massmail.html.php", false),
	array("/administrator/components/com_massmail/toolbar.massmail.php", "/patch/administrator/components/com_massmail/toolbar.massmail.php", false),
	array("/administrator/components/com_media/admin.media.html.php", "/patch/administrator/components/com_media/admin.media.html.php", false),
	array("/administrator/components/com_media/admin.media.php", "/patch/administrator/components/com_media/admin.media.php", false),
	array("/administrator/components/com_media/media.xml", "/patch/administrator/components/com_media/media.lmx", false),
	array("/administrator/components/com_media/toolbar.media.html.php", "/patch/administrator/components/com_media/toolbar.media.html.php", false),
	array("/administrator/components/com_media/toolbar.media.php", "/patch/administrator/components/com_media/toolbar.media.php", false),
	array("/administrator/components/com_menumanager/admin.menumanager.html.php", "/patch/administrator/components/com_menumanager/admin.menumanager.html.php", false),
	array("/administrator/components/com_menumanager/admin.menumanager.php", "/patch/administrator/components/com_menumanager/admin.menumanager.php", false),
	array("/administrator/components/com_menumanager/menumanager.xml", "/patch/administrator/components/com_menumanager/menumanager.lmx", false),
	array("/administrator/components/com_menumanager/toolbar.menumanager.html.php", "/patch/administrator/components/com_menumanager/toolbar.menumanager.html.php", false),
	array("/administrator/components/com_menumanager/toolbar.menumanager.php", "/patch/administrator/components/com_menumanager/toolbar.menumanager.php", false),
	array("/administrator/components/com_menus/admin.menus.html.php", "/patch/administrator/components/com_menus/admin.menus.html.php", false),
	array("/administrator/components/com_menus/admin.menus.php", "/patch/administrator/components/com_menus/admin.menus.php", false),
	array("/administrator/components/com_menus/toolbar.menus.html.php", "/patch/administrator/components/com_menus/toolbar.menus.html.php", false),
	array("/administrator/components/com_menus/toolbar.menus.php", "/patch/administrator/components/com_menus/toolbar.menus.php", false),
	array("/administrator/components/com_messages/admin.messages.html.php", "/patch/administrator/components/com_messages/admin.messages.html.php", false),
	array("/administrator/components/com_messages/admin.messages.php", "/patch/administrator/components/com_messages/admin.messages.php", false),
	array("/administrator/components/com_messages/toolbar.messages.html.php", "/patch/administrator/components/com_messages/toolbar.messages.html.php", false),
	array("/administrator/components/com_messages/toolbar.messages.php", "/patch/administrator/components/com_messages/toolbar.messages.php", false),
	array("/administrator/components/com_modules/admin.modules.html.php", "/patch/administrator/components/com_modules/admin.modules.html.php", false),
	array("/administrator/components/com_modules/admin.modules.php", "/patch/administrator/components/com_modules/admin.modules.php", false),
	array("/administrator/components/com_modules/toolbar.modules.html.php", "/patch/administrator/components/com_modules/toolbar.modules.html.php", false),
	array("/administrator/components/com_modules/toolbar.modules.php", "/patch/administrator/components/com_modules/toolbar.modules.php", false),
	array("/administrator/components/com_newsfeeds/admin.newsfeeds.html.php", "/patch/administrator/components/com_newsfeeds/admin.newsfeeds.html.php", false),
	array("/administrator/components/com_newsfeeds/admin.newsfeeds.php", "/patch/administrator/components/com_newsfeeds/admin.newsfeeds.php", false),
	array("/administrator/components/com_newsfeeds/newsfeeds.class.php", "/patch/administrator/components/com_newsfeeds/newsfeeds.class.php", false),
	array("/administrator/components/com_newsfeeds/newsfeeds.xml", "/patch/administrator/components/com_newsfeeds/newsfeeds.lmx", false),
	array("/administrator/components/com_newsfeeds/toolbar.newsfeeds.html.php", "/patch/administrator/components/com_newsfeeds/toolbar.newsfeeds.html.php", false),
	array("/administrator/components/com_newsfeeds/toolbar.newsfeeds.php", "/patch/administrator/components/com_newsfeeds/toolbar.newsfeeds.php", false),
	array("/administrator/components/com_poll/admin.poll.html.php", "/patch/administrator/components/com_poll/admin.poll.html.php", false),
	array("/administrator/components/com_poll/admin.poll.php", "/patch/administrator/components/com_poll/admin.poll.php", false),
	array("/administrator/components/com_poll/poll.xml", "/patch/administrator/components/com_poll/poll.lmx", false),
	array("/administrator/components/com_poll/toolbar.poll.html.php", "/patch/administrator/components/com_poll/toolbar.poll.html.php", false),
	array("/administrator/components/com_poll/toolbar.poll.php", "/patch/administrator/components/com_poll/toolbar.poll.php", false),
	array("/administrator/components/com_search/search.xml", "/patch/administrator/components/com_search/search.lmx", false),
	array("/administrator/components/com_sections/admin.sections.html.php", "/patch/administrator/components/com_sections/admin.sections.html.php", false),
	array("/administrator/components/com_sections/admin.sections.php", "/patch/administrator/components/com_sections/admin.sections.php", false),
	array("/administrator/components/com_sections/toolbar.sections.html.php", "/patch/administrator/components/com_sections/toolbar.sections.html.php", false),
	array("/administrator/components/com_sections/toolbar.sections.php", "/patch/administrator/components/com_sections/toolbar.sections.php", false),
	array("/administrator/components/com_statistics/admin.statistics.html.php", "/patch/administrator/components/com_statistics/admin.statistics.html.php", false),
	array("/administrator/components/com_statistics/admin.statistics.php", "/patch/administrator/components/com_statistics/admin.statistics.php", false),
	array("/administrator/components/com_statistics/toolbar.statistics.html.php", "/patch/administrator/components/com_statistics/toolbar.statistics.html.php", false),
	array("/administrator/components/com_statistics/toolbar.statistics.php", "/patch/administrator/components/com_statistics/toolbar.statistics.php", false),
	array("/administrator/components/com_syndicate/admin.syndicate.html.php", "/patch/administrator/components/com_syndicate/admin.syndicate.html.php", false),
	array("/administrator/components/com_syndicate/admin.syndicate.php", "/patch/administrator/components/com_syndicate/admin.syndicate.php", false),
	array("/administrator/components/com_syndicate/syndicate.xml", "/patch/administrator/components/com_syndicate/syndicate.lmx", false),
	array("/administrator/components/com_syndicate/toolbar.syndicate.html.php", "/patch/administrator/components/com_syndicate/toolbar.syndicate.html.php", false),
	array("/administrator/components/com_syndicate/toolbar.syndicate.php", "/patch/administrator/components/com_syndicate/toolbar.syndicate.php", false),
	array("/administrator/components/com_templates/admin.templates.class.php", "/patch/administrator/components/com_templates/admin.templates.class.php", false),
	array("/administrator/components/com_templates/admin.templates.html.php", "/patch/administrator/components/com_templates/admin.templates.html.php", false),
	array("/administrator/components/com_templates/admin.templates.php", "/patch/administrator/components/com_templates/admin.templates.php", false),
	array("/administrator/components/com_templates/toolbar.templates.html.php", "/patch/administrator/components/com_templates/toolbar.templates.html.php", false),
	array("/administrator/components/com_templates/toolbar.templates.php", "/patch/administrator/components/com_templates/toolbar.templates.php", false),
	array("/administrator/components/com_trash/admin.trash.html.php", "/patch/administrator/components/com_trash/admin.trash.html.php", false),
	array("/administrator/components/com_trash/admin.trash.php", "/patch/administrator/components/com_trash/admin.trash.php", false),
	array("/administrator/components/com_trash/toolbar.trash.html.php", "/patch/administrator/components/com_trash/toolbar.trash.html.php", false),
	array("/administrator/components/com_trash/toolbar.trash.php", "/patch/administrator/components/com_trash/toolbar.trash.php", false),
	array("/administrator/components/com_trash/trash.xml", "/patch/administrator/components/com_trash/trash.lmx", false),
	array("/administrator/components/com_typedcontent/admin.typedcontent.html.php", "/patch/administrator/components/com_typedcontent/admin.typedcontent.html.php", false),
	array("/administrator/components/com_typedcontent/admin.typedcontent.php", "/patch/administrator/components/com_typedcontent/admin.typedcontent.php", false),
	array("/administrator/components/com_typedcontent/toolbar.typedcontent.html.php", "/patch/administrator/components/com_typedcontent/toolbar.typedcontent.html.php", false),
	array("/administrator/components/com_typedcontent/toolbar.typedcontent.php", "/patch/administrator/components/com_typedcontent/toolbar.typedcontent.php", false),
	array("/administrator/components/com_typedcontent/typedcontent.xml", "/patch/administrator/components/com_typedcontent/typedcontent.lmx", false),
	array("/administrator/components/com_users/admin.users.html.php", "/patch/administrator/components/com_users/admin.users.html.php", false),
	array("/administrator/components/com_users/admin.users.php", "/patch/administrator/components/com_users/admin.users.php", false),
	array("/administrator/components/com_users/toolbar.users.html.php", "/patch/administrator/components/com_users/toolbar.users.html.php", false),
	array("/administrator/components/com_users/toolbar.users.php", "/patch/administrator/components/com_users/toolbar.users.php", false),
	array("/administrator/components/com_users/users.class.php", "/patch/administrator/components/com_users/users.class.php", false),
	array("/administrator/components/com_users/users.xml", "/patch/administrator/components/com_users/users.lmx", false),
	array("/administrator/components/com_weblinks/admin.weblinks.html.php", "/patch/administrator/components/com_weblinks/admin.weblinks.html.php", false),
	array("/administrator/components/com_weblinks/admin.weblinks.php", "/patch/administrator/components/com_weblinks/admin.weblinks.php", false),
	array("/administrator/components/com_weblinks/toolbar.weblinks.html.php", "/patch/administrator/components/com_weblinks/toolbar.weblinks.html.php", false),
	array("/administrator/components/com_weblinks/toolbar.weblinks.php", "/patch/administrator/components/com_weblinks/toolbar.weblinks.php", false),
	array("/administrator/components/com_weblinks/weblinks.xml", "/patch/administrator/components/com_weblinks/weblinks.lmx", false),
	array("/administrator/components/com_weblinks/weblinks_item.xml", "/patch/administrator/components/com_weblinks/weblinks_item.lmx", false),
	array("/administrator/templates/joomla_admin/cpanel.php", "/patch/administrator/templates/joomla_admin/cpanel.php", false),
	array("/administrator/templates/joomla_admin/index.php", "/patch/administrator/templates/joomla_admin/index.php", false),
	array("/administrator/components/com_installer/component/component.class.php", "/patch/administrator/components/com_installer/component/component.class.php", false),
	array("/administrator/components/com_installer/component/component.html.php", "/patch/administrator/components/com_installer/component/component.html.php", false),
	array("/administrator/components/com_installer/component/component.php", "/patch/administrator/components/com_installer/component/component.php", false),
	array("/administrator/components/com_installer/language/language.class.php", "/patch/administrator/components/com_installer/language/language.class.php", false),
	array("/administrator/components/com_installer/language/language.php", "/patch/administrator/components/com_installer/language/language.php", false),
	array("/administrator/components/com_installer/mambot/mambot.class.php", "/patch/administrator/components/com_installer/mambot/mambot.class.php", false),
	array("/administrator/components/com_installer/mambot/mambot.html.php", "/patch/administrator/components/com_installer/mambot/mambot.html.php", false),
	array("/administrator/components/com_installer/mambot/mambot.php", "/patch/administrator/components/com_installer/mambot/mambot.php", false),
	array("/administrator/components/com_installer/module/module.class.php", "/patch/administrator/components/com_installer/module/module.class.php", false),
	array("/administrator/components/com_installer/module/module.html.php", "/patch/administrator/components/com_installer/module/module.html.php", false),
	array("/administrator/components/com_installer/module/module.php", "/patch/administrator/components/com_installer/module/module.php", false),
	array("/administrator/components/com_installer/template/template.class.php", "/patch/administrator/components/com_installer/template/template.class.php", false),
	array("/administrator/components/com_installer/template/template.php", "/patch/administrator/components/com_installer/template/template.php", false),
	array("/administrator/components/com_jaclplus/language/english.php", "/patch/administrator/components/com_jaclplus/language/english.php", false),
	array("/administrator/components/com_jaclplus/language/index.html", "/patch/administrator/components/com_jaclplus/language/index.html", false),
	array("/administrator/components/com_jaclplus/patch/admin.categories.php", "/patch/administrator/components/com_jaclplus/patch/admin.categories.php", false),
	array("/administrator/components/com_jaclplus/patch/admin.sections.php", "/patch/administrator/components/com_jaclplus/patch/admin.sections.php", false),
	array("/administrator/components/com_jaclplus/patch/admin.trash.php", "/patch/administrator/components/com_jaclplus/patch/admin.trash.php", false),
	array("/administrator/components/com_jaclplus/patch/admin.users.html.php", "/patch/administrator/components/com_jaclplus/patch/admin.users.html.php", false),
	array("/administrator/components/com_jaclplus/patch/admin.users.php", "/patch/administrator/components/com_jaclplus/patch/admin.users.php", false),
	array("/administrator/components/com_jaclplus/patch/auth.php", "/patch/administrator/components/com_jaclplus/patch/auth.php", false),
	array("/administrator/components/com_jaclplus/patch/categories.searchbot.php", "/patch/administrator/components/com_jaclplus/patch/categories.searchbot.php", false),
	array("/administrator/components/com_jaclplus/patch/contact.php", "/patch/administrator/components/com_jaclplus/patch/contact.php", false),
	array("/administrator/components/com_jaclplus/patch/contacts.searchbot.php", "/patch/administrator/components/com_jaclplus/patch/contacts.searchbot.php", false),
	array("/administrator/components/com_jaclplus/patch/content.html.php", "/patch/administrator/components/com_jaclplus/patch/content.html.php", false),
	array("/administrator/components/com_jaclplus/patch/content.php", "/patch/administrator/components/com_jaclplus/patch/content.php", false),
	array("/administrator/components/com_jaclplus/patch/content.searchbot.php", "/patch/administrator/components/com_jaclplus/patch/content.searchbot.php", false),
	array("/administrator/components/com_jaclplus/patch/frontend.php", "/patch/administrator/components/com_jaclplus/patch/frontend.php", false),
	array("/administrator/components/com_jaclplus/patch/gacl.class.php", "/patch/administrator/components/com_jaclplus/patch/gacl.class.php", false),
	array("/administrator/components/com_jaclplus/patch/gacl_api.class.php", "/patch/administrator/components/com_jaclplus/patch/gacl_api.class.php", false),
	array("/administrator/components/com_jaclplus/patch/index.html", "/patch/administrator/components/com_jaclplus/patch/index.html", false),
	array("/administrator/components/com_jaclplus/patch/index.php", "/patch/administrator/components/com_jaclplus/patch/index.php", false),
	array("/administrator/components/com_jaclplus/patch/joomla.php", "/patch/administrator/components/com_jaclplus/patch/joomla.php", false),
	array("/administrator/components/com_jaclplus/patch/mod_fullmenu.php", "/patch/administrator/components/com_jaclplus/patch/mod_fullmenu.php", false),
	array("/administrator/components/com_jaclplus/patch/mod_latestnews.php", "/patch/administrator/components/com_jaclplus/patch/mod_latestnews.php", false),
	array("/administrator/components/com_jaclplus/patch/mod_logged.php", "/patch/administrator/components/com_jaclplus/patch/mod_logged.php", false),
	array("/administrator/components/com_jaclplus/patch/mod_mainmenu.php", "/patch/administrator/components/com_jaclplus/patch/mod_mainmenu.php", false),
	array("/administrator/components/com_jaclplus/patch/mod_mostread.php", "/patch/administrator/components/com_jaclplus/patch/mod_mostread.php", false),
	array("/administrator/components/com_jaclplus/patch/mod_newsflash.php", "/patch/administrator/components/com_jaclplus/patch/mod_newsflash.php", false),
	array("/administrator/components/com_jaclplus/patch/mod_quickicon.php", "/patch/administrator/components/com_jaclplus/patch/mod_quickicon.php", false),
	array("/administrator/components/com_jaclplus/patch/mod_related_items.php", "/patch/administrator/components/com_jaclplus/patch/mod_related_items.php", false),
	array("/administrator/components/com_jaclplus/patch/mod_sections.php", "/patch/administrator/components/com_jaclplus/patch/mod_sections.php", false),
	array("/administrator/components/com_jaclplus/patch/newsfeeds.php", "/patch/administrator/components/com_jaclplus/patch/newsfeeds.php", false),
	array("/administrator/components/com_jaclplus/patch/newsfeeds.searchbot.php", "/patch/administrator/components/com_jaclplus/patch/newsfeeds.searchbot.php", false),
	array("/administrator/components/com_jaclplus/patch/pathway.php", "/patch/administrator/components/com_jaclplus/patch/pathway.php", false),
	array("/administrator/components/com_jaclplus/patch/pdf.php", "/patch/administrator/components/com_jaclplus/patch/pdf.php", false),
	array("/administrator/components/com_jaclplus/patch/sections.searchbot.php", "/patch/administrator/components/com_jaclplus/patch/sections.searchbot.php", false),
	array("/administrator/components/com_jaclplus/patch/weblinks.php", "/patch/administrator/components/com_jaclplus/patch/weblinks.php", false),
	array("/administrator/components/com_jaclplus/patch/weblinks.searchbot.php", "/patch/administrator/components/com_jaclplus/patch/weblinks.searchbot.php", false),
	array("/administrator/components/com_menus/components/components.class.php", "/patch/administrator/components/com_menus/components/components.class.php", false),
	array("/administrator/components/com_menus/components/components.menu.html.php", "/patch/administrator/components/com_menus/components/components.menu.html.php", false),
	array("/administrator/components/com_menus/components/components.menu.php", "/patch/administrator/components/com_menus/components/components.menu.php", false),
	array("/administrator/components/com_menus/components/components.xml", "/patch/administrator/components/com_menus/components/components.lmx", false),
	array("/administrator/components/com_menus/component_item_link/component_item_link.class.php", "/patch/administrator/components/com_menus/component_item_link/component_item_link.class.php", false),
	array("/administrator/components/com_menus/component_item_link/component_item_link.menu.html.php", "/patch/administrator/components/com_menus/component_item_link/component_item_link.menu.html.php", false),
	array("/administrator/components/com_menus/component_item_link/component_item_link.menu.php", "/patch/administrator/components/com_menus/component_item_link/component_item_link.menu.php", false),
	array("/administrator/components/com_menus/component_item_link/component_item_link.xml", "/patch/administrator/components/com_menus/component_item_link/component_item_link.lmx", false),
	array("/administrator/components/com_menus/contact_category_table/contact_category_table.class.php", "/patch/administrator/components/com_menus/contact_category_table/contact_category_table.class.php", false),
	array("/administrator/components/com_menus/contact_category_table/contact_category_table.menu.html.php", "/patch/administrator/components/com_menus/contact_category_table/contact_category_table.menu.html.php", false),
	array("/administrator/components/com_menus/contact_category_table/contact_category_table.menu.php", "/patch/administrator/components/com_menus/contact_category_table/contact_category_table.menu.php", false),
	array("/administrator/components/com_menus/contact_category_table/contact_category_table.xml", "/patch/administrator/components/com_menus/contact_category_table/contact_category_table.lmx", false),
	array("/administrator/components/com_menus/contact_item_link/contact_item_link.class.php", "/patch/administrator/components/com_menus/contact_item_link/contact_item_link.class.php", false),
	array("/administrator/components/com_menus/contact_item_link/contact_item_link.menu.html.php", "/patch/administrator/components/com_menus/contact_item_link/contact_item_link.menu.html.php", false),
	array("/administrator/components/com_menus/contact_item_link/contact_item_link.menu.php", "/patch/administrator/components/com_menus/contact_item_link/contact_item_link.menu.php", false),
	array("/administrator/components/com_menus/contact_item_link/contact_item_link.xml", "/patch/administrator/components/com_menus/contact_item_link/contact_item_link.lmx", false),
	array("/administrator/components/com_menus/content_archive_category/content_archive_category.class.php", "/patch/administrator/components/com_menus/content_archive_category/content_archive_category.class.php", false),
	array("/administrator/components/com_menus/content_archive_category/content_archive_category.menu.html.php", "/patch/administrator/components/com_menus/content_archive_category/content_archive_category.menu.html.php", false),
	array("/administrator/components/com_menus/content_archive_category/content_archive_category.menu.php", "/patch/administrator/components/com_menus/content_archive_category/content_archive_category.menu.php", false),
	array("/administrator/components/com_menus/content_archive_category/content_archive_category.xml", "/patch/administrator/components/com_menus/content_archive_category/content_archive_category.lmx", false),
	array("/administrator/components/com_menus/content_archive_section/content_archive_section.class.php", "/patch/administrator/components/com_menus/content_archive_section/content_archive_section.class.php", false),
	array("/administrator/components/com_menus/content_archive_section/content_archive_section.menu.html.php", "/patch/administrator/components/com_menus/content_archive_section/content_archive_section.menu.html.php", false),
	array("/administrator/components/com_menus/content_archive_section/content_archive_section.menu.php", "/patch/administrator/components/com_menus/content_archive_section/content_archive_section.menu.php", false),
	array("/administrator/components/com_menus/content_archive_section/content_archive_section.xml", "/patch/administrator/components/com_menus/content_archive_section/content_archive_section.lmx", false),
	array("/administrator/components/com_menus/content_blog_category/content_blog_category.class.php", "/patch/administrator/components/com_menus/content_blog_category/content_blog_category.class.php", false),
	array("/administrator/components/com_menus/content_blog_category/content_blog_category.menu.html.php", "/patch/administrator/components/com_menus/content_blog_category/content_blog_category.menu.html.php", false),
	array("/administrator/components/com_menus/content_blog_category/content_blog_category.menu.php", "/patch/administrator/components/com_menus/content_blog_category/content_blog_category.menu.php", false),
	array("/administrator/components/com_menus/content_blog_category/content_blog_category.xml", "/patch/administrator/components/com_menus/content_blog_category/content_blog_category.lmx", false),
	array("/administrator/components/com_menus/content_blog_section/content_blog_section.class.php", "/patch/administrator/components/com_menus/content_blog_section/content_blog_section.class.php", false),
	array("/administrator/components/com_menus/content_blog_section/content_blog_section.menu.html.php", "/patch/administrator/components/com_menus/content_blog_section/content_blog_section.menu.html.php", false),
	array("/administrator/components/com_menus/content_blog_section/content_blog_section.menu.php", "/patch/administrator/components/com_menus/content_blog_section/content_blog_section.menu.php", false),
	array("/administrator/components/com_menus/content_blog_section/content_blog_section.xml", "/patch/administrator/components/com_menus/content_blog_section/content_blog_section.lmx", false),
	array("/administrator/components/com_menus/content_category/content_category.class.php", "/patch/administrator/components/com_menus/content_category/content_category.class.php", false),
	array("/administrator/components/com_menus/content_category/content_category.menu.html.php", "/patch/administrator/components/com_menus/content_category/content_category.menu.html.php", false),
	array("/administrator/components/com_menus/content_category/content_category.menu.php", "/patch/administrator/components/com_menus/content_category/content_category.menu.php", false),
	array("/administrator/components/com_menus/content_category/content_category.xml", "/patch/administrator/components/com_menus/content_category/content_category.lmx", false),
	array("/administrator/components/com_menus/content_item_link/content_item_link.class.php", "/patch/administrator/components/com_menus/content_item_link/content_item_link.class.php", false),
	array("/administrator/components/com_menus/content_item_link/content_item_link.menu.html.php", "/patch/administrator/components/com_menus/content_item_link/content_item_link.menu.html.php", false),
	array("/administrator/components/com_menus/content_item_link/content_item_link.menu.php", "/patch/administrator/components/com_menus/content_item_link/content_item_link.menu.php", false),
	array("/administrator/components/com_menus/content_item_link/content_item_link.xml", "/patch/administrator/components/com_menus/content_item_link/content_item_link.lmx", false),
	array("/administrator/components/com_menus/content_section/content_section.class.php", "/patch/administrator/components/com_menus/content_section/content_section.class.php", false),
	array("/administrator/components/com_menus/content_section/content_section.menu.html.php", "/patch/administrator/components/com_menus/content_section/content_section.menu.html.php", false),
	array("/administrator/components/com_menus/content_section/content_section.menu.php", "/patch/administrator/components/com_menus/content_section/content_section.menu.php", false),
	array("/administrator/components/com_menus/content_section/content_section.xml", "/patch/administrator/components/com_menus/content_section/content_section.lmx", false),
	array("/administrator/components/com_menus/content_typed/content_typed.class.php", "/patch/administrator/components/com_menus/content_typed/content_typed.class.php", false),
	array("/administrator/components/com_menus/content_typed/content_typed.menu.html.php", "/patch/administrator/components/com_menus/content_typed/content_typed.menu.html.php", false),
	array("/administrator/components/com_menus/content_typed/content_typed.menu.php", "/patch/administrator/components/com_menus/content_typed/content_typed.menu.php", false),
	array("/administrator/components/com_menus/content_typed/content_typed.xml", "/patch/administrator/components/com_menus/content_typed/content_typed.lmx", false),
	array("/administrator/components/com_menus/newsfeed_category_table/newsfeed_category_table.class.php", "/patch/administrator/components/com_menus/newsfeed_category_table/newsfeed_category_table.class.php", false),
	array("/administrator/components/com_menus/newsfeed_category_table/newsfeed_category_table.menu.html.php", "/patch/administrator/components/com_menus/newsfeed_category_table/newsfeed_category_table.menu.html.php", false),
	array("/administrator/components/com_menus/newsfeed_category_table/newsfeed_category_table.menu.php", "/patch/administrator/components/com_menus/newsfeed_category_table/newsfeed_category_table.menu.php", false),
	array("/administrator/components/com_menus/newsfeed_category_table/newsfeed_category_table.xml", "/patch/administrator/components/com_menus/newsfeed_category_table/newsfeed_category_table.lmx", false),
	array("/administrator/components/com_menus/newsfeed_link/newsfeed_link.class.php", "/patch/administrator/components/com_menus/newsfeed_link/newsfeed_link.class.php", false),
	array("/administrator/components/com_menus/newsfeed_link/newsfeed_link.menu.html.php", "/patch/administrator/components/com_menus/newsfeed_link/newsfeed_link.menu.html.php", false),
	array("/administrator/components/com_menus/newsfeed_link/newsfeed_link.menu.php", "/patch/administrator/components/com_menus/newsfeed_link/newsfeed_link.menu.php", false),
	array("/administrator/components/com_menus/newsfeed_link/newsfeed_link.xml", "/patch/administrator/components/com_menus/newsfeed_link/newsfeed_link.lmx", false),
	array("/administrator/components/com_menus/separator/separator.class.php", "/patch/administrator/components/com_menus/separator/separator.class.php", false),
	array("/administrator/components/com_menus/separator/separator.menu.html.php", "/patch/administrator/components/com_menus/separator/separator.menu.html.php", false),
	array("/administrator/components/com_menus/separator/separator.menu.php", "/patch/administrator/components/com_menus/separator/separator.menu.php", false),
	array("/administrator/components/com_menus/separator/separator.xml", "/patch/administrator/components/com_menus/separator/separator.lmx", false),
	array("/administrator/components/com_menus/submit_content/submit_content.class.php", "/patch/administrator/components/com_menus/submit_content/submit_content.class.php", false),
	array("/administrator/components/com_menus/submit_content/submit_content.menu.html.php", "/patch/administrator/components/com_menus/submit_content/submit_content.menu.html.php", false),
	array("/administrator/components/com_menus/submit_content/submit_content.menu.php", "/patch/administrator/components/com_menus/submit_content/submit_content.menu.php", false),
	array("/administrator/components/com_menus/submit_content/submit_content.xml", "/patch/administrator/components/com_menus/submit_content/submit_content.lmx", false),
	array("/administrator/components/com_menus/url/url.class.php", "/patch/administrator/components/com_menus/url/url.class.php", false),
	array("/administrator/components/com_menus/url/url.menu.html.php", "/patch/administrator/components/com_menus/url/url.menu.html.php", false),
	array("/administrator/components/com_menus/url/url.menu.php", "/patch/administrator/components/com_menus/url/url.menu.php", false),
	array("/administrator/components/com_menus/url/url.xml", "/patch/administrator/components/com_menus/url/url.lmx", false),
	array("/administrator/components/com_menus/weblink_category_table/weblink_category_table.class.php", "/patch/administrator/components/com_menus/weblink_category_table/weblink_category_table.class.php", false),
	array("/administrator/components/com_menus/weblink_category_table/weblink_category_table.menu.html.php", "/patch/administrator/components/com_menus/weblink_category_table/weblink_category_table.menu.html.php", false),
	array("/administrator/components/com_menus/weblink_category_table/weblink_category_table.menu.php", "/patch/administrator/components/com_menus/weblink_category_table/weblink_category_table.menu.php", false),
	array("/administrator/components/com_menus/weblink_category_table/weblink_category_table.xml", "/patch/administrator/components/com_menus/weblink_category_table/weblink_category_table.lmx", false),
	array("/administrator/components/com_menus/wrapper/wrapper.class.php", "/patch/administrator/components/com_menus/wrapper/wrapper.class.php", false),
	array("/administrator/components/com_menus/wrapper/wrapper.menu.html.php", "/patch/administrator/components/com_menus/wrapper/wrapper.menu.html.php", false),
	array("/administrator/components/com_menus/wrapper/wrapper.menu.php", "/patch/administrator/components/com_menus/wrapper/wrapper.menu.php", false),
	array("/administrator/components/com_menus/wrapper/wrapper.xml", "/patch/administrator/components/com_menus/wrapper/wrapper.lmx", false)
	);
	
// Actions that you need to implement besides above

?>