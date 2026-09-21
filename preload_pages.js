document.addEventListener("DOMContentLoaded", () => {
    const prefetchedUrls = new Set();
    const observer = new IntersectionObserver(handleIntersection, { threshold: 0.1 });

    function handleIntersection(entries) {
        entries.forEach(entry => {
            const link = entry.target;

            if (entry.isIntersecting && !prefetchedUrls.has(link.href)) {
                link.addEventListener("mouseenter", handleIntent, { once: true });
                link.addEventListener("touchstart", handleIntent, { once: true, passive: true });
                observer.unobserve(link);
            }
        });
    }

    function handleIntent(event) {
        const link = event.currentTarget;
        prefetchLink(link.href);
    }

    function prefetchLink(url) {
        if (!isPrefetchableUrl(url) || prefetchedUrls.has(url)) {
            return;
        }

        const prefetchLink = document.createElement("link");
        prefetchLink.rel = "prefetch";
        prefetchLink.href = url;
        document.head.appendChild(prefetchLink);
        prefetchedUrls.add(url);
    }

    function isPrefetchableUrl(url) {
        try {
            const parsedUrl = new URL(url, window.location.href);
            return parsedUrl.origin === window.location.origin
                && parsedUrl.pathname !== window.location.pathname;
        } catch (error) {
            return false;
        }
    }

    document.querySelectorAll("a[href]:not([href^='#'])").forEach(link => observer.observe(link));
});
