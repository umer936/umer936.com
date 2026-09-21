text-wrap: balance

instead of 
if (document.querySelector('.dialog')) {
  document.querySelector('.dialog').classList.add('close');
}
use 
document.querySelector('.dialog')?.classList.add('close');



Oct 2022:
php file open
eg:
$file = new SplFileObject($path, 'r+');
$contents = $file->fread($file->getSize());
$file->rewind();
$content_new = str_replace('false', 'true', $contents);
        return $file->fwrite($content_new);
vs
$file = file_get_contents($path);
$content_new = str_replace('false', 'true', $file);
        return file_put_contents($path, $content_new);
https://bramus.github.io/ws1-sws-course-materials/05.files.and.folders.summary.html | https://bramus.github.io/ws1-sws-course-materials/05.files.and.folders.html#/
[https://bramus.github.io/ws1-sws-course-materials/05.files.and.folders.html#/4/1](https://bramus.github.io/ws1-sws-course-materials/05.files.and.folders.html#/4/1)
[https://stackoverflow.com/questions/4521936/quickest-way-to-read-first-line-from-file](https://stackoverflow.com/questions/4521936/quickest-way-to-read-first-line-from-file)
[https://stackoverflow.com/questions/11901521/replace-string-in-text-file-using-php](https://stackoverflow.com/questions/11901521/replace-string-in-text-file-using-php)
[https://www.quora.com/What-is-the-difference-between-file_get_contents-and-fopen-in-PHP](https://www.quora.com/What-is-the-difference-between-file_get_contents-and-fopen-in-PHP)
[https://stackoverflow.com/questions/27910354/most-efficient-method-of-using-php-to-read-two-files-math-calculate-and-write](https://stackoverflow.com/questions/27910354/most-efficient-method-of-using-php-to-read-two-files-math-calculate-and-write)


