# Sud Web Theme for WordPress

**Sud Web Theme for WordPress** is a theme tailored for [Sud Web](http://sudweb.fr) purpose.
It has several features:

* display talks
* display speakers profile
* display attendees informations
* adaptative display through *responsive webdesign*

In a near future, *business logic* will be moved in [wp-sudweb plugin](https://github.com/sudweb/wp-sudweb).

## Install

Before working on this theme, **please fork it first**. Then clone out a copy of your repo in your `wp-content/themes` folder:

```bash
cd my/wordpress/folder
git clone git@github.com:GITHUB_USERNAME/wp-sudweb-theme.git wp-content/themes
cd wp-content/themes/wp-sudweb-theme
git submodule init
git submodule update
```

Ensure you also have these installed plugin, as the theme relies on them:

* [Posts 2 Posts](wordpress.org/extend/plugins/posts-to-posts/)
* [Advanced Custom Fields](wordpress.org/extend/plugins/advanced-custom-fields/)

## Deploy

In case you'd deploy the code on your server, be careful to exclude the `.git` folder.
With `rsync`, it's with the `--exclude` parameter:`

```bash
rsync … --exclude=".git" …
``

## License

> Copyright (C) 2012 Sud Web
>
> This program is free software: you can redistribute it and/or modify
> it under the terms of the GNU General Public License as published by
> the Free Software Foundation, either version 3 of the License, or
> (at your option) any later version.
>
> This program is distributed in the hope that it will be useful,
> but WITHOUT ANY WARRANTY; without even the implied warranty of
> MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
> GNU General Public License for more details.
>
> You should have received a copy of the GNU General Public License
> along with this program.  If not, see <http://www.gnu.org/licenses/>.
