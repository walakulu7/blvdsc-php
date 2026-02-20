<?php
require_once __DIR__ . '/../config/config.php';
$page_title = isset($page_title) ? $page_title . ' | ' . SITE_NAME : SITE_NAME;
$meta_description = isset($page_description) ? $page_description : SITE_DESCRIPTION;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($page_title); ?></title>
    <meta name="description" content="<?php echo htmlspecialchars($meta_description); ?>">
    <meta name="author" content="BLVD">
    <meta name="keywords" content="<?php echo SITE_KEYWORDS; ?>">
    <link rel="icon" type="image/x-icon" href="<?php echo BASE_URL; ?>/assets/images/favicon.ico">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@300;400;500;600;700&family=Montserrat:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Tailwind CSS -->
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/assets/css/output.css">

    <!-- Open Graph Meta Tags -->
    <meta property="og:title" content="<?php echo htmlspecialchars($page_title); ?>">
    <meta property="og:description" content="<?php echo htmlspecialchars($meta_description); ?>">
    <meta property="og:type" content="website">
    <meta property="og:image" content="<?php echo BASE_URL; ?>/assets/images/blvd-logo-circle-white.png">

    <!-- Twitter Card Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@blvdcoffee">
    <meta name="twitter:image" content="<?php echo BASE_URL; ?>/assets/images/blvd-logo-circle-white.png">
    
    <!-- Schema.org Structured Data -->
    <?php include __DIR__ . '/schema.json.php'; ?>
</head>
<body>
