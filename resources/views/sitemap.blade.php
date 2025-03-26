<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>

<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">

    <url>
        <loc>{{url('/report-store')}}</loc>
        <changefreq>daily</changefreq>
        <priority>1.00</priority>
    </url>

    <url>
        <loc><?php echo url('/')."/press-release.xml"; ?></loc>
        <changefreq>daily</changefreq>
        <priority>0.56</priority>
    </url>

    <url>
        <loc><?php echo url('/')."/infographics.xml"; ?></loc>
        <changefreq>daily</changefreq>
        <priority>0.46</priority>
    </url>
      
    <?php foreach($categorys as $category) { ?>
        <url>
            <loc><?php echo url('/')."/report-store/".htmlspecialchars($category->category_url).'.xml'; ?></loc>
            <changefreq>daily</changefreq>
            <priority>0.85</priority>
        </url>
    <?php } ?>  
    
    <url>
        <loc><?php echo url('/')."/other-pages.xml"; ?></loc>
        <changefreq>daily</changefreq>
        <priority>0.46</priority>
    </url>

</urlset>