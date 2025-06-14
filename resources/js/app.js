import './bootstrap';

import Alpine from 'alpinejs';
window.Alpine = Alpine;
Alpine.start();

document.addEventListener('DOMContentLoaded', () => {
    const dtElement = document.getElementById('datetime');
    if (dtElement) {
        const updateDateTime = () => {
            const now = new Date();

            // Format date in Indonesian
            const tanggal = now.toLocaleDateString('id-ID', {
                day: 'numeric',
                month: 'long',
                year: 'numeric',
            });

            // Format time in HH:mm (24-hour)
            // const jam = now.toLocaleTimeString('id-ID', {
            //     hour: '2-digit',
            //     minute: '2-digit',
            //     hour12: false,
            // });

            const jam = now.getHours().toString().padStart(2, '0');
            const menit = now.getMinutes().toString().padStart(2, '0');

            dtElement.textContent = `${tanggal} | ${jam}:${menit}`;
        };

        updateDateTime();
        setInterval(updateDateTime, 1000);
    }
});