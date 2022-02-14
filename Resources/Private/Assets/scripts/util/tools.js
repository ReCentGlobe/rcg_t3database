/**
 * #Tools#
 *
 * @author Florian Förster
 * @since October 10, 2020
 */

import Bowser from 'bowser';
import mitt from 'mitt';
import { html } from './environment';

const tools = {
  device: null,
  doOnWindowResizeList: [],
  windowResizeListenerInit: false,

  isMobile() {
    return window.innerWidth <= 749;
  },

  each(list, fn) {
    if (list && fn) {
      for (let i = 0; i < list.length; i++) {
        fn(list[i], i);
      }
    }
  },

  doOnWindowResize(action) {
    if (action && action.fn) {
      this.doOnWindowResizeList.push(action);
      if (!this.windowResizeListenerInitialised) {
        tools.windowResizeListener();
      }
    }
  },

  onWindowResizeActions() {
    tools.each(this.doOnWindowResizeList, (action) => {
      action.fn(action.arg);
    });
  },

  windowResizeListener() {
    let timeoutFn = null;
    window.onresize = (e) => {
      if (timeoutFn != null) {
        window.clearTimeout(timeoutFn);
      }
      timeoutFn = setTimeout(() => {
        tools.onWindowResizeActions();
      }, 100);
    };
    tools.windowResizeListenerInitialised = true;
  },

  // Browser detection
  // ==========================================================================
  browserDetection() {
    const browser = Bowser.getParser(window.navigator.userAgent);
    /*    const isMobile =
      Bowser.mobile ||
      Bowser.tablet ||
      (navigator.platform === 'MacIntel' && navigator.maxTouchPoints > 1) ||
      false;*/

    const isMobile = browser.is('mobile') || browser.is('tablet');
    window.isMobile = isMobile;
    if (isMobile) {
      html.classList.add('is-mobile');
    }

    const isEdge = browser.satisfies({
      edge: '>=0',
    });
    window.isEdge = isEdge;
    if (isEdge) {
      html.classList.add('is-edge');
    }

    const isFirefox = browser.satisfies({ firefox: '>=0' });
    window.isFirefox = isFirefox;
    if (isFirefox) {
      html.classList.add('is-firefox');
    }

    const isSafari = browser.satisfies({ safari: '>=0' });
    window.isSafari = isSafari;
    if (isSafari) {
      html.classList.add('is-safari');
    }

    const iOS = browser.satisfies({ mobile: { safari: '>=0' } });
    ///iPad|iPhone|iPod/.test(navigator.userAgent) && !window.MSStream;
    if (iOS) {
      html.classList.add('is-ios');
    }

    const isIE = browser.satisfies({ ie: '>=0' });
    window.isIE = isIE;
    if (isIE) {
      html.classList.add('is-ie');
    }
  },

  getPreviousSibling(elem, selector) {
    // Get the next sibling element
    let sibling = elem.previousElementSibling;

    // If the sibling matches our selector, use it
    // If not, jump to the next sibling and continue the loop
    while (sibling) {
      if (sibling.matches(selector)) return sibling;
      sibling = sibling.previousElementSibling;
    }

    return sibling;
  },
  getNextSibling(elem, selector) {
    // Get the next sibling element
    let sibling = elem.nextElementSibling;

    // If the sibling matches our selector, use it
    // If not, jump to the next sibling and continue the loop
    while (sibling) {
      if (sibling.matches(selector)) return sibling;
      sibling = sibling.nextElementSibling;
    }

    return sibling;
  },
};

const emitter = mitt();

export { tools, emitter };
