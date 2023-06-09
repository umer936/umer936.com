document.addEventListener('DOMContentLoaded', function () {
    M.ScrollSpy.init(document.querySelectorAll('.scrollspy', {
        'scrollOffset': 1000,
    }));
    M.Collapsible.init(document.querySelectorAll('.collapsible'));
});

document.querySelector('#themeswitcher').addEventListener('click', function () {
    document.querySelectorAll('.material-icons').forEach((icon) => {
        icon.classList.toggle('md-dark');
        icon.classList.toggle('md-light');
    })
    const body = document.querySelector('body');
    body.classList.toggle('color2');
    body.classList.toggle('color1');
    document.querySelector('textarea').classList.toggle('dark');
    document.querySelector('.intro').classList.toggle('blue');
    document.querySelector('.intro').classList.toggle('blue-grey');
    let newColor;
    if (body.classList.contains('color1')) {
        newColor = 'rgba(0,0,0,0.87)';
        document.querySelector('#wordsforcoloring').textContent = 'Too bright for your eyes?';
        document.querySelector('#colorword').textContent = 'dark';
    } else {
        newColor = '#9e9e9e';
        document.querySelector('#wordsforcoloring').textContent = 'Nah, change it back';
        document.querySelector('#colorword').textContent = 'light';
    }
    for (const bodyElem of ['h5', 'h6', 'textarea', '.container']) {
        document.querySelectorAll(bodyElem).forEach((thisElem) => {
            thisElem.style.color = newColor;
        })
    }
})

