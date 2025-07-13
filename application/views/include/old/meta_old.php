<!-- Update your html tag to include the itemscope and itemtype attributes. -->
<html itemscope itemtype="http://schema.org/Gallery">

<!-- Add the following three tags inside head. -->
<meta content="<?php echo $blog->title; ?>">
<meta name="keywords" content="holidaymood,agency,design,indonesia,jordi,edbert,art,portfolio,work,ability" />
<meta itemprop="name" content="<?php echo $blog->title; ?>">
<meta itemprop="description" content="<?php echo strip_tags($blog->blog_text); ?>">
<meta itemprop="image" content="<?php echo base_url()."image/blog/".$blog->image; ?>">
<meta name="description" content="Author: <?php echo $blog->creator;?>"  />
<meta property="og:title" content="<?php echo $blog->title; ?>" />
<meta property="og:type" content="article" />
<meta property="og:image" content="<?php echo base_url()."image/blog/".$blog->image; ?>" />
<meta property="og:description" content="<?php echo strip_tags($blog->blog_text); ?>" />
<meta property="og:url" content="<?php echo base_url(); ?>blog/detail/<?php echo $blog->ID_blog; ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />