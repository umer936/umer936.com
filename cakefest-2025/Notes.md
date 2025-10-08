Notes

DateTimePickerJS
TimescaleDB
HTMX
GlitchTip
database-log -> logHappens -> GlitchTip -> Sentry
WASM -> PyScript
https://endor.dev/s/lamp
For example, the typical Laravel workflow requires downloading and installing packages (composer). That does not mean the resulting projects cannot be run inside Endor.
wasmCloud --> Delphy 
Fermyon Spin like Lambdas - Microseconds start up time, offline
FrankenPHP?
apache -> nginx -> caddy -> franken
Docker
LAMP -> devilbox -> docker -> podman(?) kube(?)
CakePHP CTE
Select + Unions -> CTE -> Filter
NativePHP
File Watchers -> xdebug
Queue, Prefect
Auth: TinyAuth -> Authentik
PhpMcp - GeoViz





Basically CakePHP allows for progressive enhancement. If you need a cupcake to a giant cake, CakePHP can work for that. 

In these different contexts, you can choose the thing that works for you and add in once you hit the point. Like adding power ups or leveling up Pokemon. 


For example, the log files for CakePHP go into the log folder. However, that is difficult to get to (deployed server is elsewhere and permissions etc), so dereuromark has a solution for that called database-log. We tried that out and seemed good. I also found a project called logHappens which lets us aggregate all the log files on a system into a dashboard and have it parse the stacktrace, highlighting where in our code the issue is. The next option is GlitchTip, which is ultimately what we settled on. It's fairly simple and uses the Sentry API so lordsimal's sentry api plugin works for it. It implements the stuff and lets us see it in a dashboard with uptime as well. Then the ultimate would be Sentry, but when I tried that out it was very overkill for my small team. I'm sure it would be a better fit for other groups, but there's a lot of ways to incrementally power up your application and stack. 


Similarly, we have what is essentially a custom Grafana since it hooks into features that scientists specifically need. Our datasets are huge, with hundreds of millions of rows, so we needed a way to decimate the data efficiently. Initially, we did this with select plus union queries, like selecting the first point, skipping 998 points, then selecting the last point and unioning them. That worked, but it was slow.Then I discovered common table expressions, or CTEs, which helped structure these queries better. We also experimented with switching from MariaDB to Postgres, but that alone did not improve performance. The next powerup I am considering is TimescaleDB, a PostgreSQL extension optimized for time series data. With Postgres, we gain access to filters that can replace some of the CTE logic. With TimescaleDB, we can use hypertables to bucket data that naturally belongs together, like sensor readings over the same time periods, so queries over millions of rows can be much faster.

Another important powerup is WebAssembly, or WASM. Let me show you an example. (this will be an iframe). Our normal process is to use Celery or RabbitMQ to dispatch a job to another container that is running code often written by a scientist. And the scientists like to work in what they are comfortable with, which can be IDL, C++, Python, or Fortran. That replies with the data or plot which Cake then uses. But what if there was a better way? Introducing the next powerup: pyscript. Web Assembly essentially compiles your code in any language to a super small module that can run anywhere. And not like Docker "anywhere", but anywhere anywhere. So see the calculator here. It can probably be done in JavaScript, but the Python libraries for this are more commonly updated and robust. We take the python, wrap it in PyScript, and now it's a module that gets sent over the wire to the user's browser. It's available everywhere, desktop and mobile browsers. And because it's loaded locally the responses are instant and secure as before we had concern over running these scripts on our server. The world of WASM is going to get very big very fast in my opinion. WasmCloud allows a way to network these modules together. As I mentioned, we build spacecraft instruments, but we also test them on site. Putting a CakePHP application in Docker to connect to the testing data would be good but there's too many steps and things we don't really want running on these big vacuum chambers, and PHP is not good for interacting with serial commands. So the other option is to have a Python API that connects to the CakePHP. But the actual powerup? That would be a super lightweight wasm module running outside a browser and communicating back to the app. 

Another small plug is DateTimePickerJS. I mostly vibe coded (AI generated) most of this, but basically every timepicker except for a addon to jQuery UI by someone named Trent Richardson only goes to minutes or seconds. But that plugin is 10 years unmaintaned. I was unable to find any timepickers that support milliseconds, nanoseconds, etc and found issues from PhpMyAdmin needing the same thing. So it became time to write my own powerup. There's some edge cases to figure out but it's close. https://github.com/umer936/datetimepicker.js

The point of this though is that there's stuff to fill any path. It may be tempting to go all the way to what the Netflix, Google, etc are all doing but that could be overkill. Everyone can build a bridge with unlimited time and money but it takes an engineer to build it in the shortest timeline and cost. 