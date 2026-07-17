If you're on a RHEL distribution, follow these steps:

1) Go here: https://rpms.remirepo.net/wizard/
   1) Select. e.g. EL 7, 8.3.1, Default, x86_64
   2) Follow Steps until break

Will likely break like this

    php74-fpm-httpd-7.4.21-1.el7.ius.noarch (@ius)
            Requires: php74-fpm = 7.4.21-1.el7.ius
            Removing: php74-fpm-7.4.21-1.el7.ius...

`--skip-broken` will skip the packages with these errors, 
but need to solve the actual issue

In this case: 
1) `sudo yum remove imagick* ImageMagick* php-pear* php74-fpm-httpd php74-pecl-apcu php74-fpm-7.4.27-1.el7.ius.x86_6 php74-pecl-igbinary php74-fpm-nginx`
2) `yum update`
3) Either install or remove from `/etc/php.d/*-[name]`
   1) e.g. `gd`, `redis`, `gearman`
4) `yum install php-gd php-redis php-gearman php-pecl-igbinary php83-php-gd libwebp gearmand php-mcrypt php83-php-sodium`
5) CHECK `/etc/php.d/` for order!!! (e.g. redis should be last)
6) `php`
   1) Handle any issues
7) `yum install ImageMagick`
8) start services if they haven't been: `httpd, php-fpm, apache`

Additional Resource:
https://utho.com/docs/tutorial/how-to-install-php-8-in-centos-7/ 
