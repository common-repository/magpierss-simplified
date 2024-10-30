=== MagpieRSS Simplified ===
Contributors: vizioninteractive
Tags: magpierss, rss, magpie, feed
Requires at least: 1.5
Tested up to: 2.7.1
Stable tag: 1.2.4

MagpieRSS is already integrated with WordPress, this plugin will allow you to implement it easily within your theme.

== Description ==

MagpieRSS is already integrated with WordPress, this plugin will allow you to implement it easily within your theme.

Example Usage:
`<ul>`
`<?php`
`echo ms_magpierss('http://www.mydomain.com/feed.rss','count=5&summary=0');`
`?>`
`</ul>`

Example Output:
`<ul>`
`<li><a href="http://www.mydomain.com/article-title-1/" target="_blank">Article Title 1 &raquo;</a></li>`
`<li><a href="http://www.mydomain.com/article-title-2/" target="_blank">Article Title 2 &raquo;</a></li>`
`<li><a href="http://www.mydomain.com/article-title-3/" target="_blank">Article Title 3 &raquo;</a></li>`
`<li><a href="http://www.mydomain.com/article-title-4/" target="_blank">Article Title 4 &raquo;</a></li>`
`<li><a href="http://www.mydomain.com/article-title-5/" target="_blank">Article Title 5 &raquo;</a></li>`
`</ul>`

== Installation ==

1. Unpack the entire contents of this plugin zip file into your `wp-content/plugins/` folder locally
1. Upload to your site
1. Navigate to `wp-admin/plugins.php` on your site (your WP plugin page)
1. Activate this plugin

OR you can just install it with WordPress by going to Plugins >> Add New >> and type MagpieRSS Simplified

== Usage ==

`<?php`
`echo ms_magpierss('rss_feed_url_here','arguments=here&like=this','Show this text if there are no items in the feed, or set me to 0 if you don't want any message to show');`
`?>`

== Options ==

* **summary** = options (int): 0 = off / 1 = on {default = `1`}
* **count** = show this many feed items, set to 0 for no limit {default = `5`}
* **p_limit** = if summary is set to on, this will limit the feed item description to this many <p> paragraphs; you can set to (int) 0 to have no limit (Ex: `<p>Paragraph 1 .....</p>`) {default = `1`}
* **word_limit** = if summary is set to on, this will limit the feed item description to this many words; you can set to (int) 0 to have no limit {default = `25`}
* **wrapper** = html wrapper tag for the rss feed, set to 0 for no wrapper (Ex: `wrapper=ul` outputs `<ul>....</ul>`) {default = `0`}
* **list** = html tag for the rss feed items (Ex: `<li>....</li>`) {default = `li`}
* **html** = options (int): 0 = off / 1 = on (strips all summary HTML if set to off) {default = `0`}
* **target** = if set to (int) 0 then no target will be set (Ex: `<a target="....">`) {default = `_blank`}
* **action** = character shown at the end of the article title link, if set to (int) 0 then nothing will be shown (Ex: `Article Title Example &raquo;`) {default = `&raquo;`}
* **title** = options (int): 0 = off / 1 = on (Ex: `<a ... title="Article Title Example">...</a>`) {default = `1`}