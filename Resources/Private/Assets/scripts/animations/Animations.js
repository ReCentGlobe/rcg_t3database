import gsap from 'gsap';
import CSSRulePlugin from 'gsap/CSSRulePlugin';

gsap.registerPlugin(CSSRulePlugin);

/*const newsBox = gsap.utils.toArray('.c-newsBox');
function newsBoxAnimation() {
  this.anim.reversed(!this.anim.reversed());
}

newsBox.forEach((obj, i) => {
  const line = CSSRulePlugin.getRule('.c-newsBox_content:after');
  obj.anim = gsap.to(line, { left: 0, width: 50, opacity: 0.1, ease: 'none' }).reversed(true);
  obj.addEventListener('mouseenter', newsBoxAnimation);
  obj.addEventListener('mouseleave', newsBoxAnimation);
});*/

/**
 * Fade in Element
 * @param {string} elem
 */
export const elementFadeIn = (elem) => {
  gsap
    .timeline()
    .set(elem, { display: 'flex' }, 'in')
    .fromTo(
      elem,
      { autoAlpha: 0, backgroundColor: 'transparent' },
      { autoAlpha: 1, backgroundColor: 'rgba(0, 0, 0, 0.7)' },
      '>'
    );
};

/**
 * Fade out Element
 * @param {string} elem
 */
export const elementFadeOut = (elem) => {
  gsap
    .timeline()
    .to(elem, { autoAlpha: 0, backgroundColor: 'transparent' }) // Animations first
    .set(elem, { display: 'none' }); // Then set final stat
};

/**
 * Show Menu
 * @param {string} elem
 */
export const showMenu = (elem) => {
  gsap
    .timeline()
    .set(elem, { className: 'c-nav is-open', display: 'block' }, 'in')
    .fromTo(elem, { y: -100, autoAlpha: 0 }, { y: 0, autoAlpha: 1, duration: 0.3 }, '>');
};

/**
 * Close Menu
 * @param {string} elem
 */
export const closeMenu = (elem) => {
  gsap
    .timeline()
    .to(elem, { y: -100, autoAlpha: 0, duration: 0.1 }) // Animations first
    .set(elem, { className: 'c-nav', display: 'none', clearProps: 'all' }); // Then set final stat
};

/**
 * Show Mobile Menu
 * @param {string} elem
 */
export const showMobileMenu = (elem) => {
  gsap
    .timeline()
    .set(
      elem,
      {
        className: 'c-header_navList || js-header_navList is-active',
        display: 'flex',
        overflow: 'auto',
      },
      'in'
    )
    .fromTo(elem, { x: -100, autoAlpha: 0 }, { x: 0, autoAlpha: 1, duration: 0.4 }, '>');
};

/**
 * Close Mobile Menu
 * @param {string} elem
 */
export const closeMobileMenu = (elem) => {
  gsap
    .timeline()
    .to(elem, { x: -100, autoAlpha: 0, duration: 0.3 }) // Animations first
    .set(elem, {
      className: 'c-header_navList || js-header_navList',
      clearProps: 'all',
    }); // Then set final stat
};

/**
 * Show Mobile Search
 * @param {string} elem
 */
export const showMobileSearch = (elem) => {
  gsap
    .timeline()
    .set(
      elem,
      {
        className: 'c-searchMobile is-active',
        display: 'flex',
        overflow: 'auto',
      },
      'in'
    )
    .fromTo(elem, { x: -100, autoAlpha: 0 }, { x: 0, autoAlpha: 1, duration: 0.4 }, '>');
};

/**
 * Close Mobile Search
 * @param {string} elem
 */
export const closeMobileSearch = (elem) => {
  gsap
    .timeline()
    .to(elem, { x: -100, autoAlpha: 0, duration: 0.3 }) // Animations first
    .set(elem, {
      className: 'c-searchMobile',
      clearProps: 'all',
    }); // Then set final stat
};
