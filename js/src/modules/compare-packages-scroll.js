const comparePackagesScroll = () => {
  // Get references to the elements
  const innerWrapper = document.querySelector(".package-comparison__inner");
  const indicators = document.querySelectorAll(".package-comparison__card-indicator");
  const cards = document.querySelectorAll(".package-comparison__single-package");

  // Function to update indicators
  function updateIndicators(scrollLeft) {
    const viewportWidth = innerWrapper.offsetWidth;

    // If scrolled all the way to the left, highlight the first indicator
    if (scrollLeft <= 5 * 16) { // 1.5rem converted to pixels (assuming 1rem = 16px)
      activateIndicator(0);
      return;
    }

    // If scrolled all the way to the right, highlight the last indicator
    const maxScrollLeft = innerWrapper.scrollWidth - viewportWidth;
    if (scrollLeft >= maxScrollLeft - 5 * 16) { // 1.5rem converted to pixels
      activateIndicator(indicators.length - 1);
      return;
    }

    // Highlight the center indicator if not at the edge
    const centerIndicatorIndex = Math.floor(indicators.length / 2);
    activateIndicator(centerIndicatorIndex);
  }

  // Function to activate a specific indicator
  function activateIndicator(index) {
    indicators.forEach((indicator) => {
      indicator.classList.remove("package-comparison__card-indicator--active");
    });
    indicators[index].classList.add("package-comparison__card-indicator--active");
  }

  // Add click event listeners to each indicator
  indicators.forEach((indicator, index) => {
    indicator.addEventListener("click", function() {
      const card = cards[index];
      const scrollPosition = card.offsetLeft - (innerWrapper.offsetWidth - card.offsetWidth) / 2;
      innerWrapper.scrollTo({
        left: scrollPosition,
        behavior: "smooth"
      });
    });
  });

  // Add scroll event listener to the inner wrapper
  innerWrapper.addEventListener("scroll", function() {
    updateIndicators(innerWrapper.scrollLeft);
  });

  // Initial update of indicators
  updateIndicators(innerWrapper.scrollLeft);
}
export default comparePackagesScroll;