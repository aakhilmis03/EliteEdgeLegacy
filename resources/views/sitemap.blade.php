<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>

<urlset

      xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"

      xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"

      xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9

            http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">



            <url>

  <loc>https://www.eliteedgelegacy.com/</loc>

  <lastmod>2024-12-04T01:24:54+00:00</lastmod>

  <priority>1.00</priority>

</url>

<url>

  <loc>https://www.eliteedgelegacy.com/about-us</loc>

  <lastmod>2024-12-04T01:24:54+00:00</lastmod>

  <priority>0.80</priority>

</url>

<url>

  <loc>https://www.eliteedgelegacy.com/city</loc>

  <lastmod>2024-12-04T01:24:54+00:00</lastmod>

  <priority>0.80</priority>

</url>

<url>

  <loc>https://www.eliteedgelegacy.com/property/residential</loc>

  <lastmod>2024-12-04T01:24:54+00:00</lastmod>

  <priority>0.80</priority>

</url>

<url>

  <loc>https://www.eliteedgelegacy.com/property/commercial</loc>

  <lastmod>2024-12-04T01:24:54+00:00</lastmod>

  <priority>0.80</priority>

</url>

<url>

  <loc>https://www.eliteedgelegacy.com/property/sco</loc>

  <lastmod>2024-12-04T01:24:54+00:00</lastmod>

  <priority>0.80</priority>

</url>

<url>

  <loc>https://www.eliteedgelegacy.com/property/residential-plots</loc>

  <lastmod>2024-12-04T01:24:54+00:00</lastmod>

  <priority>0.80</priority>

</url>

<url>

  <loc>https://www.eliteedgelegacy.com/blogs</loc>

  <lastmod>2024-12-04T01:24:54+00:00</lastmod>

  <priority>0.80</priority>

</url>

<url>

  <loc>https://www.eliteedgelegacy.com/news-event</loc>

  <lastmod>2024-12-04T01:24:54+00:00</lastmod>

  <priority>0.80</priority>

</url>



<url>

  <loc>https://www.eliteedgelegacy.com/career</loc>

  <lastmod>2024-12-04T01:24:54+00:00</lastmod>

  <priority>0.80</priority>

</url>

<url>

  <loc>https://www.eliteedgelegacy.com/contact-us</loc>

  <lastmod>2024-12-04T01:24:54+00:00</lastmod>

  <priority>0.80</priority>

</url>

<url>

  <loc>https://www.eliteedgelegacy.com/developer</loc>

  <lastmod>2024-12-04T01:24:54+00:00</lastmod>

  <priority>0.80</priority>

</url>

<url>

  <loc>https://www.eliteedgelegacy.com/awards-recognition</loc>

  <lastmod>2024-12-04T01:24:54+00:00</lastmod>

  <priority>0.80</priority>

</url>

    @foreach ($property as $k => $key)

        <url>

            <loc>{{url('property-details/'.$key->slug)}}</loc>

            <lastmod>{{ date("c",strtotime($key->created_at)) }}</lastmod>

            <priority>0.80</priority>

        </url>

    @endforeach

    @foreach ($blog as $k => $key)

        <url>

            <loc>{{url('blog-details/'.$key->slug)}}</loc>

            <lastmod>{{ date("c",strtotime($key->created_at)) }}</lastmod>

            <priority>0.80</priority>

        </url>

    @endforeach

    @foreach ($builder as $k => $key)

        <url>

            <loc>{{url('developer/'.$key->slug)}}</loc>

            <lastmod>{{ date("c",strtotime($key->created_at)) }}</lastmod>

            <priority>0.80</priority>

        </url>

    @endforeach

    @foreach ($city as $k => $key)

        <url>

            <loc>{{url('property-in-'.$key->slug)}}</loc>

            <lastmod>{{ date("c",strtotime($key->created_at)) }}</lastmod>

            <priority>0.80</priority>

        </url>

    @endforeach

    



</urlset>