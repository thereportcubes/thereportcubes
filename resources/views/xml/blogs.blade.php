<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>

<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
   
    <?php foreach($blog as $blogs) { ?>

        <url>
            <loc><?php echo url('/')."/blogs/".htmlspecialchars($blogs->slug); ?></loc>
            <changefreq>daily</changefreq>
            <priority>0.46</priority>
        </url>

    <?php } ?>

</urlset>