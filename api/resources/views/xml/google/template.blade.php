<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="2.0"
                xmlns:html="http://www.w3.org/TR/REC-html40"
                xmlns:sitemap="http://www.sitemaps.org/schemas/sitemap/0.9"
                xmlns:news="http://www.google.com/schemas/sitemap-news/0.9"
                xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
    <xsl:output method="html" version="1.0" encoding="UTF-8" indent="yes"/>
    <xsl:template match="/">
        <html xmlns="http://www.w3.org/1999/xhtml">
            <head>
                <title>Google News Sitemap Feed</title>
                <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                <style type="text/css">body{font-family:"Lucida Grande","Lucida Sans Unicode",Tahoma,Verdana,sans-serif;font-size:13px}#header,#footer{padding:2px;margin:10px;font-size:8pt;color:gray}a{color:black}td{font-size:11px}th{text-align:left;padding-right:30px;font-size:11px}tr.high{background-color:whitesmoke}#footer img{vertical-align:middle}</style>
            </head>
            <body>
                <h1>Google News Sitemap Feed</h1>
                <div id="header">
                    <p>This is a <a href="https://support.google.com/news/publisher/answer/75717" target="_blank">Google News Sitemap</a> to aid <a href="https://news.google.com" target="_blank">Google News</a> finding news on your website. Please note that <strong><em>only posts from the last 48 hours</em></strong> will be processed by Google News.</p>
                </div>
                <div id="content">
                    <table cellpadding="5">
                        <tr class="high">
                            <th>#</th>
                            <th>Title</th>
                            <th>Language</th>
                            <th>Keyword(s)</th>
                            <th>Stock(s)</th>
                            <th>Publication Date</th>
                        </tr>
                        <xsl:variable name="lower" select="'abcdefghijklmnopqrstuvwxyz'"/>
                        <xsl:variable name="upper" select="'ABCDEFGHIJKLMNOPQRSTUVWXYZ'"/>
                        <xsl:for-each select="sitemap:urlset/sitemap:url">
                            <tr><xsl:if test="position() mod 2 != 1"><xsl:attribute  name="class">high</xsl:attribute></xsl:if>
                                <td><xsl:value-of select="position()"/></td>
                                <td><xsl:variable name="itemURL"><xsl:value-of select="sitemap:loc"/></xsl:variable>
                                    <a href="{$itemURL}"><xsl:value-of select="news:news/news:title"/></a>
                                </td>
                                <td><xsl:value-of select="news:news/news:publication/news:language"/></td>
                                <td><xsl:value-of select="news:news/news:keywords"/></td>
                                <td><xsl:value-of select="news:news/news:stock_tickers"/></td>
                                <td><xsl:value-of select="concat(substring(news:news/news:publication_date,0,11),concat(' ', substring(news:news/news:publication_date,12,8)))"/> (<xsl:value-of select="substring(news:news/news:publication_date,20,6)"/>)</td>
                            </tr>
                        </xsl:for-each>
                    </table>
                </div>
            </body>
        </html>
    </xsl:template>
</xsl:stylesheet>
