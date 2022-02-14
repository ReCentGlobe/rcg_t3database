import svg4everybody from 'svg4everybody';
import FontFaceObserver from 'fontfaceobserver';
import lazySizes from 'lazysizes';
import 'picturefill';
import 'lazysizes/plugins/parent-fit/ls.parent-fit';
import 'lazysizes/plugins/blur-up/ls.blur-up';
import { debugLoad, html } from './util/environment';
//import * as Sentry from '@sentry/browser';
//import { Integrations } from '@sentry/tracing';

/**
 * LazySizes
 */
lazySizes.cfg.lazyClass = 'js-lazyload';
lazySizes.cfg.preloadClass = 'js-lazypreload';
lazySizes.cfg.loadingClass = 'is-loading';
lazySizes.cfg.loadedClass = 'is-loaded';
lazySizes.cfg.objectFitClass = 'js-object-fit-clone';
lazySizes.cfg.blurupMode = 'auto';
lazySizes.cfg.blurUpClass = 'is-blurred';

export default function () {
  /**
   * SVG4Everybody
   */
  svg4everybody();
  debugLoad('LOADED--SVG4Everybody');

  /**
   * WebfontLoader
   */
  const normal = new FontFaceObserver('EuclidCircular');
  Promise.all([normal.load()])
    .then(() => {
      //console.log('EuclidCircular family has loaded.');
      sessionStorage.fontsLoaded = true;
      html.classList.add('has-fonts-loaded');
    })
    .catch(() => {
      sessionStorage.fontsLoaded = false;
    });

  if (sessionStorage.fontsLoaded) {
    html.classList.add('has-fonts-loaded');
  }
  debugLoad('LOADED--WebfontLoader');

  /**
   * LazySizes
   */
  debugLoad('LOADED--LazySizes');

  /**
   * Service Worker
   */
  if ('serviceWorker' in navigator) {
    window.addEventListener('load', function () {
      navigator.serviceWorker.register('/sw.js').then(
        function (registration) {
          // Registration was successful
          console.log('ServiceWorker registration successful with scope: ', registration.scope);
        },
        function (err) {
          // registration failed :(
          console.log('ServiceWorker registration failed: ', err);
        }
      );
    });
  }

  /**
   * Sentry.io
   */
  /*  Sentry.init({
    dsn: 'https://3a8a1c2064fd45e8b40ac632b89a254c@o297648.ingest.sentry.io/5648883',
    integrations: [new Integrations.BrowserTracing()],
    release: `release@${SENTRY_RELEASE}`,
    tracesSampleRate: 1.0,
  });
  debugLoad('LOADED--Sentry');*/
}
