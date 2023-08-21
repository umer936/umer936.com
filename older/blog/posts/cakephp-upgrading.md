It's a good bit of work (especially on a large project), but I've done it a handful of times.

I used the upgrade tool from 2.x --> 3.x using the upgrade tool
https://book.cakephp.org/3/en/appendices/3-0-migration-guide.html
https://www.dereuromark.de/2015/06/06/cakephp-3-0-migration-notes/

I didn't worry about making things work at this point.

Then I did 3.x --> 4.x using the upgrade tool
https://www.cakedc.com/upgrade
https://book.cakephp.org/4/en/appendices/4-0-upgrade-guide.html
https://github.com/dereuromark/upgrade/wiki/4.x-upgrade-snippets

Then I actually made a new CakePHP 4 project and moved the code over to it so it had the latest https://github.com/cakephp/app/ files.

Then was the process of upgrading things.

I would keep a copy of the 2.x one running somewhere while you do this because one breaking point is removing JsHelper. For this, I would go to the 2.x version of the page > Inspect Element > find the <script> block (starts with like CDATA) generated from that and paste it into the template. I dealt with refactoring that to better JS code later.

There was also a good bit involved in making all the methods work. Feel free to ask in here if there's something else difficult that you stumble upon.

I hope to make a comprehensive Blog post of upgrading 1.x --> 2.x --> 3.x --> 4.x --> 5.x after 5.x comes out. AFAIK I don't have anything with CakePHP 1, but I definitely have CakePHP 2 sites still. 
