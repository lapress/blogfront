<url>
    <loc>{{ $post->url }}</loc>
    <news:news>
        <news:publication>
            <news:name>Antyweb.pl</news:name>
            <news:language>pl</news:language>
        </news:publication>
        <news:publication_date>{{ $post->post_date->toIso8601String() }}</news:publication_date>
        <news:title>{{ $post->meta->_yoast_wpseo_title ?? $post->post_title }}</news:title>
        <news:keywords>{{ $post->meta->_yoast_wpseo_focuskw ?? '' }}</news:keywords>
        <news:stock_tickers></news:stock_tickers>
    </news:news>
</url>
