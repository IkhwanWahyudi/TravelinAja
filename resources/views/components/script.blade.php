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

    // Mendapatkan elemen input tanggal
    var datePicker = document.getElementById('departure_date');

    // Mendapatkan tanggal hari ini dalam format YYYY-MM-DD
    var today = new Date().toISOString().split('T')[0];

    // Menetapkan tanggal hari ini sebagai nilai minimal
    datePicker.min = today;
</script>
