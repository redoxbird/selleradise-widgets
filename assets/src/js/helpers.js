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
  const backImages = context.querySelectorAll(
    "[data-image-src]:not(.loading):not(.loaded)"
  );

  if (!images && !backImages) {
    return;
  }

  const lazyLoadImg = function (target) {
    const io = new IntersectionObserver((entries, observer) => {
      entries.forEach((entry) => {
        entry.target.classList.add("loading");
        const dataSrc = entry.target.getAttribute("data-src");

        if (entry.isIntersecting && dataSrc) {
          entry.target.setAttribute("src", dataSrc);

          entry.target.onload = function () {
            entry.target.classList.remove("loading");
            entry.target.classList.add("loaded");
          };

          observer.disconnect();
        }
      });
    });

    io.observe(target);
  };

  const lazyLoadBack = function (target) {
    const io = new IntersectionObserver((entries, observer) => {
      //console.log(entries)
      entries.forEach((entry) => {
        entry.target.classList.add("loading");
        const dataUrl = entry.target.getAttribute("data-image-src");

        if (entry.isIntersecting) {
          if (dataUrl) {
            entry.target.style.backgroundImage = `url(${dataUrl})`;
          }

          entry.target.classList.add("loaded");
          entry.target.classList.remove("loading");

          observer.disconnect();
        }
      });
    });

    io.observe(target);
  };

  var normalLoadImg = function (entry) {
    var dataSrc = entry.getAttribute("data-src");

    if (dataSrc) {
      entry.setAttribute("src", dataSrc);

      entry.onload = function () {
        entry.classList.add("loaded");
      };
    }
  };

  var normalLoadBack = function (entry) {
    var dataUrl = entry.getAttribute("data-image-src");

    if (dataUrl) {
      entry.style.backgroundImage = `url(${dataUrl})`;
    }

    entry.classList.add("loaded");
  };

  if ("IntersectionObserver" in window) {
    images.forEach(lazyLoadImg);
    backImages.forEach(lazyLoadBack);
  } else {
    images.forEach(normalLoadImg);
    backImages.forEach(normalLoadBack);
  }
}
