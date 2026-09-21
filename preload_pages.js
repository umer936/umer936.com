document.addEventListener("DOMContentLoaded", () => {
    const preloadedUrls = new Set(); // Track URLs that have already been preloaded
    const observer = new IntersectionObserver(handleIntersection, { threshold: 0.1 });

    // IntersectionObserver callback function to handle visibility detection
    function handleIntersection(entries) {
        entries.forEach(entry => {
            const link = entry.target;

            if (entry.isIntersecting && !preloadedUrls.has(link.href)) {
                link.addEventListener("mouseover", handleMouseOver);
                observer.unobserve(link); // Stop observing once it's ready to preload
            }
        });
    }

    // Function to handle link preloading
    function handleMouseOver(event) {
        const link = event.currentTarget;
        preloadLink(link.href);
        link.removeEventListener("mouseover", handleMouseOver); // Remove the listener after preloading
    }

    // Function to preload the link
    function preloadLink(url) {
        if (!preloadedUrls.has(url)) {
            const preloadLink = document.createElement("link");
            preloadLink.rel = "preload";
            preloadLink.href = url;
            preloadLink.as = getResourceType(url); // Determine the type of resource
            document.head.appendChild(preloadLink);
            preloadedUrls.add(url);
        }
    }

    // Determine the type of resource based on the URL or its extension
    function getResourceType(url) {
        if (url.endsWith('.css')) return 'style';
        if (url.endsWith('.js')) return 'script';
        if (url.match(/\.(jpg|jpeg|png|gif)$/)) return 'image';
        if (url.endsWith('.html')) return 'document';
        return 'fetch'; // Fallback for non-specific resources
    }

    // Observe all links with an href attribute, excluding anchor links
    document.querySelectorAll("a[href]:not([href^='#'])").forEach(link => observer.observe(link));
});
