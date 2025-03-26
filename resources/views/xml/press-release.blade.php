<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>

<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
   
    <?php foreach($items as $item) { ?>
        <url>
            <loc><?php echo url('/')."/press-release/".htmlspecialchars($item->press_release_url); ?></loc>
            <changefreq>daily</changefreq>
            <priority>0.56</priority>
        </url>
    <?php } ?>
    
</urlset>