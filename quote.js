/**
 * Provides quotation functionality for LimoGrade. Requires the
 * js-cookie library available at: https://github.com/js-cookie/js-cookie
 */

(function() {
  'use strict';

  function init() {
    // Vehicle quote +/- buttons.
    var buttons = document.getElementsByClassName('quote-switch');
    for (var i = 0; i < buttons.length; i++) {
      initButton(buttons[i], getItems('quote'));

    }
  }
  init();

  function initButton(button, items) {
    // Set initial button state based on cookie state.
    if (items.indexOf(button.dataset.vehicleId) != -1) {
      button.innerHTML = '-';
    } else {
      button.innerHTML = '+';
    }
    // Click will toggle button state and cookie state.
    button.addEventListener('click', function(e) {
      // Get button element.
      var button = e.srcElement;
      // Get cookie items.
      var items = getItems('quote');
      // Disable normal linking.
      e.preventDefault();
      // Toggle visibility.
      toggleButton(button);
      // Toggle items.
      toggleItem(button.dataset.vehicleId, items);
      // Cookies.remove('quote');
    });
    return button;
  }

  function getItems(cookie) {
    if (Array.isArray(Cookies.getJSON(cookie))) {
      // Return cookie array if exists.
      return Cookies.getJSON(cookie);
    } else {
      // Return new array if not.
      return [];
    }
  }

  function toggleItem(value, items) {
    if (items.indexOf(value) === -1) {
      // Add item if not exists.
      return addItem(value, items);
    } else {
      // Remove item if exists.
      return removeItem(value, items);
    }
  }

  function addItem(value, items) {
    // Add item to cookie array.
    items.push(value);
    Cookies.set('quote', items);
    return items;
  }

  function removeItem(value, items) {
    // Remove item from cookie array.
    items.splice(items.indexOf(value), 1);
    Cookies.set('quote', items);
    return items;
  }

  function toggleButton(button) {
    if (button.innerHTML === '+') {
      button.innerHTML = '-';
    } else {
      button.innerHTML = '+';
    }
    return button;
  }

})();
