# Comment Link Rel Manager
Change `rel='nofollow'` to `rel='follow'` in comments of your site for any role you want  :)

## Description
**WordPress 1.5 and above automatically assigns the nofollow attribute to all user-submitted links (comment data, commenter URI, etc). this plugin can manage nofollow, Simply you can check your role and nofollow become follow**

A few notes about the features:
*   Specific capability, So you can assign to your managers 
*   Use standard structure for plugin development 
*   No footprint after deactivation
*   Every function has Comment  for more readibility
*   Use comments_array hook for improving performance insted of signle hook
*   Multilanguage
*   Support custom role, so you can feel free to add your role

## Installation
This section describes how to install the plugin and get it working.

e.g.

0. Download [Comment Link Rel Manager](https://github.com/devlifeX/comment-link-rel-manager/archive/1.0.0.zip) (version 1.0.0)
1. Upload `comment-link-rel-manager-1.0.0.zip` to the `/wp-content/plugins/` directory and extract it
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Go `http://yoursite.com/wp-admin/admin.php?page=rel` 

## Changelog

##### 1.0 
* Add convert nofollow to follow functionality
* Add persian language
