(function($){
     // Initialize Choices.js for the multi-select input
    const multiSelect = new Choices('#search-by-categories', {
      removeItemButton: false,   // Disable item removal (no tags)
      shouldSort: false,         // Keep the selected order
      searchEnabled: false,      // Disable search for simplicity
      itemSelectText: '',        // Remove 'Press to select' text
      placeholder: true,
      placeholderValue: 'Select options',
      maxItemCount: -1,          // Allow multiple items
      renderSelectedChoices: 'always',  // Always render selected choices in the list (checkbox style)
    });

    const selectElement = document.getElementById('search-by-categories');
    const selectedCountElement = document.getElementById('selected-count');

    function updateSelectedCount() {
      const selectedItems = Array.from(selectElement.selectedOptions);
      const count = selectedItems.length;

      if (count === 0) {
        selectedCountElement.innerText = 'No items selected';
      } else {
        selectedCountElement.innerText = `${count} item(s) selected`;
      }
    }

    // Listen for changes to the multi-select and update count
    selectElement.addEventListener('change', updateSelectedCount);
  })(jQuery)


// document.addEventListener('DOMContentLoaded', function() {
//   const element = document.getElementById('multi-select');
//   const choices = new Choices(element, {
//     removeItemButton: true, // Allows removing selected items
//     placeholder: true,
//     searchEnabled: false // Disable search if you don’t need it
//   });
// });
