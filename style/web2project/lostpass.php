<?php
if (!defined('W2P_BASE_DIR')) {
    die('You should not access this file directly');
}

$theme = new style_web2project($AppUI);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
       "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <title><?php echo @w2PgetConfig('page_title'); ?></title>
        <meta http-equiv="Content-Type" content="text/html;charset=<?php echo isset($locale_char_set) ? $locale_char_set : 'UTF-8'; ?>" />
        <title><?php echo $w2Pconfig['company_name']; ?> :: web2Project Lost Password Recovery</title>
        <meta http-equiv="Pragma" content="no-cache" />
        <meta name="Version" content="<?php echo $AppUI->getVersion(); ?>" />
        <link rel="stylesheet" type="text/css" href="./style/common.css" media="all" charset="utf-8"/>
        <link rel="stylesheet" type="text/css" href="./style/<?php echo $uistyle; ?>/main.css" media="all" charset="utf-8"/>
        <style type="text/css" media="all">@import "./style/<?php echo $uistyle; ?>/main.css";</style>
        <link rel="shortcut icon" href="./style/<?php echo $uistyle; ?>/favicon.ico" type="image/ico" />
    </head>

    <body bgcolor="#f0f0f0" onload="document.lostpassform.checkusername.focus();">
        <table width="100%" cellspacing="0" cellpadding="0" border="0">
            <tbody>
                <tr>
                    <td width="508"><a href="http://www.web2project.net"><img src="./style/<?php echo $uistyle; ?>/images/w2p_logo.jpg" alt="web2Project Home"/></a></td>
                    <td style="background:url(./style/<?php echo $uistyle; ?>/images/logo_bkgd.jpg);">&nbsp;</td>
                </tr>
            </tbody>
        </table>
        <table width="100%" cellspacing="0" cellpadding="0" border="0">
            <tbody>
                <tr>
                    <td width="100%" valign="top" align="left" style="background: transparent url(./style/<?php echo $uistyle; ?>/images/nav_shadow.jpg) repeat-x scroll 0%;">
                        <img src="./style/<?php echo $uistyle; ?>/images/nav_shadow.jpg" />
                    </td>
                </tr>
            </tbody>
        </table>
        <!--please leave action argument empty -->
        <form method="post" name="lostpassform" accept-charset="utf-8">
            <input type="hidden" name="lostpass" value="1" />
            <input type="hidden" name="redirect" value="<?php echo isset($redirect) ? $redirect : ''; ?>" />
            <table class="std login" width="25%">
                <tr>
                    <td colspan="2"><?php echo $theme->styleRenderBoxTop(); ?></td>
                </tr>
                <tr>
                    <th colspan="2"><em><?php echo $w2Pconfig['company_name']; ?></em></th>
                </tr>
                <tr>
                    <td style="padding:6px" align="right"><?php echo $AppUI->_('Username'); ?>:</td>
                    <td style="padding:6px" align="left"><input type="text" size="25" maxlength="255" name="checkusername" class="text" /></td>
                </tr>
                <tr>
                    <td style="padding:6px" align="right"><?php echo $AppUI->_('EMail'); ?>:</td>
                    <td style="padding:6px" align="left"><input type="email" size="25" maxlength="255" name="checkemail" class="text" /></td>
                </tr>
                <tr>
                    <td style="padding:6px" align="left"><a href="http://www.web2project.net/"><img src="./style/web2project/w2p_icon.ico" alt="web2Project logo" /></a></td>
                    <td style="padding:6px" align="right" valign="bottom"><input type="submit" name="sendpass" value="<?php echo $AppUI->_('send password'); ?>" class="button" /></td>
                </tr>
                <tr>
                    <td colspan="2"><?php echo $theme->styleRenderBoxBottom(); ?></td>
                </tr>
            </table>
            <?php if ($AppUI->getVersion()) { ?>
            <div align="center">
                <span style="font-size:7pt">Version <?php echo $AppUI->getVersion(); ?></span>
            </div>
            <?php } ?>
        </form>
        <div align="center">
            <?php
                echo '<span class="error">' . $AppUI->getMsg() . '</span>';
                $msg = '';
                $msg .= (version_compare(PHP_VERSION, MIN_PHP_VERSION, '<')) ? '<br /><span class="warning">WARNING: web2project is NOT supported for this PHP Version (' . PHP_VERSION . ')</span>' : '';
                $msg .= function_exists('mysql_pconnect') ? '' : '<br /><span class="warning">WARNING: PHP may not be compiled with MySQL support.  This will prevent proper operation of web2Project.  Please check your system setup.</span>';
                echo $msg;
            ?>
        </div>
    </body>
</html>