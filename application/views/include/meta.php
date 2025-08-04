<!-- SEO Meta -->
<title><?php echo $config->title; ?><?php if(isset($page_title)) echo " | $page_title"; ?></title>
<meta name="description" content="<?php echo htmlspecialchars($about->simple_quote); ?>" />
<meta name="keywords" content="<?php echo htmlspecialchars($config->keywords); ?>" />

<!-- Open Graph / Facebook -->
<meta property="og:title" content="<?php echo $config->title; ?>" />
<meta property="og:type" content="website" />
<meta property="og:image" content="<?php echo base_url(); ?>images/logo/<?php echo $config->logo_dark; ?>" />
<meta property="og:description" content="<?php echo htmlspecialchars($about->simple_quote); ?>" />
<meta property="og:url" content="<?php echo function_exists('current_url') ? current_url() : $config->web_link; ?>" />

<!-- Twitter -->
<meta name="twitter:card" content="summary_large_image" />
<meta name="twitter:title" content="<?php echo $config->title; ?>" />
<meta name="twitter:description" content="<?php echo htmlspecialchars($about->simple_quote); ?>" />
<meta name="twitter:image" content="<?php echo base_url(); ?>images/logo/<?php echo $config->logo_dark; ?>" />

<!-- Schema.org for Google -->
<meta itemprop="name" content="<?php echo $config->title; ?>">
<meta itemprop="description" content="<?php echo htmlspecialchars($about->simple_quote); ?>">
<meta itemprop="image" content="<?php echo base_url(); ?>images/logo/<?php echo $config->logo_dark; ?>">

<!-- Favicon -->
<link rel="icon" href="<?php echo base_url(); ?>images/logo/<?php echo $config->logo_dark; ?>" type="image/png">