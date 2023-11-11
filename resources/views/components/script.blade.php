<script>
    const scrollBg = document.getElementById('scroll-bg');

    window.addEventListener('scroll', () => {
        const scrollPosition = window.scrollY;
        if (scrollPosition > 10) {
            scrollBg.style.backgroundColor = '#ffffff4a';
        } else {
            scrollBg.style.backgroundColor = '#FFFFFF00';
        }
    });
</script>
