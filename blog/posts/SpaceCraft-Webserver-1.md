Project 1: Spacecraft Web Applications in a Hybrid, Hybrid Kubernetes Cluster
Type: Professional, Role: Team of 3. Personally did software and cloud development research and implementation. Includes the web application UI/UX.
Description:
Space science data has exploded. In the past, the data received from space probes was smaller than the software. That has changed as sensors have gone to higher precision and more readings per second. Instead of moving and ingesting the data to the software, we needed a better way - moving the software to the data (on the cloud).
Through a grant given by the institute I work at (Southwest Research Institute), we were funded for a year long project.
Recently, we’ve fleshed out a Kubernetes cluster, which includes on-premises servers, a high- performance computing cluster (for the resource-intensive jobs), and Amazon Web Services. These web applications are primarily for visualization of science and engineering data or spacecraft flyby planning planning, as seen below [1]. This development was done in a manner that any improvement is progressive and you don’t lose the ability to do a normal system deployment if the client needs it to be so.
1

One important note is that the UI had to be created to be understandable, even with such complicated options like stellar catalogs. The view seen in [2] allows scientists to queue up thousands of flybys and let these run while being able to see the information on which job is which.
Additionally, I created this into a progressive web app (PWA) so the entire tool (called GeoViz) can be installed on a mobile device and a user can see the status of their plots and generated flight plans.
[1]
[2]
I also presented this project at CakeFest 2023 in Los Angeles and DASH 2023 at Johns Hopkins Applied Physics Lab (JHU APL) in Maryland
Details:
• Links:
– Slides: https://umer936.com/cakefest-2023/
– Video: https://www.youtube.com/live/4KB92R7UQc8?si=7rFNri7wxBw-BQmG
– ConferenceRecapBloghttps://www.cakedc.com/amanda/2023/10/12/cakefest-2023-recap – Abstract/Presentation with DOI https://zenodo.org/records/8412469
• Date Created: 2023
• Medium Used: PHP (CakePHP), HTML, JS, CSS, Bootstrap
  2