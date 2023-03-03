<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>

<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
  @foreach ($dugas as $duga)
    <url>
      <loc>{{ env('APP_URL') }}/duga/video/{{ $duga['productid'] }}</loc>
      <lastmod>{{ date(DateTime::W3C, strtotime($duga['updated_at'])) }}</lastmod>
      <changefreq>weekly</changefreq>
      <priority>0.8</priority>
    </url>
  @endforeach
</urlset>