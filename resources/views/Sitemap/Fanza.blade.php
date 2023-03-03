<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>

<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
  <url>
    <loc>{{ env('APP_URL') }}</loc>
    <lastmod>{{ date(DateTime::W3C, strtotime($fanga)) }}</lastmod>
    <changefreq>daily</changefreq>
    <priority>1.0</priority>
  </url>
  @foreach ($fanzas as $fanza)
    <url>
      <loc>{{ env('APP_URL') }}/fanza/video/{{ $fanza['content_id'] }}</loc>
      <lastmod>{{ date(DateTime::W3C, strtotime($fanza['updated_at'])) }}</lastmod>
      <changefreq>weekly</changefreq>
      <priority>0.8</priority>
    </url>
  @endforeach
</urlset>