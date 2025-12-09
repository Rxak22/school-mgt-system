require('./bootstrap');

// Vercel Speed Insights - Client-side only
if (typeof window !== 'undefined') {
    import('@vercel/speed-insights').then(({ injectSpeedInsights }) => {
        injectSpeedInsights();
    }).catch((err) => {
        console.warn('Failed to load Vercel Speed Insights:', err);
    });
}
