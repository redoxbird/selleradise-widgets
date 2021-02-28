export async function checkElement(selector) {
  while (document.querySelector(selector) === null) {
    await new Promise((resolve) => requestAnimationFrame(resolve));
  }

  return document.querySelector(selector);
}
