# Sud Web Theme for WordPress

**Sud Web Theme for WordPress** is a theme tailored for [Sud Web](http://sudweb.fr) purpose.  
It has several features:

* display talks
* display speakers profile
* display attendees informations
* adaptative display through *response webdesign*

It relies on [wp-sudweb](https://github.com/sudweb/wp-sudweb), a plugin containing the website business logic.

## Install

Simply clone out a copy of this repo in your `wp-content/themes` folder:
<pre><code>cd my/wordpress/folder
git clone git@github.com:sudweb/wp-sudweb-theme.git wp-content/themes</code></pre>

Eventualy, add it as a submodule if you are working in a git repository:
<pre><code>cd my/wordpress/folder
git submodule add git@github.com:sudweb/wp-sudweb-theme.git wp-content/themes</code></pre>

In case you'd deploy the code on your server, be careful to exclude the `.git` folder.
With `rsync`, it's with the `--exclude` parameter:
<pre><code>rsync … --exclude=".git" …</code></pre>

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