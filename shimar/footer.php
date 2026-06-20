<section id="footer" style="background-color: #0f766e; color: #ffffff; text-align: center; padding: 40px; font-weight: 500;">
        <p>&copy; 2026 E-Health Medical Booking. All Rights Reserved.</p>
    </section>

    <!-- JavaScript Content -->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            // 'Book Now' 
            const bookBtn = document.getElementById("bookBtn");
            if (bookBtn) {
                bookBtn.addEventListener("click", function () {
                    alert("Hello! The medical booking page will be opened soon.");
                });
            }

            // 'Consult Now' 
            const consultLinks = document.querySelectorAll(".c-c-desc a");
            consultLinks.forEach(link => {
                link.addEventListener("click", function (event) {
                    event.preventDefault();
                    const specialty = this.parentElement.querySelector("h5").innerText;
                    alert(`${specialty} - The medical consultation page will be opened soon.`);
                });
            });

            // Scroll Reveal
            const cards = document.querySelectorAll(".feature-card, .consult-card, .dept-card");
            const checkCards = () => {
                const triggerBottom = (window.innerHeight / 5) * 4;
                cards.forEach(card => {
                    const cardTop = card.getBoundingClientRect().top;
                    if (cardTop < triggerBottom) {
                        card.style.opacity = "1";
                        card.style.transform = "translateY(0px)";
                        card.style.transition = "all 0.6s ease-out";
                    }
                });
            };
            cards.forEach(card => {
                card.style.opacity = "0";
                card.style.transform = "translateY(20px)";
            });
            window.addEventListener("scroll", checkCards);
            checkCards();
        });
    </script>
</body>
</html>