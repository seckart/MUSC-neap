<?php
    // This file is included on every single page.
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
?>
<?php
    // INCLUDING FILES WITH PHP
    $SERVERROOT = $_SERVER['DOCUMENT_ROOT'];
    $ROOTDIR = dirname(dirname(__FILE__));
    // Fix windows file paths
    $TEMP_SERVERROOT = str_replace("\\", "/", $SERVERROOT);
    $TEMP_ROOTDIR = str_replace("\\", "/", $ROOTDIR);
    $WEB = str_replace($TEMP_SERVERROOT, "", $TEMP_ROOTDIR);
    $PHPDIR = $ROOTDIR . "/php";
    $DATADIR = $ROOTDIR . "/data";
    $PARTSDIR = $ROOTDIR . "/partials";
    $DOCFOOTER = $PARTSDIR . '/document_footer.php';

    // INCLUDING FILES WITH HTML
    $CSSDIR = $WEB . "/css";
    $JSDIR = $WEB . "/js";
    $IMGDIR = $WEB . "/img";
    $TEMPLDIR = $IMGDIR . "/template";
    $SPECDIR = $IMGDIR . "/specific";
    $ATTACHDIR = $WEB . "/attachments";
    $PAGEDIR = $WEB . "/pages";
?>



<?php include_once($PHPDIR . '/functions.php') ?>
<?php
/**
 *    This is the default page title for every page in the NEAP template.
 *    But, you can optionally set it, on a per page basis.
 *    On the page you wish to set, BEFORE you use php to include
 *    the document_header.php page, add the following code:
 *
 *    $PageTitle = "My Page Title";
 */
if (!isset($PageTitle) || empty($PageTitle)) {
    $PageTitle = "NEAP";
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="description"
          content="The primary purpose of the Nursing Excellence Assessment and Plan is to identify existing Vertical and Horizontal barriers and/or potential risks to the pursuit of nursing excellence.">

    <title><?php echo $PageTitle; ?></title>

    <!-- CSS Files Below -->
    <link rel="stylesheet" type="text/css" href="<?php echo $CSSDIR; ?>/vendor/normalize_6.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $CSSDIR; ?>/base.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $CSSDIR; ?>/colors.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $CSSDIR; ?>/typography.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $CSSDIR; ?>/layout.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $CSSDIR; ?>/components/form.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $CSSDIR; ?>/components/sidebar.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $CSSDIR; ?>/components/content.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $CSSDIR; ?>/components/table.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $CSSDIR; ?>/components/images.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $CSSDIR; ?>/components/card.css">
    <!-- End CSS Files -->
</head>
<body>

<div class="page_wrapper">

    <?php include $PARTSDIR . '/header.php'; ?>

    <div class="page">

    <?php include $PARTSDIR . '/sidebar.php'; ?>

    <div class="content_wrapper">

        <div class="content">
