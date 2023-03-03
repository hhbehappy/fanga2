<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>

<sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
  <sitemap>
    <loc>{{ env('APP_URL') }}/sitemap/fanza.xml</loc>
    <lastmod>{{ date(DateTime::W3C, strtotime($fanza)) }}</lastmod>
  </sitemap>
  <sitemap>
    <loc>{{ env('APP_URL') }}/sitemap/duga.xml</loc>
    <lastmod>{{ date(DateTime::W3C, strtotime($duga)) }}</lastmod>
  </sitemap>
</sitemapindex>