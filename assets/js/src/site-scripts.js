"use strict";
const desc = document.querySelector('.site-description');
const descToggle = document.querySelector('.site-description__toggle');

descToggle.addEventListener('click', (e) => {
  e.preventDefault();
  desc.classList.toggle('hidden');
  descToggle.classList.toggle('hidden');
});
