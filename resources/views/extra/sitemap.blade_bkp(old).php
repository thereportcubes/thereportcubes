<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>

<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">

    <url>

        <loc>{{url('/')}}</loc>
        <changefreq>daily</changefreq>
        <priority>1.00</priority>


        <loc>{{url('/export-import-data')}}</loc>
        <changefreq>daily</changefreq>
        <priority>0.85</priority>
    </url>
    <url>
        <loc>
        {{url('/financial-research')}}</loc>
        <changefreq>daily</changefreq>
        <priority>0.85</priority>
    </url>
    <url>
        <loc>{{url('/data-analytics')}}</loc>
        <changefreq>daily</changefreq>
        <priority>0.85</priority>
    </url>
    <url>
        <loc>
        {{url('/services')}}</loc>
        <changefreq>daily</changefreq>
        <priority>0.85</priority>
    </url>
    
    <url>
        <loc>{{url('/contact-us')}}</loc>
        <changefreq>daily</changefreq>
        <priority>0.85</priority>
    </url>
    <url>
        <loc>{{url('/about-us')}}</loc>
        <changefreq>daily</changefreq>
        <priority>0.85</priority>
    </url>
    <url>
        <loc>{{url('/research-library')}}</loc>
        <changefreq>daily</changefreq>
        <priority>0.85</priority>
    </url>
    <url>
        <loc>{{url('/infographics')}}</loc>
        <changefreq>daily</changefreq>
        <priority>0.85</priority>
    </url>
    <url>
        <loc>{{url('/press-release')}}</loc>
        <changefreq>daily</changefreq>
        <priority>0.85</priority>
    </url>
    <url>
        <loc>{{url('/terms-condition')}}</loc>
        <changefreq>daily</changefreq>
        <priority>0.85</priority>
    </url>
    
    <?php foreach($categorys as $category) { ?>

    <url>

        <loc><?php echo url('/')."/research-library/".htmlspecialchars($category->category_url); ?></loc>
        <changefreq>daily</changefreq>
        <priority>0.85</priority>
    </url>
    <?php } ?>
    
    <?php foreach($sub_cat as $sub_category) { ?>

    <url>

        <loc><?php echo url('/')."/research-library/".htmlspecialchars($sub_category->page_url); ?></loc>
        <changefreq>daily</changefreq>
        <priority>0.85</priority>
    </url>
    <?php } ?>

    
    <?php foreach($reports as $report) { ?>

    <url>

        <loc><?php echo url('/')."/research-library/".htmlspecialchars($report->page_url); ?></loc>
        <changefreq>daily</changefreq>
        <priority>0.85</priority>
    </url>
    <?php } ?>


    <?php foreach($items as $item) { ?>

    <url>

        <loc><?php echo url('/')."/press-release/".htmlspecialchars($item->press_release_url); ?></loc>

        <changefreq>daily</changefreq>
        <priority>0.56</priority>

    </url>

    <?php } ?>

    <?php foreach($infographics as $infographic) { ?>

    <url>

        <loc><?php echo url('/')."/infographics/".htmlspecialchars($infographic->slug); ?></loc>

        <changefreq>daily</changefreq>
        <priority>0.46</priority>

    </url>

    <?php } ?>
    
      <?php foreach($blog as $blogs) { ?>

    <url>

        <loc><?php echo url('/')."/blogs/".htmlspecialchars($blogs->slug); ?></loc>

        <changefreq>daily</changefreq>
        <priority>0.46</priority>

    </url>

    <?php } ?>


</urlset>