(function($){
  class Multiselect{
    constructor(){
      this.init();
    }

    init(){
      this.load_multiselect();
      this.control_multiselect();
    }

    load_multiselect(){
      const list = $('.simplecharm-select-options li');

      list.each(function(){
        $(this).on( 'click', (e) => {
          e.preventDefault();
          let checked = $(this).find('input')[0]; // Get the input element in the clicked li
            checked.checked = !checked.checked; // Toggle checked state

            if (checked.checked) {
              $(checked).addClass("selected");
            } else {
              $(checked).removeClass("selected");
            }
          
          const option = $(`#${this.className}`); // Get the option corresponding to the clicked li
            option.prop('selected', checked.checked); // Set selected property correctly


         $(`#${this.className}`).selected = checked.checked;
          const selectedStatus = $(".simplecharm-select-form p b");
          const selectedCount = $(".selected");

          if(selectedCount.length){
            selectedStatus.text(`${selectedCount.length} Category Selected`);
          }else{
            selectedStatus.text(`Select Categories`);  
          }
        });
      })
    }

    control_multiselect(){
      const selectTitle = $(".simplecharm-select-form p");
      const selectOptions = $(".simplecharm-select-options");
      const selectDropdownIcon = $(".simplecharm-selectform-dropdown-icon");

      selectTitle.on("click", function(e){
        selectOptions.toggleClass("multiselect-closed");
        selectDropdownIcon.toggleClass("multiselect-open");
        selectOptions.toggleClass("multiselect-hide");
      })
    }

  }

  new Multiselect;
})(jQuery)