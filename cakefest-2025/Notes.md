Notes

Hi everyone! 

I'm Umer Salman. I've been working with CakePHP since I started at my current position at Southwest Research Institute in Texas in 2021. We're a small group of 3, but we work on 60ish CakePHP applications building data analysis and support software for NASA and ESA spacecraft. The group has been working with CakePHP since the early days. 

<!-- Change slide -->

Now, we're always looking to improve how we do things, but across lots of applications and a small team, it's easy to get lost. You obviously want to do the best practices for everything, but if you spend your time doing all that, you lose the time to develop. Which is actually what your customers want. 
So I'd like to present progressively improving your CakePHP applications through powerups. Obviously, the list is endless, but I want to cover a few that we've gone through recently and how the same thing can apply to the things you do. 
The 3 I mainly want to cover are logging, data queries, and WebAssembly. 

<!-- Change slide -->

Now imagine these are like Pokemon cards, each with it's own evolution path and you can choose what works for you and always change later.

In terms of logging, like everything, there's a spectrum.
Obviously, increasing the capabilities increases what you're able to do, but its important to think back on what you actually need. 
If you have 10 users, you don't need the same things as what an app with 1M users needs.

You're probably familiar to these but it's just the logs that go in the logs folder, aptly named. This is just the logs from the tutorial yesterday. But man, that's not fun. We have no context of who did what and we also have a hard time finding where to actually change my code to make that not happen!

<!-- Search for BookingsController -->

Yeah that's no fun.
Fortunately Mark Scherer has a plugin that compiles these to a database called DatabaseLog. What's good about this is that it compiles the logs to a database, combining errors of the same type together. Much much better.

But maybe we don't want a plugin and would rather just do something simple on the server to compile all the logs together, which introduces centralizing it. LogHappens does that. It already had a CakePHP 4 log parser so I just added the CakePHP 5 version and it worked. It highlights where your error is and can delete all of a type, stuff like that. 

Many teams may find these sufficient at this point. You have logs and you see how to fix them to make them not happen anymore. 

But what if we had more context? We can powerup again.
I'm going to go to the end and come back.

Sentry is an app used by many here and it has everything. You can see who did what. What broke, why, and more. People can submit feedback/bug reports. And you can see if queries are performing well, use it across like any kind of software, not just CakePHP or PHP. There are others like this but this is the idea - not just compiling the errors together, but total app improvement. Kevin has a plugin for connecting CakePHP to Sentry.

So I tried it, and it was... overwhelming. If our team were bigger and we had thousands of concurrent users or something, definitely a good path to go. But for a dozen users per site across a bunch of sites? Overkill.
So I looked for something more streamlined. GlitchTip was one and actually just uses the same Sentry API so you can use the same plugin from Kevin and be done. You put your sites in and it puts them together and adds some context. But more importantly, shows you where the error is... Nice!

Other options may fit your workflow better, but the point is that it's not all or nothing; do to where you're comfortable setting up and maintaining.

<!-- Slide change -->

We took care of logging but there's other ways to power up your CakePHP application.

Take this code we have here. Doesn't really matter how it does, but it essentially decimates the data for plotting. We have tables of 100s of millions of rows for each of the sensors and the value at some epoch datetime(6). Our naive approach was to just make a Query with the ORM, grab the first, skip to get 998 points from the middle, and the last point. But we had some issues here. It's obviously slow going through that much table. And it used to not be able to use the database index for faster lookups. We added a groupBy() to force it to use the index on the field but that wasn't needed. Since this actually, as Mark Story mentioned yesterday, there's now an optimizerHint() in the ORM to tell it to use the index, which is pretty handy.

Even still, surely we can do better. The docs are a little lacking here but I also had no idea these were a thing. I stumbled upon a GitHub Issue which led me to Mark's blog about Windowing Functions and Common Table Expressions. Looks like what I need for sure. Now it makes a like fake temp table to do your later operations on. We set up a "base_data" table from the jumbo table and now our operations are much easier (and more importantly, faster) - grabbing the first, middle, and last from the much smaller table. This is super useful since we do this function over and over for many sensors. And we can't cache it because we the user is able to filter the data, so the Query coming in here already has a good few things going on. 

But, it can probably be even better. Googling led me to believe that Postgres is better for large data. Maybe, but my immediate attempt of just putting in the data to a Postgres database ended up pretty close to the same, like maybe some milliseconds faster but not enough to change to it. However, then I stumbled upon FILTER that's in Postgres. It certainly looks simplier. There's actually databases specifically for time-series data, which is what we have here. TimescaleDB is an example of one and is built upon Postgres, which is great because it would just work with Cake. It adds in stuff like bucketting and auto clearing after some time. Not useful for us, but if someone had just like a temperature sensor, they don't need every value from a year ago, just averages and it handles stuff like that.

<!-- Change slide -->

So those were some cool things we can do that already just work to extend your app, but there's some cool ones on the horizon too. One I find especially interesting is PyScript. It runs on WebAssembly, or WASM, that lets you ship stuff to the client's web browser and runs it there. 
This is super cool! 
For us, the scientists tend to write in whatever language they know, so we have to work with Python, IDL, C++, Fortran, and more. Sometimes those Python scripts aren't even that big and so years ago we would just exec() them on the server... Uh oh! That opens the door to a lot of security issues, tho that can be solved by Process(), but even still, then we need to install python packages on the server, which we'd like to avoid. So we wrap them in Containers and send them over the Queue to another system. Yay, but also all that just to run some simple calculations? Our scientists work in different reference frames and times and such and calculators but just on the web would be useful. Everythings in Python, so could we just connect that somehow? YUP! Here's an example - Quaternions are like XYZ coordinates but solve a problem at certain angles. I could rewrite this code in PHP or JS or something, but I don't want to. Especially since there's no tests and things like that - I would rather just run the Python. That's all possible with WebAssembly. Let's see what that means. You'll notice that the inputs were blanked out. That's actually loading Python in the browser to run as assembly. Assembly is extremely fast and compact. Hooked in here, loaded some modules, and you're ready. 
Rounding and error checking, already there. Instant with no server roundtrip, which also improves security and the end-user has no idea.
Here you can see what it looks like when embedded in an application, in this case for Lunar Reconnaissance Orbiter, which is around the moon.

So how did we do this? Pretty easy. We can use CakePHP FormHelper and then just include a script.
Here's the output of that that I'm showing here, but you could just do it in HTML as well. Did a foreach to output these 4 fields, then a foreach for these 3.
The important part is here: pyscript.
Include the config and the script itself.
In the script we import document and we have JS style syntax in Python that hooks to the DOM!
I just wrapped this Quat() function with the DOM operations.
For Cake, these files just go in the webroot and you're done. Run Python on the server, run it on the client, wherever.

You probably realize that this concept opens a whole world, so we'll powerup again.

This was made possible by WASM, which allows all kinds of languages to become sendable over the wire and executable on any client, desktop, mobile, Smart TVs or whatever else has a browser by now lol.
I mentioned WASI here too, that's something that allows these WebAssembly modules to communicate with each other. Imagine having a Cake app in one place and you have these little executables running on Arduinos distributed whereever, without the overhead of Containers. This does work with Containers as well - Docker has a WASM connector/option.
Back on the PHP front, that means we can run LAMP apps on the browser https://endor.dev/s/lamp. There's a project called Endor that does just that.

<!-- Click in Endor -->

I haven't tried this with CakePHP yet, but I plan to. I think it would be useful to have CakePHP applications have a "Try Me!" button, like Mark Scherer's Sandbox.
You have to connect your local folder so you still need composer and such locally, but the result can run here and you can tie in other services: Redis, Rabbit, etc. 

There's another place I want to try this. We have like vacuum chambers and other equipment but getting the data from the chamber to server means connecting to a serial port and we probably don't want to add PHP and such on the server, so there would need to be a Python wrapper, but Python and libraries seems to heavy. In theory we can use Fermyon Spin or wasmCloud. Which is like Lambdas, but web. Microsecond start up time and usable offline, not tied to AWS.
I would love to have these reporting to CakePHP. If someone gets to trying these out, definitely let me know!

Mark Story also mentioned FrankenPHP which is now supported by the main PHP Foundation.
Between FrankenPHP, NativePHP, and WebAssembly, it's the year of Linux, sorry I mean PHP, on the desktop.

Coming back to things for now, there's lots of ways you can improve your app. Some of them are built, some of them aren't.
I've mentioned this before, but I've been stuck on being able to have a datetimepicker that supports nanoseconds, but doesn't require jQuery.
Appearently PhpMyAdmin also has this problem because everything else doesn't go that precise. So with AI tools, I basically had it generate the base for such a thing and then worked through the bugs or extra things I want different. But with CakePHP I'm able to tie it to the FormHelper and use it in my app.

So just build it and try it. And make the the descision of where along the scale you want to get to without making things too difficult.
It may be tempting to go all the way to what Netflix, Google, etc are all doing but that could be overkill. Everyone can build a bridge with unlimited time and materials but the point is to build it in the shortest timeline and fewest resources.

Hopefully that gives some insight on cool ways to make whatever you wish to do happen and some more tools to do things like webify other software to better the value you provide with your CakePHP application!

<!-- Change Slide -->

Everything I mentioned is available on the Slides and/or on my GitHub, and of course let me know if y'all are using any of these things. 

Any Questions?

<!-- Other -->

apache -> nginx -> caddy -> franken
LAMP -> devilbox -> docker -> podman(?) kube(?)
File Watchers -> xdebug
Queue, Prefect
Auth: TinyAuth -> Authentik
PhpMcp - GeoViz
- Jorge already talked about PhpMcp
