<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>

<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">

    <?php foreach($infographics as $infographic) { ?>
        <url>
            <loc><?php echo url('/')."/infographics/".htmlspecialchars($infographic->slug); ?></loc>
            <changefreq>daily</changefreq>
            <priority>0.46</priority>
        </url>
    <?php } ?>

</urlset>