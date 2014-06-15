<?php
defined('_JEXEC') or die('Restricted access');
JHTML::_('behavior.mootools');
?>
<script type="text/javascript">
/* <![CDATA[ */
function Grabber() {
    this.name = (arguments.count > 0) ? arguments[0] : null;
    this.lbar = null;
    this.bfr = null;
    this.myurl = document.location.href;

    if (typeof(console) == 'undefined') {
        window.console = {
            debug: function() {}
            ,group: function() {}
            ,groupEnd: function() {}
        };
    }

    function _debug() {
        console.debug.apply(console, arguments);
    }

    this._init = function() {
        if (this.lbar == null)
            this.lbar = document.getElementById('url');
        if (this.bfr == null)
            this.bfr = document.getElementById('brframe');
    };

    this.showURL = function(url) {
        this._init();
        if (url != this.myurl)
            this.lbar.value = url;
    };
    
    this.loadFrame = function() {
        console.group(this,'loadFrame');
        this._init();
        var url = this.lbar.value;
        if (url != '') {
            if (url.search(/^https{0,1}:\/\//) == -1) {
                url = 'http://' + url;
                this.lbar.value = url;
            }
            this.bfr.top = this.bfr;
            this.bfr.opener = null;
            this.bfr.src = url;
        }
        console.groupEnd(this,'loadFrame');
    };

    this.onLoad = function() {
        this._init();
        this.showURL(avrAPI.getFrameURL('brframe'));
    };
}

var r = new Grabber();
/* ]]> */
</script>
<form action="index.php" method="post" name="adminForm" id="adminForm">
<div class="col width-70">
    <fieldset class="adminform">
        <legend><?php echo JText::_('Browser');?></legend>
        <table class="admintable" width="100%">
        <tr>
            <td width="60" align="right" class="key">
                <label for="url">
                    <?php echo JText::_('URL'); ?>:
                </label>
            </td>
            <td>
                <input class="text_area" type="text" name="url" id="url" size="150" maxlength="1024" value="" onKeyDown="if(event.keyCode==13) r.loadFrame();" />
            </td>
        </tr>
        <tr>
            <td colspan="2"><div style="width:100%;border:#000000 1px solid;">
                <iframe id="brframe" name="brframe" src="" width="100%" height="800" scrolling="auto"
                        align="top" frameborder="0" class="brframe" onLoad="r.onLoad(this);" >
Diese Option wird nicht korrekt funktionieren. Unglücklicherweise unterstützt Ihr Browser keine Inline-Frames</iframe></div></td>
        </tr>
    </table>
    </fieldset>
</div>
<div class="col width-30">
    <fieldset class="adminform">
        <legend><?php echo JText::_('Details');?></legend>
        <table class="admintable" width="50%">
        <tr>
            <td width="60" align="right" class="key">
                <label for="url">
                    <?php echo JText::_('Blahfasel'); ?>:
                </label>
            </td>
            <td>
                <input class="text_area" type="text" name="blahfasel" id="blahfasel" size="32" maxlength="250" value="" />
            </td>
        </tr>
    </table>
    </fieldset>
</div>
<div class="clr"></div>
<input type="hidden" name="option" value="com_avreloaded" />
<input type="hidden" name="task" value="" />
<input type="hidden" name="controller" value="grabber" />
</form>
