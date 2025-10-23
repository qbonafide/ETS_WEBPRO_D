document.addEventListener("DOMContentLoaded", () => {
    const seatButtons = document.querySelectorAll(".seat-btn");
    const deskInput = document.getElementById("desk_number");
    const datePicker = document.getElementById("bookingDate");
    const dateInput = document.getElementById("selected_date");

    if (seatButtons.length > 0 && deskInput) {
        seatButtons.forEach((btn) => {
            btn.addEventListener("click", function () {
                seatButtons.forEach((b) => b.classList.remove("active"));
                this.classList.add("active");
                deskInput.value = this.textContent.trim();
            });
        });
    }

    if (datePicker && dateInput) {
        datePicker.addEventListener("change", function () {
            dateInput.value = this.value;
        });
    }

    const timeButtons = document.querySelectorAll(".time-btn");
    const timeInput = document.getElementById("selected_time");

    if (timeButtons.length > 0 && timeInput) {
        timeButtons.forEach((btn) => {
            btn.addEventListener("click", (e) => {
                e.preventDefault();
                btn.classList.toggle("active");

                const selectedTimes = Array.from(timeButtons)
                    .filter((b) => b.classList.contains("active"))
                    .map((b) => b.textContent.trim());

                timeInput.value = selectedTimes.join(", ");
            });
        });
    }

    const fileInput = document.querySelector('input[type="file"]');
    if (fileInput) {
        fileInput.addEventListener("change", () => {
            const fileName = fileInput.files[0]?.name || "No file chosen";
            console.log(`File selected: ${fileName}`);
        });
    }
});
