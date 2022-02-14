/**
 * #RCGDatabase#
 *
 * @author Florian Förster
 * @since February 02, 2022
 */

import Modular from 'modujs';
import * as modules from './modules';
import { debugLoad, html } from './util/environment';
import globals from './globals';
import { set100vhVar } from './util/index';
import { tools } from './util/tools';

const app = new Modular({
  modules,
  components,
});

document.addEventListener('DOMContentLoaded', () => {
  console.log(
    '%c👋 – 🔨 with ❤️ by ReCentGlobe',
    'font-size:10px;font-weight: bold;color:#fff; background-color:#4D84F1; padding:5px;border-radius:4px;'
  );
  debugLoad('DOM Content');
});

window.onload = (event) => {
  const $style = document.getElementById('main-css');

  if ($style) {
    if ($style.isLoaded) {
      init();
    } else {
      $style.addEventListener('load', (event) => {
        init();
      });
    }
  } else {
    console.warn('The "main-css" stylesheet not found');
  }

  //init();
};

function init() {
  app.init(app);
  tools.browserDetection();
  set100vhVar();
  globals();

  html.classList.add('has-loaded', 'is-ready');
  html.classList.remove('is-loading');
}
