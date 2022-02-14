/**
 * #RCG Database Module#
 *
 * @author Florian Förster
 * @since February 02, 2022
 */

import { module as modularJS } from 'modujs';
import { debugLoad } from '../util/environment';

export default class extends modularJS {
  constructor(m) {
    super(m);
  }

  init() {
    debugLoad('LOADED--Example');
  }
}
