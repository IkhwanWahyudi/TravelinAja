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

    function scrollBehavior() {
        var target = document.getElementById('targetScroll');

        // Menggunakan metode scrollIntoView untuk mengatur scroll ke elemen target
        target.scrollIntoView({
            behavior: 'smooth'
        });
    }
</script>
