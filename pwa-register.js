if ('serviceWorker' in navigator) {
    window.addEventListener('load', () => {
        navigator.serviceWorker.register('./service-worker.js')
            .then((registration) => {
                console.log('ServiceWorker registration successful with scope: ', registration.scope);
            })
            .catch((error) => {
                console.log('ServiceWorker registration failed: ', error);
            });
    });
}

// Capture the beforeinstallprompt event and provide a visible install button
let deferredInstallPrompt = null;

window.addEventListener('beforeinstallprompt', (e) => {
    // Prevent the mini-infobar from appearing on mobile
    e.preventDefault();
    deferredInstallPrompt = e;
    showInstallButton();
    // show any in-page install button if present
    const inPage = document.getElementById('install-app');
    if (inPage) inPage.style.display = '';
    console.log('beforeinstallprompt captured');
});

function showInstallButton() {
    if (document.getElementById('pwa-install-btn')) return;

    const btn = document.createElement('button');
    btn.id = 'pwa-install-btn';
    btn.innerText = 'Install App';
    Object.assign(btn.style, {
        position: 'fixed',
        right: '16px',
        bottom: '16px',
        padding: '10px 14px',
        background: '#2c2416',
        color: '#fff',
        border: 'none',
        borderRadius: '8px',
        zIndex: 9999,
        boxShadow: '0 6px 18px rgba(0,0,0,0.2)',
        fontSize: '14px',
        cursor: 'pointer'
    });

    btn.addEventListener('click', async () => {
        if (!deferredInstallPrompt) return;
        deferredInstallPrompt.prompt();
        const choice = await deferredInstallPrompt.userChoice;
        console.log('User choice:', choice);
        deferredInstallPrompt = null;
        btn.remove();
    });

    document.body.appendChild(btn);
        // Also handle the hero/home page install button if present
        const inPage = document.getElementById('install-app');
        if (inPage) {
            inPage.style.display = '';
            inPage.addEventListener('click', async () => {
                if (!deferredInstallPrompt) {
                    // fallback message
                    alert('Install prompt is not available. Use your browser menu and choose "Add to Home screen".');
                    return;
                }
                deferredInstallPrompt.prompt();
                const choice = await deferredInstallPrompt.userChoice;
                console.log('User choice:', choice);
                deferredInstallPrompt = null;
                // remove floating btn if any
                const f = document.getElementById('pwa-install-btn'); if (f) f.remove();
                inPage.style.display = 'none';
            });
        }
}

// Optional: hide button after appinstalled event
window.addEventListener('appinstalled', (evt) => {
    deferredInstallPrompt = null;
    const b = document.getElementById('pwa-install-btn');
    if (b) b.remove();
    console.log('PWA was installed.');
});

console.log('pwa-register script loaded');

// Allow a test override: add ?showInstall=1 to force showing the in-page install button
document.addEventListener('DOMContentLoaded', () => {
    const params = new URLSearchParams(location.search);
    const force = params.get('showInstall') === '1';
    const inPage = document.getElementById('install-app');

    if (force) {
        console.log('showInstall override present — showing install button for testing');
        if (inPage) {
            inPage.style.display = '';
            inPage.addEventListener('click', async () => {
                if (!deferredInstallPrompt) {
                    alert('Install prompt not available — manually add to home screen via browser menu.');
                    return;
                }
                deferredInstallPrompt.prompt();
                const choice = await deferredInstallPrompt.userChoice;
                console.log('User choice (override):', choice);
            });
        }
    }

    // If the beforeinstallprompt already fired earlier, make sure the button is visible
    if (deferredInstallPrompt && inPage) {
        inPage.style.display = '';
        inPage.addEventListener('click', async () => {
            deferredInstallPrompt.prompt();
            const choice = await deferredInstallPrompt.userChoice;
            console.log('User choice:', choice);
            deferredInstallPrompt = null;
            inPage.style.display = 'none';
            const f = document.getElementById('pwa-install-btn'); if (f) f.remove();
        });
    }
});
