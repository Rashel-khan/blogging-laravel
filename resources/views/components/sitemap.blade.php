
<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>


<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <url>
        <loc>{{ url('/') }}</loc>
        <lastmod>{{ now()->tz('Asia/Dhaka')->toAtomString() }}</lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.5</priority>
    </url>
    <url>
        <loc>{{ url('#features') }}</loc>
        <lastmod>{{  now()->tz('Asia/Dhaka')->toAtomString() }}</lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.5</priority>
    </url>
    <url>
        <loc>{{ url('#services') }}</loc>
        <lastmod>{{  now()->tz('Asia/Dhaka')->toAtomString() }}</lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.5</priority>
    </url>
    <url>
        <loc>{{ url('#team') }}</loc>
        <lastmod>{{  now()->tz('Asia/Dhaka')->toAtomString() }}</lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.5</priority>
    </url>
    <url>
        <loc>{{ url('#contact') }}</loc>
        <lastmod>{{  now()->tz('Asia/Dhaka')->toAtomString() }}</lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.5</priority>
    </url>


</urlset>
