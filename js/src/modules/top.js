/* eslint-disable max-len */
/**
 * @Author: Roni Laukkarinen
 * @Date:   2022-05-07 12:20:13
 * @Last Modified by:   Roni Laukkarinen
 * @Last Modified time: 2022-10-06 22:53:19
 */
import MoveTo from 'moveto';

const backToTop = () => {
  // Back to top button
  const moveToTop = new MoveTo({ duration: 300, easing: 'easeOutQuart' });
  const topButton = document.getElementById('top');
  const focusableElements = document.querySelectorAll('button, a, input, select, textarea, [tabindex]:not([tabindex="-1"])');

  if (topButton) {
    topButton.addEventListener('click', (event) => {
      // Don't add hash in the end of the url
      event.preventDefault();

      // Focus to the first focusable element on the page
      moveToTop.move(focusableElements[0]);
    });

    // Focus too, if on keyboard
    topButton.addEventListener('keydown', () => {
      focusableElements[0].focus();
    });
  }

};

export default backToTop;
