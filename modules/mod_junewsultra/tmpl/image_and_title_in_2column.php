<?php
/**
* @package Joomla! 1.5.x
* @author 2008 (c)  Denys Nosov (aka Dutch)
* @author web-site: www.joomla-ua.org
* @copyright This module is licensed under a Creative Commons Attribution-Noncommercial-No Derivative Works 3.0 License.
**/

/*******************PARAMS****************/
/*
/* $params->get('moduleclass_sfx') - module class suffix
/*
/* $item->link        -   display link
/* $item->text        -   display title
/*
/* $item->image       -   display image
/*
/* $item->created     -   display date & time
/* $item->df_d        -   display day
/* $item->df_m        -   display mounth
/* $item->df_Y        -   display mounth
/*
/* $item->author      -   display author
/*
/* $item->introtext   -   display introtex
/* $item->fulltext    -   display fulltext
/* $item->readmore    -   display Read more...
/* $item->rmtext      -   display Read more... text
/*
/*****************************************/

// no direct access
defined('_JEXEC') or die('Restricted access');

?>
<div class="junewsultra<?php echo $params->get('moduleclass_sfx'); ?>">
<?php foreach ($list as $item) :  ?>
	<div class="junews<?php echo $params->get('moduleclass_sfx'); ?>">
        <div class="juimage"><?php echo $item->image; ?></div>
        <div class="jutitle"><?php echo '<i>'. $item->created . '</i>'; ?><span><a href="<?php echo $item->link; ?>"><?php echo $item->text; ?></a></span></div>
	</div>
<?php endforeach; ?>
</div>