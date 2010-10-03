<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
   <url>
            <loc>http://studip.org/pages/home</loc>
            <lastmod>2009-01-07T20:41:52Z</lastmod>
            <changefreq>weekly</changefreq>
            <priority>1.0</priority>
        </url>
    <url>
            <loc>http://studip.org/pages/intro</loc>
            <lastmod>2009-01-07T20:41:52Z</lastmod>
            <changefreq>monthly</changefreq>
            <priority>0.9</priority>
    </url>
    <url>
            <loc>http://studip.org/pages/faq</loc>
            <lastmod>2009-01-07T20:41:52Z</lastmod>
            <changefreq>monthly</changefreq>
            <priority>0.9</priority>
    </url>
    <?php foreach ($users as $user):?>
    <url>
            <loc>http://studip.org/<?php echo $user['User']['name']; ?></loc>
            <lastmod><?php echo $time->toAtom($user['User']['updated']); ?></lastmod>
            <changefreq>weekly</changefreq>
            <priority>0.8</priority>
        </url>
    <?php endforeach; ?>
    <?php foreach ($unis as $uni):?>
    <url>
            <loc>http://studip.org/unis/view/<?php echo $uni['Uni']['id']; ?></loc>
            <lastmod>2009-01-07T18:00:00Z</lastmod>
            <changefreq>monthly</changefreq>
            <priority>0.5</priority>
        </url>
    <?php endforeach; ?>
    <url>
            <loc>http://studip.org/schools/search</loc>
            <lastmod>2009-01-07T20:41:52Z</lastmod>
            <changefreq>weekly</changefreq>
            <priority>0.9</priority>
    </url>
    <url>
            <loc>http://studip.org/unis/search</loc>
            <lastmod>2009-01-07T20:41:52Z</lastmod>
            <changefreq>weekly</changefreq>
            <priority>0.9</priority>
    </url>
    <url>
            <loc>http://studip.org/users/register</loc>
            <lastmod>2009-01-07T20:41:52Z</lastmod>
            <changefreq>monthly</changefreq>
            <priority>0.5</priority>
    </url>
</urlset>