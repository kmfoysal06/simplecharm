(function(){
  const list = document.querySelectorAll('.simplecharm-select-options li');
  const selectTitle = document.querySelector(".simplecharm-select-form p");
  const selectOptions = document.querySelector(".simplecharm-select-options");
  const selectDropdownIcon = document.querySelector(".simplecharm-selectform-dropdown-icon");

list.forEach(function(li){
  li.addEventListener('click',function(e){
    let checked = li.querySelector('input');
    e.preventDefault();
    checked.checked = !checked.checked;
    checked.checked ? checked.classList.add("selected"): checked.classList.remove("selected");
   document.querySelector(`#${li.className}`).selected = checked.checked;

    const selectedStatus = document.querySelector(".simplecharm-select-form p b");
    const selectedCount = document.querySelectorAll(".selected");

    if(selectedCount.length){
      selectedStatus.innerText = `${selectedCount.length} Categories Selected`;
    }else{
      selectedStatus.innerText = `Select Categories`;  
    }
  });
})
selectTitle.addEventListener("click", function(e){
  selectOptions.classList.toggle("multiselect-closed");
  selectDropdownIcon.classList.toggle("multiselect-open");
  selectOptions.classList.toggle("multiselect-hide");
})
})()