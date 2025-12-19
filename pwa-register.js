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
}

// Optional: hide button after appinstalled event
window.addEventListener('appinstalled', (evt) => {
    deferredInstallPrompt = null;
    const b = document.getElementById('pwa-install-btn');
    if (b) b.remove();
    console.log('PWA was installed.');
});
