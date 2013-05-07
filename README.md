"My OpenBadges" Wordpress Plugin
==================

A simple plugin that will allow you to add a Wordpress shortcode which will display your earned OpenBadges on any of your posts or pages.

http://openbadges.org/

Installation:
------------
Download this repository as zip. 

Extract the contents, and then zip the "openbadges" folder.

Finally, upload it to your Wordpress blog as a plugin.

Usage:
------------
Add this shortcode to any of your Wordpress post or pages:

    [openbadges user_id="[YOUR USERID]" group_id="[YOUR GROUPID]"]

Other options:
------------
You can also assign the width of your Badges, like so:

    [openbadges user_id="[YOUR USERID]" group_id="[YOUR GROUPID]" badge_size="250px"]
    
By default, the badge size is set to 200px.

You also have the option to set the description font size:

    [openbadges user_id="[YOUR USERID]" group_id="[YOUR GROUPID]" badge_size="250px" badge_desc_size="20px"]
    
By default, the badge description fontsize is set to 15px.

Example
------------
An example of how it looks like: [Click here](http://omarusman.com/blog/about)

FAQ
------------
If you don't know how to get your *user_id* and *group_id*, please refer to this link:

https://github.com/mozilla/openbadges/wiki/Displayer-API
