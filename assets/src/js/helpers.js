export function device(point) {
  let maxWidth = null;

  if (point == "desktop") {
    maxWidth = "(min-width: 1050px)";
  } else if (point == "mobile") {
    maxWidth = "(max-width: 480px)";
  } else if (point == "mobile") {
    maxWidth = "(max-width: 1050px) and (min-width: 480px)";
  } else if (point == "mobileAndTablet") {
    maxWidth = "(max-width: 1050px)";
  }
  if (maxWidth) {
    const query = window.matchMedia(maxWidth);
    return query.matches;
  }

  return false;
}

export async function checkElement(selector) {
  while (document.querySelector(selector) === null) {
    await new Promise((resolve) => requestAnimationFrame(resolve));
  }

  return document.querySelector(selector);
}

export function lazyLoad(context = document) {
  const images = context.querySelectorAll(
    "[data-src]:not(.loading):not(.loaded)"
  );
  const backgroundImages = context.querySelectorAll(
    "[data-image-src]:not(.loading):not(.loaded)"
  );

  const observer = scrollama();

  if (images.length > 0) {
    observer
      .setup({
        step: images,
        offset: 0.9,
        once: true,
      })
      .onStepEnter((response) => {
        const { element, index, direction } = response;
        const dataSrc = element.getAttribute("data-src");

        if (!dataSrc) {
          return;
        }

        element.classList.add("loading");
        element.setAttribute("src", dataSrc);

        element.onload = function () {
          element.classList.remove("loading");
          element.classList.add("loaded");
        };
      });
  }

  if (backgroundImages.length > 0) {
    observer
      .setup({
        step: backgroundImages,
        offset: 1,
        once: true,
      })
      .onStepEnter((response) => {
        const { element, index, direction } = response;
        const dataUrl = element.getAttribute("data-image-src");

        if (!dataUrl) {
          return;
        }

        element.classList.add("loading");

        if (dataUrl) {
          element.style.backgroundImage = `url(${dataUrl})`;
        }

        element.classList.add("loaded");
        element.classList.remove("loading");
      });
  }
}
