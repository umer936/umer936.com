<?php
include_once '../header.php';

$blogPosts = [
        'SVN2GIT' => [
                'url' => 'svn2git.md',
                'date' => '11/21/2023',
                'img' => "https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/git/git-original.svg", // MIT License, devicons
                'smallText' => 'Convert SVN repo to Git',
        ],
        'Windows tmp on startup' => [
                'url' => 'windows-tmp-on-startup.md',
                'date' => '04/01/2026',
                'img' => "https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/powershell/powershell-original.svg", // MIT License, devicons
                'smallText' => 'A tiny PowerShell startup script that clears C:\\tmp so Windows behaves more like Linux /tmp.',
        ],
        'Steam on Linux' => [
                'url' => 'steam-on-linux.md',
                'date' => '03/09/2026',
                'img' => "https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/linux/linux-original.svg", // MIT License, devicons
                'smallText' => 'Fix White Screen of Death launching Steam games on Fedora 43. Also fixes laggy Big Picture Mode.',
        ],
        'CentOS_PHP_7-8' => [
                'url' => 'PHP_Upgrade_7-8.md',
                'date' => '12/27/2023',
                'img' => "https://www.php.net/images/logos/new-php-logo.svg", // Official PHP logo
                'smallText' => 'RHEL (e.g. CentOS) guide to upgrading PHP from 7 to 8',
        ],
        'FIRST Robotics' => [
                'url' => 'FIRST.md',
                'date' => '08/15/2023',
                'img' => "https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/arduino/arduino-original.svg", // MIT License, devicons (robotics/electronics)
                'smallText' => 'Former FTC and FRC Student; now mentor BroncBotz 3481, FTC 4008/6976/4602, and TMI FTC 6221.',
        ],
    // later will move these to projects, but this is good for now
        'Car Diagnostics Logger' => [
                'url' => 'car-diagnostics-logger.md',
                'date' => '12/15/2015',
                'img' => "https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/raspberrypi/raspberrypi-original.svg", // MIT License, devicons
                'smallText' => 'A Raspberry Pi-based OBD-II car diagnostics monitor and logger, built for privacy-oriented collection of vehicle metrics like RPM, temperatures, tire pressures, and engine codes.',
        ],
        'DIY Circuits' => [
                'url' => 'diy-circuits.md',
                'date' => '08/15/2023',
                'img' => "https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/arduino/arduino-original-wordmark.svg", // MIT License, devicons
                'smallText' => 'A personal project to create printed circuit boards (PCBs) at home, born out of necessity during COVID-19 when access to the UT Austin Makerspace was restricted.',
        ],
        'Intelligent Quads' => [
                'url' => 'intelligent-quads.md',
                'date' => '08/15/2023',
                'img' => "https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/python/python-original.svg", // MIT License, devicons (IQ used Python heavily)
                'smallText' => 'Co-founded Intelligent Quads (IQ), a modular and customizable drone platform startup spun off from Texas Aerial Robotics, enabling companies and researchers to build innovative drone applications.',
        ],
        'Hybrid-Hybrid Kubernetes Cluster' => [
                'url' => 'hybrid-kubernetes-spacecraft-web-applications.md',
                'date' => '10/15/2023',
                'img' => "https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/kubernetes/kubernetes-original.svg", // MIT License, devicons
                'smallText' => 'Deploying spacecraft web applications in a hybrid Kubernetes cluster spanning on-premises servers, a high-performance computing cluster, and AWS — developed at Southwest Research Institute.',
        ],
        'Aceso' => [
                'url' => 'aceso.md',
                'date' => '03/09/2026',
                'img' => "https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/cplusplus/cplusplus-original.svg", // MIT License, devicons (Aceso used C++)
                'smallText' => 'Aceso: Harnessing Technology to Support Children\'s Mental Health. Senior design project combining engineering, mental health awareness, and innovation.',
        ],
];
?>
    <div class="<?= $sectionHeaderClasses ?>">
        Blog Posts
    </div>

    <div class="container my-4">
        <div class="row row-cols-1 row-cols-md-2 g-4">
            <?php

            foreach ($blogPosts as $title => $blogPost) {
                ?>
                <div class="col">
                    <div class="card">
                        <div class="card-body row">
                            <img src="<?= $blogPost['img'] ?>"
                                 class="col-md-4"
                                 loading="lazy"
                                 alt="...">
                            <div class="col-md-8">
                                <h5 class="card-title"
                                    data-bs-toggle="modal"
                                    data-bs-target="#postModal"
                                    data-modal-type="posts"
                                    data-modal-title="<?= $title ?>"
                                    data-modal-url="<?= $blogPost['url'] ?>">
                                    <a href="javascript:void(0)"><?= $title ?></a>
                                </h5>
                                <p class="card-text custom-card-text">
                                    <?= $blogPost['smallText'] ?>
                                </p>
                            </div>
                        </div>
                        <div class="card-footer">
                            <small class="text-body-secondary"><?= $blogPost['date'] ?></small>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
    </div>


<?php
$mediaPosts = [
        'CakeFest-2023' => [
                'url' => 'cakefest2023.md',
                'date' => '09/30/23',
                'img' => "https://cakefest.org/cakefest/img/cakefest-logo.svg",
                'imgClasses' => 'bg-info-subtle',
                'smallText' => 'Conference talk on containerization.
                Covers Queueing methods for long-running processes and working with parts in different programming
                languages. YouTube video available.',
        ],
];
?>


    <div class="<?= $sectionHeaderClasses ?>">
        In the Media
    </div>


    <div class="container my-4">
        <div class="row row-cols-1 row-cols-md-2 g-4">
            <?php

            foreach ($mediaPosts as $title => $mediaPost) {
                ?>
                <div class="col">
                    <div class="card">
                        <div class="card-body row">
                            <img src="<?= $mediaPost['img'] ?>"
                                 class="col-md-4 <?= $mediaPost['imgClasses'] ?? '' ?>"
                                 loading="lazy"
                                 alt="...">
                            <div class="col-md-8">
                                <h5 class="card-title"
                                    data-bs-toggle="modal"
                                    data-bs-target="#postModal"
                                    data-modal-type="medias"
                                    data-modal-title="<?= $title ?>"
                                    data-modal-url="<?= $mediaPost['url'] ?>">
                                    <a href="javascript:void(0)"><?= $title ?></a>
                                </h5>
                                <p class="card-text custom-card-text">
                                    <?= $mediaPost['smallText'] ?>
                                </p>
                            </div>
                        </div>
                        <div class="card-footer">
                            <small class="text-body-secondary"><?= $mediaPost['date'] ?></small>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
    </div>


    <div class="modal fade" id="postModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body"><!-- px-5 -->
                    <!-- Modal content goes here -->
                </div>
                <div class="modal-footer d-inline">
<!--                    <span class="float-start">© umer936</span>-->
<!--                    <button type="button" class="btn btn-secondary btn-sm float-end" data-bs-dismiss="modal">Close</button>-->
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            new bootstrap.Modal(document.getElementById('postModal'), {
                backdrop: 'static',
                keyboard: false
            });

            // Function to open modal based on hash
            function openModalFromHash() {
                const hash = window.location.hash.substring(1); // Get the hash without the '#'
                if (hash) {
                    const title = decodeURI(hash);
                    const button = document.querySelector('[data-modal-title="' + title + '"]');
                    if (button) {
                        button.click();
                    }
                }
            }

            // Handle modal show event
            document.getElementById('postModal').addEventListener('show.bs.modal', function (event) {
                var button = event.relatedTarget; // Button that triggered the modal
                var title = button.getAttribute('data-modal-title'); // Extract info from data-* attributes
                var type = button.getAttribute('data-modal-type'); // Extract info from data-* attributes
                var url = '/blog/' + type + '/?postName=' + button.getAttribute('data-modal-url');

                this.querySelector('.modal-title').textContent = title;

                fetch(url)
                    .then(response => response.text())
                    .then(data => {
                        this.querySelector('.modal-body').innerHTML = data;
                    })
                    .catch(error => console.error('Error fetching modal content:', error));

                window.history.pushState(null, null, '#' + encodeURI(title));
            });

            document.getElementById('postModal').addEventListener('hide.bs.modal', function () {
                window.history.pushState(null, null, window.location.pathname);
            });

            openModalFromHash();
        });
    </script>
<?php

include_once '../footer.php';
