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
        this.addEventListener('click',function(e){
          let checked = this.querySelector('input');
          e.preventDefault();
          checked.checked = !checked.checked;
          checked.checked ? checked.classList.add("selected"): checked.classList.remove("selected");
         $(`#${this.className}`).selected = checked.checked;

          const selectedStatus = $(".simplecharm-select-form p b");
          const selectedCount = $(".selected");

          if(selectedCount.length){
            selectedStatus.innerText = `${selectedCount.length} Categories Selected`;
          }else{
            selectedStatus.innerText = `Select Categories`;  
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