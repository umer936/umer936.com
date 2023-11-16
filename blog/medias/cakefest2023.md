Space science data has exploded. The data received from space probes was smaller than the software. That has changed as sensors have gone to higher precision and more readings per second. Instead of moving and ingesting the data to the software, we needed a better way - moving the software to the data (on the cloud).

Recently (within the last year) we've fleshed out a Kubernetes deployable system and have modularized CakePHP web applications. These web applications are primarily for data visualization of science and engineering data. We'll showcase how to deploy the apps in a hybrid Kubernetes cluster, which includes on-premises servers, a high-performance computing cluster (for the resource-intensive jobs), and AWS. We'll also demonstrate how to deploy in a Docker environment using the Galley plugin as well as a "normal" deployment on a webserver with apache/mysql/etc. That way any performance is progressive and you don't lose the ability to do a normal system deployment if the client needs it to be so.

The talk will show how to scale these services to meet customer needs, queuing with dereuromark-queue and the cakephp queue plugins, and other associated tools we have found for dependency management, on-prem repositories, etc. 



- https://www.youtube.com/live/4KB92R7UQc8?si=7rFNri7wxBw-BQmG
- https://cakefest.org/
- https://cakefest.org/archive/losangeles-2023
- https://umer936.com/cakefest-2023/
