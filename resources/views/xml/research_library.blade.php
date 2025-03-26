<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>

<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">

    <?php foreach($data as $dt) { ?>
        <url>
            <loc><?php echo url('/')."/research-library/".htmlspecialchars($dt->page_url); ?></loc>
            <changefreq>daily</changefreq>
            <priority>0.85</priority>
        </url>
    <?php } ?>

</urlset>