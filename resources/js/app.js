import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

/**
 * Real-time WebSocket Event Listeners
 * Listen for notifications and dashboard updates
 */
if (window.Laravel && window.Laravel.userId && window.Echo) {
    const userId = window.Laravel.userId;

    // Listen for new notifications
    window.Echo.private(`user.${userId}`)
        .listen('.notification.new', (e) => {
            console.log('New notification received:', e);

            // Show toast notification
            showToast(e.notification.title, e.notification.message, 'success');

            // Update notification badge count
            updateNotificationBadge();

            // Add notification to the list if on dashboard
            if (document.querySelector('.notifications-panel')) {
                prependNotificationToList(e.notification);
            }
        })
        .listen('.AppointmentCreated', (e) => {
            console.log('Appointment created:', e);
            showToast('Appointment Confirmed', `Your appointment at ${e.hospital} is confirmed!`, 'success');
            setTimeout(() => window.location.reload(), 2000);
        })
        .listen('.AppointmentCancelled', (e) => {
            console.log('Appointment cancelled:', e);
            showToast('Appointment Cancelled', 'Your appointment has been cancelled', 'info');
            setTimeout(() => window.location.reload(), 2000);
        })
        .listen('.DonationVerified', (e) => {
            console.log('Donation verified:', e);
            showToast('Donation Verified!', `You've helped save ${e.lives_impacted} lives!`, 'success');

            // Update dashboard stats if present
            if (document.getElementById('totalDonations')) {
                document.getElementById('totalDonations').textContent = e.new_total_donations;
                document.getElementById('totalLivesImpacted').textContent = e.new_total_lives;
            }
        })
        .listen('.ContributionVerified', (e) => {
            console.log('Contribution verified:', e);
            showToast('Contribution Verified!', `Your contribution to ${e.fundraiser_title} has been verified`, 'success');

            // Update total contributions if present
            if (document.getElementById('totalContributions')) {
                document.getElementById('totalContributions').textContent = '₱' + e.total_contributions.toLocaleString();
            }
        });
}

/**
 * Show toast notification
 */
function showToast(title, message, type = 'info') {
    const toast = document.createElement('div');
    toast.className = `toast toast-${type}`;
    toast.innerHTML = `
        <div class="toast-content">
            <div class="toast-icon">${getToastIcon(type)}</div>
            <div class="toast-text">
                <strong class="toast-title">${title}</strong>
                <p class="toast-message">${message}</p>
            </div>
            <button class="toast-close" onclick="this.parentElement.parentElement.remove()">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none">
                    <path d="M18 6L6 18M6 6L18 18" stroke="currentColor" stroke-width="2"/>
                </svg>
            </button>
        </div>
    `;

    document.body.appendChild(toast);

    // Auto-remove after 5 seconds
    setTimeout(() => {
        toast.style.opacity = '0';
        setTimeout(() => toast.remove(), 300);
    }, 5000);
}

/**
 * Get toast icon based on type
 */
function getToastIcon(type) {
    const icons = {
        success: '✅',
        error: '❌',
        warning: '⚠️',
        info: 'ℹ️'
    };
    return icons[type] || icons.info;
}

/**
 * Update notification badge count
 */
function updateNotificationBadge() {
    fetch('/api/notifications/count', {
        headers: {
            'X-CSRF-TOKEN': window.Laravel.csrfToken,
            'Accept': 'application/json'
        }
    })
    .then(response => response.json())
    .then(data => {
        const badge = document.querySelector('.notification-badge');
        if (badge && data.count > 0) {
            badge.textContent = data.count;
            badge.style.display = 'flex';
        } else if (badge && data.count === 0) {
            badge.style.display = 'none';
        }
    })
    .catch(err => console.error('Failed to update notification count:', err));
}

/**
 * Prepend new notification to the list
 */
function prependNotificationToList(notification) {
    const list = document.querySelector('.notifications-list');
    if (!list) return;

    const item = document.createElement('div');
    item.className = 'notification-item unread';
    item.dataset.id = notification.id;
    item.innerHTML = `
        <div class="notification-indicator"></div>
        <div class="notification-icon notification-icon-${notification.type.replace('_', '-')}">
            ${getNotificationIcon(notification.type)}
        </div>
        <div class="notification-content">
            <h4 class="notification-item-title">${notification.title}</h4>
            <p class="notification-item-text">${notification.message}</p>
            <span class="notification-time">Just now</span>
        </div>
        <button class="notification-close" aria-label="Close notification">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none">
                <path d="M18 6L6 18M6 6L18 18" stroke="currentColor" stroke-width="2"/>
            </svg>
        </button>
    `;

    list.prepend(item);
}

/**
 * Get notification icon based on type
 */
function getNotificationIcon(type) {
    const icons = {
        'appointment_reminder': '📅',
        'donation_thank_you': '❤️',
        'campaign_update': '📢',
        'contribution_verified': '✅'
    };
    return icons[type] || '🔔';
}
